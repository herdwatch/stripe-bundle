<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractTaxRateModel extends StripeModel
{
    #[StripeObjectParam]
    protected bool $active = false;

    #[StripeObjectParam]
    protected ?int $created = null;

    #[StripeObjectParam]
    protected ?string $description = null;

    #[StripeObjectParam(name: 'display_name')]
    protected ?string $displayName = null;

    #[StripeObjectParam]
    protected bool $inclusive = false;

    #[StripeObjectParam]
    protected ?string $jurisdiction = null;

    #[StripeObjectParam]
    protected bool $liveMode = false;

    #[StripeObjectParam(embeddedId: 'id')]
    protected ?string $source = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    #[StripeObjectParam]
    protected ?int $percentage = null;

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(?int $created): static
    {
        $this->created = $created;

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

    public function getSource(): ?string
    {
        return $this->source;
    }

    public function setSource(?string $source): static
    {
        $this->source = $source;

        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    public function setDisplayName(?string $displayName): static
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function isInclusive(): bool
    {
        return $this->inclusive;
    }

    public function setInclusive(bool $inclusive): static
    {
        $this->inclusive = $inclusive;

        return $this;
    }

    public function getJurisdiction(): ?string
    {
        return $this->jurisdiction;
    }

    public function setJurisdiction(?string $jurisdiction): AbstractTaxRateModel
    {
        $this->jurisdiction = $jurisdiction;

        return $this;
    }

    public function getPercentage(): ?int
    {
        return $this->percentage;
    }

    public function setPercentage(?int $percentage): static
    {
        $this->percentage = $percentage;

        return $this;
    }
}
