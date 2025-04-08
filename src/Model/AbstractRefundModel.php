<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractRefundModel extends StripeModel
{
    #[StripeObjectParam]
    protected ?int $amount = null;

    #[StripeObjectParam(name: 'balance_transaction')]
    protected ?string $balanceTransaction = null;

    #[StripeObjectParam]
    protected ?string $charge = null;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam]
    protected ?string $currency = null;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam]
    protected ?string $reason = null;

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

    public function getBalanceTransaction(): ?string
    {
        return $this->balanceTransaction;
    }

    public function setBalanceTransaction(?string $balanceTransaction): static
    {
        $this->balanceTransaction = $balanceTransaction;

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

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): static
    {
        $this->reason = $reason;

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
