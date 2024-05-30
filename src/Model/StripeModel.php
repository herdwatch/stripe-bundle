<?php

namespace Miracode\StripeBundle\Model;

use Miracode\StripeBundle\Annotation\StripeObjectParam;

class StripeModel implements StripeModelInterface
{
    #[StripeObjectParam(name: 'id')]
    protected ?string $stripeId = null;

    /**
     * Retrieve stripe object ID.
     */
    public function getStripeId(): ?string
    {
        return $this->stripeId;
    }

    public function setStripeId(?string $stripeId): static
    {
        $this->stripeId = $stripeId;

        return $this;
    }
}
