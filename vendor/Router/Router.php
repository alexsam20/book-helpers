<?php

namespace Core\Router;

use Core\Router\RouterInterface;

class Router implements RouterInterface
{

    public function dispatch(string $uri): void
    {
        $routes = $this->getRoutes();

        $routes[$uri]();
    }

    private function getRoutes(): array
    {
        return require APP_PATH . '/config/routes.php';
    }
}