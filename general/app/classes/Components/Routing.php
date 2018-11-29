<?php

namespace Classes\Components;

class Routing
{
    private $uri;
    private $httpMethod;
    private $routes;
    private $controller;
    private $method;
    private $parameters;

    public function __construct(){}

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