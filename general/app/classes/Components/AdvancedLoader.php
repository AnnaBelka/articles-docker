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


        $routes = new RouteCollection();

        $importedRoutes = $this->import($resource, $type);

        $routes->addCollection($importedRoutes);

        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'advanced_extra' === $type;
    }
}