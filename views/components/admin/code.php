<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Listing $code */ ?>
<?php /** @var \App\Models\Listing $languages */ ?>
<?php /** @var \App\Models\Listing $i */ ?>
<?php if ($i !== 1): ?>
<hr class="h-1 my-8 mx-4 bg-neutral-quaternary border-0 shadow-lg" />
<?php endif; ?>
<div class="mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 p-4  mx-3 my-2 dark:bg-gray-950/50 rounded-2xl">
        <!-- # Block Code -->
        <div class="inline-flex items-center gap-1">
            <span class="inline-flex items-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-base text-sm px-2 py-1 text-center leading-5">
                    <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                         viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                    </svg>
                    <span class="text-sm font-medium">Block Code #<?php echo $i ?></span>
                </span>
        </div>
        <!-- Edit Code Block-->
        <div class="inline-flex items-center gap-1 md:ml-auto">
            <!-- Modal Form & Button Add Block Code -->
            <div class="">
                <!-- Button Add Block Code -->
                <a type="button" href="#" id="blockCodeActionButton<?php echo $i;?>" data-modal-target="blockCodeModal<?php echo $i;?>" data-modal-toggle="blockCodeModal<?php echo $i;?>" class="inline-flex items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                    <svg class="w-5 h-5 mb-0.5 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                    </svg>
                    Edit Block Code
                </a>
                <!-- Main modal -->
                <div id="blockCodeModal<?php echo $i;?>" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-5xl h-full md:h-auto" style="z-index: 99999">
                        <!-- Modal content -->
                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                            <!-- Modal header -->
                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                <h3 class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                                    Edit Block Code
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white cursor-pointer" data-modal-toggle="blockCodeModal<?php echo $i;?>">
                                    <svg aria-hidden="true" class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" fill="currentColor" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <form id="editCodeModal<?php echo $i;?>" method="post" action="/admin/listing/update">
                                <input type="hidden" name="id" value="<?php echo $code->partId(); ?>" />
                                <div class="grid gap-4 mb-4 sm:grid-cols-2">
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
                                                <option value="<?php echo $key; ?>" <?php if ($key === $code->type()) { echo 'selected'; } ?> ><?php echo $value; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?php if ($session->has('language')) : ?>
                                            <?php $errorLanguage = $session->getFlash('language')[0]; ?>
                                            <ul>
                                                <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $errorLanguage ?></li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Checkbox -->
                                    <div class="relative flex-1">
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
                                        <?php if (isset($errorLanguage)) : ?>
                                            <ul>
                                                <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Description -->
                                    <div class="sm:col-span-2">
                                        <textarea id="editorDescription1" name="description" rows="4"
                                              class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                              placeholder="Write description"><?php echo $code->description(); ?></textarea>
                                        <?php if ($session->has('description')) : ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('description')[0]; ?></li>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                    <!-- Block Code -->
                                    <div class="sm:col-span-2 border border-gray-200 dark:border-cyan-900 mx-1 my-2 rounded-sm">
                                        <script src="/assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
                                        <div id="aceEditor<?php echo $i;?>" name="code"><?php echo $code->source(); ?></div>
                                        <textarea name="code" id="hiddenModalTextarea<?php echo $i;?>" style="display: none"></textarea>
                                        <script>
                                            let aceEditor<?php echo $i;?> = ace.edit("aceEditor<?php echo $i;?>", {
                                                theme: "ace/theme/twilight",
                                                mode: "ace/mode/<?php echo $code->type(); ?>",
                                                maxLines: 15,
                                                minLines: 15,
                                                autoScrollEditorIntoView: true
                                            });
                                            aceEditor<?php echo $i;?>.setReadOnly(false);
                                            document.getElementById('aceEditor<?php echo $i;?>').style.fontSize = '14px';

                                            const formModal<?php echo $i;?> = document.getElementById("editCodeModal<?php echo $i;?>");
                                            const hiddenModalInput<?php echo $i;?> = document.getElementById("hiddenModalTextarea<?php echo $i;?>");

                                            formModal<?php echo $i;?>.onsubmit = function () {
                                                hiddenModalInput<?php echo $i;?>.value = aceEditor<?php echo $i;?>.getValue();
                                            }
                                        </script>
                                    </div
                                </div>
                                <!-- Save button -->
                                <div class="sm:col-span-2 flex items-end justify-end gap-2 mt-1"">
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
    </div>
</div>
<div class="froala-edtr border border-gray-200 dark:border-cyan-900 mx-3 px-3 rounded-base">
    <p class="p-3 text-mauve-500"><?php echo nl2br($code->description()); ?></p>
</div>
<div class="border border-gray-200 dark:border-cyan-900 mx-3 my-2 rounded-base">
    <pre class="language-<?php echo $code->type(); ?>"><code id="source"><?php echo $code->source(); ?></code></pre>
</div>
<div class="border border-gray-200 dark:border-cyan-900 mx-3 my-2 rounded-sm">
    <p class="p-3 text-amber-500">
        Code running ...
    </p>
</div>

