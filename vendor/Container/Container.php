<?php

namespace Core\Container;

use Core\Http\Request;
use Core\Http\RequestInterface;
use Core\Router\Router;
use Core\Router\RouterInterface;
use Core\View\View;
use Core\View\ViewInterface;

class Container
{
    public readonly RequestInterface $request;
    public readonly RouterInterface $router;
    public readonly ViewInterface $view;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->view = new View();
        $this->router = new Router($this->view, $this->request);
    }
}