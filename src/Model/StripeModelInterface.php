<?php

namespace Miracode\StripeBundle\Model;

interface StripeModelInterface
{
    /**
     * Retrieve stripe object ID.
     */
    public function getStripeId(): ?string;
}
