<!-- Modal Form & Button Add Block Code -->
<div class="!!!my-modal-container its-name-i-am-make-self!!!">
    <!-- Button Add Block Code -->
    <a type="button" href="#" id="blockCodeActionButton" data-modal-target="blockCodeModal" data-modal-toggle="blockCodeModal" class="inline-flex items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
        <svg class="w-5 h-5 mb-0.5 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
        </svg>
        Add Block Code
    </a>
    <!-- Main modal -->
    <div id="blockCodeModal" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                        Add Block Code
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="blockCodeModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form method="post" action="/admin/listing/add">
                    <input type="hidden" name="part_id" value="<?php echo $part->id(); ?>" />
                    <input type="hidden" name="book_id" value="<?php echo $part->bookId(); ?>" />
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <?php $oldLanguage = $session->getFlash('language_val'); ?>
                        <?php $oldTheme = $session->getFlash('theme_val'); ?>
                        <!-- Language Select -->
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                                </svg>
                            </div>
                            <select id="language" name="language" class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
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
                                <ul>
                                    <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('language')[0]; ?></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <!-- Theme Select -->
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m7.53316 11.8623.00957-.0029m5.58157 7.1424c-.5.515-.9195.8473-1.0611.8903-.4784.1454-5.42881-1.2797-6.23759-3.3305-.80878-2.0507-1.83058-5.8152-1.88967-6.2192-.0591-.40404 1.5599-1.72424 3.59722-2.61073m1.98839 8.05513c-.22637.262-.38955.5599-.55552.8474M13.4999 12c.5.5 1 1.049 2 1.049s1.5-.549 2-1.049m-4-4h.01m3.99 0h.01m-7.01-2.5c0-.28929 2.5-1.5 5-1.5s5 1.13645 5 1.5V12c0 1.9655-4.291 5-5 5-.7432 0-5-3.0345-5-5V5.5Z"/>
                                </svg>
                            </div>
                            <select id="theme" name="theme" class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                <option value="">Select Theme</option>
                                <?php foreach($themes as $theme) : ?>
                                    <option value="<?php echo $theme; ?>" <?php if ($theme === $oldTheme) { echo 'selected'; } ?> ><?php echo ucfirst($theme); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if (empty($oldLanguage) && !empty($oldTheme)) : ?>
                                <ul>
                                    <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                                </ul>
                            <?php endif; ?>
                            <?php if ($session->has('theme')) : ?>
                                <ul>
                                    <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('theme')[0]; ?></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <!-- Checkbox -->
                        <div class="sm:col-span-2 mb-4 relative">
                            <div class="flex w-full items-center justify-end gap-2 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-heading text-sm rounded-base py-2">
                                <label class="inline-flex items-center me-5 cursor-pointer">
                                    <?php $executable = $session->getFlash('executable_val'); ?>
                                    <input type="checkbox" name="executable" class="sr-only peer" <?php echo !empty($executable) ? 'checked' : ''; ?>>
                                    <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-600 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600"></div>
                                    <span class="select-none ms-3 text-sm font-medium text-heading">Is Executable?</span>
                                </label>
                                <label class="inline-flex items-center me-5 cursor-pointer">
                                    <?php $oldVisible = $session->getFlash('visible_val'); ?>
                                    <input type="checkbox" name="visible" class="sr-only peer" <?php echo !empty($oldVisible) ? 'checked' : ''; ?>>
                                    <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-600 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600 dark:peer-checked:bg-teal-600"></div>
                                    <span class="select-none ms-3 text-sm font-medium text-heading">Is Visible?</span>
                                </label>
                            </div>
                        </div>
                        <!-- Description -->
                        <div class="sm:col-span-2">
                                                <textarea id="description" name="description" rows="4"
                                                          class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                                          placeholder="Write description"><?php echo $session->getFlash('description_val'); ?></textarea>
                            <?php if ($session->has('description')) : ?>
                                <ul>
                                    <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('description')[0]; ?></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                        <!-- Block Code -->

                        <div class="sm:col-span-2 border border-gray-200 dark:border-cyan-900 mx-1 my-2 rounded-sm">
                            <script src="/assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
                            <!--<span class="p-2 text-white" for="ascript">Block code #1</span>-->
                            <div id="aeditor" name="code">const personalCard = {
                                id: 8,
                                name: 'Alexandr Sam',
                                email: 'alexserss@gmail.com',
                                phone: "+1 631 542 6481",
                                gender: 'm',
                                birthDay: '2970-07-20',
                                danate: false,
                                createdAt: Date()
                                };
                                for (const key in personalCard) {
                                console.log(key + ":\t\t" + personalCard[key]);
                                // console.log(`${key}:\t${personalCard[key]}`);
                                }</div>
                            <script>
                                let aeditor = ace.edit("aeditor", {
                                    theme: "ace/theme/twilight",
                                    mode: "ace/mode/javascript",
                                    maxLines: 1000
                                });
                                aeditor.setReadOnly(false);
                                document.getElementById('aeditor').style.fontSize = '14px';
                                /*document.querySelector('#aeditor .ace_text-input')
                                    .setAttribute('name', 'ascript');
                                document.querySelector('#aeditor .ace_text-input')
                                    .setAttribute('id', 'ascript');*/
                            </script>
                        </div
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
    <!-- Button Back -->
    <a type="button" href="/admin/parts?id=<?php echo $part->bookId() ?>" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z"></path>
        </svg>
        Back
    </a>
