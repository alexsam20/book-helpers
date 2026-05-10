<?php /** @var \Core\View\ViewInterface $view */  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/froala-editor.css">
    <link rel="stylesheet" href="/assets/css/font-awesome-6.7.2.css">
    <link rel="stylesheet" href="/assets/froala/css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="/assets/froala/css/dark.min.css">
    <!--<link rel="stylesheet" href="/assets/froala/css/emoticons.min.css">-->
    <!--<link rel="stylesheet" href="/assets/froala/css/image.min.css">-->
    <!--<link rel="stylesheet" href="/themes/prism-tomorrow.min.css" id="themeStyleSheet" />-->
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">-->
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        const isDarkMode = (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches));
        if (isDarkMode) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>