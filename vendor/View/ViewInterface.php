<?php

namespace Core\View;

interface ViewInterface
{
    public function page(string $name): void;
}