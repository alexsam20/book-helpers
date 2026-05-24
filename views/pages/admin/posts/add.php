<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Session\SessionInterface $session */  ?>
<?php /** @var array<\App\Models\Post> $post */ ?>
<?php $view->component('start') ?>
<!-- Content -->
<div class="flex flex-col h-full">
    <?php $view->component('admin/header') ?>
    <main class="main grow my-2">
        <div class="container flex flex-col border border-gray-200 dark:border-gray-800 dark:bg-gray-950/10 rounded-2xl">
            <!-- Breadcrumbs -->
            <nav class="flex m-2 pt-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="flex items-center">
                        <a href="/admin" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-5-4v4h4V3h-4Z"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <a href="/admin/parts?id=<?php // echo $id; ?>" class="inline-flex items-center ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-4 h-4 me-2" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                                </svg>
                                Parts of Book
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <span class="inline-flex items-center ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-4 h-4 me-2" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"></path>
                                </svg>
                                Add Part
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- Page Content -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
                    <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
                        <svg class="w-7 h-7 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="2" d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9M9 7h6m-7 3h8"/>
                        </svg>
                        Add Post
                    </h1>
                    <a type="button" href="/admin/posts" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z"></path>
                        </svg>
                        Back
                    </a>
                </div>
                <div class="flex bg-neutral-primary-soft w-full rounded-2xl">
                    <div class="w-full bg-neutral-primary-soft p-6 bw-full shadow-xs rounded-2xl">
                        <form id="newPost" method="post" action="/admin/posts/add">
                            <input type="hidden" name="_csrf" value="<?php echo $session->csrf_token(); ?>" />
                            <div class="mb-4 relative">
                                <input type="text" id="title" name="title" value="<?php echo $session->getFlash('title_val'); ?>"
                                       class="bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body"
                                       placeholder="Title" />
                                <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 13h3.439a.991.991 0 0 1 .908.6 3.978 3.978 0 0 0 7.306 0 .99.99 0 0 1 .908-.6H20M4 13v6a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-6M4 13l2-9h12l2 9" />
                                    </svg>
                                </div>
                                <?php if ($session->has('title')) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('title')[0]; ?></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!--Body-->
                            <div class="mb-4">
                                <?php // var_dump($_SESSION); ?>
                                <div class="flex bg-neutral-primary-soft w-full">
                                    <!--Text Editor-->
                                    <script>
                                        if (isDarkMode) {
                                            document.write('<style>.fr-box.fr-basic .fr-element {background:#4e4d4d;color:#f0efef!important;} .fr-second-toolbar {background:#353535!important;}.dark-theme .fr-second-toolbar,.dark-theme.fr-box.fr-basic .fr-wrapper,.dark-theme.fr-toolbar.fr-top {border: 1px solid #104e64;} .fr-modal .fr-modal-head, #codeSnippetLang-1 span {color: #fff;} .fr-modal .fr-modal-body {padding: 10px;} .fr-code-snippet-lang {background-color: #333;color: #fff;} .froala-edtr .fr-class-code {background:#2d2d2d;} .froala-edtr .fr-class-highlighted {color: #111111}</style>');
                                        }
                                    </script>
                                    <div id="froalaEditor" class="w-full"><?php echo $session->getFlash('body_val'); ?></div>
                                    <textarea name="body" id="hiddenTextarea" style="display: none"></textarea>
                                    <script type="text/javascript" src="/assets/froala/js/froala_editor.pkgd.min.js"></script>
                                    <script>
                                        function updateAllCsrfTokens(newToken) {
                                            document.querySelectorAll('input[name="_csrf"]').forEach(input => {
                                                input.value = newToken;
                                            });
                                        }
                                        let editor;
                                        editor = new FroalaEditor("#froalaEditor", {
                                            /*iframe: true,*/
                                            key: 'Ne2C1sA4A3C3B15C11B8C6A5G4F3C3B2B10C8C5A5F3E3E2C2D2C2C4D-17d1F1FOOLb2KOPQGe1CWCQVTDWXGcTSKBHE2F2G2H1B10B2C1E6E1G1==',
                                            theme: isDarkMode ? "dark" : "royal",
                                            /*pluginsEnabled: ['image', 'imageFilerobot'],*/
                                            zIndex: 1,
                                            toolbarButtons: {
                                                // Key represents the more button from the toolbar.
                                                moreText: {
                                                    // List of buttons used in the  group.
                                                    buttons: ['bold', 'italic', 'underline', 'strikeThrough', 'subscript', 'superscript', 'fontFamily', 'fontSize', 'textColor', 'backgroundColor', 'inlineClass', 'inlineStyle', 'clearFormatting'],
                                                    // Alignment of the group in the toolbar.
                                                    align: 'left',
                                                    // By default, 3 buttons are shown in the main toolbar. The rest of them are available when using the more button.
                                                    buttonsVisible: 3
                                                },
                                                moreParagraph: {
                                                    buttons: ['alignLeft', 'alignCenter', 'formatOLSimple', 'alignRight', 'alignJustify', 'formatOL', 'formatUL', 'paragraphFormat', 'paragraphStyle', 'lineHeight', 'outdent', 'indent', 'quote'],
                                                    align: 'left',
                                                    buttonsVisible: 3
                                                },
                                                moreRich: {
                                                    buttons: ['insertLink', 'insertImage', 'insertVideo', 'insertTable', 'emoticons', 'fontAwesome', 'specialCharacters', 'embedly', 'insertFile', 'insertHR'],
                                                    align: 'left',
                                                    buttonsVisible: 3
                                                },
                                                moreMisc: {
                                                    buttons: ['undo', 'redo', 'fullscreen', 'print', 'getPDF', 'spellChecker', 'selectAll', 'html', 'help'],
                                                    align: 'right',
                                                    buttonsVisible: 2
                                                }
                                            },
                                            // Change buttons for XS screen.
                                            toolbarButtonsXS: [['undo', 'redo'], ['bold', 'italic', 'underline']],
                                            // Image upload parameter.
                                            imageUploadParam: "image_param",
                                            // Image upload URL.
                                            imageUploadURL: "/admin/listing/upload_image",
                                            imageDeleteURL: "/admin/listing/delete_image",
                                            // Additional upload params.
                                            imageUploadParams: {
                                                id: 'froalaEditor',
                                                _csrf: "<?php echo $session->csrf_token(); ?>"
                                            },
                                            imageDeleteParams: {
                                                id: 'froalaEditor',
                                                _csrf: "<?php echo $session->csrf_token(); ?>"
                                            },
                                            // Set request type.
                                            imageUploadMethod: 'POST',
                                            // Set max image size to 5MB.
                                            imageMaxSize: 5 * 1024 * 1024,
                                            // Allow to upload PNG and JPG.
                                            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif', 'svg'],
                                            events: {
                                                // Return false if you want to stop the image upload.
                                                'image.beforeUpload': function (images) {
                                                },
                                                // Image was uploaded to the server.
                                                'image.uploaded': function (response) {
                                                    const data = JSON.parse(response);
                                                    if (data && data.new_csrf) {
                                                        updateAllCsrfTokens(data.new_csrf)
                                                    }
                                                },
                                                // Image was inserted in the editor.
                                                'image.inserted': function ($img, response) {},
                                                // Image was replaced in the editor.
                                                'image.replaced': function ($img, response) {},
                                                'image.error': function (error, response) {
                                                    // Bad link.
                                                    if (error.code == 1) { console.log(error.message); }
                                                    // No link in upload response.
                                                    else if (error.code == 2) { console.log(error.message); }
                                                    // Error during image upload.
                                                    else if (error.code == 3) { console.log(error.message); }
                                                    // Parsing response failed.
                                                    else if (error.code == 4) { console.log(error.message); }
                                                    // Image too text-large.
                                                    else if (error.code == 5) { console.log(error.message); }
                                                    // Invalid image type.
                                                    else if (error.code == 6) { console.log(error.message); }
                                                    // Image can be uploaded only to same domain in IE 8 and IE 9.
                                                    else if (error.code == 7) { console.log(error.message); }
                                                },
                                                'image.removed': function ($img) {
                                                    let xhttp = new XMLHttpRequest();
                                                    xhttp.onreadystatechange = function () {
                                                        if (this.readyState == 4 && this.status == 200) {
                                                            console.log('Image was deleted');
                                                            let data = JSON.parse(this.responseText);
                                                            console.log(data.new_csrf);
                                                            updateAllCsrfTokens(data.new_csrf);
                                                        }
                                                    };
                                                    xhttp.open("POST", '/admin/listing/delete_image', true);
                                                    xhttp.send(JSON.stringify({
                                                        src: $img.attr('src'),
                                                        _csrf: document.querySelector('input[name="_csrf"]').value
                                                    }));
                                                },
                                            }
                                        });
                                        const form = document.getElementById("newPost");
                                        form.onsubmit = function () {
                                            document.getElementById("hiddenTextarea").value = editor.html.get();
                                        }
                                    </script>
                                </div>
                                <?php if ($session->has('body')) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('body')[0]; ?></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Save button -->
                            <div class="flex items-end justify-end gap-2">
                                <button type="submit" class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
                                    <svg class="w-5 h-5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"/>
                                    </svg>
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php $view->component('footer') ?>
</div>
<?php $view->component('end') ?>
