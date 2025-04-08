<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractCreditNoteModel extends StripeModel
{
    #[StripeObjectParam]
    protected ?string $currency = null;

    #[StripeObjectParam]
    protected ?string $invoice = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $lines = null;

    #[StripeObjectParam]
    protected ?string $memo = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam]
    protected ?string $reason = null;

    #[StripeObjectParam]
    protected ?string $status = null;

    #[StripeObjectParam]
    protected int $subtotal = 0;

    #[StripeObjectParam]
    protected int $total = 0;

    #[StripeObjectParam]
    protected ?string $object = null;

    #[StripeObjectParam]
    protected int $amount = 0;

    #[StripeObjectParam(name: 'amount_shipping')]
    protected int $amountShipping = 0;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam]
    protected ?string $customer = null;

    #[StripeObjectParam(name: 'customer_balance_transaction')]
    protected ?string $customerBalanceTransaction = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam(name: 'discount_amounts')]
    protected ?array $discountAmounts = null;

    #[StripeObjectParam(name: 'effective_at')]
    protected ?int $effectiveAt = null;

    #[StripeObjectParam]
    protected bool $liveMode = false;

    #[StripeObjectParam]
    protected ?string $number = null;

    #[StripeObjectParam(name: 'out_of_band_amount')]
    protected ?int $outOfBandAmount = null;

    #[StripeObjectParam]
    protected ?string $pdf = null;

    #[StripeObjectParam]
    protected ?string $refund = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam(name: 'shipping_cost')]
    protected ?array $shippingCost = null;

    #[StripeObjectParam(name: 'subtotal_excluding_tax')]
    protected ?int $subtotalExcludingTax = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam(name: 'tax_amounts')]
    protected ?array $taxAmounts = null;

    #[StripeObjectParam(name: 'total_excluding_tax')]
    protected ?int $totalExcludingTax = null;

    #[StripeObjectParam]
    protected ?string $type = null;

    #[StripeObjectParam(name: 'voided_at')]
    protected ?int $voidedAt = null;

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): static
    {
        $this->currency = $currency;

        return $this;
    }

    public function getInvoice(): string
    {
        return $this->invoice;
    }

    public function setInvoice(string $invoice): static
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getLines(): ?array
    {
        return $this->lines;
    }

    /**
     * @param array<int|string, mixed>|null $lines
     *
     * @return $this
     */
    public function setLines(?array $lines): static
    {
        $this->lines = $lines;

        return $this;
    }

    public function getMemo(): ?string
    {
        return $this->memo;
    }

    public function setMemo(?string $memo): static
    {
        $this->memo = $memo;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array<int|string, mixed>|null $metadata
     *
     * @return $this
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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getSubtotal(): int
    {
        return $this->subtotal;
    }

    public function setSubtotal(int $subtotal): static
    {
        $this->subtotal = $subtotal;

        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): static
    {
        $this->total = $total;

        return $this;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function setObject(string $object): static
    {
        $this->object = $object;

        return $this;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getAmountShipping(): int
    {
        return $this->amountShipping;
    }

    public function setAmountShipping(int $amountShipping): static
    {
        $this->amountShipping = $amountShipping;

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

    public function getCustomer(): string
    {
        return $this->customer;
    }

    public function setCustomer(string $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    public function getCustomerBalanceTransaction(): ?string
    {
        return $this->customerBalanceTransaction;
    }

    public function setCustomerBalanceTransaction(?string $customerBalanceTransaction): static
    {
        $this->customerBalanceTransaction = $customerBalanceTransaction;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getDiscountAmounts(): ?array
    {
        return $this->discountAmounts;
    }

    /**
     * @param array<int|string, mixed>|null $discountAmounts
     *
     * @return $this
     */
    public function setDiscountAmounts(?array $discountAmounts): static
    {
        $this->discountAmounts = $discountAmounts;

        return $this;
    }

    public function getEffectiveAt(): ?int
    {
        return $this->effectiveAt;
    }

    public function setEffectiveAt(?int $effectiveAt): static
    {
        $this->effectiveAt = $effectiveAt;

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

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getOutOfBandAmount(): ?int
    {
        return $this->outOfBandAmount;
    }

    public function setOutOfBandAmount(?int $outOfBandAmount): static
    {
        $this->outOfBandAmount = $outOfBandAmount;

        return $this;
    }

    public function getPdf(): string
    {
        return $this->pdf;
    }

    public function setPdf(string $pdf): static
    {
        $this->pdf = $pdf;

        return $this;
    }

    public function getRefund(): ?string
    {
        return $this->refund;
    }

    public function setRefund(?string $refund): static
    {
        $this->refund = $refund;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getShippingCost(): ?array
    {
        return $this->shippingCost;
    }

    /**
     * @param array<int|string, mixed>|null $shippingCost
     *
     * @return $this
     */
    public function setShippingCost(?array $shippingCost): static
    {
        $this->shippingCost = $shippingCost;

        return $this;
    }

    public function getSubtotalExcludingTax(): ?int
    {
        return $this->subtotalExcludingTax;
    }

    public function setSubtotalExcludingTax(?int $subtotalExcludingTax): static
    {
        $this->subtotalExcludingTax = $subtotalExcludingTax;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getTaxAmounts(): ?array
    {
        return $this->taxAmounts;
    }

    /**
     * @param array<int|string, mixed>|null $taxAmounts
     *
     * @return $this
     */
    public function setTaxAmounts(?array $taxAmounts): static
    {
        $this->taxAmounts = $taxAmounts;

        return $this;
    }

    public function getTotalExcludingTax(): ?int
    {
        return $this->totalExcludingTax;
    }

    public function setTotalExcludingTax(?int $totalExcludingTax): static
    {
        $this->totalExcludingTax = $totalExcludingTax;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getVoidedAt(): ?int
    {
        return $this->voidedAt;
    }

    public function setVoidedAt(?int $voidedAt): static
    {
        $this->voidedAt = $voidedAt;

        return $this;
    }
}
