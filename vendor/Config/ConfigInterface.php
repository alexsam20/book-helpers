<?php

namespace Core\Config;

interface ConfigInterface
{
    public function get(string $key, $default = null): mixed;

    public function all(string $file): array;
}