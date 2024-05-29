<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractInvoiceModel extends StripeModel
{
    #[StripeObjectParam(name: 'amount_due')]
    protected ?int $amountDue = null;

    #[StripeObjectParam(name: 'application_fee')]
    protected ?int $applicationFee = null;

    #[StripeObjectParam(name: 'attempt_count')]
    protected int $attemptCount = 0;

    #[StripeObjectParam]
    protected bool $attempted = false;

    #[StripeObjectParam]
    protected ?string $billing = null;

    #[StripeObjectParam]
    protected ?string $charge = null;

    #[StripeObjectParam]
    protected bool $closed = false;

    #[StripeObjectParam(name: 'discount', embeddedId: 'coupon.id')]
    protected ?string $coupon = null;

    #[StripeObjectParam]
    protected ?string $currency = null;

    #[StripeObjectParam]
    protected ?string $customer = null;

    #[StripeObjectParam]
    protected ?int $date = 0;

    #[StripeObjectParam]
    protected ?string $description = null;

    #[StripeObjectParam(name: 'due_date')]
    protected ?int $dueDate = null;

    #[StripeObjectParam(name: 'ending_balance')]
    protected ?int $endingBalance = null;

    #[StripeObjectParam]
    protected bool $forgiven = false;

    /**
     * @var array<int, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $lines = null;

    #[StripeObjectParam]
    protected bool $livemode = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam(name: 'next_payment_attempt')]
    protected ?int $nextPaymentAttempt = null;

    #[StripeObjectParam]
    protected ?string $number = null;

    #[StripeObjectParam]
    protected bool $paid = false;

    #[StripeObjectParam(name: 'period_end')]
    protected ?int $periodEnd = null;

    #[StripeObjectParam(name: 'period_start')]
    protected ?int $periodStart = null;

    #[StripeObjectParam(name: 'receipt_number')]
    protected ?string $receiptNumber = null;

    #[StripeObjectParam(name: 'starting_balance')]
    protected ?int $startingBalance = null;

    #[StripeObjectParam(name: 'statement_descriptor')]
    protected ?string $statementDescriptor = null;

    #[StripeObjectParam]
    protected ?string $subscription = null;

    #[StripeObjectParam(name: 'subscription_proration_date')]
    protected ?int $subscriptionProrationDate = null;

    #[StripeObjectParam]
    protected ?int $subtotal = null;

    #[StripeObjectParam]
    protected ?int $tax = null;

    #[StripeObjectParam(name: 'tax_percent')]
    protected ?float $taxPercent = null;

    #[StripeObjectParam]
    protected ?int $total = null;

    #[StripeObjectParam(name: 'webhooks_delivered_at')]
    protected ?int $webhooksDeliveredAt = null;

    public function getAmountDue(): ?int
    {
        return $this->amountDue;
    }

    public function setAmountDue(?int $amountDue): static
    {
        $this->amountDue = $amountDue;

        return $this;
    }

    public function getApplicationFee(): ?int
    {
        return $this->applicationFee;
    }

    public function setApplicationFee(?int $applicationFee): static
    {
        $this->applicationFee = $applicationFee;

        return $this;
    }

    public function getAttemptCount(): int
    {
        return $this->attemptCount;
    }

    public function setAttemptCount(int $attemptCount): static
    {
        $this->attemptCount = $attemptCount;

        return $this;
    }

    public function isAttempted(): bool
    {
        return $this->attempted;
    }

    public function setAttempted(bool $attempted): static
    {
        $this->attempted = $attempted;

        return $this;
    }

    public function getBilling(): ?string
    {
        return $this->billing;
    }

    public function setBilling(?string $billing): static
    {
        $this->billing = $billing;

        return $this;
    }

    public function getCharge(): ?string
    {
        return $this->charge;
    }

    public function setCharge(?string $charge): static
    {
        $this->charge = $charge;

        return $this;
    }

    public function isClosed(): bool
    {
        return $this->closed;
    }

    public function setClosed(bool $closed): static
    {
        $this->closed = $closed;

        return $this;
    }

    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    public function setCoupon(?string $coupon): static
    {
        $this->coupon = $coupon;

        return $this;
    }

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(?string $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    public function getDate(): ?int
    {
        return $this->date;
    }

    public function setDate(?int $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDueDate(): ?int
    {
        return $this->dueDate;
    }

    public function setDueDate(?int $dueDate): static
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getEndingBalance(): ?int
    {
        return $this->endingBalance;
    }

    public function setEndingBalance(?int $endingBalance): static
    {
        $this->endingBalance = $endingBalance;

        return $this;
    }

    public function isForgiven(): bool
    {
        return $this->forgiven;
    }

    public function setForgiven(bool $forgiven): static
    {
        $this->forgiven = $forgiven;

        return $this;
    }

    /**
     * @return array<int, mixed>|null
     */
    public function getLines(): ?array
    {
        return $this->lines;
    }

    /**
     * @param array<int, mixed>|null $lines
     */
    public function setLines(?array $lines): static
    {
        $this->lines = $lines;

        return $this;
    }

    public function isLivemode(): bool
    {
        return $this->livemode;
    }

    public function setLivemode(bool $livemode): static
    {
        $this->livemode = $livemode;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array<string, mixed>|null $metadata
     *
     * @return $this
     */
    public function setMetadata(?array $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getNextPaymentAttempt(): ?int
    {
        return $this->nextPaymentAttempt;
    }

    public function setNextPaymentAttempt(?int $nextPaymentAttempt): static
    {
        $this->nextPaymentAttempt = $nextPaymentAttempt;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function isPaid(): bool
    {
        return $this->paid;
    }

    public function setPaid(bool $paid): static
    {
        $this->paid = $paid;

        return $this;
    }

    public function getPeriodEnd(): ?int
    {
        return $this->periodEnd;
    }

    public function setPeriodEnd(?int $periodEnd): static
    {
        $this->periodEnd = $periodEnd;

        return $this;
    }

    public function getPeriodStart(): ?int
    {
        return $this->periodStart;
    }

    public function setPeriodStart(?int $periodStart): static
    {
        $this->periodStart = $periodStart;

        return $this;
    }

    public function getReceiptNumber(): ?string
    {
        return $this->receiptNumber;
    }

    public function setReceiptNumber(?string $receiptNumber): static
    {
        $this->receiptNumber = $receiptNumber;

        return $this;
    }

    public function getStartingBalance(): ?int
    {
        return $this->startingBalance;
    }

    public function setStartingBalance(?int $startingBalance): static
    {
        $this->startingBalance = $startingBalance;

        return $this;
    }

    public function getStatementDescriptor(): ?string
    {
        return $this->statementDescriptor;
    }

    public function setStatementDescriptor(?string $statementDescriptor): static
    {
        $this->statementDescriptor = $statementDescriptor;

        return $this;
    }

    public function getSubscription(): ?string
    {
        return $this->subscription;
    }

    public function setSubscription(?string $subscription): static
    {
        $this->subscription = $subscription;

        return $this;
    }

    public function getSubscriptionProrationDate(): ?int
    {
        return $this->subscriptionProrationDate;
    }

    public function setSubscriptionProrationDate(?int $subscriptionProrationDate): static
    {
        $this->subscriptionProrationDate = $subscriptionProrationDate;

        return $this;
    }

    public function getSubtotal(): ?int
    {
        return $this->subtotal;
    }

    public function setSubtotal(?int $subtotal): static
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getTax(): ?int
    {
        return $this->tax;
    }

    public function setTax(?int $tax): static
    {
        $this->tax = $tax;

        return $this;
    }

    public function getTaxPercent(): ?float
    {
        return $this->taxPercent;
    }

    public function setTaxPercent(?float $taxPercent): static
    {
        $this->taxPercent = $taxPercent;

        return $this;
    }

    public function getTotal(): ?int
    {
        return $this->total;
    }

    public function setTotal(?int $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getWebhooksDeliveredAt(): ?int
    {
        return $this->webhooksDeliveredAt;
    }

    public function setWebhooksDeliveredAt(?int $webhooksDeliveredAt): static
    {
        $this->webhooksDeliveredAt = $webhooksDeliveredAt;

        return $this;
    }
}
