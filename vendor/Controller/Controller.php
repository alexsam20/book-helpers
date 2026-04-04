<?php

namespace Core\Controller;

class Controller
{
    public function getTime(): float
    {
        return microtime(true);
    }
}