<?php

namespace Core\View;

use Core\Exception\ViewNotFoundException;

class View implements ViewInterface
{

    /**
     * @throws ViewNotFoundException
     */
    public function page(string $name): void
    {
        $viewPath = APP_PATH."/views/pages/{$name}.php";

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View {$name} Not Found");
        }

        extract([
            'view' => $this,
        ]);

        include_once $viewPath;
    }

    public function component(string $name): void
    {
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (! file_exists($componentPath)) {
            echo "Component $name Not Found";
            return;
        }

        extract([
            'view' => $this,
        ]);

        include $componentPath;
    }
}