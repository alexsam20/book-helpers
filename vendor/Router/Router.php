<?php

namespace Core\Router;

use JetBrains\PhpStorm\NoReturn;

class Router implements RouterInterface
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct()
    {
        $this->initRoutes();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (!$route) {
            $this->notFound();
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();
            $controller = new $controller();

            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }

        //$route->getAction()();
    }

    #[NoReturn]
    private function notFound(): void
    {
        echo '404 | Not Found';
        exit();
    }

    private function findRoute(string $uri, $method): mixed
    {
        return $this->routes[$method][$uri] ?? null;
    }

    private function initRoutes(): void
    {
        $routes = $this->getRoutes();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getUri()] = $route;
        }
    }

    /**
     * @return Route[]
     */
    private function getRoutes(): array
    {
        return require APP_PATH . '/config/routes.php';
    }
}