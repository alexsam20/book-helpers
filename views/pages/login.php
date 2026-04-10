<?php /** @var \Core\View\ViewInterface $view */ ?>
<?php /** @var \Core\Session\SessionInterface $session */  ?>
<?php $view->component('start_blank') ?>
    <!-- Content -->
    <div class="flex flex-col h-full dark:bg-gray-950">
        <main class="main grow my-2">
            <!-- Login form -->
            <div class="flex justify-center items-center h-full">
                <div class="max-w-sm bg-neutral-primary-soft p-6 border border-default dark:bg-gray-950/50 rounded-base shadow-xs">
                    <form method="post" action="/login">
                        <div class="flex flex-wrap justify-between items-center mb-4">
                            <h5 class="text-xl font-semibold text-cyan-600">Sign in</h5>
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
                        <?php if ($session->has('error')) : ?>
                            <div class="flex items-start sm:items-center px-2 py-2 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft border border-danger-subtle"
                                 role="alert">
                                <svg class="w-4 h-4 me-2 shrink-0 mt-0.5 sm:mt-0" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M10 11h2v5m-2 0h4m-2.592-8.5h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <p><span class="font-medium me-1">Email or Password don't correct.</span></p>
                            </div>
                        <?php endif; ?>
                        <div class="relative mb-4">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m3.5 5.5 7.893 6.036a1 1 0 0 0 1.214 0L20.5 5.5M4 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z"/></svg>
                            </div>
                            <input type="email" id="email" name="email"
                                   class="block w-full ps-9 pe-3 py-2 px-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full placeholder:text-body"
                                   placeholder="name@mail.com">
                        </div>
                        <div class="relative mb-4">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-5 h-5 text-body" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                                </svg>
                            </div>
                            <input type="password" name="password" id="password"
                                   class="block w-full ps-9 pe-3 py-2 px-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full placeholder:text-body"
                                   placeholder="Password" required/>
                        </div>
                        <div class="flex items-start my-4">
                            <div class="flex items-center">
                                <input id="checkbox-remember" name="remember" type="checkbox" value=""
                                       class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
                                <label for="checkbox-remember" class="ms-2 text-sm font-medium text-heading">Remember me</label>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="inline-flex items-center text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-base text-sm px-2.5 py-1.5 leading-5 cursor-pointer">
                                <svg class="animate-pulse w-5 h-5 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>                                </svg>
                                Login
                            </button>
                        </div>
                        <div class="text-sm text-left font-medium text-body mt-2">Not registered?
                            <a href="/register" class="text-fg-brand hover:underline">Create account</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
<?php $view->component('end_blank') ?>