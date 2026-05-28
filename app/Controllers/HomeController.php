<?php

namespace App\Controllers;
use App\Services\BookService;
use App\Services\ListingService;
use App\Services\PostService;
use Core\Controller\Controller;
use Core\View\View;
use Throwable;

class HomeController extends Controller
{
    public function index(): void
    {
        $books = new BookService($this->db());

        $this->view('home', [
            'books' => $books->all(1),
        ], 'Books and Videos');
    }

    public function posts(): void
    {
        $posts = new PostService($this->db());

        $this->view('posts', [
            'posts' => $posts->all(1),
        ], 'All Posts');
    }

    public function post(): void
    {
        $posts = new PostService($this->db());

        $this->view('post', [
            'post' => $posts->find($this->request()->input('id')),
        ], 'Post');
    }

    public function about(): void
    {
        $this->view('about', [], 'About Us');
    }

    /**
     * @throws \JsonException
     */
    public function getCode(): void
    {
        header('Content-Type: application/json');
        $code = new ListingService($this->db());
        $code = $code->find((int) $this->request()->input('id'));

        if ($code) {
            $tmpFile = tempnam(sys_get_temp_dir(), 'ajax_php_');
            file_put_contents($tmpFile, '<?php ' . $code->source());

            ob_start();
            try {
                include $tmpFile;
            } catch (Throwable $e) {
                echo 'Error: ' . $e->getMessage() . ' Fuck Tup';
            }

            $result = ob_get_clean();
            unlink($tmpFile);

            echo json_encode([
                'success' => true,
                'output' => $result ? htmlspecialchars($result) : 'The code run successfully, but did\'t output anything',
                'nextToken' => $this->session()->csrf_token(),
            ], JSON_THROW_ON_ERROR);
            exit;
        }
    }

    /*public function getCode(): void
    {
        $code = new ListingService($this->db());
        $code = $code->find($this->request()->input('id'));
        var_dump($code->source()); // die;
        if ($code) {
            $tmpFile = tempnam(sys_get_temp_dir(), 'ajax_php_');
            file_put_contents($tmpFile, '<?php ' . $code->source());

            ob_start();
            try {
                include $tmpFile;
            } catch (Throwable $e) {
                echo 'Error: ' . $e->getMessage() . ' Fuck Tup';
            }

            $result = ob_get_clean();
            unlink($tmpFile);

            echo $result ? htmlspecialchars($result, ENT_QUOTES, 'UTF-8') : 'The code run successfully, but did\'t output anything';
            exit;
        }
    }*/
}