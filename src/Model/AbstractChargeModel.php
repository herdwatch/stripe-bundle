<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractChargeModel extends StripeModel
{
    /**
     * @var int
     */
    #[StripeObjectParam]
    protected $amount;

    /**
     * @var int
     */
    #[StripeObjectParam(name: 'amount_refunded')]
    protected $amountRefunded;

    /**
     * @var string
     */
    #[StripeObjectParam(name: 'balance_transaction')]
    protected $balanceTransaction;

    /**
     * @var bool
     */
    #[StripeObjectParam]
    protected $captured;

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
    protected $customer;

    /**
     * @var string
     */
    #[StripeObjectParam]
    protected $description;

    /**
     * @var string
     */
    protected $dispute;

    /**
     * @var string
     */
    #[StripeObjectParam(name: 'failure_code')]
    protected $failureCode;

    /**
     * @var string
     */
    #[StripeObjectParam(name: 'failure_message')]
    protected $failureMessage;

    /**
     * @var array
     */
    #[StripeObjectParam(name: 'fraud_details')]
    protected $fraudDetails;

    /**
     * @var string
     */
    #[StripeObjectParam]
    protected $invoice;

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
    protected $order;

    /**
     * @var array
     */
    #[StripeObjectParam]
    protected $outcome;

    /**
     * @var bool
     */
    #[StripeObjectParam]
    protected $paid;

    /**
     * @var string
     */
    #[StripeObjectParam(name: 'receipt_email')]
    protected $receiptEmail;

    /**
     * @var string
     */
    #[StripeObjectParam(name: 'receipt_number')]
    protected $receiptNumber;

    /**
     * @var bool
     */
    #[StripeObjectParam]
    protected $refunded;

    /**
     * @var array
     */
    #[StripeObjectParam]
    protected $shipping;

    /**
     * @var string
     */
    #[StripeObjectParam(embeddedId: 'id')]
    protected $source;

    /**
     * @var string
     */
    #[StripeObjectParam(name: 'statement_descriptor')]
    protected $statementDescriptor;

    /**
     * @var string
     */
    #[StripeObjectParam]
    protected $status;

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
    public function getAmountRefunded()
    {
        return $this->amountRefunded;
    }

    /**
     * @param int $amountRefunded
     *
     * @return $this
     */
    public function setAmountRefunded($amountRefunded)
    {
        $this->amountRefunded = $amountRefunded;

        return $this;
    }

    /**
     * @return string
     */
    public function getBalanceTransaction()
    {
        return $this->balanceTransaction;
    }

    /**
     * @param string $balanceTransaction
     *
     * @return $this
     */
    public function setBalanceTransaction($balanceTransaction)
    {
        $this->balanceTransaction = $balanceTransaction;

        return $this;
    }

    /**
     * @return bool
     */
    public function isCaptured()
    {
        return $this->captured;
    }

    /**
     * @param bool $captured
     *
     * @return $this
     */
    public function setCaptured($captured)
    {
        $this->captured = $captured;

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
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param string $customer
     *
     * @return $this
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDispute()
    {
        return $this->dispute;
    }

    /**
     * @param string $dispute
     *
     * @return $this
     */
    public function setDispute($dispute)
    {
        $this->dispute = $dispute;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureCode()
    {
        return $this->failureCode;
    }

    /**
     * @param string $failureCode
     *
     * @return $this
     */
    public function setFailureCode($failureCode)
    {
        $this->failureCode = $failureCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getFailureMessage()
    {
        return $this->failureMessage;
    }

    /**
     * @param string $failureMessage
     *
     * @return $this
     */
    public function setFailureMessage($failureMessage)
    {
        $this->failureMessage = $failureMessage;

        return $this;
    }

    /**
     * @return array
     */
    public function getFraudDetails()
    {
        return $this->fraudDetails;
    }

    /**
     * @param array $fraudDetails
     *
     * @return $this
     */
    public function setFraudDetails($fraudDetails)
    {
        $this->fraudDetails = $fraudDetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param string $invoice
     *
     * @return $this
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;

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
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param string $order
     *
     * @return $this
     */
    public function setOrder($order)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutcome()
    {
        return $this->outcome;
    }

    /**
     * @param array $outcome
     *
     * @return $this
     */
    public function setOutcome($outcome)
    {
        $this->outcome = $outcome;

        return $this;
    }

    /**
     * @return bool
     */
    public function isPaid()
    {
        return $this->paid;
    }

    /**
     * @param bool $paid
     *
     * @return $this
     */
    public function setPaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptEmail()
    {
        return $this->receiptEmail;
    }

    /**
     * @param string $receiptEmail
     *
     * @return $this
     */
    public function setReceiptEmail($receiptEmail)
    {
        $this->receiptEmail = $receiptEmail;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptNumber()
    {
        return $this->receiptNumber;
    }

    /**
     * @param string $receiptNumber
     *
     * @return $this
     */
    public function setReceiptNumber($receiptNumber)
    {
        $this->receiptNumber = $receiptNumber;

        return $this;
    }

    /**
     * @return bool
     */
    public function isRefunded()
    {
        return $this->refunded;
    }

    /**
     * @param bool $refunded
     *
     * @return $this
     */
    public function setRefunded($refunded)
    {
        $this->refunded = $refunded;

        return $this;
    }

    /**
     * @return array
     */
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * @param array $shipping
     *
     * @return $this
     */
    public function setShipping($shipping)
    {
        $this->shipping = $shipping;

        return $this;
    }

    /**
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $source
     *
     * @return $this
     */
    public function setSource($source)
    {
        $this->source = $source;

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
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
