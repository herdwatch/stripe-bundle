<?php

namespace Miracode\StripeBundle\EventListener;

use Miracode\StripeBundle\Event\StripeEvent;
use Miracode\StripeBundle\Manager\ModelManagerInterface;
use Stripe\StripeObject;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StripeEventSubscriber implements EventSubscriberInterface
{
    /**
     * @var ModelManagerInterface
     */
    protected $modelManager;

    /**
     * StripeEventSubscriber constructor.
     */
    public function __construct(ModelManagerInterface $modelManager)
    {
        $this->modelManager = $modelManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            StripeEvent::CHARGE_CAPTURED => 'onStripeChargeEvent',
            StripeEvent::CHARGE_FAILED => 'onStripeChargeEvent',
            StripeEvent::CHARGE_PENDING => 'onStripeChargeEvent',
            StripeEvent::CHARGE_REFUNDED => 'onStripeChargeEvent',
            StripeEvent::CHARGE_SUCCEEDED => 'onStripeChargeEvent',
            StripeEvent::CHARGE_UPDATED => 'onStripeChargeEvent',

            StripeEvent::COUPON_CREATED => 'onStripeEvent',
            StripeEvent::COUPON_UPDATED => 'onStripeEvent',

            StripeEvent::CUSTOMER_CREATED => 'onStripeEvent',
            StripeEvent::CUSTOMER_UPDATED => 'onStripeEvent',
            StripeEvent::CUSTOMER_SOURCE_CREATED => 'onStripeEvent',
            StripeEvent::CUSTOMER_SOURCE_UPDATED => 'onStripeEvent',
            StripeEvent::CUSTOMER_SUBSCRIPTION_CREATED => 'onStripeEvent',
            StripeEvent::CUSTOMER_SUBSCRIPTION_UPDATED => 'onStripeEvent',
            StripeEvent::CUSTOMER_SUBSCRIPTION_TRAIL_WILL_END => 'onStripeEvent',

            StripeEvent::INVOICE_CREATED => 'onStripeEvent',
            StripeEvent::INVOICE_PAYMENT_FAILED => 'onStripeEvent',
            StripeEvent::INVOICE_PAYMENT_SUCCEEDED => 'onStripeEvent',
            StripeEvent::INVOICE_SENT => 'onStripeEvent',
            StripeEvent::INVOICE_UPDATED => 'onStripeEvent',

            StripeEvent::PLAN_CREATED => 'onStripeEvent',
            StripeEvent::PLAN_UPDATED => 'onStripeEvent',

            StripeEvent::SOURCE_CANCELED => 'onStripeEvent',
            StripeEvent::SOURCE_CHARGEABLE => 'onStripeEvent',
            StripeEvent::SOURCE_FAILED => 'onStripeEvent',

            StripeEvent::PAYMENT_INTENT_AMOUNT_CAPTURABLE_UPDATED => 'onStripeEvent',
            StripeEvent::PAYMENT_INTENT_CANCELLED => 'onStripeEvent',
            StripeEvent::PAYMENT_INTENT_CREATED => 'onStripeEvent',
            StripeEvent::PAYMENT_INTENT_PAYMENT_FILED => 'onStripeEvent',
            StripeEvent::PAYMENT_INTENT_PROCESSING => 'onStripeEvent',
            StripeEvent::PAYMENT_INTENT_REQURIES_ACTION => 'onStripeEvent',
            StripeEvent::PAYMENT_INTENT_SUCCEEDED => 'onStripeEvent',

            StripeEvent::SETUP_INTENT_CANCELED => 'onStripeEvent',
            StripeEvent::SETUP_INTENT_CREATED => 'onStripeEvent',
            StripeEvent::SETUP_INTENT_REQUIRES_ACTION => 'onStripeEvent',
            StripeEvent::SETUP_INTENT_SETUP_FILED => 'onStripeEvent',
            StripeEvent::SETUP_INTENT_SUCCEEDED => 'onStripeEvent',

            StripeEvent::PAYMENT_METHOD_ATTACHED => 'onStripeEvent',
            StripeEvent::PAYMENT_METHOD_DETACHED => 'onStripeEvent',
            StripeEvent::PAYMENT_METHOD_UPDATED => 'onStripeEvent',
            StripeEvent::PAYMENT_METHOD_AUTOMATICALLY_UPDATED => 'onStripeEvent',

            StripeEvent::COUPON_DELETED => 'onStripeDeleteEvent',
            StripeEvent::CUSTOMER_DELETED => 'onStripeDeleteEvent',
            StripeEvent::CUSTOMER_SOURCE_DELETED => 'onStripeDeleteEvent',
            StripeEvent::PLAN_DELETED => 'onStripeDeleteEvent',
        ];
    }

    public function onStripeEvent(StripeEvent $event)
    {
        $object = $event->getDataObject();
        if ($this->modelManager->support($object)) {
            $this->modelManager->save($object, true);
        }
    }

    public function onStripeChargeEvent(StripeEvent $event)
    {
        $object = $event->getDataObject();
        // Save charge
        if ($this->modelManager->support($object)) {
            $this->modelManager->save($object, true);
        }
        // Save source if exists
        if (isset($object->source)
            && $object->source instanceof StripeObject
        ) {
            if ($this->modelManager->support($object->source)) {
                $this->modelManager->save($object->source, true);
            }
        }
        // Save refunds if exists
        if (isset($object->refunds)
            && $object->refunds instanceof StripeObject
        ) {
            $refunds = $object->refunds;
            if ($refunds->total_count > 0) {
                foreach ($refunds->data as $refund) {
                    if ($this->modelManager->support($refund)) {
                        $this->modelManager->save($refund, true);
                    }
                }
            }
        }
    }

    public function onStripeDeleteEvent(StripeEvent $event)
    {
        $object = $event->getDataObject();
        if ($this->modelManager->support($object)) {
            $this->modelManager->remove($object, true);
        }
    }
}
