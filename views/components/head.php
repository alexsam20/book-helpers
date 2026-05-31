<?php /** @var \Core\View\ViewInterface $view */  ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $view->title(); ?></title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/fonts.css">
    <link rel="stylesheet" href="/assets/css/font-awesome-6.7.2.css">
    <link rel="stylesheet" href="/assets/froala/css/froala_editor.pkgd.min.css">
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        const isDarkMode = (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches));
        if (isDarkMode) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <style>
        p {
            text-indent: 0.93rem;
        }
    </style>
</head>