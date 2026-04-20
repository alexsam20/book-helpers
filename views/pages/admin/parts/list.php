<?php /** @var \Core\View\ViewInterface $view */  ?>
<?php /** @var \Core\Session\SessionInterface $session */ ?>
<?php /** @var \App\Models\Part $part */ ?>
<?php /** @var \App\Models\Listing $themes */ ?>
<?php /** @var \App\Models\Part $id */ ?>
<?php $view->component('start') ?>
<!-- Content -->
<div class="flex flex-col h-full">
    <?php $view->component('admin/header') ?>
    <main class="main grow my-2">
        <div class="container flex flex-col border border-gray-200 dark:border-gray-800 dark:bg-gray-950/10 rounded-2xl">
            <!-- Breadcrumbs -->
            <nav class="flex m-2 pt-2" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="flex items-center">
                        <a href="/admin" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4h3a1 1 0 0 1 1 1v15a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h3m0 3h6m-5-4v4h4V3h-4Z"/>
                            </svg>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <a href="/admin/parts?id=<?php echo $part->bookId(); ?>" class="inline-flex items-center ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-4 h-4 me-2" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                                </svg>
                                Parts of Book
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                            </svg>
                            <span class="inline-flex items-center ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">
                                <svg class="w-4 h-4 me-1" aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                                     viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>                                </svg>
                                <?php echo $part->title(); ?>
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>
            <!-- Page Content -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
                    <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
                        <svg class="w-7 h-7 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 9h6m-6 3h6m-6 3h6M6.996 9h.01m-.01 3h.01m-.01 3h.01M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z"/>
                        </svg>
                        Part - <?php echo $part->title(); ?>
                    </h1>
                    <div class="">
                        <!-- Button Add Block Code -->
                        <a type="button" href="#" id="blockCodeActionButton" data-modal-target="blockCodeModal" data-modal-toggle="blockCodeModal" class="inline-flex items-center text-white bg-gradient-to-r from-purple-500 to-pink-500 hover:bg-gradient-to-l focus:ring-4 focus:outline-none focus:ring-purple-200 dark:focus:ring-purple-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                            <svg class="w-5 h-5 mb-0.5 mr-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                            </svg>
                            Add Block Code
                        </a>
                        <!-- Main modal -->
                        <div id="blockCodeModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                    <!-- Modal header -->
                                    <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                        <h3 class="text-sm md:text-lg font-semibold text-gray-900 dark:text-white">
                                            Add Block Code
                                        </h3>
                                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="blockCodeModal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <form action="#" name="action" enctype="multipart/form-data">
                                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                                            <div>
                                                <input type="radio" id="income" name="action" value="income" class="hidden peer" required />
                                                <label for="income" class="inline-flex items-center justify-start w-full p-2.5 text-gray-900 dark:text-white text-sm bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-gray-700/50 peer-checked:text-fg-brand-strong">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 -2 60 60">
                                                        <path fill="#8b695c" fill-rule="evenodd" transform="translate(-70 -572)" d="M74,582h0.006a2,2,0,0,0,2.008,2H128v12H116.108A4.089,4.089,0,0,0,112,600v8a3.994,3.994,0,0,0,4,4h12v12a3.814,3.814,0,0,1-1.027,2.824A4.317,4.317,0,0,1,124,628H74.006a4.009,4.009,0,0,1-4.016-4V580A4.009,4.009,0,0,1,74,576v6Zm44,26a2.627,2.627,0,0,1-2-2v-4a2.627,2.627,0,0,1,2-2h10a2.627,2.627,0,0,1,2,2v4a2.627,2.627,0,0,1-2,2H118Z" />
                                                        <rect fill="#699f4c"  height="8" width="46" x="8"/>
                                                    </svg>
                                                    <svg class="w-5 h-5 rotate-125" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke="green" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                                                    <span class="block">
                                                        <span class="w-full">Income of funds</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="outflow" name="action" value="outflow" class="hidden peer" />
                                                <label for="outflow" class="inline-flex items-center justify-start w-full p-2.5 text-gray-900 dark:text-white text-sm bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-gray-700/50 peer-checked:text-fg-brand-strong">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 -2 60 60">
                                                        <path fill="#8b695c" fill-rule="evenodd" transform="translate(-70 -572)" d="M74,582h0.006a2,2,0,0,0,2.008,2H128v12H116.108A4.089,4.089,0,0,0,112,600v8a3.994,3.994,0,0,0,4,4h12v12a3.814,3.814,0,0,1-1.027,2.824A4.317,4.317,0,0,1,124,628H74.006a4.009,4.009,0,0,1-4.016-4V580A4.009,4.009,0,0,1,74,576v6Zm44,26a2.627,2.627,0,0,1-2-2v-4a2.627,2.627,0,0,1,2-2h10a2.627,2.627,0,0,1,2,2v4a2.627,2.627,0,0,1-2,2H118Z" />
                                                        <rect fill="#699f4c"  height="8" width="46" x="8"/>
                                                    </svg>
                                                    <svg class="w-5 h-5 rotate-305" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke="red" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                                                    <span class="block">
                                                                            <span class="w-full">Outflow of funds</span>
                                                                        </span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="cash" name="payment" value="cash" class="hidden peer" required />
                                                <label for="cash" class="inline-flex items-center justify-start w-full p-2.5 text-gray-900 dark:text-white text-sm bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-gray-700/50 peer-checked:text-fg-brand-strong">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 -2 60 60">
                                                        <path fill="#8b695c" fill-rule="evenodd" transform="translate(-70 -572)" d="M74,582h0.006a2,2,0,0,0,2.008,2H128v12H116.108A4.089,4.089,0,0,0,112,600v8a3.994,3.994,0,0,0,4,4h12v12a3.814,3.814,0,0,1-1.027,2.824A4.317,4.317,0,0,1,124,628H74.006a4.009,4.009,0,0,1-4.016-4V580A4.009,4.009,0,0,1,74,576v6Zm44,26a2.627,2.627,0,0,1-2-2v-4a2.627,2.627,0,0,1,2-2h10a2.627,2.627,0,0,1,2,2v4a2.627,2.627,0,0,1-2,2H118Z" />
                                                        <rect fill="#699f4c"  height="8" width="46" x="8"/>
                                                    </svg>
                                                    <svg class="w-5 h-5 rotate-125" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke="green" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                                                    <span class="block">
                                                        <span class="w-full">Cash</span>
                                                    </span>
                                                </label>
                                            </div>
                                            <div>
                                                <input type="radio" id="card" name="payment" value="card" class="hidden peer" />
                                                <label for="card" class="inline-flex items-center justify-start w-full p-2.5 text-gray-900 dark:text-white text-sm bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer peer-checked:hover:bg-brand-softer peer-checked:border-brand-subtle peer-checked:bg-brand-softer hover:bg-gray-700/50 peer-checked:text-fg-brand-strong">
                                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" width="800px" height="800px" viewBox="0 -2 60 60">
                                                        <path fill="#8b695c" fill-rule="evenodd" transform="translate(-70 -572)" d="M74,582h0.006a2,2,0,0,0,2.008,2H128v12H116.108A4.089,4.089,0,0,0,112,600v8a3.994,3.994,0,0,0,4,4h12v12a3.814,3.814,0,0,1-1.027,2.824A4.317,4.317,0,0,1,124,628H74.006a4.009,4.009,0,0,1-4.016-4V580A4.009,4.009,0,0,1,74,576v6Zm44,26a2.627,2.627,0,0,1-2-2v-4a2.627,2.627,0,0,1,2-2h10a2.627,2.627,0,0,1,2,2v4a2.627,2.627,0,0,1-2,2H118Z" />
                                                        <rect fill="#699f4c"  height="8" width="46" x="8"/>
                                                    </svg>
                                                    <svg class="w-5 h-5 rotate-305" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke="red" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                                                    <span class="block">
                                                                            <span class="w-full">Card</span>
                                                                        </span>
                                                </label>
                                            </div>
                                            <div>
                                                <!--<label for="cash" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Card</label>-->
                                                <select id="cash" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="">Select card</option>
                                                    <option value="chase">Chase Bank</option>
                                                    <option value="ebt">EBT</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="card" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Card Type</label>
                                                <select id="card" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="">Electronics</option>
                                                    <option value="TV">TV/Monitors</option>
                                                    <option value="PC">PC</option>
                                                    <option value="GA">Gaming/Console</option>
                                                    <option value="PH">Phones</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" name="name" id="name" value="iPad Air Gen 5th Wi-Fi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ex. Apple iMac 27&ldquo;">
                                            </div>
                                            <div>
                                                <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                                                <input type="text" name="brand" id="brand" value="Google" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Ex. Apple">
                                            </div>
                                            <div>
                                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                <input type="number" value="399" name="price" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="$299">
                                            </div>
                                            <div>
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="">Electronics</option>
                                                    <option value="TV">TV/Monitors</option>
                                                    <option value="PC">PC</option>
                                                    <option value="GA">Gaming/Console</option>
                                                    <option value="PH">Phones</option>
                                                </select>
                                            </div>
                                            <div class="sm:col-span-2">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <textarea id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a description...">Standard glass, 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, 16GB 2666MHz DDR4 memory, Radeon Pro 5500 XT with 8GB of GDDR6 memory, 256GB SSD storage, Gigabit Ethernet, Magic Mouse 2, Magic Keyboard - US</textarea>
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-4">
                                            <button type="submit" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                Update product
                                            </button>
                                            <button type="button" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                                <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Button Back -->
                        <a type="button" href="/admin/parts?id=<?php echo $part->bookId() ?>" class="inline-flex items-center text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5">
                            <svg class="w-5 h-5 mb-0.5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.5 8.046H11V6.119c0-.921-.9-1.446-1.524-.894l-5.108 4.49a1.2 1.2 0 0 0 0 1.739l5.108 4.49c.624.556 1.524.027 1.524-.893v-1.928h2a3.023 3.023 0 0 1 3 3.046V19a5.593 5.593 0 0 0-1.5-10.954Z"></path>
                            </svg>
                            Back
                        </a>
                    </div>
                </div>
                <!-- Part Card -->
                <div class="grid grid-cols-1 p-4 dark:bg-neutral-primary-soft rounded-2xl">
                    <div class="flex flex-col p-2 items-center text-gray-800 bg-gray-100 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl shadow-xs md:flex-row">
                        <div class="flex flex-col text-right md:p-4 leading-normal w-full">
                            <!-- Title -->
                            <div class="inline-flex items-center justify-between w-full">
                                <!--  Title-->
                                <h5 class="p-2 text-xl font-semibold tracking-tight text-heading"><?php echo $part->title() ?></h5>
                                <!-- Date created -->
                                <span class="inline-flex items-center bg-success-soft border border-success-subtle text-fg-success-strong text-xs font-medium px-1.5 py-0.5 rounded">
                                    <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Zm3-7h.01v.01H8V13Zm4 0h.01v.01H12V13Zm4 0h.01v.01H16V13Zm-8 4h.01v.01H8V17Zm4 0h.01v.01H12V17Zm4 0h.01v.01H16V17Z"/>
                                    </svg>
                                    <?php echo $view->formatDate($part->createdAt()); ?>
                                </span>
                            </div>
                            <!-- Body -->
                            <div class="px-2 py-1">
                                <p class="p-2 text-gray-200 text-justify text-sm">
                                    <?php echo $part->body() ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blocks Code -->
            <div class="text-gray-800 dark:text-gray-400 border border-gray-200 dark:border-blue-900 dark:bg-gray-950/10 rounded-2xl mt-3 mb-3">
                <div class="flex justify-between p-4 bg-gray-100 dark:bg-gray-950/50 rounded-t-2xl">
                    <h1 class="flex items-center text-xl font-semibold tracking-tight text-cyan-600">
                        <svg class="w-6 h-6 me-2" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                             viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m5 4-2 2 2 2m4-4 2 2-2 2m5-12v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                        </svg>
                        Add Block Code
                    </h1>
                </div>
                <div class="flex bg-neutral-primary-soft w-full rounded-2xl">
                    <div class="w-full bg-neutral-primary-soft p-6 bw-full shadow-xs rounded-2xl">
                        <form method="post" action="">
                            <!-- Language and Theme Button -->
                            <div class="md:flex w-full items-center gap-2">
                                <!-- Language Select -->
                                <div class="mb-4 relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14"/>
                                        </svg>
                                    </div>
                                    <select id="language" name="language" class="bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                        <option value="">Select Language</option>
                                        <option value="javascript">JavaScript</option>
                                        <option value="php">PHP</option>
                                        <option value="html">HTML</option>
                                        <option value="css">CSS</option>
                                    </select>
                                    <?php if ($session->has('language')) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('language')[0]; ?></li>
                                    </ul>
                                    <?php endif; ?>
                                </div>
                                <!-- Theme Select -->
                                <div class="mb-4 relative flex-1">
                                    <div class="absolute inset-y-0 left-0 pl-2 pt-2">
                                        <svg class="w-5 h-5 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m7.53316 11.8623.00957-.0029m5.58157 7.1424c-.5.515-.9195.8473-1.0611.8903-.4784.1454-5.42881-1.2797-6.23759-3.3305-.80878-2.0507-1.83058-5.8152-1.88967-6.2192-.0591-.40404 1.5599-1.72424 3.59722-2.61073m1.98839 8.05513c-.22637.262-.38955.5599-.55552.8474M13.4999 12c.5.5 1 1.049 2 1.049s1.5-.549 2-1.049m-4-4h.01m3.99 0h.01m-7.01-2.5c0-.28929 2.5-1.5 5-1.5s5 1.13645 5 1.5V12c0 1.9655-4.291 5-5 5-.7432 0-5-3.0345-5-5V5.5Z"/>
                                        </svg>
                                    </div>
                                    <select id="theme" name="theme" class="bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full px-2.5 py-2 pl-9 placeholder:text-body">
                                        <option value="">Select Theme</option>
                                        <?php foreach($themes as $theme) : ?>
                                            <option value="<?php echo $theme; ?>"><?php echo ucfirst($theme); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php if ($session->has('theme')) : ?>
                                        <ul>
                                            <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('theme')[0]; ?></li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Checkbox Block -->
                            <div class="mb-4 relative">
                                <div class="flex w-full items-center justify-end gap-2 bg-neutral-secondary-medium border border-default-medium shadow-sm text-heading text-sm rounded-base py-2 px-2">
                                    <!--<label class="inline-flex items-center cursor-pointer">
                                        <span class="select-none text-sm font-medium text-heading">Monthly</span>
                                        <input type="checkbox" value="" class="sr-only peer">
                                        <div class="relative mx-3 w-9 h-5 bg-neutral-quaternary peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-brand-soft dark:peer-focus:ring-brand-soft rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-buffer after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-brand"></div>
                                        <span class="select-none text-sm font-medium text-heading">Yearly</span>
                                    </label>
                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-green-300 dark:peer-focus:ring-green-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-green-600 dark:peer-checked:bg-green-600"></div>
                                        <span class="select-none ms-3 text-sm font-medium text-heading">Green</span>
                                    </label>-->
                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                        <input type="checkbox" name="executable" value="" class="sr-only peer">
                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-purple-600 dark:peer-checked:bg-purple-600"></div>
                                        <span class="select-none ms-3 text-sm font-medium text-heading">Is Executable?</span>
                                    </label>

                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                        <input type="checkbox" name="visible" value="" class="sr-only peer" checked>
                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-teal-600 dark:peer-checked:bg-teal-600"></div>
                                        <span class="select-none ms-3 text-sm font-medium text-heading">Is Visible?</span>
                                    </label>
                                    <!--<label class="inline-flex items-center me-5 cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-yellow-300 dark:peer-focus:ring-yellow-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-yellow-400 dark:peer-checked:bg-yellow-400"></div>
                                        <span class="select-none ms-3 text-sm font-medium text-heading">Yellow</span>
                                    </label>

                                    <label class="inline-flex items-center me-5 cursor-pointer">
                                        <input type="checkbox" value="" class="sr-only peer" checked>
                                        <div class="relative w-9 h-5 bg-neutral-quaternary rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-orange-300 dark:peer-focus:ring-orange-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-orange-500 dark:peer-checked:bg-orange-500"></div>
                                        <span class="select-none ms-3 text-sm font-medium text-heading">Orange</span>
                                    </label>-->
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="mb-4">
                                    <textarea id="description" name="description" rows="4"
                                              class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                              placeholder="Write description"><?php echo $session->getFlash('description_val'); ?></textarea>
                                <?php if ($session->has('description')) : ?>
                                    <ul>
                                        <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('description')[0]; ?></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <!-- Code -->
                            <div class="mb-4">
                            <textarea id="code" name="code" rows="4"
                                      class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-cyan-500 focus:outline focus:outline-cyan-200 block w-full p-3.5 shadow-xs placeholder:text-body"
                                      placeholder="Code"><?php echo $session->getFlash('code_val'); ?></textarea>
                            <?php if ($session->has('code')) : ?>
                            <ul>
                                <li class="mt-2 ml-2 text-sm text-pink-600"><?php echo $session->getFlash('code')[0]; ?></li>
                            </ul>
                            <?php endif; ?>
                            </div>
                            <!-- Save button -->
                            <div class="flex items-end justify-end gap-2">
                                <button type="submit" class="inline-flex items-center text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-base text-sm px-2.5 py-1 text-center leading-5 cursor-pointer">
                                    <svg class="w-5 h-5 mr-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M11 16h2m6.707-9.293-2.414-2.414A1 1 0 0 0 16.586 4H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V7.414a1 1 0 0 0-.293-.707ZM16 20v-6a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v6h8ZM9 4h6v3a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1V4Z"/>
                                    </svg>
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php $view->component('footer') ?>
</div>
<?php $view->component('end') ?>
