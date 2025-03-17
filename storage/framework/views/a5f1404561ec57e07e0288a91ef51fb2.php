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
                
    
   <div class="w-full mb-5">
        <div class="lg:flex lg:items-center lg:justify-between">

            <div class="min-w-0 flex-1">

                
                <h2 class="text-3xl font-bold leading-7 text-black dark:text-gray-50 sm:truncate sm:tracking-tight capitalize">
                    <?php echo app('translator')->get('messages.t_submitted_offers'); ?>
                </h2>
                
            </div>

            
            <div class="mt-5 flex justify-between lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">

                
                <span class="">
                    <a href="<?php echo e(url('sellers'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                        <?php echo app('translator')->get('messages.t_find_freelancers'); ?>
                    </a>
                </span>
    
            </div>

        </div>
    </div>

    
    <?php if(session()->has('success')): ?>
        <div class="mb-6 w-full">
            <div class="rounded-sm bg-green-100 p-5">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/> </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm font-medium text-green-800"><?php echo e(session()->get('success'), false); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <?php if(session()->has('error')): ?>
        <div class="mb-6 w-full">
            <div class="rounded-sm bg-red-100 p-5">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/> </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm font-medium text-red-800"><?php echo e(session()->get('error'), false); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="w-full">

        
        <?php if($offers->count()): ?>
            <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-x-6 gap-y-5">
                <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white rounded-xl shadow-sm border px-8 py-8 dark:bg-zinc-800 dark:border-zinc-700 dark:shadow-none" wire:key="account-offers-<?php echo e($offer->uid, false); ?>">

                        <div class="flex items-start justify-between mb-4 ">
                            
                            
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                <img class="w-12 h-12 rounded-full object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($offer->freelancer->avatar), false); ?>" alt="<?php echo e($offer->freelancer->username, false); ?>">
                                <div class="space-y-1 font-medium dark:text-white">
                                    <div class="flex items-center">
                                        <a href="<?php echo e(url('profile', $offer->freelancer->username), false); ?>" target="_blank" class="font-bold whitespace-nowrap truncate block max-w-[240px] hover:text-zinc-900 dark:text-white text-lg text-black" title="<?php echo e($offer->freelancer->username, false); ?>">
                                            <?php echo e($offer->freelancer->fullname ? $offer->freelancer->fullname : $offer->freelancer->username, false); ?>

                                        </a>
                                        
                                        
                                        <?php if($offer->freelancer->status === 'verified'): ?>
                                            <div class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse mx-1">
                                                <div>
                                                    <svg data-popover-target="popover-profile-verified-<?php echo e($offer->uid, false); ?>" data-popover-placement="bottom" class="-mt-0.5 h-4 text-blue-500 w-4" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12.01 2.011a3.2 3.2 0 0 1 2.113 .797l.154 .145l.698 .698a1.2 1.2 0 0 0 .71 .341l.135 .008h1a3.2 3.2 0 0 1 3.195 3.018l.005 .182v1c0 .27 .092 .533 .258 .743l.09 .1l.697 .698a3.2 3.2 0 0 1 .147 4.382l-.145 .154l-.698 .698a1.2 1.2 0 0 0 -.341 .71l-.008 .135v1a3.2 3.2 0 0 1 -3.018 3.195l-.182 .005h-1a1.2 1.2 0 0 0 -.743 .258l-.1 .09l-.698 .697a3.2 3.2 0 0 1 -4.382 .147l-.154 -.145l-.698 -.698a1.2 1.2 0 0 0 -.71 -.341l-.135 -.008h-1a3.2 3.2 0 0 1 -3.195 -3.018l-.005 -.182v-1a1.2 1.2 0 0 0 -.258 -.743l-.09 -.1l-.697 -.698a3.2 3.2 0 0 1 -.147 -4.382l.145 -.154l.698 -.698a1.2 1.2 0 0 0 .341 -.71l.008 -.135v-1l.005 -.182a3.2 3.2 0 0 1 3.013 -3.013l.182 -.005h1a1.2 1.2 0 0 0 .743 -.258l.1 -.09l.698 -.697a3.2 3.2 0 0 1 2.269 -.944zm3.697 7.282a1 1 0 0 0 -1.414 0l-3.293 3.292l-1.293 -1.292l-.094 -.083a1 1 0 0 0 -1.32 1.497l2 2l.094 .083a1 1 0 0 0 1.32 -.083l4 -4l.083 -.094a1 1 0 0 0 -.083 -1.32z" stroke-width="0" fill="currentColor"></path></svg>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex items-center space-x-1 rtl:space-x-reverse text-xs font-normal text-gray-400 dark:text-zinc-300">
            
                                        
                                        <?php if($offer->freelancer->country): ?>
                                            <p class="flex items-center space-x-1 rtl:space-x-reverse">
                                                <span class="text-gray-400 text-sm dark:text-zinc-300 hidden sm:block"><?php echo e($offer->freelancer->country->name, false); ?></span>
                                            </p>
                                        <?php endif; ?>
                    
                                        
                                        <p class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                            <svg aria-hidden="true" class="w-5 h-5 <?php echo e($offer->freelancer->rating() == 0 ? 'text-gray-400' : 'text-amber-500', false); ?> -mt-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            <span class="dark:text-zinc-300 text-sm">
                                                (<?php echo e($offer->freelancer->rating(), false); ?>)
                                            </span>
                                        </p>
                    
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="text-right">
                                
                                <div class="text-xs text-gray-500 tracking-wide font-normal whitespace-nowrap block mb-1">
                                    <?php echo e(format_date($offer->submitted_at), false); ?>  
                                </div>
                                <span class="text-gray-800 dark:text-gray-100 text-2xl font-black"><?php echo money($offer->budget_amount, settings('currency')->code, true); ?></span>
                            </div>
                        </div>

                        
                        <div class="mb-1">

                            
                            <?php if($offer->status === 'pending'): ?>
                                <div class="ltr:border-l-4 rtl:border-r-4 border-yellow-400 bg-yellow-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-zinc-400 text-yellow-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3">
                                            <p class="text-sm dark:text-zinc-400 text-yellow-700">
                                                <?php echo app('translator')->get('messages.t_ur_offer_is_currently_under_review_before_visible'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($offer->status === 'rejected'): ?>

                                
                                <div class="ltr:border-l-4 rtl:border-r-4 border-red-400 bg-red-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg class="h-5 w-5 dark:text-zinc-400 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.485 3.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 3.495zM10 6a.75.75 0 01.75.75v3.5a.75.75 0 01-1.5 0v-3.5A.75.75 0 0110 6zm0 9a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path> </svg>
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3">
                                            <p class="text-sm dark:text-zinc-400 text-red-700">
                                                <?php echo app('translator')->get('messages.t_ur_offer_needs_some_changes_before_it_visible'); ?>
                                                <!-- Space -->
                                                <?php if($offer->rejection_reason): ?>
                                                    <span id="modal-team-rejection-reason-button-<?php echo e($offer->uid, false); ?>" class="font-bold hover:underline lowercase cursor-pointer"><?php echo app('translator')->get('messages.t_read_more'); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                
                                <?php if($offer->rejection_reason): ?>
                                    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-team-rejection-reason-container-'.e($offer->uid, false).'','target' => 'modal-team-rejection-reason-button-'.e($offer->uid, false).'','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

                                        
                                         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_rejection_reason'), false); ?> <?php $__env->endSlot(); ?>

                                        
                                         <?php $__env->slot('content', null, []); ?> 
                                            <div class="text-sm text-gray-500 dark:text-zinc-300 leading-relaxed">
                                                <?php echo nl2br($offer->rejection_reason); ?>

                                            </div>
                                         <?php $__env->endSlot(); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
                                <?php endif; ?>

                            <?php elseif($offer->freelancer_status === 'pending'): ?>
                                <div class="ltr:border-l-4 rtl:border-r-4 border-amber-400 bg-amber-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-zinc-400 text-amber-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/></svg>
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3">
                                            <p class="text-sm dark:text-zinc-400 text-amber-700">
                                                <?php echo app('translator')->get('messages.t_ur_offer_is_currently_pending_freelancer_approval'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($offer->freelancer_status === 'rejected'): ?>

                                
                                <div class="ltr:border-l-4 rtl:border-r-4 border-pink-400 bg-pink-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-zinc-400 text-pink-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/></svg>
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3">
                                            <p class="text-sm dark:text-zinc-400 text-pink-700">
                                                <?php echo app('translator')->get('messages.t_freelancer_has_rejected_this_offer'); ?>
                                                <!-- Space -->
                                                <?php if($offer->freelancer_rejection_reason): ?>
                                                    <span id="modal-freelancer-rejection-reason-button-<?php echo e($offer->uid, false); ?>" class="font-bold hover:underline lowercase cursor-pointer"><?php echo app('translator')->get('messages.t_read_more'); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                
                                <?php if($offer->freelancer_rejection_reason): ?>
                                    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-freelancer-rejection-reason-container-'.e($offer->uid, false).'','target' => 'modal-freelancer-rejection-reason-button-'.e($offer->uid, false).'','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

                                        
                                         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_rejection_reason'), false); ?> <?php $__env->endSlot(); ?>

                                        
                                         <?php $__env->slot('content', null, []); ?> 
                                            <div class="text-sm text-gray-500 dark:text-zinc-300 leading-relaxed">
                                                <?php echo e($offer->freelancer_rejection_reason, false); ?>

                                            </div>
                                         <?php $__env->endSlot(); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
                                <?php endif; ?>

                            <?php elseif($offer->freelancer_status === 'approved'): ?>

                                
                                <?php if($offer->payment_status === 'pending'): ?>
                                    <div class="ltr:border-l-4 rtl:border-r-4 border-blue-400 bg-blue-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-zinc-400 text-blue-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            </div>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <p class="text-sm dark:text-zinc-400 text-blue-700">
                                                    <?php echo app('translator')->get('messages.t_freelancer_approved_ur_offer'); ?>
                                                    <!-- Space -->
                                                    <span wire:click="confirmAddFunds('<?php echo e($offer->uid, false); ?>')" class="underline lowercase cursor-pointer capitalize"><?php echo app('translator')->get('messages.t_add_funds'); ?></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="ltr:border-l-4 rtl:border-r-4 border-violet-400 bg-violet-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                        <div class="flex">
                                            <div class="flex-shrink-0">
                                                <svg class="h-5 w-5 dark:text-zinc-400 text-violet-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15.78 15.84S18.64 13 19.61 12c3.07-3 1.54-9.18 1.54-9.18S15 1.29 12 4.36C9.66 6.64 8.14 8.22 8.14 8.22S4.3 7.42 2 9.72L14.25 22c2.3-2.33 1.53-6.16 1.53-6.16zm-1.5-9a2 2 0 0 1 2.83 0 2 2 0 1 1-2.83 0zM3 21a7.81 7.81 0 0 0 5-2l-3-3c-2 1-2 5-2 5z"></path></svg>
                                            </div>
                                            <div class="ltr:ml-3 rtl:mr-3">
                                                <p class="text-sm dark:text-zinc-400 text-violet-700">
                                                    <?php echo app('translator')->get('messages.t_freelancer_is_now_working_on_ur_order'); ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            <?php elseif($offer->freelancer_status === 'completed'): ?>
                                <div class="ltr:border-l-4 rtl:border-r-4 border-green-400 bg-green-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-zinc-400 text-green-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3">
                                            <p class="text-sm dark:text-zinc-400 text-green-700">
                                                <?php echo app('translator')->get('messages.t_freelancer_has_finished_this_order'); ?>
                                                <?php if($offer->payment_status === 'funded'): ?>
                                                    <!-- Space -->
                                                    <span wire:click="confirmRelease('<?php echo e($offer->uid, false); ?>')" class="underline lowercase cursor-pointer animate-ping hover:animate-none ease-linear"><?php echo app('translator')->get('messages.t_release_payment'); ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($offer->freelancer_status === 'canceled'): ?>
                                <div class="ltr:border-l-4 rtl:border-r-4 border-zinc-400 bg-zinc-50 p-4 mb-5 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-400">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 dark:text-zinc-400 text-zinc-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                                        </div>
                                        <div class="ltr:ml-3 rtl:mr-3">
                                            <p class="text-sm dark:text-zinc-400 text-zinc-700">
                                                <?php echo app('translator')->get('messages.t_freelancer_has_canceled_this_order'); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="text-black dark:text-gray-300 text-base leading-relaxed">

                            
                            <?php if(strlen($offer->message) > 420): ?>
                                <?php echo e(add_3_dots(htmlspecialchars_decode($offer->message), 420), false); ?>

                            <?php else: ?>
                                <?php echo e($offer->message, false); ?>

                            <?php endif; ?>

                        </div>

                        
                        <?php if(strlen($offer->message) > 420): ?>
                            <span id="modal-read-more-msg-button-<?php echo e($offer->uid, false); ?>" class="inline-block mb-5 text-[13px] font-medium text-blue-600 hover:underline dark:text-blue-500 cursor-pointer"><?php echo app('translator')->get('messages.t_read_more'); ?></span>
                        <?php endif; ?>

                        
                        <?php if(strlen($offer->message) > 420): ?>
                            <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-read-more-msg-container-'.e($offer->uid, false).'','target' => 'modal-read-more-msg-button-'.e($offer->uid, false).'','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-2xl']); ?>

                                
                                 <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_your_offer'), false); ?> <?php $__env->endSlot(); ?>

                                
                                 <?php $__env->slot('content', null, []); ?> 
                                    <div class="text-sm text-gray-500 dark:text-zinc-300 leading-relaxed">

                                        
                                        <?php echo e($offer->message, false); ?>


                                        
                                        <?php if($offer->attachments && $offer->attachments()->count()): ?>
                                            
                                            
                                            <div class="h-px bg-zinc-100 -mx-6 my-5 dark:bg-zinc-700"></div>

                                            
                                            <ul role="list" class="divide-y divide-gray-200 rounded-md border border-gray-200 dark:divide-zinc-700 dark:border-zinc-700">
                            
                                                <?php $__currentLoopData = $offer->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li class="flex items-center justify-between py-3 ltr:pl-3 ltr:pr-4 rtl:pr-3 rtl:pl-4 text-sm">
                                                        <div class="flex w-0 flex-1 items-center">
                                                            <svg class="h-5 w-5 flex-shrink-0 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M15.621 4.379a3 3 0 00-4.242 0l-7 7a3 3 0 004.241 4.243h.001l.497-.5a.75.75 0 011.064 1.057l-.498.501-.002.002a4.5 4.5 0 01-6.364-6.364l7-7a4.5 4.5 0 016.368 6.36l-3.455 3.553A2.625 2.625 0 119.52 9.52l3.45-3.451a.75.75 0 111.061 1.06l-3.45 3.451a1.125 1.125 0 001.587 1.595l3.454-3.553a3 3 0 000-4.242z" clip-rule="evenodd"></path> </svg>
                                                            <span class="ltr:ml-2 rtl:mr-2 w-0 flex-1 truncate">
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

                                    </div>
                                 <?php $__env->endSlot(); ?>

                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>
                        <?php endif; ?>

                        
                        <div>
                        
                            
                            <div class="flex items-center text-base text-gray-600 tracking-wide font-normal mt-1 whitespace-nowrap block">
                                <svg class="mr-1 rtl:ml-1" xmlns="http://www.w3.org/2000/svg" height="21px" viewBox="0 -960 960 960" width="21px" fill="currentColor"><path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z"/></svg>
                                <?php echo e(__('messages.t_number_days_for_delivery', ['number' => $offer->delivery_time]), false); ?>

                            </div>

                        </div>

                        
                        <div class="h-px bg-zinc-100 -mx-5 my-5 dark:bg-zinc-700"></div>

                        
                        <aside class="bg-slate-50 -mx-5 -my-6 rounded-b-lg px-5 py-4 dark:bg-zinc-600">
                            <div class="flex items-center justify-end space-x-2 rtl:space-x-reverse">

                                
                                <div>
                                    <a href="<?php echo e(url('messages/new', $offer->freelancer->username), false); ?>" target="_blank" class="block text-gray-600 p-2 border border-slate-200 shadow-sm hover:shadow-none bg-white dark:bg-zinc-700 dark:hover:bg-zinc-600 cursor-pointer dark:border-zinc-500 dark:text-zinc-300 rounded focus:outline-none" data-tooltip-target="tooltip-actions-chat-<?php echo e($offer->uid, false); ?>">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"/></svg>
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

                                
                                <?php if($offer->work && $offer->work()->count()): ?>

                                    
                                    <div>
                                        <button type="button" id="modal-offer-work-button-<?php echo e($offer->uid, false); ?>" class="block text-gray-600 p-2 border border-slate-200 shadow-sm hover:shadow-none bg-white dark:bg-zinc-700 dark:hover:bg-zinc-600 cursor-pointer dark:border-zinc-500 dark:text-zinc-300 rounded focus:outline-none" data-tooltip-target="tooltip-actions-files-<?php echo e($offer->uid, false); ?>">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4"/> <path d="M12 13l0 9"/> <path d="M9 19l3 3l3 -3"/></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-files-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_delivered_work'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    </div>

                                    
                                    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-offer-work-container-'.e($offer->uid, false).'','target' => 'modal-offer-work-button-'.e($offer->uid, false).'','uid' => 'modal_offer_work_'.e($offer->uid, false).'','placement' => 'center-center','size' => 'max-w-lg']); ?>

                                        
                                         <?php $__env->slot('content', null, []); ?> 

                                            
                                            <div class="flex items-center justify-between mb-11">
                                                <p tabindex="0" class="focus:outline-none text-base font-semibold leading-5 text-gray-800 dark:text-white"><?php echo app('translator')->get('messages.t_delivered_work'); ?></p>
                                                <button x-on:click="close" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ltr:ml-auto rtl:mr-auto inline-flex items-center dark:hover:bg-zinc-600 dark:hover:text-white">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                                                </button>
                                            </div>

                                            
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
        
                                         <?php $__env->endSlot(); ?>
        
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>

                                <?php endif; ?>

                                
                                <?php if( ($offer->status === 'rejected' || $offer->freelancer_status === 'rejected') && !$offer->isDelivered() && $offer->payment_status === 'pending' ): ?>

                                    
                                    <div>
                                        <button wire:click="edit('<?php echo e($offer->uid, false); ?>')" class="text-gray-600 p-2 border border-slate-200 shadow-sm hover:shadow-none bg-white dark:bg-zinc-700 dark:hover:bg-zinc-600 cursor-pointer dark:border-zinc-500 dark:text-zinc-300 rounded focus:outline-none" data-tooltip-target="tooltip-actions-edit-<?php echo e($offer->uid, false); ?>">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"/> <path d="M13.5 6.5l4 4"/></svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-edit-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_edit_offer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    </div>

                                    
                                    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-edit-custom-offer-container-'.e($offer->uid, false).'','target' => 'modal-edit-custom-offer-button-'.e($offer->uid, false).'','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-xl']); ?>

                                        
                                         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_edit_offer'), false); ?> <?php $__env->endSlot(); ?>
                        
                                        
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
<?php $component->withAttributes(['placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_describe_service_ur_looking_for_custom_offer_msg')),'model' => 'edit_form.message','svg_icon' => '<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z"></path><path d="M7 9h10v2H7zm0 4h7v2H7z"></path></svg>','maxlength' => '2500']); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.attachments-form','data' => ['label' => __('messages.t_drag_attachments_here'),'model' => 'edit_form.attachments','id' => 'uploader_attachments','extensions' => explode(',', settings('publish')->custom_offer_attachments_allowed_extensions),'size' => ''.e(settings('publish')->custom_offer_attachment_max_size, false).'','max' => ''.e(settings('publish')->custom_offer_attachment_max_files, false).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.attachments-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_drag_attachments_here')),'model' => 'edit_form.attachments','id' => 'uploader_attachments','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(explode(',', settings('publish')->custom_offer_attachments_allowed_extensions)),'size' => ''.e(settings('publish')->custom_offer_attachment_max_size, false).'','max' => ''.e(settings('publish')->custom_offer_attachment_max_files, false).'']); ?>
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
                                                        <div class="p-4 md:p-5 rounded text-slate-700 bg-slate-50 dark:bg-zinc-600 dark:text-zinc-300">
                                                            <div class="flex items-center mb-3">
                                                                <svg class="inline-block w-5 h-5 ltr:mr-3 rtl:ml-3 flex-none text-slate-500 dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.2 48 48 141.2 48 256s93.2 208 208 208 208-93.2 208-208S370.8 48 256 48zm21 312h-42V235h42v125zm0-166h-42v-42h42v42z"></path></svg>
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

                                                
                                                <?php if($offer->attachments && $offer->attachments()->count()): ?>
                                                    <div class="col-span-12">
                                                        <ul class="divide-y divide-gray-200 rounded-md border border-gray-200 dark:divide-zinc-700 dark:border-zinc-700">
                                                            <?php $__currentLoopData = $offer->attachments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attachment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="flex items-center justify-between py-3 ltr:pl-3 ltr:pr-4 rtl:pr-3 rtl:pl-4 text-sm">
                                                                <div class="flex w-0 flex-1 items-center">
                                                                    <svg class="h-5 w-5 flex-shrink-0 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 2l.117 .007a1 1 0 0 1 .876 .876l.007 .117v4l.005 .15a2 2 0 0 0 1.838 1.844l.157 .006h4l.117 .007a1 1 0 0 1 .876 .876l.007 .117v9a3 3 0 0 1 -2.824 2.995l-.176 .005h-10a3 3 0 0 1 -2.995 -2.824l-.005 -.176v-14a3 3 0 0 1 2.824 -2.995l.176 -.005h5z" stroke-width="0" fill="currentColor"></path><path d="M19 7h-4l-.001 -4.001z" stroke-width="0" fill="currentColor"></path></svg>
                                                                    <span class="ltr:ml-2 rtl:mr-2 w-0 flex-1 truncate dark:text-zinc-300">
                                                                        <?php echo e($attachment->uid, false); ?>.<?php echo e($attachment->file_extension, false); ?>

                                                                    </span>
                                                                </div>

                                                                
                                                                <div class="ltr:ml-4 rtl:mr-4 flex flex-shrink-0 space-x-4">

                                                                    
                                                                    <button wire:click="confirmRemoveAttachment('<?php echo e($attachment->uid, false); ?>')" type="button" class="rounded-md bg-transparent font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                                        <?php echo app('translator')->get('messages.t_remove'); ?>
                                                                    </button>

                                                                    <span class="text-gray-300 dark:text-zinc-600" aria-hidden="true">|</span>

                                                                    
                                                                    <a href="<?php echo e(url('uploads/offers', $attachment->uid . '.' . $attachment->file_extension), false); ?>" class="rounded-md bg-transparent font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                                        <?php echo app('translator')->get('messages.t_download'); ?>
                                                                    </a>

                                                                </div>
                                                                </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </div>
                                                <?php endif; ?>
                        
                                                
                                                <div class="col-span-12 h-px bg-slate-200 dark:bg-zinc-700 -mx-6 mt-4"></div>
                        
                                                
                                                <div class="col-span-12">
                        
                                                    
                                                    <h3 class="mb-4 text-sm font-medium tracking-wide <?php echo e($errors->first('expected_duration') ? 'text-red-600 dark:text-red-500' : 'text-gray-600 dark:text-white', false); ?>"><?php echo app('translator')->get('messages.t_expected_duration'); ?></h3>
                        
                                                    
                                                    <ul class="grid w-full gap-x-2 gap-y-3 md:grid-cols-4">
                        
                                                        
                                                        <li>
                                                            <input type="radio" id="expected-duration-1-day" name="expected_duration" value="1" class="hidden peer" required wire:model.defer="edit_form.expected_duration">
                                                            <label for="expected-duration-1-day" class="text-xs font-medium px-2 py-3 inline-flex items-center justify-center w-full text-gray-500 bg-white border border-slate-200 rounded-md cursor-pointer dark:hover:text-zinc-300 peer-checked:border-primary-600 peer-checked:text-white peer-checked:bg-primary-600 hover:text-gray-600 hover:bg-slate-100 dark:text-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-800 dark:border-zinc-600 dark:hover:peer-checked:bg-primary-600 dark:hover:peer-checked:text-white" onclick="document.getElementById('expected-duration-other').value = ''">                           
                                                                <?php echo app('translator')->get('messages.t_24_hours'); ?>
                                                            </label>
                                                        </li>
                        
                                                        
                                                        <li>
                                                            <input type="radio" id="expected-duration-3-days" name="expected_duration" value="3" class="hidden peer" required wire:model.defer="edit_form.expected_duration">
                                                            <label for="expected-duration-3-days" class="text-xs font-medium px-2 py-3 inline-flex items-center justify-center w-full text-gray-500 bg-white border border-slate-200 rounded-md cursor-pointer dark:hover:text-zinc-300 peer-checked:border-primary-600 peer-checked:text-white peer-checked:bg-primary-600 hover:text-gray-600 hover:bg-slate-100 dark:text-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-800 dark:border-zinc-600 dark:hover:peer-checked:bg-primary-600 dark:hover:peer-checked:text-white" onclick="document.getElementById('expected-duration-other').value = ''">                           
                                                                <?php echo app('translator')->get('messages.t_3_days'); ?>
                                                            </label>
                                                        </li>
                        
                                                        
                                                        <li>
                                                            <input type="radio" id="expected-duration-7-days" name="expected_duration" value="7" class="hidden peer" required wire:model.defer="edit_form.expected_duration">
                                                            <label for="expected-duration-7-days" class="text-xs font-medium px-2 py-3 inline-flex items-center justify-center w-full text-gray-500 bg-white border border-slate-200 rounded-md cursor-pointer dark:hover:text-zinc-300 peer-checked:border-primary-600 peer-checked:text-white peer-checked:bg-primary-600 hover:text-gray-600 hover:bg-slate-100 dark:text-zinc-300 dark:bg-zinc-700 dark:hover:bg-zinc-800 dark:border-zinc-600 dark:hover:peer-checked:bg-primary-600 dark:hover:peer-checked:text-white" onclick="document.getElementById('expected-duration-other').value = ''">                           
                                                                <?php echo app('translator')->get('messages.t_7_days'); ?>
                                                            </label>
                                                        </li>
                        
                                                        
                                                        <li>
                                                            <div class="relative">
                                                                <div class="absolute inset-y-0 left-0 flex items-center ltr:pl-3 rtl:pr-3 pointer-events-none">
                                                                    <svg class="w-4 h-4 text-gray-300 dark:text-gray-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                                                </div>
                                                                <input type="number" min="1" max="365" maxlength="3" id="expected-duration-other" wire:model.defer="edit_form.expected_duration" class="text-xs font-medium py-3 bg-white border border-slate-200 text-gray-900 rounded-md focus:ring-0 focus:ring-offset-0 focus:border-slate-200 focus:outline-none block w-full ltr:pl-10 rtl:pr-10 hover:text-gray-600 hover:bg-slate-100 dark:bg-zinc-700 dark:border-zinc-600 dark:text-zinc-100 dark:placeholder-zinc-300 dark:hover:bg-zinc-800" placeholder="<?php echo app('translator')->get('messages.t_other'); ?>" onkeyup="$('input[name=expected_duration]').prop('checked',false);">
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_budget')),'placeholder' => '0.00','model' => 'edit_form.budget','suffix' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(config('money.' . strtoupper( settings('currency')->code ))['symbol'])]); ?>
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
<?php $component->withAttributes(['action' => 'update','text' => ''.e(__('messages.t_update'), false).'','block' => 0]); ?>
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

                                
                                <?php if( in_array($offer->status, ['rejected', 'approved']) && !$offer->isDelivered() && ( $offer->isExpired() || in_array($offer->freelancer_status, ['rejected', 'canceled', 'pending'])) ): ?>
                                    <div>
                                        <button wire:click="confirmDelete('<?php echo e($offer->uid, false); ?>')" class="text-white bg-red-500 p-2 cursor-pointer rounded focus:outline-none" data-tooltip-target="tooltip-actions-delete-<?php echo e($offer->uid, false); ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon cursor-pointer icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z"></path> <line x1="4" y1="7" x2="20" y2="7"></line> <line x1="10" y1="11" x2="10" y2="17"></line> <line x1="14" y1="11" x2="14" y2="17"></line> <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path> <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path> </svg>
                                        </button>
                                        <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-delete-'.e($offer->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_delete_offer'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                    </div>
                                <?php endif; ?>

                            </div>
                        </aside>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php else: ?>

            
            <div class="border border-gray-200 dark:border-zinc-500 rounded-lg">
                <div class="py-14 px-6 text-center text-sm sm:px-14">
                    <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="262.4536" height="192.7371" viewBox="0 0 787.3608 578.21141" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M767.74103,251.99607c.2196-3.36208-7.66795-5.00341-7.30956-7.94569,.35702-2.9317,8.31264-2.32243,16.72301-7.61771,1.51674-.9549,11.07445-6.97267,10.14249-11.48774-1.76651-8.55826-39.66475-4.19001-43.3533-16.64006-.80958-2.7323-.05751-6.56487-2.28961-15.15243-.88803-3.41632-1.62549-5.1893-3.13123-5.74887-2.13651-.79401-3.95346,1.54882-9.19817,5.00999-7.86547,5.19074-9.303,3.56745-14.94699,8.14126-4.18979,3.39536-5.59801,6.07324-7.42211,5.53348-2.58131-.76374-1.42832-6.61918-4.38375-8.04838-3.01588-1.45834-8.27517,2.67668-11.49774,6.26247-6.04743,6.72898-6.67418,13.47302-8.68448,19.63894-2.18476,6.70075-7.02507,15.85159-19.0324,25.27512l-109.61019,79.78751c23.07429-15.97313,87.6008-58.88736,112.74142-74.03865,7.25762-4.37382,14.87965-8.63176,23.20076-6.67339,8.01135,1.88536,15.70536,9.30535,28.62174,14.22792,1.50844,.57497,5.72781,2.12173,7.62757,.31803,1.57063-1.49114,.12506-3.91399,1.5706-5.32802,1.93893-1.89673,6.11366,.92295,12.95564,1.88866,4.8246,.6809,8.52286,.09394,11.70316-.4109,.95883-.15219,15.28096-2.51586,15.57322-6.99147l-.0001-.00007Z" fill="#f2f2f2"/><path d="M582.53886,206.67521c-1.58677-1.0779-4.66812,2.31985-6.00879,1.295-1.33591-1.02113,1.25858-4.75,1.08634-10.40573-.03107-1.01991-.22687-7.44729-2.71189-8.29258-4.71011-1.60232-13.50102,18.25874-20.67589,16.47689-1.57459-.391-3.23869-1.86596-8.09752-3.24818-1.93298-.54987-3.01594-.69949-3.72505-.12192-1.00612,.81951-.38058,2.3873-.19503,5.96001,.27822,5.35809-.93333,5.5953-.31695,9.68506,.45758,3.03605,1.36559,4.49989,.57433,5.23939-1.11962,1.04656-3.66085-1.2088-5.21502-.17066-1.58594,1.05945-1.0739,4.83379-.2438,7.45004,1.55778,4.90966,4.68693,7.16313,7.13315,9.9289,2.6584,3.00565,5.75313,8.02168,6.91372,16.63395l7.53421,76.81864c-1.18206-15.93379-3.62669-59.98594-3.80913-76.69677-.05269-4.82407,.05673-9.79356,3.41887-13.31259,3.23689-3.38804,9.0986-5.02337,15.24144-9.9425,.71746-.57448,2.69401-2.19909,2.35694-3.6519-.27869-1.2011-1.88496-1.19065-2.16187-2.30816-.37144-1.49894,2.21701-2.73435,4.66505-5.81381,1.72623-2.17147,2.50519-4.15596,3.17507-5.86255,.20194-.51449,3.17421-8.22588,1.06193-9.66069l-.00011,.00015Z" fill="#f2f2f2"/><path d="M609.25751,235.38694l4.87619-9.16475,.87759-.34689c4.05954-1.60311,7.08282-3.81332,8.98956-6.57089,.30323-.43834,.5839-.89222,.87015-1.35424,1.13383-1.83179,2.54272-4.10917,5.45563-5.89382,1.62766-.9924,5.71461-3.07187,8.15801-.7946,.66325,.60522,.9873,1.32223,1.13832,2.00529,.12919-.05638,.26047-.11141,.40147-.17183,1.73539-.71337,2.78735-.80794,3.80062-.8989,.77879-.07039,1.58246-.14181,3.07486-.59295,.65462-.19768,1.19461-.39541,1.64921-.56104,1.37762-.49948,3.1005-1.04034,4.70984,.0921,1.67808,1.27009,1.60398,3.32654,1.55585,4.68833-.08497,2.42939-.43401,3.98361-.6659,5.01422-.08552,.37618-.17995,.80054-.18253,.94974-.00402,1.20482,5.06596,3.54815,6.96911,4.44104,4.28399,1.99219,7.99098,3.71605,7.70089,7.0797-.20558,2.40717-2.50582,4.20085-7.02759,5.46931-1.40809,.39413-2.71346,.53252-3.82226,.58222,.35849,.77689,.52096,1.70322,.14415,2.72523h0c-.89522,2.41785-4.08456,3.27053-9.48289,2.54387-1.34288-.17711-3.14644-.4221-5.24912-1.38524-.98984-.45455-1.81252-.96364-2.50882-1.41034-.28462,.38468-.66984,.7488-1.21145,1.02387-1.59158,.81187-3.481,.42344-5.59084-1.23898-2.34584-1.79386-4.03133-3.6305-5.51994-5.24781-1.30119-1.41042-2.42529-2.62109-3.51704-3.26621-2.04271-1.16964-4.5959-.64202-7.72318,.16862l-7.86983,2.11499-.00005-.00004Z" fill="#f2f2f2"/><path d="M648.39062,187.7377l-10.10187-2.3921-.55812-.76091c-2.58038-3.52017-5.48513-5.88393-8.63616-7.02885-.50096-.18213-1.01113-.33849-1.53068-.49819-2.05945-.63213-4.61978-1.41727-7.08489-3.78223-1.37287-1.3227-4.42091-4.74853-2.8379-7.68964,.4172-.79504,1.02858-1.29038,1.65102-1.60971-.08737-.11066-.17388-.22368-.26807-.34473-1.13019-1.49773-1.48853-2.49128-1.83354-3.44837-.26562-.73549-.53859-1.49476-1.35349-2.8239-.35728-.58308-.68551-1.05522-.96103-1.45294-.83263-1.20583-1.79272-2.73524-1.1055-4.57918,.80291-1.94535,2.81091-2.39527,4.14038-2.69417,2.3715-.53399,3.96341-.59065,5.01915-.62775,.38552-.01266,.82001-.02898,.96498-.06432,1.16641-.3017,2.14715-5.80023,2.52813-7.86763,.84039-4.64918,1.56756-8.6722,4.89483-9.24474,2.38057-.41168,4.69907,1.35833,7.073,5.41046,.7384,1.26207,1.20339,2.48964,1.53268,3.54959,.66054-.54382,1.5154-.93602,2.59953-.83064h0c2.56586,.25268,4.19961,3.12141,4.86602,8.52747,.16932,1.34387,.3898,3.15061-.00851,5.42879-.18861,1.07274-.4724,1.99763-.72788,2.78454,.44432,.17775,.89419,.458,1.29769,.91214,1.189,1.33358,1.29258,3.25978,.21968,5.72225-1.14016,2.72414-2.48922,4.82038-3.67605,6.67053-1.03428,1.61641-1.92025,3.01079-2.26728,4.23051-.61323,2.27261,.54472,4.6084,2.12211,7.42783l4.04201,7.07599-.00024-.00009Z" fill="#f2f2f2"/><path d="M661.14193,159.63257l4.87619-9.16475,.87759-.34689c4.05954-1.60311,7.08282-3.81332,8.98956-6.57089,.30323-.43834,.5839-.89222,.87015-1.35424,1.13383-1.83179,2.54272-4.10917,5.45563-5.89382,1.62766-.9924,5.71461-3.07187,8.15801-.7946,.66325,.60522,.9873,1.32223,1.13832,2.00529,.12919-.05638,.26047-.11141,.40147-.17183,1.73539-.71337,2.78735-.80794,3.80062-.8989,.77879-.07039,1.58246-.14181,3.07486-.59295,.65462-.19768,1.19461-.39541,1.64921-.56104,1.37762-.49948,3.1005-1.04034,4.70984,.0921,1.67808,1.27009,1.60398,3.32654,1.55585,4.68833-.08497,2.42939-.43401,3.98361-.6659,5.01422-.08552,.37618-.17995,.80054-.18253,.94974-.00402,1.20482,5.06596,3.54815,6.96911,4.44104,4.28399,1.99219,7.99098,3.71605,7.70089,7.0797-.20558,2.40717-2.50582,4.20085-7.02759,5.46931-1.40809,.39413-2.71346,.53252-3.82226,.58222,.35849,.77689,.52096,1.70322,.14415,2.72523h0c-.89522,2.41785-4.08456,3.27053-9.48289,2.54387-1.34288-.17711-3.14644-.4221-5.24912-1.38524-.98984-.45455-1.81252-.96364-2.50882-1.41034-.28462,.38468-.66984,.7488-1.21145,1.02387-1.59158,.81187-3.481,.42344-5.59084-1.23898-2.34584-1.79386-4.03133-3.6305-5.51994-5.24781-1.30119-1.41042-2.42529-2.62109-3.51704-3.26621-2.04271-1.16964-4.5959-.64202-7.72318,.16862l-7.86983,2.11499-.00005-.00004Z" fill="#f2f2f2"/><path d="M556.69152,330.81684l-1.01807-2.33961,.97872-2.35463-.97872,2.35463-2.24288-1.18596c.0994-.21571,.29041-.73701,.59561-1.54837,1.67571-4.44338,6.77024-17.96888,16.89543-37.83015,7.06837-13.8642,15.09884-27.59471,23.87118-40.81719,8.78638-13.24298,16.20503-22.74346,22.16604-30.3802,4.49706-5.75938,8.87729-11.17615,13.14791-16.45069,11.40438-14.09455,22.17513-27.4094,32.0185-43.57533,2.19931-3.60777,6.77355-11.11962,7.82114-21.72921,.60692-6.15354-.05636-12.44036-1.97619-18.68216l4.87967-1.50024c2.11546,6.89501,2.84558,13.85565,2.17214,20.6882-1.16145,11.76327-6.14558,19.94845-8.5403,23.88122-10.01763,16.45114-20.89359,29.89323-32.40882,44.12314-4.25246,5.25671-8.61576,10.64886-13.09388,16.38499-5.90629,7.56564-13.25956,16.98395-21.9326,30.05706-8.66944,13.06345-16.60045,26.62664-23.58165,40.3151-9.99639,19.61142-15.01374,32.93619-16.66238,37.31355-.88177,2.33655-1.06617,2.82609-2.11086,3.27591l.00004-.00005Z" fill="#f2f2f2"/><path d="M655.67184,117.67847c-.17262-.11823-.34448-.24196-.51274-.37534-3.45157-2.64778-5.30095-7.06618-5.49996-13.1317-.08865-2.85023,.68377-5.50314,2.2243-10.79385,.23615-.81641,1.48138-4.92666,4.01568-10.01976,1.65484-3.32862,2.57808-4.56194,3.94867-5.27157,1.52361-.792,3.20127-.92297,4.82033-.67748,.22247-.43937,.54987-.82494,1.01454-1.12862,1.91914-1.26374,3.66849,.27255,4.6241,1.09006,.47692,.42325,1.06922,.95571,1.79739,1.40008,1.14214,.7038,1.96128,.78174,3.19912,.90498,1.18476,.11708,2.6579,.26263,4.46879,1.02593,3.57934,1.4915,5.5955,4.17655,6.2608,5.06087,3.51303,4.63405,3.33342,9.70967,3.12445,15.58627-.04513,1.17667-.31683,5.38612-1.95275,10.2915-1.1801,3.53903-2.20004,4.7726-3.12481,5.57622-1.89435,1.65508-3.90519,1.96844-8.7499,2.38173-5.06399,.43817-7.60355,.65511-9.55547,.50766-4.53941-.34974-7.38993-.56924-10.10247-2.42707l-.00007,.0001Z" fill="#f2f2f2"/></g><path d="M635.56204,0H349.60208c-10.48999,0-19.02002,8.52997-19.02002,19.01996V313.97998c0,10.48999,8.53003,19.02002,19.02002,19.02002h285.95996c10.48999,0,19.02002-8.53003,19.02002-19.02002V19.01996c0-10.48999-8.53003-19.01996-19.02002-19.01996Zm17.02002,313.97998c0,9.3999-7.62012,17.02002-17.02002,17.02002H349.60208c-9.3999,0-17.02002-7.62012-17.02002-17.02002V19.01996c0-9.39986,7.62009-17.01996,17.01996-17.01996h151.47217c83.67549,0,151.50787,67.83239,151.50787,151.50787v160.47211Z" fill="#3f3d56"/><path id="b-31" d="M324.52982,221.68488c-10.02271,2.70906-16.74914,10.07644-
                    15.02403,16.45467,1.72511,6.37824,11.2474,9.35107,21.27332,6.6397,4.0198-1.02815,7.73493-3.00401,10.83456-5.76229l42.32169-12.01471-6.06147-19.74015-41.07815,13.94016c-4.06852-.82103-8.27452-.65555-12.26591,.48262Z" fill="#ffb6b6"/><path d="M501.8824,162.46163s11.94867,17.52796-14.9802,30.7505c-26.92887,13.22255-76.70697,32.09424-76.70697,32.09424l-68.73045,15.92312-10.37914-22.75481,81.55524-22.22032,66.45681-37.08764,22.78472,3.2949Z" fill="#3f3d56"/><path d="M493.88776,115.80732c-.30559,8.30862,5.67572,18.17153,11.99981,18.37403,7.60788,.24368,43.57329,2.80519,44.7295-.17782,8.02756-20.71108-29.77817-63.67396-38.29999-64.91337-4.57957-.66601-10.06335,5.9092-12.17165,11.33725-2.95447,7.6066,1.40568,11.19382-1.05525,21.44145-1.87658,7.81446-4.9888,8.12999-5.20242,13.93846Z" fill="#2f2e41"/><g><polygon points="431.28364 443.34029 406.04145 449.12499 431.40525 524.38518 448.51015 520.46647 431.28364 443.34029" fill="#ffb6b6"/><path d="M422.26383,500.91484l9.76292,1.43186,1.50498,5.22972s.32536-6.65233,11.10799-11.21113l2.80283,4.68076s5.77229,3.71423,7.63765,12.92025l4.14219,24.90083-8.47672,2.24884-6.22014-16.35906s-3.4225-3.12878-8.86656,18.03551c0,0-2.20451,7.11265-22.20382,6.28871-2.74878-.11324-5.16739-1.94721-5.90103-4.59869-.40487-1.46326-.22585-2.97603,1.46219-3.98974,4.29683-2.58036,9.29382-2.33856,11.22161-6.92485,1.92779-4.58628,2.02591-32.65302,2.02591-32.65302Z" fill="#2f2e41"/></g><g><polygon points="486.12311 477.55704 463.58206 477 466.73762 556.24943 484.28287 556.5622 486.12311 477.55704" fill="#ffb6b6"/><path d="M463.51301,531.26895l9.13143,3.73923,.20221,5.4382s1.91669-6.37854,13.47952-8.2085l1.59403,5.2177s4.70882,4.99418,4.30392,14.37856l-1.97195,25.16586-8.76879,.14282-2.10052-17.37518s-2.56897-3.86046-12.94625,15.37173c0,0-3.85139,6.3731-23.06467,.76053-2.64074-.77141-4.54693-3.13352-4.62093-5.88363-.04084-1.51769,.49697-2.94292,2.37935-3.52061,4.79152-1.47049,9.58347-.03327,12.5583-4.02085,2.97483-3.98757,9.82435-31.20587,9.82435-31.20587Z" fill="#2f2e41"/></g><polygon points="532.63681 390.99653 413.4231 381.77201 446.97142 244.24061 527.23659 232.67571 532.63681 390.99653" fill="#2f2e41"/><polygon points="516.19567 138.19287 541.31393 124.81105 561.59749 148.76053 520.83803 279.39998 446.27901 246.38557 502.90896 149.57106 516.19567 138.19287" fill="#0abb25"/><path d="M519.37917,255.81245s7.99865,41.24344-16.76982,62.67993l-7.58177,24.10429-8.18624,44.49141,.74071,114.91192-30-3-12-109.99601-.14266-54.74468-44.28904,37.92731,46.35131,91.03876-37.7688,16.53838-46.12859-109.70919c-3.20519-6.68292-2.35048-14.60438,2.20651-20.44978l80.46822-103.21922,73.10016,9.42688Z" fill="#2f2e41"/><path d="M550.47747,135.63075l-49.24818,45.94569c-11.65539,94.57932-5.29297,181.42607,28.24251,256.61101l82.75742-38.35635c-68.24059-20.69727-61.54814-134.34365-48.30715-256.11285l-13.4446-8.08749Z" fill="#3f3d56"/><polygon points="508.00574 149.72218 515.58206 138 473.67989 162.63479 440.54605 254.45608 501.66832 178.17982 508.00574 149.72218" fill="#3f3d56"/><path id="c-32" d="M612.82155,322.43614c2.88799,9.97263,10.37455,16.56614,16.72089,14.72717,6.34634-1.83898,9.1483-11.41293,6.25795-21.38873-1.09992-4.00076-3.14194-7.67994-5.95525-10.72971l-12.77013-42.09991-19.62852,6.41375,14.67302,40.82212c-.74809,4.08256-.50737,8.28493,.70204,12.25531Z" fill="#ffb6b6"/><path d="M548.56444,144.69881s17.17736-12.44743,31.16828,14.09036c13.99092,26.53779,34.28526,75.75303,34.28526,75.75303l17.89161,68.2445-22.44715,11.02874-24.55474-80.88303-38.98205-65.3636,2.63879-22.87Z" fill="#3f3d56"/><circle cx="528.1389" cy="95.83832" r="27.89568" fill="#ffb6b6"/><path d="M528.23094,84.95502c-1.57021-.15487-2.37744,1.50548-8.37414,3.82202-2.12452,.82072-3.21224,1.23267-4.46007,1.31286-3.7932,.2437-6.74134-1.85136-8.71154-3.25151-3.20255-2.27592-5.26566-3.742-5.66863-6.08582-.52588-3.0586,2.93672-6.47533,9.88334-13.18386,3.40194-3.28538,5.47494-5.26989,8.80359-7.63179,5.58326-3.96168,8.37488-5.94247,12.2882-6.33118,5.18313-.51474,9.12363,1.95859,14.80962,5.52757,1.53612,.96418,3.75083,1.42786,6.09874,1.60456,7.68606,.57843,14.27526,5.70138,16.36557,13.12033,.1597,.56681,.29388,1.07986,.39451,1.51919,4.1263,18.01381,2.97494,36.7499-2.67183,54.34643-.152,.47367-.27918,.91469-.37757,1.31662-2.62308,10.71632-38.65605,14.89376-42.87064,5.83419-2.65394-5.70476,9.74899-11.41278,11.60114-28.42293,1.28943-11.84192-3.19345-23.11047-7.11029-23.49665Z" fill="#2f2e41"/><rect x="117.33012" y="91.25305" width="302.25197" height="1.54937" fill="#e6e6e6"/><g><path d="M376.91173,68.60039H160.00048c-3.41723,0-6.19746-2.78023-6.19746-6.19746s2.78023-6.19746,6.19746-6.19746h216.91125c3.41723,0,6.19746,2.78023,6.19746,6.19746s-2.78023,6.19746-6.19746,6.19746Z" fill="#e6e6e6"/><circle cx="118" cy="90.58301" r="13" fill="#e6e6e6"/><circle cx="158" cy="62.58301" r="13" fill="#e6e6e6"/></g><rect x="15.33012" y="236.25305" width="302.25197" height="1.54937" fill="#3f3d56"/><g><path d="M274.91173,213.60039H58.00048c-3.41723,0-6.19746-2.78023-6.19746-6.19746s2.78023-6.19746,6.19746-6.19746h216.91125c3.41723,0,6.19746,2.78023,6.19746,6.19746s-2.78023,6.19746-6.19746,6.19746Z" fill="#0abb25"/><circle cx="13" cy="235.58301" r="13" fill="#0abb25"/><circle cx="53" cy="207.58301" r="13" fill="#0abb25"/></g><rect x="51.33012" y="396.25305" width="302.25197" height="1.54937" fill="#e6e6e6"/><g><path d="M310.91173,373.60039H94.00048c-3.41723,0-6.19746-2.78023-6.19746-6.19746s2.78023-6.19746,6.19746-6.19746h216.91125c3.41723,0,6.19746,2.78023,6.19746,6.19746s-2.78023,6.19746-6.19746,6.19746Z" fill="#e6e6e6"/><circle cx="88" cy="366.58301" r="13" fill="#e6e6e6"/><circle cx="49" cy="396.58301" r="13" fill="#e6e6e6"/></g></svg>
                    <p class="mt-4 font-bold text-black dark:text-zinc-300 text-xl"><?php echo e(__('messages.t_no_submitted_offers_yet'), false); ?></p>
                    <p class="mt-2 text-base text-gray-600 dark:text-zinc-400 max-w-md mx-auto"><?php echo e(__('messages.t_offers_u_will_submit_freelancers_visible_here'), false); ?></p>
                </div>
            </div>

        <?php endif; ?>

    </div>

    
    <?php if($offers->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $offers->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" href="<?php echo e(url('public/js/plugins/file-icon-vectors/file-icon-vectors.min.css'), false); ?>" />
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/offers/offers.blade.php ENDPATH**/ ?>