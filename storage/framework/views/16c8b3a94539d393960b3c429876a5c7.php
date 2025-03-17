<div class="hover:bg-gray-100 flex flex-col bg-white border-gray-300 border-t dark:bg-zinc-800 overflow-hidden <?php echo e($highlighted ? 'border ltr:border-l-[6px] rtl:border-r-[6px] border-primary-600' : '', false); ?>" 
            x-data="{ href: '<?php echo e(url('project/' . $pid . '/' . $slug), false); ?>' }" 
            @click="window.location.href = href" >
    <div class="p-5 lg:p-6 grow w-full flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-6">
        <div class="grow">
            
            <div class="flex items-center mb-2">
            <?php if($isFeatured): ?>
                
                <span class="font-medium bg-blue-700 text-white text-sm px-3 py-1 rounded-lg inline-flex items-center mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="#fff" class="inline-block">
                        <path d="M480-120 80-600l120-240h560l120 240-400 480Zm-95-520h190l-60-120h-70l-60 120Zm55 347v-267H218l222 267Zm80 0 222-267H520v267Zm144-347h106l-60-120H604l60 120Zm-474 0h106l60-120H250l-60 120Z"/>
                    </svg>
                    <span class="ml-1 inline-block"><?php echo e(__('messages.t_featured'), false); ?></span>
                </span>
            <?php endif; ?>
            
            
            <?php if($status === 'completed'): ?>
                <span class="font-medium bg-green-500 text-white text-sm px-3 py-1 rounded-lg inline-flex items-center mb-2 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="#fff"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                    <span class="ml-1 inline-block"><?php echo e(__('messages.t_completed'), false); ?></span>
                </span>
            <?php elseif($urgent): ?>
                <span class="font-medium bg-red-600 text-white text-sm px-3 py-1 rounded-lg inline-flex items-center mb-2 ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" height="22px" viewBox="0 -960 960 960" width="22px" fill="#fff"><path d="m216-160-56-56 384-384H440v80h-80v-160h233q16 0 31 6t26 17l120 119q27 27 66 42t84 16v80q-62 0-112.5-19T718-476l-40-42-88 88 90 90-262 151-40-69 172-99-68-68-266 265Zm-96-280v-80h200v80H120ZM40-560v-80h200v80H40Zm739-80q-33 0-57-23.5T698-720q0-33 24-56.5t57-23.5q33 0 57 23.5t24 56.5q0 33-24 56.5T779-640Zm-659-40v-80h200v80H120Z"/></svg>
                    <span class="ml-1 inline-block"><?php echo e(__('messages.t_urgent_project'), false); ?></span>
                </span>
            <?php endif; ?>
            
            </div>

            
            <div class="flex items-center">
                <span class="text-xs text-gray-600 dark:text-zinc-200 whitespace-nowrap"><?php echo e(__('messages.t_posted_date', ["date" => $created_at]), false); ?></span>
            </div>

            
            <a href="<?php echo e(url('project/' . $pid . '/' . $slug), false); ?>" class="mb-2 font-bold text-2xl text-black dark:text-white hover:text-primary-600 dark:hover:text-primary-400 flex">
                <?php echo e($title, false); ?>

            </a>

            
            <div class="flex items-center mt-1">
            
                
                <a href="<?php echo e(url('explore/projects', $category['slug']), false); ?>" class="mr-1 text-gray-600 dark:text-zinc-200 text-xs font-normal hover:underline hover:text-gray-600">
                    <?php echo e($category['title'], false); ?>

                </a>
                
                <span class="text-sm text-gray-400 dark:text-gray-300">-</span>

                
                <div class="flex items-center mr-1 ml-1">
                    <?php if($budget_type === 'fixed'): ?>
                        <span class="text-sm text-gray-600 dark:text-zinc-200 whitespace-nowrap text-xs"><?php echo e(__('messages.t_fixed_price'), false); ?></span>
                    <?php else: ?>
                        <span class="text-sm text-gray-600 dark:text-zinc-200 whitespace-nowrap text-xs"><?php echo e(__('messages.t_hourly_price'), false); ?></span>
                    <?php endif; ?>
                </div>
                
                <span class="text-sm text-gray-400 dark:text-gray-300">-</span>
                
                <div class="flex items-center ml-1">
                    <span class="text-sm text-gray-600 dark:text-zinc-200 whitespace-nowrap text-xs"> <?php echo e(__('messages.t_estimated_budget'), false); ?> </span>
                    
                    <span class="ml-1 text-sm text-gray-600 dark:text-zinc-200 whitespace-nowrap text-xs">
                        <?php echo e($budget_min, false); ?>

                    </span>

                    
                    <span class="text-sm text-gray-600 dark:text-zinc-200 whitespace-nowrap text-xs">/</span>

                    
                    <span class="text-sm text-gray-600 dark:text-zinc-200 whitespace-nowrap text-xs">
                        <?php echo e($budget_max, false); ?>    
                    </span>

                </div> 

            </div>

            
            <p class="leading-relaxed text-base text-black dark:text-white mt-4 break-all" style="word-break: break-word;">
                <?php echo e(htmlspecialchars_decode($description), false); ?>

            </p>
            
            
            <div class="mt-3 space-y-1">
                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="font-bold inline-flex px-3 py-1.5 text-sm rounded-lg border border-transparent text-gray-600 bg-gray-200 hover:bg-gray-200 hover:text-gray-500 dark:bg-primary-600 dark:text-white dark:hover:border-primary-600 dark:hover:bg-primary-200 dark:hover:text-primary-800 transition-colors duration-300">
                        <?php echo e($skill->skill->name, false); ?>

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            
            <div class="flex items-center mt-4">
                <span class="text-base text-gray-600 dark:text-gray-300 mr-1"><?php echo e(__('messages.t_proposals_2'), false); ?></span>
                <span class="font-bold text-base text-gray-600 dark:text-gray-300 whitespace-nowrap">
                    <?php if($total_bids < 5): ?>
                    
                        <?php echo e(__('messages.t_less_than_5'), false); ?>

                    
                    <?php elseif($total_bids >= 5 && $total_bids <= 20): ?>
                    
                        <?php echo e(__('messages.t_between_5_20'), false); ?>

                        
                    <?php elseif($total_bids > 20 && $total_bids <= 50): ?>
                    
                        <?php echo e(__('messages.t_between_20_50'), false); ?>

                        
                    <?php elseif($total_bids > 50): ?>
                    
                        <?php echo e(__('messages.t_more_than_50'), false); ?>

                    
                    <?php endif; ?>
                    
                </span>
            </div>
        </div>
    </div>
</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/cards/project.blade.php ENDPATH**/ ?>