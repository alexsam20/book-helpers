<?php

namespace Core\Upload;

use Core\Upload\UploadedFileInterface;

class UploadedFile implements UploadedFileInterface
{
    public function __construct(
        public readonly string $name,
        public readonly string $type,
        public readonly string $tmpName,
        public readonly int $error,
        public readonly int $size,
    ) {}

    public function move(string $path, ?string $fileName = null): string|false
    {
        $storagePath = $this->path('storage', $path);
        $trashPath = $this->path('storage/trash', $path);

        is_dir($storagePath) || mkdir($storagePath, 0777, true);
        is_dir($trashPath) || mkdir($trashPath, 0777, true);

        $fileName = $fileName ?? $this->randomFileName();

        $filePath = $storagePath . "/{$fileName}";

        if (move_uploaded_file($this->tmpName, $filePath)) {
            return "$fileName";
        }

        return false;
    }

    public function getExtension(): string
    {
        return pathinfo($this->name, PATHINFO_EXTENSION);
    }

    private function randomFileName(): string
    {
        return md5(uniqid(mt_rand(), true)) . '.' . $this->getExtension();
    }

    private function path(string $folder,string $path): string
    {
        return APP_PATH . sprintf("/%s/%s", $folder, $path);
    }
}