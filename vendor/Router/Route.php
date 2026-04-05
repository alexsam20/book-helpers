<?php

namespace Core\Router;

class Route
{
    public function __construct(
        public string $uri {
            get {
                return $this->uri;
            }
        },
        public string $method {
            get {
                return $this->method;
            }
        },
        private $action
    ) {}

    public static function get(string $uri, $action): static
    {
        return new static($uri, 'GET', $action, );
    }

    public static function post(string $uri, $action): static
    {
        return new static($uri, 'POST', $action);
    }

    public function getAction()
    {
        return $this->action;
    }
}