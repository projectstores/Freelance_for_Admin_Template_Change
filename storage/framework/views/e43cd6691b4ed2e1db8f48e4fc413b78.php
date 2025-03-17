

            
            <div @keydown.window.escape="notifications_menu = false" x-show="notifications_menu" style="display: none;" class="fixed inset-0 overflow-hidden z-50" x-ref="dialog" aria-modal="true" x-cloak>
                <div class="absolute inset-0 overflow-hidden">
        
                    
                    <div 
                        x-show="notifications_menu"
                        style="display: none;" 
                        x-transition:enter="ease-in-out duration-500" 
                        x-transition:enter-start="opacity-0" 
                        x-transition:enter-end="opacity-100" 
                        x-transition:leave="ease-in-out duration-500" 
                        x-transition:leave-start="opacity-100" 
                        x-transition:leave-end="opacity-0" 
                        class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="notifications_menu = false" aria-hidden="true">
                    </div>
        
                    
                    <div class="pointer-events-none fixed inset-0 flex items-center justify-center">
                        <div 
                            x-show="notifications_menu" 
                            style="display: none;"
                            x-transition:enter="transition ease-out duration-180 transform"
                            x-transition:enter-start="scale-75 opacity-0"
                            x-transition:enter-end="scale-100 opacity-100"
                            x-transition:leave="transition ease-in duration-180 transform"
                            x-transition:leave-start="scale-100 opacity-100"
                            x-transition:leave-end="scale-75 opacity-0"
                            class="pointer-events-auto w-screen max-w-xs lg:max-w-sm bg-white p-6 rounded-lg">
                            <div class="flex h-full flex-col bg-white dark:bg-zinc-700">
                                <div class="flex-1 overflow-y-auto overflow-x-hidden py-6 px-4 sm:px-6">
                                    <div class="flex items-start justify-between rtl:flex-row-reverse">
                                        <h2 class="text-base tracking-wide font-extrabold text-gray-900 dark:text-gray-200"> <?php echo e(__('messages.t_notifications'), false); ?> </h2>
                                        <div class="ml-3 flex h-7 items-center">
                                            <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" @click="notifications_menu = false">
                                                <span class="sr-only">Close panel</span>
                                                <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
        
                                    
                                     <div class="w-full overflow-auto h-full scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600">
                                         <div class="space-y-2 py-6">
                                             <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <div class="px-6 pb-1 pt-2" wire:key="header-notifications-<?php echo e($n->uid, false); ?>">
                                                     <div class="flex items-center bg-slate-100 px-4 py-2 rounded dark:bg-zinc-600">
                                                         <div class="flex-shrink-0">
                                                             <span class="rounded-md h-10 w-10 flex items-center justify-center dark:text-zinc-400 dark:border-zinc-500 border border-slate-300 text-slate-400">
                                                                 <svg class="h-5 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M19 13.586V10c0-3.217-2.185-5.927-5.145-6.742C13.562 2.52 12.846 2 12 2s-1.562.52-1.855 1.258C7.185 4.074 5 6.783 5 10v3.586l-1.707 1.707A.996.996 0 0 0 3 16v2a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-2a.996.996 0 0 0-.293-.707L19 13.586zM19 17H5v-.586l1.707-1.707A.996.996 0 0 0 7 14v-4c0-2.757 2.243-5 5-5s5 2.243 5 5v4c0 .266.105.52.293.707L19 16.414V17zm-7 5a2.98 2.98 0 0 0 2.818-2H9.182A2.98 2.98 0 0 0 12 22z"></path></svg>
                                                             </span>
                                                         </div>
                                                         <div class="ltr:ml-3 rtl:mr-3 w-0 flex-1">
                                                             <p class="dark:text-white text-[13px] font-normal text-slate-500 leading-relaxed">
                                                                 <?php if($n->params): ?>
                                                                     <?php echo __('messages.' . $n->text, $n->params); ?>

                                                                 <?php else: ?>
                                                                     <?php echo __('messages.' . $n->text); ?>

                                                                 <?php endif; ?>
                                                             </p>
                                                             <div class="mt-2 flex space-x-7 rtl:space-x-reverse">
                 
                                                                 
                                                                 <a href="<?php echo e($n->action, false); ?>" class="bg-transparent rounded-md text-primary-600 hover:text-primary-700 focus:outline-none text-xs tracking-wide dark:text-zinc-200 dark:hover:text-white">
                                                                     <?php echo e(__('messages.t_view'), false); ?>

                                                                 </a>
                                                                 
                                                                 
                                                                 <button wire:click="readNotification('<?php echo e($n->uid, false); ?>')" wire:loading.attr="disabled" wire:target="read('<?php echo e($n->uid, false); ?>')" type="button" class="bg-transparent rounded-md text-gray-700 hover:text-gray-500 focus:outline-none text-xs tracking-wide dark:text-zinc-200 dark:hover:text-white">
                                                                     
                                                                     <div wire:loading wire:target="readNotification('<?php echo e($n->uid, false); ?>')">
                                                                         <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                             <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                             <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                         </svg>
                                                                     </div>
                 
                                                                     
                                                                     <div wire:loading.remove wire:target="readNotification('<?php echo e($n->uid, false); ?>')">
                                                                         <?php echo e(__('messages.t_mark_as_read'), false); ?>

                                                                     </div>
                                                                 </button>
                 
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                         </div>
                                     </div>
        
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         
         
        <?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/partials/notifications.blade.php ENDPATH**/ ?>