<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \App\Models\Part $part */ ?>
<?php /** @var \App\Models\Part $i */ ?>
<tr class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium">
    <td class="px-6 py-2 text-center">
        <?php echo $i; ?>
    </td>
    <td class="px-6 py-2 font-medium text-heading">
        <?php echo $part->title() ?>
    </td>
    <td class="px-6 py-2 text-right">
        <?php echo $view->formatDate($part->createdAt());  ?>
    </td>
    <td class="px-6 py-2 text-center">
        <?php if (1 === $part->isVisible()): ?>
            <span class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded">Visible</span>
        <?php else: ?>
            <span class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded">Invisible</span>
        <?php endif; ?>
    </td>
    <td class="px-6 py-2 text-right">
        <?php echo "7";  ?>
    </td>
    <td class="px-6 py-2 text-right">
        <div class="inline-flex items-center">
            <a href="/admin/parts/add?id=<?php echo $part->id();  ?>"
                    class="flex gap-1 py-2 px-3 rounded-sm text-right text-green-600 hover:text-green-800 dark:text-green-500 dark:hover:text-green-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700 cursor-pointer">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h4M9 3v4a1 1 0 0 1-1 1H4m11 6v4m-2-2h4m3 0a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/>
                </svg>
                <span>Add Part</span>
            </a>
            <a href="/admin/parts?id=<?php echo $part->id(); ?>"
                    class="flex gap-1 py-2 px-3 rounded-sm text-right text-blue-600 hover:text-blue-800 dark:text-blue-500 dark:hover:text-blue-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700 cursor-pointer">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                </svg>
                <span>Show Parts</span>
            </a>
            <a href="/admin/books/update?id=<?php echo $part->id();  ?>"
                    class="flex gap-1 py-2 px-3 rounded-sm text-right text-teal-600 hover:text-teal-800 dark:text-teal-500 dark:hover:text-teal-300 hover:bg-gray-200 dark:hover:bg-gray-700 dark:border-gray-700 cursor-pointer">
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="2"
                          d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z"/>
                </svg>
                <span>Edit</span>
            </a>
            <form method="post" action="/admin/books/destroy">
                <input type="hidden" name="id" value="<?php echo $part->id(); ?>" />
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
        </div>
    </td>
</tr>

