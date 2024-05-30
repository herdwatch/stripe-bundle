<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractPlanModel extends StripeModel
{
    #[StripeObjectParam]
    protected ?int $amount = null;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam]
    protected ?string $currency = null;

    #[StripeObjectParam]
    protected ?string $interval = null;

    #[StripeObjectParam(name: 'interval_count')]
    protected ?int $intervalCount = null;

    #[StripeObjectParam]
    protected bool $livemode = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam]
    protected ?string $name = null;

    #[StripeObjectParam(name: 'statement_descriptor')]
    protected ?string $statementDescriptor = null;

    #[StripeObjectParam(name: 'trial_period_days')]
    protected ?int $trialPeriodDays = null;

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;

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

    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    public function setCurrency(?string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getInterval(): ?string
    {
        return $this->interval;
    }

    public function setInterval(?string $interval): static
    {
        $this->interval = $interval;

        return $this;
    }

    public function getIntervalCount(): ?int
    {
        return $this->intervalCount;
    }

    public function setIntervalCount(?int $intervalCount): static
    {
        $this->intervalCount = $intervalCount;

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
     */
    public function setMetadata(?array $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

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

    public function getTrialPeriodDays(): ?int
    {
        return $this->trialPeriodDays;
    }

    public function setTrialPeriodDays(?int $trialPeriodDays): static
    {
        $this->trialPeriodDays = $trialPeriodDays;

        return $this;
    }
}
