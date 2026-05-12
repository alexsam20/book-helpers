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

        $this->view('/admin/listing/add', [
            'part' => $part->find($id),
            'codeListings' => $this->service()->all($id, 'part_id'),
            'themes' => $this->service()->getThemeCode(),
            'languages' => $this->service()->language(),
            'object' => $this,
        ]);
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'language' => ['required', 'min:3', 'max:20'],
            'theme' => ['required', 'min:3', 'max:23'],
            'description' => ['max:500000'],
            'code' => ['required', 'min:10', 'max:500000'],
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

        $code = $this->request()->input('code');

        if ($this->request()->input('language') === 'php') {
            $code = ltrim($this->request()->input('code'), "<?php\n\r");
        }
        if ($this->request()->input('language') === 'html') {
            $code = htmlspecialchars_decode($code);
        }

        $this->service()->store(
            $this->request()->input('book_id'),
            $this->request()->input('part_id'),
            $this->request()->input('language'),
            $this->request()->input('theme'),
            $this->request()->input('description'),
            $code,
            $this->executable(),
            $this->visible(),
        );

        $this->redirect('/admin/parts?id=' . $this->request()->input('book_id'));
    }

    public function update(): void
    {
        $part_id = $this->request()->input('part_id');

        $validation = $this->request()->validate([
            'language' => ['required', 'min:3', 'max:20'],
            'theme' => ['required', 'min:3', 'max:23'],
            'description' => ['max:500000'],
            'code' => ['required', 'min:10', 'max:500000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $value) {
                $this->session()->set($field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/listing/add?id=' . $part_id);
        }

        $code = $this->request()->input('code');

        if ($this->request()->input('language') === 'php') {
            $code = ltrim($code, "<?php\n\r");
        }
        if ($this->request()->input('language') === 'html') {
            $code = htmlspecialchars_decode($code);
        }

        $this->service()->update(
            $this->request()->input('id'),
            $this->request()->input('language'),
            $this->request()->input('theme'),
            $this->request()->input('description'),
            $code,
            $this->executable(),
            $this->visible(),
        );

        $this->redirect('/admin/listing/add?id=' . $part_id);
    }

    public function destroy(): void
    {
        $this->service()->remove($this->request()->input('id'));

        $this->redirect('/admin/listing/add?id=' . $this->request()->input('part_id'));
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

    private function executable(): int
    {
        return $this->request()->input('executable') ? 1 : 0;
    }

    private function visible(): int
    {
        return $this->request()->input('visible') ? 1 : 0;
    }

    public function getCode(string $mode, string $code): string
    {
        if ($mode === 'php') {
            return '&lt;?php' . PHP_EOL . $code;
        }
        if ($mode === 'html') {
            return htmlspecialchars($code);
        }

        return $code;
    }

    private function service(): ListingService
    {
        if (! isset($this->service)) {
            $this->service = new ListingService($this->db());
        }

        return $this->service;
    }
}