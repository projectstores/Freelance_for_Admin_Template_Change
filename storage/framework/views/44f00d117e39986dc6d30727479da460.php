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
    
                
                <div class="mt-5 flex justify-between lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">

                    
                    <span class="">
                        <a href="<?php echo e(url('account/deposit'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_deposit'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    
    <?php if(session()->has('success')): ?>
        <div class="p-4 relative flex bg-emerald-50 dark:bg-emerald-500 text-emerald-500 dark:text-emerald-50 text-xs font-semibold rounded-lg mb-6">
            <div class="flex items-center">
                <span class="text-2xl text-emerald-400 dark:text-emerald-50">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </span>
                <div class="ltr:ml-2 rtl:mr-2"><?php echo e(session()->get('success'), false); ?></div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(session()->has('error')): ?>
        <div class="p-4 relative flex bg-red-50 dark:bg-red-500 text-red-500 dark:text-red-50 text-xs font-semibold rounded-lg mb-6">
            <div class="flex items-center">
                <span class="text-2xl text-red-400 dark:text-red-50">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                </span>
                <div class="ltr:ml-2 rtl:mr-2"><?php echo e(session()->get('error'), false); ?></div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(session()->has('warning')): ?>
        <div class="p-4 relative flex bg-amber-50 dark:bg-amber-500 text-amber-500 dark:text-amber-50 text-xs font-semibold rounded-lg mb-6">
            <div class="flex items-center">
                <span class="text-2xl text-amber-400 dark:text-amber-50">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                </span>
                <div class="ltr:ml-2 rtl:mr-2"><?php echo e(session()->get('warning'), false); ?></div>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="w-full">
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_deposit_history'); ?></div>
                    
                    <table class="w-full text-left border-spacing-y-[10px] border-separate sm:mt-2">
                        <thead class="">
                            <tr class="bg-slate-200 dark:bg-zinc-600">
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_date'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_payment_method'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_amount'); ?></th>
                                
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_status'); ?></th>
                                
                            </tr>
                        </thead>
                        <thead>
                            <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="deposit-history-transactions-<?php echo e($t->uid, false); ?>">
                                
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
        
                                        
                                        <?php
                                            \Carbon\Carbon::setLocale(config()->get('backend_timing_locale'));
                                            $formatted_date = \Carbon\Carbon::create($t->created_at);
                                        ?>
        
                                        <div class="grid items-center text-center justify-center" data-tooltip-target="tooltip-year-date-<?php echo e($t->id, false); ?>">
                                            <span class="text-base font-medium text-gray-500 dark:text-gray-200 mb-2">
                                                <?php echo e($formatted_date->format('d'), false); ?>

                                            </span>
                                            <span class="text-[10px] text-gray-400 dark:text-gray-300 uppercase tracking-widest">
                                                <?php echo e($formatted_date->format('F'), false); ?>

                                            </span>
                                        </div>
        
                                        <div id="tooltip-year-date-<?php echo e($t->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-semibold text-white bg-gray-900 rounded-md shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                            <?php echo e($formatted_date->format('Y'), false); ?>

                                        </div>
        
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-96 rtl:text-right">
                                        <div class="flex items-center">
                                            <div class="space-y-1 font-medium dark:text-white">
        
                                                
                                                <div class="flex items-center">
                                                    <div class="font-bold whitespace-nowrap truncate block max-w-[240px] hover:text-zinc-900 dark:text-white text-sm text-zinc-700">
                                                        
                                                        
                                                        <?php if($t->payment_method === "offline"): ?>
                                            
                                                            
                                                            <?php if( !empty(payment_gateway($t->payment_method, false, true)->name) ): ?>
                                                                
                                                                
                                                                <?php echo e(payment_gateway($t->payment_method, false, true)?->name, false); ?>

        
                                                            <?php else: ?>
        
                                                                
                                                                -
        
                                                            <?php endif; ?>
        
                                                        <?php elseif( !empty(payment_gateway($t->payment_method)->name) ): ?>
        
                                                            
                                                            <?php echo e(payment_gateway($t->payment_method)?->name, false); ?>

        
                                                        <?php else: ?>
        
                                                            -
        
                                                        <?php endif; ?>
        
                                                    </div>
                                                </div>
        
                                                
                                                <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs font-normal text-gray-400 dark:text-zinc-300">
                                                    <?php echo e($t->transaction_id, false); ?>

                                                </div>
        
                                            </div>
                                        </div>
        
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <span class="text-black dark:text-white font-semibold text-sm whitespace-nowrap">
                                            <?php echo money($t->amount_net, settings('currency')->code, true); ?>
                                        </span>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <?php switch($t->status):
        
                                            
                                            case ('paid'): ?>
                                                <span class="bg-emerald-100 text-emerald-700 px-4 py-2 inline-block rounded-3xl font-medium text-xs whitespace-nowrap">
                                                    <?php echo app('translator')->get('messages.t_paid'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            
                                            <?php case ('pending'): ?>
                                                <span class="bg-amber-100 text-amber-700 px-4 py-2 inline-block rounded-3xl font-medium text-xs whitespace-nowrap">
                                                    <?php echo app('translator')->get('messages.t_pending'); ?>
                                                </span>
                                            <?php break; ?>
        
                                            
                                            <?php case ('rejected'): ?>
                                                <span class="bg-red-100 text-red-600 px-4 py-2 inline-block rounded-3xl font-medium text-xs whitespace-nowrap">
                                                    <?php echo app('translator')->get('messages.t_rejected'); ?>
                                                </span>
                                            <?php break; ?>
                                                
                                        <?php endswitch; ?>
                                    </td>
        
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="4" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                        <?php echo app('translator')->get('messages.t_no_results_found'); ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </thead>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>

    
    <?php if($transactions->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $transactions->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/deposit/history.blade.php ENDPATH**/ ?>