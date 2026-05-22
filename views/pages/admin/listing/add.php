<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Part $part */ ?>
<?php /** @var \App\Models\Listing $languages */ ?>
<?php /** @var \App\Models\Listing $themes */ ?>
<?php /** @var \App\Models\Listing $codeListings */ ?>
<?php /** @var \App\Controllers\ListingController $object */ ?>
<?php //var_dump($_SESSION); ?>
<?php $view->component('start_blank') ?>
<!-- Content -->
<div class="flex flex-col h-full">
    <?php $view->component('admin/header') ?>
    <article class="main grow my-2">
        <!-- Page Content -->
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
                            <a href="/admin/parts?id=<?php echo $part->bookId(); ?>" class="inline-flex items-center ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
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
                                <svg class="w-4 h-4 me-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>                                </svg>
                                <?php echo $part->title(); ?>
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- Part Content -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-2xl">
                    <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
                        <svg class="w-7 h-7 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                        </svg>
                        Part - <?php echo $part->title(); ?>
                    </h1>
                    <!-- Button Back -->
                    <a type="button" href="/admin/parts?id=<?php echo $part->bookId() ?>" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z"></path>
                        </svg>
                        Back
                    </a>
                </div>
            </div>
            <!-- Add Blocks Code -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                <div class="flex p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
                    <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
                        <svg class="w-6 h-6 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                        </svg>
                        Add Block Code
                    </h1>
                </div>
                <div class="flex bg-neutral-primary-soft w-full rounded-2xl">
                    <div class="w-full bg-neutral-primary-soft px-4 py-3 bw-full shadow-xs rounded-2xl">
                        <form id="newCode" method="post" action="/admin/listing/add">
                            <input type="hidden" name="_csrf" value="<?php echo $session->csrf_token(); ?>" />
                            <input type="hidden" name="part_id" value="<?php echo $part->id(); ?>" />
                            <input type="hidden" name="book_id" value="<?php echo $part->bookId(); ?>" />
                            <!-- Description -->
                            <div class="mb-4">
                                <?php // var_dump($_SESSION); ?>
                                <div class="flex bg-neutral-primary-soft w-full">
                                    <!--Text Editor-->
                                    <script>
                                        if (isDarkMode) {
                                            document.write('<style>.fr-box.fr-basic .fr-element {background:#4e4d4d;color:#f0efef!important;} .fr-second-toolbar {background:#353535!important;}.dark-theme .fr-second-toolbar,.dark-theme.fr-box.fr-basic .fr-wrapper,.dark-theme.fr-toolbar.fr-top {border: 1px solid #104e64;} .fr-modal .fr-modal-head, #codeSnippetLang-1 span {color: #fff;} .fr-modal .fr-modal-body {padding: 10px;} .fr-code-snippet-lang {background-color: #333;color: #fff;} .froala-edtr .fr-class-code {background:#2d2d2d;} .froala-edtr .fr-class-highlighted {color: #111111}</style>');
                                        }
                                    </script>
                                    <div id="froalaEditor" class="w-full"><?php echo $session->getFlash('description_val'); ?></div>
                                    <textarea name="description" id="hiddenTextareaDescription" style="display: none"></textarea>
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
                                    </script>
                                </div>
                                <?php if ($session->has('description')) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('description')[0]; ?></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Language Button and Checkbox -->
                            <div class="md:flex w-full items-center gap-2">
                                <?php $oldLanguage = $session->getFlash('language_val'); ?>
                                <?php $oldTheme = $session->getFlash('theme_val'); ?>
                                <!-- Language Select -->
                                <div class="mb-4 relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                                        </svg>
                                    </div>
                                    <select id="language" name="language" class="bg-neutral-secondary-medium border border-default-medium dark:border-cyan-900 shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                        <option value="">Select Language</option>
                                        <?php foreach($languages as $key => $value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($key === $oldLanguage) { echo 'selected'; } ?> ><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (!empty($oldLanguage) && empty($oldTheme)) : ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if ($session->has('language')) : ?>
                                        <?php $errorLanguage = $session->getFlash('language')[0]; ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $errorLanguage ?></li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <!-- Theme Select -->
                                <div class="mb-4 relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m7.53316 11.8623.00957-.0029m5.58157 7.1424c-.5.515-.9195.8473-1.0611.8903-.4784.1454-5.42881-1.2797-6.23759-3.3305-.80878-2.0507-1.83058-5.8152-1.88967-6.2192-.0591-.40404 1.5599-1.72424 3.59722-2.61073m1.98839 8.05513c-.22637.262-.38955.5599-.55552.8474M13.4999 12c.5.5 1 1.049 2 1.049s1.5-.549 2-1.049m-4-4h.01m3.99 0h.01m-7.01-2.5c0-.28929 2.5-1.5 5-1.5s5 1.13645 5 1.5V12c0 1.9655-4.291 5-5 5-.7432 0-5-3.0345-5-5V5.5Z"/>
                                        </svg>
                                    </div>
                                    <select id="theme" name="theme" class="bg-neutral-secondary-medium border border-default-medium dark:border-cyan-900 shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                        <option value="">Select Theme</option>
                                        <?php foreach($themes as $key => $value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($key === $oldTheme) { echo 'selected'; } ?>><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if (empty($oldLanguage) && !empty($oldTheme)) : ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                                        </ul>
                                    <?php endif; ?>
                                    <?php if ($session->has('theme')) : ?>
                                        <?php $errorTheme = $session->getFlash('theme')[0]; ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $errorTheme ?></li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Checkbox Block -->
                            <div class="mb-4 relative flex-1">
                                <div class="flex w-full items-center justify-end gap-2 bg-neutral-secondary-medium border border-default-medium dark:border-cyan-900 shadow-sm text-heading text-sm rounded-base py-2 px-2">
                                    <label class="inline-flex items-center cursor-pointer">
                                        <?php $executable = $session->getFlash('executable_val'); ?>
                                        <input type="checkbox" name="executable" class="sr-only peer" <?php echo !empty($executable) ? 'checked' : ''; ?>>
                                        <span class="select-none text-xs font-medium text-heading px-2">Is Executable?</span>
                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600"></div>
                                    </label>
                                    <label class="inline-flex items-center cursor-pointer">
                                        <?php $oldVisible = $session->getFlash('visible_val'); ?>
                                        <input type="checkbox" name="visible" class="sr-only peer" <?php echo !empty($oldVisible) ? 'checked' : ''; ?>>
                                        <span class="select-none text-xs font-medium text-heading px-2">Is Visible?</span>
                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600 dark:peer-checked:bg-teal-600"></div>
                                    </label>
                                </div>
                                <?php if (isset($errorLanguage)) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Code -->
                            <div class="mb-4">
                                <div class="border border-gray-200 dark:border-cyan-900 rounded-base">
                                    <script src="/assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
                                    <div id="aceEditor" class="rounded-base" style="min-height: 200px;"><?php echo $session->getFlash('code_val'); ?></div>
                                    <textarea name="code" id="hiddenTextarea" style="display: none"></textarea>
                                    <script>
                                        const aceEditor = ace.edit("aceEditor");
                                        aceEditor.setTheme("ace/theme/twilight");
                                        aceEditor.session.setMode("ace/mode/javascript");
                                        aceEditor.setReadOnly(false);
                                        aceEditor.container.style.lineHeight = "1.3";
                                        aceEditor.container.style.fontSize = "14px";

                                        const form = document.getElementById("newCode");
                                        const selectMode = document.getElementById("language");
                                        const selectTheme = document.getElementById("theme");

                                        selectMode.addEventListener('change', (e) => {
                                            const value = e.target.value;
                                            aceEditor.session.setMode(`ace/mode/${value}`);
                                        });

                                        selectTheme.addEventListener('change', (e) => {
                                            const value = e.target.value;
                                            aceEditor.setTheme(`ace/theme/${value}`);
                                        });

                                        form.onsubmit = function () {
                                            document.getElementById("hiddenTextareaDescription").value = editor.html.get();
                                            document.getElementById("hiddenTextarea").value = aceEditor.getValue();
                                        }
                                    </script>
                                </div>
                                <?php if ($session->has('code')) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm text-pink-600" style="list-style-type: none;"><?php echo $session->getFlash('code')[0]; ?></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Save button -->
                            <div class="flex items-end justify-end gap-2 mt-3">
                                <button type="submit" id="sendForm" class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
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
            <!-- Blocks Code -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-t-2xl mb-4">
            <?php if (count($codeListings) > 0): ?>
            <?php $i = 1; ?>
            <?php foreach ($codeListings as $code): ?>
                <?php $view->component('admin/code', ['code' => $code, 'languages' => $languages, 'themes' => $themes, 'object' => $object, 'i' => $i]); ?>
                <?php $i++; ?>
            <?php endforeach; ?>
            <?php endif; ?>
            </div>
        </div>
    </article>
    <?php $view->component('footer') ?>
</div>
<?php $view->component('end') ?>
