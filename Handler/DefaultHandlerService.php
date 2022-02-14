<?php

namespace Miracode\StripeBundle\Handler;

use Miracode\StripeBundle\Event\StripeEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Stripe\StripeObject;

class DefaultHandlerService
{

    protected ContainerInterface $container;

    /**
     * UserRequestService constructor.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container
    )
    {
      $this->container = $container;
    }


    public function process(StripeEvent $stripeEventObject, StripeObject $event): void
    {
        $this->handle($stripeEventObject, $event);
    }

    public function handle(StripeEvent $stripeEventObject, StripeObject $event): void
    {
        $this
            ->container
            ->get('event_dispatcher')
            ->dispatch('stripe.' . $stripeEventObject->type, $event);
    }

}