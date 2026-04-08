<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Session\SessionInterface $session */  ?>
<?php $view->component('start') ?>
    <!-- Content -->
    <div class="flex flex-col h-full">
        <?php $view->component('header') ?>
        <main class="main grow my-2">
            <div class="container flex flex-col border border-gray-200 dark:border-gray-800 dark:bg-gray-950/10 rounded-2xl">
                <!-- Breadcrumbs -->
                <nav class="flex m-2" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                        <li class="inline-flex items-center">
                            <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-3 h-3 me-2.5" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"></path>
                                </svg>
                                Home
                            </a>
                        </li>
                    </ol>
                </nav>
                <!-- Page Content -->
<!--                <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-t-2xl mt-3">-->
<!--                    <div class="grid grid-cols-1 p-4 dark:bg-gray-950/50 rounded-t-2xl">-->
                        <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                            <div class="p-4 dark:bg-gray-950/50 rounded-t-2xl">
                                <h1 class="text-xl font-semibold tracking-tight text-cyan-600">
                                    Add Book page
                                </h1>
                            </div>
                            <div class="flex bg-neutral-primary-soft w-full rounded-2xl">
                                <div class="w-full lg:w-2/3 bg-neutral-primary-soft p-6 bw-full shadow-xs rounded-2xl">
                                    <form method="post" action="/admin/books/add" enctype="multipart/form-data">
                                        <div class="mb-4 relative">
                                            <input type="text" id="book" name="book"
                                                   class="bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body"
                                                   placeholder="Book Name" />
                                            <div class="absolute inset-y-0 left-0 pl-2 pt-2.5">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023"/>
                                                </svg>
                                            </div>
                                            <?php if ($session->has('book')) : ?>
                                            <ul>
                                                <?php foreach ($session->getFlash('book') as $error) : ?>
                                                    <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $error; ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-4 relative">
                                            <input type="text" id="author" name="author"
                                                   class="bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body"
                                                   placeholder="Author" />
                                            <div class="absolute inset-y-0 left-0 pl-2 pt-2.5">
                                                <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4.988 19.012 5.41-5.41m2.366-6.424 4.058 4.058-2.03 5.41L5.3 20 4 18.701l3.355-9.494 5.41-2.029Zm4.626 4.625L12.197 6.61 14.807 4 20 9.194l-2.61 2.61Z"/>
                                                </svg>
                                            </div>
                                            <?php if ($session->has('author')) : ?>
                                                <ul>
                                                    <?php foreach ($session->getFlash('author') as $error) : ?>
                                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $error; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-4">
                                            <input type="file" name="image"
                                                   class="cursor-pointer bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block file:pl-6 file:text-[12px] file:px-2.5 file:py-2 w-full shadow-xs placeholder:text-body"
                                                   aria-describedby="file_input_help" id="file_input" />
                                        </div>
                                        <ul>
                                            <li class="mt-2 text-sm text-pink-600">Error</li>
                                        </ul>
                                        <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                                        <div class="flex items-end justify-end gap-2">
                                            <!-- Create -->
                                            <button type="submit" class="inline-flex text-white bg-gradient-to-r from-red-200 via-red-300 to-yellow-200 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-red-100 dark:focus:ring-red-400 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
                                                <svg class="w-5 h-5 mb-0.5 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v14m8-7h-2m0 0h-2m2 0v2m0-2v-2M3 11h6m-6 4h6m11 4H4c-.55228 0-1-.4477-1-1V6c0-.55228.44772-1 1-1h16c.5523 0 1 .44772 1 1v12c0 .5523-.4477 1-1 1Z"/>
                                                </svg>
                                                Create
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="lg:w-1/3 rounded-2xl"></div>
                            </div>
                        </div>
<!--                    </div>-->
<!--                </div>-->

            </div>
        </main>
        <?php $view->component('footer') ?>
    </div>
<?php $view->component('end') ?>