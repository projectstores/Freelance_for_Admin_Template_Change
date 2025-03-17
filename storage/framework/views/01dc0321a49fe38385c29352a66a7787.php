<div class="relative md:mx-auto " x-data="window.oZcfXWmBuWfxbIo" x-init="initialize()">

    
    <?php if($gig->owner->availability): ?>
        <div class="rounded-md bg-amber-100 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <h3 class="text-sm font-bold text-amber-800"><?php echo e(__('messages.t_attention_needed'), false); ?></h3>
                    <div class="mt-2 text-xs font-normal text-amber-700">
                        <p>
                            <?php echo __('messages.t_seller_wont_be_able_to_receive_orders_date', ['date' => format_date($gig->owner->availability->expected_available_date, config('carbon-formats.F_j,_Y'))]); ?>

                        </p>
                        <p class="border-l-4 pl-2 border-amber-500 mt-4">
                            <?php echo e($gig->owner->availability->message, false); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if($gig->status === 'pending'): ?>
        <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <p class="text-sm text-yellow-700 font-medium">
                        <?php echo e(__('messages.t_this_gig_not_activated_yet'), false); ?>

                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="bg-white dark:bg-zinc-800 shadow-sm ring-1 ring-gray-100 dark:ring-zinc-700 border border-gray-50 dark:border-zinc-700 rounded-xl px-4 py-4 lg:px-12 lg:py-12">

        
        <div class="w-full mb-0 md:mb-12">

            
            <div class="md:flex items-center justify-between mb-0 md:mb-6">

                
                <nav class="hidden md:flex" aria-label="Breadcrumb">
                    <ol role="list" class="md:flex items-center space-x-2 rtl:space-x-reverse">

                        
                        <li>
                            <div>
                                <a href="<?php echo e(url('/'), false); ?>" class="text-gray-400 hover:text-gray-600">
                                    <svg class="flex-shrink-0 h-5 w-5 -mt-[3px]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/> </svg>
                                    <span class="sr-only">Home</span>
                                </a>
                            </div>
                        </li>
                
                        
                        <li>
                            <div class="flex items-center">

                                <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                <a href="<?php echo e(url('categories', $gig->category->slug), false); ?>" class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-400 hover:text-gray-600"><?php echo e($gig->category->name, false); ?></a>
                            </div>
                        </li>
                
                        
                        <li>
                            <div class="flex items-center">
                                
                                <svg class="hidden ltr:block flex-shrink-0 h-4 w-4 text-gray-300" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>

                                <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-4 w-4 text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                <a href="<?php echo e(url('categories/' . utf8_decode(urldecode($gig->category->slug . '/' . $gig->subcategory->slug))), false); ?>" class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-400 hover:text-gray-600" aria-current="page"><?php echo e($gig->subcategory->name, false); ?></a>
                            </div>
                        </li>
                        
                    </ol>
                </nav>

            </div>

        </div>

        
        <div class="lg:grid lg:grid-rows-1 lg:grid-cols-7 lg:gap-x-8 lg:gap-y-10 xl:gap-x-16">

            
            <div class="lg:row-end-1 lg:col-span-4">

                
                <h1 class="text-2xl font-extrabold tracking-wide leading-8 text-black dark:text-white sm:text-2xl mb-6">
                    <?php echo e($gig->title, false); ?>

                </h1>
                
                <div class="w-full mt-4 grid md:!flex justify-between items-center border-b border-gray-50 dark:border-zinc-700 pb-9 space-y-3 md:space-y-0 space-x-2 rtl:space-x-reverse">

                    
                    <a href="<?php echo e(url('profile', $gig->owner->username), false); ?>" target="_blank" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <span class="inline-block relative">
                                <img class="h-7 w-7 rounded-full object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($gig->owner->avatar), false); ?>" alt="<?php echo e($gig->owner->username, false); ?>">
                            </span>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <div class="flex items-center">
                                    <span class="font-medium tracking-wide text-base text-primary-700"><?php echo e($gig->owner->username, false); ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                    
                    
                    <div class="flex items-center">
                        <div class="flex items-center" wire:ignore>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" height="29px" viewBox="0 -960 960 960" width="29px" fill="#e1b40e"><path d="M480-269 314-169q-11 7-23 6t-21-8q-9-7-14-17.5t-2-23.5l44-189-147-127q-10-9-12.5-20.5T140-571q4-11 12-18t22-9l194-17 75-178q5-12 15.5-18t21.5-6q11 0 21.5 6t15.5 18l75 178 194 17q14 2 22 9t12 18q4 11 1.5 22.5T809-528L662-401l44 189q3 13-2 23.5T690-171q-9 7-21 8t-23-6L480-269Z"/></svg>
                            </div>
                            <?php if($gig->rating == 0): ?>
                                <div class="font-medium text-base text-black ltr:ml-1 rtl:mr-1"><?php echo e(__('messages.t_n_a'), false); ?></div>
                            <?php else: ?>
                                <div class="font-medium text-base text-black ltr:ml-1 rtl:mr-1"><?php echo e($gig->rating, false); ?></div>
                            <?php endif; ?>
                            <div class="font-medium text-base text-gray-500 ltr:ml-2 rtl:mr-2">(<?php echo e(__('messages.t_number_reviews', ['number' => $gig->counter_reviews]), false); ?>)</div>
                        </div>
                    </div>
                    
                    <div class="flex items-center">
                    
                        <?php if($gig->owner->status === 'verified'): ?>
                            <img class="h-7 w-7 mr-10" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>" style="margin-right: 5px">
                            <span class="text-base text-black font-medium">
                                <?php echo e(__('messages.t_account_verified'), false); ?>

                            </span>
                        <?php endif; ?>
                    
                    </div>
                    
                </div>

                <div class="rounded-xl overflow-hidden">
                    <div wire:ignore>
                        
                        <section id="main-carousel" class="splide rounded-xl">
                            <div class="splide__track">
                                    <ul class="splide__list">

                                        
                                        <?php if($gig->video_id): ?>
                                            <li class="splide__slide dark:bg-zinc-700 bg-gray-200 object-contain" data-splide-youtube="https://www.youtube.com/watch?v=<?php echo e($gig->video_id, false); ?>">
                                                <img src="<?php echo e(src($gig->imageLarge), false); ?>" alt="<?php echo e($gig->title, false); ?>" class=" object-contain">
                                            </li>
                                        <?php endif; ?>

                                        
                                        <?php $__currentLoopData = $gig->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="splide__slide dark:bg-zinc-700 bg-gray-200 object-contain">
                                                <img src="<?php echo e(src($image->large), false); ?>" alt="<?php echo e($gig->title, false); ?>" class="object-contain ">
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </ul>
                            </div>
                        </section>

                        
                        <section id="thumbnail-carousel" class="splide">
                            <div class="splide__track">
                                    <ul class="splide__list">

                                        
                                        <?php if($gig->video_link): ?>
                                            <li class="splide__slide !sr-only" data-splide-youtube="<?php echo e($gig->video_link, false); ?>">
                                                <img src="<?php echo e(src($gig->thumbnail), false); ?>" alt="<?php echo e($gig->title, false); ?>" class=" object-cover">
                                            </li>
                                        <?php endif; ?>

                                        
                                        <?php $__currentLoopData = $gig->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="splide__slide">
                                                <img src="<?php echo e(src($image->small), false); ?>" alt="<?php echo e($gig->title, false); ?>" class=" object-cover shadow">
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                            </div>
                        </section>
                    </div>
                </div>

                
                <div class="md:!hidden max-w-2xl mx-auto mt-10">
                
                    <div class="border rounded-2xl p-5">
                                        
                        
                        <div class="flex items-center justify-between mb-3">
                            <div class="font-medium text-xl text-black">
                                <?php echo e(__('messages.t_whats_included'), false); ?>

                            </div>
                            <div class="text-right">
                                <span class="text-black dark:text-white text-2xl tracking-wide font-bold"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="font-medium text-base text-black dark:text-white">
                                <?php echo e($gig->category->name, false); ?>

                            </div>
                            <div class="font-light text-base text-black dark:text-white">
                                <?php echo e($gig->subcategory->name, false); ?>

                            </div>
                        </div>
                        
                        
                        <div class="flex items-center justify-between">
                            <div class="font-light text-base text-black dark:text-white">
                                <?php echo e(__('messages.t_order_in_queue'), false); ?>

                            </div>
                            <div class="text-right">
                                <span class="text-lg text-black dark:text-white tracking-wide font-light">
                                
                                    <?php if($gig->total_orders_in_queue() == 1 || $gig->total_orders_in_queue() == 0): ?>
                                        <?php echo e(__('messages.t_order_in_queue_number', ['number' => $gig->total_orders_in_queue()]), false); ?>

                                    <?php else: ?>
                                        <?php echo e(__('messages.t_orders_in_queue_number', ['number' => $gig->total_orders_in_queue()]), false); ?>

                                    <?php endif; ?>
                                    
                                </span>
                            </div>
                        </div>
                        
                        
                        <div class="flex items-center justify-between">
                            <div class="font-light text-base text-black dark:text-white">
                                <?php echo e(__('messages.t_delivery_time_2'), false); ?>

                            </div>
                            <div class="text-right">
                                <span class="text-lg text-black dark:text-white tracking-wide font-light">
                                
                                    
                                    <?php switch($gig->delivery_time):
                                        case (1): ?>
                                            <?php echo __('messages.t_1_day'); ?>

                                            <?php break; ?>
                                        <?php case (2): ?>
                                            <?php echo __('messages.t_2_days'); ?>

                                            <?php break; ?>
                                        <?php case (3): ?>
                                            <?php echo __('messages.t_3_days'); ?>

                                            <?php break; ?>
                                        <?php case (4): ?>
                                            <?php echo __('messages.t_4_days'); ?>

                                            <?php break; ?>
                                        <?php case (5): ?>
                                            <?php echo __('messages.t_5_days'); ?>

                                            <?php break; ?>
                                        <?php case (6): ?>
                                            <?php echo __('messages.t_6_days'); ?>

                                            <?php break; ?>
                                        <?php case (7): ?>
                                            <?php echo __('messages.t_1_week'); ?>

                                            <?php break; ?>
                                        <?php case (14): ?>
                                            <?php echo __('messages.t_2_weeks'); ?>

                                            <?php break; ?>
                                        <?php case (21): ?>
                                            <?php echo __('messages.t_3_weeks'); ?>

                                            <?php break; ?>
                                        <?php case (30): ?>
                                            <?php echo __('messages.t_1_month'); ?>

                                            <?php break; ?>
                                        <?php default: ?>
                                            
                                    <?php endswitch; ?>
                                   
                                </span>
                            </div>
                        </div>
    
    
                        
                        <?php if($gig->upgrades()->count()): ?>
                            <div class="mt-3">
                                <?php $__currentLoopData = $gig->upgrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $upgrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <label class="relative block py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none bg-transparent" wire:key="add-to-cart-upgrades-<?php echo e($key, false); ?>">
                                        <div class="flex items-center">
                                            <input type="checkbox" value="<?php echo e($upgrade->uid, false); ?>" wire:model.defer="upgrades" class="w-4 h-4 text-primary-600 bg-transparent cursor-pointer rounded-sm ltr:mr-4 rtl:ml-4 border-2 border-gray-300 focus:ring-primary-600">
                                            <div class="text-sm">
                                                <p id="server-size-0-label" class="font-medium text-gray-600 dark:text-gray-300 text-sm"><?php echo e($upgrade->title, false); ?></p>
                                                <div class="text-gray-400">
                                                <?php if($upgrade->extra_days): ?>
                                                    <p class="sm:inline text-xs"><?php echo e(__('messages.t_delivery_time_will_be_increased_by_extra', ['time' => delivery_time_trans($upgrade->extra_days)]), false); ?></p>
                                                <?php else: ?>
                                                    <p class="sm:inline text-xs"><?php echo e(__('messages.t_no_changes_delivery_time'), false); ?></p>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2 flex text-sm sm:mt-0 ltr:sm:ml-4 rtl:sm:mr-4 sm:text-right items-center justify-center">
                                            <div class="font-bold text-xs text-black dark:text-gray-200"><span class="pr-1 font-normal text-gray-500">+</span><?php echo money($upgrade->price, settings('currency')->code, true); ?></div>
                                        </div>
                                        <div class="absolute -inset-px rounded-lg pointer-events-none" aria-hidden="true"></div>
                                    </label>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
    
                        
                        <div class="mt-6">
    
                            
                            <button 
                                wire:click="addToCart"
                                wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                                wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer"
                                wire:loading.attr="disabled"
                                class="w-full text-base font-medium flex justify-center bg-primary-700 hover:bg-primary-600 text-white py-3 px-8 rounded-xl tracking-wide focus:outline-none focus:shadow-outline cursor-pointer mb-2"
                                >
    
                                
                                <div wire:loading wire:target="addToCart">
                                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                    </svg>
                                </div>
    
                                
                                <div wire:loading.remove wire:target="addToCart">
                                    <?php
                                        $price = @money($gig->price, settings('currency')->code, true);
                                    ?>
                                    
                                    <div wire:loading.remove wire:target="addToCart">
                                        <?php echo e(__('messages.t_continue_price', ['price' => $price]), false); ?>

                                    </div>
                                </div>
                            </button>
    
                            
                            <a href="<?php echo e(url('messages/new', $gig->owner->username), false); ?>" target="_blank" class="w-full text-base font-medium flex justify-center bg-gray-400 hover:bg-gray-600 text-white py-3 px-8 rounded-xl tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"><?php echo e(__('messages.t_contact_seller'), false); ?></a>
    
                        </div>
    
                    </div>
    
                    
                    <?php if($gig->documents()->count()): ?>
                        <div class="dark:border-zinc-700 mt-6">
                            <h3 class="text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_documents'), false); ?></h3>
                            <div class="mt-4 text-gray-500">
                                <ul role="list">
                                    <?php $__currentLoopData = $gig->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="py-2 flex items-center justify-between text-sm">
                                            <div class="w-0 flex-1 flex items-center">
                                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/> </svg>
                                                <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate"> <?php echo e($document->name, false); ?> </span>
                                            </div>
                                            <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                                                <a href="<?php echo e(url('uploads/documents', $document->uid), false); ?>" target="_blank" class="font-medium text-blue-600 hover:text-blue-500 text-xs hover:underline"> <?php echo e(__('messages.t_download'), false); ?> </a>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
    
                    
                    <div class="dark:border-zinc-700 mt-6">
                        <div class="mt-4 text-gray-500">
                            <ul role="list" class="flex items-center space-x-6 mt-4 rtl:space-x-reverse">
    
                                
                                <div class="flex items-center group cursor-pointer" id="modals-share-btn">
                                    <div class="w-6 h-6 bg-white dark:bg-zinc-700 border drop-shadow-sm border-gray-100 dark:border-zinc-700 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center group-hover:bg-gray-800 dark:group-hover:bg-zinc-600 group-hover:border-transparent">
                                        <svg class="w-3 h-3 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-50" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path></svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-600 group-hover:text-gray-900 dark:text-gray-300 dark:group-hover:text-gray-200 hidden md:block"><?php echo e(__('messages.t_share'), false); ?></span>
                                </div>
    
                                
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->id() === $gig->user_id): ?>
                                        <div class="flex items-center group cursor-pointer" @click="youCantReport">
                                    <?php else: ?>
                                        <div class="flex items-center group cursor-pointer" id="modals-report-btn">
                                    <?php endif; ?>
                                <?php endif; ?>
    
                                <?php if(auth()->guard()->guest()): ?>
                                    <div class="flex items-center group cursor-pointer" @click="loginToReport">
                                <?php endif; ?>
                                    <div class="w-6 h-6 bg-white dark:bg-zinc-700 border drop-shadow-sm border-gray-100 dark:border-zinc-700 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center dark:group-hover:bg-zinc-600 group-hover:bg-red-500 group-hover:border-transparent">
                                        <svg class="w-3.5 h-3.5 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-50" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300 dark:group-hover:text-gray-200 group-hover:text-red-600 hidden md:block"><?php echo e(__('messages.t_report'), false); ?></span>
                                </div>
    
                                
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(auth()->id() !== $gig->user_id): ?>
    
                                        
                                        <?php if($inFavorite): ?>
                                            <div class="flex items-center group cursor-pointer" wire:click="removeFromFavorite">
                                                <div class="w-6 h-6 border drop-shadow-sm rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center bg-primary-600 border-transparent">
    
                                                    
                                                    <div wire:loading wire:target="removeFromFavorite">
                                                        <svg role="status" class="inline w-3 h-3 animate-spin text-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
    
                                                    
                                                    <svg wire:loading.remove wire:target="removeFromFavorite" class="w-3.5 h-3.5 text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    
                                                </div>
                                                <span class="text-sm font-medium text-primary-600 hidden md:block"><?php echo e(__('messages.t_remove_from_favorite'), false); ?></span>
                                            </div>
                                        <?php else: ?>
                                            <div class="flex items-center group cursor-pointer" wire:click="addToFavorite">
                                                <div class="w-6 h-6 bg-white dark:bg-zinc-700 border drop-shadow-sm border-gray-100 dark:border-zinc-700 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center group-hover:bg-primary-600 group-hover:border-transparent dark:group-hover:bg-zinc-600">
    
                                                    
                                                    <div wire:loading wire:target="addToFavorite">
                                                        <svg role="status" class="inline w-3 h-3 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 animate-spin group-hover:text-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>
    
                                                    
                                                    <svg wire:loading.remove wire:target="addToFavorite" class="w-3.5 h-3.5 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-50" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
    
                                                </div>
                                                <span class="text-sm font-medium text-gray-600 dark:text-gray-300 dark:group-hover:text-gray-200 group-hover:text-primary-600 hidden md:block"><?php echo e(__('messages.t_add_to_favorite'), false); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                            </ul>
                        </div>
                    </div>
                    
                </div>
                
                
                <div class="mb-3 mt-10">

                    <div class="font-bold text-2xl text-black dark:text-white">
                        <?php echo e(__('messages.t_project_details'), false); ?>

                    </div>
                    
                    
                    <div class="font-light text-black pt-6 dark:text-white quill-container text-lg mb-6" style="word-break: break-word;">
                        <?php echo $gig->description; ?>

                    </div>

                    
                    <div class="py-6">
                        <?php $__currentLoopData = $gig->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($tag): ?>
                                <a href="<?php echo e(url('search?q=' . $tag->name), false); ?>" class="border border-gray-300 rounded-lg mb-3 text-sm font-medium inline-block py-2 px-4 rounded text-black dark:text-zinc-400 dark:bg-zinc-700 dark:hover:bg-zinc-600 hover:bg-gray-200 last:mr-0 ltr:mr-1 rtl:ml-1">
                                    <?php echo e($tag->name, false); ?>

                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
                
                
                <div class="mb-16">
                    <div class="pt-6">
                        <?php $__currentLoopData = $gig->faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <details class="rounded-lg group relative mb-3 last:mb-0 bg-gray-50 dark:bg-zinc-700">
                                <summary class="flex items-center justify-between cursor-pointer focus:outline-none">

                                    
                                    <h5 class="text-lg font-medium text-black dark:text-gray-300 focus:outline-none flex items-center">
                                        <?php echo e($faq->question, false); ?>

                                    </h5>
                            
                                    <span class="relative flex-shrink-0 ltr:ml-1.5 rtl:mr-1.5 w-5 h-5 ltr:mr-6 rtl:ml-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-6 h-6 opacity-100 group-open:opacity-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
                            
                                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-6 h-6 opacity-0 group-open:opacity-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
                                    </span>
                                </summary>
                            
                                <p class="mt-4 leading-relaxed text-black dark:text-gray-200 text-base px-3 pb-4">
                                    <?php echo e($faq->answer, false); ?>

                                </p>
                            </details>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                
                
                <div class="mt-11">
                
                     
                    <?php if($user->account_type === 'seller' && $user_rating['total'] > 0): ?>
                        <section class="px-5 py-8">
    
                            
                            <div class="flex flex-col items-center gap-2">
    
                                
                                <span class="flex items-center gap-4 text-sm rounded text-slate-500">
    
                                    
                                    <?php echo render_star_rating($user_rating['value'], "1.25rem", "1.25rem", "#d0d0d0"); ?>

    
                                    
                                    <span class="text-base font-bold text-black"><?php echo e($user_rating['value'], false); ?> <?php echo app('translator')->get('messages.t_out_of_5'); ?></span>
    
                                </span>
                                
                                
                                <span class="text-sm leading-6 text-slate-400"><?php echo app('translator')->get('messages.t_based_on_number_reviews', ['number' => $user_rating['total']]); ?></span>
    
                                
                                <div class="flex flex-col w-full gap-4 pt-6">
    
                                    
                                    <span class="flex items-center w-full gap-2">
                                        <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_5_stars'); ?></label>
                                        <progress max="100" value="<?php echo e($user_rating['stars_5'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-100 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_5'] * 100 / $user_rating['total'], false); ?>%</progress>
                                        <span class="text-xs font-bold w-9 text-slate-700 dark:text-zinc-300"><?php echo e($user_rating['stars_5'], false); ?></span>
                                    </span>
    
                                    
                                    <span class="flex items-center w-full gap-2">
                                        <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_4_stars'); ?></label>
                                        <progress max="100" value="<?php echo e($user_rating['stars_4'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-100 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_4'] * 100 / $user_rating['total'], false); ?>%</progress>
                                        <span class="text-xs font-bold w-9 text-slate-700 dark:text-zinc-300"><?php echo e($user_rating['stars_4'], false); ?></span>
                                    </span>
    
                                    
                                    <span class="flex items-center w-full gap-2">
                                        <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_3_stars'); ?></label>
                                        <progress max="100" value="<?php echo e($user_rating['stars_3'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-100 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_3'] * 100 / $user_rating['total'], false); ?>%</progress>
                                        <span class="text-xs font-bold w-9 text-slate-700 dark:text-zinc-300"><?php echo e($user_rating['stars_3'], false); ?></span>
                                    </span>
    
                                    
                                    <span class="flex items-center w-full gap-2">
                                        <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_2_stars'); ?></label>
                                        <progress max="100" value="<?php echo e($user_rating['stars_2'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-100 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_2'] * 100 / $user_rating['total'], false); ?>%</progress>
                                        <span class="text-xs font-bold w-9 text-slate-700 dark:text-zinc-300"><?php echo e($user_rating['stars_2'], false); ?></span>
                                    </span>
    
                                    
                                    <span class="flex items-center w-full gap-2">
                                        <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_1_star'); ?></label>
                                        <progress max="100" value="<?php echo e($user_rating['stars_1'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-100 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_1'] * 100 / $user_rating['total'], false); ?>%</progress>
                                        <span class="text-xs font-bold w-9 text-slate-700 dark:text-zinc-300"><?php echo e($user_rating['stars_1'], false); ?></span>
                                    </span>
                                    
                                </div>
    
                            </div>
    
                        </section>
                    <?php endif; ?>                      
                </div>

            </div>

            
            <div class="hidden sm:block max-w-2xl mx-auto mt-6 md:mt-14 sm:mt-16 lg:max-w-none lg:mt-0 lg:row-end-2 lg:row-span-2 lg:col-span-3">
            
                <div class="border rounded-2xl p-5">
                                    
                    
                    <div class="flex items-center justify-between mb-3">
                        <div class="font-medium text-xl text-black">
                            <?php echo e(__('messages.t_whats_included'), false); ?>

                        </div>
                        <div class="text-right">
                            <span class="text-black dark:text-white text-2xl tracking-wide font-bold"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <div class="font-medium text-base text-black dark:text-white">
                            <?php echo e($gig->category->name, false); ?>

                        </div>
                        <div class="font-light text-base text-black dark:text-white">
                            <?php echo e($gig->subcategory->name, false); ?>

                        </div>
                    </div>
                    
                    
                    <div class="flex items-center justify-between">
                        <div class="font-light text-base text-black dark:text-white">
                            <?php echo e(__('messages.t_order_in_queue'), false); ?>

                        </div>
                        <div class="text-right">
                            <span class="text-lg text-black dark:text-white tracking-wide font-light">
                            
                                <?php if($gig->total_orders_in_queue() == 1 || $gig->total_orders_in_queue() == 0): ?>
                                    <?php echo e(__('messages.t_order_in_queue_number', ['number' => $gig->total_orders_in_queue()]), false); ?>

                                <?php else: ?>
                                    <?php echo e(__('messages.t_orders_in_queue_number', ['number' => $gig->total_orders_in_queue()]), false); ?>

                                <?php endif; ?>
                                
                            </span>
                        </div>
                    </div>
                    
                    
                    <div class="flex items-center justify-between">
                        <div class="font-light text-base text-black dark:text-white">
                            <?php echo e(__('messages.t_delivery_time_2'), false); ?>

                        </div>
                        <div class="text-right">
                            <span class="text-lg text-black dark:text-white tracking-wide font-light">
                            
                                
                                <?php switch($gig->delivery_time):
                                    case (1): ?>
                                        <?php echo __('messages.t_1_day'); ?>

                                        <?php break; ?>
                                    <?php case (2): ?>
                                        <?php echo __('messages.t_2_days'); ?>

                                        <?php break; ?>
                                    <?php case (3): ?>
                                        <?php echo __('messages.t_3_days'); ?>

                                        <?php break; ?>
                                    <?php case (4): ?>
                                        <?php echo __('messages.t_4_days'); ?>

                                        <?php break; ?>
                                    <?php case (5): ?>
                                        <?php echo __('messages.t_5_days'); ?>

                                        <?php break; ?>
                                    <?php case (6): ?>
                                        <?php echo __('messages.t_6_days'); ?>

                                        <?php break; ?>
                                    <?php case (7): ?>
                                        <?php echo __('messages.t_1_week'); ?>

                                        <?php break; ?>
                                    <?php case (14): ?>
                                        <?php echo __('messages.t_2_weeks'); ?>

                                        <?php break; ?>
                                    <?php case (21): ?>
                                        <?php echo __('messages.t_3_weeks'); ?>

                                        <?php break; ?>
                                    <?php case (30): ?>
                                        <?php echo __('messages.t_1_month'); ?>

                                        <?php break; ?>
                                    <?php default: ?>
                                        
                                <?php endswitch; ?>
                               
                            </span>
                        </div>
                    </div>


                    
                    <?php if($gig->upgrades()->count()): ?>
                        <div class="mt-3">
                            <?php $__currentLoopData = $gig->upgrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $upgrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <label class="relative block py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none bg-transparent" wire:key="add-to-cart-upgrades-<?php echo e($key, false); ?>">
                                    <div class="flex items-center">
                                        <input type="checkbox" value="<?php echo e($upgrade->uid, false); ?>" wire:model.defer="upgrades" class="w-4 h-4 text-primary-600 bg-transparent cursor-pointer rounded-sm ltr:mr-4 rtl:ml-4 border-2 border-gray-300 focus:ring-primary-600">
                                        <div class="text-sm">
                                            <p id="server-size-0-label" class="font-medium text-gray-600 dark:text-gray-300 text-sm"><?php echo e($upgrade->title, false); ?></p>
                                            <div class="text-gray-400">
                                            <?php if($upgrade->extra_days): ?>
                                                <p class="sm:inline text-xs"><?php echo e(__('messages.t_delivery_time_will_be_increased_by_extra', ['time' => delivery_time_trans($upgrade->extra_days)]), false); ?></p>
                                            <?php else: ?>
                                                <p class="sm:inline text-xs"><?php echo e(__('messages.t_no_changes_delivery_time'), false); ?></p>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex text-sm sm:mt-0 ltr:sm:ml-4 rtl:sm:mr-4 sm:text-right items-center justify-center">
                                        <div class="font-bold text-xs text-black dark:text-gray-200"><span class="pr-1 font-normal text-gray-500">+</span><?php echo money($upgrade->price, settings('currency')->code, true); ?></div>
                                    </div>
                                    <div class="absolute -inset-px rounded-lg pointer-events-none" aria-hidden="true"></div>
                                </label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>

                    
                    <div class="mt-6">

                        
                        <button 
                            wire:click="addToCart"
                            wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray cursor-not-allowed"
                            wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer"
                            wire:loading.attr="disabled"
                            class="w-full text-base font-medium flex justify-center bg-primary-700 hover:bg-primary-600 text-white py-3 px-8 rounded-xl tracking-wide focus:outline-none focus:shadow-outline cursor-pointer mb-2"
                            >

                            
                            <div wire:loading wire:target="addToCart">
                                <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                </svg>
                            </div>

                            
                            <div wire:loading.remove wire:target="addToCart">
                                <?php
                                    $price = @money($gig->price, settings('currency')->code, true);
                                ?>
                                
                                <div wire:loading.remove wire:target="addToCart">
                                    <?php echo e(__('messages.t_continue_price', ['price' => $price]), false); ?>

                                </div>
                            </div>
                        </button>

                        
                        <a href="<?php echo e(url('messages/new', $gig->owner->username), false); ?>" target="_blank" class="w-full text-base font-medium flex justify-center bg-gray-400 hover:bg-gray-600 text-white py-3 px-8 rounded-xl tracking-wide focus:outline-none focus:shadow-outline cursor-pointer"><?php echo e(__('messages.t_contact_seller'), false); ?></a>

                    </div>

                </div>

                
                <?php if($gig->documents()->count()): ?>
                    <div class="dark:border-zinc-700 mt-6">
                        <h3 class="text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_documents'), false); ?></h3>
                        <div class="mt-4 text-gray-500">
                            <ul role="list">
                                <?php $__currentLoopData = $gig->documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="py-2 flex items-center justify-between text-sm">
                                        <div class="w-0 flex-1 flex items-center">
                                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z" clip-rule="evenodd"/> </svg>
                                            <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate"> <?php echo e($document->name, false); ?> </span>
                                        </div>
                                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                                            <a href="<?php echo e(url('uploads/documents', $document->uid), false); ?>" target="_blank" class="font-medium text-blue-600 hover:text-blue-500 text-xs hover:underline"> <?php echo e(__('messages.t_download'), false); ?> </a>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>

                
                <div class="dark:border-zinc-700 mt-6">
                    <div class="mt-4 text-gray-500">
                        <ul role="list" class="flex items-center space-x-6 mt-4 rtl:space-x-reverse">

                            
                            <div class="flex items-center group cursor-pointer" id="modals-share-btn">
                                <div class="w-6 h-6 bg-white dark:bg-zinc-700 border drop-shadow-sm border-gray-100 dark:border-zinc-700 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center group-hover:bg-gray-800 dark:group-hover:bg-zinc-600 group-hover:border-transparent">
                                    <svg class="w-3 h-3 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-50" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"></path></svg>
                                </div>
                                <span class="text-sm font-medium text-gray-600 group-hover:text-gray-900 dark:text-gray-300 dark:group-hover:text-gray-200 hidden md:block"><?php echo e(__('messages.t_share'), false); ?></span>
                            </div>

                            
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->id() === $gig->user_id): ?>
                                    <div class="flex items-center group cursor-pointer" @click="youCantReport">
                                <?php else: ?>
                                    <div class="flex items-center group cursor-pointer" id="modals-report-btn">
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php if(auth()->guard()->guest()): ?>
                                <div class="flex items-center group cursor-pointer" @click="loginToReport">
                            <?php endif; ?>
                                <div class="w-6 h-6 bg-white dark:bg-zinc-700 border drop-shadow-sm border-gray-100 dark:border-zinc-700 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center dark:group-hover:bg-zinc-600 group-hover:bg-red-500 group-hover:border-transparent">
                                    <svg class="w-3.5 h-3.5 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-50" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"></path></svg>
                                </div>
                                <span class="text-sm font-medium text-gray-600 dark:text-gray-300 dark:group-hover:text-gray-200 group-hover:text-red-600 hidden md:block"><?php echo e(__('messages.t_report'), false); ?></span>
                            </div>

                            
                            <?php if(auth()->guard()->check()): ?>
                                <?php if(auth()->id() !== $gig->user_id): ?>

                                    
                                    <?php if($inFavorite): ?>
                                        <div class="flex items-center group cursor-pointer" wire:click="removeFromFavorite">
                                            <div class="w-6 h-6 border drop-shadow-sm rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center bg-primary-600 border-transparent">

                                                
                                                <div wire:loading wire:target="removeFromFavorite">
                                                    <svg role="status" class="inline w-3 h-3 animate-spin text-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <svg wire:loading.remove wire:target="removeFromFavorite" class="w-3.5 h-3.5 text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>

                                            </div>
                                            <span class="text-sm font-medium text-primary-600 hidden md:block"><?php echo e(__('messages.t_remove_from_favorite'), false); ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="flex items-center group cursor-pointer" wire:click="addToFavorite">
                                            <div class="w-6 h-6 bg-white dark:bg-zinc-700 border drop-shadow-sm border-gray-100 dark:border-zinc-700 rounded-full md:ltr:mr-2 md:rtl:ml-2 flex items-center justify-center group-hover:bg-primary-600 group-hover:border-transparent dark:group-hover:bg-zinc-600">

                                                
                                                <div wire:loading wire:target="addToFavorite">
                                                    <svg role="status" class="inline w-3 h-3 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 animate-spin group-hover:text-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <svg wire:loading.remove wire:target="addToFavorite" class="w-3.5 h-3.5 text-gray-600 dark:text-gray-200 dark:group-hover:text-gray-100 group-hover:text-gray-50" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>

                                            </div>
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-300 dark:group-hover:text-gray-200 group-hover:text-primary-600 hidden md:block"><?php echo e(__('messages.t_add_to_favorite'), false); ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            
                        </ul>
                    </div>
                </div>
                
            </div>

            
            <div class="w-full max-w-2xl mx-auto lg:max-w-none lg:mt-0 lg:col-span-4">
                <div x-data="Components.tabs()" @tab-click.window="onTabClick" @tab-keydown.window="onTabKeydown">

                    
                    <div class="border-b border-gray-200 dark:border-zinc-700">
                        <div class="-mb-px flex space-x-8 rtl:space-x-reverse" aria-orientation="horizontal" role="tablist">

                            
                            <button id="tab-reviews" class="whitespace-nowrap border-b-2 font-medium py-2 text-base border-primary-600 text-primary-600 focus:outline-none" x-state:on="Selected" x-state:off="Not Selected" :class="{ 'border-primary-600 text-primary-600': selected, 'border-transparent text-gray-700 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-zinc-600': !(selected) }" x-data="Components.tab(0)" aria-controls="tab-panel-reviews" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="0" aria-selected="true">
                                <?php echo e(__('messages.t_this_project_number', ['count' => $gig->counter_reviews]), false); ?>

                            </button>

                            
                            <button id="tab-license" class="focus:outline-none border-transparent text-gray-700 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-zinc-600 whitespace-nowrap py-2 border-b-2 font-medium text-base"
                            :class="{ 'border-primary-600 text-primary-600': selected, 'border-transparent text-gray-700 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200 hover:border-gray-300 dark:hover:border-zinc-600': !(selected) }" x-data="Components.tab(0)" aria-controls="tab-panel-license" role="tab" x-init="init()" @click="onClick" @keydown="onKeydown" @tab-select.window="onTabSelect" :tabindex="selected ? 0 : -1" :aria-selected="selected ? 'true' : 'false'" type="button" tabindex="-1" aria-selected="false">
                                <?php echo e(__('messages.t_all_project_number', ['count' => $user_rating['total']]), false); ?>

                            </button>
                        </div>
                    </div>

                     
                    <div id="tab-panel-reviews" x-data="Components.tabPanel(0)" aria-labelledby="tab-license" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0" style="display: none;">

                        
                        <?php if($gig->counter_reviews): ?>
                            <div class="flow-root pt-6">
                                <div class="-my-6 divide-y divide-gray-100 dark:divide-zinc-700">
    
                                    <?php $__currentLoopData = $gig->reviews()->orderByRaw('RAND()')->take(10)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="py-6">
                                            <div class="flex items-center">
                                                <a href="<?php echo e(url('profile', $review->user->username), false); ?>" target="_blank">
                                                    <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($review->user->avatar), false); ?>" alt="<?php echo e($review->user->username, false); ?>" class="lazy h-12 w-12 rounded-full">
                                                </a>
                                                <div class="ltr:ml-4 rtl:mr-4 group">
                                                    <a href="<?php echo e(url('profile', $review->user->username), false); ?>" target="_blank" class="text-base font-bold text-black dark:text-gray-200 flex items-center group-hover:text-primary-600">
                                                        <?php echo e($review->user->username, false); ?>

                                                        <?php if($review->user->status === 'verified'): ?>
                                                            <img data-tooltip-target="account-verified-badge-<?php echo e($review->uid, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                                            <div id="account-verified-badge-<?php echo e($review->uid, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                <?php echo e(__('messages.t_account_verified'), false); ?>

                                                            </div>
                                                        <?php endif; ?>
    
                                                        
                                                        <?php if($review->user->country): ?>
                                                            <div class="ltr:ml-2 rtl:mr-2">
                                                                <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(countryFlag($review->user->country?->code), false); ?>" alt="<?php echo e($review->user->country?->name, false); ?>" class="lazy h-4 -mt-px rounded-sm">
                                                            </div>
                                                        <?php endif; ?>
    
                                                    </a>
                                                    <div class="mt-1 flex items-start">
                                                        <?php echo render_star_rating($review->rating, "0.85rem", "0.85rem", "#d0d0d0"); ?>

                                                        <span class="ltr:ml-2 rtl:mr-2 text-[11px] font-normal text-gray-400"><span class="ltr:pr-2 rtl:pl-2 text-gray-300">•</span> <?php echo e(format_date($review->created_at, 'ago'), false); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            
                                            <?php if($review->message): ?>
                                                <div class="mt-6 space-y-6 text-lg font-light text-black dark:text-gray-400">
                                                    <p><?php echo e($review->message, false); ?></p>
                                                </div>
                                            <?php endif; ?>
    
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                            </div>
                        <?php else: ?>
                        
                            <div class="mt-10 text-center block text-sm font-normal text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_no_data_to_show_now'), false); ?></div>
    
                        <?php endif; ?>
                    </div>
                    
                   
                    <div id="tab-panel-license" x-data="Components.tabPanel(0)" aria-labelledby="tab-reviews" x-init="init()" x-show="selected" @tab-select.window="onTabSelect" role="tabpanel" tabindex="0">

                        
                        <?php if($user_rating['total'] > 0): ?>
                            <div class="flow-root pt-6">
                                <div class="-my-6 divide-y divide-gray-100 dark:divide-zinc-700">
    
                                    <?php $__currentLoopData = $all_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="py-6">
                                            <div class="flex items-center">
                                                <a href="<?php echo e(url('profile', $review->user->username), false); ?>" target="_blank">
                                                    <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($review->user->avatar), false); ?>" alt="<?php echo e($review->user->username, false); ?>" class="lazy h-12 w-12 rounded-full">
                                                </a>
                                                <div class="ltr:ml-4 rtl:mr-4 group">
                                                    <a href="<?php echo e(url('profile', $review->user->username), false); ?>" target="_blank" class="text-base font-bold text-black dark:text-gray-200 flex items-center group-hover:text-primary-600">
                                                        <?php echo e($review->user->username, false); ?>

                                                        <?php if($review->user->status === 'verified'): ?>
                                                            <img data-tooltip-target="account-verified-badge-<?php echo e($review->uid, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                                            <div id="account-verified-badge-<?php echo e($review->uid, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                <?php echo e(__('messages.t_account_verified'), false); ?>

                                                            </div>
                                                        <?php endif; ?>
    
                                                        
                                                        <?php if($review->user->country): ?>
                                                            <div class="ltr:ml-2 rtl:mr-2">
                                                                <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(countryFlag($review->user->country?->code), false); ?>" alt="<?php echo e($review->user->country?->name, false); ?>" class="lazy h-4 -mt-px rounded-sm">
                                                            </div>
                                                        <?php endif; ?>
    
                                                    </a>
                                                    <div class="mt-1 flex items-start">
                                                        <?php echo render_star_rating($review->rating, "0.85rem", "0.85rem", "#d0d0d0"); ?>

                                                        <span class="ltr:ml-2 rtl:mr-2 text-[11px] font-normal text-gray-400"><span class="ltr:pr-2 rtl:pl-2 text-gray-300">•</span> <?php echo e(format_date($review->created_at, 'ago'), false); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                
                                            
                                            <?php if($review->message): ?>
                                                <div class="mt-6 space-y-6 text-lg font-light text-black dark:text-gray-400">
                                                    <p><?php echo e($review->message, false); ?></p>
                                                </div>
                                            <?php endif; ?>
    
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </div>
                            </div>
                        <?php else: ?>
                        
                            <div class="mt-10 text-center block text-sm font-normal text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_no_data_to_show_now'), false); ?></div>
    
                        <?php endif; ?>

                    </div>
                    
                </div>
            </div>

        </div>

        

    </div>

    
    <?php if($related_gigs): ?>
        <div class="mt-12 sm:mt-24" wire:ignore>

            
            <div class="flex justify-between mb-6">

                <div class="ltr:border-l-8 rtl:border-r-8 border-primary-600 ltr:pl-4 rtl:pr-4">
                    <span class="font-extrabold text-base text-gray-900 dark:text-gray-100 pb-1 tracking-wide block"><?php echo e(__('messages.t_you_may_also_like'), false); ?></span>
                    <p class="text-sm text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_u_may_also_like_the_following_gigs'), false); ?></p>
                </div>

                <div class="hidden md:block">
                    
                    
                    <?php if(config()->get('direction') === 'ltr'): ?>
                        
                        
                        <button id="related-gigs-prev-btn" class="h-8 w-8 rounded-tl-md rounded-bl-md bg-primary-600 hover:bg-primary-600 text-white">
                            <svg class="h-4.5 w-4.5 inline-block" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </button>

                        
                        <button id="related-gigs-next-btn" class="h-8 w-8 rounded-tr-md rounded-br-md bg-primary-600 hover:bg-primary-600 text-white">
                            <svg class="h-4.5 w-4.5 inline-block" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </button>

                    <?php else: ?>
                        
                        
                        <button id="related-gigs-prev-btn" class="h-8 w-8 rounded-tr-md rounded-br-md bg-primary-600 hover:bg-primary-600 text-white">
                            <svg class="h-4.5 w-4.5 inline-block" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </button>

                        
                        <button id="related-gigs-next-btn" class="h-8 w-8 rounded-tl-md rounded-bl-md bg-primary-600 hover:bg-primary-600 text-white">
                            <svg class="h-4.5 w-4.5 inline-block" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
                        </button>

                    <?php endif; ?>

                </div>

            </div>

            
            <div id="slick-related-gigs" class="-mx-3" wire:ignore>
                <?php $__currentLoopData = $related_gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    
                    <div class="mx-3">
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered("related-gigs-item-" . $gig->uid)) {
    $componentId = $_instance->getRenderedChildComponentId("related-gigs-item-" . $gig->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName("related-gigs-item-" . $gig->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild("related-gigs-item-" . $gig->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild("related-gigs-item-" . $gig->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    <?php endif; ?>

    
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->id() !== $gig->user_id): ?>
            <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modals-report-container','target' => 'modals-report-btn','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>
        
                
                 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_report_this_gig'), false); ?> <?php $__env->endSlot(); ?>
        
                
                 <?php $__env->slot('content', null, []); ?> 
                    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
        
                        
                        <div class="col-span-12">
                            <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reason')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_let_us_know_why_u_report_this_gig')),'model' => 'reason','icon' => 'folder-question','maxlength' => '500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                        </div>
        
                    </div>
                 <?php $__env->endSlot(); ?>
        
                
                 <?php $__env->slot('footer', null, []); ?> 
                    <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'report','text' => ''.e(__('messages.t_report'), false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                 <?php $__env->endSlot(); ?>
        
             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
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
<?php $component->withAttributes(['id' => 'modals-share-container','target' => 'modals-share-btn','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-2xl']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_share_this_gig'), false); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="items-center justify-center md:flex md:space-y-0 space-y-4">

                
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

    
    <script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    
    <script defer src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js"></script>

    
    <script src="<?php echo e(url('public/js/components.js'), false); ?>"></script>

    
    <script>
        function oZcfXWmBuWfxbIo() {
            return {

                cart: [],
                isCopied: false,

                // Initialize main carousel
                initMainCarousel() {
                    var main = new Splide( '#main-carousel', {
                        type        : 'loop',
                        cover       : false,
                        autoplay    : true,
                        pauseOnHover: true,
                        heightRatio : 0.3,
                        height      : this.$width < 600 ? 250 : 530,
                        rewind      : true,
                        pagination  : true,
                        arrows      : true,
                        video       : {
                            loop         : true,
                            mute         : false
                        },
                    } );
                    
                    var thumbnails = new Splide( '#thumbnail-carousel', {
                        fixedWidth  : 100,
                        fixedHeight : 60,
                        gap         : 10,
                        rewind      : true,
                        pagination  : false,
                        isNavigation: true,
                        breakpoints : {
                        600: {
                            fixedWidth : 60,
                            fixedHeight: 44,
                        },
                        },
                    } );

                    main.sync( thumbnails );
                    main.mount(window.splide.Extensions);
                    thumbnails.mount();
                },

                initRelatedCarousel() {
                    $('#slick-related-gigs').slick({
                        dots          : false,
                        infinite      : true,
                        speed         : 300,
                        slidesToShow  : 4,
                        slidesToScroll: 1,
                        prevArrow     : $('#related-gigs-prev-btn'),
                        nextArrow     : $('#related-gigs-next-btn'),
                        responsive    : [
                            {
                            breakpoint: 1024,
                                settings: {
                                    slidesToShow  : 3,
                                    slidesToScroll: 3
                                }
                            },
                            {
                            breakpoint: 600,
                                settings: {
                                    slidesToShow  : 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                            breakpoint: 480,
                                settings: {
                                    slidesToShow  : 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                },

                // Copy link
                copy() {

                    // Set gig link
                    const url = "<?php echo e(url()->current(), false); ?>";

                    var _this = this;
                    navigator.clipboard.writeText(url).then(function() {
                        _this.isCopied = true;
                        setTimeout(() => {
                            _this.isCopied = false
                        }, 2000);
                    }, function(err) {
                    });

                },

                // Splide Sliders
                splides() {
                    var splides = document.getElementsByClassName( 'splide' );
            
                    for ( var i = 0, len = splides.length; i < len; i++ ) {
                        if (splides[i].id !== 'main-carousel' && splides[i].id !== 'thumbnail-carousel') {
                            new Splide( splides[ i ], {
                                type        : 'loop',
                                cover       : true,
                                autoplay    : false,
                                pauseOnHover: true,
                                heightRatio : 0.3,
                                height      : 200,
                                rewind      : true,
                                pagination  : false,
                                arrows      : true,
                                video       : {
                                    loop         : true,
                                    mute         : true
                                },
                            } ).mount(window.splide.Extensions);
                        }
                    }
                },

                // Init alpinejs
                initialize() {
                    var _this = this;

                    // Wait until page loaded
                    document.addEventListener( 'DOMContentLoaded', function () {

                        // Initialize carousel
                        _this.initMainCarousel();

                        // Initialize related gigs carousel
                        _this.initRelatedCarousel();

                        // Splide Plugin
                        _this.splides();

                    });
                },

                youCantReport() {
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_info'), false); ?>",
                        description: "<?php echo e(__('messages.t_u_cant_report_this_gig'), false); ?>",
                        icon       : 'info'
                    });
                },

                loginToReport() {
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_info'), false); ?>",
                        description: "<?php echo e(__('messages.t_pls_login_or_register_to_report_this_gig'), false); ?>",
                        icon       : 'info'
                    });
                },

                scrollToReviews() {
                    document.querySelector('#reviews-container').scrollIntoView({
                        behavior: 'smooth'
                    });
                }

            }
        }
        window.oZcfXWmBuWfxbIo = oZcfXWmBuWfxbIo();
    </script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">

    
    <link rel="stylesheet" href="<?php echo e(url('public/css/ckeditor-inline.css'), false); ?>">

    
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/service/service.blade.php ENDPATH**/ ?>