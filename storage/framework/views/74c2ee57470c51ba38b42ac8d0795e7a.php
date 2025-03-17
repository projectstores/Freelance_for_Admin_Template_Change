<div class="w-full">

    
    <div wire:loading>
        <div class="fixed inset-0 flex items-end overflow-hidden justify-center sm:items-center z-50">
            <div class="w-full h-full flex items-center justify-center">
                <div class="app-preloader fixed z-50 grid h-full w-full place-content-center inset-0 bg-secondary-400 bg-opacity-60 transform transition-opacity dialog-backdrop backdrop-blur-sm dark:bg-secondary-700 dark:bg-opacity-60">
                    <div class="app-preloader-inner relative inline-block h-32 w-32"></div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-3">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                       
                    </h2>
    
                    
                </div>
    
                
                        <div class="mt-5 sm:flex justify-between lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
                        
                            
        					<span class="block">
        						<a href="<?php echo e(url('create'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
        							<?php echo app('translator')->get('messages.t_create_a_new_gig'); ?>
        						</a>
        					</span>
                  
        					
        					<span class="block">
                                <a href="<?php echo e(url('/'), false); ?>" class="inline-flex border border-gray-200 items-center bg-white px-4 py-2 text-[13px] font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:bg-zinc-800 dark:border-zinc-800 dark:text-zinc-100 dark:hover:bg-zinc-900 dark:focus:ring-offset-zinc-900 dark:focus:ring-zinc-900 whitespace-nowrap">
                                    <?php echo app('translator')->get('messages.t_switch_to_buying'); ?>
                                </a>
                            </span>
                  
        				</div>

        		</div>
    
            </div>
        </div>
    </div>

    
    <?php if(session()->has('success')): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-4">
            <div class="rounded-md bg-green-100 dark:bg-zinc-700 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm font-medium text-green-800 dark:text-zinc-400"><?php echo e(session()->get('success'), false); ?></p>
                    </div>
                </div>
            </div>

        </div>
    <?php endif; ?>
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="w-full">
            
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_gigs'); ?></div>
                    
                    <?php if($gigs && $gigs->count()): ?>
                    
                    <table class="w-full px-10 text-left border-spacing-y-[10px] border-separate sm:mt-2">
						<thead class="">
							<tr class="bg-gray-100 dark:bg-zinc-600">
							
							    
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_gig'); ?></th>
				
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_price'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_rating'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_sales'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_clicks'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_status'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_options'); ?></th>

							</tr>
						</thead>
						<thead>
							<?php $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-gigs-<?php echo e($gig->uid, false); ?>">

                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
        
                                            
                                            <div class="h-10 w-10">
                                                <img class="w-full h-full rounded-md object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($gig->thumbnail), false); ?>" alt="<?php echo e($gig->title, false); ?>">
                                            </div>
        
                                            
                                            <div>
                                                
                                                
                                                <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="text-black font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-base" title="<?php echo e($gig->title, false); ?>">
                                                    <?php echo e($gig->title, false); ?>

                                                </a>
        
                                                
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-2">
                                                    <nav class="flex" aria-label="Breadcrumb">
                                                        <ol role="list" class="flex items-center space-x-1 rtl:space-x-reverse">
                                                            
                                                            
                                                            <li>
                                                                <div class="flex items-center">
                                                                    <a href="<?php echo e(url('categories', $gig->category->slug), false); ?>" target="_blank" class="text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100"><?php echo e($gig->category->name, false); ?></a>
                                                                </div>
                                                            </li>
                                                    
                                                            
                                                            <li>
                                                                <div class="flex items-center">
        
                                                                    
                                                                    <svg class="flex-shrink-0 h-4 w-4 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>
        
                                                                    <a href="<?php echo e(url('categories/' . $gig->category->slug . '/' . $gig->subcategory->slug), false); ?>" target="_blank" class="ltr:ml-1 rtl:mr-1 text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100" aria-current="page"><?php echo e($gig->subcategory->name, false); ?></a>
        
                                                                </div>
                                                            </li>
        
                                                        </ol>
                                                    </nav>
                                                </div>
        
                                            </div>
        
                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div class="text-black dark:text-gray-100 text-sm font-black"><?php echo money($gig->price, settings('currency')->code, true); ?></div>
                                        <div class="text-xs text-gray-400 tracking-wide font-normal mt-1 whitespace-nowrap"><?php echo e(__('messages.t_number_days_for_delivery', ['number' => $gig->delivery_time]), false); ?></div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div class="flex items-center justify-center mb-2 z-0" data-rating-value="<?php echo e($gig->rating, false); ?>">
                                            <?php echo render_star_rating($gig->rating, "0.85rem", "0.85rem", "#d0d0d0"); ?>

                                        </div>
                                        <div class="text-xs text-gray-400 tracking-wide font-normal mt-2.5 whitespace-nowrap"><?php echo e(__('messages.t_number_reviews', ['number' => number_format($gig->counter_reviews)]), false); ?></div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <span class="text-black dark:text-gray-100 text-sm font-black"><?php echo e(number_format($gig->counter_sales), false); ?></span>
                                        <?php if($gig->total_orders_in_queue() == 1): ?>
                                            <p class="text-xs text-gray-400 tracking-wide font-normal mt-1 whitespace-nowrap"><?php echo e(__('messages.t_number_order_in_queue', ['number' => $gig->total_orders_in_queue()]), false); ?></p>
                                        <?php else: ?>
                                            <p class="text-xs text-gray-400 tracking-wide font-normal mt-1 whitespace-nowrap"><?php echo e(__('messages.t_number_orders_in_queue', ['number' => $gig->total_orders_in_queue()]), false); ?></p>
                                        <?php endif; ?>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <span class="text-black dark:text-gray-100 text-sm font-black">
                                            <?php echo e(number_format($gig->counter_visits), false); ?>

                                        </span>
                                        <div class="text-xs text-gray-400 tracking-wide font-normal mt-1 whitespace-nowrap">
                                            <?php echo e(number_format($gig->counter_impressions), false); ?> <?php echo e(strtolower(__('messages.t_impressions')), false); ?>

                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <?php switch($gig->status):
        
                                            
                                            case ('pending'): ?>
                                                <span class="whitespace-nowrap inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-yellow-50 text-yellow-800 dark:bg-transparent dark:text-amber-400">
                                                    <?php echo e(__('messages.t_pending'), false); ?>

                                                </span>
                                                <?php break; ?>
                                            
                                            
                                            <?php case ('active'): ?>
                                                <span class="whitespace-nowrap inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-50 text-green-800 dark:bg-transparent dark:text-green-400">
                                                    <?php echo e(__('messages.t_active'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('rejected'): ?>
                                                <span class="whitespace-nowrap inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:bg-transparent dark:text-red-400">
                                                    <?php echo e(__('messages.t_needs_changes'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('deleted'): ?>
                                                <span class="whitespace-nowrap inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-pink-800 dark:bg-transparent dark:text-pink-400">
                                                    <?php echo e(__('messages.t_deleted'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('featured'): ?>
                                                <span class="whitespace-nowrap inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-purple-50 text-purple-800 dark:bg-transparent dark:text-purple-400">
                                                    <?php echo e(__('messages.t_featured'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('trending'): ?>
                                                <span class="whitespace-nowrap inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-blue-50 text-blue-800 dark:bg-transparent dark:text-blue-400">
                                                    <?php echo e(__('messages.t_trending'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('boosted'): ?>
                                                <span class="whitespace-nowrap inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-gray-50 text-gray-800 dark:bg-transparent dark:text-gray-300">
                                                    <?php echo e(__('messages.t_boosted'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            <?php default: ?>
                                                
                                        <?php endswitch; ?>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
        
                                            
                                            <?php if($gig->status === 'rejected' && $gig->rejection_reason): ?>
                                                <div>
                                                    <button id="modal-rejection-reason-button-<?php echo e($gig->uid, false); ?>" type="button" data-tooltip-target="tooltip-actions-rejection-<?php echo e($gig->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z"></path><path d="M11 6h2v8h-2zm0 10h2v2h-2z"></path></svg>
                                                    </button>
                                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-rejection-'.e($gig->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_rejection_reason'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                                </div>
                                            <?php endif; ?>
        
                                            
                                            <div>
                                                <a href="<?php echo e(url('seller/gigs/edit', $gig->uid), false); ?>" data-tooltip-target="tooltip-actions-edit-<?php echo e($gig->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                    <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                                </a>
                                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-edit-'.e($gig->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_edit'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                            </div>
        
                                            
                                            <div>
                                                <a href="<?php echo e(url('seller/gigs/analytics', $gig->uid), false); ?>" data-tooltip-target="tooltip-actions-analytics-<?php echo e($gig->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                    <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3 3v17a1 1 0 0 0 1 1h17v-2H5V3H3z"></path><path d="M15.293 14.707a.999.999 0 0 0 1.414 0l5-5-1.414-1.414L16 12.586l-2.293-2.293a.999.999 0 0 0-1.414 0l-5 5 1.414 1.414L13 12.414l2.293 2.293z"></path></svg>
                                                </a>
                                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-analytics-'.e($gig->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_analytics'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                            </div>
        
                                            
                                            <div>
                                                <button wire:click="confirmDelete('<?php echo e($gig->uid, false); ?>')" type="button" data-tooltip-target="tooltip-actions-delete-<?php echo e($gig->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                    <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                                </button>
                                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-delete-'.e($gig->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_delete'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                            </div>
                                                
                                        </div>
                                    </td>
        
                                </tr>
        
                                
                                <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-delete-gig-container-'.e($gig->uid, false).'','target' => 'modal-delete-gig-button-'.e($gig->uid, false).'','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>
        
                                    
                                     <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_delete'), false); ?> " <?php echo e($gig->title, false); ?> " <?php $__env->endSlot(); ?>
        
                                    
                                     <?php $__env->slot('content', null, []); ?> 
        
                                            
                                            <div class="whitespace-normal">
                                                <?php echo app('translator')->get('messages.t_delete_project_cat_confirm_msg'); ?>
                                            </div>
        
                                            
                                            <div>
                                                <button 
                                                    wire:click="delete(<?php echo e($gig->id, false); ?>)"
                                                    wire:loading.class="border-gray-200 bg-gray-200 text-gray-700 cursor-not-allowed"
                                                    wire:loading.class.remove="border-red-200 bg-red-200 text-red-700 hover:text-red-700 hover:bg-red-300 hover:border-red-300 active:bg-red-200 focus:ring-red-500"
                                                    wire:loading.attr="disabled" 
                                                    type="button" 
                                                    class="w-full inline-flex text-xs justify-center items-center border font-semibold focus:outline-none px-3 py-2 leading-5 rounded border-red-200 bg-red-200 text-red-700 hover:text-red-700 hover:bg-red-300 hover:border-red-300 active:bg-red-200 focus:ring-red-500 focus:ring focus:ring-opacity-50">
        
                                                    
                                                    <div wire:loading wire:target="delete(<?php echo e($gig->id, false); ?>)">
                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
        
                                                    
                                                    <div wire:loading.remove wire:target="delete(<?php echo e($gig->id, false); ?>)">
                                                        <?php echo app('translator')->get('messages.t_delete'); ?>
                                                    </div>
        
                                                </button>
                                            </div>
        
                                     <?php $__env->endSlot(); ?>
        
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
        
                                
                                <?php if($gig->status === 'rejected' && $gig->rejection_reason): ?>
                                    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-rejection-reason-container-'.e($gig->uid, false).'','target' => 'modal-rejection-reason-button-'.e($gig->uid, false).'','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>
        
                                        
                                         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_rejection_reason'), false); ?> <?php $__env->endSlot(); ?>
        
                                        
                                         <?php $__env->slot('content', null, []); ?> 
        
                                            
                                            <div class="text-sm text-gray-500 dark:text-zinc-300 leading-relaxed">
                                                <?php echo e($gig->rejection_reason, false); ?>

                                            </div>
        
                                         <?php $__env->endSlot(); ?>
        
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
                                <?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</thead>
					</table>
					<?php else: ?>
					    <div class="flex flex-col col-span-2 sm:flex-row justify-center px-5 py-5 mt-5 mb-4 text-gray-400 text-sm"><?php echo app('translator')->get('messages.no_results_found'); ?></div>
					<?php endif; ?>
                    
                <div>
            </div>
        </div>


    
    <?php if($gigs->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $gigs->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>
    
    </div>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/gigs/gigs.blade.php ENDPATH**/ ?>