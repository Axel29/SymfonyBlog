<?php

namespace Esgi\BlogBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\Config\FileLocator;

class EsgiBlogBundle extends Bundle
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('admin.yml');
    }
}
