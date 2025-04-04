<?php

namespace Miracode\StripeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('miracode_stripe');
        $rootNode = $treeBuilder->getRootNode();

        $supportedDrivers = ['orm'];

        $rootNode
            ->children()
            ->scalarNode('api_version')
            ->defaultNull()
            ->end()
            ->scalarNode('secret_key')
            ->isRequired()
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('webhook_secret')
            ->defaultNull()
            ->end()
            ->scalarNode('handler')
            ->cannotBeEmpty()
            ->end()
            ->arrayNode('database')
            ->children()
            ->scalarNode('driver')
            ->defaultValue('orm')
            ->validate()
            ->ifNotInArray($supportedDrivers)
            ->thenInvalid('Database driver %s does not support')
            ->end()
            ->end()
            ->scalarNode('object_manager')->end()
            ->scalarNode('model_transformer')->end()
            ->arrayNode('model')
            ->children()
            ->scalarNode('card')->cannotBeEmpty()->end()
            ->scalarNode('charge')->cannotBeEmpty()->end()
            ->scalarNode('coupon')->end()
            ->scalarNode('customer')->cannotBeEmpty()->end()
            ->scalarNode('discount')->end()
            ->scalarNode('invoice')->end()
            ->scalarNode('plan')->end()
            ->scalarNode('setup_intent')->cannotBeEmpty()->end()
            ->scalarNode('payment_intent')->cannotBeEmpty()->end()
            ->scalarNode('payment_method')->cannotBeEmpty()->end()
            ->scalarNode('refund')->cannotBeEmpty()->end()
            ->scalarNode('subscription')->end()
            ->scalarNode('subscription_item')->end()
            ->end()
            ->end()
            ->end()
            ->end();

        return $treeBuilder;
    }
}
