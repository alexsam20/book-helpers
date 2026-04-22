<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Part $part */ ?>
<?php /** @var \App\Models\Listing $themes */ ?>
<?php /** @var \App\Models\Listing $languages */ ?>
<?php /** @var \App\Models\Listing $codeListings */ ?>
<?php /** @var \App\Models\Part $id */ ?>
<?php // var_dump($codeListings); ?>
<?php $view->component('start') ?>
<!-- Content -->
<div class="flex flex-col h-full">
    <?php $view->component('admin/header') ?>
    <main class="main grow my-2">
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
                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
                    <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
                        <svg class="w-7 h-7 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                        </svg>
                        Part - <?php echo $part->title(); ?>
                    </h1>
                    <div class="">
                        <!-- Comments modal Button Add Block Code -->
                        <span>
                        <!-- Button Add Block Code -->
                        <!--<a type="button" href="#" id="blockCodeActionButton" data-modal-target="blockCodeModal" data-modal-toggle="blockCodeModal" class="inline-flex items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                            <svg class="w-5 h-5 mb-0.5 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                            </svg>
                            Add Block Code
                        </a>-->
                        <!-- Main modal -->
                        <!--<div id="blockCodeModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">-->
                                <!-- Modal content -->
                                <!--<div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">-->
                                    <!-- Modal header -->
                                    <!--<div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                                            Add Block Code
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="blockCodeModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>-->
                                    <!-- Modal body -->
                                    <!--<form method="post" action="/admin/listing/add">
                                        <input type="hidden" name="part_id" value="<?php /*echo $part->id(); */?>" />
                                        <input type="hidden" name="book_id" value="<?php /*echo $part->bookId(); */?>" />
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <?php /*$oldLanguage = $session->getFlash('language_val'); */?>
                                            --><?php /*$oldTheme = $session->getFlash('theme_val'); */?>
                                            <!-- Language Select -->
                                            <!--<div class="relative flex-1">
                                                <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                                                    </svg>
                                                </div>
                                                <select id="language" name="language" class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                                    <option value="">Select Language</option>
                                                    <?php /*foreach($languages as $key => $value) : */?>
                                                        <option value="<?php /*echo $key; */?>" <?php /*if ($key === $oldLanguage) { echo 'selected'; } */?> ><?php /*echo $value; */?></option>
                                                    <?php /*endforeach; */?>
                                                </select>
                                                <?php /*if (!empty($oldLanguage) && empty($oldTheme)) : */?>
                                                    <ul>
                                                        <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                                                    </ul>
                                                <?php /*endif; */?>
                                                <?php /*if ($session->has('language')) : */?>
                                                    <ul>
                                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php /*echo $session->getFlash('language')[0]; */?></li>
                                                    </ul>
                                                <?php /*endif; */?>
                                            </div>-->
                                            <!-- Theme Select -->
                                            <!--<div class="relative flex-1">
                                                <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                                    <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m7.53316 11.8623.00957-.0029m5.58157 7.1424c-.5.515-.9195.8473-1.0611.8903-.4784.1454-5.42881-1.2797-6.23759-3.3305-.80878-2.0507-1.83058-5.8152-1.88967-6.2192-.0591-.40404 1.5599-1.72424 3.59722-2.61073m1.98839 8.05513c-.22637.262-.38955.5599-.55552.8474M13.4999 12c.5.5 1 1.049 2 1.049s1.5-.549 2-1.049m-4-4h.01m3.99 0h.01m-7.01-2.5c0-.28929 2.5-1.5 5-1.5s5 1.13645 5 1.5V12c0 1.9655-4.291 5-5 5-.7432 0-5-3.0345-5-5V5.5Z"/>
                                                    </svg>
                                                </div>
                                                <select id="theme" name="theme" class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                                    <option value="">Select Theme</option>
                                                    <?php /*foreach($themes as $theme) : */?>
                                                        <option value="<?php /*echo $theme; */?>" <?php /*if ($theme === $oldTheme) { echo 'selected'; } */?> ><?php /*echo ucfirst($theme); */?></option>
                                                    <?php /*endforeach; */?>
                                                </select>
                                                <?php /*if (empty($oldLanguage) && !empty($oldTheme)) : */?>
                                                    <ul>
                                                        <li class="mt-2 ml-2 text-sm">&nbsp;</li>
                                                    </ul>
                                                <?php /*endif; */?>
                                                <?php /*if ($session->has('theme')) : */?>
                                                    <ul>
                                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php /*echo $session->getFlash('theme')[0]; */?></li>
                                                    </ul>
                                                <?php /*endif; */?>
                                            </div>-->
                                            <!-- Checkbox -->
                                            <!--<div class="sm:col-span-2 mb-4 relative">
                                                <div class="flex w-full items-center justify-end gap-2 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-heading text-sm rounded-base py-2">
                                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                                        <?php /*$executable = $session->getFlash('executable_val'); */?>
                                                        <input type="checkbox" name="executable" class="sr-only peer" <?php /*echo !empty($executable) ? 'checked' : ''; */?>>
                                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-600 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600"></div>
                                                        <span class="select-none ms-3 text-sm font-medium text-heading">Is Executable?</span>
                                                    </label>
                                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                                        <?php /*$oldVisible = $session->getFlash('visible_val'); */?>
                                                        <input type="checkbox" name="visible" class="sr-only peer" <?php /*echo !empty($oldVisible) ? 'checked' : ''; */?>>
                                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-600 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600 dark:peer-checked:bg-teal-600"></div>
                                                        <span class="select-none ms-3 text-sm font-medium text-heading">Is Visible?</span>
                                                    </label>
                                                </div>
                                            </div>-->
                                            <!-- Description -->
                                            <!--<div class="sm:col-span-2">
                                                <textarea id="description" name="description" rows="4"
                                                    class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                                    placeholder="Write description"><?php /*echo $session->getFlash('description_val'); */?></textarea>
                                                <?php /*if ($session->has('description')) : */?>
                                                <ul>
                                                    <li class="mt-2 ml-2 text-sm text-pink-600"><?php /*echo $session->getFlash('description')[0]; */?></li>
                                                </ul>
                                                <?php /*endif; */?>
                                            </div>-->
                                            <!-- Block Code -->
                                            <!--<div class="sm:col-span-2">
                                                <textarea id="code" name="code" rows="4"
                                                    class="text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                                    placeholder="Code"><?php /*echo $session->getFlash('code_val'); */?></textarea>
                                                <?php /*if ($session->has('code')) : */?>
                                                    <ul>
                                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php /*echo $session->getFlash('code')[0]; */?></li>
                                                    </ul>
                                                <?php /*endif; */?>
                                            </div>
                                        </div>-->
                                        <!-- Save button -->
                                        <!--<div class="flex items-end justify-end gap-2">
                                            <button type="submit" class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
                                                <svg class="w-5 h-5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"/>
                                                </svg>
                                                Save
                                            </button>
                                        </div>-->
                                    <!--</form>
                                </div>
                            </div>
                        </div>-->
                            </span>
                        <!-- Button Back -->
                        <a type="button" href="/admin/parts?id=<?php echo $part->bookId() ?>" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                            <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z"></path>
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
                <!-- Part Card -->
                <div class="grid grid-cols-1 p-4 dark:bg-neutral-primary-soft rounded-2xl">
                    <div class="flex flex-col p-2 items-center text-gray-800 bg-gray-100 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl shadow-xs md:flex-row">
                        <div class="flex flex-col text-right md:p-4 leading-normal w-full">
                            <!-- Title -->
                            <div class="inline-flex items-center justify-between w-full">
                                <!--  Title-->
                                <h5 class="p-2 text-xl font-semibold tracking-tight text-heading"><?php echo $part->title() ?></h5>
                                <!-- Date created -->
                                <span class="inline-flex items-center bg-success-soft border border-success-subtle text-fg-success-strong text-xs font-medium px-1.5 py-0.5 rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                    </svg>
                                    <?php echo $view->formatDate($part->createdAt()); ?>
                                </span>
                            </div>
                            <!-- Body -->
                            <div class="px-2 py-1">
                                <p class="p-2 text-gray-200 text-justify text-sm">
                                    <?php echo $part->body() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blocks Code -->
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
                        <form method="post" action="/admin/listing/add">
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
                                    <select id="language" name="language" class="bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
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
                                    <select id="theme" name="theme" class="bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
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
                                <div class="flex w-full items-center justify-end gap-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base py-2 px-2">
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
                                              class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                              placeholder="Write description"><?php echo $session->getFlash('description_val'); ?></textarea>
                                <?php if ($session->has('description')) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('description')[0]; ?></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Code -->
                            <div class="mb-4">
                                <textarea id="code" name="code" rows="4"
                                          class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                          placeholder="Code"><?php echo $session->getFlash('code_val'); ?></textarea>
                                <?php if ($session->has('code')) : ?>
                                <ul>
                                    <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('code')[0]; ?></li>
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
