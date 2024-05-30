<?php

namespace Miracode\StripeBundle\Model\Traits;

use Doctrine\ORM\Mapping as ORM;

trait SafeDeleteTrait
{
    #[ORM\Column(name: 'deleted', type: 'boolean')]
    protected bool $deleted = false;

    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted = true): static
    {
        $this->deleted = $deleted;

        return $this;
    }
}
