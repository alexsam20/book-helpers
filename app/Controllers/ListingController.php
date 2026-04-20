<?php

namespace App\Controllers;

use App\Services\ListingService;
use Core\Controller\Controller;

class ListingController extends Controller
{
    private ListingService $service;
    public function index()
    {
        //
    }

    private function service(): ListingService
    {
        if (! isset($this->service)) {
            $this->service = new ListingService($this->db());
        }

        return $this->service;
    }
}