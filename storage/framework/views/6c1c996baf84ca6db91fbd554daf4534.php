<div class="w-full">

    
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                <?php echo e(__('messages.t_countries'), false); ?>

            </p>
            <div>
                <a href="<?php echo e(admin_url('countries/create'), false); ?>" class="focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 inline-flex sm:ml-3 mt-4 sm:mt-0 items-start justify-start px-6 py-3 bg-primary-600 hover:bg-primary-700 focus:outline-none rounded-sm">
                    <p class="text-xs font-normal tracking-wide leading-none text-white"><?php echo e(__('messages.t_create'), false); ?></p>
                </a>
            </div>
        </div>
    </div>

    
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_country'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_status'), false); ?></th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center"><?php echo e(__('messages.t_options'), false); ?></th>
                </tr>
            </thead>
            <tbody class="w-full">

                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100">

                        
                        <td class="ltr:pl-4 rtl:pr-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10">
                                    <img class="w-full h-full lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(url('public/img/flags/rounded/' . strtolower($country->code) . '.svg'), false); ?>" alt="<?php echo e($country->name, false); ?>" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium"><?php echo e($country->name, false); ?></p>
                                    <p class="text-xs leading-3 text-gray-600 pt-2"><?php echo e($country->code, false); ?></p>
                                </div>
                            </div>
                        </td>

                        
                        <td class="text-center">

                            
                            <?php if($country->is_active): ?>
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                    <?php echo e(__('messages.t_active'), false); ?>

                                </span>
                            <?php else: ?>
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                    <?php echo e(__('messages.t_inactive'), false); ?>

                                </span>
                            <?php endif; ?>

                        </td>

                        
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button data-dropdown-toggle="table-options-dropdown-<?php echo e($country->id, false); ?>" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                    </button>
                                </div>
                                <div id="table-options-dropdown-<?php echo e($country->id, false); ?>" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-zinc-700 focus:outline-none" role="menu"  aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">

                                        
                                        <a href="<?php echo e(admin_url('countries/edit/' . $country->id), false); ?>" class="text-gray-800 dark:text-gray-300 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                            <span class="text-xs font-medium"><?php echo e(__('messages.t_edit_country'), false); ?></span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>

    
    <?php if($countries->hasPages()): ?>
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            <?php echo $countries->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>
<?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/livewire/admin/countries/countries.blade.php ENDPATH**/ ?>