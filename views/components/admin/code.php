<?php /** @var \App\Models\Listing $code */ ?>
<div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-t-2xl mb-4">
    <div class="grid grid-cols-1 md:grid-cols-2 p-4 dark:bg-gray-950/50 rounded-t-2xl">
        <!-- # Block Code -->
        <div class="inline-flex items-center gap-1">
            <span class="inline-flex items-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-base text-sm px-2 py-1 text-center leading-5">
                        <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                        </svg>
                        <span class="text-sm font-medium">Block Code #<?php echo $code->id() ?></span>
                    </span>
        </div>
        <!-- Edit Code Block-->
        <div class="inline-flex items-center gap-1 md:ml-auto">
            111
        </div>
        <!--Calendar beget-->
        <!--<div class="inline-flex items-center gap-1 md:ml-auto">
            <div class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2 py-1 text-center leading-5">
                <svg class="w-5 h-5 mb-0.5 mr-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                </svg>
                <span class="text-sm font-medium">Created at: <?php /*echo $view->formatDate($code->createdAt()); */ ?></span>
            </div>
        </div>-->
    </div>
    <div class="border border-gray-200 dark:border-cyan-900 mx-3 my-2 rounded-base">
        <p class="p-3 text-mauve-500"><?php echo nl2br($code->description()); ?></p>
    </div>
    <div class="border border-gray-200 dark:border-cyan-900 mx-3 my-2 rounded-base">
        <pre class="language-<?php echo $code->type(); ?>"><code id="source"><?php echo $code->source(); ?></code></pre>
    </div>
    <div class="border border-gray-200 dark:border-cyan-900 mx-3 my-2 rounded-sm">
        <p class="p-3 text-amber-500">
            Code running ...
        </p>
    </div>
</div>

