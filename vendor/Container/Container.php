<?php

namespace Core\Container;

use Core\Http\Request;
use Core\Http\RequestInterface;
use Core\Router\Router;
use Core\Router\RouterInterface;

class Container
{
    public readonly RequestInterface $request;
    public readonly RouterInterface $router;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->router = new Router();
    }
}