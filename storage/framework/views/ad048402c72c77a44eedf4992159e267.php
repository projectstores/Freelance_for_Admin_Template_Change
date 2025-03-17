<main class="w-full">
    <div class="">
        <div class="overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                
                <aside class="lg:col-span-3 pb-6 hidden lg:block" wire:ignore>
                    <?php if (isset($component)) { $__componentOriginal897c321ee9b9bb967400e80c55835c23 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal897c321ee9b9bb967400e80c55835c23)): ?>
<?php $component = $__componentOriginal897c321ee9b9bb967400e80c55835c23; ?>
<?php unset($__componentOriginal897c321ee9b9bb967400e80c55835c23); ?>
<?php endif; ?>
                </aside>

                
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9 pt-10 px-5">

                    
                    <div class="w-full">
                        
                        
                        <div class="mb-5">
                            <h2 class="text-3xl capitalize leading-6 font-bold text-black dark:text-gray-100"><?php echo e(__('messages.t_favorite_list'), false); ?></h2>
                        </div>
                        
                        <div class="bg-white dark:bg-zinc-800 overflow-y-auto dark:border-zinc-600">
                            <table class="w-full whitespace-nowrap old-tables">
                                <thead class="bg-gray-100 dark:bg-zinc-700">
                                    <tr tabindex="0" class="focus:outline-none h-10 w-full text-sm leading-none text-gray-800 dark:text-white">
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_gig'), false); ?></th>
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_date'), false); ?></th>
                                        <th class="font-bold text-xs text-black dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4"><?php echo e(__('messages.t_options'), false); ?></th>
                                    </tr>
                                </thead>
                                <tbody class="w-full">
                    
                                    <?php $__empty_1 = true; $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="list-<?php echo e($l->id, false); ?>">
                    
                                            
                                            <td class="ltr:pl-4 rtl:pr-4">
                                                <a href="<?php echo e(url('service', $l->gig->slug), false); ?>" target="_blank" class="flex items-center">
                                                    <div class="w-8 h-8">
                                                        <img class="w-full h-full rounded object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($l->gig->thumbnail), false); ?>" alt="<?php echo e($l->gig->title, false); ?>" />
                                                    </div>
                                                    <div class="ltr:pl-4 rtl:pr-4">
                                                        <p class="font-medium text-xs truncate max-w-lg block overflow-hidden dark:text-white"><?php echo e($l->gig->title, false); ?></p>
                                                        <p class="text-[11px] leading-3 text-gray-600 dark:text-gray-300 pt-2"><?php echo money($l->gig->price, settings('currency')->code, true); ?></p>
                                                    </div>
                                                </a>
                                            </td>
                    
                                            
                                            <td class="text-center">
                                                <span class="text-[11px] font-normal text-gray-400 dark:text-gray-200"><?php echo e(format_date($l->created_at, 'ago'), false); ?></span>
                                            </td>
                    
                                            
                                            <td class="text-center">
                                                <div class="relative inline-block text-left">
                                                    <div>
                                                        <button data-dropdown-toggle="table-options-dropdown-<?php echo e($l->id, false); ?>" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                                        </button>
                                                    </div>
                                                    <div id="table-options-dropdown-<?php echo e($l->id, false); ?>" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-zinc-700 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                                        <div class="py-1" role="none">
                    
                                                            
                                                            <button x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_remove_from_favorite_list'), false); ?>') ? $wire.delete('<?php echo e($l->id, false); ?>') : ''" wire:loading.attr="disabled" wire:target="delete('<?php echo e($l->id, false); ?>')" type="button" class="text-gray-800 dark:text-gray-300 dark:hover:text-gray-400 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >
                    
                                                                
                                                                <div wire:loading wire:target="delete('<?php echo e($l->id, false); ?>')">
                                                                    <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                    </svg>
                                                                </div>
                    
                                                                
                                                                <div wire:loading.remove wire:target="delete('<?php echo e($l->id, false); ?>')">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                                </div>
                    
                                                                <span class="text-xs font-medium"><?php echo e(__('messages.t_remove_from_favorite'), false); ?></span>
                    
                                                            </button>
                    
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                    
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40">

                                            <td class="ltr:pl-4 rtl:pr-4" colspan="3">
                                                <div class="flex flex-col col-span-2 sm:flex-row justify-center px-5 py-5 mt-5 mb-4 text-gray-400 text-sm"><?php echo app('translator')->get('messages.no_results_found'); ?></div>
                                            </td>
                					 </tr>
                					<?php endif; ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    
                        
                        <?php if($list->hasPages()): ?>
                            <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
                                <?php echo $list->links('pagination::tailwind'); ?>

                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            </div>
        </div>
    </div>
</main><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/favorite/favorite.blade.php ENDPATH**/ ?>