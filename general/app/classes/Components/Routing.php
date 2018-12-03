<?php

namespace Classes\Components;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Router;

class Routing
{
    private $uri;
    private $httpMethod;
    private $routes;
    private $controller;
    private $method;
    private $parameters;

    public function __construct()
    {
        try
        {
            // Load routes from the yaml file
            $configDirectories = array(__DIR__.'/../../config');
            $fileLocator = new FileLocator($configDirectories);
            /*$loader = new YamlFileLoader($fileLocator);
            $routes = $loader->load('routes.yaml');*/

            // Init RequestContext object
            $context = new RequestContext();
            $context->fromRequest(Request::createFromGlobals());

            $router = new Router(
                new YamlFileLoader($fileLocator),
                'routes.yaml',
                array('cache_dir' => __DIR__.'/cache'),
                $context
            );


            // Find the current route
            $parameters = $router->match($context->getPathInfo());

            // How to generate a SEO URL
            $routes = $router->getRouteCollection();

          /*
            // Init UrlMatcher object
            $matcher = new UrlMatcher($routes, $context);

            // Find the current route
            $parameters = $matcher->match($context->getPathInfo());*/

            // How to generate a SEO URL
           /* $generator = new UrlGenerator($routes, $context);
            $url = $generator->generate('foo_placeholder_route', array(
                'id' => 123,
            ));*/

            echo '<pre>';
            print_r($parameters);

        }
        catch (ResourceNotFoundException $e) {
            echo $e->getMessage();
        }



        $request = Request::createFromGlobals();
        $configDirectories = array(__DIR__.'/../../config');

        $fileLocator = new FileLocator($configDirectories);

        $yamlUserFiles = $fileLocator->locate('routes.yaml', null, false);
//        var_dump($request);

        $routes = new AdvancedLoader();
        $rout = $routes->load($request);
        $route = new Route('/foo', array('_controller' => 'MyController'));
//        var_dump($route);
//        $routes->add('route_name', $route);

        $context = new RequestContext('/');

        $context->fromRequest($request);

        $matcher = new UrlMatcher($routes, $context);

        $parameters = $matcher->match('/foo');

        $response = new Response();
        $response->setContent('This will be the response content');
        $response->headers->set('Content-Type', 'text/html');
        $response->setStatusCode(200);

        // отправка ответа Response
        $response->prepare($request);
        $response->send();
    }


    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            if ($_SERVER['REQUEST_URI'] == '/') {
                return 'index';
            }
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function getMethod()
    {
        if (!empty($_SERVER['REQUEST_METHOD'])) {
            return trim($_SERVER['REQUEST_METHOD']);
        }
    }

    public function run($routes)
    {
//        $db = DataBase::connect();

        $this->routes = $routes;
        $this->uri = $this->getUri();
        $this->httpMethod = $this->getMethod();


        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $this->uri)) {

                $internalRoute = preg_replace("~$uriPattern~", $path, $this->uri);

                $segments = explode('@', $internalRoute);

                $this->controller ='Classes' . array_shift($segments);

                $this->method = array_shift($segments);
                $this->parameters = $segments;

                $controller = new $this->controller();

                $result = call_user_func_array(array($controller, $this->method), $this->parameters);
                if ($result != null) {
                    break;
                }

                if (!class_exists($this->controller) || !method_exists( $this->controller, $this->method)) {
                    header("http/1.1 404 not found");
                }
            } elseif (!class_exists($this->controller) || !method_exists( $this->controller, $this->method)) {
                header("http/1.1 404 not found");
            }
        }

    }
}