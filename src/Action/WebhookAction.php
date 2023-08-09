<?php

namespace Miracode\StripeBundle\Action;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Handler\DefaultHandlerService;
use Miracode\StripeBundle\Stripe\StripeObjectType;
use Miracode\StripeBundle\StripeException;
use Psr\Container\ContainerInterface;
use Stripe\Event as StripeEventApi;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

final readonly class WebhookAction
{
    public function __construct(private ContainerInterface $container)
    {
    }

    public function __invoke(Request $request): Response
    {
        $requestData = json_decode($request->getContent());
        if (!isset($requestData->id) || !isset($requestData->object)) {
            throw new BadRequestHttpException('Invalid webhook request data');
        }
        if ($requestData->object !== StripeObjectType::EVENT) {
            throw new StripeException('Unknown stripe object type in webhook');
        }
        $stripeEventApi = new StripeEventApi();
        if (!$stripeEventObject = $stripeEventApi->retrieve($requestData->id)) {
            throw new StripeException(
                sprintf('Event does not exists, id %s', $requestData->id)
            );
        }

        $event = new StripeEvent($stripeEventObject);
        /** @var DefaultHandlerService $service */
        $service = $this->container->get($this->container->getParameter('miracode_stripe.process_service'));
        $service->process($stripeEventObject, $event);

        return new Response();
    }
}
