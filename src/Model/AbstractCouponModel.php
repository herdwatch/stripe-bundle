<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractCouponModel extends StripeModel
{
    #[StripeObjectParam(name: 'amount_off')]
    protected ?int $amountOff = null;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam]
    protected ?string $currency = null;

    #[StripeObjectParam]
    protected ?string $duration = null;

    #[StripeObjectParam(name: 'duration_in_months')]
    protected ?int $durationInMonths = null;

    #[StripeObjectParam]
    protected bool $livemode = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam(name: 'max_redemptions')]
    protected ?int $maxRedemptions = null;

    #[StripeObjectParam(name: 'percent_off')]
    protected ?int $percentOff = null;

    #[StripeObjectParam(name: 'redeem_by')]
    protected ?int $redeemBy = null;

    #[StripeObjectParam(name: 'times_redeemed')]
    protected ?int $timesRedeemed = null;

    #[StripeObjectParam]
    protected bool $valid = false;

    public function getAmountOff(): ?int
    {
        return $this->amountOff;
    }

    public function setAmountOff(?int $amountOff): static
    {
        $this->amountOff = $amountOff;

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

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(?string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getDurationInMonths(): ?int
    {
        return $this->durationInMonths;
    }

    public function setDurationInMonths(?int $durationInMonths): static
    {
        $this->durationInMonths = $durationInMonths;

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

    public function getMaxRedemptions(): ?int
    {
        return $this->maxRedemptions;
    }

    public function setMaxRedemptions(?int $maxRedemptions): static
    {
        $this->maxRedemptions = $maxRedemptions;

        return $this;
    }

    public function getPercentOff(): ?int
    {
        return $this->percentOff;
    }

    public function setPercentOff(?int $percentOff): static
    {
        $this->percentOff = $percentOff;

        return $this;
    }

    public function getRedeemBy(): ?int
    {
        return $this->redeemBy;
    }

    public function setRedeemBy(?int $redeemBy): static
    {
        $this->redeemBy = $redeemBy;

        return $this;
    }

    public function getTimesRedeemed(): ?int
    {
        return $this->timesRedeemed;
    }

    public function setTimesRedeemed(?int $timesRedeemed): static
    {
        $this->timesRedeemed = $timesRedeemed;

        return $this;
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function setValid(bool $valid): static
    {
        $this->valid = $valid;

        return $this;
    }
}
