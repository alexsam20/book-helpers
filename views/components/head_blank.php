<?php /** @var \Core\View\ViewInterface $view */  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/froala_editor.pkgd.min.css">
    <!--<link rel="stylesheet" href="/assets/css/dark.min.css">-->
    <!--<link rel="stylesheet" href="/assets/css/wang-editor.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="/themes/prism-tomorrow.min.css" id="themeStyleSheet" />
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <style>
        /*html.dark {
            --w-e-textarea-bg-color: #333;
            --w-e-textarea-color: #fff;
        }
        pre {
            overflow: auto;
        }
        code {
            outline: none;
        }*/
    </style>
</head>