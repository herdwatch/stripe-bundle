<?php

namespace Miracode\StripeBundle\Handler;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Stripe\StripeObject;
use Stripe\Event;

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


    public function process(Event $stripeEventObject, StripeObject $event): void
    {
        $this->handle($stripeEventObject, $event);
    }

    public function handle(Event $stripeEventObject, StripeObject $event): void
    {
        $this
            ->container
            ->get('event_dispatcher')
            ->dispatch('stripe.' . $stripeEventObject->type, $event);
    }

}