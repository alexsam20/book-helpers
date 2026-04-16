<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Book $book  */ ?>
<?php /** @var array<\App\Models\Part> $parts */ ?>
<?php $view->component('start') ?>
<!-- Content -->
<div class="flex flex-col h-full">
    <?php $view->component('header') ?>
    <main class="main grow my-2">
        <div class="container flex flex-col border border-gray-200 dark:border-gray-800 dark:bg-gray-950/10 rounded-2xl">
            <div class="inline-flex items-center justify-between mt-4">
                <h1 class="text-xl font-semibold text-cyan-600">Parts of the Book</h1>
                <div>
                    <!--Button Add-->
                    <a type="button" href="/admin/parts/add" class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/>
                        </svg>
                        Add
                    </a>
                </div>
            </div>
            <div>
                <!--<div
                        class="bg-white grid sm:grid-cols-2 items-center border border-gray-200 shadow-md w-full max-sm:max-w-sm rounded-lg overflow-hidden mx-auto mt-4">
                    <div>
                        <img src="https://readymadeui.com/cardImg.webp" class="w-full" />
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-slate-900">Web design template</h3>
                        <p class="mt-3 text-sm text-slate-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor auctor
                            arcu.
                        </p>
                        <p class="mt-2 text-sm text-slate-500 leading-relaxed">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed auctor.
                        </p>

                        <div class="flex flex-wrap items-center cursor-pointer border border-gray-300 rounded-lg w-full px-4 py-2 mt-8">
                            <img src='https://readymadeui.com/profile_2.webp' class="w-9 h-9 rounded-full" />
                            <div class="ml-4 flex-1">
                                <p class="text-sm text-slate-900 font-semibold">John Doe</p>
                                <p class="text-xs text-slate-500 mt-0.5">Marketing coordinator</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 fill-gray-500" viewBox="0 0 32 32">
                                <path
                                        d="M13 16c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3zm0 10c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3zm0-20c0 1.654 1.346 3 3 3s3-1.346 3-3-1.346-3-3-3-3 1.346-3 3z"
                                        data-original="#000000" />
                            </svg>
                        </div>
                    </div>
                </div>-->
                <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3">
                    <div class="grid grid-cols-1 p-4 dark:bg-gray-950/50 rounded-2xl">
                        <!-- Card -->
                        <div class="flex flex-col p-2 items-center text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl shadow-xs md:flex-row md:max-w-xl">
                            <img class="object-cover rounded-base h-64 md:h-auto md:w-48 mb-4 md:mb-0" src="/storage/books/<?php echo $book->image() ?>" alt="">
                            <div class="flex flex-col text-right md:p-4 leading-normal w-full">
                                <div class="text-center sm:text-left">
                                    <h5 class="mt-3 p-4 text-xl font-semibold tracking-tight text-heading"><?php echo $book->name() ?></h5>
                                </div>
                                <!-- Author -->
                                <p class="mb-2 p-2 text-body text-sm"><?php echo $book->author() ?></p>
                                <!-- Body -->
                                <div class="mb-2">
                                    <p class="p-3 text-mauve-500 text-left text-sm">
                                        <?php echo $book->description() ?>
                                    </p>
                                </div>
                                <!-- Date created -->
                                <div>
                                <span class="inline-flex items-center animate-pulse bg-brand-softer border border-brand-subtle text-md font-medium px-1.5 py-0.5 rounded-base mb-2 ml-3">
                                    <svg class="w-5 h-5 mb-0.5 mr-1 dark:text-white text-gray-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                    </svg>
                                    <span class="text-gray-900 dark:text-white text-sm"><?php echo $view->formatDate($book->createdAt()) ?></span>
                                </span>
                                </div>
                            </div>
                        </div>

                    </div>
            </div>
            <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default mt-4 mb-4">
                <table class="w-full text-sm text-left rtl:text-right text-body">
                    <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                    <tr>
                        <th scope="col" class="px-2 py-3 font-medium text-center">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Date Created
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Visible
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Source Code
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($parts as $part):  ?>
                        <?php $view->component('admin/part', ['part' => $part, 'i' => $i]); ?>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- Pagination -->
                <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between p-4" aria-label="Table navigation">
                    <span class="text-sm font-normal text-body mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing <span class="font-semibold text-heading">1-10</span> of <span class="font-semibold text-heading">1000</span></span>
                    <ul class="flex -space-x-px text-sm">
                        <li>
                            <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-s-base text-sm px-3 h-9 focus:outline-none">Previous</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">1</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">2</a>
                        </li>
                        <li>
                            <a href="#" aria-current="page" class="flex items-center justify-center text-fg-brand bg-brand-softer box-border border border-default-medium hover:bg-brand-soft hover:text-fg-brand font-medium text-sm w-9 h-9 focus:outline-none">3</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">...</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium text-sm w-9 h-9 focus:outline-none">5</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading font-medium rounded-e-base text-sm px-3 h-9 focus:outline-none">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
    </main>
    <?php $view->component('footer') ?>
</div>
<?php $view->component('end') ?>

