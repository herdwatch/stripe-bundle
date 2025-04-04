<?php

namespace Miracode\StripeBundle\Transformer;

use Miracode\StripeBundle\Model\StripeModelInterface;
use Stripe\StripeObject;

interface TransformerInterface
{
    /**
     * Transform stripe object into model.
     */
    public function transform(
        StripeObject $stripeObject,
        StripeModelInterface $model,
    ): void;
}
