<?php

namespace Core\Router;

class Route
{
    public function __construct(
        private string $uri {
            get {return $this->uri;}
        },
        private string $method {
            get {return $this->method;}
        },
        private                 $action {
            get {return $this->action;}
        }
    ) {}

    public static function get(string $uri, $action): static
    {
        return new static($uri, 'GET', $action, );
    }

    public static function post(string $uri, $action): static
    {
        return new static($uri, 'POST', $action);
    }

}