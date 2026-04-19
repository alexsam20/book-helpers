<?php

namespace Core\Storage;

class Storage implements StorageInterface
{
    private const string STORAGE = 'storage';
    private const string TRASH = self::STORAGE . '/trash';

    public function url(string $path, $folder = 'books'): string
    {
        return URL_PATH . "/" . self::STORAGE . "/" . $folder . "/" . $path;
    }

    public function get(string $path): string
    {
        return file_get_contents($this->storagePath($path));
    }

    public function storagePath(string $path, string $file = self::STORAGE): string
    {
        return APP_PATH . "/" . $file . "/" .$path;
    }

    public function trash(string $file): bool
    {
        $oldFile = $this->storagePath($file);
        $trash = $this->storagePath($file, self::TRASH);
        if (rename($oldFile, $trash)) {
            return true;
        }

        return false;
    }
}