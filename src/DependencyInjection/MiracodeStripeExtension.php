<?php

namespace Miracode\StripeBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Miracode\StripeBundle\Manager\Doctrine\DoctrineORMModelManager;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class MiracodeStripeExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $config = $this->processConfiguration(new Configuration(), $configs);

        $loader = new PhpFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('actions.php');
        $loader->load('transformer.php');
        $loader->load('handler.php');

        $container->setParameter('miracode_stripe.secret_key', $config['secret_key']);
        $container->setParameter('miracode_stripe.process_service', 'miracode_stripe.default_handler');

        if (isset($config['handler'])) {
            $container->setParameter('miracode_stripe.process_service', $config['handler']);
        }

        if (!empty($config['database']) && !empty($config['database']['model'])) {
            $container->setAlias(
                'miracode_stripe.model_transformer',
                $config['database']['model_transformer'] ?? 'miracode_stripe.model_transformer.annotation'
            );

            if ($this->configureDatabase($config['database'], $container)) {
                $loader->load('listener.php');
            }
        }
    }

    /**
     * Currently supports only orm driver
     */
    private function configureDatabase(array $config, ContainerBuilder $container): bool
    {
        if ($config['driver'] !== 'orm') {
            return false;
        }

        if (!isset($config['object_manager'])) {
            $config['object_manager'] = 'doctrine.orm.entity_manager';
        }

        $container->setAlias('miracode_stripe.object_manager', $config['object_manager']);
        $container->setParameter('miracode_stripe.model_classes', $config['model']);

        $definition = new Definition();
        $definition->setClass(DoctrineORMModelManager::class);
        $definition->setArguments([
            new Reference('miracode_stripe.object_manager'),
            new Reference('miracode_stripe.model_transformer'),
            '%miracode_stripe.model_classes%'
        ]);
        $definition->setPublic(true);
        $container->setDefinition('miracode_stripe.model_manager', $definition);

        return true;
    }
}