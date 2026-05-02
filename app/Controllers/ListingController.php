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
            'languages' => $this->service()->language(),
        ]);
    }

    public function store(): void
    {
//        var_dump($this->request()->post); die();
        $validation = $this->request()->validate([
            'language' => ['required', 'min:3'],
            'description' => ['required', 'min:10', 'max:500000'],
            'code' => ['required', 'min:10', 'max:100000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $error_field => $value) {
                $this->session()->set($error_field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/listing/add?id=' . $this->request()->input('part_id'));
        }

        $executable = $this->request()->input('executable') ? 1 : 0;
        $visible = $this->request()->input('visible') ? 1 : 0;

        $code = trim(ltrim($this->request()->input('code'), '<?php'));

        $this->service()->store(
            $this->request()->input('book_id'),
            $this->request()->input('part_id'),
            $this->request()->input('language'),
            $this->request()->input('description'),
            $code,
            $executable,
            $visible,
        );

        $this->redirect('/admin/parts?id=' . $this->request()->input('book_id'));
    }

    public function update(): void
    {
        var_dump($this->request()->post); die();
        $id = $this->request()->input('id');

        $validation = $this->request()->validate([
            'language' => ['required', 'min:3'],
            'description' => ['required', 'min:10', 'max:10000'],
            'code' => ['required', 'min:10', 'max:50000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $value) {
                $this->session()->set($field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/parts/add?id=' . $id);
        }

        $this->service()->update(
            (int) $id,
            $this->request()->input('title'),
            $this->request()->input('body')
        );

        $this->redirect('/admin/parts?id=' . $id = $this->request()->input('book'));
    }



    private function service(): ListingService
    {
        if (! isset($this->service)) {
            $this->service = new ListingService($this->db());
        }

        return $this->service;
    }
}