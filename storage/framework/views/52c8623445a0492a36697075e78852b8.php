<div class="w-full">
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-3">
        <div class="mx-auto max-w-7xl">
        
            <div class="lg:flex lg:items-center lg:justify-between">
            
                <div class="min-w-0 flex-1">
                    
                    <h2 class="text-3xl font-bold leading-7 text-black dark:text-gray-50 sm:truncate sm:tracking-tight">
                        <?php echo app('translator')->get('messages.t_welcome_back_2'); ?>
                    </h2>
                </div>
                
                
                <div class="mt-5 sm:flex justify-between lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
                
                    
					<span class="mt-2 sm:mt-0 sm:ltr:ml-3 sm:rtl:mr-3">
						<a href="<?php echo e(url('create'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
							<?php echo app('translator')->get('messages.t_create_a_new_gig'); ?>
						</a>
					</span>
          
					
					<span class="block">
                        <a href="<?php echo e(url('/'), false); ?>" class="inline-flex items-center bg-white border border-gray-200 px-4 py-2 text-[13px] font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:bg-zinc-800 dark:border-zinc-800 dark:text-zinc-100 dark:hover:bg-zinc-900 dark:focus:ring-offset-zinc-900 dark:focus:ring-zinc-900 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_switch_to_buying'); ?>
                        </a>
                    </span>
          
				</div>
			</div>
		</div>
	</div>
    
    
    <div class="max-w-7xl mx-auto px-5 sm:px-6 md:px-12">
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 lg:mt-6 sm:gap-y-5 lg:gap-y-6 sm:gap-x-6 lg:gap-x-6">

            <div class="col-span-12 xl:col-span-8 p-8 shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 flex items-center">
                <div class="flex flex-col sm:flex-row justify-between items-center w-full">
                
                    <div class="flex space-x-4 rtl:space-x-reverse">
    
                        
                        <div class="relative inline-block w-16 h-16">
                            <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src(auth()->user()->avatar), false); ?>" alt="<?php echo e(auth()->user()->username, false); ?>" class="w-full h-full rounded-full border border-gray-200 object-cover lazy">
                            <div class="absolute top-1 left-1 w-4 h-4 <?php echo e(auth()->user()->isOnline() ? 'bg-primary-700' : 'bg-gray-400', false); ?> rounded-full border-2 border-white"></div>
                        </div>
                        
    
                        
                        <div>
                            <div class="flex items-center text-3xl font-bold text-black dark:text-zinc-100 mb-1">
                                <?php echo e(auth()->user()->fullname ?? auth()->user()->username, false); ?>

                                <?php if(auth()->user()->status === 'verified'): ?>
                                <svg class="h-4.5 w-4.5 flex-shrink-0 text-blue-600 dark:text-zinc-300 ml-1" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g>
                                        <path fill="none" d="M0 0H24V24H0z"></path>
                                        <path d="M12 1l8.217 1.826c.457.102.783.507.783.976v9.987c0 2.006-1.003 3.88-2.672 4.992L12 23l-6.328-4.219C4.002 17.668 3 15.795 3 13.79V3.802c0-.469.326-.874.783-.976L12 1zm4.452 7.222l-4.95 4.949-2.828-2.828-1.414 1.414L11.503 16l6.364-6.364-1.415-1.414z"></path>
                                    </g>
                                </svg>
                                <?php endif; ?>
                            </div>
                            
                            
                            <?php if(auth()->user()->fullname): ?>
                                <div class="text-base text-gray-400 font-medium ltr:!ml-1 rtl:!mr-1 -mt-0.5 hidden md:flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd"/></svg>
                                    <span><?php echo e(auth()->user()->username, false); ?></span>
                                </div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
            
                    <div class="flex space-x-4">
                        <div class="mt-1 sm:mt-0 sm:pt-0 pt-2 flex flex-row space-x-3 rtl:space-x-reverse">
                            <div class="text-sm text-gray-500 dark:text-zinc-200 flex items-center">
                                <a href="<?php echo e(url('profile', auth()->user()->username), false); ?>" class="rounded-lg bg-gray-200 p-2">
                                    <svg class="text-primary-700" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                        <path d="M234-276q51-39 114-61.5T480-360q69 0 132 22.5T726-276q35-41 54.5-93T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 59 19.5 111t54.5 93Zm246-164q-59 0-99.5-40.5T340-580q0-59 40.5-99.5T480-720q59 0 99.5 40.5T620-580q0 59-40.5 99.5T480-440Zm0 360q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Z"/>
                                    </svg>
                                </a>
                            </div>
                            <div class="text-sm text-gray-500 dark:text-zinc-200 flex items-center">
                                <a href="/account/settings" class="rounded-lg bg-gray-200 p-2">
                                    <svg class="text-primary-700" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="currentColor">
                                        <path d="m370-80-16-128q-13-5-24.5-12T307-235l-119 50L78-375l103-78q-1-7-1-13.5v-27q0-6.5 1-13.5L78-585l110-190 119 50q11-8 23-15t24-12l16-128h220l16 128q13 5 24.5 12t22.5 15l119-50 110 190-103 78q1 7 1 13.5v27q0 6.5-2 13.5l103 78-110 190-118-50q-11 8-23 15t-24 12L590-80H370Zm112-260q58 0 99-41t41-99q0-58-41-99t-99-41q-59 0-99.5 41T342-480q0 58 40.5 99t99.5 41Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            
            <div class="col-span-12 xl:col-span-4 p-8 shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 flex flex-col items-center justify-center">
                <span class="text-gray-500 font-medium"><?php echo app('translator')->get('messages.t_available_balance'); ?></span>
                
                <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-zinc-200">
                    <svg class="mr-4 h-10 w-10 flex-shrink-0 text-gray-400 dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M2 9h19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V9zm1-6h15v4H2V4a1 1 0 0 1 1-1zm12 11v2h3v-2h-3z"></path>
                        </g>
                    </svg>
                    <div class="flex flex-col items-center">
                        <span class="text-black font-bold text-3xl"><?php echo money(auth()->user()->balance_available, settings('currency')->code, true); ?></span>
                    </div>
                </div>
            </div>


        </div>
    </div>
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
    
		
        <div class="mt-4 grid grid-cols-12 gap-4 sm:mt-5 lg:mt-6 sm:gap-y-5 lg:gap-y-6 sm:gap-x-6 lg:gap-x-6">
            <!-- Left Column -->
            <div class="col-span-12 xl:col-span-8 grid grid-rows-1 gap-0 lg:grid-rows-2 lg:gap-4 gap-y-4 sm:gap-y-5 lg:gap-y-6">
                    <div class="h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600">
                    
                        <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200"><?php echo app('translator')->get('messages.t_statistics'); ?></div>
                    
                    	<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 sm:gap-5 lg:gap-6 px-10 py-3">
    		
    					
    					<div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g>
                                            <path fill="none" d="M0 0h24v24H0z"></path>
                                            <path d="M10 20H6v2H4v-2H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7V1.59a.5.5 0 0 1 .582-.493l10.582 1.764a1 1 0 0 1 .836.986V6h1v2h-1v7h1v2h-1v2.153a1 1 0 0 1-.836.986L20 20.333V22h-2v-1.333l-7.418 1.236A.5.5 0 0 1 10 21.41V20zm2-.36l8-1.334V4.694l-8-1.333v16.278zM16.5 14c-.828 0-1.5-1.12-1.5-2.5S15.672 9 16.5 9s1.5 1.12 1.5 2.5-.672 2.5-1.5 2.5z"></path>
                                        </g>
                                    </svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo money($earnings, settings('currency')->code, true); ?>
                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_earnings'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    	
    					
    					<div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M11.484 2.17a.75.75 0 011.032 0 11.209 11.209 0 007.877 3.08.75.75 0 01.722.515 12.74 12.74 0 01.635 3.985c0 5.942-4.064 10.933-9.563 12.348a.749.749 0 01-.374 0C6.314 20.683 2.25 15.692 2.25 9.75c0-1.39.223-2.73.635-3.985a.75.75 0 01.722-.516l.143.001c2.996 0 5.718-1.17 7.734-3.08zM12 8.25a.75.75 0 01.75.75v3.75a.75.75 0 01-1.5 0V9a.75.75 0 01.75-.75zM12 15a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75v-.008a.75.75 0 00-.75-.75H12z" clip-rule="evenodd"></path></svg>
                                </div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo money(convertToNumber(auth()->user()->balance_pending), settings('currency')->code, true); ?>
                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_pending_clearance'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    	
    					
    					<div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686z"></path></g></svg>
    							</div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo e(number_format($awarded_projects, 0, ".", " "), false); ?>

                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_awarded_projects'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    	
    					
    					<div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-100 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M13.289 6.216l4.939-3.841a1 1 0 0 1 1.32.082l2.995 2.994a1 1 0 0 1 .082 1.321l-3.84 4.938a7.505 7.505 0 0 1-7.283 9.292C8 21.002 3.5 19.5 1 18c3.98-3 3.047-4.81 3.5-6.5 1.058-3.95 4.842-6.257 8.789-5.284zm3.413 1.879c.065.063.13.128.193.194l1.135 1.134 2.475-3.182-1.746-1.746-3.182 2.475 1.125 1.125z"></path></g></svg>
    							</div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo e(number_format($total_gigs, 0, ".", " "), false); ?>

                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_total_gigs'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    
    				</div>
                
                </div>
                
                <div class="h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600">
                    
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200"><?php echo app('translator')->get('messages.t_orders'); ?></div>
                
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 sm:gap-5 lg:gap-6 px-10 py-3">
                        
                        <div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-green-200 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zm12 4L17 4H7L5.5 6h13zM9 10H7v2a5 5 0 0 0 10 0v-2h-2v2a3 3 0 0 1-6 0v-2z"></path></g></svg>
    							</div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo e(number_format($completed_orders, 0, ".", " "), false); ?>

                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_completed'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    	
    					
    					<div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-green-200 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0H24V24H0z"></path><path d="M12 2c5.523 0 10 4.477 10 10s-4.477 10-10 10S2 17.523 2 12h2c0 4.418 3.582 8 8 8s8-3.582 8-8-3.582-8-8-8C9.536 4 7.332 5.114 5.865 6.865L8 9H2V3l2.447 2.446C6.28 3.336 8.984 2 12 2zm1 5v4.585l3.243 3.243-1.415 1.415L11 12.413V7h2z"></path></g></svg>
    							</div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo e(number_format($pending_orders, 0, ".", " "), false); ?>

                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_pending'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    	
    					
    					<div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-green-200 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M5.33 15.929A13.064 13.064 0 0 1 5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13c0 1.01-.114 1.991-.33 2.929l2.02 1.796a.5.5 0 0 1 .097.63l-2.458 4.096a.5.5 0 0 1-.782.096l-2.254-2.254a1 1 0 0 0-.707-.293H9.414a1 1 0 0 0-.707.293l-2.254 2.254a.5.5 0 0 1-.782-.096l-2.458-4.095a.5.5 0 0 1 .097-.631l2.02-1.796zM12 13a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"></path></g></svg>
    							</div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo e(number_format($orders_under_progress, 0, ".", " "), false); ?>

                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_under_progress'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    	
    					
    					<div class="flex flex-col justify-between py-8">
                            <div class="flex items-start space-x-2 rtl:space-x-reverse justify-center sm:justify-start">
                                <!-- SVG on the left side -->
                                <div class="w-9 h-9 flex items-center justify-center rounded-full bg-green-200 dark:bg-zinc-700">
                                    <svg class="h-5 w-5 shrink-0 text-black dark:text-zinc-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10zm4.891-13.477a6.04 6.04 0 0 0-1.414-1.414l-8.368 8.368a6.04 6.04 0 0 0 1.414 1.414l8.368-8.368z"></path></g></svg>
    							</div>
                                <div class="flex flex-col">
                                    <div class="text-2xl font-bold text-black dark:text-zinc-100 text-center">
                                        <?php echo e(number_format($canceled_orders, 0, ".", " "), false); ?>

                                    </div>
                                    <div class="mt-1 text-[13px] text-gray-500 dark:text-zinc-300 font-medium text-center capitalize">
                                        <?php echo app('translator')->get('messages.t_canceled'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
    					
    				</div>
                
                </div>
            </div>
            <!-- Right Column -->
            <div class="col-span-12 xl:col-span-4 row-span-1 h-full lg:row-span-2 p-8 shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600">

				
				<div class="text-xl text-black font-bold mb-5"><?php echo app('translator')->get('messages.t_new_messages'); ?></div>

				
				<div class="space-y-4">
					<?php $__empty_1 = true; $__currentLoopData = $latest_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<a href="<?php echo e(url('inbox', $message['uid']), false); ?>" class="flex cursor-pointer items-center justify-between space-x-2 rtl:space-x-reverse">

							<div class="flex items-center space-x-3 rtl:space-x-reverse">

								
								<img class="h-10 w-10 rounded-full object-cover" src="<?php echo e($message['avatar'], false); ?>" alt="<?php echo e($message['username'], false); ?>">

								
								<div>
									<div class="flex items-center">
										<p class="font-semibold text-sm text-black dark:text-zinc-300 mb-1">
											<?php echo e($message['username'], false); ?>

										</p>
									</div>
									<p class="text-xs text-slate-400 truncate block max-w-[180px]">
										<?php if($message['message']['attachment']): ?>
											<div class="flex items-center space-x-1 rtl:space-x-reverse text-xs text-slate-400">
												<svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
												<span><?php echo app('translator')->get('messages.t_attachment'); ?></span>
											</div>
										<?php else: ?>
											<?php echo e($message['message']['body'], false); ?>

										<?php endif; ?>
									</p>
								</div>

							</div>

							
							<div class="hover:text-primary-600 focus:text-primary-600 text-slate-500">
								<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
							</div>

						</a>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<span class="text-gray-400 text-sm"><?php echo app('translator')->get('messages.t_no_messages_yet'); ?></span>
					<?php endif; ?>
				</div>
            
            </div>
        </div>
        
        <div class="w-full">
            
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_latest_orders'); ?></div>
                    
                        <div class="grid grid-cols-1 sm:grid-cols-1 lg:grid-cols-2 gap-6 sm:mt-5 lg:mt-6 sm:gap-y-6 lg:gap-y-6 sm:gap-x-6 lg:gap-x-6 px-10">
                            
                            <?php $__empty_1 = true; $__currentLoopData = $latest_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="flex flex-col sm:flex-row items-center px-5 py-5 rounded-lg mb-4 border border-gray-300 hover:bg-gray-100"
                                    x-data="{ href: '<?php echo e(url('service', $order->gig->slug), false); ?>' }" 
                                    @click="window.location.href = href">
                                    
                					
                				    <img class="h-44 w-44 rounded-lg object-cover lazy p-5" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($order->gig->thumbnail), false); ?>" alt="<?php echo e($order->gig->title, false); ?>">
                
                					
                					<div class="flex-grow flex flex-col items-center sm:items-start">

                						<div class="flex items-center text-slate-500 text-xs">
            								
    										<a href="<?php echo e(url('categories/' . $order->gig->category->slug . '/' . $order->gig->subcategory->slug), false); ?>" target="_blank" class="ltr:ml-1 rtl:mr-1 text-xs font-normal text-primary-700" aria-current="page"><?php echo e($order->gig->subcategory->name, false); ?></a>
                						</div>
                						
                						
                						<a href="<?php echo e(url('service', $order->gig->slug), false); ?>" class="text-black font-bold block max-w-sm hover:text-primary-600 dark:text-white text-2xl line-clamp-2" title="<?php echo e($order->gig->title, false); ?>">
                                            <?php echo e($order->gig->title, false); ?>

                                        </a>
                						
        								<div>
        								
        								    <?php if($order->expected_delivery_date): ?>
        										<span class="text-sm whitespace-nowrap font-normal text-gray-400 dark:text-zinc-300"><?php echo e(format_date($order->expected_delivery_date, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?></span>
        									<?php elseif(in_array($order->status, ['pending', 'proceeded']) && !$order->is_requirements_sent): ?>
        										<span class="text-sm whitespace-nowrap font-normal text-gray-400 dark:text-zinc-300"><?php echo e(__('messages.t_waiting_for_requirements'), false); ?></span>
        									<?php else: ?>
        										<span class="text-2xl font-normal text-gray-400 dark:text-zinc-300 mx-auto block text-center">-</span>
        									<?php endif; ?>
        								
        								</div>
        								
        								<div class="mt-2">
        								
                                            <?php if($order->refund && $order->refund->status === 'pending'): ?>
    											<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-500 text-white">
    												<?php echo e(__('messages.t_dispute_opened'), false); ?>

    											</span>
    										<?php elseif($order->order?->invoice && $order->order->invoice->status === 'pending'): ?>
    											<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-amber-500 text-white">
    												<?php echo e(__('messages.t_pending_payment'), false); ?>

    											</span>
    										<?php else: ?>
    											<?php switch($order->status):
    
    												
    												case ('pending'): ?>
    													<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-amber-500 text-white tracking-wide">
    														<?php echo e(__('messages.t_pending'), false); ?>

    													</span>
    													<?php break; ?>
    												
    												
    												<?php case ('delivered'): ?>
    													<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-500 text-white">
    														<?php echo e(__('messages.t_delivered'), false); ?>

    													</span>
    													<?php break; ?>
    
    												
    												<?php case ('refunded'): ?>
    													<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-500 text-white">
    														<?php echo e(__('messages.t_refunded'), false); ?>

    													</span>
    													<?php break; ?>
    
    												
    												<?php case ('proceeded'): ?>
    													<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-blue-500 text-white">
    														<?php echo e(__('messages.t_in_the_process'), false); ?>

    													</span>
    													<?php break; ?>
    
    												
    												<?php case ('canceled'): ?>
    													<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-gray-500 text-white">
    														<?php echo e(__('messages.t_canceled'), false); ?>

    													</span>
    													<?php break; ?>
    
    												<?php default: ?>
    													
    											<?php endswitch; ?>
    										<?php endif; ?>
        								
        								</div>
        
                					</div>
                
                				</div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="flex flex-col col-span-2 sm:flex-row justify-center px-5 py-5 mb-4 text-gray-400 text-sm"><?php echo app('translator')->get('messages.t_no_orders_yet'); ?></div>
                            <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
        
        <?php if(settings('projects')->is_enabled): ?>
        <div class="w-full">
            
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_latest_awarded_projects'); ?></div>
                    
                    <?php if($latest_awarded_projects && $latest_awarded_projects->count()): ?>
                    
                    <table class="w-full px-10 text-left border-spacing-y-[10px] border-separate sm:mt-2">
						<thead class="">
							<tr class="bg-gray-100 dark:bg-zinc-600">

								
								<th class="font-bold tracking-wider text-black px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 rtl:text-right"><?php echo app('translator')->get('messages.t_project'); ?></th>
								
								
								<th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_status'); ?></th>
								
								
								<th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_my_proposal'); ?></th>
								
								
								<th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 "><?php echo app('translator')->get('messages.t_awarded_date'); ?></th>

							</tr>
						</thead>
						<thead>
							<?php $__currentLoopData = $latest_awarded_projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-latest-projects-<?php echo e($project->uid, false); ?>">

									
									<td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-60 rtl:text-right">
										<a href="<?php echo e(url('project/' . $project->pid . '/' . $project->slug), false); ?>" class="font-medium whitespace-nowrap truncate text-black block max-w-sm hover:text-primary-600 dark:text-white text-base" title="<?php echo e($project->title, false); ?>">
											<?php echo e($project->title, false); ?>

										</a>
									</td>

									
									<td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-40 text-center">
										<?php switch($project->status):

											
											case ('pending_final_review'): ?>
												<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-amber-500 text-white tracking-wide whitespace-nowrap">
													<?php echo e(__('messages.t_pending_final_review'), false); ?>

												</span>
												<?php break; ?>
											
											
											<?php case ('active'): ?>
												<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-blue-500 text-white tracking-wide whitespace-nowrap">
													<?php echo e(__('messages.t_active'), false); ?>

												</span>
												<?php break; ?>

											
											<?php case ('completed'): ?>
												<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-emerald-500 text-white tracking-wide whitespace-nowrap">
													<?php echo e(__('messages.t_completed'), false); ?>

												</span>
												<?php break; ?>

											
											<?php case ('incomplete'): ?>
												<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-500 text-white tracking-wide whitespace-nowrap">
													<?php echo e(__('messages.t_incomplete'), false); ?>

												</span>
												<?php break; ?>

											
											<?php case ('under_development'): ?>
												<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-purple-500 text-white tracking-wide whitespace-nowrap">
													<?php echo e(__('messages.t_under_development'), false); ?>

												</span>
												<?php break; ?>

											
											<?php case ('closed'): ?>
												<span class="inline-flex dark:bg-transparent items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-gray-500 text-white tracking-wide whitespace-nowrap">
													<?php echo e(__('messages.t_closed'), false); ?>

												</span>
												<?php break; ?>

											<?php default: ?>
												
										<?php endswitch; ?>
									</td>

									
									<td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-40 text-center">
										<span class="text-black dark:text-zinc-300 text-sm font-semibold">
											<?php echo money($project->awarded_bid->amount, settings('currency')->code, true); ?>
										</span>
									</td>

									
									<td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-40 text-center">
										<span class="text-black dark:text-zinc-300 text-sm font-semibold">
											<?php echo e(format_date($project->awarded_bid->awarded_date), false); ?>

										</span>
									</td>

								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</thead>
					</table>
					<?php else: ?>
					    <div class="flex flex-col col-span-2 sm:flex-row justify-center px-5 py-5 mt-5 mb-4 text-gray-400 text-sm"><?php echo app('translator')->get('messages.t_no_job_yet'); ?></div>
					<?php endif; ?>
                    
                <div>
            </div>
        </div>

    </div>
    <?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/home/home.blade.php ENDPATH**/ ?>