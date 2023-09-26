<?php

namespace Miracode\StripeBundle\Handler;

use Miracode\StripeBundle\Event\StripeEvent;
use Stripe\Event;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DefaultHandlerService
{
    /**
     * UserRequestService constructor.
     */
    public function __construct(protected ContainerInterface $container)
    {
    }

    public function process(Event $stripeEventObject, StripeEvent $event): void
    {
        $this->handle($stripeEventObject, $event);
    }

    public function handle(Event $stripeEventObject, StripeEvent $event): void
    {
        $this
            ->container
            ->get('event_dispatcher')
            ->dispatch($event, 'stripe.' . $stripeEventObject->type);
    }
}
