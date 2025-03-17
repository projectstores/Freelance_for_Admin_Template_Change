<div class="w-full">

    
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
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-3">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        
                    </h2>
    
                    
                    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4 justify-between">
        
                    
					<span class="block">
                        <a href="<?php echo e(url('/'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_switch_to_buying'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="w-full">
            
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_offers'); ?></div>
                    
                    <?php if($offers && $offers->count()): ?>

                    <table class="w-full text-left border-spacing-y-[10px] border-separate sm:mt-2">
                        <thead class="">
                            <tr class="bg-slate-200 dark:bg-zinc-600">
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_employer'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_budget'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_offer_status'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_payment_status'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_options'); ?></th>
        
                            </tr>
                        </thead>
                        <thead>
                            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-offers-<?php echo e($offer->uid, false); ?>">
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
        
                                            
                                            <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($offer->buyer->avatar), false); ?>" alt="<?php echo e($offer->buyer->username, false); ?>" class="w-7 h-7 rounded-full object-cover lazy">
        
                                            
                                            <div class="flex items-center">
                                                <a href="<?php echo e(url('profile', $offer->buyer->username), false); ?>" target="_blank" class="font-bold whitespace-nowrap truncate block max-w-[240px] hover:text-zinc-900 dark:text-white text-base text-black0" title="<?php echo e($offer->buyer->username, false); ?>">
                                                    <?php echo e($offer->buyer->fullname ? $offer->buyer->fullname : $offer->buyer->username, false); ?>

                                                </a>
                                            </div>
        
                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div class="text-black dark:text-gray-100 text-sm font-black"><?php echo money($offer->budget_amount, settings('currency')->code, true); ?></div>
                                        <div class="text-xs text-gray-400 tracking-wide font-normal mt-1 whitespace-nowrap"><?php echo e(__('messages.t_number_days_for_delivery', ['number' => $offer->delivery_time]), false); ?></div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <?php switch($offer->freelancer_status):
        
                                            
                                            case ('pending'): ?>
                                                <div class="flex items-center flex-col">
                                                    <div class="bg-yellow-100 text-yellow-600 px-4 leading-9 h-9 rounded-3xl font-medium text-xs flex items-center space-x-3 rtl:space-x-reverse dark:bg-yellow-900 dark:text-yellow-400">
                                                        <span class="whitespace-nowrap"><?php echo app('translator')->get('messages.t_pending'); ?></span>
                                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
        
                                                            
                                                            <div>
        
                                                                
                                                                <button type="button" data-tooltip-target="tooltip-actions-approve-<?php echo e($offer->uid, false); ?>" id="modal-approve-offer-button-<?php echo e($offer->uid, false); ?>" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-yellow-50 text-yellow-600 hover:bg-transparent hover:border-yellow-600 dark:bg-yellow-600 dark:text-yellow-300 dark:hover:bg-transparent">
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
        
                                                                
                                                                <button type="button" data-tooltip-target="tooltip-actions-reject-<?php echo e($offer->uid, false); ?>" id="modal-reject-offer-button-<?php echo e($offer->uid, false); ?>" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-yellow-50 text-yellow-600 hover:bg-transparent hover:border-yellow-600 dark:bg-yellow-600 dark:text-yellow-300 dark:hover:bg-transparent">
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
                                            <?php break; ?>
        
                                            
                                            <?php case ('rejected'): ?>
                                                <span class="bg-red-100 text-red-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap dark:bg-red-900 dark:text-red-400">
                                                    <?php echo app('translator')->get('messages.t_rejected'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            
                                            <?php case ('approved'): ?>
                                                <span class="bg-blue-100 text-blue-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap dark:bg-blue-900 dark:text-blue-500">
                                                    <?php echo app('translator')->get('messages.t_accepted'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            
                                            <?php case ('completed'): ?>
                                                <span class="bg-green-100 text-green-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap dark:bg-green-900 dark:text-green-500">
                                                    <?php echo app('translator')->get('messages.t_completed'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            
                                            <?php case ('canceled'): ?>
                                                <span class="bg-zinc-100 text-zinc-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap dark:bg-zinc-700 dark:text-zinc-400">
                                                    <?php echo app('translator')->get('messages.t_canceled'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            <?php default: ?>
                                                
                                        <?php endswitch; ?>
                                    </td>
                                    
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <?php switch($offer->payment_status):
        
                                            
                                            case ('pending'): ?>
                                                <span class="bg-amber-100 text-amber-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap dark:bg-amber-900 dark:text-amber-500">
                                                    <?php echo app('translator')->get('messages.t_pending'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            
                                            <?php case ('funded'): ?>
                                                <span class="bg-violet-100 text-violet-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap dark:bg-violet-900 dark:text-violet-400">
                                                    <?php echo app('translator')->get('messages.t_funded'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            
                                            <?php case ('released'): ?>
                                                <span class="bg-green-100 text-green-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap dark:bg-green-900 dark:text-green-500">
                                                    <?php echo app('translator')->get('messages.t_released'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            <?php default: ?>
                                                
                                        <?php endswitch; ?>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
        
                                            
                                            <div>
                                                <button type="button" id="modal-offer-details-button-<?php echo e($offer->uid, false); ?>" data-tooltip-target="tooltip-actions-details-<?php echo e($offer->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                    <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2.165 19.551c.186.28.499.449.835.449h15c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 11h-1V7c0-1.103-.897-2-2-2h-6.1L9.616 3.213A.997.997 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14h.007a1 1 0 0 0 .158.551zM17.341 18H4.517l2.143-5h12.824l-2.143 5zM18 7v4H6c-.4 0-.762.238-.919.606L4 14.129V7h14z"></path></svg>
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
        
                                            
                                            <div>
                                                <a href="<?php echo e(url('messages/new', $offer->buyer->username), false); ?>" target="_blank" data-tooltip-target="tooltip-actions-chat-<?php echo e($offer->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                    <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z"></path><path d="M7 9h10v2H7zm0 4h7v2H7z"></path></svg>
                                                </a>
                                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-chat-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_chat_now'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                            </div>
        
                                            
                                            <?php if( in_array($offer->freelancer_status, ['completed', 'approved']) && in_array($offer->payment_status, ['funded', 'released']) ): ?>
                                                <div>
                                                    <button type="button" id="modal-offer-work-button-<?php echo e($offer->uid, false); ?>" data-tooltip-target="tooltip-actions-deliver-<?php echo e($offer->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11 15h2V9h3l-4-5-4 5h3z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>
                                                    </button>
                                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-deliver-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_send_a_file'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                                </div>
                                            <?php endif; ?>
        
                                            
                                            <?php if( $offer->freelancer_status === 'approved' && !$offer->isDelivered() && in_array($offer->payment_status, ['pending', 'funded']) ): ?>
                                                <div>
                                                    <button type="button" wire:click="confirmCancel('<?php echo e($offer->uid, false); ?>')" data-tooltip-target="tooltip-actions-cancel-<?php echo e($offer->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zM4 12c0-1.846.634-3.542 1.688-4.897l11.209 11.209A7.946 7.946 0 0 1 12 20c-4.411 0-8-3.589-8-8zm14.312 4.897L7.103 5.688A7.948 7.948 0 0 1 12 4c4.411 0 8 3.589 8 8a7.954 7.954 0 0 1-1.688 4.897z"></path></svg>
                                                    </button>
                                                    <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-cancel-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cancel_order'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                                
                                        </div>
                                    </td>
        
                                </tr>
        
                                
                                <?php if($offer->freelancer_status === 'pending'): ?>
                                    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-approve-offer-container-'.e($offer->uid, false).'','target' => 'modal-approve-offer-button-'.e($offer->uid, false).'','uid' => 'modal_approve_offer_'.e($offer->uid, false).'','placement' => 'center-center','size' => 'max-w-md']); ?>
        
                                        
                                         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_accept_offer'), false); ?> <?php $__env->endSlot(); ?>
        
                                        
                                         <?php $__env->slot('content', null, []); ?> 
                                            <div class="flex text-gray-500 font-normal text-sm dark:text-zinc-300"><?php echo app('translator')->get('messages.t_are_u_sure_accept_this_offer_freelancer'); ?></div>
                                            <div class="flex text-gray-500 font-normal text-sm dark:text-zinc-300">
                                                <?php echo app('translator')->get('messages.t_once_employer_adds_funds_start_working_on_his_order'); ?>
                                            </div>
                                         <?php $__env->endSlot(); ?>
        
                                        
                                         <?php $__env->slot('footer', null, []); ?> 
                                            <div class="flex justify-between items-center w-full">
        
                                                
                                                <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-200 dark:hover:bg-zinc-600">
                                                    <?php echo app('translator')->get('messages.t_cancel'); ?>
                                                </button>
        
                                                
                                                <button
                                                    type="button" 
                                                    wire:click="accept('<?php echo e($offer->uid, false); ?>')"
                                                    wire:loading.attr="disabled"
                                                    class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-green-500 text-white hover:bg-green-600 focus:ring focus:ring-green-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                                    
                                                    
                                                    <div wire:loading wire:target="accept('<?php echo e($offer->uid, false); ?>')">
                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
        
                                                    
                                                    <div wire:loading.remove wire:target="accept('<?php echo e($offer->uid, false); ?>')">
                                                        <?php echo app('translator')->get('messages.t_accept_offer'); ?>
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
                                <?php endif; ?>
        
                                
                                <?php if($offer->freelancer_status === 'pending'): ?>
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
                                
                                                    
                                                    <textarea wire:model.defer="reject_reason" id="bid-report-description-input" class="<?php echo e($errors->first('reject_reason') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300', false); ?> border text-black text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 placeholder:font-normal" rows="8" placeholder="<?php echo e(__('messages.t_enter_rejection_reason'), false); ?>" maxlength="1500"></textarea>
                                
                                                    
                                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
                                                        <svg class="w-5 h-5 text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z"></path><path d="M11 6h2v8h-2zm0 10h2v2h-2z"></path></svg>
                                                    </div>
                                
                                                </div>
                                
                                                
                                                <?php $__errorArgs = ['reject_reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                                                        <?php echo e($errors->first('reject_reason'), false); ?>

                                                    </p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
        
                                         <?php $__env->endSlot(); ?>
        
                                        
                                         <?php $__env->slot('footer', null, []); ?> 
                                            <div class="flex justify-between items-center w-full">
        
                                                
                                                <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-200 dark:hover:bg-zinc-600">
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
                                                        <?php echo app('translator')->get('messages.t_reject_offer'); ?>
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
        
                                        
                                        <div class="text-gray-500 text-sm leading-relaxed dark:text-zinc-300 whitespace-pre-line">
                                            <?php echo e($offer->message, false); ?>

                                        </div>
        
                                        
                                        <?php if($offer->attachments && $offer->attachments()->count()): ?>
                                                
                                            
                                            <div class="h-px bg-zinc-100 -mx-6 my-5 dark:bg-zinc-700"></div>
        
                                            
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
        
                                        <?php endif; ?>
        
                                     <?php $__env->endSlot(); ?>
        
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
        
                                
                                <?php if( in_array($offer->freelancer_status, ['completed', 'approved']) && in_array($offer->payment_status, ['funded', 'released']) ): ?>
                                    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-offer-work-container-'.e($offer->uid, false).'','target' => 'modal-offer-work-button-'.e($offer->uid, false).'','uid' => 'modal_offer_work_'.e($offer->uid, false).'','placement' => 'center-center','size' => 'max-w-xl']); ?>
        
                                        
                                         <?php $__env->slot('content', null, []); ?> 
        
                                            
                                            <button x-on:click="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-black rounded-lg text-sm p-1.5 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600 dark:hover:text-white absolute ltr:right-5 rtl:left-5">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                            </button>
        
                                            
                                            <div class="flex flex-col justify-center">
        
                                                
                                                <div class="text-center mb-10">
        
                                                    
                                                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center text-gray-400 mx-auto dark:bg-zinc-700 dark:text-zinc-300">
                                                        <svg class="w-8 h-8" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M18 15v3H6v-3H4v3c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-3h-2zM7 9l1.41 1.41L11 7.83V16h2V7.83l2.59 2.58L17 9l-5-5-5 5z"></path></svg>
                                                    </div>
                
                                                    
                                                    <h1 class="dark:text-zinc-200 font-bold pt-3 text-gray-600 text-sm">
                                                        <?php echo app('translator')->get('messages.t_send_a_file'); ?>
                                                    </h1>
        
                                                    
                                                    <p class="dark:text-zinc-400 font-normal max-w-sm mx-auto pt-1 text-[13px] text-gray-400 tracking-wide">
                                                        <?php echo app('translator')->get('messages.t_send_a_file_subtitle'); ?>
                                                    </p>
        
                                                </div>
        
                                                
                                                <div class="mb-4">
                                                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_type_notes')),'model' => 'notes','maxlength' => '500','svg_icon' => '<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1s-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7-.25c.41 0 .75.34.75.75s-.34.75-.75.75-.75-.34-.75-.75.34-.75.75-.75zM19 19H5V5h14v14z"></path><path d="M15.08 11.03l-2.12-2.12L7 14.86V17h2.1zM16.85 9.27c.2-.2.2-.51 0-.71l-1.41-1.41c-.2-.2-.51-.2-.71 0l-1.06 1.06 2.12 2.12 1.06-1.06z"></path></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                                                </div>
        
                                                
                                                <div class="w-full mb-6" wire:ignore>
                                                    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.attachments-form','data' => ['label' => __('messages.t_drag_attachments_here'),'model' => 'file','id' => 'uploader_attachments','extensions' => explode(',', settings('publish')->custom_offer_attachments_allowed_extensions),'size' => ''.e(settings('publish')->custom_offer_attachment_max_size, false).'','max' => '1']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.attachments-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_drag_attachments_here')),'model' => 'file','id' => 'uploader_attachments','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(explode(',', settings('publish')->custom_offer_attachments_allowed_extensions)),'size' => ''.e(settings('publish')->custom_offer_attachment_max_size, false).'','max' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                                                    <div class="mt-3 text-xs text-gray-400">
                                                        <?php echo app('translator')->get('messages.t_acceptable_file_types_are'); ?> &nbsp; <b><?php echo e(str_replace(',', ' | ', settings('publish')->custom_offer_attachments_allowed_extensions), false); ?></b>
                                                    </div>
                                                    <div class="mt-1 text-xs text-gray-400">
                                                        <?php echo app('translator')->get('messages.t_the_max_allowable_file_size_is'); ?> &nbsp; <b><?php echo e(settings('publish')->custom_offer_attachment_max_size, false); ?> <?php echo app('translator')->get('messages.t_size_mb'); ?></b>
                                                    </div>
                                                </div>
        
                                                
                                                <?php if($errors->has('attachments')): ?>
                                                    <div class="mb-5" wire:key='attachments-errors'>
                                                        <div class="flex p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                                                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 ltr:mr-3 rtl:ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                                            <span class="sr-only">Error</span>
                                                            <div>
                                                            <span class="font-medium"><?php echo app('translator')->get('messages.t_attachments_errors'); ?></span>
                                                                <ul class="mt-1.5 ltr:ml-4 rtl:mr-4 list-disc list-inside">
                                                                    <?php $__currentLoopData = $errors->get('attachments'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li wire:key="attachments-errors-item-<?php echo e($key, false); ?>"><?php echo e($error, false); ?></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
        
                                                
                                                <?php if($offer->freelancer_status !== 'completed'): ?>
                                                    <label class="relative inline-flex items-center cursor-pointer mb-5">
                                                        <input type="checkbox" wire:model.defer="is_completed" class="sr-only peer">
                                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary-300 dark:peer-focus:ring-primary-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-600"></div>
                                                        <span class="ltr:ml-3 rtl:mr-3 text-sm font-medium text-gray-600 dark:text-gray-300">
                                                            <?php echo app('translator')->get('messages.t_this_order_completed_and_this_is_final_work'); ?>
                                                        </span>
                                                    </label>
                                                <?php endif; ?>
        
                                                
                                                <div>
                                                    <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'sendFile(\''.e($offer->uid, false).'\')','text' => ''.e(__('messages.t_submit'), false).'','block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                                                </div>
        
                                            </div>
        
                                            
                                            <div class="h-px bg-zinc-100 -mx-6 !mb-10 dark:bg-zinc-700"></div>
        
                                            
                                            <?php if($offer->work && $offer->work()->count()): ?>
                                                <div class="w-full">
        
                                                    
                                                    <span class="block mb-3 font-semibold text-sm text-gray-700 tracking-wide dark:text-zinc-300"><?php echo app('translator')->get('messages.t_submitted_files'); ?></span>
        
                                                    
                                                    <div class="w-full space-y-3">
                                                        <?php $__currentLoopData = $offer->work; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            
                                                            <div class="border border-slate-200 dark:border-zinc-700 px-3 py-4 rounded-md">
                                                                <div class="flex items-center justify-between w-full" wire:key="seller-submitted-offer-files-<?php echo e($file->uid, false); ?>">
                                                                    <div class="flex items-center">
                                                                        <div class="fiv-sqo fiv-icon-<?php echo e($file->file_extension, false); ?> text-4xl"></div>
                                                                        <div class="ltr:pl-2 rtl:pr-2">
                                                                            <p tabindex="0" class="focus:outline-none text-sm font-medium leading-none text-gray-800 dark:text-zinc-300">
                                                                                <?php echo e($file->uid, false); ?>.<?php echo e($file->file_extension, false); ?>

                                                                            </p>
                                                                            <p tabindex="0" class="focus:outline-none text-xs leading-3 text-gray-500 dark:text-zinc-400 mt-2.5">
                                                                                <?php echo e($file->notes, false); ?>

                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="relative">
                                                                        <a href="<?php echo e(url('uploads/offers/work', $file->uid . '.' . $file->file_extension), false); ?>" class="focus:outline-none">
                                                                            <svg class="w-5 h-5 text-gray-400 hover:text-gray-700 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12 16 4-5h-3V4h-2v7H8z"></path><path d="M20 18H4v-7H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-2v7z"></path></svg>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
        
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
        
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
                    
                </div>
            </div>
        </div>
    </div>


    
    <?php if($offers->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $offers->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(url('public/js/plugins/file-icon-vectors/file-icon-vectors.min.css'), false); ?>" />
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/offers/offers.blade.php ENDPATH**/ ?>