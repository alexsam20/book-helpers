<?php

namespace App\Controllers;

use App\Services\ListingService;
use App\Services\PartService;
use Core\Controller\Controller;

class ListingController extends Controller
{
    private ListingService $service;
    public function index(): void
    {
        $id = $this->request()->input('id');
        $part = new PartService($this->db());

        $this->view('/admin/listing/index', [
            'part' => $part->find($id),
            'codeListings' => $this->service()->all($id, 'part_id'),
            'themes' => $this->service()->getThemeCode(),
        ]);
    }

    private function service(): ListingService
    {
        if (! isset($this->service)) {
            $this->service = new ListingService($this->db());
        }

        return $this->service;
    }
}