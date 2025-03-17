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

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="w-full">
            
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_refunds'); ?></div>
                    
                    <?php if($refunds && $refunds->count()): ?>
                    <table class="w-full text-left border-spacing-y-[10px] border-separate sm:mt-2">
                        <thead class="">
                            <tr class="bg-slate-200 dark:bg-zinc-600">
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_item'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_buyer'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_status'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_date'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_options'); ?></th>
        
                            </tr>
                        </thead>
                        <thead>
                            <?php $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-refunds-<?php echo e($refund->uid, false); ?>">
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
        
                                            
                                            <div class="h-10 w-10">
                                                <img class="w-full h-full rounded-md object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($refund->item->gig->thumbnail), false); ?>" alt="<?php echo e($refund->item->gig->title, false); ?>">
                                            </div>
        
                                            
                                            <div>
                                                
                                                
                                                <a href="<?php echo e(url('service', $refund->item->gig->slug), false); ?>" class="font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-base text-black" title="<?php echo e($refund->item->gig->title, false); ?>">
                                                    <?php echo e($refund->item->gig->title, false); ?>

                                                </a>
        
                                                
                                                <div class="whitespace-nowrap mt-2">
                                                    <div class="font-black text-black dark:text-gray-200 text-[13px]">
                                                        <?php echo money($refund->item->profit_value, settings('currency')->code, true); ?>
                                                    </div>
                                                </div>
        
                                            </div>
        
                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-44 rtl:text-right">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full lazy object-cover object-center" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($refund->buyer->avatar), false); ?>" alt="<?php echo e($refund->buyer->username, false); ?>">
                                            </div>
                                            <div class="ltr:ml-4 rtl:mr-4">
                                                <a href="<?php echo e(url('profile', $refund->buyer->username), false); ?>" target="_blank" class="font-medium text-gray-900 dark:text-gray-200 pb-1 hover:text-primary-600 block text-sm"><?php echo e($refund->buyer->username, false); ?></a>
                                                <div class="font-normal text-gray-500 dark:text-gray-300 text-xs">
                                                    <?php if($refund->buyer->fullname): ?>
                                                        <?php echo e($refund->buyer->fullname, false); ?>

                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <?php switch($refund->status):
        
                                            
                                            case ('pending'): ?>
                                                <span class="px-2.5 py-1 rounded-sm text-xs font-medium dark:bg-transparent text-amber-500 bg-amber-50">
                                                    <?php echo e(__('messages.t_pending'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('closed'): ?>
                                                <span class="px-2.5 py-1 rounded-sm text-xs font-medium dark:bg-transparent text-gray-500 bg-gray-50">
                                                    <?php echo e(__('messages.t_closed'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('rejected_by_seller'): ?>
                                                <span class="px-2.5 py-1 rounded-sm text-xs font-medium dark:bg-transparent text-red-500 bg-red-50">
                                                    <?php echo e(__('messages.t_declined_by_seller'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('rejected_by_admin'): ?>
                                                <span class="px-2.5 py-1 rounded-sm text-xs font-medium dark:bg-transparent text-red-500 bg-red-50">
                                                    <?php echo e(__('messages.t_declined_by_admin', ['app_name' => config('app.name')]), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('accepted_by_seller'): ?>
                                                <span class="px-2.5 py-1 rounded-sm text-xs font-medium dark:bg-transparent text-green-500 bg-green-50">
                                                    <?php echo e(__('messages.t_approved_by_seller'), false); ?>

                                                </span>
                                                <?php break; ?>
        
                                            
                                            <?php case ('accepted_by_admin'): ?>
                                                <span class="px-2.5 py-1 rounded-sm text-xs font-medium dark:bg-transparent text-green-500 bg-green-50">
                                                    <?php echo e(__('messages.t_approved_by_admin', ['app_name' => config('app.name')]), false); ?>

                                                </span>
                                                <?php break; ?>
                                                
                                        <?php endswitch; ?>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <span class="text-[13px] font-medium text-gray-700 dark:text-gray-400">
                                            <?php echo e(format_date($refund->created_at, 'ago'), false); ?>

                                        </span>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
        
                                            
                                            <a href="<?php echo e(url('messages/new', $refund->item->order->buyer->username), false); ?>" target="_blank" data-tooltip-target="tooltip-actions-contact-buyer-<?php echo e($refund->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-contact-buyer-<?php echo e($refund->uid, false); ?>">
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
<?php $component->withAttributes(['id' => 'tooltip-actions-contact-buyer-'.e($refund->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_buyer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
        
                                            
                                            <a href="<?php echo e(url('seller/refunds/details', $refund->uid), false); ?>" data-tooltip-target="tooltip-actions-refund-details-<?php echo e($refund->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-refund-details-<?php echo e($refund->uid, false); ?>">
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
<?php $component->withAttributes(['id' => 'tooltip-actions-refund-details-'.e($refund->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_refund_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
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
                
                </div>
            </div>
        </div>
    </div>


    
    <?php if($refunds->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $refunds->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/refunds/refunds.blade.php ENDPATH**/ ?>