<?php

namespace Core\Cookie;

use Core\Cookie\CookieInterface;

class Cookie implements CookieInterface
{

    public static function exists(string $name): bool
    {
        return isset($_COOKIE[$name]);
    }

    public static function get(string $name): mixed
    {
        return $_COOKIE[$name] ?? null;
    }

    public static function put(string $name, $value, $expire = 0): bool
    {
        if (setcookie($name, $value, time() + $expire, '/')) {
            return true;
        }

        return false;
    }

    public static function delete(string $name): void
    {
        self::put($name, '', time() - 1);
    }

    public static function make(string $string): string
    {
        return hash('sha256', $string);
    }

    public static function unique(): string
    {
        return self::make(uniqid('', true));
    }
}