<?php

namespace Core\View;

use Core\Auth\AuthInterface;
use Core\Exception\ViewNotFoundException;
use Core\Session\SessionInterface;
use Core\Storage\StorageInterface;

class View implements ViewInterface
{
    private string $title;

    public function __construct(
        private readonly SessionInterface $session,
        private readonly AuthInterface    $auth,
        private readonly StorageInterface $storage,
    ) {}

    /**
     * @param string $name
     * @param array $data
     * @param string $title
     * @throws ViewNotFoundException
     */
    public function page(string $name, array $data = [], string $title = ''): void
    {
        $this->title = $title;
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
            'storage' => $this->storage,
        ];
    }

    public function title(): string
    {
        return $this->title;
    }
}