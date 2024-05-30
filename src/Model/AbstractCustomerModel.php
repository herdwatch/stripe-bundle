<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;
use Stripe\Customer;
use Stripe\Exception\ApiErrorException;

abstract class AbstractCustomerModel extends StripeModel
{
    #[StripeObjectParam(name: 'account_balance')]
    protected ?int $accountBalance = null;

    #[StripeObjectParam(name: 'discount', embeddedId: 'coupon.id')]
    protected ?string $coupon = null;

    #[StripeObjectParam]
    protected int $created = 0;

    #[StripeObjectParam]
    protected ?string $currency = null;

    #[StripeObjectParam(name: 'default_source')]
    protected ?string $defaultSource = null;

    #[StripeObjectParam]
    protected ?string $delinquent = null;

    #[StripeObjectParam]
    protected ?string $description = null;

    #[StripeObjectParam]
    protected ?string $email = null;

    #[StripeObjectParam]
    protected bool $livemode = false;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $metadata = null;

    /**
     * @var array<string, mixed>|null
     */
    #[StripeObjectParam]
    protected ?array $shipping = null;

    public function getAccountBalance(): ?int
    {
        return $this->accountBalance;
    }

    public function setAccountBalance(?int $accountBalance): static
    {
        $this->accountBalance = $accountBalance;

        return $this;
    }

    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    public function setCoupon(?string $coupon): static
    {
        $this->coupon = $coupon;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

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
     *
     * @return $this
     */
    public function setMetadata(?array $metadata): static
    {
        $this->metadata = $metadata;

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
     *
     * @return $this
     */
    public function setShipping(?array $shipping): static
    {
        $this->shipping = $shipping;

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