</div>

<!-- Add Blocks Code -->
<div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
    <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
        <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
            <svg class="w-6 h-6 me-2" aria-hidden="true"
                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                 viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
            </svg>
            Add Block Code
        </h1>
    </div>
    <div class="flex bg-neutral-primary-soft w-full rounded-2xl">
        <div class="w-full bg-neutral-primary-soft p-6 bw-full shadow-xs rounded-2xl">
            <form id="newCode" method="post" action="/admin/listing/add">
                <input type="hidden" name="part_id" value="<?php echo $part->id(); ?>" />
                <input type="hidden" name="book_id" value="<?php echo $part->bookId(); ?>" />
                <!-- Language and Theme Button -->
                <div class="md:flex w-full items-center gap-2">
                    <?php $oldLanguage = $session->getFlash('language_val'); ?>
                    <?php $oldTheme = $session->getFlash('theme_val'); ?>
                    <!-- Language Select -->
                    <div class="mb-4 relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                            <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
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
                            <ul>
                                <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('language')[0]; ?></li>
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
                            <?php foreach($themes as $theme) : ?>
                                <option value="<?php echo $theme; ?>" <?php if ($theme === $oldTheme) { echo 'selected'; } ?> ><?php echo ucfirst($theme); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (empty($oldLanguage) && !empty($oldTheme)) : ?>
                            <ul>
                                <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                            </ul>
                        <?php endif; ?>
                        <?php if ($session->has('theme')) : ?>
                            <ul>
                                <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('theme')[0]; ?></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Checkbox Block -->
                <div class="mb-4 relative">
                    <div class="flex w-full items-center justify-end gap-2 bg-neutral-secondary-medium border border-default-medium dark:border-cyan-900 shadow-sm text-heading text-sm rounded-base py-2 px-2">
                        <label class="inline-flex items-center me-5 cursor-pointer">
                            <?php $executable = $session->getFlash('executable_val'); ?>
                            <input type="checkbox" name="executable" class="sr-only peer" <?php echo !empty($executable) ? 'checked' : ''; ?>>
                            <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600"></div>
                            <span class="select-none ms-3 text-sm font-medium text-heading">Is Executable?</span>
                        </label>
                        <label class="inline-flex items-center me-5 cursor-pointer">
                            <?php $oldVisible = $session->getFlash('visible_val'); ?>
                            <input type="checkbox" name="visible" class="sr-only peer" <?php echo !empty($oldVisible) ? 'checked' : ''; ?>>
                            <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600 dark:peer-checked:bg-teal-600"></div>
                            <span class="select-none ms-3 text-sm font-medium text-heading">Is Visible?</span>
                        </label>
                    </div>
                </div>
                <!-- Description -->
                <div class="mb-4">
                                <textarea id="description" name="description" rows="4"
                                          class="bg-neutral-secondary-medium border border-default-medium dark:border-cyan-900 text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                          placeholder="Write description"><?php echo $session->getFlash('description_val'); ?></textarea>
                    <?php if ($session->has('description')) : ?>
                        <ul>
                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('description')[0]; ?></li>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- Code -->
                <div class="mb-4">
                    <div class="border border-gray-200 dark:border-cyan-900 rounded-base">
                        <script src="/assets/ace/ace.js" type="text/javascript" charset="utf-8"></script>
                        <div id="aceEditor" class="rounded-base" style="min-height: 200px;"></div>
                        <textarea name="code" id="hiddenTextarea" style="display: none"></textarea>
                        <script>
                            const aceEditor = ace.edit("aceEditor");
                            aceEditor.setTheme("ace/theme/twilight");
                            aceEditor.session.setMode("ace/mode/javascript");
                            aceEditor.setReadOnly(false);
                            aceEditor.container.style.lineHeight = "1.3";
                            aceEditor.container.style.fontSize = "14px";

                            const form = document.getElementById("newCode");
                            const hiddenInput = document.getElementById("hiddenTextarea");

                            form.onsubmit = function () {
                                hiddenInput.value = aceEditor.getValue();
                            }
                        </script>
                    </div

                    <?php if ($session->has('code')) : ?>
                        <ul>
                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('code')[0]; ?></li>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- Save button -->
                <div class="flex items-end justify-end gap-2 mt-3">
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
        <div class="w-full bg-neutral-primary-soft p-6 bw-full shadow-xs rounded-2xl">
            <form id="newCode" method="post" action="/admin/listing/add">
                <input type="hidden" name="part_id" value="<?php echo $part->id(); ?>" />
                <input type="hidden" name="book_id" value="<?php echo $part->bookId(); ?>" />
                <!-- Language and Theme Button -->
                <div class="md:flex w-full items-center gap-2">
                    <?php $oldLanguage = $session->getFlash('language_val'); ?>
                    <?php $oldTheme = $session->getFlash('theme_val'); ?>
                    <!-- Language Select -->
                    <div class="mb-4 relative flex-1">
                        <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                            <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
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
                            <ul>
                                <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('language')[0]; ?></li>
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
                            <?php foreach($themes as $theme) : ?>
                                <option value="<?php echo $theme; ?>" <?php if ($theme === $oldTheme) { echo 'selected'; } ?> ><?php echo ucfirst($theme); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (empty($oldLanguage) && !empty($oldTheme)) : ?>
                            <ul>
                                <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                            </ul>
                        <?php endif; ?>
                        <?php if ($session->has('theme')) : ?>
                            <ul>
                                <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('theme')[0]; ?></li>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Checkbox Block -->
                <div class="mb-4 relative">
                    <div class="flex w-full items-center justify-end gap-2 bg-neutral-secondary-medium border border-default-medium dark:border-cyan-900 shadow-sm text-heading text-sm rounded-base py-2 px-2">
                        <label class="inline-flex items-center me-5 cursor-pointer">
                            <?php $executable = $session->getFlash('executable_val'); ?>
                            <input type="checkbox" name="executable" class="sr-only peer" <?php echo !empty($executable) ? 'checked' : ''; ?>>
                            <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600"></div>
                            <span class="select-none ms-3 text-sm font-medium text-heading">Is Executable?</span>
                        </label>
                        <label class="inline-flex items-center me-5 cursor-pointer">
                            <?php $oldVisible = $session->getFlash('visible_val'); ?>
                            <input type="checkbox" name="visible" class="sr-only peer" <?php echo !empty($oldVisible) ? 'checked' : ''; ?>>
                            <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600 dark:peer-checked:bg-teal-600"></div>
                            <span class="select-none ms-3 text-sm font-medium text-heading">Is Visible?</span>
                        </label>
                    </div>
                </div>
                <!-- Description -->
                <div class="mb-4">
                                <textarea id="description" name="description" rows="4"
                                          class="bg-neutral-secondary-medium border border-default-medium dark:border-cyan-900 text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                          placeholder="Write description"><?php echo $session->getFlash('description_val'); ?></textarea>
                    <?php if ($session->has('description')) : ?>
                        <ul>
                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('description')[0]; ?></li>
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
                            const hiddenInput = document.getElementById("hiddenTextarea");

                            form.onsubmit = function () {
                                hiddenInput.value = aceEditor.getValue();
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

<!-- Copy Text to Text area -->
<textarea name="" id="editCode" hidden></textarea>
<div id="action" class="m-2 flex justify-end gap-2">
    <button onclick="resetContent()" type="button" id="cancel" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z"/>
        </svg>
        Back
    </button>
    <button type="submit" id="save" class="inline-flex text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 1 0-18c1.052 0 2.062.18 3 .512M7 9.577l3.923 3.923 8.5-8.5M17 14v6m-3-3h6"/>
        </svg>
        Save
    </button>
</div>
<script>
    const action = document.getElementById('action');
    action.hidden = true;

    const source = document.getElementById('source');
    const originalSource = source.innerHTML;
    const codeEditor = document.getElementById('editCode');


    const psm = Prism.plugins.toolbar.registerButton("#edit", {
        text: "Edit", // required
        onClick: function () {

            source.spellcheck = false;
            source.contentEditable= true;
            source.focus();
            source.style.borderBottom = "1px solid gray";
            action.hidden = false;

            const updateText = () => {
                codeEditor.value = source.innerText;
            }
            updateText();
            source.addEventListener('input', updateText);

            //alert(`This code snippet is written in ${env.language}.`);
        },
    });

    function resetContent() {
        source.innerHTML = originalSource;
    }
</script>
<!-- !!Copy Text to Text area -->

<!-- Description Text Editor -->
<div class="items-center w-full">
    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex items-center justify-between px-3 py-2 border-b border-gray-200 dark:border-gray-600 border-gray-200">
            <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                    <!--Bold-->
                    <button type="button" id="bold" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-bold"></i>
                    </button>
                    <!--Italic-->
                    <button type="button" id="italic" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-italic"></i>
                    </button>
                    <!--Underline-->
                    <button type="button" id="underline" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-underline"></i>
                    </button>
                    <!--Strikethrough-->
                    <button type="button" id="strikethrough" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-strikethrough"></i>
                    </button>
                    <!--Superscript-->
                    <button type="button" id="superscript" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-superscript"></i>
                    </button>
                    <!--Superscript-->
                    <button type="button" id="subscript" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-subscript"></i>
                    </button>
                    <!--Code-->
                    <button type="button" id="code" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-code"></i>
                    </button>
                    <!--RotateLeft-->
                    <button type="button" id="undo" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-rotate-left"></i>
                    </button>
                    <!--RotateRight-->
                    <button type="button" id="redo" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-rotate-right"></i>
                    </button>
                </div>
                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                    <!--Font-->
                    <select  id="font" class="px-2.5 py-1.5 border-0 hover:border-0 text-gray-500 text-sm rounded-base cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-400 dark:bg-gray-800/50 dark:hover:bg-gray-800 placeholder:text-body">
                        <option value="Arial">Arial</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Garamond">Garamond</option>
                        <option value="Georgia">Georgia</option>
                        <option value="The New Roman">The New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="cursive">Cursive</option>
                    </select>
                    <!--FontSize-->
                    <select  id="fontSize" class="px-2.5 py-1.5 w-12 border-0 hover:border-0 text-gray-500 text-sm rounded-base cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-400 dark:bg-gray-800/50 dark:hover:bg-gray-800 placeholder:text-body">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <!--TextColor-->
                    <button type="button" id="textColor" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-font"></i>
                    </button>
                    <!--BgColor-->
                    <button type="button" id="bgColor" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-fill-drip"></i>
                    </button>
                    <!--AlignLeft-->
                    <button type="button" id="alignLeft" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <!--AlignCenter-->
                    <button type="button" id="alignCenter" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-center"></i>
                    </button>
                    <!--AlignRight-->
                    <button type="button" id="alignRight" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-right"></i>
                    </button>
                    <!--AlignJustify-->
                    <button type="button" id="alignJustify" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <!--Indent-->
                    <button type="button" id="indent" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-indent"></i>
                    </button>
                    <!--Outdent-->
                    <button type="button" id="outdent" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-outdent"></i>
                    </button>
                    <!--OrderedList-->
                    <button type="button" id="orderedList" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-list-ol"></i>
                    </button>
                    <!--UnorderedList-->
                    <button type="button" id="unorderedList" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-list-ul"></i>
                    </button>
                    <!--InsertLink-->
                    <button type="button" id="createLink" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-link"></i>
                    </button>
                    <!--RemoveLink-->
                    <button type="button" id="unlink" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-unlink"></i>
                    </button>
                    <!--insertImageUrl-->
                    <button type="button" id="insertImageUrl" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-image"></i>
                    </button>
                    <!--insertImageFile-->
                    <button type="button" id="insertImageFile" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-upload"></i>
                    </button>
                </div>
                <input type="color" id="textColorPicker" style="display: none;">
                <input type="color" id="bgColorPicker" style="display: none;">
                <input type="file" id="imageUpload" style="display: none;">
                <input type="text" id="imageUrl" placeholder="Enter image URL" style="display: none;">
            </div>
            <!--Button Full Screen-->
            <!--<button type="button" data-tooltip-target="tooltip-fullscreen" class="p-2 text-gray-500 rounded-sm cursor-pointer sm:ms-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 19">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1h5m0 0v5m0-5-5 5M1.979 6V1H7m0 16.042H1.979V12M18 12v5.042h-5M13 12l5 5M2 1l5 5m0 6-5 5"></path>
                </svg>
                <span class="sr-only">Full screen</span>
            </button>
            <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1441px, 369px);">
                Show full screen
                <div class="tooltip-arrow" data-popper-arrow="" style="position: absolute; left: 0; transform: translate(63px, 0px);"></div>
            </div>-->
        </div>
        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
            <div id="textArea" contenteditable="true"></div>
            <div id="resize-icon"></div>
            <textarea name="description" id="hiddenTextareaDescription" style="display: none"></textarea>
        </div>
    </div>
