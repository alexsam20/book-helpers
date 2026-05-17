<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Auth\AuthInterface $auth */ ?>
<?php /** @var \App\Models\Book $book */ ?>
<!-- Book Cards Block -->
<div class="bg-neutral-primary-soft border border-default block max-w-sm p-4 rounded-base shadow-xs dark:border-default">
    <div class="flex flex-col h-full shadow-lg rounded-lg overflow-hidden">
        <!-- Image/Title/Author/Date created -->
        <div class="flex-grow">
            <!-- Image -->
            <a href="/list?id=<?php echo $book->id(); ?>">
                <div class="flex items-center group relative overflow-hidden cursor-pointer justify justify-center rounded-base">
                    <img class="object-cover group-hover:rotate-3 group-hover:scale-125 transition-transform duration-500 rounded-base" src="/storage/books/<?php echo $book->image(); ?>" alt="<?php echo $book->name(); ?>">
                </div>
            </a>
            <!-- Title -->
            <a href="/list?id=<?php echo $book->id(); ?>">
                <h5 class="mt-3 p-4 text-xl font-semibold tracking-tight text-heading"><?php echo $book->name(); ?></h5>
            </a>
            <!-- Author -->
            <p class="mb-3 p-4 text-body text-sm"><?php echo $book->author(); ?></p>
            <!-- Date created -->
            <div class="inline-flex items-center animate-pulse bg-brand-softer border border-brand-subtle text-md font-medium px-1.5 py-0.5 rounded-base mb-2 ml-3">
                <svg class="w-5 h-5 mb-0.5 mr-1 dark:text-white text-gray-700" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                </svg>
                <span class="text-gray-900 dark:text-white text-sm"><?php echo $book->year() ?></span>
            </div>
        </div>
        <!-- Footer -->
        <div class="p-4 mt-auto text-right">
            <a href="/list?id=<?php echo $book->id(); ?>" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-3 py-1.5 text-center leading-5">
                Read more
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="13 17 18 12 13 7"></polyline><polyline points="6 17 11 12 6 7"></polyline>
                </svg>
            </a>
        </div>
    </div>
</div>
<!-- !! End Book Cards Block -->
