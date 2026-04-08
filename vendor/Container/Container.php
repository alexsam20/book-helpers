<?php

namespace Core\Container;

use Core\Http\Redirect;
use Core\Http\RedirectInterface;
use Core\Http\Request;
use Core\Http\RequestInterface;
use Core\Router\Router;
use Core\Router\RouterInterface;
use Core\Session\Session;
use Core\Session\SessionInterface;
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
    public readonly SessionInterface $session;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->request = Request::createFromGlobals();
        $this->redirect = new Redirect();
        $this->session = new Session();
        $this->view = new View($this->session);
        $this->validator = new Validator();
        $this->request->setValidator($this->validator);
        $this->router = new Router(
            $this->view,
            $this->request,
            $this->redirect,
            $this->session
        );
    }
}