<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \App\Models\Part $part */ ?>
<?php /** @var \App\Models\Part $i */ ?>
<tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
    <!-- Number -->
    <td class="px-6 py-2 text-center">
        <?php echo $i; ?>
    </td>
    <!-- Title -->
    <td class="px-6 py-2 font-medium text-heading">
        <?php echo $part->title() ?>
    </td>
    <!-- CreatedAt Date -->
    <td class="px-6 py-2 text-right">
        <?php echo $view->formatDate($part->createdAt());  ?>
    </td>
    <!-- Is Visible -->
    <td class="px-6 py-2 text-center">
        <?php if (1 === $part->isVisible()): ?>
            <span class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded">Visible</span>
        <?php else: ?>
            <span class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded">Invisible</span>
        <?php endif; ?>
    </td>
    <!-- Count Block Code -->
    <td class="px-6 py-2 text-center">
        <div class="inline-flex items-center space-x-1">
            <span class="inline-flex items-center rounded-md bg-gray-400/10 px-2 py-1 text-xs font-medium text-gray-400 inset-ring inset-ring-gray-400/20">2</span>
            <span class="inline-flex items-center rounded-md bg-green-400/10 px-2 py-1 text-xs font-medium text-green-400 inset-ring inset-ring-green-500/20">4</span>
            <span class="inline-flex items-center rounded-md bg-blue-400/10 px-2 py-1 text-xs font-medium text-blue-400 inset-ring inset-ring-blue-400/30">6</span>
            <span class="inline-flex items-center rounded-md bg-indigo-400/10 px-2 py-1 text-xs font-medium text-indigo-400 inset-ring inset-ring-indigo-400/30">8</span>
            <span class="inline-flex items-center rounded-md bg-purple-400/10 px-2 py-1 text-xs font-medium text-purple-400 inset-ring inset-ring-purple-400/30">10</span>
            <span class="inline-flex items-center rounded-md bg-pink-400/10 px-2 py-1 text-xs font-medium text-pink-400 inset-ring inset-ring-pink-400/20">12</span>
            <span class="inline-flex items-center rounded-md bg-red-400/10 px-2 py-1 text-xs font-medium text-red-400 inset-ring inset-ring-red-400/20">14</span>
            <span class="inline-flex items-center rounded-md bg-yellow-400/10 px-2 py-1 text-xs font-medium text-yellow-500 inset-ring inset-ring-yellow-400/20">16</span>
            <!--<span class="flex items-center justify-center bg-success-soft border border-success-subtle text-fg-success-strong text-xs font-medium h-6 w-6 rounded-full">
                8
            </span>
            <span class="flex items-center justify-center bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium h-6 w-6 rounded-full">
                18
            </span>
            <span class="flex items-center justify-center bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium h-6 w-6 rounded-full">
                24
            </span>
            <span class="flex items-center justify-center bg-warning-soft border border-warning text-warning text-xs font-medium h-6 w-6 rounded-full">
                35
            </span>-->
        </div>
    </td>
    <!-- Actions -->
    <td class="px-6 py-2 text-center">
        <div class="inline-flex rounded-base space-x-1" role="group">
            <!--Button Edit-->
            <a type="button" href="/admin/parts/update?id=<?php echo $part->id(); ?>" class="inline-flex items-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-sm text-sm px-1.5 py-0.5 text-center leading-5">
                <svg class="w-4 h-4 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                </svg>
                Edit
            </a>
            <!--Button View-->
            <a type="button" href="/admin/parts/list?id=<?php echo $part->id(); ?>" class="inline-flex items-center text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-sm text-sm px-1.5 py-0.5 text-center leading-5">
                <svg class="w-4 h-4 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                </svg>
                View
            </a>
            <!--Form Delete Book-->
            <form method="post" action="/admin/parts/destroy">
                <input type="hidden" name="id" value="<?php echo $part->id(); ?>" />
                <input type="hidden" name="book" value="<?php echo $part->bookId(); ?>" />
                <button type="submit" class="inline-flex items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-sm text-sm px-1.5 py-0.5 text-center leading-5 cursor-pointer">
                    <svg class="w-4 h-4 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    Delete
                </button>
            </form>
        </div>
        <!--<div class="inline-flex items-center">
            <a href="/admin/parts/add?id=<?php /*echo $part->id();  */?>"
                    class="flex gap-1 py-2 px-3 rounded-sm text-right text-green-600 hover:text-green-800 dark:text-green-500 dark:hover:text-green-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700 cursor-pointer">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/>
                </svg>
                <span>Add Part</span>
            </a>
            <a href="/admin/parts?id=<?php /*echo $part->id(); */?>"
                    class="flex gap-1 py-2 px-3 rounded-sm text-right text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700 cursor-pointer">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                </svg>
                <span>Show Parts</span>
            </a>
            <a href="/admin/parts/update?id=<?php /*echo $part->id(); */?>"
                    class="flex gap-1 py-2 px-3 rounded-sm text-right text-teal-600 hover:text-teal-800 dark:text-teal-500 dark:hover:text-teal-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700 cursor-pointer">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                </svg>
                <span>Edit</span>
            </a>
            <form method="post" action="/admin/parts/destroy">
                <input type="hidden" name="id" value="<?php /*echo $part->id(); */?>" />
                <button type="submit"
                   class="flex gap-1 py-2 px-3 rounded-sm text-right text-rose-500 hover:text-rose-700 dark:text-rose-700 dark:hover:text-rose-500 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700 cursor-pointer">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                         width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2"
                              d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                    </svg>
                    <span>Delete</span>
                </button>
            </form>
        </div>-->
    </td>
</tr>

