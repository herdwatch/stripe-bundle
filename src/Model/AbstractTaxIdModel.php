<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractTaxIdModel extends StripeModel
{
    #[StripeObjectParam]
    protected ?string $country = null;

    #[StripeObjectParam]
    protected ?int $created = null;

    #[StripeObjectParam]
    protected ?string $customer = null;

    #[StripeObjectParam]
    protected bool $liveMode = false;

    #[StripeObjectParam]
    protected ?string $type = null;

    #[StripeObjectParam]
    protected ?string $value = null;

    /**
     * @var array<int|string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $verification = null;

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getCreated(): ?int
    {
        return $this->created;
    }

    public function setCreated(int $created): static
    {
        $this->created = $created;

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

    public function isLiveMode(): bool
    {
        return $this->liveMode;
    }

    public function setLiveMode(bool $liveMode): static
    {
        $this->liveMode = $liveMode;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): static
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return array<int|string, mixed>|null
     */
    public function getVerification(): ?array
    {
        return $this->verification;
    }

    /**
     * @param array<int|string, mixed>|null $verification
     */
    public function setVerification(?array $verification): static
    {
        $this->verification = $verification;

        return $this;
    }
}
