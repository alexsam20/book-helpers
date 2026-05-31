<?php

namespace Core\Cookie;

interface CookieInterface
{
    public static function exists(string $name): bool;
    public static function get(string $name): mixed;
    public static function put(string $name, $value, $expire = 0): bool;
    public static function delete(string $name): void;
    public static function make(string $string): string;
    public static function unique(): string;
}