</div>

<!-- Description Text Editor 2 -->
<div class="items-center w-full">
    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex items-center justify-between px-3 py-2 border-b border-gray-200 dark:border-gray-600 border-gray-200">
            <div class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                    <!--Bold-->
                    <button type="button" id="bold" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-bold"></i>
                    </button>
                    <!--Italic-->
                    <button type="button" id="italic" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-italic"></i>
                    </button>
                    <!--Underline-->
                    <button type="button" id="underline" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-underline"></i>
                    </button>
                    <!--Strikethrough-->
                    <button type="button" id="strikethrough" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-strikethrough"></i>
                    </button>
                    <!--Superscript-->
                    <button type="button" id="superscript" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-superscript"></i>
                    </button>
                    <!--Superscript-->
                    <button type="button" id="subscript" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-subscript"></i>
                    </button>
                    <!--Code-->
                    <button type="button" id="code" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-code"></i>
                    </button>
                    <!--RotateLeft-->
                    <button type="button" id="undo" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-rotate-left"></i>
                    </button>
                    <!--RotateRight-->
                    <button type="button" id="redo" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-rotate-right"></i>
                    </button>
                </div>
                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                    <!--Font-->
                    <select  id="font" class="px-2.5 py-1.5 border-0 hover:border-0 text-gray-500 text-sm rounded-base cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-400 dark:bg-gray-800/50 dark:hover:bg-gray-800 placeholder:text-body">
                        <option value="Arial">Arial</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Garamond">Garamond</option>
                        <option value="Georgia">Georgia</option>
                        <option value="The New Roman">The New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="cursive">Cursive</option>
                    </select>
                    <!--FontSize-->
                    <select  id="fontSize" class="px-2.5 py-1.5 w-12 border-0 hover:border-0 text-gray-500 text-sm rounded-base cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-400 dark:bg-gray-800/50 dark:hover:bg-gray-800 placeholder:text-body">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <!--TextColor-->
                    <button type="button" id="textColor" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-font"></i>
                    </button>
                    <!--BgColor-->
                    <button type="button" id="bgColor" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-fill-drip"></i>
                    </button>
                    <!--AlignLeft-->
                    <button type="button" id="alignLeft" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <!--AlignCenter-->
                    <button type="button" id="alignCenter" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-center"></i>
                    </button>
                    <!--AlignRight-->
                    <button type="button" id="alignRight" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-right"></i>
                    </button>
                    <!--AlignJustify-->
                    <button type="button" id="alignJustify" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <!--Indent-->
                    <button type="button" id="indent" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-indent"></i>
                    </button>
                    <!--Outdent-->
                    <button type="button" id="outdent" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-outdent"></i>
                    </button>
                    <!--OrderedList-->
                    <button type="button" id="orderedList" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-list-ol"></i>
                    </button>
                    <!--UnorderedList-->
                    <button type="button" id="unorderedList" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-list-ul"></i>
                    </button>
                    <!--InsertLink-->
                    <button type="button" id="createLink" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-link"></i>
                    </button>
                    <!--RemoveLink-->
                    <button type="button" id="unLink" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-unlink"></i>
                    </button>
                    <!--insertImageUrl-->
                    <button type="button" id="insertImageUrl" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-image"></i>
                    </button>
                    <!--insertImageFile-->
                    <button type="button" id="insertImageFile" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-upload"></i>
                    </button>
                </div>
                <input type="color" id="textColorPicker" style="display: none;">
                <input type="color" id="bgColorPicker" style="display: none;">
                <input type="file" id="imageUpload" style="display: none;">
                <input type="text" id="imageUrl" placeholder="Enter image URL" style="display: none;">
            </div>
            <!--Button Full Screen-->
            <!--<button type="button" data-tooltip-target="tooltip-fullscreen" class="p-2 text-gray-500 rounded-sm cursor-pointer sm:ms-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 19">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1h5m0 0v5m0-5-5 5M1.979 6V1H7m0 16.042H1.979V12M18 12v5.042h-5M13 12l5 5M2 1l5 5m0 6-5 5"></path>
                </svg>
                <span class="sr-only">Full screen</span>
            </button>
            <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1441px, 369px);">
                Show full screen
                <div class="tooltip-arrow" data-popper-arrow="" style="position: absolute; left: 0; transform: translate(63px, 0px);"></div>
            </div>-->
        </div>
        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
            <div id="textArea" contenteditable="true"></div>
            <div id="resize-icon"></div>
            <textarea name="description" id="hiddenTextareaDescription" style="display: none"></textarea>
        </div>
    </div>
