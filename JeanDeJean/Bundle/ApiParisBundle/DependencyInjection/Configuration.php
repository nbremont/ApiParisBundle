<?php

namespace JeanDeJean\Bundle\ApiParisBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{

  /**
   * {@inheritDoc}
   */
  public function getConfigTreeBuilder()
  {
    $treeBuilder = new TreeBuilder();
    $rootNode = $treeBuilder->root('jean_de_jean_api_paris');

    // Here you should define the parameters that are allowed to
    // configure your bundle. See the documentation linked above for
    // more information on that topic.
    
    $rootNode
            ->children()
              ->scalarNode('token')
                ->isRequired()
                ->cannotBeEmpty()
              ->end()
              ->scalarNode('service_declaration_path')
                ->defaultValue(__DIR__ . '/../Resources/config/api.json')->end()
            ->end();

    return $treeBuilder;
  }

}
