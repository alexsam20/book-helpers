<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Listing $code */ ?>
<?php /** @var \App\Models\Listing $languages */ ?>
<?php /** @var \App\Models\Listing $themes */ ?>
<?php /** @var \App\Models\Listing $i */ ?>
<?php /** @var \App\Controllers\ListingController $object */ ?>
<?php //var_dump($_SESSION); ?>
<?php if ($i !== 1): ?>
<hr class="h-1 my-8 mx-4 bg-neutral-quaternary border-0 shadow-lg" />
<?php endif; ?>
<div class="mb-4">
    <div class="p-1 dark:bg-gray-950/50 rounded-2xl">
        <!-- Edit Code Block-->
        <div>
            <div class="relative p-4 w-full h-full md:h-auto">
                    <!-- Content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Header -->
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                                Edit Block Code <?php echo $i; ?>
                            </h3>
                            <!-- Form Delete -->
                            <form method="post" onclick="return confirm('Delete?')" action="/admin/listing/destroy">
                                <input type="hidden" name="_csrf" value="<?php echo $session->csrf_token(); ?>" />
                                <input type="hidden" name="id" value="<?php echo $code->id(); ?>" />
                                <input type="hidden" name="part_id" value="<?php echo $code->partId(); ?>" />
                                <button type="submit" class="inline-flex items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
                                    <svg class="w-4 h-4 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                    Delete
                                </button>
                            </form>
                        </div>
                        <!-- Form -->
                        <form id="editCodeBlock<?php echo $i;?>" method="post" action="/admin/listing/update">
                            <input type="hidden" name="_csrf" value="<?php echo $session->csrf_token(); ?>" />
                            <input type="hidden" name="id" value="<?php echo $code->id(); ?>" />
                            <input type="hidden" name="part_id" value="<?php echo $code->partId(); ?>" />
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4 rounded-md">
                                <!-- Description -->
                                <div class="grid grid-cols-1 sm:col-span-2 mb-4 rounded-md">
                                    <div class="flex bg-neutral-primary-soft w-full rounded-md">
                                        <!--Text Editor-->
                                        <script>
                                            if (isDarkMode) {
                                                document.write('<style>.fr-box.fr-basic .fr-element {background:#4e4d4d;color:#f0efef!important;} .fr-second-toolbar {background:#353535!important;}.dark-theme .fr-second-toolbar,.dark-theme.fr-box.fr-basic .fr-wrapper,.dark-theme.fr-toolbar.fr-top {border: 1px solid #104e64;} .fr-modal .fr-modal-head, #codeSnippetLang-1 span {color: #fff;} .fr-modal .fr-modal-body {padding: 10px;} .fr-code-snippet-lang {background-color: #333;color: #fff;} .froala-edtr .fr-class-code {background:#2d2d2d;} .froala-edtr .fr-class-highlighted {color: #111111}</style>');
                                            }
                                        </script>
                                        <div id="froalaEditor<?php echo $i;?>" class="froala-edtr fr-view w-full rounded-md"><?php echo $code->description(); ?></div>
                                        <textarea name="description" id="hiddenTextareaDescription<?php echo $i;?>" style="display: none"></textarea>
                                        <script>
                                            /*function updateAllCsrfTokens<?php echo $i;?>(newToken) {
                                                document.querySelectorAll('input[name="_csrf"]').forEach(input => {
                                                    input.value = newToken;
                                                });
                                            }*/
                                            let editor<?php echo $i;?>;
                                            editor<?php echo $i;?> = new FroalaEditor("#froalaEditor<?php echo $i;?>", {
                                                key: 'Ne2C1sA4A3C3B15C11B8C6A5G4F3C3B2B10C8C5A5F3E3E2C2D2C2C4D-17d1F1FOOLb2KOPQGe1CWCQVTDWXGcTSKBHE2F2G2H1B10B2C1E6E1G1==',
                                                theme: isDarkMode ? "dark" : "royal",
                                                zIndex: 99999,
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
                                                        buttons: ['insertLink', 'insertImage', 'insertVideo', 'insertTable', 'codeSnippet', 'emoticons', 'fontAwesome', 'specialCharacters', 'embedly', 'insertFile', 'insertHR'],
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
                                                imageDefaultMargin: 7,
                                                // Image upload parameter.
                                                imageUploadParam: "image_param",
                                                // Image upload URL.
                                                imageUploadURL: "/admin/listing/upload_image",
                                                imageDeleteURL: "/admin/listing/delete_image",
                                                // Additional upload params.
                                                imageUploadParams: {
                                                    id: 'froalaEditor<?php echo $i;?>',
                                                    _csrf: document.querySelector('input[name="_csrf"]').value
                                                },
                                                imageDeleteParams: {
                                                    id: 'froalaEditor',
                                                    _csrf: document.querySelector('input[name="_csrf"]').value
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
                                                        const freshToken<?php echo $i;?> = document.querySelector('input[name="_csrf"]').value;
                                                        this.opts.imageUploadParams._csrf = freshToken<?php echo $i;?>;
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
                                                        let xhttp<?php echo $i;?> = new XMLHttpRequest();
                                                        xhttp<?php echo $i;?>.onreadystatechange = function () {
                                                            if (this.readyState == 4 && this.status == 200) {
                                                                console.log('Image was deleted');
                                                                let dataRem = JSON.parse(this.responseText);
                                                                if (dataRem && dataRem.new_csrf) {
                                                                    updateAllCsrfTokens(dataRem.new_csrf)
                                                                }
                                                            }
                                                        };
                                                        xhttp<?php echo $i;?>.open("POST", '/admin/listing/delete_image', true);
                                                        xhttp<?php echo $i;?>.send(JSON.stringify({
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
                                <?php $oldLanguage = $session->getFlash('language_val'); ?>
                                <!-- Language Select -->
                                <div class="relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                                        </svg>
                                    </div>
                                    <select id="language<?php echo $i;?>" name="language" class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                        <?php foreach($languages as $key => $value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($key === $code->mode()) { echo 'selected'; } ?> ><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if ($session->has('language')) : ?>
                                        <?php $errorLanguage = $session->getFlash('language')[0]; ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $errorLanguage ?></li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <!-- Theme Select -->
                                <div class="relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                                        </svg>
                                    </div>
                                    <select id="theme<?php echo $i;?>" name="theme" class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                        <?php foreach($themes as $key => $value) : ?>
                                            <option value="<?php echo $key; ?>" <?php if ($key === $code->theme()) { echo 'selected'; } ?> ><?php echo $value; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if ($session->has('theme')) : ?>
                                        <?php $errorTheme = $session->getFlash('theme')[0]; ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $errorTheme ?></li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <!-- Checkbox -->
                                <div class="grid grid-cols-1 sm:col-span-2  relative flex-1">
                                    <div class="mb-4 relative">
                                        <div class="flex w-full items-center justify-end gap-2 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-heading text-sm rounded-base py-2">
                                            <label class="inline-flex items-center me-5 cursor-pointer">
                                                <?php $executable = $session->getFlash('executable_val'); ?>
                                                <input type="checkbox" name="executable" class="sr-only peer" <?php echo $code->isExecutable() === 1 ? 'checked' : ''; ?>>
                                                <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-600 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600"></div>
                                                <span class="select-none ms-3 text-xs font-medium text-heading">Is Executable?</span>
                                            </label>
                                            <label class="inline-flex items-center me-5 cursor-pointer">
                                                <?php $oldVisible = $session->getFlash('visible_val'); ?>
                                                <input type="checkbox" name="visible" class="sr-only peer" <?php echo $code->isVisible() === 1 ? 'checked' : ''; ?>>
                                                <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-600 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600 dark:peer-checked:bg-teal-600"></div>
                                                <span class="select-none ms-3 text-xs font-medium text-heading">Is Visible?</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- Block Code -->
                                <div class="grid grid-cols-1 sm:col-span-2 border border-gray-200 dark:border-cyan-900 mx-1 my-2 rounded-sm">
                                    <div id="aceEditor<?php echo $i;?>"  class="rounded-sm" name="code"><?php echo $object->getCode($code->mode(), $code->source()); ?></div>
                                    <textarea name="code" id="hiddenCodeBlockTextarea<?php echo $i;?>" style="display: none"></textarea>
                                    <script>
                                        let aceEditor<?php echo $i;?> = ace.edit("aceEditor<?php echo $i;?>", {
                                            theme: "ace/theme/<?php echo $code->theme(); ?>",
                                            mode: "ace/mode/<?php echo $code->mode(); ?>",
                                            maxLines: 1000
                                            /*maxLines: 15,
                                            autoScrollEditorIntoView: true*/
                                        });
                                        aceEditor<?php echo $i;?>.setReadOnly(false);
                                        document.getElementById('aceEditor<?php echo $i;?>').style.lineHeight = "1.3";
                                        document.getElementById('aceEditor<?php echo $i;?>').style.fontSize = '14px';

                                        const formCodeBlock<?php echo $i;?> = document.getElementById("editCodeBlock<?php echo $i;?>");
                                        const selectMode<?php echo $i;?> = document.getElementById("language<?php echo $i;?>");
                                        const selectTheme<?php echo $i;?> = document.getElementById("theme<?php echo $i;?>");

                                        selectMode<?php echo $i;?>.addEventListener('change', (e) => {
                                            let valueMode<?php echo $i;?> = e.target.value;
                                            aceEditor<?php echo $i;?>.session.setMode(`ace/mode/${valueMode<?php echo $i;?>}`);
                                        });

                                        selectTheme<?php echo $i;?>.addEventListener('change', (e) => {
                                            let valueTheme<?php echo $i;?> = e.target.value;
                                            aceEditor<?php echo $i;?>.setTheme(`ace/theme/${valueTheme<?php echo $i;?>}`);
                                        });

                                        formCodeBlock<?php echo $i;?>.onsubmit = function () {
                                            document.getElementById("hiddenTextareaDescription<?php echo $i;?>").value = editor<?php echo $i;?>.html.get();
                                            document.getElementById("hiddenCodeBlockTextarea<?php echo $i;?>").value = aceEditor<?php echo $i;?>.getValue();
                                        }
                                    </script>
                                </div>
                            </div>
                            <div class="sm:col-span-2 flex items-end justify-end gap-2 mt-1">
                                <button type="submit" class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
                                    <svg class="w-5 h-5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"/>
                                    </svg>
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>

