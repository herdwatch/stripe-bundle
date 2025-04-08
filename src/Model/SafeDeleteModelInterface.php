<?php

namespace Miracode\StripeBundle\Model;

interface SafeDeleteModelInterface
{
    /**
     * Set deleted flag.
     */
    public function setDeleted(bool $deleted = true): void;
}
