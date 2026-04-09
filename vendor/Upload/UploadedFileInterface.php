<?php

namespace Core\Upload;

interface UploadedFileInterface
{
    public function move(string $path): bool;
}