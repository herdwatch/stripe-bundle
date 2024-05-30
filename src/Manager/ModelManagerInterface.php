<?php

namespace Miracode\StripeBundle\Manager;

use Miracode\StripeBundle\Model\StripeModelInterface;
use Stripe\StripeObject;

interface ModelManagerInterface
{
    /**
     * Is stripe object supported by model manager.
     */
    public function support(StripeObject $object): bool;

    /**
     * Retrieve model by stripe object data.
     */
    public function retrieve(StripeObject $object): ?StripeModelInterface;

    /**
     * Retrieve model by stripe ID and stripe object type.
     */
    public function retrieveByStripeId(string $id, string $objectType): ?StripeModelInterface;

    /**
     * Save stripe object in database.
     */
    public function save(StripeObject $object, bool $flush = false): StripeModelInterface;

    /**
     * Remove model from database by stripe object data
     * Return model object that was removed or NULL if model does not exists.
     */
    public function remove(StripeObject $object, bool $flush = false): ?StripeModelInterface;
}
