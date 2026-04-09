<?php

namespace Core\Storage;

class Storage implements StorageInterface
{

    public function url(string $path): string
    {
        return $this->storagePath($path);
    }

    public function get(string $path): string
    {
        return file_get_contents($this->storagePath($path));
    }

    private function storagePath(string $path): string
    {
        return APP_PATH . "/storage/$path";
    }
}