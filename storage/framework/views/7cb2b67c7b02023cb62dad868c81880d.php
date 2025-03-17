<div class="w-full relative">

    
    <div wire:loading wire:loading.block>
        <div class="absolute w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50 rounded-lg">
            <div class="lds-ripple"><div></div><div></div></div>
        </div>
    </div>

    
    <div class="relative bg-white dark:bg-zinc-800 border-b border-gray-300 px-4 py-5 sm:px-6 mt-6 <?php echo e($view_data['bid']['is_highlight'] ? 'ltr:border-l-8 rtl:border-l-8 border-amber-300' : '', false); ?>">
    
        
        <div class="sm:flex items-center justify-between mb-8">
    
            
            <div class="flex items-center sm:space-x-4 rtl:space-x-reverse">
    
                
                  <a href="<?php echo e(url('profile', $view_data['freelancer']['username']), false); ?>" class="hidden sm:block">
                    <img class="border border-gray-200 rounded-full h-12 w-12 object-cover object-center lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e($view_data['freelancer']['avatar'], false); ?>" alt="<?php echo e($view_data['freelancer']['username'], false); ?>">
                </a>
    
                
                <div class="space-y-0.5">
    
                    <div class="flex items-center">
    
                        
                        <?php if($view_data['freelancer']['fullname']): ?>
                            <span class="font-medium text-black text-lg hover:text-black ltr:pr-1 rtl:pl-1 dark:text-zinc-300 dark:hover:text-white">
                                <?php echo e($view_data['freelancer']['fullname'], false); ?>

                            </span>
                        <?php endif; ?>
    
                        
                        <a href="<?php echo e(url('profile', $view_data['freelancer']['username']), false); ?>" class="font-normal text-gray-300 text-sm hover:text-primary-600 focus:text-primary-600 inline-flex items-center dark:text-zinc-400">
                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10c1.466 0 2.961-.371 4.442-1.104l-.885-1.793C14.353 19.698 13.156 20 12 20c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8v1c0 .692-.313 2-1.5 2-1.396 0-1.494-1.819-1.5-2V8h-2v.025A4.954 4.954 0 0 0 12 7c-2.757 0-5 2.243-5 5s2.243 5 5 5c1.45 0 2.748-.631 3.662-1.621.524.89 1.408 1.621 2.838 1.621 2.273 0 3.5-2.061 3.5-4v-1c0-5.514-4.486-10-10-10zm0 13c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3z"></path></svg>
                            <span><?php echo e($view_data['freelancer']['username'], false); ?></span>
                        </a>
    
                    </div>
    
                    
                    <div class="flex items-center space-x-3 rtl:space-x-reverse text-[13px]">
    
                        
                        <?php if($view_data['freelancer']['country']): ?>
                            <p class="flex items-center space-x-1 rtl:space-x-reverse">
                                <img class="h-4 ltr:pr-0.5 rtl:pl-0.5 -mt-0.5 lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(countryFlag($view_data['freelancer']['country']['code']), false); ?>" alt="<?php echo e($view_data['freelancer']['country']['name'], false); ?>">
                                <span class="text-black dark:text-zinc-300 hidden sm:block"><?php echo e($view_data['freelancer']['country']['name'], false); ?></span>
                            </p>
                        <?php endif; ?>
    
                        
                        <p class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                            <svg aria-hidden="true" class="w-5 h-5 <?php echo e($view_data['freelancer']['rating'] == 0 ? 'text-gray-400' : 'text-amber-500', false); ?> -mt-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <span class="dark:text-zinc-300">
                                <?php echo e($view_data['freelancer']['rating'], false); ?>

                            </span>
                        </p>
    
                        
                        <?php if($view_data['freelancer']['verified']): ?>
                            <div class="mx-2 my-0.5 text-gray-300 dark:text-zinc-600">|</div>
                            <div class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                <svg class="w-4 h-4 text-blue-500 -mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span class="dark:text-zinc-300"><?php echo app('translator')->get('messages.t_verified_account'); ?></span>
                            </div>
                        <?php endif; ?>
    
                    </div>
    
                </div>
    
            </div>
            
            
            <div class="shrink-0">
                <div class="mt-4 sm:mt-0 sm:flex items-center justify-between sm:space-x-2 rtl:space-x-reverse">

                    
                    <?php if($view_data['bid']['is_awarded']): ?>
                        <div class="flex items-center space-x-2 rtl:space-x-reverse text-[13px] font-medium text-white bg-primary-600 px-3 py-2 rounded-sm mb-2 sm:mb-0 justify-center">
                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"></path></svg>
                            <span><?php echo app('translator')->get('messages.t_awarded'); ?></span>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($view_data['bid']['amount'] && $view_data['bid']['days']): ?>
                        <span class="flex items-center text-sm font-normal text-gray-500 dark:bg-zinc-700 dark:text-zinc-400 px-3 py-2 rounded-sm justify-center">
                            <span class="font-semibold text-black text-xl dark:text-white"><?php echo money($view_data['bid']['amount'], settings('currency')->code, true); ?></span>
                            <span class="mx-2">/</span>
                            <div class="text-lg text-black">
                                <?php if($view_data['bid']['days'] === 1): ?>
                                    <?php echo e($view_data['bid']['days'], false); ?> <?php echo e(strtolower(__('messages.t_day')), false); ?>

                                <?php else: ?>
                                    <?php echo e($view_data['bid']['days'], false); ?> <?php echo e(strtolower(__('messages.t_days')), false); ?>

                                <?php endif; ?>	
                            </div>
                        </span>
                    <?php endif; ?>

                </div>
            </div>
                        
        </div>
        
        
        <?php if($view_data['bid']['message']): ?>
    
            
            <div class="mb-2 font-normal text-sm leading-relaxed text-black dark:text-gray-300">
                <?php if(strlen($view_data['bid']['message']) > 250): ?>
                    <div class="break-all">

                        
                        <span style="word-break: break-word;" id="bid-card-message-short-<?php echo e($view_data['bid']['id'], false); ?>">
                            <?php echo e(add_3_dots(htmlspecialchars_decode($view_data['bid']['message']), 220, null), false); ?>

                        </span>

                        
                        <span style="word-break: break-word;" id="bid-card-message-long-<?php echo e($view_data['bid']['id'], false); ?>" class="hidden">
                            <?php echo nl2br(htmlspecialchars_decode($view_data['bid']['message'])); ?>

                        </span>

                        
                        <span class="whitespace-nowrap before:content-['['] after:content-[']'] before:px-1 after:px-1 text-sm font-semibold text-blue-600 hover:underline cursor-pointer hover:text-blue-500" id="bid-card-message-more-less-button-<?php echo e($view_data['bid']['id'], false); ?>"><?php echo app('translator')->get('messages.t_more'); ?></span>
                            
                    </div>
                    <script>
                        const target_btn_<?php echo e($view_data['bid']['id'], false); ?>   = document.getElementById("bid-card-message-more-less-button-<?php echo e($view_data['bid']['id'], false); ?>");
                        const target_short_<?php echo e($view_data['bid']['id'], false); ?> = document.getElementById("bid-card-message-short-<?php echo e($view_data['bid']['id'], false); ?>");
                        const target_long_<?php echo e($view_data['bid']['id'], false); ?>  = document.getElementById("bid-card-message-long-<?php echo e($view_data['bid']['id'], false); ?>");
                        target_btn_<?php echo e($view_data['bid']['id'], false); ?>.onclick = function() {
                            if (target_long_<?php echo e($view_data['bid']['id'], false); ?>.classList.contains('hidden')) {
                                target_short_<?php echo e($view_data['bid']['id'], false); ?>.classList.add('hidden');
                                target_long_<?php echo e($view_data['bid']['id'], false); ?>.classList.remove('hidden');
                                target_btn_<?php echo e($view_data['bid']['id'], false); ?>.innerHTML = "<?php echo e(__('messages.t_less'), false); ?>";
                            } else {
                                target_short_<?php echo e($view_data['bid']['id'], false); ?>.classList.remove('hidden');
                                target_long_<?php echo e($view_data['bid']['id'], false); ?>.classList.add('hidden');
                                target_btn_<?php echo e($view_data['bid']['id'], false); ?>.innerHTML = "<?php echo e(__('messages.t_more'), false); ?>";
                            }
                        }
                    </script>
                <?php else: ?>
                    <?php echo nl2br($view_data['bid']['message']); ?>

                <?php endif; ?>
            </div>
    
        <?php elseif($view_data['bid']['is_sealed']): ?>
    
            
            <div class="flex flex-col items-center justify-between rounded-lg border border-slate-200 px-4 py-3 text-gray-500 sm:flex-row sm:px-5">
                
                
                <div class="flex items-center space-x-3 rtl:space-x-reverse">
                    <svg class="w-8 h-8 text-slate-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path><path d="M11 11h2v6h-2zm0-4h2v2h-2z"></path></svg>
                    <p class="text-sm"><?php echo app('translator')->get('messages.t_this_bid_sealed_explain'); ?></p>
                </div>
    
                
                <span class="text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-0 font-medium rounded-full text-xs tracking-wide px-8 py-2 text-center ltr:ml-6 rtl:mr-6">
                    <?php echo app('translator')->get('messages.t_sealed'); ?>
                </span>
                
            </div>
    
        <?php endif; ?>
    
        
        <div class="mt-6 flex justify-between items-center">

            
            <div class="space-x-2 rtl:space-x-reverse">
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->user()->uid === $view_data['project']['employer_id']): ?>
                        
                        
                        <?php if($view_data['project']['status'] === 'active' && !$view_data['bid']['is_awarded']): ?>
                            <button x-on:click="$wire.accept" class="inline-flex items-center rounded border bg-primary-600 px-2.5 py-1.5 text-xs font-semibold text-white shadow-sm hover:bg-primary-400 focus:outline-none focus:ring-1 focus:ring-opacity-50 focus:ring-zinc-300 focus:ring-offset-2 focus:ring-offset-zinc-100 space-x-1 rtl:space-x-reverse dark:shadow-none dark:bg-zinc-700 dark:border-zinc-800 dark:hover:bg-zinc-700/40 dark:text-zinc-300 dark:hover:text-gray-100 dark:ring-offset-zinc-500">
                                <svg class="w-4 h-4 text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                <span><?php echo app('translator')->get('messages.t_award'); ?></span>
                            </button>
                        <?php endif; ?>
        
                        
                        <?php if($view_data['project']['status'] === 'active' && $view_data['bid']['is_awarded']): ?>
                            <button x-on:click="$wire.revoke" class="inline-flex items-center rounded border border-red-400 bg-white px-2.5 py-1.5 text-xs font-semibold text-red-600 hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-opacity-50 focus:ring-zinc-300 focus:ring-offset-2 focus:ring-offset-zinc-100 space-x-1 rtl:space-x-reverse dark:shadow-none dark:bg-zinc-700 dark:border-zinc-800 dark:hover:bg-zinc-700/40 dark:text-zinc-300 dark:hover:text-gray-100 dark:ring-offset-zinc-500">
                                <svg class="w-4 h-4 text-red-600" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M289.94 256l95-95A24 24 0 00351 127l-95 95-95-95a24 24 0 00-34 34l95 95-95 95a24 24 0 1034 34l95-95 95 95a24 24 0 0034-34z"></path></svg>
                                <span><?php echo app('translator')->get('messages.t_revoke'); ?></span>
                            </button>
                        <?php endif; ?>
        
                        
                        <?php if($this->view_data['freelancer']['chat']): ?>
                            <a href="<?php echo e(url('messages/new', $view_data['freelancer']['username']), false); ?>" class="inline-flex items-center rounded border border-primary-600 bg-white px-2.5 py-1.5 text-xs font-semibold text-primary-600 hover:bg-gray-50 focus:outline-none focus:ring-1 focus:ring-opacity-50 focus:ring-zinc-300 focus:ring-offset-2 focus:ring-offset-zinc-100 space-x-1 rtl:space-x-reverse dark:shadow-none dark:bg-zinc-700 dark:border-zinc-800 dark:hover:bg-zinc-700/40 dark:text-zinc-300 dark:hover:text-gray-100 dark:ring-offset-zinc-500">
                                <svg class="w-4 h-4 text-primary-600" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M10 3h4a8 8 0 1 1 0 16v3.5c-5-2-12-5-12-11.5a8 8 0 0 1 8-8z"></path></g></svg>
                                <span><?php echo app('translator')->get('messages.t_chat_now'); ?></span>
                            </a>
                        <?php endif; ?>

                    <?php endif; ?>
                <?php endif; ?>
            </div>
    
            <aside class="flex items-center mt-3 space-x-5 rtl:space-x-reverse text-xs text-gray-500 dark:text-zinc-300">
    
                
                <?php if($view_data['bid']['is_sponsored']): ?>
                    <div class="flex items-center space-x-1 rtl:space-x-reverse">
                        <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11.219 3.375 8 7.399 4.781 3.375A1.002 1.002 0 0 0 3 4v15c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V4a1.002 1.002 0 0 0-1.781-.625L16 7.399l-3.219-4.024c-.381-.474-1.181-.474-1.562 0zM5 19v-2h14.001v2H5zm10.219-9.375c.381.475 1.182.475 1.563 0L19 6.851 19.001 15H5V6.851l2.219 2.774c.381.475 1.182.475 1.563 0L12 5.601l3.219 4.024z"></path></svg>
                        <span><?php echo e(__('messages.t_sponsored'), false); ?></span>
                    </div>
                <?php endif; ?>
    
                
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                    <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 4c-4.879 0-9 4.121-9 9s4.121 9 9 9 9-4.121 9-9-4.121-9-9-9zm0 16c-3.794 0-7-3.206-7-7s3.206-7 7-7 7 3.206 7 7-3.206 7-7 7z"></path><path d="M13 12V8h-2v6h6v-2zm4.284-8.293 1.412-1.416 3.01 3-1.413 1.417zm-10.586 0-2.99 2.999L2.29 5.294l2.99-3z"></path></svg>
                    <span><?php echo e(format_date($view_data['bid']['date'], 'ago'), false); ?></span>
                </div>
    
                
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->id() != $view_data['freelancer']['id']): ?>
                        <div class="flex items-center space-x-1 rtl:space-x-reverse hover:underline cursor-pointer" id="modal-report-bid-button-<?php echo e($bid_id, false); ?>">
                            <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M11 7h2v7h-2zm0 8h2v2h-2z"></path><path d="m21.707 7.293-5-5A.996.996 0 0 0 16 2H8a.996.996 0 0 0-.707.293l-5 5A.996.996 0 0 0 2 8v8c0 .266.105.52.293.707l5 5A.996.996 0 0 0 8 22h8c.266 0 .52-.105.707-.293l5-5A.996.996 0 0 0 22 16V8a.996.996 0 0 0-.293-.707zM20 15.586 15.586 20H8.414L4 15.586V8.414L8.414 4h7.172L20 8.414v7.172z"></path></svg>
                            <span><?php echo app('translator')->get('messages.t_report_bid'); ?></span>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
    
                
                <?php if(auth()->guard()->check()): ?>
                    <?php if(auth()->id() == $view_data['freelancer']['id'] && !$view_data['bid']['is_awarded'] && $view_data['project']['status'] === 'active' && !$view_data['project']['awarded']): ?>
                        <a href="<?php echo e(url('seller/projects/bids/edit', $bid_id), false); ?>" class="flex items-center space-x-1 rtl:space-x-reverse hover:underline cursor-pointer">
                            <svg class="w-4 h-4 text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                            <span><?php echo app('translator')->get('messages.t_edit_bid'); ?></span>
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
    
            </aside>
    
        </div>
    
    </div>
    
    
    <?php if(auth()->guard()->check()): ?>
        <?php if(auth()->id() != $view_data['freelancer']['id']): ?>
            <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-report-bid-container-'.e($bid_id, false).'','target' => 'modal-report-bid-button-'.e($bid_id, false).'','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-xl']); ?>
            
                
                 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_what_is_wrong_with_this_bid'), false); ?> <?php $__env->endSlot(); ?>
            
                
                 <?php $__env->slot('content', null, []); ?> 
                    <div class="grid grid-cols-12 gap-y-6 py-2">
            
                        
                        <div class="col-span-12">
                            <fieldset class="w-full">
                                <div class="space-y-4">
            
                                    
                                    <?php for($i = 1; $i <= 4; $i++): ?>
                                        <div class="flex items-center">
                                            <input wire:model.defer="report_reason" value="reason_<?php echo e($i, false); ?>" id="report_bid_<?php echo e($bid_id, false); ?>_reason_<?php echo e($i, false); ?>" name="report_reason" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-700 border-gray-300 dark:bg-transparent dark:border-zinc-600 dark:focus:ring-offset-zinc-500 dark:focus:ring-zinc-500 dark:text-zinc-600">
                                            <label for="report_bid_<?php echo e($bid_id, false); ?>_reason_<?php echo e($i, false); ?>" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-zinc-200"> 
                                                <?php echo e(__('messages.t_report_bid_reason_' . $i), false); ?>  
                                            </label>
                                        </div>
                                    <?php endfor; ?>
                                    
                                </div>
                            </fieldset>
                        </div>
            
                        
                        <div class="col-span-12">
            
                            
                            <div class="relative w-full">
            
                                
                                <textarea wire:model.defer="report_description" id="bid-report-description-input" class="<?php echo e($errors->first('report_description') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300', false); ?> border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 placeholder:font-normal" rows="8" placeholder="<?php echo e(__('messages.t_enter_issue_description'), false); ?>"></textarea>
            
                                
                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
                                    <svg class="w-5 h-5 text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                </div>
            
                            </div>
            
                            
                            <?php $__errorArgs = ['report_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                                    <?php echo e($errors->first('report_description'), false); ?>

                                </p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            
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
<?php $component->withAttributes(['action' => 'report','text' => ''.e(__('messages.t_continue'), false).'','block' => 0]); ?>
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

    
    <?php if($view_data['bid']['is_awarded']): ?>
        <script>
            document.addEventListener('update-awarded-bid-card', (e) => {

                // Get bid id
                const bid_id         = "<?php echo e($view_data['bid']['id'], false); ?>";

                // Get awarded bid id
                const awarded_bid_id = e.detail;

                //  Check if they match
                if (bid_id === awarded_bid_id) {
                    window.livewire.find('<?php echo e($_instance->id, false); ?>').updateBid();
                }

            });
        </script>
    <?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/cards/bid.blade.php ENDPATH**/ ?>