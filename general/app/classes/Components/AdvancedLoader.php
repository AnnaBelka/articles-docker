<?php

namespace Classes\Components;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;

class AdvancedLoader extends Loader
{
    public function load($resource, $type = null)
    {


        $configDirectories = array(realpath(__DIR__.'/../../config'));
        $configValues = Yaml::parse(file_get_contents($configDirectories));
        var_dump($configValues);


        $fileLocator = new FileLocator($configDirectories);
        $yamlRoutesFiles = $fileLocator->locate('routes.yaml', null, false);
        var_dump($yamlRoutesFiles);

        $routes = new RouteCollection();
/*
        $resource = '../config/routes.yaml';
        $type = 'yaml';*/

        $importedRoutes = $this->import($resource, $type);
var_dump($importedRoutes);
        $routes->addCollection($importedRoutes);
        var_dump($routes);
        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'advanced_extra' === $type;
    }
}