<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php73\Rector\FuncCall\JsonThrowOnErrorRector;
use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\Php80\ValueObject\AnnotationToAttribute;
use Rector\TypeDeclaration\Rector\ClassMethod\AddReturnTypeDeclarationBasedOnParentClassMethodRector;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->cacheDirectory(__DIR__ . '/.rector-cache/');
    $rectorConfig->parallel(300, intval(getenv('RECTOR_NUM_PROCS') ?: 16));

    $rectorConfig->paths([
        __DIR__.'/src',
    ]);

    $rectorConfig->skip([
        JsonThrowOnErrorRector::class,
    ]);

    $rectorConfig->importNames();
    $rectorConfig->importShortClasses(false);

    // define sets of rules
    $rectorConfig->sets([
        \Rector\Doctrine\Set\DoctrineSetList::DOCTRINE_DBAL_211,
        \Rector\Doctrine\Set\DoctrineSetList::DOCTRINE_DBAL_30,
        \Rector\Doctrine\Set\DoctrineSetList::DOCTRINE_ORM_213,
        \Rector\Doctrine\Set\DoctrineSetList::DOCTRINE_ORM_214,
        \Rector\Doctrine\Set\DoctrineSetList::DOCTRINE_ORM_29,
        //\Rector\PHPUnit\Set\PHPUnitLevelSetList::UP_TO_PHPUNIT_90, // temporary disable as it caused a lot of errors
        \Rector\Set\ValueObject\LevelSetList::UP_TO_PHP_82,
        \Rector\Symfony\Set\SymfonyLevelSetList::UP_TO_SYMFONY_54,
    ]);

    $rectorConfig->rules([
        AddReturnTypeDeclarationBasedOnParentClassMethodRector::class,
    ]);
    $rectorConfig->ruleWithConfiguration(AnnotationToAttributeRector::class, [
        new AnnotationToAttribute('Miracode\\StripeBundle\\Annotation\\StripeObjectParam'),
    ]);
};
