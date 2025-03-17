<div class="flex flex-col rounded-lg shadow bg-white overflow-hidden relative">
   
    
    <div wire:loading wire:loading.block>
        <div class="absolute w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50 rounded-lg">
            <div class="lds-ripple"><div></div><div></div></div>
        </div>
    </div>

    
    <div class="py-4 px-5 lg:px-6 w-full sm:flex sm:justify-between sm:items-center">
        <div class="flex justify-center sm:justify-left">
            <h3 class="inline-flex items-center font-semibold">
                <span><?php echo app('translator')->get('messages.t_trashed_gigs'); ?></span>
            </h3>
        </div>
    </div>
    
    
    <div class="grow w-full">
        <div class="overflow-x-auto min-w-full bg-white">
            <table class="min-w-full text-sm align-middle whitespace-nowrap">
                
                <thead>
                    <tr>
                        <th class="px-7 py-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest ltr:text-left rtl:text-right">
                            <?php echo app('translator')->get('messages.t_gig'); ?>
                        </th>
                        <th class="p-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest text-center">
                            <?php echo app('translator')->get('messages.t_deleted_date'); ?>
                        </th>
                        <th class="p-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest text-center">
                            <?php echo app('translator')->get('messages.t_options'); ?>
                        </th>
                    </tr>
                </thead>
            
                <tbody>
                    <?php $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr wire:key="trashed-gigs-<?php echo e($gig->uid, false); ?>">

                            
                            <td class="px-7 py-3 ltr:text-left rtl:text-right">
                                <div class="flex items-center">
                                    <div class="w-8 h-8">
                                        <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($gig->thumbnail), false); ?>" alt="<?php echo e($gig->title, false); ?>" />
                                    </div>
                                    <div class="ltr:pl-4 rtl:pr-4">
                                        <a href="<?php echo e(url('service', $gig->slug), false); ?>" target="_blank" class="font-medium text-sm hover:text-primary-600 truncate pb-1.5 block max-w-xs"><?php echo e($gig->title, false); ?></a>
                                        <div class="flex items-center text-[11px] font-normal text-gray-400">
                                            <a href="<?php echo e(url('categories', $gig->category->slug), false); ?>" class="hover:text-gray-600"><?php echo e($gig->category->name, false); ?></a>
                                            <i class="mdi mdi-chevron-right text-[10px] mx-2"></i>
                                            <a href="<?php echo e(url('categories/' . $gig->category->slug . '/' . $gig->subcategory->name), false); ?>" class="hover:text-gray-600"><?php echo e($gig->subcategory->name, false); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            
                            <td class="p-3 text-center">
                                <span class="text-gray-500 font-semibold text-[13px]"><?php echo e(format_date($gig->deleted_at), false); ?></span>
                            </td>

                            
                            <td class="p-3 text-center">
                                <div class="space-x-4 rtl:space-x-reverse">
                                    
                                    
                                    <button type="button" wire:click="confirmRestore('<?php echo e($gig->id, false); ?>')" data-tooltip-target="tooltip-action-restore-<?php echo e($gig->id, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM4 19V7h16l.002 12H4z"></path><path d="M7 14h3v3h4v-3h3l-5-5z"></path></svg>
                                    </button>
                                    <div id="tooltip-action-restore-<?php echo e($gig->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <?php echo e(__('messages.t_restore_gig'), false); ?>

                                    </div>

                                    
                                    <button type="button" wire:click="confirmDelete('<?php echo e($gig->id, false); ?>')" data-tooltip-target="tooltip-action-delete-<?php echo e($gig->id, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                    </button>
                                    <div id="tooltip-action-delete-<?php echo e($gig->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <?php echo e(__('messages.t_permanently_delete'), false); ?>

                                    </div>

                                </div>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>

            </table>
        </div>
    </div>

    
    <?php if($gigs->hasPages()): ?>
        <div class="px-4 py-5 sm:px-6 flex justify-center">
            <?php echo $gigs->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div><?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/livewire/admin/gigs/trash/trash.blade.php ENDPATH**/ ?>