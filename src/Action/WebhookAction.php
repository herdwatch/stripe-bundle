<?php

namespace Miracode\StripeBundle\Action;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Handler\DefaultHandlerService;
use Miracode\StripeBundle\Handler\StripeHandlerInterface;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Stripe\Event as StripeEventApi;
use Stripe\Exception\ApiErrorException;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final readonly class WebhookAction
{
    private const MIRACODE_STRIPE_WEBHOOK_SECRET = 'miracode_stripe.webhook_secret';
    private const VERIFY_STRIPE_SIGNATURE = 'verify_stripe_signature';

    public function __construct(
        private ContainerInterface $container,
        private DefaultHandlerService $defaultHandlerService
    )
    {
    }

    /**
     * @throws ApiErrorException
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws StripeException
     */
    public function __invoke(Request $request): Response
    {
        $requestData = json_decode($request->getContent());
        if (!isset($requestData->id, $requestData->object)) {
            throw new BadRequestHttpException('Invalid webhook request data');
        }
        // If event id ends with 14 zero's then it is a test webhook event. Return 200 status.
        if (str_ends_with((string) $requestData->id, '00000000000000')) {
            return new Response('Webhook test successful', 200);
        }
        if (StripeObjectType::EVENT !== $requestData->object) {
            throw new StripeException('Unknown stripe object type in webhook');
        }
        $this->checkSignature($request, $requestData);

        $stripeEventApi = new StripeEventApi();
        if (!$stripeEventObject = $stripeEventApi->retrieve($requestData->id)) {
            throw new StripeException(
                sprintf('Event does not exists, id %s', $requestData->id)
            );
        }

        $event = new StripeEvent($stripeEventObject);
        $service = $this->defaultHandlerService;
        if ($this->container->hasParameter('miracode_stripe.process_service')) {
            $service = $this->container->get($this->container->getParameter('miracode_stripe.process_service'));
            assert($service instanceof StripeHandlerInterface);
        }
        $service->process($stripeEventObject, $event);

        return new Response();
    }

    /**
     * @throws StripeException
     */
    private function checkSignature(Request $request, mixed $requestData): void
    {
        if (!$this->container->hasParameter(self::MIRACODE_STRIPE_WEBHOOK_SECRET)
            || !$this->container->hasParameter(self::VERIFY_STRIPE_SIGNATURE)
        ) {
            return;
        }
        // Secure webhook with event signature: https://stripe.com/docs/webhooks/signatures
        $webhookSecret = $this->container->getParameter(self::MIRACODE_STRIPE_WEBHOOK_SECRET);

        $verifySignature = $this->container->getParameter(self::VERIFY_STRIPE_SIGNATURE);

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
