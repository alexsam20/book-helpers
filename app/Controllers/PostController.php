<?php

namespace App\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Core\Controller\Controller;
use stdClass;

class PostController extends Controller
{
    private PostService $service;
    public function index(): void
    {
        $this->view('/admin/posts/list', [
            'posts' => $this->service()->all(),
            'object' => $this,
        ], 'Posts');
    }

    public function create(): void
    {
        $this->view(name: '/admin/posts/add', title:  'Create New Post');
    }

    public function store(): void
    {
        $validation = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:200'],
            'body' => ['required', 'min:10', 'max:50000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $value) {
                $this->session()->set($field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/posts/add');
        }

        $this->service()->store(
            $this->auth()->id(),
            $this->request()->input('title'),
            $this->request()->input('body'),
        );

        $this->redirect('/admin/posts');
    }

    public function edit(): void
    {
        /** @var Post $post */
        $post = $this->service()->find($this->request()->input('id'));
        $this->view('/admin/posts/update', [
            'post' => $this->service()->find($this->request()->input('id')),
        ], 'Edit Post');
    }

    public function update(): void
    {
        $validation = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:100'],
            'body' => ['required', 'min:10', 'max:50000'],
        ]);

        if (! $validation) {
            foreach ($this->request()->errors() as $field => $value) {
                $this->session()->set($field, $value);
            }

            foreach ($this->request()->post as $old_field => $value) {
                $this->session()->set("{$old_field}_val", $value);
            }

            $this->redirect('/admin/posts/update?id=' . $this->request()->input('id'));
        }

        $this->service()->update(
            (int) $this->request()->input('id'),
            $this->request()->input('title'),
            $this->request()->input('body')
        );

        $this->redirect('/admin/posts?id=' . $this->request()->input('id'));
    }

    public function destroy(): void
    {
        $this->service()->remove($this->request()->input('id'));

        $this->redirect('/admin/posts?id=' . $this->request()->input('book_id'));
    }

    public function visible(): void
    {
        $this->service()->updateVisibility((int) $this->request()->input('id'));

        $this->redirect('/admin/posts');
    }

    /**
     * @throws \JsonException
     */
    public function upload(): void
    {
        is_dir(STORAGE_POST) || mkdir(STORAGE_POST, 0777, true);
        is_dir(TRASH_POST) || mkdir(TRASH_POST, 0777, true);

        $name = $_FILES['image_param']['name'];
        $extension = pathinfo($name, PATHINFO_EXTENSION);
        $randomName = md5(uniqid(mt_rand(), true)) . '.' . $extension;
        $tmpName = $_FILES['image_param']['tmp_name'];
        $destination = STORAGE_POST . $randomName;

        if (move_uploaded_file($tmpName, $destination)) {
            $response = new stdClass();
            $response->link = URL_PATH . '/storage/post/' . $randomName;
            $response->new_csrf = $this->session()->csrf_token();
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
            $oldFile = APP_PATH . "/storage/post/" . $image;
            $trash = APP_PATH . "/storage/trash/post/" . $image;
            if (rename($oldFile, $trash)) {
                $response = new stdClass();
                $response->link = APP_PATH . "/storage/trash/block/" . $image;
                $response->new_csrf = $this->session()->csrf_token();
                echo stripcslashes(json_encode($response));
                return true;
            }
        }

        return false;
    }

    private function service(): PostService
    {
        if (! isset($this->service)) {
            $this->service = new PostService($this->db());
        }

        return $this->service;
    }
}