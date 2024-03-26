<?php

namespace Miracode\StripeBundle\Tests\Event;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\StripeException;
use PHPUnit\Framework\TestCase;
use Stripe\StripeObject;

class StripeEventTest extends TestCase
{
    public function testEvent(): void
    {
        $event = new StripeEvent(new StripeObject('test_id'));
        $this->assertEquals('test_id', $event->getEvent()->id);
    }

    public function testEventObjectData(): void
    {
        $object = new StripeObject();
        $object->data = new StripeObject();
        $object->data->object = new StripeObject('test_id');
        $event = new StripeEvent($object);

        $this->assertEquals('test_id', $event->getDataObject()->id);
    }

    public function testEventEmptyObject(): void
    {
        $event = new StripeEvent(new StripeObject());
        $this->expectException(StripeException::class);
        $event->getDataObject();
    }
}
