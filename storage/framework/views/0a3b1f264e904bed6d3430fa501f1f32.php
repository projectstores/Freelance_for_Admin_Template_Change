<div>

    
    <aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0 ltr:border-r rtl:border-l border-gray-100 fixed mt-16 h-[calc(100%-64px)] scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600 border-t border-t-gray-50">
        <div class="py-4 text-gray-400 dark:text-gray-400">
            <ul class="space-y-3">

                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    <?php if(!$link['childs']): ?>
                        
                        <li class="relative px-4 flex items-center group">
                            <a href="<?php echo e($link['href'], false); ?>" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">

                                
                                <div class="h-6 w-6 bg-gray-50 border border-gray-100 flex items-center justify-center">
                                    <?php echo $link['icon']; ?>

                                </div>

                                
                                <span class="ltr:ml-4 rtl:mr-4 text-[13px] font-medium text-gray-600 group-hover:text-gray-900"><?php echo e($link['text'], false); ?></span>
                           
                            </a>
                        </li>

                    <?php else: ?>

                        
                        <li class="relative px-4 group" x-data="{ open: false }">
                            <button
                                class="inline-flex h-full items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 focus:outline-none"
                                x-on:click="open = !open" aria-haspopup="true">
                                <span class="inline-flex items-center">

                                    <div class="h-6 w-6 bg-gray-50 border border-gray-100 flex items-center justify-center">
                                        <?php echo $link['icon']; ?>

                                    </div>

                                    
                                    <span class="ltr:ml-4 rtl:mr-4 text-[13px] font-medium text-gray-600 group-hover:text-gray-900"><?php echo e($link['text'], false); ?></span>

                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                            <template x-if="open">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="px-2 ltr:pr-2 ltr:pl-[34px] rtl:pl-2 rtl:pr-[34px] mt-2 space-y-2 overflow-hidden text-xs font-medium text-gray-500 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">

                                    <?php $__currentLoopData = $link['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                            <a class="w-full block font-medium" href="<?php echo e($child['href'], false); ?>"><?php echo e($child['text'], false); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                            </template>
                        </li>


                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <li class="relative px-4 flex items-center group !mt-8">
                    <div class="text-xs font-normal text-gray-400 tracking-wider">v<?php echo e(config('global.version'), false); ?> ©<?php echo e(config('app.name'), false); ?></div>
                </li>
                
            </ul>
        </div>
    </aside>

    
    <div x-show="isSideMenuOpen" 
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0" 
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" 
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 items-end bg-black bg-opacity-50 sm:items-center sm:justify-center flex"></div>

    <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform ltr:-translate-x-20 rtl:translate-x-20" x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform ltr:-translate-x-20 rtl:translate-x-20" @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu">
        <div class="py-4 text-gray-400 dark:text-gray-400">
            <ul class="space-y-3">

                <?php $__currentLoopData = $links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    
                    <?php if(!$link['childs']): ?>
                        
                        <li class="relative px-4 flex items-center group">
                            <a href="<?php echo e($link['href'], false); ?>" class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100">

                                
                                <div class="h-6 w-6 bg-gray-50 border border-gray-100 flex items-center justify-center">
                                    <?php echo $link['icon']; ?>

                                </div>

                                
                                <span class="ltr:ml-4 rtl:mr-4 text-xs font-medium text-gray-600 group-hover:text-gray-900"><?php echo e($link['text'], false); ?></span>
                           
                            </a>
                        </li>

                    <?php else: ?>

                        
                        <li class="relative px-4 group" x-data="{ open: false }">
                            <button
                                class="inline-flex h-full items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 focus:outline-none"
                                x-on:click="open = !open" aria-haspopup="true">
                                <span class="inline-flex items-center">

                                    <div class="h-6 w-6 bg-gray-50 border border-gray-100 flex items-center justify-center">
                                        <?php echo $link['icon']; ?>

                                    </div>

                                    
                                    <span class="ml-4 rtl:mr-4 text-xs font-medium text-gray-600 group-hover:text-gray-900"><?php echo e($link['text'], false); ?></span>

                                </span>
                                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                            <template x-if="open">
                                <ul x-transition:enter="transition-all ease-in-out duration-300"
                                    x-transition:enter-start="opacity-25 max-h-0"
                                    x-transition:enter-end="opacity-100 max-h-xl"
                                    x-transition:leave="transition-all ease-in-out duration-300"
                                    x-transition:leave-start="opacity-100 max-h-xl"
                                    x-transition:leave-end="opacity-0 max-h-0"
                                    class="px-2 ltr:pr-2 ltr:pl-[34px] rtl:pl-2 rtl:pr-[34px] mt-2 space-y-2 overflow-hidden text-xs font-medium text-gray-500 dark:text-gray-400 dark:bg-gray-900"
                                    aria-label="submenu">

                                    <?php $__currentLoopData = $link['childs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                            <a class="w-full block font-medium" href="<?php echo e($child['href'], false); ?>"><?php echo e($child['text'], false); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                            </template>
                        </li>


                    <?php endif; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
    </aside>
</div><?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/livewire/admin/includes/sidebar.blade.php ENDPATH**/ ?>