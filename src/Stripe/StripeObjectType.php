<?php

namespace Miracode\StripeBundle\Stripe;

class StripeObjectType
{
    /**
     * Stripe object types.
     */
    final public const CARD = 'card';

    final public const CHARGE = 'charge';
    final public const COUPON = 'coupon';
    final public const CUSTOMER = 'customer';
    final public const DISCOUNT = 'discount';
    final public const EVENT = 'event';
    final public const INVOICE = 'invoice';
    final public const PLAN = 'plan';
    final public const REFUND = 'refund';
    final public const SUBSCRIPTION = 'subscription';
    final public const COLLECTION = 'list';
}
