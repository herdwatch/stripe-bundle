<?php

namespace Miracode\StripeBundle\Stripe;

class StripeObjectType
{
    /**
     * Stripe object types.
     */
    final public const string CARD = 'card';

    final public const string CHARGE = 'charge';
    final public const string COUPON = 'coupon';
    final public const string CUSTOMER = 'customer';
    final public const string DISCOUNT = 'discount';
    final public const string EVENT = 'event';
    final public const string INVOICE = 'invoice';
    final public const string PLAN = 'plan';
    final public const string REFUND = 'refund';
    final public const string SUBSCRIPTION = 'subscription';
    final public const string COLLECTION = 'list';
}
