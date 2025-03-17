<?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="<?php echo e(__('Pagination Navigation'), false); ?>" class="flex items-center justify-between w-full">
        <div class="flex justify-between flex-1 md:hidden">
            <?php if($paginator->onFirstPage()): ?>
                <span class="relative inline-flex items-center px-4 py-2 text-xs font-medium text-gray-500 bg-white border-2 border-gray-200 dark:text-gray-300 dark:bg-zinc-700 dark:border-zinc-700 leading-5 rounded-sm cursor-not-allowed">
                    <?php echo __('messages.t_page_previous'); ?>

                </span>
            <?php else: ?>
                <a href="<?php echo e($paginator->previousPageUrl(), false); ?>" class="relative inline-flex items-center px-4 py-2 ltr:mr-3 rtl:ml-3 text-xs font-medium text-gray-500 bg-white border border-gray-200 shadow-sm leading-5 rounded-sm tracking-wider hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 dark:bg-zinc-700 dark:border-zinc-700 dark:hover:border-zinc-600 focus:outline-none transition ease-in-out duration-150">

                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ltr:ml-2 rtl:mr-2 hidden rtl:block text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>

                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ltr:mr-2 rtl:ml-2 hidden ltr:block text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>

                    <?php echo __('messages.t_page_previous'); ?>

                </a>
            <?php endif; ?>

            <?php if($paginator->hasMorePages()): ?>
                <a href="<?php echo e($paginator->nextPageUrl(), false); ?>" class="relative inline-flex items-center px-4 py-2 ltr:ml-3 rtl:mr-3 text-xs font-medium text-gray-500 bg-white border border-gray-200 shadow-sm leading-5 rounded-sm tracking-wider hover:text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 dark:bg-zinc-700 dark:border-zinc-700 dark:hover:border-zinc-600 focus:outline-none transition ease-in-out duration-150">
                    <?php echo __('messages.t_page_next'); ?>


                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ltr:ml-2 rtl:mr-2 hidden rtl:block text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>

                    
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ltr:ml-2 rtl:mr-2 hidden ltr:block text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>

                </a>
            <?php else: ?>
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-xs font-medium text-gray-500 bg-white border-2 border-gray-200 dark:text-gray-300 dark:bg-zinc-700 dark:border-zinc-700 cursor-default leading-5 rounded-sm">
                    <?php echo __('messages.t_page_next'); ?>

                </span>
            <?php endif; ?>
        </div>

        <div class="hidden md:flex-1 md:flex md:items-center md:justify-center">

            <div>
                <span class="relative z-0 flex space-x-1 rtl:space-x-reverse">
                    
                    <?php if($paginator->onFirstPage()): ?>
                        <span aria-disabled="true" aria-label="<?php echo e(__('pagination.previous'), false); ?>">
                            <span class="relative inline-flex items-center justify-center text-xs font-medium w-8 h-8 leading-8 text-center border border-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 rounded-full cursor-not-allowed" aria-hidden="true">

                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 hidden rtl:block" viewBox="0 0 20 20" style="margin-left: 2px" fill="currentColor"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>

                                
                                <svg class="w-4 h-4 text-gray-400 hidden ltr:block" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 2px">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>

                            </span>
                        </span>
                    <?php else: ?>
                        <a href="<?php echo e($paginator->previousPageUrl(), false); ?>" rel="prev" class="relative inline-flex items-center justify-center text-xs font-medium w-8 h-8 leading-8 text-center border border-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 rounded-full" aria-label="<?php echo e(__('pagination.previous'), false); ?>">

                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 hidden rtl:block" viewBox="0 0 20 20" style="margin-left: 2px" fill="currentColor"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>

                            
                            <svg class="w-4 h-4 hidden ltr:block" fill="currentColor" viewBox="0 0 20 20" style="margin-right: 2px">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>

                        </a>
                    <?php endif; ?>

                    
                    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <?php if(is_string($element)): ?>
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 dark:text-gray-300 bg-white border border-gray-300 cursor-default leading-5"><?php echo e($element, false); ?></span>
                            </span>
                        <?php endif; ?>

                        
                        <?php if(is_array($element)): ?>
                            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $paginator->currentPage()): ?>
                                    <span aria-current="page">
                                        <span class="block w-8 h-8 leading-8 text-center text-white bg-primary-600 border-primary-600 rounded-full text-xs font-medium"><?php echo e($page, false); ?></span>
                                    </span>
                                <?php else: ?>
                                    <a href="<?php echo e($url, false); ?>" class="block w-8 h-8 leading-8 text-center border border-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 dark:text-gray-300 rounded-full text-xs font-medium" aria-label="<?php echo e(__('Go to page :page', ['page' => $page]), false); ?>">
                                        <?php echo e($page, false); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <?php if($paginator->hasMorePages()): ?>
                        <a href="<?php echo e($paginator->nextPageUrl(), false); ?>" rel="next" class="relative inline-flex items-center justify-center text-xs font-medium w-8 h-8 leading-8 text-center border border-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 rounded-full" aria-label="<?php echo e(__('pagination.next'), false); ?>">

                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 hidden rtl:block" style="margin-right: 1px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                            
                            <svg class="w-4 h-4 hidden ltr:block" fill="currentColor" viewBox="0 0 20 20" style="margin-left: 1px">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>

                        </a>
                    <?php else: ?>
                        <span aria-disabled="true" aria-label="<?php echo e(__('pagination.next'), false); ?>">
                            <span class="relative inline-flex items-center justify-center text-xs font-medium w-8 h-8 leading-8 text-center border border-gray-100 dark:border-zinc-600 dark:hover:border-zinc-500 rounded-full cursor-not-allowed" aria-hidden="true">

                                
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-400 hidden rtl:block" style="margin-right: 1px" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                
                                <svg class="w-4 h-4 text-gray-400 hidden ltr:block" fill="currentColor" viewBox="0 0 20 20" style="margin-left: 1px">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                                
                            </span>
                        </span>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </nav>
<?php endif; ?>
<?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>