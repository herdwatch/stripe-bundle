<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractPriceModel extends StripeModel
{
    #[StripeObjectParam]
    protected bool $active = false;

    #[StripeObjectParam]
    protected ?string $currency = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam(name: 'nickname')]
    protected ?string $nickname = null;

    #[StripeObjectParam]
    protected ?string $product = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $recurring = null;

    #[StripeObjectParam]
    protected ?string $type = null;

    #[StripeObjectParam(name: 'unit_amount')]
    protected ?int $unitAmount = null;

    #[StripeObjectParam]
    protected ?string $object = null;

    #[StripeObjectParam(name: 'billing_scheme')]
    protected ?string $billingScheme = null;

    #[StripeObjectParam]
    protected int $created;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam(name: 'currency_options')]
    protected ?array $currencyOptions = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam(name: 'custom_unit_amount')]
    protected ?array $customUnitAmount = null;

    #[StripeObjectParam]
    protected bool $liveMode = false;

    #[StripeObjectParam(name: 'lookup_key')]
    protected ?string $lookupKey = null;

    #[StripeObjectParam(name: 'tax_behaviour')]
    protected ?string $taxBehaviour = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $tiers = null;

    #[StripeObjectParam(name: 'tiers_mode')]
    protected ?string $tiersMode = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam(name: 'transform_quality')]
    protected ?array $transformQuality = null;

    #[StripeObjectParam(name: 'unit_amount_decimal')]
    protected ?string $unitAmountDecimal = null;

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

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
     * @return array<int|string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array<int|string, mixed>|null $metadata
     */
    public function setMetadata(?array $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(?string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getProduct(): ?string
    {
        return $this->product;
    }

    public function setProduct(?string $product): static
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getRecurring(): ?array
    {
        return $this->recurring;
    }

    /**
     * @param array<int|string, mixed>|null $recurring
     */
    public function setRecurring(?array $recurring): static
    {
        $this->recurring = $recurring;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getUnitAmount(): ?int
    {
        return $this->unitAmount;
    }

    public function setUnitAmount(?int $unitAmount): static
    {
        $this->unitAmount = $unitAmount;

        return $this;
    }

    public function getObject(): ?string
    {
        return $this->object;
    }

    public function setObject(?string $object): static
    {
        $this->object = $object;

        return $this;
    }

    public function getBillingScheme(): ?string
    {
        return $this->billingScheme;
    }

    public function setBillingScheme(?string $billingScheme): static
    {
        $this->billingScheme = $billingScheme;

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

    /**
     * @return array<int|string, mixed>|null
     */
    public function getCurrencyOptions(): ?array
    {
        return $this->currencyOptions;
    }

    /**
     * @param array<int|string, mixed>|null $currencyOptions
     */
    public function setCurrencyOptions(?array $currencyOptions): static
    {
        $this->currencyOptions = $currencyOptions;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getCustomUnitAmount(): ?array
    {
        return $this->customUnitAmount;
    }

    /**
     * @param array<int|string, mixed>|null $customUnitAmount
     */
    public function setCustomUnitAmount(?array $customUnitAmount): static
    {
        $this->customUnitAmount = $customUnitAmount;

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

    public function getLookupKey(): ?string
    {
        return $this->lookupKey;
    }

    public function setLookupKey(?string $lookupKey): static
    {
        $this->lookupKey = $lookupKey;

        return $this;
    }

    public function getTaxBehaviour(): ?string
    {
        return $this->taxBehaviour;
    }

    public function setTaxBehaviour(?string $taxBehaviour): static
    {
        $this->taxBehaviour = $taxBehaviour;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getTiers(): ?array
    {
        return $this->tiers;
    }

    /**
     * @param array<int|string, mixed>|null $tiers
     */
    public function setTiers(?array $tiers): static
    {
        $this->tiers = $tiers;

        return $this;
    }

    public function getTiersMode(): ?string
    {
        return $this->tiersMode;
    }

    public function setTiersMode(?string $tiersMode): static
    {
        $this->tiersMode = $tiersMode;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getTransformQuality(): ?array
    {
        return $this->transformQuality;
    }

    /**
     * @param array<int|string, mixed>|null $transformQuality
     */
    public function setTransformQuality(?array $transformQuality): static
    {
        $this->transformQuality = $transformQuality;

        return $this;
    }

    public function getUnitAmountDecimal(): ?string
    {
        return $this->unitAmountDecimal;
    }

    public function setUnitAmountDecimal(?string $unitAmountDecimal): static
    {
        $this->unitAmountDecimal = $unitAmountDecimal;

        return $this;
    }
}
