<?php

namespace Core\Controller;

use Core\View\ViewInterface;

abstract class Controller
{
    private ViewInterface $view;

    public function view(string $name): void
    {
        $this->view->page($name);
    }

    public function setView(ViewInterface $view): void
    {
        $this->view = $view;
    }
}