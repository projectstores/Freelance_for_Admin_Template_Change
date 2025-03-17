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
    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    
                    <span class="block">
                        <a href="<?php echo e(url('/'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_switch_to_buying'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    
    <?php if(session()->has('message')): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
            <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm text-yellow-700 font-medium">
                            <?php echo e(session()->get('message'), false); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
    <div class="w-full">
            
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_orders'); ?></div>
                    
                    <?php if($orders && $orders->count()): ?>
                    
                    <table class="w-full text-left border-spacing-y-[10px] border-separate sm:mt-2">
                    <thead class="">
                        <tr class="bg-slate-200 dark:bg-zinc-600">
    
                            
                            <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_gig'); ?></th>
    
                            
                            <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_status'); ?></th>
    
                            
                            <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_profit'); ?></th>
    
                            
                            <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_buyer'); ?></th>
    
                            
                            <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_expected_delivery_date'); ?></th>
    
                            
                            <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_options'); ?></th>
    
                        </tr>
                    </thead>
                    <thead>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-orders-<?php echo e($order->uid, false); ?>">
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                    <div class="flex items-center space-x-3 rtl:space-x-reverse">
    
                                        
                                        <div class="h-10 w-10">
                                            <img class="w-full h-full rounded-md object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($order->gig?->thumbnail), false); ?>" alt="<?php echo e($order->gig?->title, false); ?>">
                                        </div>
    
                                        
                                        <div>
                                            
                                            
                                            <a href="<?php echo e(url('service', $order->gig->slug), false); ?>" class="font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-sm" title="<?php echo e($order->gig->title, false); ?>">
                                                <?php echo e($order->gig->title, false); ?>

                                            </a>
    
                                            
                                            <div class="text-slate-500 text-xs whitespace-nowrap mt-2">
                                                <nav class="flex" aria-label="Breadcrumb">
                                                    <ol role="list" class="flex items-center space-x-1 rtl:space-x-reverse">
                                                        
                                                        
                                                        <li>
                                                            <div class="flex items-center">
                                                                <a href="<?php echo e(url('categories', $order->gig->category->slug), false); ?>" target="_blank" class="text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100"><?php echo e($order->gig->category->name, false); ?></a>
                                                            </div>
                                                        </li>
                                                
                                                        
                                                        <li>
                                                            <div class="flex items-center">
    
                                                                
                                                                <svg class="flex-shrink-0 h-4 w-4 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>
    
                                                                <a href="<?php echo e(url('categories/' . $order->gig->category->slug . '/' . $order->gig->subcategory->slug), false); ?>" target="_blank" class="ltr:ml-1 rtl:mr-1 text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100" aria-current="page"><?php echo e($order->gig->subcategory->name, false); ?></a>
    
                                                            </div>
                                                        </li>
    
                                                    </ol>
                                                </nav>
                                            </div>
    
                                        </div>
    
                                    </div>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
    
                                    
                                    <?php if($order->refund && $order->refund->status === 'pending'): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:text-red-400 dark:bg-transparent">
                                            <?php echo e(__('messages.t_dispute_opened'), false); ?>

                                        </span>
                                    <?php elseif($order->order?->invoice && $order->order->invoice->status === 'pending'): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-amber-50 text-amber-800 dark:text-amber-400 dark:bg-transparent">
                                            <?php echo e(__('messages.t_pending_payment'), false); ?>

                                        </span>
                                    <?php elseif($order->status === 'delivered' && $order->is_finished): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-purple-50 text-purple-800 dark:text-green-400 dark:bg-transparent">
                                            <?php echo e(__('messages.t_completed'), false); ?>

                                        </span>
                                    <?php else: ?>
                                        <?php switch($order->status):
    
                                            
                                            case ('pending'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-yellow-50 text-yellow-800 dark:text-yellow-400 dark:bg-transparent">
                                                    <?php echo e(__('messages.t_pending'), false); ?>

                                                </span>
                                                <?php break; ?>
                                            
                                            
                                            <?php case ('delivered'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-50 text-green-800 dark:text-green-400 dark:bg-transparent">
                                                    <?php echo e(__('messages.t_delivered'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            
                                            <?php case ('refunded'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:text-red-400 dark:bg-transparent">
                                                    <?php echo e(__('messages.t_refunded'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            
                                            <?php case ('proceeded'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-blue-50 text-blue-800 dark:text-blue-400 dark:bg-transparent">
                                                    <?php echo e(__('messages.t_in_the_process'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            
                                            <?php case ('canceled'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-gray-50 text-gray-800 dark:text-gray-300 dark:bg-transparent">
                                                    <?php echo e(__('messages.t_canceled'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            <?php default: ?>
                                                
                                        <?php endswitch; ?>
                                    <?php endif; ?>
                                    
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <div class="text-gray-900 dark:text-gray-100 text-sm font-black">
                                        <?php echo money($order->profit_value, settings('currency')->code, true); ?>
                                    </div>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <a href="<?php echo e(url('profile', $order->order?->buyer->username), false); ?>" target="_blank" class="text-gray-900 hover:text-primary-600 dark:text-gray-100 text-sm font-medium">
                                        <?php echo e($order->order?->buyer->username, false); ?>

                                    </a>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <?php if($order->expected_delivery_date): ?>
                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                            <?php echo e(format_date($order->expected_delivery_date, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?>

                                        </span>
                                    <?php elseif(in_array($order->status, ['pending', 'proceeded']) && !$order->is_requirements_sent): ?>
                                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                            <?php echo e(__('messages.t_waiting_for_requirements'), false); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="text-2xl font-medium text-gray-500 dark:text-gray-400">-</span>
                                    <?php endif; ?>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
    
                                        
                                        <?php if($order->status === 'pending' && $order->order?->invoice && $order->order->invoice->status !== 'pending'): ?>
                                            <button wire:click="confirmProgress('<?php echo e($order->uid, false); ?>')" type="button" data-tooltip-target="tooltip-actions-get-started-<?php echo e($order->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-primary-300 bg-primary-100/20 text-primary-700 shadow-sm hover:text-white hover:bg-primary-400 hover:border-primary-400 hover:shadow focus:ring focus:ring-primary-400 focus:ring-opacity-25 active:bg-primary-500 active:border-primary-500 active:shadow-none" wire:key="tooltip-actions-get-started-<?php echo e($order->uid, false); ?>">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.92 2.38A15.72 15.72 0 0 0 17.5 2a8.26 8.26 0 0 0-6 2.06Q9.89 5.67 8.31 7.27c-1.21-.13-4.08-.2-6 1.74a1 1 0 0 0 0 1.41l11.3 11.32a1 1 0 0 0 1.41 0c1.95-2 1.89-4.82 1.77-6l3.21-3.2c3.19-3.19 1.74-9.18 1.68-9.43a1 1 0 0 0-.76-.73zm-2.36 8.75L15 14.67a1 1 0 0 0-.27.9 6.81 6.81 0 0 1-.54 3.94L4.52 9.82a6.67 6.67 0 0 1 4-.5A1 1 0 0 0 9.39 9s1.4-1.45 3.51-3.56A6.61 6.61 0 0 1 17.5 4a14.51 14.51 0 0 1 2.33.2c.24 1.43.62 5.04-1.27 6.93z"></path><circle cx="15.73" cy="8.3" r="2"></circle><path d="M5 16c-2 1-2 5-2 5a7.81 7.81 0 0 0 5-2z"></path></svg>
                                            </button>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-get-started-'.e($order->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_get_started'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                        
                                        <?php if($order->requirements()->count()): ?>
                                            <a href="<?php echo e(url('seller/orders/requirements', $order->uid), false); ?>" data-tooltip-target="tooltip-actions-view-requirements-<?php echo e($order->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-view-requirements-<?php echo e($order->uid, false); ?>">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.004 5H9c-1.838 0-3.586.737-4.924 2.076C2.737 8.415 2 10.163 2 12c0 1.838.737 3.586 2.076 4.924C5.414 18.263 7.162 19 9 19h8v-2H9c-1.303 0-2.55-.529-3.51-1.49C4.529 14.55 4 13.303 4 12c0-1.302.529-2.549 1.49-3.51C6.45 7.529 7.697 7 9 7h8V6l.001 1h.003c.79 0 1.539.314 2.109.886.571.571.886 1.322.887 2.116a2.966 2.966 0 0 1-.884 2.11A2.988 2.988 0 0 1 17 13H9a.99.99 0 0 1-.698-.3A.991.991 0 0 1 8 12c0-.252.11-.507.301-.698A.987.987 0 0 1 9 11h8V9H9c-.79 0-1.541.315-2.114.889C6.314 10.461 6 11.211 6 12s.314 1.54.888 2.114A2.974 2.974 0 0 0 9 15h8.001a4.97 4.97 0 0 0 3.528-1.473 4.967 4.967 0 0 0-.001-7.055A4.95 4.95 0 0 0 17.004 5z"></path></svg>
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-view-requirements-'.e($order->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_view_requirements'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                        
                                        <?php if(in_array($order->status, ['proceeded', 'delivered']) && !$order->is_finished): ?>
                                            <a href="<?php echo e(url('seller/orders/deliver', $order->uid), false); ?>" data-tooltip-target="tooltip-actions-deliver-work-<?php echo e($order->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-deliver-work-<?php echo e($order->uid, false); ?>">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.56,3.34a1,1,0,0,0-1-.08l-17,8a1,1,0,0,0-.57.92,1,1,0,0,0,.6.9L8,15.45v6.72L13.84,18l4.76,2.08a.93.93,0,0,0,.4.09,1,1,0,0,0,.52-.15,1,1,0,0,0,.48-.79l1-15A1,1,0,0,0,20.56,3.34ZM18.1,17.68l-5.27-2.31L16,9.17,8.35,13.42,5.42,12.13,18.89,5.79Z"></path></svg>
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-deliver-work-'.e($order->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_deliver_work'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                        
                                        <a href="<?php echo e(url('messages/new', $order->order?->buyer->username), false); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($order->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($order->uid, false); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20 4H4c-1.103 0-2 .897-2 2v12c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zm0 2v.511l-8 6.223-8-6.222V6h16zM4 18V9.044l7.386 5.745a.994.994 0 0 0 1.228 0L20 9.044 20.002 18H4z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($order->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
    
                                        
                                        <a href="<?php echo e(url('seller/orders/details', $order->uid), false); ?>" data-tooltip-target="tooltip-actions-order-details-<?php echo e($order->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-order-details-<?php echo e($order->uid, false); ?>">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                        </a>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-order-details-'.e($order->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_order_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
    
                                        
                                        <?php if($order->refund): ?>
                                            <a href="<?php echo e(url('seller/refunds/details', $order->refund->uid), false); ?>" data-tooltip-target="tooltip-actions-view-refund-<?php echo e($order->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-view-refund-<?php echo e($order->uid, false); ?>">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-view-refund-'.e($order->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_refund_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                        
                                        <?php if($order->status === 'pending' && $order->order?->invoice && $order->order->invoice->status !== 'pending'): ?>
                                            <button wire:click="confirmCancel('<?php echo e($order->uid, false); ?>')" type="button" data-tooltip-target="tooltip-actions-cancel-order-<?php echo e($order->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-red-300 bg-red-100 text-red-700 shadow-sm hover:text-white hover:bg-red-400 hover:border-red-400 hover:shadow focus:ring focus:ring-red-400 focus:ring-opacity-25 active:bg-red-500 active:border-red-500 active:shadow-none" wire:key="tooltip-actions-cancel-order-<?php echo e($order->uid, false); ?>">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M7 11h10v2H7z"></path><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path></svg>
                                            </button>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-cancel-order-'.e($order->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_cancel_order'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                    </div>
                                </td>
    
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </thead>
            </table>
					<?php else: ?>
					    <div class="flex flex-col col-span-2 sm:flex-row justify-center px-5 py-5 mt-5 mb-4 text-gray-400 text-sm"><?php echo app('translator')->get('messages.no_results_found'); ?></div>
					<?php endif; ?>
                    
                <div>
            </div>
        </div>

    </div>
</div>


    
    <?php if($orders->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $orders->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/orders/orders.blade.php ENDPATH**/ ?>