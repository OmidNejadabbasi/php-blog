<?php

class Router
{

    protected $routes = [
        "GET" => [],
        "POST" => [],
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes["GET"][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes["POST"][$uri] = $controller;
    }

    public function define($routes)
    {
        $this->routes = $routes;
    }

    public function direct($uri, $requestType)
    {
        if (array_key_exists($uri, $this->routes[$requestType])) {

            $requestURI = explode("::", $this->routes[$requestType][$uri]);
            $controller = $requestURI[0];
            $action = null;
            if (sizeof($requestURI) == 2){
                $action = $requestURI[1];
            }
            else {
                $action = "view";
            }
            $controller = new $controller;

            if (method_exists($controller, $action)) {
                return $controller->$action();
            }

        }
        throw new Exception("url not found");
    }

}
