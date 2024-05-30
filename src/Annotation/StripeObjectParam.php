<?php

namespace Miracode\StripeBundle\Annotation;

#[\Attribute]
class StripeObjectParam
{
    public function __construct(
        public ?string $name = null,
        public ?string $embeddedId = null
    ) {
    }
}
