<?php /** @var \Core\View\ViewInterface $view */ ?>
<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Post $posts */ ?>
<?php $view->component('start') ?>
<!-- Content -->
<div class="flex flex-col h-full">
    <?php $view->component('header') ?>
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
                            <a href="/admin/parts?id=<?php // echo $part->bookId(); ?>" class="inline-flex items-center ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-4 h-4 me-2" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                                </svg>
                                Posts
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- Page Content -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
                    <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
                        <svg class="w-7 h-7 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                        </svg>
                        All Posts
                    </h1>
                    <div class="">
                        <!-- Button Add Block Code -->
                        <a type="button" href="/admin/posts/add" id="blockCodeActionButton" data-modal-target="blockCodeModal" data-modal-toggle="blockCodeModal" class="inline-flex items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                            <svg class="w-5 h-5 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.757v8.486M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            Add Post
                        </a>
                    </div>
                </div>
                <!-- Post Card -->
                <div class="grid grid-cols-1 p-4 dark:bg-neutral-primary-soft rounded-2xl">
                    <div class="flex flex-col p-2 items-center text-gray-800 bg-gray-100 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl shadow-xs md:flex-row">
                        <!--<div class="flex flex-col text-left md:p-4 leading-normal w-full">-->
                            <?php if (!empty($posts)): ?>
                                <!-- Posts -->
                                <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-t-2xl border border-default mt-4 mb-4">
                                        <?php $i = 1; ?>
                                        <?php foreach ($posts as $post):  ?>
                                            <?php  $view->component('post', ['post' => $post, 'i' => $i]); ?>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <div class="h-20 flex justify-center items-center text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                                    💩 No Records.
                                </div>
                            <?php endif; ?>
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php $view->component('footer') ?>
</div>
<?php $view->component('end') ?>

