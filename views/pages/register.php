<?php /** @var \Core\View\ViewInterface $view */ ?>
<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php $view->component('start_blank') ?>
    <!-- Content -->
    <div class="flex flex-col h-full dark:bg-gray-950">
        <main class="main grow my-2">
            <!-- Login form -->
            <div class="flex justify-center items-center h-full">
                <div class="bg-neutral-primary-soft flex justify-center items-center p-6 dark:bg-gray-950/50 border border-default rounded-base shadow-xs">
                    <form method="post" action="/register">
                        <div class="flex flex-wrap justify-between items-center mb-4">
                            <h5 class="text-xl font-semibold text-cyan-600">Create account</h5>
                            <!--Button Dark/Light -->
                            <button id="theme-toggle" type="button"
                                    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            fill-rule="evenodd" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <a href="/" class="flex items-center space-x-2 rtl:space-x-reverse">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5  text-indigo-800 dark:text-indigo-300 mb-1" viewBox="0 0 16 16">
                                    <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
                                </svg>
                                <span class="self-center text-xl font-semibold whitespace-nowrap text-indigo-800 dark:text-indigo-300" style="font-family: 'NautilusPompiliusRegular'">My Books</span>
                            </a>
                        </div>
                        <div class="relative mb-2">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-body" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                </svg>
                            </div>
                            <input type="text" id="name" name="name" value="<?php echo $session->getFlash('name_val'); ?>"
                                   class="block ps-9 pe-3 py-2 px-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full placeholder:text-body"
                                   placeholder="Name">
                        </div>
                        <?php if ($session->has('name')) : ?>
                        <ul>
                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('name')[0]; ?></li>
                        </ul>
                        <?php endif; ?>
                        <div class="relative mb-2 mt-4">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/></svg>
                            </div>
                            <input type="text" id="email" name="email" value="<?php echo $session->getFlash('email_val'); ?>"
                                   class="block ps-9 pe-3 py-2 px-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full placeholder:text-body"
                                   placeholder="name@mail.com">
                        </div>
                        <?php if ($session->has('email')) : ?>
                        <ul>
                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('email')[0]; ?></li>
                        </ul>
                        <?php endif; ?>
                        <div class="mb-2 mt-4 flex gap-4">
                            <div class="w-full">
                                <div class="relative inline-flex mb-2">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                                        </svg>
                                    </div>
                                    <input type="text" name="password" id="password" value="<?php echo $session->getFlash('password_val'); ?>"
                                           class="block w-full ps-9 pe-3 py-2 px-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full placeholder:text-body"
                                           placeholder="Password">
                                </div>
                                <?php if ($session->has('password')) : ?>
                                    <div class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('password')[0]; ?></div>
                                <?php endif; ?>
                            </div>
                            <div class="w-full">
                                <div class="relative inline-flex mb-2">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-body" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14v3m4-6V7a3 3 0 1 1 6 0v4M5 11h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                                    </svg>
                                </div>
                                <input type="text" name="password_confirmation" id="password_confirmation" value="<?php echo $session->getFlash('password_confirmation_val'); ?>"
                                       class="block w-full ps-9 pe-3 py-2 px-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full placeholder:text-body"
                                       placeholder="Confirm password">
                            </div>
                                <?php if ($session->has('password_confirmation')) : ?>
                                    <div class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('password_confirmation')[0]; ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="flex justify justify-between items-center">
                            <div class="text-sm font-medium text-body">
                                Registered?
                                <a href="/login" class="text-fg-brand hover:underline">Login to your account</a>
                            </div>
                            <button type="submit"
                                    class="text-gray-100 justify-end text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 shadow-lg shadow-cyan-500/50 dark:shadow-lg dark:shadow-cyan-800/80 font-medium rounded-base text-sm px-2 py-0.5 text-center leading-5 cursor-pointer">
                                    <span class="inline-flex items-center justify-center gap-1 pt-0.5">
                                        <svg class="animate-pulse w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                          <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                                        </svg>
                                        Create account
                                    </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
<?php $view->component('end_blank') ?>