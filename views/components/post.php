<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \App\Models\Post $post */ ?>
<?php /** @var \App\Models\Part $i */ ?>
<div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-cyan-700 dark:bg-gray-950/10 rounded-t-2xl mb-3">
    <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
        <div class="flex items-center">
            <svg class="w-4 h-4 text-indigo-800 dark:text-indigo-300 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"></path></svg>
            <span class="text-indigo-800 dark:text-indigo-300  text-sm font-medium"><?php echo $post->user()['email']; ?></span>
        </div>
        <div class="flex items-center">
            <svg class="w-4 h-4 text-indigo-800 dark:text-indigo-300 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Zm6.01-6a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm-10 4a1 1 0 1 1 2 0 1 1 0 0 1-2 0Zm6 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0Zm2 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z" clip-rule="evenodd"></path>
            </svg>
            <span class="text-indigo-800 dark:text-indigo-300 text-sm font-medium"><?php echo $post->createdAt() ?></span>
        </div>
    </div>
    <p class="p-3 text-[1rem]">Разработчикам часто приходится организовывать файлы и каталоги, особенно при управлении проектом или настройке структуры со сложными каталогами. Обычно для создания нескольких каталогов нужно набирать много однотипных названий. Но есть мощный приём: с помощью команды mkdir и скобок {} можно одним махом создать несколько каталогов.</p>
    <div class="px-3 py-2">
        <div class="flex items-center space-x-3">
            <svg class="w-5 h-5 text-fg-yellow" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24"><path d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"></path></svg>
            <span class="bg-danger-soft border border-danger-subtle text-fg-danger-strong text-xs font-medium px-1.5 py-0.5 rounded">3.3</span>
            <span class="bg-brand-softer border border-brand-subtle text-fg-brand-strong text-xs font-medium px-1.5 py-0.5 rounded">6.6</span>
            <span class="bg-success-soft border border-success-subtle text-fg-success-strong text-xs font-medium px-1.5 py-0.5 rounded">10</span>
        </div>
    </div>
</div>

