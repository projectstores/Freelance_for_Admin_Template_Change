<div class="w-full" x-data="window.qGzhGNlrGCLxvXf" x-init="initialize">

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-10">
        <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-100 rounded-lg shadow-sm sm:flex sm:px-5 bg-white dark:bg-zinc-800 dark:border-zinc-700 dark:shadow-none" aria-label="Breadcrumb">

            
            <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                
                <li>
                    <div class="flex items-center">
                        <a href="<?php echo e(url('/'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_home'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="<?php echo e(url('seller/home'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_my_dashboard'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="<?php echo e(url('seller/gigs'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_my_gigs'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                            <?php echo app('translator')->get('messages.t_gig_analytics'); ?>
                        </span>
                    </div>
                </li>

            </ol>

            
            <div class="flex items-center">

                
                <span class="block ltr:mr-4 rtl:ml-4">
                    <a href="<?php echo e(url('seller/gigs'), false); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-700/40 rounded shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-700/40 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600 dark:focus:ring-offset-zinc-700/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 dark:text-zinc-200 ltr:mr-2 rtl:ml-2 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>

                        <?php echo e(__('messages.t_back_to_gigs'), false); ?>

                    </a>
                </span>
    
                
                <span class="block ltr:mr-4 rtl:ml-4">
                    <button id="modals-share-btn" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-50 ltr:mr-2 rtl:ml-2" viewBox="0 0 20 20" fill="currentColor"> <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/></svg>

                        <?php echo e(__('messages.t_share_gig'), false); ?>

                    </button>
                </span>
                
            </div>

        </nav>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

            
            <div class="col-span-12 z-[1]">
                <div class="grid grid-cols-12 sm:gap-x-6 gap-y-4">

                    
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block shadow-sm overflow-hidden border border-gray-200 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        <?php echo e(__('messages.t_total_sales'), false); ?>

                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        <?php echo e(number_format($gig->counter_sales), false); ?>

                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block shadow-sm overflow-hidden border border-gray-200 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        <?php echo e(__('messages.t_total_clicks'), false); ?>

                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        <?php echo e(number_format($gig->counter_visits), false); ?>

                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z" clip-rule="evenodd"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block shadow-sm overflow-hidden border border-gray-200 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        <?php echo e(__('messages.t_total_impressions'), false); ?>

                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        <?php echo e(number_format($gig->counter_impressions), false); ?>

                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/> <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-span-12 sm:col-span-6 md:col-span-4 xl:col-span-3">
                        <div class="relative block shadow-sm overflow-hidden border border-gray-200 dark:border-zinc-700 p-5 mt-6 bg-white dark:bg-zinc-800 rounded-lg intro-x">
                            <div class="flex flex-wrap gap-3">
                                <div class="ltr:mr-auto rtl:ml-auto">
                                    <div class="text-gray-500 dark:text-gray-300 flex items-center leading-3 text-sm font-bold">
                                        <?php echo e(__('messages.t_total_reviews'), false); ?>

                                    </div>
                                    <div class="text-black dark:text-gray-100 relative text-2xl font-black leading-5 mt-4">
                                        <?php echo e(number_format($gig->counter_reviews), false); ?>

                                    </div>
                                </div>
                                <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400 dark:bg-zinc-700 dark:text-zinc-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            
            <div class="col-span-12 lg:col-span-5">

                
                <div class="w-full">
                    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                        
                        <div class="bg-white border-b border-gray-100 px-8 py-4 rounded-t-md dark:bg-zinc-800 dark:border-zinc-700/40">
                            <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                                <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_devices'), false); ?></h3>
                                    <p class="text-[13px] font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_devices_chart_subtitle'), false); ?></p>
                                </div>
                            </div>
                        </div>

                        
                        <div class="px-8 py-6">
                            <div id="chart-devices"></div>
                        </div>

                    </div>
                </div>

            </div>

            
            <div class="col-span-12 lg:col-span-7">

                
                <div class="col-span-7">
                    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">
    
                        
                        <div class="bg-white border-b border-gray-100 px-8 py-4 rounded-t-md dark:bg-zinc-800 dark:border-zinc-700/40">
                            <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                                <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_visitors_map'), false); ?></h3>
                                    <p class="text-[13px] font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_visitors_map_subtitle'), false); ?></p>
                                </div>
                            </div>
                        </div>
    
                        
                        <div class="px-8 py-6 min-h-[500px] grid">
                            <div id="world-map-visitors" class="w-full h-full"></div>
                        </div>
    
                    </div>
                </div>

            </div>

            
            <div class="col-span-12 lg:col-span-7">
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                    
                    <div class="bg-white border-b border-gray-100 px-8 py-4 rounded-t-md dark:bg-zinc-800 dark:border-zinc-700/40">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_browsers'), false); ?></h3>
                                <p class="text-[13px] font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_browsers_chart_subtitle'), false); ?></p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="px-8 py-6">
                        <div id="chart-browsers"></div>
                    </div>

                </div>
            </div>

            
            <div class="col-span-12 lg:col-span-5">
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                    
                    <div class="bg-white border-b border-gray-100 px-8 py-4 rounded-t-md dark:bg-zinc-800 dark:border-zinc-700/40">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_os'), false); ?></h3>
                                <p class="text-[13px] font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_os_chart_subtitle'), false); ?></p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="px-8 py-6">
                        <div id="chart-os"></div>
                    </div>

                </div>
            </div>

            
            <div class="col-span-12 lg:col-span-4 mt-3 2xl:mt-8">

                
                <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200 dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="rounded-md bg-white px-6 py-4 dark:bg-zinc-800 dark:border-zinc-700/40">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_recent_orders'), false); ?></h3>
                                <p class="text-[13px] font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_recent_orders_subtitle'), false); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="intro-x">
                        <div class="bg-white rounded-lg px-5 py-3 mb-3 flex items-center zoom-in dark:bg-zinc-900">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img class="lazy" alt="<?php echo e($order->order->buyer->username, false); ?>" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($order->order->buyer->avatar), false); ?>">
                            </div>
                            <div class="ltr:ml-4 ltr:mr-auto rtl:mr-4 rtl:ml-auto">
                                <a href="<?php echo e(url('profile', $order->order->buyer->username), false); ?>" class="block font-medium text-[13px] pb-0.5 dark:text-gray-200"><?php echo e($order->order->buyer->username, false); ?></a>
                                <div class="text-slate-500 dark:text-zinc-300 mt-0.5 text-[13px] w-52 text-ellipsis block overflow-hidden"><?php echo e(format_date($order->placed_at, config('carbon-formats.F_j_Y')), false); ?></div>
                            </div>
                            <div class="text-green-500 text-[13px] font-medium">+ <?php echo money($order->profit_value, settings('currency')->code, true); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center text-sm font-medium text-gray-400 p-5 dark:text-gray-300">
                        <?php echo e(__('messages.t_no_data_to_show_now'), false); ?>

                    </div>
                <?php endif; ?>

            </div>

            
            <div class="col-span-12 lg:col-span-4 mt-3 2xl:mt-8">

                
                <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200 dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="rounded-md bg-white px-6 py-4 dark:bg-zinc-800 dark:border-zinc-700/40">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_referrers'), false); ?></h3>
                                <p class="text-[13px] font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_referrers_subtitle'), false); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <?php $__empty_1 = true; $__currentLoopData = $referrers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ref): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <div class="intro-x">
                        <div class="flex space-x-3 rtl:space-x-reverse bg-white rounded-lg px-5 py-3 mb-3 justify-between items-center zoom-in dark:bg-zinc-900">
                            <div class="w-10 h-10 flex justify-center items-center rounded-md overflow-hidden" style="background-color: <?php echo e(fake()->hexcolor(), false); ?>">
                                <span class="text-base font-black text-white"><?php echo e(getWebsiteFirstLetter($ref->visit_from), false); ?></span>
                            </div>
                            <div class="flex-1 space-y-1">
                                <div class="flex items-center justify-between">

                                    
                                    <?php if(parse_url(url('/'))['host'] == $ref->visit_from): ?>
                                        <div class="block font-medium text-[13px] pb-0.5 dark:text-gray-200"><?php echo e($ref->visit_from, false); ?></div>
                                    <?php else: ?>
                                        <a href="<?php echo e(url('redirect?to=' . safeEncrypt($ref->referrer)), false); ?>" target="_blank" class="block font-medium text-[13px] pb-0.5 dark:text-gray-200"><?php echo e($ref->visit_from, false); ?></a>
                                    <?php endif; ?>

                                    <div class="text-gray-400 dark:text-zinc-100 text-[13px] font-medium"><?php echo e($ref->count, false); ?></div>
                                </div>
                                <div class="text-slate-500 dark:text-zinc-300 mt-0.5 text-[13px] w-52 text-ellipsis block overflow-hidden" title="<?php echo e($ref->referrer, false); ?>"><?php echo e($ref->referrer, false); ?></div>
                            </div>
                        </div>
                    </div>
                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center text-sm font-medium text-gray-400 p-5 dark:text-gray-300">
                        <?php echo e(__('messages.t_no_data_to_show_now'), false); ?>

                    </div>
                <?php endif; ?>

            </div>

            
            <div class="col-span-12 lg:col-span-4 mt-3 2xl:mt-8">

                
                <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200 dark:bg-zinc-800 dark:border-zinc-700">
                    <div class="rounded-md bg-white px-6 py-4 dark:bg-zinc-800 dark:border-zinc-700/40">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_cities'), false); ?></h3>
                                <p class="text-[13px] font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_most_visits_by_cities'), false); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                
                <?php $__empty_1 = true; $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="intro-x">
                        <div class="bg-white rounded-lg px-5 py-3 mb-3 flex items-center zoom-in dark:bg-zinc-900">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden ring-gray-100 ring-1 dark:ring-transparent">
                                <img class="lazy" alt="<?php echo e($city->country_name, false); ?>" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(url('public/img/flags', strtolower("$city->country_code.svg")), false); ?>">
                            </div>
                            <div class="ltr:ml-4 ltr:mr-auto rtl:mr-4 rtl:ml-auto">
                                <div class="block font-medium text-[13px] pb-0.5 dark:text-gray-200"><?php echo e($city->city, false); ?></div>
                                <div class="text-slate-500 dark:text-zinc-300 mt-0.5 text-[13px] w-52 text-ellipsis block overflow-hidden"><?php echo e($city->country_name, false); ?></div>
                            </div>
                            <div class="text-gray-400 dark:text-zinc-100 text-[13px] font-medium"><?php echo e($city->count, false); ?></div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-center text-sm font-medium text-gray-400 p-5 dark:text-gray-300">
                        <?php echo e(__('messages.t_no_data_to_show_now'), false); ?>

                    </div>
                <?php endif; ?>

            </div>

        </div>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modals-share-container','target' => 'modals-share-btn','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-2xl']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_share_this_gig'), false); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="flex items-center justify-center flex-col space-y-6 sm:space-y-0 sm:flex-row">

                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.facebook.com/share.php?u=<?php echo e(url('service', $gig->slug), false); ?>&t=<?php echo e($gig->title, false); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#3b5998] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M374.244,285.825l14.105,-91.961l-88.233,0l0,-59.677c0,-25.159 12.325,-49.682 51.845,-49.682l40.116,0l0,-78.291c0,0 -36.407,-6.214 -71.213,-6.214c-72.67,0 -120.165,44.042 -120.165,123.775l0,70.089l-80.777,0l0,91.961l80.777,0l0,222.31c16.197,2.541 32.798,3.865 49.709,3.865c16.911,0 33.511,-1.324 49.708,-3.865l0,-222.31l74.128,0Z"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_facebook'), false); ?></span>
                </div>

                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://twitter.com/intent/tweet?text=<?php echo e($gig->title, false); ?>%20-%20<?php echo e(url('service', $gig->slug), false); ?>%20" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#1da1f2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M161.014,464.013c193.208,0 298.885,-160.071 298.885,-298.885c0,-4.546 0,-9.072 -0.307,-13.578c20.558,-14.871 38.305,-33.282 52.408,-54.374c-19.171,8.495 -39.51,14.065 -60.334,16.527c21.924,-13.124 38.343,-33.782 46.182,-58.102c-20.619,12.235 -43.18,20.859 -66.703,25.498c-19.862,-21.121 -47.602,-33.112 -76.593,-33.112c-57.682,0 -105.145,47.464 -105.145,105.144c0,8.002 0.914,15.979 2.722,23.773c-84.418,-4.231 -163.18,-44.161 -216.494,-109.752c-27.724,47.726 -13.379,109.576 32.522,140.226c-16.715,-0.495 -33.071,-5.005 -47.677,-13.148l0,1.331c0.014,49.814 35.447,93.111 84.275,102.974c-15.464,4.217 -31.693,4.833 -47.431,1.802c13.727,42.685 53.311,72.108 98.14,72.95c-37.19,29.227 -83.157,45.103 -130.458,45.056c-8.358,-0.016 -16.708,-0.522 -25.006,-1.516c48.034,30.825 103.94,47.18 161.014,47.104" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_twitter'), false); ?></span>
                </div>

                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url('service', $gig->slug), false); ?>&title=<?php echo e($gig->title, false); ?>&summary=<?php echo e($gig->title, false); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#0a66c2] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M473.305,-1.353c20.88,0 37.885,16.533 37.885,36.926l0,438.251c0,20.393 -17.005,36.954 -37.885,36.954l-436.459,0c-20.839,0 -37.773,-16.561 -37.773,-36.954l0,-438.251c0,-20.393 16.934,-36.926 37.773,-36.926l436.459,0Zm-37.829,436.389l0,-134.034c0,-65.822 -14.212,-116.427 -91.12,-116.427c-36.955,0 -61.739,20.263 -71.867,39.476l-1.04,0l0,-33.411l-72.811,0l0,244.396l75.866,0l0,-120.878c0,-31.883 6.031,-62.773 45.554,-62.773c38.981,0 39.468,36.461 39.468,64.802l0,118.849l75.95,0Zm-284.489,-244.396l-76.034,0l0,244.396l76.034,0l0,-244.396Zm-37.997,-121.489c-24.395,0 -44.066,19.735 -44.066,44.047c0,24.318 19.671,44.052 44.066,44.052c24.299,0 44.026,-19.734 44.026,-44.052c0,-24.312 -19.727,-44.047 -44.026,-44.047Z" style="fill-rule:nonzero;"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_linkedin'), false); ?></span>
                </div>
                
                
                <div class="grid items-center justify-center mx-4">
                    <a href="https://api.whatsapp.com/send?text=<?php echo e($gig->title, false); ?>%20<?php echo e(url('service', $gig->slug), false); ?>" target="_blank" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-[#25d366] focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M373.295,307.064c-6.37,-3.188 -37.687,-18.596 -43.526,-20.724c-5.838,-2.126 -10.084,-3.187 -14.331,3.188c-4.246,6.376 -16.454,20.725 -20.17,24.976c-3.715,4.251 -7.431,4.785 -13.8,1.594c-6.37,-3.187 -26.895,-9.913 -51.225,-31.616c-18.935,-16.89 -31.72,-37.749 -35.435,-44.126c-3.716,-6.377 -0.397,-9.824 2.792,-13c2.867,-2.854 6.371,-7.44 9.555,-11.16c3.186,-3.718 4.247,-6.377 6.37,-10.626c2.123,-4.252 1.062,-7.971 -0.532,-11.159c-1.591,-3.188 -14.33,-34.542 -19.638,-47.298c-5.171,-12.419 -10.422,-10.737 -14.332,-10.934c-3.711,-0.184 -7.963,-0.223 -12.208,-0.223c-4.246,0 -11.148,1.594 -16.987,7.969c-5.838,6.377 -22.293,21.789 -22.293,53.14c0,31.355 22.824,61.642 26.009,65.894c3.185,4.252 44.916,68.59 108.816,96.181c15.196,6.564 27.062,10.483 36.312,13.418c15.259,4.849 29.145,4.165 40.121,2.524c12.238,-1.827 37.686,-15.408 42.995,-30.286c5.307,-14.882 5.307,-27.635 3.715,-30.292c-1.592,-2.657 -5.838,-4.251 -12.208,-7.44m-116.224,158.693l-0.086,0c-38.022,-0.015 -75.313,-10.23 -107.845,-29.535l-7.738,-4.592l-80.194,21.037l21.405,-78.19l-5.037,-8.017c-21.211,-33.735 -32.414,-72.726 -32.397,-112.763c0.047,-116.825 95.1,-211.87 211.976,-211.87c56.595,0.019 109.795,22.088 149.801,62.139c40.005,40.05 62.023,93.286 62.001,149.902c-0.048,116.834 -95.1,211.889 -211.886,211.889m180.332,-392.224c-48.131,-48.186 -112.138,-74.735 -180.335,-74.763c-140.514,0 -254.875,114.354 -254.932,254.911c-0.018,44.932 11.72,88.786 34.03,127.448l-36.166,132.102l135.141,-35.45c37.236,20.31 79.159,31.015 121.826,31.029l0.105,0c140.499,0 254.87,-114.366 254.928,-254.925c0.026,-68.117 -26.467,-132.166 -74.597,-180.352" id="WhatsApp-Logo"/></svg>
                    </a>
                    <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_whatsapp'), false); ?></span>
                </div>

                
                <div class="grid items-center justify-center mx-4">
                    <button type="button" x-on:click="copy" class="inline-flex justify-center items-center h-12 w-12 border border-transparent rounded-full bg-gray-400 focus:outline-none focus:ring-0 mx-auto">
                        <svg class="h-5 w-5 fill-white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><path d="M17.3,13.35a1,1,0,0,1-.7-.29,1,1,0,0,1,0-1.41l2.12-2.12a2,2,0,0,0,0-2.83L17.3,5.28a2.06,2.06,0,0,0-2.83,0L12.35,7.4A1,1,0,0,1,10.94,6l2.12-2.12a4.1,4.1,0,0,1,5.66,0l1.41,1.41a4,4,0,0,1,0,5.66L18,13.06A1,1,0,0,1,17.3,13.35Z" /><path d="M8.11,21.3a4,4,0,0,1-2.83-1.17L3.87,18.72a4,4,0,0,1,0-5.66L6,10.94A1,1,0,0,1,7.4,12.35L5.28,14.47a2,2,0,0,0,0,2.83L6.7,18.72a2.06,2.06,0,0,0,2.83,0l2.12-2.12A1,1,0,1,1,13.06,18l-2.12,2.12A4,4,0,0,1,8.11,21.3Z" /><path d="M8.82,16.18a1,1,0,0,1-.71-.29,1,1,0,0,1,0-1.42l6.37-6.36a1,1,0,0,1,1.41,0,1,1,0,0,1,0,1.42L9.52,15.89A1,1,0,0,1,8.82,16.18Z" /></svg>
                    </button>
                    <template x-if="!isCopied">
                        <span class="uppercase font-normal text-xs text-gray-500 mt-4 tracking-widest"><?php echo e(__('messages.t_copy_link'), false); ?></span>
                    </template>
                    <template x-if="isCopied">
                        <span class="uppercase font-normal text-xs text-green-500 mt-4 tracking-widest"><?php echo e(__('messages.t_copied'), false); ?></span>
                    </template>
                </div>

            </div>
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>
    
    
    <script defer src="<?php echo e(url('public/js/plugins/jvectormap/jquery-jvectormap-2.0.5.min.js'), false); ?>"></script>
    <script defer src="<?php echo e(url('public/js/plugins/jvectormap/jquery-jvectormap-world-mill.js'), false); ?>"></script>

    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    
    <script>
        function qGzhGNlrGCLxvXf() {
            return {

                isCopied: false,

                // Copy link
                copy() {

                    // Set gig link
                    const url = "<?php echo e(url('service', $gig->slug), false); ?>";

                    var _this = this;
                    navigator.clipboard.writeText(url).then(function() {
                        _this.isCopied = true;
                        setTimeout(() => {
                            _this.isCopied = false
                        }, 2000);
                    }, function(err) {
                    });

                },

                // Map
                map() {
                    $(function(){

                        // Get data
                        const data   = <?php echo json_encode($countries, 15, 512) ?>;

                        const visits = [];

                        data.forEach((element, index) => {

                            const el = { [element.country_code]: Number(element.count) };

                            visits.push(el)
                        });

                        let result = visits.reduce((a, c) => {
                            let [[k, v]] = Object.entries(c);
                            a[k] = v; return a;
                        }, {});

                        $('#world-map-visitors').vectorMap({
                            map: 'world_mill',
                            backgroundColor: 'transparent',
                            regionStyle: {
                                initial: {
                                    fill: '#9d9d9d',
                                    "fill-opacity": 1,
                                    stroke: 'none',
                                    "stroke-width": 0,
                                    "stroke-opacity": 1
                                },
                                hover: {
                                    "fill-opacity": 0.8,
                                    cursor: 'pointer'
                                },
                                selected: {
                                    fill: '#9d9d9d'
                                },
                                selectedHover: {
                                }
                            },
                            series: {
                                regions: [{
                                    values: result,
                                    scale: ['#d7cbfb', '#7b3ff3'],
                                    normalizeFunction: 'polynomial'
                                }]
                            },
                            onRegionTipShow: function(e, el, code){
                                if (result[code]) {
                                    el.html(el.html()+' (<?php echo e(__("messages.t_visits"), false); ?> '+result[code]+')');
                                }
                            }
                        });

                    });
                },

                // Browsers
                browsers() {

                    // Set data
                    const data       = <?php echo json_encode($browsers, 15, 512) ?>;
                    const series     = [];
                    const categories = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(Number(element.count))
                        categories.push(element.browser_name)
                    });

                    // Set chart options
                    var options = {
                        series: [{ data: series }],
                        chart: {
                            height: 350,
                            type  : 'bar',
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '45%',
                                distributed: true,
                            }
                        },
                        dataLabels: { enabled: false },
                        legend: { show: false },
                        xaxis: {
                            categories: categories,
                            labels: {
                                style: {
                                    fontSize: '12px'
                                }
                            }
                        },
                        grid: {
                            show: false,
                        },
                        tooltip: {
                            custom: function({series, seriesIndex, dataPointIndex, w}) {
                                return '<div class="bg-black px-4 py-2 opacity-50 text-white border-0 text-xs font-medium"> <?php echo e(__("messages.t_visits"), false); ?> ' + series[seriesIndex][dataPointIndex] + '</div>'
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-browsers"), options);
                    chart.render();

                },

                // Os
                os() {

                    // Set data
                    const data   = <?php echo json_encode($os, 15, 512) ?>;
                    const series = [];
                    const labels = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(Number(element.count))
                        labels.push(element.os_name)
                    });

                    // Set chart options
                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            width: 380,
                            type  : 'pie',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                width: 200
                                },
                                legend: {
                                position: 'bottom'
                                }
                            }
                        }],
                        grid: {
                            show: false,
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-os"), options);
                    chart.render();

                },

                // Devices
                devices() {

                    // Set data
                    const data   = <?php echo json_encode($devices, 15, 512) ?>;
                    const series = [];
                    const labels = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(Number(element.count))
                        labels.push(element.device_type)
                    });

                    // Set chart options
                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            width: 380,
                            type  : 'pie',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                width: 200
                                },
                                legend: {
                                position: 'bottom'
                                }
                            }
                        }],
                        grid: {
                            show: false,
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-devices"), options);
                    chart.render();

                },

                // Init
                initialize() {

                    // Init map
                    this.map();

                    // Init browsers
                    this.browsers();

                    // Init Os
                    this.os();

                    // Init devices
                    this.devices();

                }

            }
        }
        window.qGzhGNlrGCLxvXf = qGzhGNlrGCLxvXf();
    </script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css" />

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/gigs/options/analytics.blade.php ENDPATH**/ ?>