<?php

spl_autoload_register(static function ($class): void {
    // key - project-specific namespace prefix
    // value - base directory for the namespace prefix
    $psr = [
        'App\\' => '/app/',
        'Core\\' => '/vendor/',
    ];
    foreach ($psr as $prefix => $path) {
        // does the class use the namespace prefix?
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            // move to the next registered autoloader
            continue;
        }
        // get the relative class name
        $relative_class = substr($class, $len);
        // replace the namespace prefix with the base directory, replace namespace
        // separators with directory separators in the relative class name, append
        // with extension .php
        $file = APP_ROOT . $path.str_replace('\\', '/', $relative_class).'.php';
        // if the file exists, require it
        if (file_exists($file)) {
            require_once $file;
        }
    }
});