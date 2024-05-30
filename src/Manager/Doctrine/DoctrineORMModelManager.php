<?php

namespace Miracode\StripeBundle\Manager\Doctrine;

use Doctrine\Persistence\ObjectManager;
use Miracode\StripeBundle\Manager\ModelManagerInterface;
use Miracode\StripeBundle\Model\SafeDeleteModelInterface;
use Miracode\StripeBundle\Model\StripeModelInterface;
use Miracode\StripeBundle\StripeException;
use Miracode\StripeBundle\Transformer\TransformerInterface;
use Stripe\StripeObject;

class DoctrineORMModelManager implements ModelManagerInterface
{
    /**
     * DoctrineORMModelManager constructor.
     */
    public function __construct(
        private readonly ObjectManager $objectManager,
        private readonly TransformerInterface $modelTransformer,
        private readonly array $modelClasses
    ) {
    }

    /**
     * Is stripe object supported by model manager.
     *
     * @throws StripeException
     */
    public function support(StripeObject $object): bool
    {
        return isset($this->modelClasses[$this->getObjectType($object)]);
    }

    /**
     * Retrieve model by stripe object data.
     *
     * @throws StripeException
     */
    public function retrieve(StripeObject $object): ?StripeModelInterface
    {
        $this->checkSupport($object);
        $modelClass = $this->modelClass($object);

        return $this->objectManager->getRepository($modelClass)->findOneBy([
            'stripeId' => $object->id,
        ]);
    }

    /**
     * Retrieve model by stripe ID and stripe object type.
     *
     * @throws StripeException
     */
    public function retrieveByStripeId(string $id, string $objectType): ?StripeModelInterface
    {
        $stripeObject = new StripeObject($id);
        $stripeObject->object = $objectType;

        return $this->retrieve($stripeObject);
    }

    /**
     * Save stripe object in database.
     *
     * @throws StripeException
     */
    public function save(StripeObject $object, bool $flush = false): StripeModelInterface
    {
        $model = $this->retrieve($object);
        if (!$model) {
            $model = $this->createModel($object);
            $this->objectManager->persist($model);
        }
        $this->modelTransformer->transform($object, $model);
        if ($flush) {
            $this->objectManager->flush();
        }

        return $model;
    }

    /**
     * Remove model from database by stripe object data
     * Return model object that was removed or NULL if model does not exists.
     *
     * @throws StripeException
     */
    public function remove(StripeObject $object, bool $flush = false): ?StripeModelInterface
    {
        $model = $this->retrieve($object);
        if (!$model) {
            return null;
        }
        if ($model instanceof SafeDeleteModelInterface) {
            $model->setDeleted(true);
        } else {
            $this->objectManager->remove($model);
        }
        if ($flush) {
            $this->objectManager->flush();
        }

        return $model;
    }

    /**
     * Get stripe object type.
     *
     * @throws StripeException
     */
    protected function getObjectType(StripeObject $object): string
    {
        if (empty($object->object)) {
            if (isset($object->deleted, $object->id)) {
                throw new StripeException(sprintf(
                    "Couldn't detect stripe object type. "
                    . 'Stripe object with ID `%s` has been already deleted.',
                    $object->id
                ));
            }
            throw new StripeException("Couldn't detect stripe object type.");
        }

        return $object->object;
    }

    /**
     * Check object support.
     *
     * @throws StripeException
     */
    protected function checkSupport(StripeObject $object): void
    {
        if (!$this->support($object)) {
            throw new StripeException(sprintf(
                'Stripe object `%1$s` does not support. '
                . 'Please specify model class for object type `%1$s` '
                . 'in miracode_stripe.database.model.%1$s',
                $this->getObjectType($object)
            ));
        }
    }

    /**
     * Get model class name for specified stripe object.
     */
    protected function modelClass(StripeObject $object): string
    {
        return $this->modelClasses[$this->getObjectType($object)];
    }

    /**
     * Create new model object.
     */
    protected function createModel(StripeObject $object): StripeModelInterface
    {
        $className = $this->modelClass($object);

        return new $className();
    }
}
