<?php

namespace Miracode\StripeBundle\Model;

interface StripeUserInterface
{
    public function getStripeCustomer(): ?StripeModelInterface;
}
