<?php

namespace Core;
use Core\Http\Request;
use Core\Router\Router;

class App
{
    public function run(): void
    {
        $router = new Router();
        $request = Request::createFromGlobals();

        $method = $_SERVER['REQUEST_METHOD'];

        $router->dispatch($request->uri(), $request->method());
    }
}