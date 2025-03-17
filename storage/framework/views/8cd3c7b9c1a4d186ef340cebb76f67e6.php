<div class="gig-card" x-data="window._<?php echo e($gig->uid, false); ?>" dir="<?php echo e(config()->get('direction'), false); ?>">
    <div class="relative bg-white dark:bg-zinc-800 rounded-md shadow-sm ring-1 ring-gray-200 dark:ring-zinc-800">

        
        <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="flex items-center justify-center overflow-hidden w-full h-52 bg-gray-100 dark:bg-zinc-700">
            <img class="object-contain max-h-52 lazy h-52 w-auto" width="200" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($gig->thumbnail), false); ?>" alt="<?php echo e($gig->title, false); ?>">
        </a>
        
        
        <button <?php if(auth()->guard()->check()): ?> <?php if($favorite): ?> wire:click="removeFromFavorite('<?php echo e($gig->uid, false); ?>')" wire:target="removeFromFavorite('<?php echo e($gig->uid, false); ?>')" <?php else: ?> wire:click="addToFavorite('<?php echo e($gig->uid, false); ?>')" wire:target="addToFavorite('<?php echo e($gig->uid, false); ?>')" <?php endif; ?> wire:loading.attr="disabled" <?php endif; ?> <?php if(auth()->guard()->guest()): ?> x-on:click="loginToAddToFavorite" <?php endif; ?> data-tooltip-target="tooltip-add-to-favorites-<?php echo e($gig->uid, false); ?>" class="absolute top-0 right-0 mt-1 mr-1 h-8 w-8 rounded-full flex items-center justify-center focus:outline-none visited:outline-none">

            
            <?php if(auth()->guard()->check()): ?>
                
                <div wire:loading <?php if($favorite): ?> wire:target="removeFromFavorite('<?php echo e($gig->uid, false); ?>')" <?php else: ?> wire:target="addToFavorite('<?php echo e($gig->uid, false); ?>')" <?php endif; ?>>
                    <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                    </svg>
                </div>

                
                <div wire:loading.remove <?php if($favorite): ?> wire:target="removeFromFavorite('<?php echo e($gig->uid, false); ?>')" <?php else: ?> wire:target="addToFavorite('<?php echo e($gig->uid, false); ?>')" <?php endif; ?>>
                    <svg class="w-5 h-5 <?php echo e($favorite ? 'text-red-500 hover:text-red-600' : 'text-gray-400 hover:text-gray-500', false); ?>" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                </div>
            <?php endif; ?>

            
            <?php if(auth()->guard()->guest()): ?>
                <svg class="w-5 h-5 text-gray-400 hover:text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            <?php endif; ?>
            
        </button>
        <div id="tooltip-add-to-favorites-<?php echo e($gig->uid, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
            <?php if($favorite): ?>
                <?php echo e(__('messages.t_remove_from_favorite'), false); ?>

            <?php else: ?>
                <?php echo e(__('messages.t_add_to_favorite'), false); ?>

            <?php endif; ?>
        </div>

        
        <div class="px-4 pb-2 mt-4">

            
            <a href="<?php echo e(url('service', $gig->slug), false); ?>" class="gig-card-title font-semibold text-gray-800 dark:text-gray-100 hover:text-primary-600 dark:hover:text-white mb-3 !overflow-hidden">
                <?php echo e(htmlspecialchars_decode($gig->title), false); ?>

            </a>
            
            <div class="grid grid-cols-2 gap-2">
                
                <div class="col-span-1 flex items-center">
                    <svg style="margin-right: 5px" xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#7d7d7d"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 27-3 53t-10 51q-14-16-32.5-27T794-418q3-15 4.5-30.5T800-480q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93q51 0 97.5-15t85.5-42q12 17 29.5 30t37.5 20q-51 41-114.5 64T480-80Zm290-160q-21 0-35.5-14.5T720-290q0-21 14.5-35.5T770-340q21 0 35.5 14.5T820-290q0 21-14.5 35.5T770-240Zm-158-52L440-464v-216h80v184l148 148-56 56Z"/></svg>
                    <span class="text-sm"><?php echo e(format_date ( $gig->created_at ), false); ?></span>
                </div>
            
                
                <div class="col-span-1 text-right">
                    <small class="text-body-3 dark:!text-zinc-200"><?php echo e(__('messages.t_from'), false); ?></small>
                    <span class="text-gray-800 dark:text-gray-100 font-bold text-base ltr:text-right rtl:text-left dark:!text-white"><?php echo money($gig->price, settings('currency')->code, true); ?></span>
                </div>
            </div>

        </div>

        
        <div class="px-3 py-3 bg-[#fdfdfd] dark:bg-zinc-800 border-t dark:border-zinc-700 text-right sm:px-4 rounded-b-md flex justify-between">

            
            
            <?php if($profile_visible): ?>
                <div class="col-span-6 flex justify-between items-center">
                    <a href="<?php echo e(url('profile', $gig->owner->username), false); ?>" target="_blank" class="flex-shrink-0 group block">
                        <div class="flex items-center">
                            <span class="inline-block relative">
                                <img class="h-10 w-10 rounded-full object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($gig->owner->avatar), false); ?>" alt="<?php echo e($gig->owner->username, false); ?>">
                            </span>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <div class="text-gray-500 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-300 flex items-center mb-0.5 font-extrabold tracking-wide text-[13px]">
                                <?php echo e($gig->owner->username, false); ?>

                                <?php if($gig->owner->status === 'verified'): ?>
                                    <img data-tooltip-target="tooltip-account-verified-<?php echo e($gig->uid, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                    <div id="tooltip-account-verified-<?php echo e($gig->uid, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <?php echo e(__('messages.t_account_verified'), false); ?>

                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        </div>
                    </a>
                </div>
            <?php endif; ?>
            
            
            <div class="col-span-6 flex items-center" wire:ignore>

                
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>

                
                <?php if($gig->rating == 0): ?>
                    <div class=" text-[13px] tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e(__('messages.t_n_a'), false); ?></div>
                <?php else: ?>
                    <div class=" text-sm tracking-widest text-amber-500 ltr:ml-1 rtl:mr-1 font-black"><?php echo e($gig->rating, false); ?></div>
                <?php endif; ?>

                
                <div class="ltr:ml-1 rtl:mr-1 text-[13px] font-normal text-gray-400">
                    (<?php echo e(number_format($gig->counter_reviews), false); ?>)
                </div>
                
            </div>
            
        </div>

    </div>

</div>

<?php $__env->startPush('scripts'); ?>
    
    
    <script>
        function _<?php echo e($gig->uid, false); ?>() {
            return {

                // Login to add to favorite
                loginToAddToFavorite() {
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_info'), false); ?>",
                        description: "<?php echo e(__('messages.t_pls_login_or_register_to_add_to_favovorite'), false); ?>",
                        icon       : 'info'
                    });
                }

            }
        }
        window._<?php echo e($gig->uid, false); ?> = _<?php echo e($gig->uid, false); ?>();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/livewire/main/cards/gig.blade.php ENDPATH**/ ?>