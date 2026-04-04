<?php

namespace Core\Http;

interface RequestInterface
{
    public static function createFromGlobals(): static;
    public function uri(): string;
    public function method(): string;
}