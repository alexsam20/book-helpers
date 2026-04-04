<?php

namespace Core\View;

use Core\View\ViewInterface;

class View implements ViewInterface
{

    public function page(string $name): void
    {
        include_once APP_PATH . "/views/pages/{$name}.php";
    }
}