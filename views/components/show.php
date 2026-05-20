<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Listing $code */ ?>
<?php /** @var \App\Models\Listing $languages */ ?>
<?php /** @var \App\Models\Listing $themes */ ?>
<?php /** @var \App\Models\Listing $i */ ?>
<?php /** @var \App\Controllers\ListingController $object */ ?>
<?php if ($i !== 1): ?>
    <hr class="h-1 my-8 mx-4 bg-neutral-quaternary border-0 shadow-lg" />
<?php endif; ?>
<div class="mb-4">
    <div class="p-1 dark:bg-gray-950/50 rounded-2xl">
        <!-- Code Block-->
<!--        <div>-->
            <div class="p-2 w-full h-full md:h-auto">
                <!-- Content -->
                <div class="p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Header -->
                    <div class="items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                            Block Code <?php echo $i; ?>
                        </h3>
                    </div>
                    <div class="mb-4 rounded-md">
                        <!-- Description -->
                        <div class="mb-4 rounded-md">
                            <script>
                                if (isDarkMode) {
                                    document.write('<style>.fr-box.fr-basic .fr-element {background:#4e4d4d;color:#f0efef!important;} .fr-second-toolbar {background:#353535!important;}.dark-theme .fr-second-toolbar,.dark-theme.fr-box.fr-basic .fr-wrapper,.dark-theme.fr-toolbar.fr-top {border: 1px solid #104e64;} .fr-modal .fr-modal-head, #codeSnippetLang-1 span {color: #fff;} .fr-modal .fr-modal-body {padding: 10px;} .fr-code-snippet-lang {background-color: #333;color: #fff;} .froala-edtr .fr-class-code {background:#2d2d2d;} .froala-edtr .fr-class-highlighted {color: #111111}</style>');
                                }
                            </script>
                            <div class="flex-col bg-neutral-primary-soft w-full rounded-md">
                                <?php echo $code->description(); ?>
                            </div>
                        </div>
                        <!-- Block Code -->
                        <div class="border border-gray-200 dark:border-cyan-900 mx-1 my-2 rounded-sm">
                            <script src="/assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
                            <div id="aceEditor<?php echo $i;?>"  class="rounded-sm" name="code"><?php echo $object->getCode($code->mode(), $code->source()); ?></div>
                            <!--<textarea name="code" id="hiddenCodeBlockTextarea<?php /*echo $i;*/?>" style="display: none"></textarea>-->
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

                                /*const formCodeBlock<?php echo $i;?> = document.getElementById("editCodeBlock<?php echo $i;?>");
                                const hiddenModalInput<?php echo $i;?> = document.getElementById("hiddenModalTextarea<?php echo $i;?>");
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
                                }*/
                            </script>
                        </div>
                    </div>
                </div>
            </div>
<!--        </div>-->
    </div>
</div>

