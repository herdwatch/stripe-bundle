<?php

namespace Miracode\StripeBundle\Handler;

use Miracode\StripeBundle\Event\StripeEvent;
use Psr\EventDispatcher\EventDispatcherInterface;
use Stripe\Event;

readonly class DefaultHandlerService implements StripeHandlerInterface
{
    /**
     * UserRequestService constructor.
     */
    public function __construct(private EventDispatcherInterface $eventDispatcher)
    {
    }

    public function process(Event $stripeEventObject, StripeEvent $event): void
    {
        $this->handle($stripeEventObject, $event);
    }

    public function handle(Event $stripeEventObject, StripeEvent $event): void
    {
        $this->eventDispatcher->dispatch($event, 'stripe.' . $stripeEventObject->type);
    }
}
