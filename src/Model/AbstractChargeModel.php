<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractChargeModel extends StripeModel
{
    #[StripeObjectParam]
    protected ?int $amount = null;

    #[StripeObjectParam(name: 'amount_refunded')]
    protected ?int $amountRefunded = null;

    #[StripeObjectParam(name: 'balance_transaction')]
    protected ?string $balanceTransaction = null;

    #[StripeObjectParam]
    protected bool $captured = false;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam]
    protected ?string $currency = null;

    #[StripeObjectParam]
    protected ?string $customer = null;

    #[StripeObjectParam]
    protected ?string $description = null;

    protected ?string $dispute = null;

    #[StripeObjectParam(name: 'failure_code')]
    protected ?string $failureCode = null;

    #[StripeObjectParam(name: 'failure_message')]
    protected ?string $failureMessage = null;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam(name: 'fraud_details')]
    protected ?array $fraudDetails = null;

    #[StripeObjectParam]
    protected ?string $invoice = null;

    #[StripeObjectParam]
    protected bool $livemode = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam]
    protected ?string $order = null;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $outcome = null;

    #[StripeObjectParam]
    protected bool $paid = false;

    #[StripeObjectParam(name: 'receipt_email')]
    protected ?string $receiptEmail = null;

    #[StripeObjectParam(name: 'receipt_number')]
    protected ?string $receiptNumber = null;

    #[StripeObjectParam]
    protected bool $refunded = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $shipping = null;

    #[StripeObjectParam(embeddedId: 'id')]
    protected ?string $source = null;

    #[StripeObjectParam(name: 'statement_descriptor')]
    protected ?string $statementDescriptor = null;

    #[StripeObjectParam]
    protected ?string $status = null;

    public function getAmount(): ?int
    {
        return $this->amount;
    }

    public function setAmount(?int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmountRefunded(): ?int
    {
        return $this->amountRefunded;
    }

    public function setAmountRefunded(?int $amountRefunded): static
    {
        $this->amountRefunded = $amountRefunded;

        return $this;
    }

    public function getBalanceTransaction(): ?string
    {
        return $this->balanceTransaction;
    }

    public function setBalanceTransaction(?string $balanceTransaction): static
    {
        $this->balanceTransaction = $balanceTransaction;

        return $this;
    }

    public function isCaptured(): bool
    {
        return $this->captured;
    }

    public function setCaptured(bool $captured): static
    {
        $this->captured = $captured;

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

    public function getCustomer(): ?string
    {
        return $this->customer;
    }

    public function setCustomer(?string $customer): static
    {
        $this->customer = $customer;

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

    public function getDispute(): ?string
    {
        return $this->dispute;
    }

    public function setDispute(?string $dispute): static
    {
        $this->dispute = $dispute;

        return $this;
    }

    public function getFailureCode(): ?string
    {
        return $this->failureCode;
    }

    public function setFailureCode(?string $failureCode): static
    {
        $this->failureCode = $failureCode;

        return $this;
    }

    public function getFailureMessage(): ?string
    {
        return $this->failureMessage;
    }

    public function setFailureMessage(?string $failureMessage): static
    {
        $this->failureMessage = $failureMessage;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getFraudDetails(): ?array
    {
        return $this->fraudDetails;
    }

    /**
     * @param array<string, mixed>|null $fraudDetails
     */
    public function setFraudDetails(?array $fraudDetails): static
    {
        $this->fraudDetails = $fraudDetails;

        return $this;
    }

    public function getInvoice(): ?string
    {
        return $this->invoice;
    }

    public function setInvoice(?string $invoice): static
    {
        $this->invoice = $invoice;

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

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(?string $order): static
    {
        $this->order = $order;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getOutcome(): ?array
    {
        return $this->outcome;
    }

    /**
     * @param array<string, mixed>|null $outcome
     */
    public function setOutcome(?array $outcome): static
    {
        $this->outcome = $outcome;

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

    public function getReceiptEmail(): ?string
    {
        return $this->receiptEmail;
    }

    public function setReceiptEmail(?string $receiptEmail): static
    {
        $this->receiptEmail = $receiptEmail;

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

    public function isRefunded(): bool
    {
        return $this->refunded;
    }

    public function setRefunded(bool $refunded): static
    {
        $this->refunded = $refunded;

        return $this;
    }

    /**
     * @return array<string, mixed>|null
     */
    public function getShipping(): ?array
    {
        return $this->shipping;
    }

    /**
     * @param array<string, mixed>|null $shipping
     */
    public function setShipping(?array $shipping): static
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;

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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }
}
