<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Auth\AuthInterface $auth */ ?>
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
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <a href="#" class="inline-flex items-center ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-4 h-4 me-2" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 24 24">
                                    <path d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023"/>
                                </svg>
                                Books
                            </a>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- Page Content -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-t-2xl mt-3 mb-4">
                <div class="grid grid-cols-1 p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
                    <!-- Cards Block -->
                    <div class="container">
                        <h1 class="text-xl font-bold text-cyan-600 m-3 p-1">Books & Video tutorial</h1>
                        <div class="flex justify-center">
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 2xl:grid-cols-4 gap-4">
                                <!-- Card -->
                                <div class="bg-neutral-primary-soft border border-default block max-w-sm p-4 rounded-base shadow-xs dark:border-default">
                                    <div class="flex flex-col h-full shadow-lg rounded-lg overflow-hidden">
                                        <!-- Image/Title/Author/Date created -->
                                        <div class="flex-grow">
                                            <!-- Image -->
                                            <a href="#">
                                                <div class="group relative overflow-hidden cursor-pointer">
                                                    <img class="object-cover group-hover:rotate-3 group-hover:scale-125 transition-transform duration-500" src="/storage/books/stashchuk-bogdan.jpg" alt="">
                                                </div>
                                            </a>
                                            <!-- Title -->
                                            <a href="#">
                                                <h5 class="mt-3 p-4 text-xl font-semibold tracking-tight text-heading">Полный Курс JavaScript Для Начинающих</h5>
                                            </a>
                                            <!-- Author -->
                                            <p class="mb-3 p-4 text-body text-sm">Bogdan Stashchuk</p>
                                            <!-- Date created -->
                                            <div class="inline-flex items-center animate-pulse bg-brand-softer border border-brand-subtle text-md font-medium px-1.5 py-0.5 rounded-base mb-2 ml-3">
                                            <svg class="w-5 h-5 mb-0.5 mr-1 dark:text-white text-gray-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                            </svg>
                                            <span class="text-gray-900 dark:text-white text-sm">Friday, Jan 6, 2017 15:50</span>
                                            </div>
                                        </div>
                                        <!-- Footer -->
                                        <div class="p-4 mt-auto text-right">
                                            <a href="#" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-3 py-1.5 text-center leading-5">
                                                Read more
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- !! End Cards Block -->
                </div>
            </div>
        </div>
    </main>
    <?php $view->component('footer') ?>
</div>
<?php $view->component('end') ?>
