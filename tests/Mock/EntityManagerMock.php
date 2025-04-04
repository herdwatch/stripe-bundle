<?php

namespace Miracode\StripeBundle\Tests\Mock;

use Doctrine\Persistence\Mapping\ClassMetadata;
use Doctrine\Persistence\Mapping\ClassMetadataFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;

class EntityManagerMock implements ObjectManager
{

    /**
     * Finds an object by its identifier.
     *
     * This is just a convenient shortcut for getRepository($className)->find($id).
     *
     * @param string $className The class name of the object to find.
     * @param mixed $id The identity of the object to find.
     *
     * @return object|null The found object.
     */
    public function find(string $className, mixed $id): ?object
    {
        // TODO: Implement find() method.
    }

    /**
     * Tells the ObjectManager to make an instance managed and persistent.
     *
     * The object will be entered into the database as a result of the flush operation.
     *
     * NOTE: The persist operation always considers objects that are not yet known to
     * this ObjectManager as NEW. Do not pass detached objects to the persist operation.
     *
     * @param object $object The instance to make managed and persistent.
     *
     * @return void
     */
    public function persist(object $object): void
    {
        // TODO: Implement persist() method.
    }

    /**
     * Removes an object instance.
     *
     * A removed object will be removed from the database as a result of the flush operation.
     *
     * @param object $object The object instance to remove.
     *
     * @return void
     */
    public function remove(object $object): void
    {
        // TODO: Implement remove() method.
    }

    /**
     * Merges the state of a detached object into the persistence context
     * of this ObjectManager and returns the managed copy of the object.
     * The object passed to merge will not become associated/managed with this ObjectManager.
     *
     * @param object $object
     *
     * @return object
     */
    public function merge($object): object
    {
        // TODO: Implement merge() method.
    }

    /**
     * Clears the ObjectManager. All objects that are currently managed
     * by this ObjectManager become detached.
     *
     * @return void
     */
    public function clear(): void
    {
        // TODO: Implement clear() method.
    }

    /**
     * Detaches an object from the ObjectManager, causing a managed object to
     * become detached. Unflushed changes made to the object if any
     * (including removal of the object), will not be synchronized to the database.
     * Objects which previously referenced the detached object will continue to
     * reference it.
     *
     * @param object $object The object to detach.
     *
     * @return void
     */
    public function detach(object $object): void
    {
        // TODO: Implement detach() method.
    }

    /**
     * Refreshes the persistent state of an object from the database,
     * overriding any local changes that have not yet been persisted.
     *
     * @param object $object The object to refresh.
     *
     * @return void
     */
    public function refresh(object $object): void
    {
        // TODO: Implement refresh() method.
    }

    /**
     * Flushes all changes to objects that have been queued up to now to the database.
     * This effectively synchronizes the in-memory state of managed objects with the
     * database.
     *
     * @return void
     */
    public function flush(): void
    {
        // TODO: Implement flush() method.
    }

    /**
     * Gets the repository for a class.
     *
     * @param string $className
     *
     * @return ObjectRepository
     */
    public function getRepository(string $className): ObjectRepository
    {
        // TODO: Implement getRepository() method.
    }

    /**
     * Returns the ClassMetadata descriptor for a class.
     *
     * The class name must be the fully-qualified class name without a leading backslash
     * (as it is returned by get_class($obj)).
     *
     * @param string $className
     *
     * @return ClassMetadata
     */
    public function getClassMetadata(string $className): ClassMetadata
    {
        // TODO: Implement getClassMetadata() method.
    }

    /**
     * Gets the metadata factory used to gather the metadata of classes.
     *
     * @return ClassMetadataFactory
     */
    public function getMetadataFactory(): ClassMetadataFactory
    {
        // TODO: Implement getMetadataFactory() method.
    }

    /**
     * Helper method to initialize a lazy loading proxy or persistent collection.
     *
     * This method is a no-op for other objects.
     *
     * @param object $obj
     *
     * @return void
     */
    public function initializeObject(object $obj): void
    {
        // TODO: Implement initializeObject() method.
    }

    /**
     * Checks if the object is part of the current UnitOfWork and therefore managed.
     *
     * @param object $object
     *
     * @return bool
     */
    public function contains(object $object): bool
    {
        // TODO: Implement contains() method.
    }

    public function isUninitializedObject(mixed $value): bool
    {
        // TODO: Implement isUninitializedObject() method.
    }
}
