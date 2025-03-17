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
                        
                        
                        <div class="mb-14">
                            <h2 class="text-3xl capitalize leading-6 font-bold text-black dark:text-gray-100"><?php echo e(__('messages.t_orders_history'), false); ?></h2>
                        </div>

                        
                        <?php if(session()->has('message')): ?>
                            <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                                    </div>
                                    <div class="ltr:ml-3 rtl:mr-3">
                                        <p class="text-sm text-yellow-700 font-medium">
                                            <?php echo e(session()->get('message'), false); ?>

                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        
                        <div class="w-full mb-6">
                            <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                
                                <div class="bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded-md mb-10" wire:key="orders-<?php echo e($order->uid, false); ?>">
                                    <div class="bg-gray-50 dark:bg-zinc-600 border-b sm:rounded-t-md flex items-center p-4 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6 dark:border-zinc-600">

                                        
                                        <dl class="flex-1 grid grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-2 lg:col-span-2">

                                            
                                            <div>
                                                <dt class="font-medium text-gray-900 dark:text-gray-200"><?php echo e(__('messages.t_date_placed'), false); ?></dt>
                                                <dd class="mt-2 text-gray-500 dark:text-gray-50 text-xs"><?php echo e(format_date($order->placed_at, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?></dd>
                                            </div>

                                            
                                            <div>
                                                <dt class="font-medium text-gray-900 dark:text-gray-200"><?php echo e(__('messages.t_total_amount'), false); ?></dt>
                                                <dd class="mt-1 font-medium text-gray-900 dark:text-white"><?php echo money($order->total_value, settings('currency')->code, true); ?></dd>
                                            </div>

                                        </dl>

                                    </div>

                                    
                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-zinc-600">

                                        <?php $__currentLoopData = $order->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="p-4 sm:p-6">
                                                <div class="flex items-center sm:items-start">

                                                    
                                                    <div class="flex-shrink-0 w-24 h-24 bg-gray-200 dark:bg-zinc-600 rounded-lg overflow-hidden hidden md:block">
                                                        <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($item->gig->thumbnail), false); ?>" alt="<?php echo e($item->gig->title, false); ?>" class="lazy w-full h-full object-center object-cover">
                                                    </div>

                                                    
                                                    <div class="flex-1 ltr:md:ml-6 rtl:md:mr-6 text-sm">
                                                        <div class="md:flex md:items-center md:justify-between md:space-x-4 rtl:space-x-reverse xl:pb-4">
                                                            <div>

                                                                
                                                                <h1 class="text-base font-bold text-gray-900 hover:text-primary-600 mb-2 dark:text-white">
                                                                    <a href="<?php echo e(url('service', $item->gig->slug), false); ?>" target="_blank"><?php echo e($item->gig->title, false); ?></a>
                                                                </h1>

                                                                
                                                                <div class="inline-block md:!flex text-gray-500 dark:text-gray-300 text-xs space-y-4 md:space-y-0 md:space-x-6 lg:space-x-12 rtl:space-x-reverse">

                                                                    
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase"><?php echo e(__('messages.t_total'), false); ?></p>
                                                                            <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-200 font-medium">
                                                                                <?php echo money($item->total_value, settings('currency')->code, true); ?>
                                                                            </p>
                                                                        </div>
                                                                    </span>

                                                                    
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase"><?php echo e(__('messages.t_quantity'), false); ?></p>
                                                                            <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-200 font-medium">
                                                                                <?php echo e($item->quantity, false); ?>

                                                                            </p>
                                                                        </div>
                                                                    </span>

                                                                    
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase"><?php echo e(__('messages.t_expected_delivery_date'), false); ?></p>
                                                                            <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-200 font-medium">
                                                                                <?php if($item->expected_delivery_date): ?>
                                                                                    <?php echo e(format_date($item->expected_delivery_date, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?>

                                                                                <?php else: ?>
                                                                                    —
                                                                                <?php endif; ?>
                                                                            </p>
                                                                        </div>
                                                                    </span>

                                                                    
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase"><?php echo e(__('messages.t_status'), false); ?></p>

                                                                            
                                                                            <?php if($item->refund && $item->refund->status === 'pending'): ?>
                                                                                <p class="mt-2 text-[11px] text-red-500 font-medium">
                                                                                    <?php echo e(__('messages.t_dispute_opened'), false); ?>

                                                                                </p>
                                                                            <?php elseif($item->order->invoice && $item->order->invoice->status === 'pending'): ?>
                                                                                <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                                                    <?php echo e(__('messages.t_pending_payment'), false); ?>

                                                                                </p>
                                                                            <?php elseif($item->status === 'delivered' && $item->is_finished): ?>
                                                                                <p class="mt-2 text-[11px] text-purple-500 font-medium">
                                                                                    <?php echo e(__('messages.t_completed'), false); ?>

                                                                                </p>
                                                                            <?php else: ?>

                                                                                <?php switch($item->status):

                                                                                    
                                                                                    case ('pending'): ?>
                                                                                        <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                                                            <?php echo e(__('messages.t_pending'), false); ?>

                                                                                        </p>
                                                                                        <?php break; ?>

                                                                                    
                                                                                    <?php case ('proceeded'): ?>
                                                                                        <p data-tooltip-target="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-proceeded" class="mt-2 text-[11px] text-blue-500 font-medium cursor-pointer">
                                                                                            <?php echo e(__('messages.t_in_the_process'), false); ?>

                                                                                        </p>
                                                                                        <div id="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-proceeded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            <?php echo e(format_date($item->proceeded_at, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?>

                                                                                        </div>
                                                                                        <?php break; ?>

                                                                                    
                                                                                    <?php case ('delivered'): ?>
                                                                                        <p data-tooltip-target="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-delivered" class="mt-2 text-[11px] text-green-500 font-medium cursor-pointer">
                                                                                            <?php echo e(__('messages.t_delivered'), false); ?>

                                                                                        </p>
                                                                                        <div id="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-delivered" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            <?php echo e(format_date($item->delivered_at, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?>

                                                                                        </div>
                                                                                        <?php break; ?>

                                                                                    
                                                                                    <?php case ('canceled'): ?>
                                                                                        <p data-tooltip-target="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-canceled" class="mt-2 text-[11px] text-gray-500 font-medium cursor-pointer">
                                                                                            <?php echo e(__('messages.t_canceled'), false); ?>

                                                                                        </p>
                                                                                        <div id="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-canceled" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            <?php echo e(format_date($item->canceled_at, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?>

                                                                                        </div>
                                                                                        <?php break; ?>
                                                                                    
                                                                                    
                                                                                    <?php case ('refunded'): ?>
                                                                                        <p data-tooltip-target="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-refunded" class="mt-2 text-[11px] text-red-500 font-medium cursor-pointer">
                                                                                            <?php echo e(__('messages.t_refunded'), false); ?>

                                                                                        </p>
                                                                                        <div id="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-status-refunded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            <?php echo e(format_date($item->refunded_at, config('carbon-formats.F_j,_Y_h_:_i_A')), false); ?>

                                                                                        </div>
                                                                                        <?php break; ?>
                                                                                        
                                                                                    <?php default: ?>
                                                                                        
                                                                                <?php endswitch; ?>

                                                                            <?php endif; ?>

                                                                            
                                                                        </div>
                                                                    </span>
                                                                    
                                                                </div>

                                                            </div>

                                                            
                                                            <div class="mt-4 flex space-x-3 md:mt-0">
                                                                <button type="button" data-dropdown-toggle="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-actions-dropdown" data-dropdown-placement="left-start" class="inline-flex justify-center px-2 py-2 border border-gray-200 dark:border-zinc-700 shadow-sm text-xs font-medium rounded-full text-gray-700 dark:text-gray-300 bg-white dark:bg-zinc-800 hover:bg-gray-50 dark:hover:bg-zinc-900 focus:outline-none focus:ring-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                                                                </button>
                                                                <div id="orders-<?php echo e($order->uid, false); ?>-item-<?php echo e($item->id, false); ?>-actions-dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-48 dark:bg-zinc-800">
                                                                    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

                                                                        
                                                                        <li>
                                                                            <a href="<?php echo e(url('messages/new', $item->owner?->username), false); ?>" target="_blank" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded-t">
                                                                                <svg class="ltr:mr-3 rtl:ml-3 text-gray-500 w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M7 7h10v2H7zm0 4h7v2H7z"></path><path d="M20 2H4c-1.103 0-2 .897-2 2v18l5.333-4H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14H6.667L4 18V4h16v12z"></path></svg>
                                                                                <span class="text-xs font-medium text-gray-700 dark:text-gray-300"><?php echo e(__('messages.t_contact_seller'), false); ?></span>
                                                                            </a>
                                                                        </li>
                                                                        
                                                                        <?php
                                                                            
                                                                            // Check expected delivery date
                                                                            if ($item->expected_delivery_date && !$item->is_finished) {
                                                                                
                                                                                // Parse expected delivery date
                                                                                $parsed = \Carbon\Carbon::parse($item->expected_delivery_date);

                                                                                // Check if date is past
                                                                                if ($parsed->isPast()) {
                                                                                    
                                                                                    // Date in past, check item status
                                                                                    if (in_array($item->status, ['delivered', 'proceeded', 'pending'])) {
                                                                                        
                                                                                        // Can request refund
                                                                                        $can_refund = true;

                                                                                    } else {

                                                                                        // Cannot request refund
                                                                                        $can_refund = false;

                                                                                    }

                                                                                } else if ($item->status === 'delivered' && !$item->is_finished) {
                                                                                    
                                                                                    // Can refund
                                                                                    $can_refund = true;

                                                                                } else {

                                                                                    // Cannot request refund
                                                                                    $can_refund = false;

                                                                                }

                                                                            } else {

                                                                                $can_refund = false;

                                                                            }

                                                                        ?>

                                                                        
                                                                        <?php if($item->refund): ?>
                                                                            
                                                                            <li>
                                                                                <a href="<?php echo e(url('account/refunds/details', $item->refund->uid), false); ?>" target="_blank" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700">
                                                                                    <svg class="ltr:mr-3 rtl:ml-3 text-gray-500 w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300"><?php echo e(__('messages.t_refund_details'), false); ?></span>
                                                                                </a>
                                                                            </li>

                                                                        <?php else: ?>
                                                                            
                                                                            
                                                                            <?php if($can_refund): ?>
                                                                                <li>
                                                                                    <a href="<?php echo e(url('account/refunds/request', $item->uid), false); ?>" target="_blank" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700">
                                                                                        <svg class="ltr:mr-3 rtl:ml-3 text-gray-500 w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                                                                                        <span class="text-xs font-medium text-gray-700 dark:text-gray-300"><?php echo e(__('messages.t_request_refund'), false); ?></span>
                                                                                    </a>
                                                                                </li>
                                                                            <?php endif; ?>

                                                                        <?php endif; ?>

                                                                        
                                                                        <?php if(in_array($item->status, ['proceeded', 'delivered'])): ?>
                                                                            <li>
                                                                                <a href="<?php echo e(url('account/orders/files?orderId=' . $order->uid . '&itemId=' . $item->uid), false); ?>"  class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700">
                                                                                    <svg class="w-5 h-5 ltr:mr-3 rtl:ml-3 text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2.165 19.551c.186.28.499.449.835.449h15c.4 0 .762-.238.919-.606l3-7A.998.998 0 0 0 21 11h-1V7c0-1.103-.897-2-2-2h-6.1L9.616 3.213A.997.997 0 0 0 9 3H4c-1.103 0-2 .897-2 2v14h.007a1 1 0 0 0 .158.551zM17.341 18H4.517l2.143-5h12.824l-2.143 5zM18 7v4H6c-.4 0-.762.238-.919.606L4 14.129V7h14z"></path></svg>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300"><?php echo e(__('messages.t_delivered_work'), false); ?></span>
                                                                                </a>
                                                                            </li>
                                                                        <?php endif; ?>

                                                                        
                                                                        <?php if($item->status === 'pending' && $item->order->invoice && $item->order->invoice->status === 'paid'): ?>
                                                                            <li>
                                                                                <button type="button" x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_cancel_service'), false); ?>') ? $wire.cancel('<?php echo e($item->uid, false); ?>') : ''" wire:loading.attr="disabled" wire:target="cancel('<?php echo e($item->uid, false); ?>')" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 w-full">

                                                                                    
                                                                                    <div wire:loading wire:target="cancel('<?php echo e($item->uid, false); ?>')">
                                                                                        <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                                        </svg>
                                                                                    </div>

                                                                                    
                                                                                    <div wire:loading.remove wire:target="cancel('<?php echo e($item->uid, false); ?>')">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-500 group-hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                                                                    </div>

                                                                                    <span class="text-xs font-medium"><?php echo e(__('messages.t_cancel_service'), false); ?></span>
                                                                                    
                                                                                </button>
                                                                            </li>
                                                                        <?php endif; ?>

                                                                        
                                                                        <?php if(($item->status === 'pending' || $item->status === 'proceeded') && $item->order->invoice && $item->order->invoice->status === 'paid'): ?>
                                                                            <li>
                                                                                <a href="<?php echo e(url('account/orders/requirements?order=' . $order->uid . '&item=' . $item->uid), false); ?>"  class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded-b">
                                                                                    <svg class="ltr:mr-3 rtl:ml-3 text-gray-500 h-5 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M20.563 3.34a1.002 1.002 0 0 0-.989-.079l-17 8a1 1 0 0 0 .026 1.821L8 15.445v6.722l5.836-4.168 4.764 2.084a1 1 0 0 0 1.399-.85l1-15a1.005 1.005 0 0 0-.436-.893zm-2.466 14.34-5.269-2.306L16 9.167l-7.649 4.25-2.932-1.283 13.471-6.34-.793 11.886z"></path></svg>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300"><?php echo e(__('messages.t_send_requirements'), false); ?></span>
                                                                                </a>
                                                                            </li>
                                                                        <?php endif; ?>

                                                                        
                                                                        <?php if( $item->status === 'delivered' && $item->is_finished ): ?>
                                                                            <li>
                                                                                <a href="<?php echo e(url('account/reviews/create/' . $item->uid), false); ?>"  class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded-b">
                                                                                    <svg class="ltr:mr-3 rtl:ml-3 text-gray-500 w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m6.516 14.323-1.49 6.452a.998.998 0 0 0 1.529 1.057L12 18.202l5.445 3.63a1.001 1.001 0 0 0 1.517-1.106l-1.829-6.4 4.536-4.082a1 1 0 0 0-.59-1.74l-5.701-.454-2.467-5.461a.998.998 0 0 0-1.822 0L8.622 8.05l-5.701.453a1 1 0 0 0-.619 1.713l4.214 4.107zm2.853-4.326a.998.998 0 0 0 .832-.586L12 5.43l1.799 3.981a.998.998 0 0 0 .832.586l3.972.315-3.271 2.944c-.284.256-.397.65-.293 1.018l1.253 4.385-3.736-2.491a.995.995 0 0 0-1.109 0l-3.904 2.603 1.05-4.546a1 1 0 0 0-.276-.94l-3.038-2.962 4.09-.326z"></path></svg>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300"><?php echo e(__('messages.t_make_a_review'), false); ?></span>
                                                                                </a>
                                                                            </li>
                                                                        <?php endif; ?>

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        
                                                        <?php if($item->has('upgrades')): ?>
                                                            <div class="mt-4">
                                                                <fieldset class="space-y-5">

                                                                    <?php $__currentLoopData = $item->upgrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $upgrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="relative flex items-start">
                                                                            <div class="flex items-center h-5">
                                                                                <input type="checkbox" class="h-4 w-4 text-gray-300 dark:text-gray-400 border-gray-200 dark:border-zinc-600 dark:disabled:bg-zinc-600 border-2 rounded-sm cursor-not-allowed pointer-events-none" checked disabled>
                                                                            </div>
                                                                            <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
                                                                                <label class="font-medium text-gray-500 dark:text-gray-100 text-xs">
                                                                                    <?php echo e($upgrade->title, false); ?>

                                                                                </label>
                                                                                <p class="font-normal text-gray-400">
                                                                                    <div class="mt-1 flex text-sm">
                                                                                        <p class="text-gray-400 dark:text-gray-300 text-xs">+ <?php echo money($upgrade->price, settings('currency')->code, true); ?></p>
                                                                    
                                                                                        <?php if($upgrade->extra_days): ?>
                                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 dark:border-zinc-600 text-gray-400 dark:text-gray-300 text-xs">
                                                                                                <?php echo e(__('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)]), false); ?>

                                                                                            </p>
                                                                                        <?php else: ?>
                                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 dark:border-zinc-600 text-gray-400 dark:text-gray-300 text-xs">
                                                                                                <?php echo e(__('messages.t_no_changes_delivery_time'), false); ?>

                                                                                            </p>
                                                                                        <?php endif; ?>
                                                                                    </div>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                                </fieldset>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                    </div>

                                                </div>

                                                <div class="mt-6 sm:flex sm:justify-between">

                                                    
                                                    <?php if( $item->order->invoice && $item->order->invoice->status === 'paid' && $item->status === 'pending' ): ?>
                                                        <?php if(!$item->gig->requirements()->exists() || !$item->is_requirements_sent): ?>
                                                            <div class="flex items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"/></svg>
                                                                <p class="ltr:ml-2 rtl:mr-2 text-xs font-medium text-amber-600">
                                                                    <?php echo e(__('messages.t_u_have_send_reqs_asap_to_seller'), false); ?>

                                                                </p>
                                                            </div>
                                                        <?php else: ?>
                                                            <div></div>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <div></div>
                                                    <?php endif; ?>

                                                    
                                                    <div class="mt-6 border-t border-gray-200 pt-4 flex items-center space-x-4 divide-x divide-gray-200 dark:divide-zinc-600 rtl:divide-x-reverse text-sm font-medium sm:mt-0 sm:ltr:ml-4 sm:rtl:mr-4 sm:border-none sm:pt-0 rtl:space-x-reverse">

                                                        
                                                        <div class="flex-1 flex justify-center">
                                                            <a href="<?php echo e(url('service', $item->gig->slug), false); ?>" target="_blank" class="text-primary-600 whitespace-nowrap hover:text-primary-600"><?php echo e(__('messages.t_view_gig'), false); ?></a>
                                                        </div>

                                                        
                                                        <?php if(($item->status === 'pending' || $item->status === 'proceeded') && $item->order->invoice && $item->order->invoice->status === 'paid'): ?>
                                                            <div class="flex-1 ltr:pl-4 rtl:pr-4 flex justify-center">
                                                                <a href="<?php echo e(url('account/orders/requirements?order=' . $order->uid . '&item=' . $item->uid), false); ?>" class="text-primary-600 whitespace-nowrap hover:text-primary-600"><?php echo e(__('messages.t_send_requirements'), false); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                        
                                                    </div>

                                                </div>
                                                    
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>

                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                
                                
                                <div class="rounded-md bg-blue-50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                        </div>
                                    <div class="ltr:ml-3 rtl:mr-3 flex-1 md:flex md:justify-between">
                                        <p class="text-sm text-blue-700 font-medium">
                                            <?php echo e(__('messages.t_ur_orders_history_is_empty_right_now'), false); ?>

                                        </p>
                                        <p class="mt-3 text-sm md:mt-0 md:ltr:ml-6 md:rtl:mr-6">
                                            <a href="<?php echo e(url('/'), false); ?>" class="whitespace-nowrap font-medium text-blue-700 hover:text-blue-600"><?php echo e(__('messages.t_go_shopping'), false); ?> <span aria-hidden="true">&rarr;</span></a>
                                        </p>
                                    </div>
                                    </div>
                                </div>

                            <?php endif; ?>

                            
                            <?php if($orders->hasPages()): ?>
                                <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border px-4 py-5 sm:px-6 flex justify-center">
                                    <?php echo $orders->links('pagination::tailwind'); ?>

                                </div>
                            <?php endif; ?>

                        </div>

                    </div>                  

                </div>

            </div>
        </div>
    </div>
</main><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/orders/orders.blade.php ENDPATH**/ ?>