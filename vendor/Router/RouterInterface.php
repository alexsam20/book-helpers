<?php

namespace Core\Router;

interface RouterInterface
{
    public function dispatch(string $uri): void;
}