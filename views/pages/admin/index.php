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
