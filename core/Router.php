<?php
/**
 * Router is used to direct request traffic
 */

class Router
{
    protected $routes = [];

    public function __construct($routes = [])
    {
        $this->routes = $routes;
    }

    public function resolve($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        return $this->routes['404'];
    }
}