</div>

<!-- Description Text Editor 3 -->
<div id="editor—wrapper" class="w-full">
    <div id="toolbar-container"  class=""><!-- toolbar --></div>
    <div id="editor-container" class="w-full"><!-- editor --></div>
    <textarea name="description" id="hiddenTextareaDescription" style="display: none"></textarea>
</div>


<!--  Working text-editor -->
<div class="items-center w-full">
    <div class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
        <div class="flex items-center justify-between px-3 py-2 border-b border-gray-200 dark:border-gray-600 border-gray-200">
            <div id="editor" class="flex flex-wrap items-center divide-gray-200 sm:divide-x sm:rtl:divide-x-reverse dark:divide-gray-600">
                <div class="flex items-center space-x-1 rtl:space-x-reverse sm:pe-4">
                    <!--Bold-->
                    <button type="button" id="bold" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-bold"></i>
                    </button>
                    <!--Italic-->
                    <button type="button" id="italic" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-italic"></i>
                    </button>
                    <!--Underline-->
                    <button type="button" id="underline" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-underline"></i>
                    </button>
                    <!--Strikethrough-->
                    <button type="button" id="strikethrough" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-strikethrough"></i>
                    </button>
                    <!--Superscript-->
                    <button type="button" id="superscript" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-superscript"></i>
                    </button>
                    <!--Superscript-->
                    <button type="button" id="subscript" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-subscript"></i>
                    </button>
                    <!--Code-->
                    <button type="button" id="code" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-code"></i>
                    </button>
                    <!--RotateLeft-->
                    <button type="button" id="undo" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-rotate-left"></i>
                    </button>
                    <!--RotateRight-->
                    <button type="button" id="redo" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-rotate-right"></i>
                    </button>
                </div>
                <div class="flex flex-wrap items-center space-x-1 rtl:space-x-reverse sm:ps-4">
                    <!--Font-->
                    <select  id="font" class="px-2.5 py-1.5 border-0 hover:border-0 text-gray-500 text-sm rounded-base cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-400 dark:bg-gray-800/50 dark:hover:bg-gray-800 placeholder:text-body">
                        <option value="Arial">Arial</option>
                        <option value="Verdana">Verdana</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Garamond">Garamond</option>
                        <option value="Georgia">Georgia</option>
                        <option value="The New Roman">The New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="cursive">Cursive</option>
                    </select>
                    <!--FontSize-->
                    <select  id="fontSize" class="px-2.5 py-1.5 w-12 border-0 hover:border-0 text-gray-500 text-sm rounded-base cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-gray-400 dark:bg-gray-800/50 dark:hover:bg-gray-800 placeholder:text-body">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                    <!--TextColor-->
                    <button type="button" id="textColor" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-font"></i>
                    </button>
                    <!--BgColor-->
                    <button type="button" id="bgColor" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-fill-drip"></i>
                    </button>
                    <!--AlignLeft-->
                    <button type="button" id="alignLeft" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <!--AlignCenter-->
                    <button type="button" id="alignCenter" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-center"></i>
                    </button>
                    <!--AlignRight-->
                    <button type="button" id="alignRight" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-right"></i>
                    </button>
                    <!--AlignJustify-->
                    <button type="button" id="alignJustify" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    <!--Indent-->
                    <button type="button" id="indent" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-indent"></i>
                    </button>
                    <!--Outdent-->
                    <button type="button" id="outdent" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-outdent"></i>
                    </button>
                    <!--OrderedList-->
                    <button type="button" id="orderedList" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-list-ol"></i>
                    </button>
                    <!--UnorderedList-->
                    <button type="button" id="unorderedList" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-list-ul"></i>
                    </button>
                    <!--InsertLink-->
                    <button type="button" id="createLink" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-link"></i>
                    </button>
                    <!--RemoveLink-->
                    <button type="button" id="unLink" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-unlink"></i>
                    </button>
                    <!--insertImageUrl-->
                    <button type="button" id="insertImageUrl" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-image"></i>
                    </button>
                    <!--insertImageFile-->
                    <button type="button" id="insertImageFile" class="px-2 py-1 text-gray-500 rounded-sm cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <i class="fas fa-upload"></i>
                    </button>
                </div>
                <input type="color" id="textColorPicker" style="display: none;">
                <input type="color" id="bgColorPicker" style="display: none;">
                <input type="file" id="imageUpload" style="display: none;">
                <input type="text" id="imageUrl" placeholder="Enter image URL" style="display: none;">
            </div>
            <!--Button Full Screen-->
            <!--<button type="button" data-tooltip-target="tooltip-fullscreen" class="p-2 text-gray-500 rounded-sm cursor-pointer sm:ms-auto hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 19 19">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 1h5m0 0v5m0-5-5 5M1.979 6V1H7m0 16.042H1.979V12M18 12v5.042h-5M13 12l5 5M2 1l5 5m0 6-5 5"></path>
                </svg>
                <span class="sr-only">Full screen</span>
            </button>
            <div id="tooltip-fullscreen" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(1441px, 369px);">
                Show full screen
                <div class="tooltip-arrow" data-popper-arrow="" style="position: absolute; left: 0; transform: translate(63px, 0px);"></div>
            </div>-->
        </div>
        <div class="px-4 py-2 bg-white rounded-b-lg dark:bg-gray-800">
            <div id="textArea" contenteditable="true"></div>
            <div id="resize-icon"></div>
            <textarea name="description" id="hiddenTextareaDescription" style="display: none"></textarea>
        </div>
    </div>
</div>

Логические операторы
Логические операции — это операции PHP, которые создают таблицы истинности и определяют основные критерии группировки и/или/не. В табл. перечислены все символьные логические операторы, поддерживаемые PHP.

Выражение        Имя оператора                   Результат                                       Пример
$x && $y              И           true, если и $x, и $y имеет значение true                true && true == true
$x || $y              ИЛИ         true, если либо $x, либо $y имеет значение true          true || false == true
!$x                   НЕ          true, если $x имеет значение false (и наоборот)          !true == false



