<?php
/** @var \Core\Auth\AuthInterface $auth */
$user = $auth->user();
?>
<header class="header">
    <nav class="bg-neutral-primary container w-full z-20 top-0 start-0 border-b border-default">
        <div class="max-w-screen-2xl flex flex-wrap items-center justify-between mx-auto p-4">
            <!--Logo-->
            <a href="/admin" class="flex items-center space-x-2 rtl:space-x-reverse">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="w-10 h-10 text-indigo-800 dark:text-indigo-300 mb-1" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" fill="none" stroke-width="2" d="M5.35709 16V5.78571c0-.43393.34822-.78571.77777-.78571H18.5793c.4296 0 .7778.35178.7778.78571V16M5.35709 16h-1c-.55229 0-1 .4477-1 1v1c0 .5523.44771 1 1 1H20.3571c.5523 0 1-.4477 1-1v-1c0-.5523-.4477-1-1-1h-1M5.35709 16H19.3571M9.35709 8l2.62501 2.5L9.35709 13m4.00001 0h2"/>                </svg>
                <span class="self-center text-2xl font-semibold whitespace-nowrap text-indigo-800 dark:text-indigo-300" style="font-family: 'NautilusPompiliusRegular'">DashBoard</span>
            </a>
            <!--  Button Block -->
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <?php if ($auth->check()): ?>
                <!--User name-->
                <ul class="inline-flex items-center mt-0 text-sm font-medium mr-2">
                    <li>
                        <a href="#">
                            <span class="inline-flex items-center border border-success-subtle bg-success-soft text-fg-success-strong rounded px-2 my-2">
                                <svg class="w-5 h-5 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg>
                                <?php echo $user->name(); ?>
                            </span>
                        </a>
                    </li>
                </ul>
                <!--Button Logout-->
                <form method="post" action="/logout">
                    <button type="submit"
                       class="inline-flex items-center text-warning hover:text-white border border-warning hover:bg-warning focus:ring-4 focus:outline-none focus:ring-neutral-tertiary font-medium rounded-sm text-sm px-2 py-1 text-center me-2 dark:border-warning dark:text-warning dark:hover:text-white dark:hover:bg-warning dark:focus:ring-warning mt-1.5 mb-1.5 cursor-pointer">
                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                             viewBox="0 0 24 24">
                            <path d="m8 0c-3.309 0-6 2.691-6 6s2.691 6 6 6 6-2.691 6-6-2.691-6-6-6zm0 10c-2.206 0-4-1.794-4-4s1.794-4 4-4 4 1.794 4 4-1.794 4-4 4zm-3.5 4h6.5v2h-6.5c-1.379 0-2.5 1.122-2.5 2.5v5.5h-2v-5.5c0-2.481 2.019-4.5 4.5-4.5zm11.5 8h2v2h-2c-1.654 0-3-1.346-3-3v-6c0-1.654 1.346-3 3-3h2v2h-2c-.552 0-1 .449-1 1v6c0 .551.448 1 1 1zm8-3.941c0 .548-.24 1.07-.658 1.432l-2.681 2.362-1.322-1.5 1.535-1.354h-3.874v-2h3.74l-1.401-1.235 1.322-1.5 2.688 2.37c.411.355.651.877.651 1.425z"/>
                        </svg>
                        Logout
                    </button>
                </form>
                <?php else: ?>
                <!--Button Login-->
                <a type="button" href="/login"
                   class="inline-flex items-center text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-sm text-sm px-2 py-1 text-center me-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800 mt-1.5 mb-1.5 cursor-pointer">
                    <svg class="w-5 h-5 me-1.5 -ms-0.5" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                         viewBox="0 0 24 24">
                        <path d="m18 12.5c0 .828-.672 1.5-1.5 1.5s-1.5-.672-1.5-1.5.672-1.5 1.5-1.5 1.5.672 1.5 1.5zm6-7.799v19.299h-18v-3.162l3-3.07v3.232h2v-16h-1.5c-.275 0-.5.224-.5.5v5.731l-3-3.069v-2.662c0-1.93 1.57-3.5 3.5-3.5h1.837c.218-.46.538-.873.944-1.206.814-.667 1.879-.931 2.905-.725l6 1.2c1.63.325 2.813 1.769 2.813 3.432zm-3 0c0-.237-.169-.443-.401-.49l-6-1.201c-.201-.037-.347.048-.416.104-.068.056-.183.181-.183.386v17.5h7zm-12.293 10.506c.391-.39.391-1.024 0-1.414l-3.707-3.793v3h-5v3h5v3z"/>
                    </svg>
                    Login
                </a>
                <?php endif; ?>
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
                <!--Button Toggle-->
                <button data-collapse-toggle="navbar-sticky" type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
            <!--Menu-->
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
                <ul class="flex flex-col p-4 md:p-0 mt-4 text-sm font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-6 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-neutral-primary md:dark:bg-neutral-primary dark:border-gray-700">
                    <li>
                        <a href="/" class="flex gap-1 py-2 px-3 rounded-sm text-cyan-600 hover:text-cyan-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-teal-300 dark:text-cyan-500 dark:hover:bg-gray-700 dark:hover:text-teal-300 md:dark:hover:bg-transparent dark:border-gray-700">
                            <svg class="w-4 h-4" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                 viewBox="0 0 24 24">
                                <path d="M23.121,9.069,15.536,1.483a5.008,5.008,0,0,0-7.072,0L.879,9.069A2.978,2.978,0,0,0,0,11.19v9.817a3,3,0,0,0,3,3H21a3,3,0,0,0,3-3V11.19A2.978,2.978,0,0,0,23.121,9.069ZM15,22.007H9V18.073a3,3,0,0,1,6,0Zm7-1a1,1,0,0,1-1,1H17V18.073a5,5,0,0,0-10,0v3.934H3a1,1,0,0,1-1-1V11.19a1.008,1.008,0,0,1,.293-.707L9.878,2.9a3.008,3.008,0,0,1,4.244,0l7.585,7.586A1.008,1.008,0,0,1,22,11.19Z"/>
                            </svg>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/books" class="flex gap-1 py-2 px-3 rounded-sm text-cyan-600 hover:text-cyan-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-teal-300 dark:text-cyan-500 dark:hover:bg-gray-700 dark:hover:text-teal-300 md:dark:hover:bg-transparent dark:border-gray-700">
                            <svg class="w-5 h-5" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                 viewBox="0 0 24 24">
                                <path d="M12 6.03v13m0-13c-2.819-.831-4.715-1.076-8.029-1.023A.99.99 0 0 0 3 6v11c0 .563.466 1.014 1.03 1.007 3.122-.043 5.018.212 7.97 1.023m0-13c2.819-.831 4.715-1.076 8.029-1.023A.99.99 0 0 1 21 6v11c0 .563-.466 1.014-1.03 1.007-3.122-.043-5.018.212-7.97 1.023"/>
                            </svg>
                            <span>Books</span>

                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex gap-1 py-2 px-3 rounded-sm text-cyan-600 hover:text-cyan-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-teal-300 dark:text-cyan-500 dark:hover:bg-gray-700 dark:hover:text-teal-300 md:dark:hover:bg-transparent dark:border-gray-700">
                            <svg class="w-5 h-5" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24"  stroke="currentColor" stroke-width="2"  fill="none"
                                 viewBox="0 0 24 24">
                                <path d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                            </svg>
                            <span>Posts</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex gap-1 py-2 px-3 rounded-sm text-cyan-600 hover:text-cyan-700 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-cyan-700 md:p-0 md:dark:hover:text-teal-300 dark:text-cyan-500 dark:hover:bg-gray-700 dark:hover:text-teal-300 md:dark:hover:bg-transparent dark:border-gray-700">
                            <svg class="w-5 h-5" aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                 viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M14.7141 15h4.268c.4043 0 .732-.3838.732-.8571V3.85714c0-.47338-.3277-.85714-.732-.85714H6.71411c-.55228 0-1 .44772-1 1v4m10.99999 7v-3h3v3h-3Zm-3 6H6.71411c-.55228 0-1-.4477-1-1 0-1.6569 1.34315-3 3-3h2.99999c1.6569 0 3 1.3431 3 3 0 .5523-.4477 1-1 1Zm-1-9.5c0 1.3807-1.1193 2.5-2.5 2.5s-2.49999-1.1193-2.49999-2.5S8.8334 9 10.2141 9s2.5 1.1193 2.5 2.5Z"/>
                            </svg>
                            <span>About</span>

                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>