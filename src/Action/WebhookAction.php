<?php

namespace Miracode\StripeBundle\Action;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Handler\StripeHandlerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;
use Psr\Log\LoggerInterface;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\SignatureVerificationException;
use Stripe\StripeClient;
use Stripe\Webhook;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final readonly class WebhookAction
{
    private const string MIRACODE_STRIPE_WEBHOOK_SECRET = 'miracode_stripe.webhook_secret';
    private const string VERIFY_STRIPE_SIGNATURE = 'verify_stripe_signature';

    public function __construct(
        private ParameterBagInterface $parameterBag,
        private StripeHandlerInterface $handler,
        private LoggerInterface $logger,
        private StripeClient $stripeClient,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        try {
            $requestData = json_decode($request->getContent(), false, 512, JSON_THROW_ON_ERROR);
            if (!isset($requestData->id, $requestData->object)) {
                throw new BadRequestHttpException('Invalid webhook request data');
            }
        } catch (\JsonException) {
            throw new BadRequestHttpException('Invalid webhook request data');
        }
        // If event id ends with 14 zero's then it is a test webhook event. Return 200 status.
        if (str_ends_with((string) $requestData->id, '00000000000000')) {
            return new Response('Webhook test successful', 200);
        }
        try {
            if (StripeObjectType::EVENT !== $requestData->object) {
                throw new StripeException('Unknown stripe object type in webhook');
            }
            $this->checkSignature($request, $requestData);

            try {
                $stripeEventObject = $this->stripeClient->events->retrieve($requestData->id);
            } catch (ApiErrorException $e) {
                throw new StripeException(
                    sprintf('%s(%s), id %s', $e->getMessage(), $e->getCode(), $requestData->id)
                );
            }
            $event = new StripeEvent($stripeEventObject);
            $this->handler->process($stripeEventObject, $event);
            $response = new Response('Webhook processed', Response::HTTP_OK);
        } catch (StripeException $stripeException) {
            $this->logger->warning($stripeException->getMessage());
            $response = new Response('Bad webhook request data', Response::HTTP_BAD_REQUEST);
        }

        return $response;
    }

    /**
     * @throws StripeException
     */
    private function checkSignature(Request $request, mixed $requestData): void
    {
        if (!$this->parameterBag->has(self::MIRACODE_STRIPE_WEBHOOK_SECRET)
            || !$this->parameterBag->has(self::VERIFY_STRIPE_SIGNATURE)
        ) {
            return;
        }
        // Secure webhook with event signature: https://stripe.com/docs/webhooks/signatures
        $webhookSecret = $this->parameterBag->get(self::MIRACODE_STRIPE_WEBHOOK_SECRET);
        if (null !== $webhookSecret && !is_string($webhookSecret)) {
            throw new StripeException('Invalid webhook secret');
        }

        $verifySignature = $this->parameterBag->get(self::VERIFY_STRIPE_SIGNATURE);

        if (true === $verifySignature && null !== $webhookSecret) {
            $sigHeader = $request->headers->get('Stripe-Signature');
            try {
                Webhook::constructEvent(
                    $request->getContent(),
                    $sigHeader,
                    $webhookSecret
                );
            } catch (\UnexpectedValueException) {
                // Invalid payload
                throw new StripeException(
                    sprintf('Invalid event payload %s', $requestData->id)
                );
            } catch (SignatureVerificationException) {
                // Invalid signature
                throw new StripeException(
                    sprintf('Invalid event signature %s', $requestData->id)
                );
            }
        }
    }
}
