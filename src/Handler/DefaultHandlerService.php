<?php

namespace Miracode\StripeBundle\Handler;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Handler\StripeHandlerInterface;
use Stripe\Event;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class DefaultHandlerService implements StripeHandlerInterface
{
    public function __construct(
        private readonly EventDispatcherInterface $eventDispatcher,
    ) {
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
