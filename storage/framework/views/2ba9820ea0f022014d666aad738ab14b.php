<div class="w-full">

    
    <div class="mb-12 text-left block">
        <span class="text-3xl font-semibold tracking-tight text-primary-700" style="font-size: 3em; line-height: 1.1em">
            <?php echo e(__('messages.t_hire_best_professionals'), false); ?>

        </span>
        <p class="text-lg text-black dark:text-gray-700 font-normal mt-2 tracking-tight">
            <?php echo e(__('messages.t_check_out_professionals'), false); ?>    
        </p>
    </div>

    
    <ul role="list" class="grid grid-cols-1 md:gap-x-6 gap-y-6 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
        <?php $__currentLoopData = $sellers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $seller): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="col-span-1 flex flex-col text-center bg-white dark:bg-zinc-800 rounded-2xl border border-gray-300 divide-y divide-gray-200 dark:divide-zinc-700">
                <div class="flex-1 flex flex-col px-9 py-10 items-center justify-between">
            
                    
                    <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full object-cover lazy border border-gray-200" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($seller->avatar), false); ?>" alt="<?php echo e($seller->username, false); ?>">
                    
                    <div class="mt-3 overflow-hidden whitespace-nowrap text-ellipsis">
                        <div class="text-black dark:text-gray-200 text-2xl font-semibold flex items-center justify-center tracking-tight">
                            <?php echo e($seller->fullname, false); ?>

                            <?php if($seller->status === 'verified'): ?>
                                <img data-tooltip-target="tooltip-account-verified-<?php echo e($seller->id, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-6 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                <div id="tooltip-account-verified-<?php echo e($seller->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    <?php echo e(__('messages.t_account_verified'), false); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="text-lg font-light text-black dark:text-gray-400 capitalize tracking-tight text-center -mt-1"><?php echo e($seller->level->title, false); ?></div>
                    </div>
                    
                    <div class="mt-3 mb-3 items-start">
                        <div class="text-base font-normal text-gray-500 dark:text-gray-600 capitalize tracking-tight text-center overflow-hidden whitespace-nowrap text-ellipsis">
                            <?php echo e($seller->headline, false); ?>

                        </div>
                        <div class="space-x-1 rtl:space-x-reverse mt-2">
                            <?php $__currentLoopData = $seller->skills()->limit(3)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="inline-flex mb-2 px-2.5 py-1 capitalize items-center text-gray-600 dark:text-zinc-400 text-xs tracking-tight font-normal bg-gray-200 dark:bg-zinc-700 rounded-full">
                                    <?php echo e($skill->name, false); ?>

                                </span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
            
                    <a href="<?php echo e(url('profile', $seller->username), false); ?>" class="mt-4">
                        <span class="text-white text-base tracking-tight py-2.5 px-6 font-medium rounded-xl bg-primary-700 hover:bg-primary-500"><?php echo e(__('messages.t_see_more'), false); ?></span>
                    </a>
            
                </div>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    
    <?php if($sellers->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $sellers->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/sellers/sellers.blade.php ENDPATH**/ ?>