<?php

namespace Core\Http;

interface RedirectInterface
{
    public function to(string $url): void;
}