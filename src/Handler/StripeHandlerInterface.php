<?php

namespace Miracode\StripeBundle\Handler;

use Miracode\StripeBundle\Event\StripeEvent;
use Stripe\Event;

interface StripeHandlerInterface
{
    public function process(Event $stripeEventObject, StripeEvent $event): void;

    public function handle(Event $stripeEventObject, StripeEvent $event): void;
}
