<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

abstract class AbstractCardModel extends StripeModel
{
    #[StripeObjectParam(name: 'address_city')]
    protected ?string $addressCity = null;

    #[StripeObjectParam(name: 'address_country')]
    protected ?string $addressCountry = null;

    #[StripeObjectParam(name: 'address_line1')]
    protected ?string $addressLine1 = null;

    #[StripeObjectParam(name: 'address_line1_check')]
    protected ?string $addressLine1Check = null;

    #[StripeObjectParam(name: 'address_line2')]
    protected ?string $addressLine2 = null;

    #[StripeObjectParam(name: 'address_state')]
    protected ?string $addressState = null;

    #[StripeObjectParam(name: 'address_zip')]
    protected ?string $addressZip = null;

    #[StripeObjectParam(name: 'address_zip_check')]
    protected ?string $addressZipCheck = null;

    #[StripeObjectParam]
    protected ?string $brand = null;

    #[StripeObjectParam]
    protected ?string $country = null;

    #[StripeObjectParam]
    protected ?string $customer = null;

    #[StripeObjectParam(name: 'cvc_check')]
    protected ?string $cvcCheck = null;

    #[StripeObjectParam(name: 'dynamic_last4')]
    protected ?string $dynamicLast4 = null;

    #[StripeObjectParam(name: 'exp_month')]
    protected ?int $expMonth = null;

    #[StripeObjectParam(name: 'exp_year')]
    protected ?int $expYear = null;

    #[StripeObjectParam]
    protected ?string $fingerprint = null;

    #[StripeObjectParam]
    protected ?string $funding = null;

    #[StripeObjectParam]
    protected ?string $last4 = null;

    #[StripeObjectParam]
    protected ?string $name = null;

    #[StripeObjectParam(name: 'tokenization_method')]
    protected ?string $tokenizationMethod = null;

    public function getAddressCity(): ?string
    {
        return $this->addressCity;
    }

    public function setAddressCity(?string $addressCity): static
    {
        $this->addressCity = $addressCity;

        return $this;
    }

    public function getAddressCountry(): ?string
    {
        return $this->addressCountry;
    }

    public function setAddressCountry(?string $addressCountry): static
    {
        $this->addressCountry = $addressCountry;

        return $this;
    }

    public function getAddressLine1(): ?string
    {
        return $this->addressLine1;
    }

    public function setAddressLine1(?string $addressLine1): static
    {
        $this->addressLine1 = $addressLine1;

        return $this;
    }

    public function getAddressLine1Check(): ?string
    {
        return $this->addressLine1Check;
    }

    public function setAddressLine1Check(?string $addressLine1Check): static
    {
        $this->addressLine1Check = $addressLine1Check;

        return $this;
    }

    public function getAddressLine2(): ?string
    {
        return $this->addressLine2;
    }

    public function setAddressLine2(?string $addressLine2): static
    {
        $this->addressLine2 = $addressLine2;

        return $this;
    }

    public function getAddressState(): ?string
    {
        return $this->addressState;
    }

    public function setAddressState(?string $addressState): static
    {
        $this->addressState = $addressState;

        return $this;
    }

    public function getAddressZip(): ?string
    {
        return $this->addressZip;
    }

    public function setAddressZip(?string $addressZip): static
    {
        $this->addressZip = $addressZip;

        return $this;
    }

    public function getAddressZipCheck(): ?string
    {
        return $this->addressZipCheck;
    }

    public function setAddressZipCheck(?string $addressZipCheck): static
    {
        $this->addressZipCheck = $addressZipCheck;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

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

    public function getCvcCheck(): ?string
    {
        return $this->cvcCheck;
    }

    public function setCvcCheck(?string $cvcCheck): static
    {
        $this->cvcCheck = $cvcCheck;

        return $this;
    }

    public function getDynamicLast4(): ?string
    {
        return $this->dynamicLast4;
    }

    public function setDynamicLast4(?string $dynamicLast4): static
    {
        $this->dynamicLast4 = $dynamicLast4;

        return $this;
    }

    public function getExpMonth(): ?int
    {
        return $this->expMonth;
    }

    public function setExpMonth(?int $expMonth): static
    {
        $this->expMonth = $expMonth;

        return $this;
    }

    public function getExpYear(): ?int
    {
        return $this->expYear;
    }

    public function setExpYear(?int $expYear): static
    {
        $this->expYear = $expYear;

        return $this;
    }

    public function getFingerprint(): ?string
    {
        return $this->fingerprint;
    }

    public function setFingerprint(?string $fingerprint): static
    {
        $this->fingerprint = $fingerprint;

        return $this;
    }

    public function getFunding(): ?string
    {
        return $this->funding;
    }

    public function setFunding(?string $funding): static
    {
        $this->funding = $funding;

        return $this;
    }

    public function getLast4(): ?string
    {
        return $this->last4;
    }

    public function setLast4(?string $last4): static
    {
        $this->last4 = $last4;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getTokenizationMethod(): ?string
    {
        return $this->tokenizationMethod;
    }

    public function setTokenizationMethod(?string $tokenizationMethod): static
    {
        $this->tokenizationMethod = $tokenizationMethod;

        return $this;
    }
}
