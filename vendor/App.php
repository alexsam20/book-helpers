<?php

namespace Core;
use Core\Container\Container;
use Core\Http\Request;
use Core\Router\Router;

class App
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function run(): void
    {
        $this->container
            ->router
            ->dispatch(
                $this->container->request->uri(),
                $this->container->request->method(),
            );
    }
}