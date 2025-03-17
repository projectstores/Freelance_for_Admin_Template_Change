<div class="w-full md:max-w-7xl mx-auto block" x-data="window.rxhfJIyOMMqiyHB">

    
    <?php if($user->availability): ?>
        <div class="p-4 md:p-5 rounded text-orange-700 bg-orange-100 mb-6">
            <div class="flex items-center mb-2">
                <svg class="inline-block w-5 h-5 ltr:mr-3 rtl:ml-3 flex-none text-orange-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <h3 class="font-semibold"><?php echo e(__('messages.t_this_user_is_not_available_right_now_msg', ['date' => format_date($user->availability?->expected_available_date, config('carbon-formats.F_j,_Y'))]), false); ?></h3>
            </div>
            <p class="ltr:ml-8 rtl:mr-8">
                <?php echo e($user->availability?->message, false); ?>

            </p>
        </div>
    <?php endif; ?>

    <div class="w-full border border-gray-300 rounded-3xl">

        
        <div class="px-3 py-8 border-b border-gray-300">

            <div class="mx-auto px-8 md:flex md:items-center md:justify-between">
                <div class="flex items-center md:space-x-5 rtl:space-x-reverse flex-col md:flex-row">

                    
                    <div class="relative inline-block w-24 h-24">
                        <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($user->avatar), false); ?>" alt="<?php echo e($user->username, false); ?>" class="w-full h-full rounded-full border border-gray-200 object-cover lazy">
                        <div class="absolute top-3 left-2 w-4 h-4 <?php echo e($user->isOnline() ? 'bg-primary-700' : 'bg-gray-400', false); ?> rounded-full border-2 border-white"></div>
                    </div>
                    

                    
                    <div>

                            
                            <div class="flex items-center mb-1 justify-center md:justify-normal">

                                
                                <?php if($user->fullname): ?>
                                    <h1 class="text-3xl font-bold text-black dark:text-zinc-100"><?php echo e($user->fullname, false); ?></h1>
                                <?php else: ?>
                                    <h1 class="text-3xl font-bold text-black dark:text-zinc-100"><?php echo e($user->username, false); ?></h1>
                                <?php endif; ?>

                                
                                <?php if($user->status === 'verified'): ?>
                                    <div>
                                        <svg data-popover-target="popover-profile-verified-<?php echo e($user->uid, false); ?>" data-popover-placement="bottom" class="ml-1 text-sky-400" xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="21px" fill="#2d8ceb">
                                            <path d="m438-338 226-226-57-57-169 169-84-84-57 57 141 141Zm42 258q-139-35-229.5-159.5T160-516v-244l320-120 320 120v244q0 152-90.5 276.5T480-80Z"/>
                                        </svg>
                                        <div data-popover id="popover-profile-verified-<?php echo e($user->uid, false); ?>" role="tooltip" class="absolute z-50 invisible inline-block w-64 text-xs tracking-wide text-gray-600 transition-opacity duration-300 bg-gray-50 border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800 leading-relaxed">
                                            <div class="px-3 py-2">
                                                <p><?php echo app('translator')->get('messages.t_this_freelancer_id_has_verified_gov_id_check_tooltip'); ?></p>
                                            </div>
                                            <div data-popper-arrow></div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                
                                <?php if($user->fullname): ?>
                                    <div class="md:items-center md:justify-center text-xs text-gray-300 font-medium ltr:!ml-1 rtl:!mr-1 -mt-0.5 hidden md:flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M14.243 5.757a6 6 0 10-.986 9.284 1 1 0 111.087 1.678A8 8 0 1118 10a3 3 0 01-4.8 2.401A4 4 0 1114 10a1 1 0 102 0c0-1.537-.586-3.07-1.757-4.243zM12 10a2 2 0 10-4 0 2 2 0 004 0z" clip-rule="evenodd"/></svg>
                                        <span><?php echo e($user->username, false); ?></span>
                                    </div>
                                <?php endif; ?>

                            </div>

                            
                            <div class="flex items-center md:space-x-3 rtl:space-x-reverse mb-1 justify-center md:justify-normal space-y-1 md:space-y-0 flex-col md:flex-row">
                            
                                
                                <?php if($user->country): ?>
                                   
                                        <svg xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="21px" fill="#a1a1a1"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                                        <div>
                                            <?php if($user->city): ?>
                                                <span class="font-normal ltr:pr-1 rtl:pl-1 text-gray-400 dark:text-gray-300"><?php echo e($user->city, false); ?>,</span>
                                            <?php endif; ?>
                                            <span class="font-normal text-gray-400 dark:text-gray-300"><?php echo e($user->country->name, false); ?></span>
                                            
                                            <?php if($user->timezone): ?>
                                                <?php
                                                    try {
                                                        
                                                        $date = now($user->timezone);
                                                        $now  = $date->format(config('carbon-formats.H_i_A'));
                    
                                                        // Set hour
                                                        $hour = $date->format('H');
                    
                                                        // Check day or night
                                                        if ($hour >= 6 && $hour <= 18) {
                                                            $zone = 'day';
                                                        } else {
                                                            $zone = 'night';
                                                        }
                    
                                                    } catch (\Throwable $th) {
                                                        
                                                        // Error
                                                        $date = now();
                                                        $now  = $date->format(config('carbon-formats.H_i_A'));
                    
                                                        // Set hour
                                                        $hour = $date->format('H');
                    
                                                        // Check day or night
                                                        if ($hour >= 6 && $hour <= 18) {
                                                            $zone = 'day';
                                                        } else {
                                                            $zone = 'night';
                                                        }
                    
                                                    }
                                                ?> 
                                                    <div class="inline-flex items-start rtl:space-x-reverse">
                                                        <span class="font-normal text-gray-400 dark:text-gray-300 mx-1">—</span>
                                                        
                                                        <span class="font-normal text-gray-400 dark:text-gray-300"><?php echo e($now, false); ?> <?php echo app('translator')->get('messages.t_local_time'); ?></span>
                    
                                                    </div>
                                            <?php endif; ?>
                                        </div>
                                   
                                <?php endif; ?>

                            </div>
                            
                            
                            <div class="flex items-center md:space-x-3 rtl:space-x-reverse justify-center md:justify-normal space-y-1 md:space-y-0 flex-col md:flex-row">
                                
                                
                                <?php if($user->level): ?>
                                    <span class="inline-flex items-center font-normal tracking-wide text-black dark:text-white">
                                        <svg class="border-2 border-green-500 text-green-600 rounded-full mr-1 p-0.5 h-6 w-6" class="mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="m296-224-56-56 240-240 240 240-56 56-184-183-184 183Zm0-240-56-56 240-240 240 240-56 56-184-183-184 183Z"/></svg>
                                        <span class="whitespace-nowrap"><?php echo e($user->level->title, false); ?></span>
                                    </span>
                                <?php endif; ?>

                                
                                <?php if($user->account_type === 'seller' && !$user->availability): ?>
                                    <span class="inline-flex items-center font-normal tracking-wide text-black dark:text-white whitespace-nowrap">
                                        <svg class="border-2 border-violet-500 text-violet-600 rounded-full mr-1 p-1 h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960" fill="currentColor"><path d="m280-80 160-300-320-40 480-460h80L520-580l320 40L360-80h-80Z"/></svg>
                                        <?php echo app('translator')->get('messages.t_available_now'); ?>
                                    </span>
                                <?php endif; ?>
                            </div>
                            
                    </div>

                </div>
                
                
                <div class="flex items-center space-x-2 rtl:space-x-reverse justify-center md:justify-normal">

                    
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(settings('publish')->enable_custom_offers && auth()->id() != $user->id && $user->account_type === 'seller'): ?>
                            <button type="button" id="modal-send-custom-offer-button" class="bg-primary-700 py-1.5 hover:bg-primary-500 focus:ring-0 focus:outline-none dark:hover:text-zinc-400 px-4 dark:hover:bg-zinc-600 dark:bg-zinc-700 dark:border-transparent cursor-pointer rounded text-[13px] font-medium tracking-wide h-9 flex items-center justify-center">
                                <span class="whitespace-nowrap pt-px text-white"><?php echo app('translator')->get('messages.t_send_an_offer'); ?></span>
                            </button>
                        <?php endif; ?>
                    <?php endif; ?>

                    
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(auth()->id() != $user->id): ?>
                            <div class="w-9 h-9">
                                <a href="<?php echo e(url('messages/new', $user->username), false); ?>" data-tooltip-target="tooltip-profile-page-contact-user" class="text-zinc-400 hover:text-zinc-500 bg-white hover:bg-gray-100 border-2 border-primary-700 cursor-pointer rounded focus:outline-none h-9 w-9 flex items-center justify-center dark:border-zinc-700 dark:bg-zinc-700/40 dark:text-zinc-400 dark:hover:bg-zinc-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-700" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/></svg>
                                </a>
                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-profile-page-contact-user','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_contact_me'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                    
                    <div class="w-9 h-9">
                        <button type="button" id="modal-share-profile-button" data-tooltip-target="tooltip-profile-page-share-user" class="text-zinc-400 hover:text-zinc-500 bg-white hover:bg-gray-100 border-2 border-primary-700 cursor-pointer rounded focus:outline-none h-9 w-9 flex items-center justify-center dark:border-zinc-700 dark:bg-zinc-700/40 dark:text-zinc-400 dark:hover:bg-zinc-800">
                            <svg class="h-5 w-5 text-primary-700" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M444.7 230.4l-141.1-132c-1.7-1.6-3.3-2.5-5.6-2.4-4.4.2-10 3.3-10 8v66.2c0 2-1.6 3.8-3.6 4.1C144.1 195.8 85 300.8 64.1 409.8c-.8 4.3 5 8.3 7.7 4.9 51.2-64.5 113.5-106.6 212-107.4 2.2 0 4.2 2.6 4.2 4.8v65c0 7 9.3 10.1 14.5 5.3l142.1-134.3c2.6-2.4 3.4-5.2 3.5-8.4-.1-3.2-.9-6.9-3.4-9.3z"></path></svg>
                        </button>
                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-profile-page-share-user','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_share_profile'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                    </div>

                    
                    <?php if(auth()->guard()->check()): ?>
                        <?php if($user->id != auth()->id()): ?>
                            <div class="w-9 h-9">
                                <button id="modal-report-button" type="button" data-tooltip-target="tooltip-profile-page-report-user" class="text-zinc-400 bg-white hover:bg-gray-100 border-2 border-primary-700 hover:text-red-600 cursor-pointer rounded focus:outline-none h-9 w-9 flex items-center justify-center dark:border-zinc-700 dark:bg-zinc-700/40 dark:text-zinc-400 dark:hover:bg-zinc-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary-700" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                </button>
                                <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-profile-page-report-user','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_report_user'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>

            </div>

        </div>

        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-y-6">

            
            <div class="bg-white dark:divide-zinc-700 h-fit pb-8">

                
                <div class="border-b border-gray-300 px-8 py-8">

                    
                    <div class="list-inside text-gray-500 dark:text-zinc-300 text-sm space-y-3">

                        
                        <div>
                            <div>
                                <div class="text-black font-bold text-xl dark:text-white"><?php echo app('translator')->get('messages.t_member_since_2'); ?></div>
                                <div class="text-gray-600 text-base font-lg ltr:ml-2 rtl:mr-2"><?php echo e(format_date($user->created_at, config('carbon-formats.F_j,_Y')), false); ?></div>
                            </div>
                        </div>
                        
                        
                        <?php if($user->account_type === 'seller' && $last_delivery): ?>
                            <div>
                                <div class="mt-5">
                                    <div class="text-black font-bold text-xl dark:text-white"><?php echo app('translator')->get('messages.t_last_delivery_2'); ?></div>
                                    <div class="text-gray-600 text-base font-normal ltr:ml-2 rtl:mr-2"><?php echo e(format_date($last_delivery), false); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>
                
                
                <?php if($seller_loyalty): ?>
                    <div class="border-b border-gray-300 px-8 py-8">
                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" height="64px" viewBox="0 -960 960 960" width="64px" fill="#e6b122"><path d="m363-310 117-71 117 71-31-133 104-90-137-11-53-126-53 126-137 11 104 90-31 133ZM480-28 346-160H160v-186L28-480l132-134v-186h186l134-132 134 132h186v186l132 134-132 134v186H614L480-28Z"/></svg>
                            <div class="flex flex-col">
                                <h5 class="flex items-center space-x-1 rtl:space-x-reverse text-base font-medium text-black dark:text-zinc-100">
                                    <span class="text-black font-bold text-xl"><?php echo app('translator')->get('messages.t_top_rated'); ?></span>
                                    <svg data-popover-target="popover-profile-seller-loyalty-<?php echo e($user->uid, false); ?>" data-popover-placement="bottom" class="w-4.5 h-4.5 text-gray-300 dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 56C145.72 56 56 145.72 56 256s89.72 200 200 200 200-89.72 200-200S366.28 56 256 56zm0 82a26 26 0 11-26 26 26 26 0 0126-26zm48 226h-88a16 16 0 010-32h28v-88h-16a16 16 0 010-32h32a16 16 0 0116 16v104h28a16 16 0 010 32z"></path></svg>
                                    <div data-popover id="popover-profile-seller-loyalty-<?php echo e($user->uid, false); ?>" role="tooltip" class="absolute z-50 invisible inline-block w-64 text-xs tracking-wide text-gray-600 transition-opacity duration-300 bg-gray-50 border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-zinc-400 dark:border-zinc-700 dark:bg-zinc-900 leading-relaxed">
                                        <div class="px-3 py-2">
                                            <p><?php echo app('translator')->get('messages.t_people_keep_returning_to_username_tooltip', ['username' => $user->username]); ?></p>
                                        </div>
                                        <div data-popper-arrow></div>
                                    </div>
                                </h5>
                                <p class="text-sm text-gray-600 dark:text-zinc-400 mt-1">
                                    <?php echo e($user->username, false); ?> <?php echo app('translator')->get('messages.t_has_an_exceptional_number_of_repeat_buyers'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                
                <?php if($user->status === 'verified' || $user->email_verified_at): ?>
                    <div class="border-b border-gray-300 px-8 py-8">

                        
                        <div class="text-black font-bold text-xl dark:text-white mb-3"><?php echo app('translator')->get('messages.t_verifications'); ?></div>

                        
                        <div class="space-y-2">

                            
                            <?php if($user->status === 'verified'): ?>
                                <div class="flex items-center space-x-2 ltr:ml-2 rtl:mr-2">
                                    <span class="text-black font-medium text-lg dark:text-zinc-400"><?php echo app('translator')->get('messages.t_id'); ?></span>
                                    <span class="text-gray-600 text-lg flex items-center space-x-1 rtl:space-x-reverse">
                                        <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4.035 15.479A3.976 3.976 0 0 0 4 16c0 2.378 2.138 4.284 4.521 3.964C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.036C17.857 20.284 20 18.378 20 16c0-.173-.012-.347-.035-.521C21.198 14.786 22 13.465 22 12s-.802-2.786-2.035-3.479C19.988 8.347 20 8.173 20 8c0-2.378-2.143-4.288-4.521-3.964C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.036C6.138 3.712 4 5.622 4 8c0 .173.012.347.035.521C2.802 9.214 2 10.535 2 12s.802 2.786 2.035 3.479zm1.442-5.403 1.102-.293-.434-1.053A1.932 1.932 0 0 1 6 8c0-1.103.897-2 2-2 .247 0 .499.05.73.145l1.054.434.293-1.102a1.99 1.99 0 0 1 3.846 0l.293 1.102 1.054-.434C15.501 6.05 15.753 6 16 6c1.103 0 2 .897 2 2 0 .247-.05.5-.145.73l-.434 1.053 1.102.293a1.993 1.993 0 0 1 0 3.848l-1.102.293.434 1.053c.095.23.145.483.145.73 0 1.103-.897 2-2 2-.247 0-.499-.05-.73-.145l-1.054-.434-.293 1.102a1.99 1.99 0 0 1-3.846 0l-.293-1.102-1.054.434A1.935 1.935 0 0 1 8 18c-1.103 0-2-.897-2-2 0-.247.05-.5.145-.73l.434-1.053-1.102-.293a1.993 1.993 0 0 1 0-3.848z"></path><path d="m15.742 10.71-1.408-1.42-3.331 3.299-1.296-1.296-1.414 1.414 2.704 2.704z"></path></svg>
                                        <span><?php echo app('translator')->get('messages.t_verified'); ?></span>
                                    </span>
                                </div>
                            <?php endif; ?>

                            
                            <?php if($user->email_verified_at): ?>
                                <div class="flex items-center space-x-2 ltr:ml-2 rtl:mr-2">
                                    <span class="text-black font-medium text-lg dark:text-zinc-400"><?php echo app('translator')->get('messages.t_email_address_2'); ?></span>
                                    <span class="text-gray-600 text-lg flex items-center space-x-1 rtl:space-x-reverse">
                                        <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4.035 15.479A3.976 3.976 0 0 0 4 16c0 2.378 2.138 4.284 4.521 3.964C9.214 21.198 10.534 22 12 22s2.786-.802 3.479-2.036C17.857 20.284 20 18.378 20 16c0-.173-.012-.347-.035-.521C21.198 14.786 22 13.465 22 12s-.802-2.786-2.035-3.479C19.988 8.347 20 8.173 20 8c0-2.378-2.143-4.288-4.521-3.964C14.786 2.802 13.466 2 12 2s-2.786.802-3.479 2.036C6.138 3.712 4 5.622 4 8c0 .173.012.347.035.521C2.802 9.214 2 10.535 2 12s.802 2.786 2.035 3.479zm1.442-5.403 1.102-.293-.434-1.053A1.932 1.932 0 0 1 6 8c0-1.103.897-2 2-2 .247 0 .499.05.73.145l1.054.434.293-1.102a1.99 1.99 0 0 1 3.846 0l.293 1.102 1.054-.434C15.501 6.05 15.753 6 16 6c1.103 0 2 .897 2 2 0 .247-.05.5-.145.73l-.434 1.053 1.102.293a1.993 1.993 0 0 1 0 3.848l-1.102.293.434 1.053c.095.23.145.483.145.73 0 1.103-.897 2-2 2-.247 0-.499-.05-.73-.145l-1.054-.434-.293 1.102a1.99 1.99 0 0 1-3.846 0l-.293-1.102-1.054.434A1.935 1.935 0 0 1 8 18c-1.103 0-2-.897-2-2 0-.247.05-.5.145-.73l.434-1.053-1.102-.293a1.993 1.993 0 0 1 0-3.848z"></path><path d="m15.742 10.71-1.408-1.42-3.331 3.299-1.296-1.296-1.414 1.414 2.704 2.704z"></path></svg>
                                        <span><?php echo app('translator')->get('messages.t_verified'); ?></span>
                                    </span>
                                </div>
                            <?php endif; ?>
                            
                        </div>

                    </div>
                <?php endif; ?>

                
                <?php if(count($user->languages)): ?>
                    <div class="border-b border-gray-300 px-8 py-8">

                        
                        <div class="mb-3">
                            <div class="text-black font-bold text-xl dark:text-white"><?php echo app('translator')->get('messages.t_languages'); ?></div>
                        </div>

                        
                        <div class="space-y-3">
                            <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center space-x-2 ltr:ml-2 rtl:mr-2">
                                    <span class="font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                        <span class="text-black font-medium text-lg dark:text-zinc-400"><?php echo e($lang->name, false); ?>:</span>
                                    </span>
                                    <span class="text-gray-600 text-lg">
                                        
                                        <span><?php echo e(__('messages.t_' . $lang->level), false); ?></span>
                                    </span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                <?php endif; ?>

                
                <?php
                    $user_accounts = $user->accounts;
                ?>
                <?php if(settings('security')->is_social_media_accounts && $user_accounts && $user_accounts->exists() && ( $user_accounts->facebook_profile || $user_accounts->twitter_profile || $user_accounts->dribbble_profile || $user_accounts->stackoverflow_profile || $user_accounts->github_profile || $user_accounts->youtube_profile || $user_accounts->vimeo_profile )): ?>
                    <div class="border-b border-gray-300 px-8 py-8">

                        
                        <div class="mb-3">
                            <div class="text-black font-bold text-xl dark:text-white"><?php echo app('translator')->get('messages.t_linked_accounts'); ?></div>
                        </div>

                        
                        <ul class="space-y-3 ltr:ml-2 rtl:mr-2">

                            
                            <?php if($user_accounts->facebook_profile): ?>
                                <li class="flex justify-between items-center">
                                    <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user_accounts->facebook_profile)), false); ?>" target="_blank">
                                        <span class="text-gray-600 font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"></path></svg>
                                            <span class="capitalize text-lg "><?php echo app('translator')->get('messages.t_facebook'); ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            
                            <?php if($user_accounts->twitter_profile): ?>
                                <li class="flex justify-between items-center">
                                    <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user_accounts->twitter_profile)), false); ?>" target="_blank" >
                                        <span class="text-gray-600 font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814 11.874 11.874 0 0 1-8.62-4.37 4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101 4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732 11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z"></path></g></svg>
                                            <span class="capitalize text-lg "><?php echo app('translator')->get('messages.t_twitter'); ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            
                            <?php if($user_accounts->dribbble_profile): ?>
                                <li class="flex justify-between items-center">
                                    <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user_accounts->dribbble_profile)), false); ?>" target="_blank" >
                                        <span class="text-gray-600 font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M19.989 11.572a7.96 7.96 0 0 0-1.573-4.351 9.749 9.749 0 0 1-.92.87 13.157 13.157 0 0 1-3.313 2.01c.167.35.32.689.455 1.009v.003a9.186 9.186 0 0 1 .11.27c1.514-.17 3.11-.108 4.657.101.206.028.4.058.584.088zm-9.385-7.45a46.164 46.164 0 0 1 2.692 4.27c1.223-.482 2.234-1.09 3.048-1.767a7.88 7.88 0 0 0 .796-.755A7.968 7.968 0 0 0 12 4a8.05 8.05 0 0 0-1.396.121zM4.253 9.997a29.21 29.21 0 0 0 2.04-.123 31.53 31.53 0 0 0 4.862-.822 54.365 54.365 0 0 0-2.7-4.227 8.018 8.018 0 0 0-4.202 5.172zm1.53 7.038c.388-.567.898-1.205 1.575-1.899 1.454-1.49 3.17-2.65 5.156-3.29l.062-.018c-.165-.364-.32-.689-.476-.995-1.836.535-3.77.869-5.697 1.042-.94.085-1.783.122-2.403.128a7.967 7.967 0 0 0 1.784 5.032zm9.222 2.38a35.947 35.947 0 0 0-1.632-5.709c-2.002.727-3.597 1.79-4.83 3.058a9.77 9.77 0 0 0-1.317 1.655A7.964 7.964 0 0 0 12 20a7.977 7.977 0 0 0 3.005-.583zm1.873-1.075a7.998 7.998 0 0 0 2.987-4.87c-.34-.085-.771-.17-1.245-.236a12.023 12.023 0 0 0-3.18-.033 39.368 39.368 0 0 1 1.438 5.14zM12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"></path></g></svg>
                                            <span class="capitalize text-lg "><?php echo app('translator')->get('messages.t_dribbble'); ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            
                            <?php if($user_accounts->stackoverflow_profile): ?>
                                <li class="flex justify-between items-center">
                                    <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user_accounts->stackoverflow_profile)), false); ?>" target="_blank">
                                        <span class="text-gray-600 font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M18 20.002V15h2v7.002H4V15h2v5.002h12zM7.5 18v-2h9v2h-9zm.077-4.38l.347-1.97 8.864 1.563-.348 1.97-8.863-1.563zm1.634-5.504l1-1.732 7.794 4.5-1 1.732-7.794-4.5zm3.417-4.613l1.532-1.286 5.785 6.895-1.532 1.285-5.785-6.894z"></path></g></svg>
                                            <span class="capitalize text-lg"><?php echo app('translator')->get('messages.t_stackoverflow'); ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            
                            <?php if($user_accounts->github_profile): ?>
                                <li class="flex justify-between items-center">
                                    <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user_accounts->github_profile)), false); ?>" target="_blank" >
                                        <span class="text-gray-600 font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M511.6 76.3C264.3 76.2 64 276.4 64 523.5 64 718.9 189.3 885 363.8 946c23.5 5.9 19.9-10.8 19.9-22.2v-77.5c-135.7 15.9-141.2-73.9-150.3-88.9C215 726 171.5 718 184.5 703c30.9-15.9 62.4 4 98.9 57.9 26.4 39.1 77.9 32.5 104 26 5.7-23.5 17.9-44.5 34.7-60.8-140.6-25.2-199.2-111-199.2-213 0-49.5 16.3-95 48.3-131.7-20.4-60.5 1.9-112.3 4.9-120 58.1-5.2 118.5 41.6 123.2 45.3 33-8.9 70.7-13.6 112.9-13.6 42.4 0 80.2 4.9 113.5 13.9 11.3-8.6 67.3-48.8 121.3-43.9 2.9 7.7 24.7 58.3 5.5 118 32.4 36.8 48.9 82.7 48.9 132.3 0 102.2-59 188.1-200 212.9a127.5 127.5 0 0 1 38.1 91v112.5c.8 9 0 17.9 15 17.9 177.1-59.7 304.6-227 304.6-424.1 0-247.2-200.4-447.3-447.5-447.3z"></path></svg>
                                            <span class="capitalize text-lg"><?php echo app('translator')->get('messages.t_github'); ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            
                            <?php if($user_accounts->youtube_profile): ?>
                                <li class="flex justify-between items-center">
                                    <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user_accounts->youtube_profile)), false); ?>" target="_blank" >
                                        <span class="text-gray-600 font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M941.3 296.1a112.3 112.3 0 0 0-79.2-79.3C792.2 198 512 198 512 198s-280.2 0-350.1 18.7A112.12 112.12 0 0 0 82.7 296C64 366 64 512 64 512s0 146 18.7 215.9c10.3 38.6 40.7 69 79.2 79.3C231.8 826 512 826 512 826s280.2 0 350.1-18.8c38.6-10.3 68.9-40.7 79.2-79.3C960 658 960 512 960 512s0-146-18.7-215.9zM423 646V378l232 133-232 135z"></path></svg>
                                            <span class="capitalize text-lg "><?php echo app('translator')->get('messages.t_youtube'); ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            
                            <?php if($user_accounts->vimeo_profile): ?>
                                <li class="flex justify-between items-center">
                                    <a href="<?php echo e(url('redirect?to=' . safeEncrypt($user_accounts->vimeo_profile)), false); ?>" target="_blank" >
                                        <span class="text-gray-600 font-medium text-sm flex items-center space-x-1 rtl:space-x-reverse dark:text-zinc-400">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M447.8 153.6c-2 43.6-32.4 103.3-91.4 179.1-60.9 79.2-112.4 118.8-154.6 118.8-26.1 0-48.2-24.1-66.3-72.3C100.3 250 85.3 174.3 56.2 174.3c-3.4 0-15.1 7.1-35.2 21.1L0 168.2c51.6-45.3 100.9-95.7 131.8-98.5 34.9-3.4 56.3 20.5 64.4 71.5 28.7 181.5 41.4 208.9 93.6 126.7 18.7-29.6 28.8-52.1 30.2-67.6 4.8-45.9-35.8-42.8-63.3-31 22-72.1 64.1-107.1 126.2-105.1 45.8 1.2 67.5 31.1 64.9 89.4z"></path></svg>
                                            <span class="capitalize text-lg "><?php echo app('translator')->get('messages.t_vimeo'); ?></span>
                                        </span>
                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>

                    </div>
                <?php endif; ?>

                
                <?php if($user->account_type === 'seller' && $user_rating['total'] > 0): ?>
                    <div class="border-b border-gray-300 px-8 py-8">

                        
                        <div class="mb-3">
                            <div class="text-black font-bold text-xl"><?php echo app('translator')->get('messages.t_reviews'); ?></div>
                        </div>

                        
                        <div class="flex flex-col items-center gap-2">

                            
                            <span class="flex items-center gap-4 text-sm rounded text-slate-500">

                                
                                <?php echo render_star_rating($user_rating['value'], "1.25rem", "1.25rem", "#d0d0d0"); ?>


                                
                                <span class="text-base font-bold text-amber-500"><?php echo e($user_rating['value'], false); ?> <?php echo app('translator')->get('messages.t_out_of_5'); ?></span>

                            </span>
                            
                            
                            <span class="text-sm leading-6 text-gray-500"><?php echo app('translator')->get('messages.t_based_on_number_reviews', ['number' => $user_rating['total']]); ?></span>

                            
                            <div class="flex flex-col w-full gap-4 pt-6">

                                
                                <span class="flex items-center w-full gap-2">
                                    <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_5_stars'); ?></label>
                                    <progress max="100" value="<?php echo e($user_rating['stars_5'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-300 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_5'] * 100 / $user_rating['total'], false); ?>%</progress>
                                    <span class="text-xs font-bold w-9 text-black dark:text-zinc-300"><?php echo e($user_rating['stars_5'], false); ?></span>
                                </span>

                                
                                <span class="flex items-center w-full gap-2">
                                    <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_4_stars'); ?></label>
                                    <progress max="100" value="<?php echo e($user_rating['stars_4'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-300 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_4'] * 100 / $user_rating['total'], false); ?>%</progress>
                                    <span class="text-xs font-bold w-9 text-black dark:text-zinc-300"><?php echo e($user_rating['stars_4'], false); ?></span>
                                </span>

                                
                                <span class="flex items-center w-full gap-2">
                                    <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_3_stars'); ?></label>
                                    <progress max="100" value="<?php echo e($user_rating['stars_3'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-300 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_3'] * 100 / $user_rating['total'], false); ?>%</progress>
                                    <span class="text-xs font-bold w-9 text-black dark:text-zinc-300"><?php echo e($user_rating['stars_3'], false); ?></span>
                                </span>

                                
                                <span class="flex items-center w-full gap-2">
                                    <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_2_stars'); ?></label>
                                    <progress max="100" value="<?php echo e($user_rating['stars_2'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-300 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_2'] * 100 / $user_rating['total'], false); ?>%</progress>
                                    <span class="text-xs font-bold w-9 text-black dark:text-zinc-300"><?php echo e($user_rating['stars_2'], false); ?></span>
                                </span>

                                
                                <span class="flex items-center w-full gap-2">
                                    <label class="mb-0 text-xs text-center w-12 shrink-0 text-black dark:text-zinc-400 whitespace-nowrap flex"><?php echo app('translator')->get('messages.t_1_star'); ?></label>
                                    <progress max="100" value="<?php echo e($user_rating['stars_1'] * 100 / $user_rating['total'], false); ?>" class="block h-3 w-full overflow-hidden rounded bg-slate-300 dark:bg-zinc-700 [&::-webkit-progress-bar]:bg-slate-100 dark:[&::-webkit-progress-bar]:bg-zinc-700 [&::-webkit-progress-value]:bg-amber-400 [&::-moz-progress-bar]:bg-amber-400"><?php echo e($user_rating['stars_1'] * 100 / $user_rating['total'], false); ?>%</progress>
                                    <span class="text-xs font-bold w-9 text-black dark:text-zinc-300"><?php echo e($user_rating['stars_1'], false); ?></span>
                                </span>
                                
                            </div>

                        </div>

                    </div>
                <?php endif; ?>

            </div>

            
            <div class="bg-white shadow-sm shadow-gray-100 border-l border-gray-300 dark:border-transparent dark:shadow-none dark:bg-zinc-800 col-span-2 dark:divide-zinc-700 space-y-8">

                
                <?php if($user->description): ?>
                    <div class="border-t border-gray-300 px-7 py-8">

                        
                        <?php
                            $count_description_lines      = substr_count($user->description, "\n");
                            $count_description_characters = strlen($user->description);
                            $enable_more_less             = $count_description_characters > 1540 || $count_description_lines > 6;
                        ?>

                        
                        <div class="mb-4" id="about-me-element">
                            <h1 class="text-3xl font-semibold text-black dark:text-zinc-100 mb-3"><?php echo e($user->headline, false); ?></h1>
                        </div>

                        
                        <div class="text-base font-light text-black dark:text-zinc-400 leading-relaxed <?php echo e($enable_more_less ? 'max-h-16 overflow-hidden' : '', false); ?>" id="profile-description-content">
                            <?php echo nl2br(clean($user->description)); ?>

                        </div>

                        
                        <?php if($enable_more_less): ?>
                            
                            
                            <div class="mt-4 text-sm font-semibold lowercase text-primary-600 hover:underline cursor-pointer inline-block" id="profile-description-action-show-more"><?php echo app('translator')->get('messages.t_more'); ?></div>

                            
                            <div class="mt-4 text-sm font-semibold lowercase text-primary-600 hover:underline cursor-pointer" id="profile-description-action-show-less" style="display: none"><?php echo app('translator')->get('messages.t_less'); ?></div>

                            
                            <script>

                                // Get targets
                                const profile_description_content     = document.getElementById('profile-description-content');
                                const profile_description_action_more = document.getElementById('profile-description-action-show-more');
                                const profile_description_action_less = document.getElementById('profile-description-action-show-less');

                                profile_description_action_more.onclick = function() {
                                    profile_description_content.setAttribute('style', 'max-height: fit-content !important;');
                                    profile_description_action_more.style.display = "none";
                                    profile_description_action_less.style.display = "inline-block";
                                }

                                profile_description_action_less.onclick = function() {
                                    profile_description_content.setAttribute('style', 'max-height: 4rem !important;');
                                    profile_description_action_less.style.display = "none";
                                    profile_description_action_more.style.display = "inline-block";
                                    document.querySelector('#about-me-element').scrollIntoView({
                                        behavior: 'smooth'
                                    });
                                }

                            </script>

                        <?php endif; ?>

                    </div>
                <?php endif; ?>

                
                <?php if($gigs && $gigs->count()): ?>
                    <div class="border-t border-gray-300 px-7 py-8">
                        
                        
                        <div class="text-black font-bold text-3xl dark:text-white mb-10"><?php echo app('translator')->get('messages.t_recent_gigs'); ?></div>

                        
                        <div class="grid grid-cols-1 gap-4 lg:gap-8 divide-y divide-gray-300 dark:divide-zinc-700">
                            <?php $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex flex-col overflow-hidden [&:not(:first-child)]:pt-4 lg:[&:not(:first-child)]:pt-8" wire:key="profile-gigs-<?php echo e($gig->uid, false); ?>"
                                x-data="{ href: '<?php echo e(url('service', $gig->slug), false); ?>' }" 
                                @click="window.location.href = href">
                                    <div class="flex flex-col grow md:flex-row md:space-x-6 md:space-y-0 rtl:space-x-reverse space-y-4 w-full">

                                        
                                        <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="flex-none md:w-32 h-min rounded-lg overflow-hidden">
                                            <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($gig->thumbnail), false); ?>" alt="<?php echo e($gig->title, false); ?>" class="rounded-lg object-cover w-full h-32 hover:origin-center hover:scale-110 hover:rotate-3 transition duration-500 lazy">
                                        </a>

                                        <div class="grow">

                                            
                                            <?php if($gig->delivery_time): ?>
                                                <div class="flex items-center space-x-1 rtl:space-x-reverse text-xs mb-2 text-gray-400 dark:text-gray-400 tracking-wide font-medium lowercase">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16px" viewBox="0 -960 960 960" width="16px" fill="currentColor"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg>
                                                    <?php if($gig->delivery_time == 1): ?>
                                                        <span><?php echo e($gig->delivery_time, false); ?> <?php echo app('translator')->get('messages.t_day_delivery'); ?></span>
                                                    <?php else: ?>
                                                        <span><?php echo e($gig->delivery_time, false); ?> <?php echo app('translator')->get('messages.t_days_delivery'); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endif; ?>
            
                                            
                                            <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="block font-extrabold md:text-base text-black hover:text-primary-500 mb-2 dark:text-zinc-200 dark:hover:text-white">
                                                <?php echo e($gig->title, false); ?>

                                            </a>

                                            
                                            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                                <?php echo render_star_rating($gig->rating, "1rem", "1rem", "#cecece"); ?>

                                                <?php if(convertToNumber($gig->rating) > 0): ?>
                                                    <div class="text-base font-medium text-gray-600">
                                                        <?php echo e($gig->rating, false); ?>

                                                    </div>
                                                <?php endif; ?>
                                                <span class="ltr:ml-1 rtl:mr-1 text-gray-400 lowercase">(<?php echo e($gig->counter_reviews, false); ?> <?php echo app('translator')->get('messages.t_reviews'); ?>)</span>
                                            </div>


                                        </div>

                                        <div class="flex-none md:w-48 space-y-4 md:ltr:pr-1 md:rtl:pl-1">

                                            
                                            <div class="flex flex-col items-center justify-center p-3 rounded-lg dark:bg-zinc-700">
                                                <span class="text-xs uppercase tracking-wider font-extralight text-gray-400 dark:text-zinc-300 pb-1"><?php echo app('translator')->get('messages.t_starting_at'); ?></span>
                                                <span class="text-2xl font-bold tracking-wide text-black dark:text-zinc-200"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <?php if($gigs->total() && $gigs->count() < $gigs->total()): ?>
                            <div class="mt-6">
                                <button type="button" wire:click="loadMoreGigs" wire:loading.attr="disabled" wire:target="loadMoreGigs" class="mt-3 space-x-2 rtl:space-x-reverse rounded font-bold enabled:focus:outline-none px-3 py-2 leading-5 text-sm bg-gray-200 text-gray-600 enabled:hover:text-indigo-700 enabled:hover:bg-indigo-300 enabled:hover:border-indigo-300 enabled:focus:ring enabled:focus:ring-indigo-500 enabled:focus:ring-opacity-50 active:bg-indigo-200 active:border-indigo-200 block w-full disabled:bg-zinc-200 disabled:border-zinc-200 disabled:text-zinc-600 disabled:hover:bg-zinc-200 disabled:cursor-not-allowed">

                                    
                                    <div wire:loading wire:target="loadMoreGigs">
                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="loadMoreGigs">
                                        <?php echo e(htmlspecialchars_decode(__('messages.t_load_more')), false); ?>

                                    </div>

                                </button>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

                
                <?php
                    $projects = $user->account_type === 'seller' ? $user->projects()->where('status', 'active')->inRandomOrder()->take(6)->get() : [];
                ?>
                <?php if(count($projects)): ?>
                    <div class="border-t border-gray-300 px-7 py-8">

                        
                        <div class="text-black font-bold text-3xl dark:text-white mb-10"><?php echo app('translator')->get('messages.t_portfolio'); ?></div>

                        
                        <div class="grid grid-cols-12 sm:gap-x-4 gap-y-5">
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-span-12 sm:col-span-6 md:col-span-4">
                                    <div class="group relative block overflow-hidden rounded-md transition-all duration-500">
                                        <a href="<?php echo e(url('profile/' . $project->user->username . '/portfolio/' . $project->slug), false); ?>" target="_blank">
                                            <div class="h-min overflow-hidden rounded-md">
                                                <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($project->thumbnail), false); ?>" class="rounded-md object-cover h-36 w-full group-hover:origin-center group-hover:scale-110 group-hover:rotate-3 transition duration-500 lazy" alt="<?php echo e($project->title, false); ?>">
                                            </div>
                                        </a>
                                        <div class="content pt-3">
                                            <h5 class="mb-1">
                                                <a href="<?php echo e(url('profile/' . $project->user->username . '/portfolio/' . $project->slug), false); ?>" target="_blank" class="text-primary-700 hover:text-primary-600 transition-all duration-500 font-medium text-lg block dark:text-zinc-200 dark:hover:text-primary-600">
                                                    <?php echo e(htmlspecialchars_decode($project->title), false); ?>

                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <?php if(count($projects) > 6): ?>
                            <div class="mt-6">
                                <a href="<?php echo e(url('profile/' . $user->username . '/portfolio'), false); ?>" class="active:bg-white active:border-white active:shadow-none bg-white block border border-gray-300 focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-25 font-semibold hover:bg-gray-100 hover:border-gray-300 hover:shadow hover:text-gray-800 leading-5 px-3 py-2 rounded shadow-sm space-x-2 text-center text-gray-800 text-sm"><?php echo e(__('messages.t_view_my_porfolio'), false); ?></a>
                            </div>
                        <?php endif; ?>

                    </div>
                <?php endif; ?>

                
                <?php if($user->skills && $user->skills()->count()): ?>
                    <div class="border-t border-gray-300 px-7 py-8 mr-10">

                        
                        <div class="text-black font-bold text-3xl dark:text-white mb-10"><?php echo app('translator')->get('messages.t_skills'); ?></div>

                        
                        <div class="text-sm text-gray-500 leading-relaxed">
                            <?php $__currentLoopData = $user->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e(url('hire', $skill->slug), false); ?>" class="bg-gray-200 inline-flex items-center rounded-3xl px-3.5 py-1.5 text-sm font-semibold text-gray-600 hover:bg-primary-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 tracking-wide ltr:[&:not(:last-child)]:mr-1 rtl:[&:not(:last-child)]:ml-1 mb-2 space-x-1 rtl:space-x-reverse dark:bg-zinc-700 dark:hover:bg-zinc-900 dark:border-zinc-700 dark:hover:border-zinc-900 dark:text-zinc-300">
                                    <?php if($skill->experience === 'beginner'): ?>
                                        <svg data-tooltip-target="tooltip-profile-skill-experience-<?php echo e($skill->id, false); ?>" class="w-3.5 h-3.5 text-blue-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 8c0-2.2 1.8-4 4-4s4 1.8 4 4-1.8 4-4 4-4-1.8-4-4z"></path></svg>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-profile-skill-experience-'.e($skill->id, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_beginner'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    <?php elseif($skill->experience === 'intermediate'): ?>
                                        <svg data-tooltip-target="tooltip-profile-skill-experience-<?php echo e($skill->id, false); ?>" class="w-3.5 h-3.5 text-amber-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 8c0-2.2 1.8-4 4-4s4 1.8 4 4-1.8 4-4 4-4-1.8-4-4z"></path></svg>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-profile-skill-experience-'.e($skill->id, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_intermediate'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    <?php else: ?>
                                        <svg data-tooltip-target="tooltip-profile-skill-experience-<?php echo e($skill->id, false); ?>" class="w-3.5 h-3.5 text-green-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 8 16" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M0 8c0-2.2 1.8-4 4-4s4 1.8 4 4-1.8 4-4 4-4-1.8-4-4z"></path></svg>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-profile-skill-experience-'.e($skill->id, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_expert'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                    <span><?php echo e($skill->name, false); ?></span>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                <?php endif; ?>

            </div>

        </div>

    </div>

    
    <?php if(auth()->check() && auth()->id() !== $user->id): ?>
        <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-report-container','target' => 'modal-report-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

            
             <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_report_user'), false); ?> <?php $__env->endSlot(); ?>

            
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_reason')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_report_user_reason_placeholder')),'model' => 'reason','icon' => 'message-question']); ?>
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
<?php $component->withAttributes(['action' => 'report','text' => ''.e(__('messages.t_report'), false).'','block' => 0]); ?>
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

    
    <?php if(auth()->guard()->check()): ?>
        <?php if(settings('publish')->enable_custom_offers && $user->account_type === 'seller'): ?>
            <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-send-custom-offer-container','target' => 'modal-send-custom-offer-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-xl']); ?>

                
                 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_what_service_are_u_looking_for'), false); ?> <?php $__env->endSlot(); ?>

                
                 <?php $__env->slot('content', null, []); ?> 
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
<?php $component->withAttributes(['placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_describe_service_ur_looking_for_custom_offer_msg')),'model' => 'message','svg_icon' => '<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z"></path><path d="M7 9h10v2H7zm0 4h7v2H7z"></path></svg>','maxlength' => '2500']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                        </div>

                        
                        <?php if(settings('publish')->custom_offer_enable_attachments): ?>

                            
                            <div class="col-span-12" wire:ignore wire:key='attachments-uploader-form'>
                                <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.attachments-form','data' => ['label' => __('messages.t_drag_attachments_here'),'model' => 'attachments','id' => 'uploader_attachments','extensions' => explode(',', settings('publish')->custom_offer_attachments_allowed_extensions),'size' => ''.e(settings('publish')->custom_offer_attachment_max_size, false).'','max' => ''.e(settings('publish')->custom_offer_attachment_max_files, false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.attachments-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_drag_attachments_here')),'model' => 'attachments','id' => 'uploader_attachments','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(explode(',', settings('publish')->custom_offer_attachments_allowed_extensions)),'size' => ''.e(settings('publish')->custom_offer_attachment_max_size, false).'','max' => ''.e(settings('publish')->custom_offer_attachment_max_files, false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
                            </div>
                    
                            
                            <?php if($errors->has('attachments')): ?>
                                <div class="col-span-12" wire:key='attachments-errors'>
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

                            
                            <div class="col-span-12">
                                <div class="p-4 md:p-5 rounded text-slate-700 bg-slate-50">
                                    <div class="flex items-center mb-3">
                                        <svg class="inline-block w-5 h-5 ltr:mr-3 rtl:ml-3 flex-none text-slate-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.2 48 48 141.2 48 256s93.2 208 208 208 208-93.2 208-208S370.8 48 256 48zm21 312h-42V235h42v125zm0-166h-42v-42h42v42z"></path></svg>
                                        <h3 class="font-semibold text-xs uppercase tracking-wider">
                                            <?php echo app('translator')->get('messages.t_upload_instructions'); ?>
                                        </h3>
                                    </div>
                                    <ul class="list-inside ltr:ml-8 rtl:mr-8 space-y-2">

                                        
                                        <li class="flex items-center text-[13px] tracking-wide">
                                            <svg class="inline-block w-4 h-4 flex-none ltr:mr-2 rtl:pl-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <?php echo app('translator')->get('messages.t_acceptable_file_types_are'); ?> &nbsp; <b><?php echo e(str_replace(',', ' | ', settings('publish')->custom_offer_attachments_allowed_extensions), false); ?></b>
                                        </li>

                                        
                                        <li class="flex items-center text-[13px] tracking-wide">
                                            <svg class="inline-block w-4 h-4 flex-none ltr:mr-2 rtl:pl-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <?php echo app('translator')->get('messages.t_the_max_allowable_file_size_is'); ?> &nbsp; <b><?php echo e(settings('publish')->custom_offer_attachment_max_size, false); ?> <?php echo app('translator')->get('messages.t_size_mb'); ?></b>
                                        </li>

                                        
                                        <li class="flex items-center text-[13px] tracking-wide">
                                            <svg class="inline-block w-4 h-4 flex-none ltr:mr-2 rtl:pl-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                            <?php echo app('translator')->get('messages.t_u_can_upload_max_files'); ?> &nbsp; <b><?php echo e(settings('publish')->custom_offer_attachment_max_files, false); ?></b>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>

                        <?php endif; ?>

                        
                        <div class="col-span-12 h-px bg-slate-200 dark:bg-zinc-700 -mx-6 mt-4"></div>

                        
                        <div class="col-span-12">

                            
                            <h3 class="mb-4 text-sm font-medium tracking-wide <?php echo e($errors->first('expected_duration') ? 'text-red-600 dark:text-red-500' : 'text-gray-600 dark:text-white', false); ?>"><?php echo app('translator')->get('messages.t_expected_duration'); ?></h3>

                            
                            <ul class="grid w-full gap-x-2 gap-y-3 md:grid-cols-4">

                                
                                <li>
                                    <input type="radio" id="expected-duration-1-day" name="expected_duration" value="1" class="hidden peer" required wire:model.defer="expected_duration">
                                    <label for="expected-duration-1-day" class="text-xs font-medium px-2 py-3 inline-flex items-center justify-center w-full text-gray-500 bg-white border border-slate-200 rounded-md cursor-pointer dark:hover:text-zinc-300 peer-checked:border-primary-600 peer-checked:text-white peer-checked:bg-primary-600 hover:text-gray-600 hover:bg-slate-100 dark:text-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-800 dark:border-zinc-600 dark:hover:peer-checked:bg-primary-600 dark:hover:peer-checked:text-white" onclick="document.getElementById('expected-duration-other').value = ''">                           
                                        <?php echo app('translator')->get('messages.t_24_hours'); ?>
                                    </label>
                                </li>

                                
                                <li>
                                    <input type="radio" id="expected-duration-3-days" name="expected_duration" value="3" class="hidden peer" required wire:model.defer="expected_duration">
                                    <label for="expected-duration-3-days" class="text-xs font-medium px-2 py-3 inline-flex items-center justify-center w-full text-gray-500 bg-white border border-slate-200 rounded-md cursor-pointer dark:hover:text-zinc-300 peer-checked:border-primary-600 peer-checked:text-white peer-checked:bg-primary-600 hover:text-gray-600 hover:bg-slate-100 dark:text-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-800 dark:border-zinc-600 dark:hover:peer-checked:bg-primary-600 dark:hover:peer-checked:text-white" onclick="document.getElementById('expected-duration-other').value = ''">                           
                                        <?php echo app('translator')->get('messages.t_3_days'); ?>
                                    </label>
                                </li>

                                
                                <li>
                                    <input type="radio" id="expected-duration-7-days" name="expected_duration" value="7" class="hidden peer" required wire:model.defer="expected_duration">
                                    <label for="expected-duration-7-days" class="text-xs font-medium px-2 py-3 inline-flex items-center justify-center w-full text-gray-500 bg-white border border-slate-200 rounded-md cursor-pointer dark:hover:text-zinc-300 peer-checked:border-primary-600 peer-checked:text-white peer-checked:bg-primary-600 hover:text-gray-600 hover:bg-slate-100 dark:text-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-800 dark:border-zinc-600 dark:hover:peer-checked:bg-primary-600 dark:hover:peer-checked:text-white" onclick="document.getElementById('expected-duration-other').value = ''">                           
                                        <?php echo app('translator')->get('messages.t_7_days'); ?>
                                    </label>
                                </li>

                                
                                <li>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 flex items-center ltr:pl-3 rtl:pr-3 pointer-events-none">
                                            <svg class="w-4 h-4 text-gray-300 dark:text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                        </div>
                                        <input type="number" min="1" max="365" maxlength="3" id="expected-duration-other" wire:model.defer="expected_duration" class="text-xs font-medium py-3 bg-white border border-slate-200 text-gray-900 rounded-md focus:ring-0 focus:ring-offset-0 focus:border-slate-200 focus:outline-none block w-full ltr:pl-10 rtl:pr-10 hover:text-gray-600 hover:bg-slate-100 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-100 dark:placeholder-zinc-300 dark:hover:bg-zinc-800" placeholder="<?php echo app('translator')->get('messages.t_other'); ?>" onkeyup="$('input[name=expected_duration]').prop('checked',false);">
                                    </div>
                                </li>

                            </ul>

                            
                            <?php $__errorArgs = ['expected_duration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-2 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('expected_duration'), false); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        </div>

                        
                        <div class="col-span-12 h-px bg-slate-200 dark:bg-zinc-700 -mx-6"></div>

                        
                        <div class="col-span-12">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_budget')),'placeholder' => '0.00','model' => 'budget','suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('money.' . strtoupper( settings('currency')->code ))['symbol'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <?php if(settings('publish')->custom_offers_commission_value_buyer > 0): ?>
                            <?php
                                if (settings('publish')->custom_offers_commission_type === 'percentage') {
                                    
                                    // Percentage amount
                                    $offer_fee = settings('publish')->custom_offers_commission_value_buyer . "%";

                                } else {

                                    // Fixed amount
                                    $offer_fee = money(settings('publish')->custom_offers_commission_value_buyer, settings('currency')->code, true);

                                }
                            ?>
                            <div class="col-span-12">
                                <div class="flex items-start space-x-1 rtl:space-x-reverse text-[13px] italic text-slate-400 tracking-wide">
                                    <svg class="h-5 w-5 flex-shrink-0" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 56C145.72 56 56 145.72 56 256s89.72 200 200 200 200-89.72 200-200S366.28 56 256 56zm0 82a26 26 0 11-26 26 26 26 0 0126-26zm64 226H200v-32h44v-88h-32v-32h64v120h44z"></path></svg>
                                    <span><?php echo app('translator')->get('messages.t_u_will_be_charged_fee_custom_offer_buyer', ['fee_amount' => $offer_fee]); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>

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
<?php $component->withAttributes(['action' => 'sendCustomOffer','text' => ''.e(__('messages.t_submit'), false).'','block' => 0]); ?>
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
<?php $component->withAttributes(['id' => 'modal-share-profile-container','target' => 'modal-share-profile-button','uid' => 'modal_share_profile','placement' => 'center-center','size' => 'max-w-md']); ?>
         <?php $__env->slot('content', null, []); ?> 
            <div class="-mx-6 -my-6 pb-8 pt-10 relative">
                <div class="flex flex-col items-center px-4">

                    
                    <div>
                        <?php
                            try {
                                
                                if (current_theme() === 'dark') {
                                    $qr_code_color = 255;
                                } else {
                                    $qr_code_color = 0;
                                }

                                // Generate qr code
                                $qr_code = QrCode::backgroundColor(0,0,0,0)->color($qr_code_color, $qr_code_color, $qr_code_color)->size(100)->generate(url('profile', $user->username));

                            } catch (\Throwable $th) {
                                
                                // Something went wrong
                                $qr_code = null;

                            }
                            
                        ?>
                        <?php if($qr_code): ?>
                            <?php echo $qr_code; ?>

                        <?php endif; ?>
                    </div>

                    
                    <p class="text-base font-bold md:leading-6 mt-6 text-gray-800 text-center dark:text-gray-100">
                        <?php echo app('translator')->get('messages.t_share_profile'); ?>
                    </p>
                    <p class="text-xs sm:text-sm leading-5 mb-2 sm:mb-4 text-center text-gray-600 dark:text-gray-300">
                        <?php echo app('translator')->get('messages.t_share_profile_subtitle'); ?>    
                    </p>

                    
                    <div class="sharing-buttons flex flex-wrap -mx-1 justify-center mt-2">

                        
                        <a class="bg-[#4267B2] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://facebook.com/sharer/sharer.php?u=<?php echo e(url('profile', $user->username), false); ?>" aria-label="Share on Facebook">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Facebook</title> <path d="M379 22v75h-44c-36 0-42 17-42 41v54h84l-12 85h-72v217h-88V277h-72v-85h72v-62c0-72 45-112 109-112 31 0 58 3 65 4z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#1DA1F2] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://twitter.com/intent/tweet?url=<?php echo e(url('profile', $user->username), false); ?>&amp;text=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>" aria-label="Share on Twitter">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Twitter</title> <path d="m459 152 1 13c0 139-106 299-299 299-59 0-115-17-161-47a217 217 0 0 0 156-44c-47-1-85-31-98-72l19 1c10 0 19-1 28-3-48-10-84-52-84-103v-2c14 8 30 13 47 14A105 105 0 0 1 36 67c51 64 129 106 216 110-2-8-2-16-2-24a105 105 0 0 1 181-72c24-4 47-13 67-25-8 24-25 45-46 58 21-3 41-8 60-17-14 21-32 40-53 55z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#0072b1] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo e(url('profile', $user->username), false); ?>&amp;title=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>&amp;summary=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>&amp;source=<?php echo e(url('profile', $user->username), false); ?>" aria-label="Share on Linkedin">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Linkedin</title> <path d="M136 183v283H42V183h94zm6-88c1 27-20 49-53 49-32 0-52-22-52-49 0-28 21-49 53-49s52 21 52 49zm333 208v163h-94V314c0-38-13-64-47-64-26 0-42 18-49 35-2 6-3 14-3 23v158h-94V183h94v41c12-20 34-48 85-48 62 0 108 41 108 127z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#34526f] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://www.tumblr.com/widgets/share/tool?posttype=link&amp;title=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>&amp;caption=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>&amp;content=<?php echo e(url('profile', $user->username), false); ?>&amp;canonicalUrl=<?php echo e(url('profile', $user->username), false); ?>&amp;shareSource=tumblr_share_button" aria-label="Share on Tumblr" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Tumblr</title> <path d="M406 480c-14 15-50 32-98 32-120 0-147-89-147-141V227h-47c-6 0-10-4-10-10v-68c0-7 4-13 11-16 62-21 82-76 85-117 0-11 6-16 16-16h71c5 0 10 4 10 10v115h83c5 0 10 5 10 10v82c0 5-5 10-10 10h-84v133c0 34 24 54 68 36 5-2 9-3 13-2 3 1 6 3 7 8l22 64c2 5 4 10 0 14z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#E60023] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://pinterest.com/pin/create/button/?url=<?php echo e(url('profile', $user->username), false); ?>&amp;media=<?php echo e(url('profile', $user->username), false); ?>&amp;description=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>" aria-label="Share on Pinterest" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Pinterest</title> <path d="M268 6C165 6 64 75 64 186c0 70 40 110 64 110 9 0 15-28 15-35 0-10-24-30-24-68 0-81 62-138 141-138 68 0 118 39 118 110 0 53-21 153-90 153-25 0-46-18-46-44 0-38 26-74 26-113 0-67-94-55-94 25 0 17 2 36 10 51-14 60-42 148-42 209 0 19 3 38 4 57 4 3 2 3 7 1 51-69 49-82 72-173 12 24 44 36 69 36 106 0 154-103 154-196C448 71 362 6 268 6z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#FF5700] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://reddit.com/submit/?url=<?php echo e(url('profile', $user->username), false); ?>&amp;resubmit=true&amp;title=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>" aria-label="Share on Reddit" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Reddit</title> <path d="M440 204c-15 0-28 6-38 15-35-24-83-40-137-42l28-125 88 20c0 22 18 39 39 39 22 0 40-18 40-39s-17-40-40-40c-15 0-28 9-35 22l-97-22c-5-1-10 3-11 7l-31 138c-53 2-100 18-136 43a53 53 0 0 0-38-16c-56 0-74 74-23 100l-3 24c0 84 95 152 210 152 117 0 211-68 211-152 0-8-1-17-3-25 50-25 32-99-24-99zM129 309a40 40 0 1 1 80 0 40 40 0 0 1-80 0zm215 93c-37 37-139 37-176 0-4-3-4-9 0-13s10-4 13 0c28 28 120 29 149 0 4-4 10-4 14 0s4 10 0 13zm-1-54c-22 0-39-17-39-39a39 39 0 1 1 39 39z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#126567] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://www.xing.com/app/user?op=share;url=<?php echo e(url('profile', $user->username), false); ?>;title=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>" aria-label="Share on Xing" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Xing</title> <path d="m227 210-70 123c-5 9-11 13-18 13H74c-8 0-12-8-9-14l69-122-44-76c-4-7 1-14 9-14h65c7 0 13 4 18 12l45 78zM447 46 303 299l91 167c4 7 0 14-8 14h-66c-7 0-13-4-18-12l-92-169L355 44c4-8 10-12 17-12h66c8 0 12 7 9 14z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#128C7E] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://wa.me/?text=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>%20<?php echo e(url('profile', $user->username), false); ?>" aria-label="Share on Whatsapp" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Whatsapp</title> <path d="M413 97A222 222 0 0 0 64 365L31 480l118-31a224 224 0 0 0 330-195c0-59-25-115-67-157zM256 439c-33 0-66-9-94-26l-7-4-70 18 19-68-4-7a185 185 0 0 1 287-229c34 36 56 82 55 131 1 102-84 185-186 185zm101-138c-5-3-33-17-38-18-5-2-9-3-12 2l-18 22c-3 4-6 4-12 2-32-17-54-30-75-66-6-10 5-10 16-31 2-4 1-7-1-10l-17-41c-4-10-9-9-12-9h-11c-4 0-9 1-15 7-5 5-19 19-19 46s20 54 23 57c2 4 39 60 94 84 36 15 49 17 67 14 11-2 33-14 37-27s5-24 4-26c-2-2-5-4-11-6z"> </path> </svg>
                        </a>
                        
                        
                        <a class="bg-[#4C75A3] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="http://vk.com/share.php?title=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>&amp;url=<?php echo e(url('profile', $user->username), false); ?>" aria-label="Share on VK" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>VK</title> <path d="M63 63c-31 32-31 83-31 184v18c0 101 0 152 31 184s83 31 184 31h18c101 0 152 0 184-31s31-83 31-184v-18c0-101 0-152-31-184s-83-31-184-31h-18C146 32 95 32 63 63zm45 105h51c1 86 39 122 69 129V168h48v74c30-3 61-37 71-74h48a142 142 0 0 1-65 93 147 147 0 0 1 76 94h-53a92 92 0 0 0-77-67v67h-6c-102 0-160-70-162-187z"> </path> </svg>
                        </a>

                        
                        <a class="bg-[#229ED9] duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="https://telegram.me/share/url?text=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>&amp;url=<?php echo e(url('profile', $user->username), false); ?>" aria-label="Share on Telegram" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Telegram</title> <path d="M256 8a248 248 0 1 0 0 496 248 248 0 0 0 0-496zm115 169c-4 39-20 134-28 178-4 19-10 25-17 25-14 2-25-9-39-18l-56-37c-24-17-8-25 6-40 3-4 67-61 68-67l-1-4-5-1q-4 1-105 70-15 10-27 9c-9 0-26-5-38-9-16-5-28-7-27-16q1-7 18-14l145-62c69-29 83-34 92-34 2 0 7 1 10 3l4 7a43 43 0 0 1 0 10z"> </path> </svg>
                        </a>

                        
                        <a class="bg-zinc-600 duration-200 ease flex h-8 hover:bg-opacity-80 items-center justify-center m-1 rounded text-white transition w-8" target="_blank" rel="noopener" href="mailto:?subject=<?php echo e($user->fullname ? $user->fullname : $user->username, false); ?>&amp;body=<?php echo e(url('profile', $user->username), false); ?>" aria-label="Share by Email" draggable="false">
                            <svg aria-hidden="true" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4"> <title>Email</title> <path d="M464 64a48 48 0 0 1 29 86L275 314c-11 8-27 8-38 0L19 150a48 48 0 0 1 29-86h416zM218 339c22 17 54 17 76 0l218-163v208c0 35-29 64-64 64H64c-35 0-64-29-64-64V176l218 163z"> </path> </svg>
                        </a>

                    </div>

                    
                    <div class="mt-4 sm:mt-6 w-full">
                        <div class="bg-slate-100 rounded p-3 dark:bg-zinc-700">
                            <div tabindex="0" aria-label="copy link" class="focus:outline-none flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="focus:outline-none h-4 text-slate-400 w-4 dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M8.465 11.293c1.133-1.133 3.109-1.133 4.242 0l.707.707 1.414-1.414-.707-.707c-.943-.944-2.199-1.465-3.535-1.465s-2.592.521-3.535 1.465L4.929 12a5.008 5.008 0 0 0 0 7.071 4.983 4.983 0 0 0 3.535 1.462A4.982 4.982 0 0 0 12 19.071l.707-.707-1.414-1.414-.707.707a3.007 3.007 0 0 1-4.243 0 3.005 3.005 0 0 1 0-4.243l2.122-2.121z"></path><path d="m12 4.929-.707.707 1.414 1.414.707-.707a3.007 3.007 0 0 1 4.243 0 3.005 3.005 0 0 1 0 4.243l-2.122 2.121c-1.133 1.133-3.109 1.133-4.242 0L10.586 12l-1.414 1.414.707.707c.943.944 2.199 1.465 3.535 1.465s2.592-.521 3.535-1.465L19.071 12a5.008 5.008 0 0 0 0-7.071 5.006 5.006 0 0 0-7.071 0z"></path></svg>
                                    <p class="text-xs ltr:pl-3 ltr:pr-4 rtl:pr-3 rtl:pl-4 leading-3 text-slate-600 dark:text-zinc-300 whitespace-nowrap truncate w-full"><?php echo e(url('profile', $user->username), false); ?></p>
                                </div>
                                <p class="ltr:border-l rtl:border-r border-slate-300 cursor-pointer font-semibold leading-3 ltr:pl-3 rtl:pr-3 text-slate-600 text-xs dark:border-zinc-600 dark:text-zinc-300 dark:hover:text-white hover:text-black" x-on:click="copyProfileLink()">
                                    <?php echo app('translator')->get('messages.t_copy'); ?>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                
                <div class="cursor-pointer absolute top-0 right-0 m-3 text-gray-800 dark:text-gray-100 transition duration-150 ease-in-out" x-on:click="close">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-label="Close" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z"></path> <line x1="18" y1="6" x2="6" y2="18"></line> <line x1="6" y1="6" x2="18" y2="18"></line> </svg>    
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
    <script>
        function rxhfJIyOMMqiyHB() {
            return {

                async copyProfileLink() {

                    // Get profile url
                    let link = "<?php echo e(url('profile', $user->username), false); ?>";

                    // Copy
                    await navigator.clipboard.writeText(link);

                    // Success
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_copied'), false); ?>",
                        description: "<?php echo e(__('messages.t_profile_link_copied_to_ur_clipboard'), false); ?>",
                        icon       : 'success'
                    });
                }

            }
        }
        window.rxhfJIyOMMqiyHB = rxhfJIyOMMqiyHB();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/profile/profile.blade.php ENDPATH**/ ?>