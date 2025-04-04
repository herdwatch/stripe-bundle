<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;

abstract class AbstractCustomerModel extends StripeModel
{
    #[StripeObjectParam(name: 'account_balance')]
    protected ?int $accountBalance = null;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam]
    protected ?string $currency = null;

    #[StripeObjectParam(name: 'default_source')]
    protected ?string $defaultSource = null;

    #[StripeObjectParam]
    protected ?string $delinquent = null;

    #[StripeObjectParam]
    protected ?string $email = null;

    #[StripeObjectParam]
    protected bool $liveMode = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    public function getAccountBalance(): ?int
    {
        return $this->accountBalance;
    }

    public function setAccountBalance(?int $accountBalance): static
    {
        $this->accountBalance = $accountBalance;

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

    public function getDefaultSource(): ?string
    {
        return $this->defaultSource;
    }

    public function setDefaultSource(?string $defaultSource): static
    {
        $this->defaultSource = $defaultSource;

        return $this;
    }

    public function getDelinquent(): ?string
    {
        return $this->delinquent;
    }

    public function setDelinquent(?string $delinquent): static
    {
        $this->delinquent = $delinquent;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): static
    {
        $this->email = $email;

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
     * @return array<string, mixed>|null
     */
    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    /**
     * @param array<string, mixed>|null $metadata
     *
     * @return $this
     */
    public function setMetadata(?array $metadata): static
    {
        $this->metadata = $metadata;

        return $this;
    }

    /**
     * @throws ApiErrorException
     */
    public function retrieveStripeObject(): Customer
    {
        return Customer::retrieve($this->getStripeId());
    }
}
