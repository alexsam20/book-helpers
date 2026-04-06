<?php

namespace Core\Container;

use Core\Http\Redirect;
use Core\Http\RedirectInterface;
use Core\Http\Request;
use Core\Http\RequestInterface;
use Core\Router\Router;
use Core\Router\RouterInterface;
use Core\Validator\Validator;
use Core\Validator\ValidatorInterface;
use Core\View\View;
use Core\View\ViewInterface;

class Container
{
    public readonly RequestInterface $request;
    public readonly RouterInterface $router;
    public readonly ViewInterface $view;
    public readonly ValidatorInterface $validator;
    public readonly RedirectInterface $redirect;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->view = new View();
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->redirect = new Redirect();
        $this->router = new Router($this->view, $this->request, $this->redirect);
    }
}