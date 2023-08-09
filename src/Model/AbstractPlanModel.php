<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractPlanModel extends StripeModel
{
    /**
     * @var int
     */
    #[StripeObjectParam]
    protected $amount;

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
    protected $interval;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'interval_count')]
    protected $intervalCount;

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
     * @var string
     */
    #[StripeObjectParam]
    protected $name;

    /**
     * @var string
     */
    #[StripeObjectParam(name: 'statement_descriptor')]
    protected $statementDescriptor;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'trial_period_days')]
    protected $trialPeriodDays;

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

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
    public function getInterval()
    {
        return $this->interval;
    }

    /**
     * @param string $interval
     *
     * @return $this
     */
    public function setInterval($interval)
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * @return int
     */
    public function getIntervalCount()
    {
        return $this->intervalCount;
    }

    /**
     * @param int $intervalCount
     *
     * @return $this
     */
    public function setIntervalCount($intervalCount)
    {
        $this->intervalCount = $intervalCount;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatementDescriptor()
    {
        return $this->statementDescriptor;
    }

    /**
     * @param string $statementDescriptor
     *
     * @return $this
     */
    public function setStatementDescriptor($statementDescriptor)
    {
        $this->statementDescriptor = $statementDescriptor;

        return $this;
    }

    /**
     * @return int
     */
    public function getTrialPeriodDays()
    {
        return $this->trialPeriodDays;
    }

    /**
     * @param int $trialPeriodDays
     *
     * @return $this
     */
    public function setTrialPeriodDays($trialPeriodDays)
    {
        $this->trialPeriodDays = $trialPeriodDays;

        return $this;
    }
}
