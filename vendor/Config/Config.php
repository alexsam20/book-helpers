<?php

namespace Core\Config;

use Core\Config\ConfigInterface;

class Config implements ConfigInterface
{

    public function get(string $key, $default = null): mixed
    {
        [$file, $key] = explode('.', $key);

        $configPath = APP_PATH.'/config/'.$file.'.php';

        if (!file_exists($configPath)) {
            return $default;
        }

        $config = require $configPath;

        return $config[$key] ?? $default;
    }

    public function all(string $file, $default = null): array
    {
        $configPath = APP_PATH.'/config/'.$file.'.php';

        if (!file_exists($configPath)) {
            return $default;
        }

        return require $configPath;
    }
}