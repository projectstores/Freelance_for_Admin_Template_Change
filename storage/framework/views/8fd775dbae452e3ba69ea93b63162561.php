<div class="w-full" x-data="window.qJEjXlEwngQOsVK">

    
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.loading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    
    
    <div class="mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        <?php echo app('translator')->get('messages.t_offers'); ?>
                    </h2>
    
                    
                    <div class="mt-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
                        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                            
                            <li>
                                <div class="flex items-center">
                                    <a href="<?php echo e(url('/'), false); ?>" class="text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-zinc-300 dark:hover:text-white">
                                        <?php echo app('translator')->get('messages.t_home'); ?>
                                    </a>
                                </div>
                            </li>
            
                            
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="<?php echo e(admin_url('/'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                        <?php echo app('translator')->get('messages.t_dashboard'); ?>
                                    </a>
                                </div>
                            </li>
            
                            
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        <?php echo app('translator')->get('messages.t_offers'); ?>
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    
                    <span class="">
                        <a href="<?php echo e(admin_url('settings/publish'), false); ?>" class="relative inline-flex items-center px-4 py-3 border border-gray-300 dark:border-zinc-600 dark:hover:bg-zinc-700 dark:text-gray-200 bg-white dark:bg-zinc-800 text-[13px] font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600 shadow-sm rounded">
                            <?php echo app('translator')->get('messages.t_settings'); ?>
                        </a>
                    </span>

                </div>
    
            </div>
        </div>
    </div>

    
    <div class="w-full">
        <div class="mt-8 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
            <table class="w-full text-left border-spacing-y-[10px] border-separate -mt-2">
                <thead class="">
                    <tr class="bg-slate-200 dark:bg-zinc-600">

                        
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right"><?php echo app('translator')->get('messages.t_employer'); ?></th>

                        
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right"><?php echo app('translator')->get('messages.t_freelancer'); ?></th>

                        
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_budget'); ?></th>

                        
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_status'); ?></th>

                        
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_date'); ?></th>
                        
                        
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"><?php echo app('translator')->get('messages.t_options'); ?></th>
                        
                    </tr>
                </thead>
                <thead>
                    <?php $__empty_1 = true; $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-dashboard-offers-<?php echo e($offer->uid, false); ?>">

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-96 rtl:text-right">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <img class="w-10 h-10 rounded-md object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($offer->buyer->avatar), false); ?>" alt="<?php echo e($offer->buyer->username, false); ?>">
                                    <div class="space-y-1 font-medium dark:text-white">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                            
                                            <a href="<?php echo e(url('profile', $offer->buyer->username), false); ?>" target="_blank" class="font-bold whitespace-nowrap truncate block max-w-[240px] hover:text-zinc-900 dark:text-white text-sm text-zinc-700" title="<?php echo e($offer->buyer->username, false); ?>">
                                                <?php echo e($offer->buyer->fullname ? $offer->buyer->fullname : $offer->buyer->username, false); ?>

                                            </a>

                                        </div>
                                        <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs font-normal text-gray-400 dark:text-zinc-300">
                
                                            
                                            <a href="<?php echo e(admin_url('users/details/' . $offer->buyer->uid), false); ?>" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                <?php echo app('translator')->get('messages.t_user_details'); ?>   
                                            </a>
                        
                                            
                                            <div class="mx-2 my-0.5 text-gray-200 dark:text-zinc-600">|</div>

                                            
                                            <a href="<?php echo e(url('profile', $offer->buyer->username), false); ?>" target="_blank" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                <?php echo app('translator')->get('messages.t_view_profile'); ?>    
                                            </a>
                        
                                        </div>
                                    </div>
                                </div>
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-96 rtl:text-right">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <img class="w-10 h-10 rounded-md object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($offer->freelancer->avatar), false); ?>" alt="<?php echo e($offer->freelancer->username, false); ?>">
                                    <div class="space-y-1 font-medium dark:text-white">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                            
                                            <a href="<?php echo e(url('profile', $offer->freelancer->username), false); ?>" target="_blank" class="font-bold whitespace-nowrap truncate block max-w-[240px] hover:text-zinc-900 dark:text-white text-sm text-zinc-700" title="<?php echo e($offer->freelancer->username, false); ?>">
                                                <?php echo e($offer->freelancer->fullname ? $offer->freelancer->fullname : $offer->freelancer->username, false); ?>

                                            </a>

                                            
                                            <?php if($offer->freelancer->status === 'verified'): ?>
                                                <div>
                                                    <svg data-popover-target="popover-profile-verified-<?php echo e($offer->uid, false); ?>" data-popover-placement="<?php echo e(config()->get('direction') ===  'ltr' ? 'right' : 'left', false); ?>" class="-mt-0.5 h-4 text-blue-500 w-4" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path></svg>
                                                    <div data-popover id="popover-profile-verified-<?php echo e($offer->uid, false); ?>" role="tooltip" class="absolute z-[99] invisible inline-block w-64 text-xs tracking-wide text-gray-600 transition-opacity duration-300 bg-gray-50 border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800 leading-relaxed">
                                                        <div class="px-3 py-2">
                                                            <p><?php echo app('translator')->get('messages.t_this_freelancer_id_has_verified_gov_id_check_tooltip'); ?></p>
                                                        </div>
                                                        <div data-popper-arrow></div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>

                                        </div>
                                        <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs font-normal text-gray-400 dark:text-zinc-300">
                
                                            
                                            <a href="<?php echo e(admin_url('users/details/' . $offer->freelancer->uid), false); ?>" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                <?php echo app('translator')->get('messages.t_user_details'); ?>   
                                            </a>
                        
                                            
                                            <div class="mx-2 my-0.5 text-gray-200 dark:text-zinc-600">|</div>

                                            
                                            <a href="<?php echo e(url('profile', $offer->freelancer->username), false); ?>" target="_blank" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                <?php echo app('translator')->get('messages.t_view_profile'); ?>    
                                            </a>
                        
                                        </div>
                                    </div>
                                </div>
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-900 dark:text-gray-100 text-sm font-black"><?php echo money($offer->budget_amount, settings('currency')->code, true); ?></div>
                                <div class="text-xs text-gray-400 tracking-wide font-normal mt-1 whitespace-nowrap"><?php echo e(__('messages.t_number_days_for_delivery', ['number' => $offer->delivery_time]), false); ?></div>
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">

                                
                                <?php if($offer->admin_status === 'pending'): ?>
                                    <div class="flex items-center flex-col">
                                        <div class="bg-yellow-100 text-yellow-600 px-4 leading-9 h-9 rounded-3xl font-medium text-xs flex items-center space-x-3 rtl:space-x-reverse">
                                            <span class="whitespace-nowrap"><?php echo app('translator')->get('messages.t_pending_approval'); ?></span>
                                            <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                                
                                                <div>

                                                    
                                                    <button type="button" data-tooltip-target="tooltip-actions-approve-<?php echo e($offer->uid, false); ?>" id="modal-approve-offer-button-<?php echo e($offer->uid, false); ?>" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-white text-yellow-600 hover:bg-transparent hover:border-yellow-600">
                                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path></g></svg>
                                                    </button>

                                                    
                                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-approve-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_approve'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>

                                                </div>

                                                
                                                <div>

                                                    
                                                    <button type="button" data-tooltip-target="tooltip-actions-reject-<?php echo e($offer->uid, false); ?>" id="modal-reject-offer-button-<?php echo e($offer->uid, false); ?>" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-white text-yellow-600 hover:bg-transparent hover:border-yellow-600">
                                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path></g></svg>
                                                    </button>

                                                    
                                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-reject-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reject'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php elseif($offer->admin_status === 'rejected'): ?>
                                    <span class="bg-red-100 text-red-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        <?php echo app('translator')->get('messages.t_needs_changes'); ?>
                                    </span>
                                <?php elseif($offer->freelancer_status === 'pending'): ?>
                                    <span class="bg-amber-100 text-amber-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        <?php echo app('translator')->get('messages.t_pending_freelancer_approval'); ?>
                                    </span>
                                <?php elseif($offer->freelancer_status === 'approved'): ?>
                                    <span class="bg-blue-100 text-blue-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        <?php echo app('translator')->get('messages.t_in_progress'); ?>
                                    </span>
                                <?php elseif($offer->freelancer_status === 'rejected'): ?>
                                    <span class="bg-pink-100 text-pink-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        <?php echo app('translator')->get('messages.t_freelancer_rejected_offer'); ?>
                                    </span>
                                <?php elseif($offer->freelancer_status === 'completed'): ?>
                                    <span class="bg-green-100 text-green-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        <?php echo app('translator')->get('messages.t_completed'); ?>
                                    </span>
                                <?php elseif($offer->freelancer_status === 'canceled'): ?>
                                    <span class="bg-zinc-100 text-zinc-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        <?php echo app('translator')->get('messages.t_canceled'); ?>
                                    </span>
                                <?php endif; ?>
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-600 dark:text-gray-100 text-sm font-medium whitespace-nowrap">
                                    <?php echo e(format_date($offer->created_at), false); ?>

                                </div>
                            </td>

                            
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">

                                    
                                    <div>
                                        <button type="button" id="modal-offer-details-button-<?php echo e($offer->uid, false); ?>" data-tooltip-target="tooltip-actions-details-<?php echo e($offer->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-details-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_offer_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    </div>

                                    
                                    <?php if($offer->freelancer_status === 'completed' && $offer->payment_status === 'funded'): ?>
                                        <div>
                                            <button type="button" wire:click="confirmRelease('<?php echo e($offer->uid, false); ?>')" data-tooltip-target="tooltip-actions-release-payment-<?php echo e($offer->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                                            </button>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-release-payment-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_release_payment'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <div>
                                        <button type="button" wire:click="confirmDelete('<?php echo e($offer->uid, false); ?>')" data-tooltip-target="tooltip-actions-delete-payment-<?php echo e($offer->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-delete-payment-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_delete_offer'))]); ?>
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
<?php $component->withAttributes(['id' => 'modal-approve-offer-container-'.e($offer->uid, false).'','target' => 'modal-approve-offer-button-'.e($offer->uid, false).'','uid' => 'modal_approve_offer_'.e($offer->uid, false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

                            
                             <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_approve_offer'), false); ?> <?php $__env->endSlot(); ?>

                            
                             <?php $__env->slot('content', null, []); ?> 
                                <div class="flex text-gray-500 font-normal text-sm"><?php echo app('translator')->get('messages.t_are_u_sure_approve_offer_admin'); ?></div>
                             <?php $__env->endSlot(); ?>

                            
                             <?php $__env->slot('footer', null, []); ?> 
                                <div class="flex justify-between items-center w-full">

                                    
                                    <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <?php echo app('translator')->get('messages.t_cancel'); ?>
                                    </button>

                                    
                                    <button
                                        type="button" 
                                        wire:click="approve('<?php echo e($offer->uid, false); ?>')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-green-500 text-white hover:bg-green-600 focus:ring focus:ring-green-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        
                                        <div wire:loading wire:target="approve('<?php echo e($offer->uid, false); ?>')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        
                                        <div wire:loading.remove wire:target="approve('<?php echo e($offer->uid, false); ?>')">
                                            <?php echo app('translator')->get('messages.t_approve'); ?>
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

                        
                        <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-reject-offer-container-'.e($offer->uid, false).'','target' => 'modal-reject-offer-button-'.e($offer->uid, false).'','uid' => 'modal_reject_offer_'.e($offer->uid, false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

                            
                             <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_reject_offer'), false); ?> <?php $__env->endSlot(); ?>

                            
                             <?php $__env->slot('content', null, []); ?> 

                                
                                <div class="w-fill mb-6">
                                    
                                    <div class="relative w-full shadow-sm">
                    
                                        
                                        <textarea wire:model.defer="rejection_reason" id="bid-report-description-input" class="<?php echo e($errors->first('rejection_reason') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300', false); ?> border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 placeholder:font-normal" rows="8" placeholder="<?php echo e(__('messages.t_enter_rejection_reason'), false); ?>"></textarea>
                    
                                        
                                        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
                                            <svg class="w-5 h-5 text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z"></path><path d="M11 6h2v8h-2zm0 10h2v2h-2z"></path></svg>
                                        </div>
                    
                                    </div>
                    
                                    
                                    <?php $__errorArgs = ['rejection_reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                                            <?php echo e($errors->first('rejection_reason'), false); ?>

                                        </p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>

                             <?php $__env->endSlot(); ?>

                            
                             <?php $__env->slot('footer', null, []); ?> 
                                <div class="flex justify-between items-center w-full">

                                    
                                    <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <?php echo app('translator')->get('messages.t_cancel'); ?>
                                    </button>

                                    
                                    <button
                                        type="button" 
                                        wire:click="reject('<?php echo e($offer->uid, false); ?>')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-red-500 text-white hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        
                                        <div wire:loading wire:target="reject('<?php echo e($offer->uid, false); ?>')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        
                                        <div wire:loading.remove wire:target="reject('<?php echo e($offer->uid, false); ?>')">
                                            <?php echo app('translator')->get('messages.t_reject'); ?>
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

                        
                        <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-offer-details-container-'.e($offer->uid, false).'','target' => 'modal-offer-details-button-'.e($offer->uid, false).'','uid' => 'modal_offer_details_'.e($offer->uid, false).'','placement' => 'center-center','size' => 'max-w-xl']); ?>

                            
                             <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_offer_details'), false); ?> <?php $__env->endSlot(); ?>

                            
                             <?php $__env->slot('content', null, []); ?> 
                                <div class="w-full divide-y divide-gray-300 space-y-8">
                                    
                                    
                                    <div class="w-full">
                                        <span class="mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_offer'); ?></span>
                                        <div class="text-gray-400 text-sm leading-relaxed dark:text-zinc-300">
                                            <?php echo e($offer->message, false); ?>

                                        </div>
                                    </div>

                                    
                                    <?php if($offer->admin_rejection_reason): ?>
                                        <div class="w-full">
                                            <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_admin_rejection_reason'); ?></span>
                                            <span class="text-slate-500 text-sm">
                                                <?php echo e($offer->admin_rejection_reason, false); ?>   
                                            </span>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if($offer->freelancer_rejection_reason): ?>
                                        <div class="w-full">
                                            <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_freelancer_rejection_reason'); ?></span>
                                            <span class="text-slate-500 text-sm">
                                                <?php echo e($offer->freelancer_rejection_reason, false); ?>   
                                            </span>
                                        </div>
                                    <?php endif; ?>
    
                                    
                                    <div class="w-full">
                                        <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_payment_status'); ?></span>
                                        <?php if($offer->payment_status === 'pending'): ?>
                                            <span class="bg-orange-100 text-orange-600 px-6 inline-block leading-9 h-9 rounded-sm font-medium text-xs whitespace-nowrap">
                                                <?php echo app('translator')->get('messages.t_pending'); ?>
                                            </span>
                                        <?php elseif($offer->payment_status === 'funded'): ?>
                                            <span class="bg-indigo-100 text-indigo-600 px-6 inline-block leading-9 h-9 rounded-sm font-medium text-xs whitespace-nowrap">
                                                <?php echo app('translator')->get('messages.t_funded'); ?>
                                            </span>
                                        <?php else: ?>
                                            <span class="bg-purple-100 text-purple-600 px-6 inline-block leading-9 h-9 rounded-sm font-medium text-xs whitespace-nowrap">
                                                    <?php echo app('translator')->get('messages.t_released'); ?>
                                                </span>
                                        <?php endif; ?>
                                    </div>

                                    
                                    <div class="w-full">
                                        <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_commission_from_freelancer'); ?></span>
                                        <span class="font-bold text-zinc-700 text-sm">
                                            <?php echo money($offer->budget_freelancer_fee, settings('currency')->code, true); ?>    
                                        </span>
                                    </div>

                                    
                                    <div class="w-full">
                                        <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_commission_from_employer'); ?></span>
                                        <span class="font-bold text-zinc-700 text-sm">
                                            <?php echo money($offer->budget_buyer_fee, settings('currency')->code, true); ?>    
                                        </span>
                                    </div>
    
                                    
                                    <?php if($offer->attachments && $offer->attachments()->count()): ?>
                                        <div class="w-full">
                                            
                                            
                                            <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_attachments'); ?></span>
        
                                            
                                            <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200 dark:divide-zinc-700 dark:border-zinc-700">
                            
                                                <?php $__currentLoopData = $offer->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="flex items-center justify-between py-3 ltr:pl-3 ltr:pr-4 rtl:pr-3 rtl:pl-4 text-sm">
                                                        <div class="flex w-0 flex-1 items-center">
                                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-300 -mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12 16 4-5h-3V4h-2v7H8z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>
                                                            <span class="ltr:ml-2 rtl:mr-2 w-0 flex-1 truncate text-[13px] text-gray-500 dark:text-gray-300">
                                                                <?php echo e($attachment->uid, false); ?>.<?php echo e($attachment->file_extension, false); ?>

                                                            </span>
                                                        </div>
                                                        <div class="ml-4 flex-shrink-0">
                                                            <a href="<?php echo e(url('uploads/offers', $attachment->uid . '.' . $attachment->file_extension), false); ?>" class="font-medium text-blue-600 hover:text-blue-500">
                                                                <?php echo app('translator')->get('messages.t_download'); ?>
                                                            </a>
                                                        </div>
                                                    </li>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                
                                            </ul>
    
                                        </div>
                                    <?php endif; ?>
    
                                    
                                    <?php if($offer->work && $offer->work()->count()): ?>
                                        <div class="w-full">
                                                
                                            
                                            <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_delivered_work'); ?></span>
    
                                            
                                            <?php $__currentLoopData = $offer->work()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="mt-6 flex" wire:key="employer-delivered-work-<?php echo e($file->uid, false); ?>">
    
                                                    <div class="w-10 flex flex-col items-center">
                                                        
                                                        
                                                        <div class="fiv-sqo fiv-icon-<?php echo e($file->file_extension, false); ?> text-4xl"></div>
    
                                                        <div class="pt-4">
                                                            <svg class="text-gray-400 dark:text-zinc-600" width="1" height="40" viewBox="0 0 1 47" fill="none" xmlns="http://www.w3.org/2000/svg"> <line x1="0.5" y1="2.18557e-08" x2="0.499998" y2="47" stroke="currentColor" stroke-dasharray="2 2"></line> </svg>
                                                        </div>
    
                                                    </div>
    
                                                    
                                                    <div class="ltr:pl-3 rtl:pr-3">
    
                                                        
                                                        <p class="focus:outline-none text-sm font-semibold leading-normal text-gray-800 pb-1 -mt-1 dark:text-zinc-200">
                                                            <?php echo e($file->uid, false); ?>.<?php echo e($file->file_extension, false); ?>

                                                        </p>
    
                                                        
                                                        <div class="focus:outline-none text-xs leading-3 text-gray-500 pt-1 space-x-2 rtl:space-x-reverse dark:text-zinc-400">
                                                            
                                                            
                                                            <a href="<?php echo e(url('uploads/offers/work', $file->uid . '.' . $file->file_extension), false); ?>" class="text-primary-600 hover:underline"><?php echo app('translator')->get('messages.t_download'); ?></a>
    
                                                            
                                                            <span class="text-gray-300 dark:text-zinc-600" aria-hidden="true">|</span>
    
                                                            
                                                            <span><?php echo e(format_date($file->created_at), false); ?></span>
    
                                                        </div>
    
                                                        
                                                        <p class="focus:outline-none pt-4 text-sm leading-4 text-gray-600 whitespace-pre-line dark:text-zinc-200">
                                                            <?php echo e($file->notes, false); ?>

                                                        </p>
                                                    </div>
    
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if($offer->delivered_at): ?>
                                        <div class="w-full">
                                            <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_delivered_date'); ?></span>
                                            <span class="text-gray-400 text-sm"><?php echo e(format_date($offer->delivered_at, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    
                                    <?php if($offer->canceled_at): ?>
                                        <div class="w-full">
                                            <span class="mt-8 mb-2 block text-sm font-bold tracking-wide text-zinc-700"><?php echo app('translator')->get('messages.t_cancellation_date'); ?></span>
                                            <span class="text-gray-400 text-sm"><?php echo e(format_date($offer->canceled_at, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?></span>
                                        </div>
                                    <?php endif; ?>

                                </div>
                             <?php $__env->endSlot(); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                <?php echo app('translator')->get('messages.t_no_results_found'); ?>
                            </td>
                        </tr>
                    <?php endif; ?>
                </thead>
            </table>
        </div>
    </div>

    
    <?php if($offers->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $offers->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function qJEjXlEwngQOsVK() {
            return {

                // Read rejection reason
                rejection(text) {
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_rejection_reason'), false); ?>",
                        description: text,
                        icon       : 'error'
                    })
                }

            }
        }
        window.qJEjXlEwngQOsVK = qJEjXlEwngQOsVK();
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(url('public/js/plugins/file-icon-vectors/file-icon-vectors.min.css'), false); ?>" />
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/livewire/admin/offers/offers.blade.php ENDPATH**/ ?>