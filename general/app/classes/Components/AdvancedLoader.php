<?php

namespace Classes\Components;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class AdvancedLoader extends Loader
{
    public function load($resource, $type = null)
    {
        $routes = new RouteCollection();

        $resource = '@ThirdPartyBundle/Resources/config/routes.yaml';
        $type = 'yaml';

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