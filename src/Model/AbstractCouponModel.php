<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractCouponModel extends StripeModel
{
    /**
     * @var int
     */
    #[StripeObjectParam(name: 'amount_off')]
    protected $amountOff;

    /**
     * @var int
     */
    #[StripeObjectParam]
    protected $created;

    /**
     * @var string
     */
    #[StripeObjectParam]
    protected $currency;

    /**
     * @var string
     */
    #[StripeObjectParam]
    protected $duration;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'duration_in_months')]
    protected $durationInMonths;

    /**
     * @var bool
     */
    #[StripeObjectParam]
    protected $livemode;

    /**
     * @var array
     */
    #[StripeObjectParam]
    protected $metadata;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'max_redemptions')]
    protected $maxRedemptions;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'percent_off')]
    protected $percentOff;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'redeem_by')]
    protected $redeemBy;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'times_redeemed')]
    protected $timesRedeemed;

    /**
     * @var bool
     */
    #[StripeObjectParam]
    protected $valid;

    /**
     * @return int
     */
    public function getAmountOff()
    {
        return $this->amountOff;
    }

    /**
     * @param int $amountOff
     *
     * @return $this
     */
    public function setAmountOff($amountOff)
    {
        $this->amountOff = $amountOff;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param int $created
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     *
     * @return $this
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return int
     */
    public function getDurationInMonths()
    {
        return $this->durationInMonths;
    }

    /**
     * @param int $durationInMonths
     *
     * @return $this
     */
    public function setDurationInMonths($durationInMonths)
    {
        $this->durationInMonths = $durationInMonths;

        return $this;
    }

    /**
     * @return bool
     */
    public function isLivemode()
    {
        return $this->livemode;
    }

    /**
     * @param bool $livemode
     *
     * @return $this
     */
    public function setLivemode($livemode)
    {
        $this->livemode = $livemode;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param array $metadata
     *
     * @return $this
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxRedemptions()
    {
        return $this->maxRedemptions;
    }

    /**
     * @param int $maxRedemptions
     *
     * @return $this
     */
    public function setMaxRedemptions($maxRedemptions)
    {
        $this->maxRedemptions = $maxRedemptions;

        return $this;
    }

    /**
     * @return int
     */
    public function getPercentOff()
    {
        return $this->percentOff;
    }

    /**
     * @param int $percentOff
     *
     * @return $this
     */
    public function setPercentOff($percentOff)
    {
        $this->percentOff = $percentOff;

        return $this;
    }

    /**
     * @return int
     */
    public function getRedeemBy()
    {
        return $this->redeemBy;
    }

    /**
     * @param int $redeemBy
     *
     * @return $this
     */
    public function setRedeemBy($redeemBy)
    {
        $this->redeemBy = $redeemBy;

        return $this;
    }

    /**
     * @return int
     */
    public function getTimesRedeemed()
    {
        return $this->timesRedeemed;
    }

    /**
     * @param int $timesRedeemed
     *
     * @return $this
     */
    public function setTimesRedeemed($timesRedeemed)
    {
        $this->timesRedeemed = $timesRedeemed;

        return $this;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @param bool $valid
     *
     * @return $this
     */
    public function setValid($valid)
    {
        $this->valid = $valid;

        return $this;
    }
}
