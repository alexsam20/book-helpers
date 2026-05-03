<?php

namespace App\Controllers;

use App\Services\ListingService;
use App\Services\PartService;
use Core\Controller\Controller;
use stdClass;

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
        /*var_dump($this);*/

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
            'description' => ['required', 'min:20', 'max:500000'],
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

    /**
     * @throws \JsonException
     */
    public function upload(): void
    {
        is_dir(STORAGE_PATH) || mkdir(STORAGE_PATH, 0777, true);
        is_dir(ROOT_PATH . '/storage/trash/block/') || mkdir(ROOT_PATH . '/storage/trash/block/', 0777, true);

        $name = $_FILES['image_param']['name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $randomName = md5(uniqid(mt_rand(), true)) . '.' . $extension;
        $tmpName = $_FILES['image_param']['tmp_name'];
        $destination = STORAGE_PATH . $randomName;

        if (move_uploaded_file($tmpName, $destination)) {
            $response = new stdClass();
            $response->link = URL_PATH . '/storage/block/' . $randomName;
            echo stripcslashes(json_encode($response));
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Could not save file.'], JSON_THROW_ON_ERROR);
        }
    }

    public function delete(): bool
    {
        $data = $_POST;
        if (empty($data)) {
            $data = json_decode(file_get_contents('php://input'), true);
        }
        $src = $data['src'] ?? null;
        if (null !== $src) {
            $image = explode('/', parse_url($src, PHP_URL_PATH)) ;
            $image = end($image);
            $oldFile = APP_PATH . "/storage/block/" . $image;
            $trash = APP_PATH . "/storage/trash/block/" . $image;
            if (rename($oldFile, $trash)) {
                return true;
            }
        }

        return false;
    }

    private function service(): ListingService
    {
        if (! isset($this->service)) {
            $this->service = new ListingService($this->db());
        }

        return $this->service;
    }
}