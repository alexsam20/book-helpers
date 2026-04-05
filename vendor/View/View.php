<?php

namespace Core\View;

use Core\View\ViewInterface;

class View implements ViewInterface
{

    public function page(string $name): void
    {
        extract([
            'view' => $this,
        ]);

        include_once APP_PATH . "/views/pages/{$name}.php";
    }

    public function component(string $name): void
    {
        include_once APP_PATH . "/views/components/$name.php";

        /*if (! file_exists($componentPath)) {
            echo "View $name does not exist";
            return;
        }

        extract(array_merge($this->defaultData(), $data));

        include $componentPath;*/
    }
}