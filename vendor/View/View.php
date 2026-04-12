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
    ) {}

    /**
     * @throws ViewNotFoundException
     */
    public function page(string $name, array $data = []): void
    {
        $viewPath = APP_PATH."/views/pages/$name.php";

        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name Not Found");
        }

        extract(array_merge($this->defaultData(), $data));

        include_once $viewPath;
    }

    public function component(string $name, array $data = []): void
    {
        $componentPath = APP_PATH . "/views/components/$name.php";

        if (! file_exists($componentPath)) {
            echo "Component $name Not Found";
            return;
        }

        extract(array_merge($this->defaultData(), $data));

        include $componentPath;
    }

    public function formatDate($date): string
    {
        return date('F j, Y H:i', strtotime($date));
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