<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractProductModel extends StripeModel
{
    #[StripeObjectParam]
    protected bool $active = false;

    #[StripeObjectParam(name: 'default_price')]
    protected ?string $defaultPrice = null;

    #[StripeObjectParam]
    protected ?string $description = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam]
    protected ?string $name = null;

    #[StripeObjectParam]
    protected ?string $object = null;

    #[StripeObjectParam]
    protected int $created = 0;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $features = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $images = null;

    #[StripeObjectParam]
    protected bool $liveMode = false;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam(name: 'package_dimensions')]
    protected ?array $packageDimensions = null;

    #[StripeObjectParam]
    protected ?bool $shippable = null;

    #[StripeObjectParam(name: 'statement_descriptor')]
    protected ?string $statementDescriptor = null;

    #[StripeObjectParam(name: 'tax_code')]
    protected ?string $taxCode = null;

    #[StripeObjectParam(name: 'unit_label')]
    protected ?string $unitLabel = null;

    #[StripeObjectParam]
    protected ?int $updated = null;

    #[StripeObjectParam]
    protected ?string $url = null;

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getDefaultPrice(): ?string
    {
        return $this->defaultPrice;
    }

    public function setDefaultPrice(?string $defaultPrice): static
    {
        $this->defaultPrice = $defaultPrice;

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

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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
    public function getFeatures(): ?array
    {
        return $this->features;
    }

    /**
     * @param array<int|string, mixed>|null $features
     */
    public function setFeatures(?array $features): static
    {
        $this->features = $features;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getImages(): ?array
    {
        return $this->images;
    }

    /**
     * @param array<int|string, mixed>|null $images
     */
    public function setImages(?array $images): static
    {
        $this->images = $images;

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
     * @return array<int|string, mixed>|null|null
     */
    public function getPackageDimensions(): ?array
    {
        return $this->packageDimensions;
    }

    /**
     * @param array<int|string, mixed>|null $packageDimensions
     */
    public function setPackageDimensions(?array $packageDimensions): static
    {
        $this->packageDimensions = $packageDimensions;

        return $this;
    }

    public function getShippable(): ?bool
    {
        return $this->shippable;
    }

    public function setShippable(?bool $shippable): static
    {
        $this->shippable = $shippable;

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

    public function getTaxCode(): ?string
    {
        return $this->taxCode;
    }

    public function setTaxCode(?string $taxCode): static
    {
        $this->taxCode = $taxCode;

        return $this;
    }

    public function getUnitLabel(): ?string
    {
        return $this->unitLabel;
    }

    public function setUnitLabel(?string $unitLabel): static
    {
        $this->unitLabel = $unitLabel;

        return $this;
    }

    public function getUpdated(): ?int
    {
        return $this->updated;
    }

    public function setUpdated(?int $updated): static
    {
        $this->updated = $updated;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }
}
