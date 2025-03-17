<div class="container mx-auto" x-data="window.eKJxLphGPLZqkwV">
    <div class="min-h-full bg-white dark:bg-zinc-800 shadow rounded-md">
      
        
        <header class="border-b-2 border-gray-100 dark:border-zinc-700 py-8 rounded-t-md">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
                <div class="flex-1 min-w-0">

                    
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">

                            
                            <li>
                                <div>
                                    <a href="<?php echo e(url('/'), false); ?>" class="text-sm font-medium text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 hover:text-gray-700"><?php echo e(__('messages.t_home'), false); ?></a>
                                </div>
                            </li>

                            
                            <li>
                                <div class="flex items-center">

                                    
                                    <svg class="hidden ltr:block flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>

                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-5 w-5 text-gray-400 viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                    <a href="<?php echo e(url('seller/home'), false); ?>" class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-200"><?php echo e(__('messages.t_dashboard'), false); ?></a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate"><?php echo e(__('messages.t_earnings'), false); ?></h1>

                    
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">

                        
                        <div class="mt-2 flex items-center text-xs font-medium" style="color: <?php echo e(auth()->user()->level->level_color, false); ?>">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4" style="color: <?php echo e(auth()->user()->level->level_color, false); ?>;margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/> <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/> </svg>
                            <?php echo e(auth()->user()->level->title, false); ?>

                        </div>

                        
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                            <?php echo e(__('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())]), false); ?>

                        </div>

                        
                        <?php if(auth()->user()->country): ?>
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/> </svg>
                                <?php echo e(auth()->user()->country->name, false); ?>

                            </div>
                        <?php endif; ?>

                        
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/> </svg>
                            <?php echo e(__('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, config('carbon-formats.F_j,_Y'))]), false); ?>

                        </div>
                    
                    </div>

                </div>
                <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">

                    
                    <span class="block ltr:mr-3 rtl:ml-4">
                        <a href="<?php echo e(url('seller/withdrawals/create'), false); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600">
                            <?php echo e(__('messages.t_withdrawal_earnings'), false); ?>

                        </a>
                    </span>
        
                    
                    <span class="block ltr:mr-3 rtl:ml-4">
                        <a href="<?php echo e(url('create'), false); ?>" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded-sm shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                            <?php echo e(__('messages.t_publish_new_gig'), false); ?>

                        </a>
                    </span>
                    
                </div>
            </div>
        </header>
      
        <main class="pb-12">

            
            <div class="mt-12 grid grid-cols-1 gap-y-12 gap-x-12 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 px-10">
          
                
                <p class="text-center bg-gray-50 dark:bg-zinc-700 rounded-lg px-4 py-6">
                  <span class="block text-2xl font-bold text-gray-600 dark:text-gray-300"><?php echo money(auth()->user()->balance_net, settings('currency')->code, true); ?></span>
                    <span class="mt-2 grid text-base">
                        <span class="font-medium text-gray-600 dark:text-gray-300">
                            <?php echo e(__('messages.t_net_income'), false); ?>

                        </span>
                    </span>
                </p>

                
                <p class="text-center bg-gray-50 dark:bg-zinc-700 rounded-lg px-4 py-6">
                    <span class="block text-2xl font-bold text-gray-600 dark:text-gray-300"><?php echo money(auth()->user()->balance_withdrawn, settings('currency')->code, true); ?></span>
                    <span class="mt-2 grid text-base">
                        <span class="font-medium text-gray-600 dark:text-gray-300">
                            <?php echo e(__('messages.t_withdrawn'), false); ?>

                        </span>
                    </span>
                </p>

                
                <p class="text-center bg-gray-50 dark:bg-zinc-700 rounded-lg px-4 py-6">
                    <span class="block text-2xl font-bold text-gray-600 dark:text-gray-300"><?php echo money(auth()->user()->balance_purchases, settings('currency')->code, true); ?></span>
                    <span class="mt-2 grid text-base">
                        <span class="font-medium text-gray-600 dark:text-gray-300">
                            <?php echo e(__('messages.t_used_for_purchases'), false); ?>

                        </span>
                    </span>
                </p>

                
                <p class="text-center bg-gray-50 dark:bg-zinc-700 rounded-lg px-4 py-6">
                    <span class="block text-2xl font-bold text-gray-600 dark:text-gray-300"><?php echo money(auth()->user()->balance_pending, settings('currency')->code, true); ?></span>
                    <span class="mt-2 grid text-base">
                        <span class="font-medium text-gray-600 dark:text-gray-300">
                            <?php echo e(__('messages.t_pending_clearance'), false); ?>

                        </span>
                    </span>
                </p>

                
                <p class="text-center bg-gray-50 dark:bg-zinc-700 rounded-lg px-4 py-6">
                    <span class="block text-2xl font-bold text-gray-600 dark:text-gray-300"><?php echo money(auth()->user()->balance_available, settings('currency')->code, true); ?></span>
                    <span class="mt-2 grid text-base">
                        <span class="font-medium text-gray-600 dark:text-gray-300">
                            <?php echo e(__('messages.t_available_for_withdrawal'), false); ?>

                        </span>
                    </span>
                </p>
              
            </div>

        </main>
        
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
    
    
    <script>
        function eKJxLphGPLZqkwV() {
            return {

            }
        }
        window.eKJxLphGPLZqkwV = eKJxLphGPLZqkwV();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/earnings/earnings.blade.php ENDPATH**/ ?>