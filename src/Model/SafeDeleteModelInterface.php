<?php

namespace Miracode\StripeBundle\Model;

interface SafeDeleteModelInterface
{
    /**
     * Set deleted flag.
     *
     * @param bool $deleted
     */
    public function setDeleted($deleted = true);
}
