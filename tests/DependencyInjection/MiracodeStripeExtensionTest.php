<?php

namespace Miracode\StripeBundle\Tests\DependencyInjection;

use Miracode\StripeBundle\DependencyInjection\MiracodeStripeExtension;
use Miracode\StripeBundle\Manager\Doctrine\DoctrineORMModelManager;
use Miracode\StripeBundle\Tests\Mock\CustomEntityManagerMock;
use Miracode\StripeBundle\Tests\Mock\EntityManagerMock;
use Miracode\StripeBundle\Tests\Mock\TransformerMock;
use Miracode\StripeBundle\Transformer\AttributeTransformer;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\Yaml\Parser;

class MiracodeStripeExtensionTest extends TestCase
{
    public function testEmptyConfiguration(): void
    {
        $extension = new MiracodeStripeExtension();
        $this->expectException(InvalidConfigurationException::class);
        $extension->load([], new ContainerBuilder());
    }

    public function testStripeSecretKey(): void
    {
        $config = $this->getSimpleConfig();
        $container = new ContainerBuilder();
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertEquals(
            $config['miracode_stripe']['secret_key'],
            $container->getParameter('miracode_stripe.secret_key')
        );
    }

    public function testConfigWithoutDatabase(): void
    {
        $config = $this->getSimpleConfig();
        $container = new ContainerBuilder();
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertFalse($container->has('miracode_stripe.model_transformer'));
        $this->assertFalse($container->has('miracode_stripe.object_manager'));
        $this->assertFalse($container->has('miracode_stripe.model_manager'));
        $this->assertFalse($container->has('miracode_stripe.subscriber.stripe_event'));
        $this->assertFalse($container->hasParameter('miracode_stripe.model_classes'));
    }

    public function testDefaultDatabaseConfiguration(): void
    {
        $config = $this->getSimpleConfigWithDatabase();
        $container = new ContainerBuilder();
        $this->setDefinition(
            'doctrine.orm.entity_manager',
            EntityManagerMock::class,
            $container
        );
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertTrue($container->has('miracode_stripe.model_transformer'));
        $this->assertInstanceOf(
            AttributeTransformer::class,
            $container->get('miracode_stripe.model_transformer')
        );
        $this->assertTrue($container->has('miracode_stripe.object_manager'));
        $this->assertInstanceOf(
            EntityManagerMock::class,
            $container->get('miracode_stripe.object_manager')
        );
        $this->assertTrue($container->has('miracode_stripe.model_manager'));
        $this->assertInstanceOf(
            DoctrineORMModelManager::class,
            $container->get('miracode_stripe.model_manager')
        );
        $this->assertEquals(
            $config['miracode_stripe']['database']['model'],
            $container->getParameter('miracode_stripe.model_classes')
        );
        $this->assertTrue($container->has('miracode_stripe.subscriber.stripe_event'));
    }

    public function testFullConfiguration(): void
    {
        $config = $this->getFullConfig();
        $container = new ContainerBuilder();
        $this->setDefinition(
            'miracode_stripe.test.entity_manager',
            CustomEntityManagerMock::class,
            $container
        );
        $this->setDefinition(
            'miracode_stripe.test.transformer',
            TransformerMock::class,
            $container
        );
        $extension = new MiracodeStripeExtension();
        $extension->load($config, $container);
        $this->assertInstanceOf(
            TransformerMock::class,
            $container->get('miracode_stripe.model_transformer')
        );
        $this->assertInstanceOf(
            CustomEntityManagerMock::class,
            $container->get('miracode_stripe.object_manager')
        );
    }

    protected function getSimpleConfig(): mixed
    {
        $yaml = <<<EOF
miracode_stripe:
    secret_key: some_secret_key
EOF;
        return (new Parser())->parse($yaml);
    }

    protected function getSimpleConfigWithDatabase(): mixed
    {
        $yaml = <<<EOF
miracode_stripe:
    secret_key: some_secret_key
    database:
        model:
            customer: Miracode\StripeBundle\Tests\TestModel\TestCustomer
EOF;
        return (new Parser())->parse($yaml);
    }

    protected function getFullConfig(): mixed
    {
        $yaml = <<<EOF
miracode_stripe:
    secret_key: some_secret_key
    database:
        driver: orm
        object_manager: miracode_stripe.test.entity_manager
        model_transformer: miracode_stripe.test.transformer
        model:
            customer: Miracode\StripeBundle\Tests\TestModel\TestCustomer
EOF;
        return (new Parser())->parse($yaml);
    }

    protected function setDefinition(string $id, string $class, ContainerBuilder $container): void
    {
        $definition = new Definition();
        $definition->setClass($class);
        $container->setDefinition($id, $definition);
    }
}
