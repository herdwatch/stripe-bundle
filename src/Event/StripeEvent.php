<?php

namespace Miracode\StripeBundle\Event;

use Miracode\StripeBundle\StripeException;
use Stripe\StripeObject;
use Symfony\Contracts\EventDispatcher\Event;

class StripeEvent extends Event
{
    final public const CHARGE_CAPTURED = 'stripe.charge.captured';
    final public const CHARGE_FAILED = 'stripe.charge.failed';
    final public const CHARGE_PENDING = 'stripe.charge.pending';
    final public const CHARGE_REFUND_UPDATED = 'stripe.charge.refund.updated';
    final public const CHARGE_REFUNDED = 'stripe.charge.refunded';
    final public const CHARGE_SUCCEEDED = 'stripe.charge.succeeded';
    final public const CHARGE_UPDATED = 'stripe.charge.updated';
    final public const COUPON_CREATED = 'stripe.coupon.created';
    final public const COUPON_DELETED = 'stripe.coupon.deleted';
    final public const COUPON_UPDATED = 'stripe.coupon.updated';
    final public const CHECKOUT_SESSION_COMPLETED = 'stripe.checkout.session.completed';
    final public const CHECKOUT_SESSION_EXPIRED = 'stripe.checkout.session.expired';
    final public const CUSTOMER_CREATED = 'stripe.customer.created';
    final public const CUSTOMER_DELETED = 'stripe.customer.deleted';
    final public const CUSTOMER_UPDATED = 'stripe.customer.updated';
    final public const CUSTOMER_DISCOUNT_CREATED = 'stripe.customer.discount.created';
    final public const CUSTOMER_DISCOUNT_DELETED = 'stripe.customer.discount.deleted';
    final public const CUSTOMER_DISCOUNT_UPDATED = 'stripe.customer.discount.updated';
    final public const CUSTOMER_SOURCE_CREATED = 'stripe.customer.source.created';
    final public const CUSTOMER_SOURCE_DELETED = 'stripe.customer.source.deleted';
    final public const CUSTOMER_SOURCE_UPDATED = 'stripe.customer.source.updated';
    final public const CUSTOMER_SUBSCRIPTION_CREATED = 'stripe.customer.subscription.created';
    final public const CUSTOMER_SUBSCRIPTION_DELETED = 'stripe.customer.subscription.deleted';
    final public const CUSTOMER_SUBSCRIPTION_UPDATED = 'stripe.customer.subscription.updated';
    final public const CUSTOMER_SUBSCRIPTION_TRAIL_WILL_END = 'stripe.customer.subscription.trial_will_end';
    final public const INVOICE_CREATED = 'stripe.invoice.created';
    final public const INVOICE_PAYMENT_FAILED = 'stripe.invoice.payment_failed';
    final public const INVOICE_PAYMENT_SUCCEEDED = 'stripe.invoice.payment_succeeded';
    final public const INVOICE_SENT = 'stripe.invoice.sent';
    final public const INVOICE_UPCOMING = 'stripe.invoice.upcoming';
    final public const INVOICE_UPDATED = 'stripe.invoice.updated';
    final public const MANDATE_UPDATED = 'stripe.mandate.updated';
    final public const PLAN_CREATED = 'stripe.plan.created';
    final public const PLAN_DELETED = 'stripe.plan.deleted';
    final public const PLAN_UPDATED = 'stripe.plan.updated';
    final public const PAYMENT_INTENT_AMOUNT_CAPTURABLE_UPDATED = 'stripe.payment_intent.amount_capturable_updated';
    final public const PAYMENT_INTENT_CANCELLED = 'stripe.payment_intent.canceled';
    final public const PAYMENT_INTENT_CREATED = 'stripe.payment_intent.created';
    final public const PAYMENT_INTENT_PAYMENT_FILED = 'stripe.payment_intent.payment_failed';
    final public const PAYMENT_INTENT_PROCESSING = 'stripe.payment_intent.processing';
    final public const PAYMENT_INTENT_REQURIES_ACTION = 'stripe.payment_intent.requires_action';
    final public const PAYMENT_INTENT_SUCCEEDED = 'stripe.payment_intent.succeeded';
    final public const PAYMENT_METHOD_ATTACHED = 'stripe.payment_method.attached';
    final public const PAYMENT_METHOD_DETACHED = 'stripe.payment_method.detached';
    final public const PAYMENT_METHOD_UPDATED = 'stripe.payment_method.updated';
    final public const PAYMENT_METHOD_AUTOMATICALLY_UPDATED = 'stripe.payment_method.automatically_updated';
    final public const SETUP_INTENT_CANCELED = 'stripe.setup_intent.canceled';
    final public const SETUP_INTENT_CREATED = 'stripe.setup_intent.created';
    final public const SETUP_INTENT_REQUIRES_ACTION = 'stripe.setup_intent.requires_action';
    final public const SETUP_INTENT_SETUP_FILED = 'stripe.setup_intent.setup_failed';
    final public const SETUP_INTENT_SUCCEEDED = 'stripe.setup_intent.succeeded';
    final public const SOURCE_CANCELED = 'stripe.source.canceled';
    final public const SOURCE_CHARGEABLE = 'stripe.source.chargeable';
    final public const SOURCE_FAILED = 'stripe.source.failed';

    /**
     * StripeEventType constructor.
     *
     * @param StripeObject $event
     */
    public function __construct(protected $event)
    {
    }

    /**
     * Get stripe event object.
     *
     * @return StripeObject
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Get event data object.
     *
     * @return StripeObject
     *
     * @throws StripeException
     */
    public function getDataObject()
    {
        $event = $this->getEvent();
        if (!isset($event['data']) || !isset($event['data']['object'])) {
            throw new StripeException('Invalid event data');
        }

        return $event['data']['object'];
    }
}
