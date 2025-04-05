<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractSubscriptionModel extends StripeModel
{
    #[StripeObjectParam(name: 'application_fee_percent')]
    protected ?float $applicationFeePercent = null;

    #[StripeObjectParam]
    protected ?string $billing = null;

    #[StripeObjectParam(name: 'cancel_at_period_end')]
    protected bool $cancelAtPeriodEnd = false;

    #[StripeObjectParam(name: 'canceled_at')]
    protected ?int $canceledAt = null;

    #[StripeObjectParam(name: 'discount', embeddedId: 'coupon.id')]
    protected ?string $coupon = null;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam(name: 'current_period_end')]
    protected ?int $currentPeriodEnd = null;

    #[StripeObjectParam(name: 'current_period_start')]
    protected ?int $currentPeriodStart = null;

    #[StripeObjectParam]
    protected ?string $customer = null;

    #[StripeObjectParam(name: 'days_until_due')]
    protected ?int $daysUntilDue = null;

    #[StripeObjectParam(name: 'ended_at')]
    protected ?int $endedAt = null;

    /**
     * @var array<int, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $items = null;

    #[StripeObjectParam]
    protected bool $liveMode = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam(embeddedId: 'id')]
    protected ?string $plan = null;

    #[StripeObjectParam]
    protected ?int $quantity = null;

    #[StripeObjectParam]
    protected ?int $start = null;

    #[StripeObjectParam]
    protected ?string $status = null;

    #[StripeObjectParam(name: 'tax_percent')]
    protected ?float $taxPercent = null;

    #[StripeObjectParam(name: 'trial_end')]
    protected ?int $trialEnd = null;

    #[StripeObjectParam(name: 'trial_start')]
    protected ?int $trialStart = null;

    public function getApplicationFeePercent(): ?float
    {
        return $this->applicationFeePercent;
    }

    public function setApplicationFeePercent(?float $applicationFeePercent): static
    {
        $this->applicationFeePercent = $applicationFeePercent;

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

    public function isCancelAtPeriodEnd(): bool
    {
        return $this->cancelAtPeriodEnd;
    }

    public function setCancelAtPeriodEnd(bool $cancelAtPeriodEnd): static
    {
        $this->cancelAtPeriodEnd = $cancelAtPeriodEnd;

        return $this;
    }

    public function getCanceledAt(): ?int
    {
        return $this->canceledAt;
    }

    public function setCanceledAt(?int $canceledAt): static
    {
        $this->canceledAt = $canceledAt;

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

    public function getCreated(): int
    {
        return $this->created;
    }

    public function setCreated(int $created): static
    {
        $this->created = $created;

        return $this;
    }

    public function getCurrentPeriodEnd(): ?int
    {
        return $this->currentPeriodEnd;
    }

    public function setCurrentPeriodEnd(?int $currentPeriodEnd): static
    {
        $this->currentPeriodEnd = $currentPeriodEnd;

        return $this;
    }

    public function getCurrentPeriodStart(): ?int
    {
        return $this->currentPeriodStart;
    }

    public function setCurrentPeriodStart(?int $currentPeriodStart): static
    {
        $this->currentPeriodStart = $currentPeriodStart;

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

    public function getDaysUntilDue(): ?int
    {
        return $this->daysUntilDue;
    }

    public function setDaysUntilDue(?int $daysUntilDue): static
    {
        $this->daysUntilDue = $daysUntilDue;

        return $this;
    }

    public function getEndedAt(): ?int
    {
        return $this->endedAt;
    }

    public function setEndedAt(?int $endedAt): static
    {
        $this->endedAt = $endedAt;

        return $this;
    }

    /**
     * @return array<int, mixed>|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param array<int, mixed>|null $items
     */
    public function setItems(?array $items): static
    {
        $this->items = $items;

        return $this;
    }

    public function isLiveMode(): bool
    {
        return $this->liveMode;
    }

    public function setLiveMode(bool $liveMode): static
    {
        $this->liveMode = $liveMode;

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
     */
    public function setMetadata(?array $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(?string $plan): static
    {
        $this->plan = $plan;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getStart(): ?int
    {
        return $this->start;
    }

    public function setStart(?int $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

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

    public function getTrialEnd(): ?int
    {
        return $this->trialEnd;
    }

    public function setTrialEnd(?int $trialEnd): static
    {
        $this->trialEnd = $trialEnd;

        return $this;
    }

    public function getTrialStart(): ?int
    {
        return $this->trialStart;
    }

    public function setTrialStart(?int $trialStart): static
    {
        $this->trialStart = $trialStart;

        return $this;
    }
}
