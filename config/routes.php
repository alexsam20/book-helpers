<?php

return [
    '/home' => function() {
        include_once APP_PATH . '/views/pages/home.php';
    },
    '/books' => function() {
        include_once APP_PATH . '/views/pages/books.php';
    }
];