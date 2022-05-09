<?php

namespace Ns\Router;

use Aigletter\Contracts\Routing\RouteInterface;

class Router implements RouteInterface
{


    protected array $routes=[];


    public function __construct($routes=[])
    {

        foreach ($routes as $k=>$v)
        $this->addRoute($k,$v);
    }

    public function route(string $uri): callable
    {
        foreach ($this->routes as $k => $v) {
            if (0 == strcmp($uri, $k)) {
                return $v;
            }
        }
        return throw new \Exception("no action found for $uri ");
    }

    public function addRoute(string $path, $action): void
    {
        $this->routes[$path] = $action;
    }

}