<?php

namespace JeanDeJean\Bundle\ApiParisBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class ApiParisExtension extends Extension
{

  /**
   * {@inheritDoc}
   */
  public function load(array $configs, ContainerBuilder $container)
  {
    $configuration = new Configuration();
    $config = $this->processConfiguration($configuration, $configs);

    $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
    $loader->load('services.xml');

    $this->initConfiguration($config, $container);
  }

  protected function initConfiguration(array $config, ContainerBuilder $container)
  {
    $container->setParameter('jean_de_jean_api_paris.token', $config['token']);
    $container->setParameter('jean_de_jean_api_paris.service_declaration_path', $config['service_declaration_path']);
  }

}
