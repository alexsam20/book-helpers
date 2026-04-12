<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var array<\App\Models\Book> $books */ ?>
<?php $view->component('start') ?>
<!-- Content -->
<div class="flex flex-col h-full">
    <?php $view->component('header') ?>
    <main class="main grow my-2">
        <div class="container flex flex-col border border-gray-200 dark:border-gray-800 dark:bg-gray-950/10 rounded-2xl">
            <div class="inline-flex items-center justify-between mt-4">
                <h1 class="text-xl font-semibold text-cyan-600">Books and Video</h1>
                <div>
                    <!--Button Add-->
                    <a type="button" href="/admin/books/add" class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/>
                        </svg>
                        Add
                    </a>
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
                            Book
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Author
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Date Created
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Visible
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium text-center">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($books as $book):  ?>
                    <?php $view->component('admin/book', ['book' => $book, 'i' => $i]); ?>
                    <?php $i++; ?>
                    <?php endforeach; ?>

                    <!--<tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <th scope="row" class="px-6 py-2 font-medium text-heading text-center whitespace-nowrap">
                            2
                        </th>
                        <th scope="row" class="px-6 py-2 font-medium text-heading whitespace-nowrap">
                            <img src="/storage/books/Patterns-JavaScript.jpg" class="w-10" alt="">
                        </th>
                        <td class="px-6 py-2 font-medium text-heading">
                            Создаем динамические веб-сайты с помощью PHP, MySQL, JаvaScript, CSS и HTML5
                        </td>
                        <td class="px-6 py-2 text-left">
                            Никсон Робин
                        </td>
                        <td class="px-6 py-2 text-right">
                            Wednesday, May 14, 2025 17:18
                        </td>
                        <td class="px-6 py-2 text-center">
                            <span class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded">Visible</span>
                        </td>
                        <td class="px-6 py-2 text-right">
                            <div class="flex inline-flex items-center">
                                <a href="#"
                                   class="flex gap-1 block py-2 px-3 rounded-sm text-right text-teal-600 hover:text-teal-800 dark:text-teal-500 dark:hover:text-teal-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <a href="#"
                                   class="flex gap-1 block py-2 px-3 rounded-sm text-right text-rose-500 hover:text-rose-700 dark:hover:text-rose-300 dark:text-rose-700 dark:hover:text-rose-500 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <th scope="row" class="px-6 py-4 font-medium text-heading text-center whitespace-nowrap">
                            3
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            <img src="/storage/books/stashchuk-bogdan.jpg" class="w-10" alt="">
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            Infinite Scrolling Prevent Multiple Requests
                        </th>
                        <td class="px-6 py-2 text-right">
                            John Doe
                        </td>
                        <td class="px-6 py-2 text-right">
                            Wednesday, May 14, 2025 17:18
                        </td>
                        <td class="px-6 py-2 text-center">
                            ON
                        </td>
                        <td class="px-6 py-2 text-right">
                            <div class="flex inline-flex items-center">
                                <a href="#"
                                   class="flex gap-1 block py-2 px-3 rounded-sm text-right text-teal-600 hover:text-teal-800 dark:text-teal-500 dark:hover:text-teal-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <a href="#"
                                   class="flex gap-1 block py-2 px-3 rounded-sm text-right text-rose-500 hover:text-rose-700 dark:hover:text-rose-300 dark:text-rose-700 dark:hover:text-rose-500 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>
                    <tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
                        <th scope="row" class="px-6 py-4 font-medium text-heading text-center whitespace-nowrap">
                            4
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            <img src="/storage/books/stashchuk-bogdan.jpg" class="w-10" alt="">
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            Form Allow Fallback to HTML
                        </th>
                        <td class="px-6 py-2 text-right">
                            Balalaika
                        </td>
                        <td class="px-6 py-2 text-right">
                            Saturday, Mar 14, 2026 19:47
                        </td>
                        <td class="px-6 py-2 text-center">
                            ON
                        </td>
                        <td class="px-6 py-2 text-right">
                            <div class="flex inline-flex items-center">
                                <a href="#"
                                   class="flex gap-1 block py-2 px-3 rounded-sm text-right text-teal-600 hover:text-teal-800 dark:text-teal-500 dark:hover:text-teal-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <a href="#"
                                   class="flex gap-1 block py-2 px-3 rounded-sm text-right text-rose-500 hover:text-rose-700 dark:hover:text-rose-300 dark:text-rose-700 dark:hover:text-rose-500 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                                    </svg>
                                    <span>Delete</span>
                                </a>
                            </div>
                        </td>
                    </tr>-->
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
