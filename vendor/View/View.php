<?php

namespace Core\View;

use Core\Auth\AuthInterface;
use Core\Exception\ViewNotFoundException;
use Core\Session\SessionInterface;

class View implements ViewInterface
{
    public function __construct(
        private readonly SessionInterface $session,
        private readonly AuthInterface $auth,
    )
    {
    }

    /**
     * @throws ViewNotFoundException
     */
    public function page(string $name): void
    {
        $viewPath = APP_PATH."/views/pages/$name.php";

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name Not Found");
        }

        extract($this->defaultData());

        include_once $viewPath;
    }

    public function component(string $name): void
    {
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (! file_exists($componentPath)) {
            echo "Component $name Not Found";
            return;
        }

        extract($this->defaultData());

        include $componentPath;
    }

    private function defaultData(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ];
    }
}