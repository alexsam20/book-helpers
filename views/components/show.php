<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Listing $code */ ?>
<?php /** @var \App\Models\Listing $languages */ ?>
<?php /** @var \App\Models\Listing $themes */ ?>
<?php /** @var \App\Models\Listing $i */ ?>
<?php /** @var \App\Controllers\ListingController $object */ ?>
<?php if ($i !== 1): ?>
    <hr class="h-1 my-1 mx-1 bg-neutral-quaternary border-0 shadow-lg" />
<?php endif; ?>
    <div class="p-1 dark:bg-gray-950/50 rounded-2xl">
        <!-- Code Block-->
        <div class="p-1 w-full h-full md:h-auto">
            <!-- Content -->
            <div class="p-2 bg-white rounded-lg shadow dark:bg-gray-800">
                <!-- Header -->
                <!--<div class="items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">-->
                <div class="flex justify-end text-sm font-semibold text-gray-900 dark:text-white">
                    Block Code <?php echo $i; ?>
                </div>
                <!--</div>-->
                <div class="mb-4 rounded-lg">
                    <!-- Description -->
                    <div class="mb-1 rounded-lg">
                        <script>
                            if (isDarkMode) {
                                document.write('<style>.fr-box.fr-basic .fr-element {background:#4e4d4d;color:#f0efef!important;} .fr-second-toolbar {background:#353535!important;}.dark-theme .fr-second-toolbar,.dark-theme.fr-box.fr-basic .fr-wrapper,.dark-theme.fr-toolbar.fr-top {border: 1px solid #104e64;} .fr-modal .fr-modal-head, #codeSnippetLang-1 span {color: #fff;} .fr-modal .fr-modal-body {padding: 10px;} .fr-code-snippet-lang {background-color: #333;color: #fff;} .froala-edtr .fr-class-code {background:#2d2d2d;} .froala-edtr .fr-class-highlighted {color: #111111}</style>');
                            }
                        </script>
                        <div class="flex-col bg-neutral-primary-soft w-full rounded-lg p-2 froala-edtr">
                            <?php echo $code->description(); ?>
                        </div>
                    </div>
                    <!-- Block Code -->
                    <div class="border border-gray-200 dark:border-cyan-900 mx-1 my-2 rounded-sm">
                        <script src="/assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
                        <div id="aceEditor<?php echo $i;?>"  class="rounded-sm" name="code"><?php echo $object->getCode($code->mode(), $code->source()); ?></div>
                        <script>
                            let aceEditor<?php echo $i;?> = ace.edit("aceEditor<?php echo $i;?>", {
                                theme: "ace/theme/<?php echo $code->theme(); ?>",
                                mode: "ace/mode/<?php echo $code->mode(); ?>",
                                maxLines: 1000
                            });
                            aceEditor<?php echo $i;?>.setReadOnly(false);
                            document.getElementById('aceEditor<?php echo $i;?>').style.lineHeight = "1.3";
                            document.getElementById('aceEditor<?php echo $i;?>').style.fontSize = '14px';
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>

