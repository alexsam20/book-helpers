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
        //
    }

    public function create(): void
    {
        $id = $this->request()->input('id');
        $part = new PartService($this->db());

        $this->view('/admin/listing/add', [
            'part' => $part->find($id),
            'codeListings' => $this->service()->all($id, 'part_id'),
            'themes' => $this->service()->getThemeCode(),
        ]);
    }

    public function store(): void
    {

        var_dump($this->request());die();
        $validation = $this->request()->validate([
            'description' => ['required', 'min:10', 'max:10000'],
            'source' => ['required', 'min:10', 'max:50000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $error_field => $value) {
                $this->session()->set($error_field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/parts/add?id=' . $this->request()->input('book'));
        }

        $this->service()->store(
            $this->session()->get("user_id"),
            $this->request()->input('book'),
            $this->request()->input('title'),
            $this->request()->input('body')
        );

        $this->redirect('/admin/parts?id=' . $this->request()->input('book'));
    }

    private function service(): ListingService
    {
        if (! isset($this->service)) {
            $this->service = new ListingService($this->db());
        }

        return $this->service;
    }
}