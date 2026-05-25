<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \App\Models\Post $post */ ?>
<?php /** @var \App\Models\Part $i */ ?>
<div class="flex-col w-full text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-cyan-700 dark:bg-gray-950/10 rounded-t-2xl mb-3 froala-edtr shadow-lg">
    <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl shadow-lg">
        <div class="flex items-center">
            <svg class="w-5 h-5 text-indigo-800 dark:text-indigo-300  me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="none"  stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
            </svg>
            <span class="text-indigo-800 dark:text-indigo-300  text-sm font-medium"><?php echo $post->user()['name']; ?></span>
        </div>
        <div class="flex items-center">
            <svg class="w-5 h-5 text-indigo-800 dark:text-indigo-300 me-1 mb-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path stroke="currentColor" fill-rule="evenodd" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z" />
            </svg>
            <span class="text-indigo-800 dark:text-indigo-300 text-sm font-medium"><?php echo $view->formatDate($post->createdAt(), 'l, F j, Y H:i'); ?></span>
        </div>
    </div>
    <div class="ml-3">
        <h1><?php echo $post->title(); ?></h1>
    </div>
    <div class="p-3">
        <?php echo $view->shortText($post->body(), 500); ?>
    </div>
    <div class="px-3 py-2">
        <div class="flex items-center justify-end space-x-3 mb-1">
            <a type="button" href="/post?id=<?php echo $post->id(); ?>" class="inline-flex text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
                Read more
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m7 16 4-4-4-4m6 8 4-4-4-4"/>
                </svg>
            </a>
        </div>
    </div>
</div>

