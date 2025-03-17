<main class="w-full">
    <div class="">
        <div class="overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                
                <aside class="lg:col-span-3 pb-6 hidden lg:block" wire:ignore>
                    <?php if (isset($component)) { $__componentOriginal897c321ee9b9bb967400e80c55835c23 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal897c321ee9b9bb967400e80c55835c23)): ?>
<?php $component = $__componentOriginal897c321ee9b9bb967400e80c55835c23; ?>
<?php unset($__componentOriginal897c321ee9b9bb967400e80c55835c23); ?>
<?php endif; ?>
                </aside>

                
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9 pt-10">

                    
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                    
                    <div class="w-full">

                        
                        <div class="mb-5">
                            <h2 class="text-3xl capitalize leading-6 font-bold text-black dark:text-gray-100"><?php echo e(__('messages.t_refunds'), false); ?></h2>
                        </div>

                        
                        <?php if(session()->has('error')): ?>
                            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6 mx-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                                    </div>
                                    <div class="ltr:ml-3 rtl:mr-3 flex items-center">
                                        <p class="text-xs font-bold tracking-wide text-red-700">
                                            <?php echo e(session()->get('error'), false); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>  
                        <?php endif; ?>
                        
                        <div class="bg-white dark:bg-zinc-800 overflow-y-auto dark:border-zinc-600">
                            <table class="w-full whitespace-nowrap old-tables">
                                <thead class="bg-gray-100 dark:bg-zinc-700">
                                    <tr tabindex="0" class="focus:outline-none h-10 w-full text-sm leading-none text-gray-800 dark:text-white">
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_item'), false); ?></th>
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_seller'), false); ?></th>
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_status'), false); ?></th>
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_date'), false); ?></th>
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_options'), false); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                    
                                    <?php $__empty_1 = true; $__currentLoopData = $refunds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $refund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="refunds-<?php echo e($refund->id, false); ?>">
                    
                                            
                                            <td class="ltr:pl-4 rtl:pr-4">
                                                <a href="<?php echo e(url('service', $refund->item->gig->slug), false); ?>" target="_blank" class="flex items-center">
                                                    <div class="w-8 h-8">
                                                        <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($refund->item->gig->thumbnail), false); ?>" alt="<?php echo e($refund->item->gig->title, false); ?>" />
                                                    </div>
                                                    <div class="ltr:pl-4 rtl:pr-4">
                                                        <p class="font-medium text-xs truncate max-w-lg block overflow-hidden dark:text-gray-200"><?php echo e($refund->item->gig->title, false); ?></p>
                                                        <p class="text-[11px] leading-3 text-gray-600 dark:text-gray-400 pt-2"><?php echo money($refund->item->gig->price, settings('currency')->code, true); ?></p>
                                                    </div>
                                                </a>
                                            </td>

                                            
                                            <td class="ltr:pl-4 rtl:pr-4">
                                                <a href="<?php echo e(url('profile', $refund->seller->username), false); ?>" target="_blank" class="flex items-center">
                                                    <div class="w-8 h-8">
                                                        <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($refund->seller->avatar), false); ?>" alt="<?php echo e($refund->seller->username, false); ?>" />
                                                    </div>
                                                    <div class="ltr:pl-4 rtl:pr-4">
                                                        <p class="font-medium text-xs truncate max-w-lg block overflow-hidden dark:text-gray-200"><?php echo e($refund->seller->username, false); ?></p>
                                                        <p class="text-[11px] leading-3 text-gray-600 dark:text-gray-400 pt-2">
                                                            <?php if($refund->seller->fullname): ?>
                                                                <?php echo e($refund->seller->fullname, false); ?>

                                                            <?php else: ?>
                                                                -
                                                            <?php endif; ?>    
                                                        </p>
                                                    </div>
                                                </a>
                                            </td>

                                            
                                            <td class="text-center">
                                                <?php switch($refund->status):

                                                    
                                                    case ('pending'): ?>
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                                            <?php echo e(__('messages.t_in_progress'), false); ?>

                                                        </span>
                                                        <?php break; ?>

                                                    
                                                    <?php case ('closed'): ?>
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-gray-500 bg-gray-50">
                                                            <?php echo e(__('messages.t_closed'), false); ?>

                                                        </span>
                                                        <?php break; ?>

                                                    
                                                    <?php case ('rejected_by_seller'): ?>
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                                            <?php echo e(__('messages.t_declined_by_seller'), false); ?>

                                                        </span>
                                                        <?php break; ?>

                                                    
                                                    <?php case ('rejected_by_admin'): ?>
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                                            <?php echo e(__('messages.t_declined_by_admin', ['app_name' => config('app.name')]), false); ?>

                                                        </span>
                                                        <?php break; ?>

                                                    
                                                    <?php case ('accepted_by_seller'): ?>
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                                            <?php echo e(__('messages.t_approved_by_seller'), false); ?>

                                                        </span>
                                                        <?php break; ?>

                                                    
                                                    <?php case ('accepted_by_admin'): ?>
                                                        <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                                            <?php echo e(__('messages.t_approved_by_admin', ['app_name' => config('app.name')]), false); ?>

                                                        </span>
                                                        <?php break; ?>
                                                        
                                                <?php endswitch; ?>
                                            </td>
                    
                                            
                                            <td class="text-center">
                                                <span class="text-[11px] font-normal text-gray-400 dark:text-gray-200"><?php echo e(format_date($refund->created_at, 'ago'), false); ?></span>
                                            </td>
                    
                                            
                                            <td class="text-center">
                                                <div class="relative inline-block text-left">
                                                    <div>
                                                        <a href="<?php echo e(url('account/refunds/details', $refund->uid), false); ?>" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-600 focus:outline-none focus:ring-0" aria-expanded="true" aria-haspopup="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                    
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40">

                                            <td class="ltr:pl-4 rtl:pr-4" colspan="5">
                                                <div class="flex flex-col col-span-2 sm:flex-row justify-center px-5 py-5 mt-5 mb-4 text-gray-400 text-sm"><?php echo app('translator')->get('messages.no_results_found'); ?></div>
                                            </td>
                					 </tr>
                					<?php endif; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    
                        
                        <?php if($refunds->hasPages()): ?>
                            <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
                                <?php echo $refunds->links('pagination::tailwind'); ?>

                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</main><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/refunds/refunds.blade.php ENDPATH**/ ?>