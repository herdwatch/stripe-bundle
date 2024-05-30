<?php

namespace Miracode\StripeBundle\Event;

use Miracode\StripeBundle\StripeException;
use Stripe\StripeObject;
use Symfony\Contracts\EventDispatcher\Event;

class StripeEvent extends Event
{
    final public const CHARGE_CAPTURED = 'stripe.charge.captured';
    final public const CHARGE_DISPUTE_CLOSED = 'stripe.charge.dispute.closed';
    final public const CHARGE_DISPUTE_CREATED = 'stripe.charge.dispute.created';
    final public const CHARGE_DISPUTE_FUNDS_REINSTATED = 'stripe.charge.dispute.funds_reinstated';
    final public const CHARGE_DISPUTE_FUNDS_WITHDRAWN = 'stripe.charge.dispute.funds_withdrawn';
    final public const CHARGE_DISPUTE_UPDATED = 'stripe.charge.dispute.updated';
    final public const CHARGE_EXPIRED = 'stripe.charge.expired';
    final public const CHARGE_FAILED = 'stripe.charge.failed';
    final public const CHARGE_PENDING = 'stripe.charge.pending';
    final public const CHARGE_REFUNDED = 'stripe.charge.refunded';
    final public const CHARGE_REFUND_UPDATED = 'stripe.charge.refund.updated';
    final public const CHARGE_SUCCEEDED = 'stripe.charge.succeeded';
    final public const CHARGE_UPDATED = 'stripe.charge.updated';
    final public const CHECKOUT_SESSION_ASYNC_PAYMENT_FAILED = 'stripe.checkout.session.async_payment_failed';
    final public const CHECKOUT_SESSION_ASYNC_PAYMENT_SUCCEEDED = 'stripe.checkout.session.async_payment_succeeded';
    final public const CHECKOUT_SESSION_COMPLETED = 'stripe.checkout.session.completed';
    final public const CHECKOUT_SESSION_EXPIRED = 'stripe.checkout.session.expired';
    final public const COUPON_CREATED = 'stripe.coupon.created';
    final public const COUPON_DELETED = 'stripe.coupon.deleted';
    final public const COUPON_UPDATED = 'stripe.coupon.updated';
    final public const CUSTOMER_BANK_ACCOUNT_CREATED = 'stripe.customer.bank_account.created';
    final public const CUSTOMER_BANK_ACCOUNT_DELETED = 'stripe.customer.bank_account.deleted';
    final public const CUSTOMER_BANK_ACCOUNT_UPDATED = 'stripe.customer.bank_account.updated';
    final public const CUSTOMER_CARD_CREATED = 'stripe.customer.card.created';
    final public const CUSTOMER_CARD_DELETED = 'stripe.customer.card.deleted';
    final public const CUSTOMER_CARD_UPDATED = 'stripe.customer.card.updated';
    final public const CUSTOMER_CASH_BALANCE_TRANSACTION_CREATED = 'stripe.customer_cash_balance_transaction.created';
    final public const CUSTOMER_CREATED = 'stripe.customer.created';
    final public const CUSTOMER_DELETED = 'stripe.customer.deleted';
    final public const CUSTOMER_DISCOUNT_CREATED = 'stripe.customer.discount.created';
    final public const CUSTOMER_DISCOUNT_DELETED = 'stripe.customer.discount.deleted';
    final public const CUSTOMER_DISCOUNT_UPDATED = 'stripe.customer.discount.updated';
    final public const CUSTOMER_SOURCE_CREATED = 'stripe.customer.source.created';
    final public const CUSTOMER_SOURCE_DELETED = 'stripe.customer.source.deleted';
    final public const CUSTOMER_SOURCE_EXPIRING = 'stripe.customer.source.expiring';
    final public const CUSTOMER_SOURCE_UPDATED = 'stripe.customer.source.updated';
    final public const CUSTOMER_SUBSCRIPTION_CREATED = 'stripe.customer.subscription.created';
    final public const CUSTOMER_SUBSCRIPTION_DELETED = 'stripe.customer.subscription.deleted';
    final public const CUSTOMER_SUBSCRIPTION_TRAIL_WILL_END = 'stripe.customer.subscription.trial_will_end';
    final public const CUSTOMER_SUBSCRIPTION_TRIAL_WILL_END = 'stripe.customer.subscription.trial_will_end';
    final public const CUSTOMER_SUBSCRIPTION_UPDATED = 'stripe.customer.subscription.updated';
    final public const CUSTOMER_TAX_ID_CREATED = 'stripe.customer.tax_id.created';
    final public const CUSTOMER_TAX_ID_DELETED = 'stripe.customer.tax_id.deleted';
    final public const CUSTOMER_TAX_ID_UPDATED = 'stripe.customer.tax_id.updated';
    final public const CUSTOMER_UPDATED = 'stripe.customer.updated';
    final public const FILE_CREATED = 'stripe.file.created';
    final public const FINANCIAL_CONNECTION_ACCOUNT_CREATED = 'stripe.financial_connections.account.created';
    final public const FINANCIAL_CONNECTION_ACCOUNT_DIACTIVATED = 'stripe.financial_connections.account.deactivated';
    final public const FINANCIAL_CONNECTION_ACCOUNT_DISCONNECTED = 'stripe.financial_connections.account.disconnected';
    final public const FINANCIAL_CONNECTION_ACCOUNT_REACTIVATED = 'stripe.financial_connections.account.reactivated';
    final public const FINANCIAL_CONNECTION_ACCOUNT_REFRESH_BALANCE = 'stripe.financial_connections.account.refreshed_balance';
    final public const FINANCIAL_CONNECTION_ACCOUNT_REFRESH_OWNERSHIP = 'stripe.financial_connections.account.refreshed_ownership';
    final public const FINANCIAL_CONNECTION_ACCOUNT_REFRESH_TRANSACTIONS = 'stripe.financial_connections.account.refreshed_transactions';
    final public const IDENTITY_VERIFICATION_SESSION_CANCELLED = 'stripe.identity.verification_session.canceled';
    final public const IDENTITY_VERIFICATION_SESSION_CREATED = 'stripe.identity.verification_session.created';
    final public const IDENTITY_VERIFICATION_SESSION_PROCESSING = 'stripe.identity.verification_session.processing';
    final public const IDENTITY_VERIFICATION_SESSION_REQUIRES_INPUT = 'stripe.identity.verification_session.requires_input';
    final public const IDENTITY_VERIFICATION_SESSION_VERIFIED = 'stripe.identity.verification_session.verified';
    final public const INVOICE_CREATED = 'stripe.invoice.created';
    final public const INVOICE_DELETED = 'stripe.invoice.deleted';
    final public const INVOICE_FINALIZATION_FILED = 'stripe.invoice.finalization_failed';
    final public const INVOICE_FINALIZED = 'stripe.invoice.finalized';
    final public const INVOICE_ITEM_DELETED = 'stripe.invoiceitem.deleted';
    final public const INVOICE_ITEM_UPDATED = 'stripe.invoiceitem.updated';
    final public const INVOICE_MARKED_UNCOLLECTABLE = 'stripe.invoice.marked_uncollectible';
    final public const INVOICE_OVERDUE = 'stripe.invoice.overdue';
    final public const INVOICE_PAID = 'stripe.invoice.paid';
    final public const INVOICE_PAYMENT_ACTION_REQUIRED = 'stripe.invoice.payment_action_required';
    final public const INVOICE_PAYMENT_FAILED = 'stripe.invoice.payment_failed';
    final public const INVOICE_PAYMENT_SUCCEEDED = 'stripe.invoice.payment_succeeded';
    final public const INVOICE_SENT = 'stripe.invoice.sent';
    final public const INVOICE_UPCOMING = 'stripe.invoice.upcoming';
    final public const INVOICE_UPDATED = 'stripe.invoice.updated';
    final public const INVOICE_VOIDED = 'stripe.invoice.voided';
    final public const INVOICE_WILL_BE_DUE = 'stripe.invoice.will_be_due';
    final public const MANDATE_UPDATED = 'stripe.mandate.updated';
    final public const PAYMENT_INTENT_AMOUNT_CAPTURABLE_UPDATED = 'stripe.payment_intent.amount_capturable_updated';
    final public const PAYMENT_INTENT_CANCELLED = 'stripe.payment_intent.canceled';
    final public const PAYMENT_INTENT_CREATED = 'stripe.payment_intent.created';
    final public const PAYMENT_INTENT_PARTIALLY_FUNDED = 'stripe.payment_intent.partially_funded';
    final public const PAYMENT_INTENT_PAYMENT_FILED = 'stripe.payment_intent.payment_failed';
    final public const PAYMENT_INTENT_PROCESSING = 'stripe.payment_intent.processing';
    final public const PAYMENT_INTENT_REQURIES_ACTION = 'stripe.payment_intent.requires_action';
    final public const PAYMENT_INTENT_SUCCEEDED = 'stripe.payment_intent.succeeded';
    final public const PAYMENT_LINK_CREATED = 'stripe.payment_link.created';
    final public const PAYMENT_LINK_UPDATED = 'stripe.payment_link.updated';
    final public const PAYMENT_METHOD_ATTACHED = 'stripe.payment_method.attached';
    final public const PAYMENT_METHOD_AUTOMATICALLY_UPDATED = 'stripe.payment_method.automatically_updated';
    final public const PAYMENT_METHOD_CARD_AUTOMATICALLY_UPDATED = 'stripe.payment_method.card_automatically_updated';
    final public const PAYMENT_METHOD_DETACHED = 'stripe.payment_method.detached';
    final public const PAYMENT_METHOD_UPDATED = 'stripe.payment_method.updated';
    final public const PAYOUT_PAID = 'stripe.payout.paid';
    final public const PLAN_CREATED = 'stripe.plan.created';
    final public const PLAN_DELETED = 'stripe.plan.deleted';
    final public const PLAN_UPDATED = 'stripe.plan.updated';
    final public const PRICE_CREATED = 'stripe.price.created';
    final public const PRICE_DELETED = 'stripe.price.deleted';
    final public const PRICE_UPDATED = 'stripe.price.updated';
    final public const PRODUCT_CREATED = 'stripe.product.created';
    final public const PRODUCT_DELETED = 'stripe.product.deleted';
    final public const PRODUCT_UPDATED = 'stripe.product.updated';
    final public const RADAR_EARLY_FRAUD_WARNING_CREATED = 'stripe.radar.early_fraud_warning.created';
    final public const RADAR_EARLY_FRAUD_WARNING_UPDATED = 'stripe.radar.early_fraud_warning.updated';
    final public const REFUND_CREATED = 'stripe.refund.created';
    final public const REPORT_RUN_SUCCEEDED = 'stripe.reporting.report_run.succeeded';
    final public const SETUP_INTENT_CANCELED = 'stripe.setup_intent.canceled';
    final public const SETUP_INTENT_CREATED = 'stripe.setup_intent.created';
    final public const SETUP_INTENT_REQUIRES_ACTION = 'stripe.setup_intent.requires_action';
    final public const SETUP_INTENT_SETUP_FILED = 'stripe.setup_intent.setup_failed';
    final public const SETUP_INTENT_SUCCEEDED = 'stripe.setup_intent.succeeded';
    final public const SOURCE_CANCELED = 'stripe.source.canceled';
    final public const SOURCE_CHARGEABLE = 'stripe.source.chargeable';
    final public const SOURCE_FAILED = 'stripe.source.failed';
    final public const TAX_RATE_CREATED = 'stripe.tax_rate.created';
    final public const TAX_RATE_UPDATED = 'stripe.tax_rate.updated';

    public function __construct(protected StripeObject $event)
    {
    }

    public function getEvent(): StripeObject
    {
        return $this->event;
    }

    /**
     * @throws StripeException
     */
    public function getDataObject(): StripeObject
    {
        $event = $this->getEvent();
        if (!isset($event['data']['object'])) {
            throw new StripeException('Invalid event data');
        }

        return $event['data']['object'];
    }
}
