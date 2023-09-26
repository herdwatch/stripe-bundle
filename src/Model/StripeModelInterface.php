<?php

namespace Miracode\StripeBundle\Model;

interface StripeModelInterface
{
    /**
     * Retrieve stripe object ID.
     *
     * return string
     */
    public function getStripeId();
}
