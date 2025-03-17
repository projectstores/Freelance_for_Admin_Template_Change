<main class="relative container mx-auto">
    <div class="flex flex-row gap-10 place-content-center justify-center">
        <div class="w-full lg:basis-3/4">

            <div class="relative w-full lg:max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
                <div class="max-w-lg mx-auto rounded-md border shadow-sm overflow-hidden lg:max-w-none lg:flex dark:border-zinc-700">
                    <div class="flex-1 bg-white dark:bg-zinc-800 px-6 py-8 lg:p-12">
                        <div class="text-2xl font-extrabold text-gray-900 dark:text-gray-100 sm:text-3xl flex items-center">
                            <?php echo e(__('messages.t_redirecting_dots'), false); ?>

                            <svg class="animate-spin ltr:-mr-1 rtl:-ml-1 ltr:ml-3 rtl:mr-3 h-5 w-5 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                        </div>
                        <p class="mt-6 text-base text-gray-500 dark:text-gray-400">
                            <?php echo e(__('messages.t_redirecting_notification_alert'), false); ?>

                        </p>
                        <div class="mt-8">
                            <div class="flex items-center">
                                <h4 class="flex-shrink-0 ltr:pr-4 rtl:pl-4 bg-white dark:bg-zinc-800 text-sm tracking-wider font-semibold uppercase text-gray-500">
                                    <?php echo e(__('messages.t_proceed_with_caution'), false); ?>

                                </h4>
                                <div class="flex-1 border-t-2 border-gray-200 dark:border-zinc-700"></div>
                            </div>
                            <ul role="list" class="mt-8 space-y-5 lg:space-y-0 lg:grid lg:grid-cols-1 lg:gap-x-8 lg:gap-y-5">
                            
                                
                                <li class="flex items-start lg:col-span-1">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <p class="ltr:ml-3 rtl:mr-3 text-sm text-gray-700 dark:text-gray-300">
                                        <?php echo e(__('messages.t_redirect_alert_msg_1'), false); ?>

                                    </p>
                                </li>

                                
                                <li class="flex items-start lg:col-span-1">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <p class="ltr:ml-3 rtl:mr-3 text-sm text-gray-700 dark:text-gray-300">
                                        <?php echo e(__('messages.t_redirect_alert_msg_2'), false); ?>

                                    </p>
                                </li>

                                
                                <li class="flex items-start lg:col-span-1">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <p class="ltr:ml-3 rtl:mr-3 text-sm text-gray-700 dark:text-gray-300">
                                        <?php echo e(__('messages.t_redirect_alert_msg_3'), false); ?>

                                    </p>
                                </li>
                            
                            </ul>
                        </div>
                    </div>
                  <div class="py-8 px-6 text-center bg-gray-50 dark:bg-zinc-700 lg:flex-shrink-0 lg:flex lg:flex-col lg:justify-center lg:p-12">
                    <div class="mt-6">
                        <div class="rounded-md shadow">
                            <a href="<?php echo e($link, false); ?>" class="flex items-center justify-center px-12 py-3 border border-transparent text-base font-medium rounded-sm text-white bg-gray-800 dark:bg-primary-600 dark:hover:bg-primary-700 hover:bg-gray-900">
                                <?php echo e(__('messages.t_proceed'), false); ?>

                            </a>
                        </div>
                    </div>
                    <div class="mt-4 text-sm">
                        <a href="<?php echo e(url('/'), false); ?>" class="font-medium text-gray-500 dark:text-gray-400 underline">
                            <?php echo e(__('messages.t_back_to_homepage'), false); ?>

                        </a>
                    </div>
                  </div>
                </div>
            </div>

        </div>
    </div>
</main><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/redirect/redirect.blade.php ENDPATH**/ ?>