
<?php if($viewType == 'default'): ?>
    <?php if($from_id != $to_id): ?>
    
        <?php
            $fetch = App\Models\User::where('id', $to_id)
                                ->select('id', 'uid', 'username', 'fullname', 'avatar_id', 'active_status')
                                ->with('avatar', function($query) {
                                    return $query->select('id', 'file_extension', 'file_folder', 'uid');
                                })
                                ->first();
    
        ?>
        
        <div class="message-card flex items-start space-x-4 xs:px-2 md:px-10 mt-5" data-id="<?php echo e($id, false); ?>">
            <!-- Avatar (Circle) -->
            <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0" style="background-image: url('<?php echo e(src($fetch->avatar), false); ?>');background-repeat: no-repeat; background-position: center center; background-size: cover;">
            </div>
        
            <!-- Message Content -->
            <div class="flex-grow">
                <!-- Username and Time (One Line) -->
                <div class="flex justify-start items-center mb-1">
                    <p class="text-base font-semibold text-black"><?php echo e($fetch->username, false); ?></p>
                    <p class="text-sm text-gray-400 mx-3"><?php echo e($time, false); ?></p>
                    <p class="text-sm text-gray-400">
                        
                        <div class="message-seen-status">
                            <?php if($seen): ?>
                                <svg class="text-blue-500 w-4.5 h-4.5 -mt-px message-is-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            <?php else: ?>
                                <svg class="text-gray-300 dark:text-zinc-300 w-4.5 h-4.5 -mt-px message-not-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            <?php endif; ?>
                        </div>

                    </p>
                </div>
        
    
                <div class="text-base text-black mt-3">
                
                    
                    <?php if($message): ?>
                        <div title="<?php echo e($fullTime, false); ?>">
                            <?php echo ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message); ?>

                        </div>
                    <?php endif; ?>
        
                    
                    <?php if(@$attachment[2] == 'file'): ?>
                        <div class="mt-2 w-fit bg-gray-200 dark:bg-zinc-700 rounded-md py-2 px-3" dir="<?php echo e(config()->get('direction'), false); ?>">
                            <div class="flex items-center justify-end space-x-5 rtl:space-x-reverse">
        
                                
                                <span class="fiv-sqo fiv-icon-<?php echo e($attachment[3], false); ?> text-4xl"></span>
            
                                
                                <div class="flex flex-col justify-center">
            
                                    
                                    <span class="text-[13px] font-semibold text-zinc-700 dark:text-slate-200 truncate max-w-xs"><?php echo e($attachment[1], false); ?></span>
            
                                    
                                    <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs text-zinc-500 dark:text-zinc-400 mt-1">
            
                                        
                                        <span><?php echo e(format_bytes($attachment[4]), false); ?></span>
            
                                        
                                        <a href="<?php echo e(url('inbox/download', $attachment[0]), false); ?>" class="text-blue-600 hover:underline disabled:text-gray-400 disabled:cursor-not-allowed disabled:pointer-events-none disabled:no-underline"><?php echo app('translator')->get('messages.t_download'); ?></a>
            
                                    </div>
            
                                </div>
        
                            </div>
                        </div>
                    <?php endif; ?>
        
                    
                    <?php if(@$attachment[2] == 'image'): ?>
                        <div class="image-file chat-image w-60 h-48" style="background-image: url('<?php echo e(Chatify::getAttachmentUrl($attachment[0]), false); ?>')"></div>
                    <?php endif; ?>
    
                </div>
            </div>
        </div>
    
    <?php endif; ?>
<?php endif; ?>


<?php if($viewType == 'sender'): ?>

     <?php
            $fetch = App\Models\User::where('id', $to_id)
                                ->select('id', 'uid', 'username', 'fullname', 'avatar_id', 'active_status')
                                ->with('avatar', function($query) {
                                    return $query->select('id', 'file_extension', 'file_folder', 'uid');
                                })
                                ->first();
    
        ?>
        
        <div class="message-card flex items-start space-x-4 xs:px-2 md:px-10 mt-5" data-id="<?php echo e($id, false); ?>">
            <!-- Avatar (Circle) -->
            <div class="w-12 h-12 rounded-full bg-gray-300 flex-shrink-0" style="background-image: url('<?php echo e(src($fetch->avatar), false); ?>');background-repeat: no-repeat; background-position: center center; background-size: cover;">
            </div>
        
            <!-- Message Content -->
            <div class="flex-grow">
                <!-- Username and Time (One Line) -->
                <div class="flex justify-start items-center mb-1">
                    <p class="text-base font-semibold text-black"><?php echo e($fetch->username, false); ?></p>
                    <p class="text-sm text-gray-400 mx-3"><?php echo e($time, false); ?></p>
                    <p class="text-sm text-gray-400">
                        
                        <div class="message-seen-status">
                            <?php if($seen): ?>
                                <svg class="text-blue-500 w-4.5 h-4.5 -mt-px message-is-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            <?php else: ?>
                                <svg class="text-gray-300 dark:text-zinc-300 w-4.5 h-4.5 -mt-px message-not-seen" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M11.602 13.76l1.412 1.412 8.466-8.466 1.414 1.414-9.88 9.88-6.364-6.364 1.414-1.414 2.125 2.125 1.413 1.412zm.002-2.828l4.952-4.953 1.41 1.41-4.952 4.953-1.41-1.41zm-2.827 5.655L7.364 18 1 11.636l1.414-1.414 1.413 1.413-.001.001 4.951 4.951z"></path></g></svg>
                            <?php endif; ?>
                        </div>

                    </p>
                    <p class="text-sm text-gray-400 mx-2">
                        
                        <button class="text-xs font-medium !text-red-500 chatify-hover-delete-btn" data-id="<?php echo e($id, false); ?>">
                            <?php echo app('translator')->get('messages.t_delete'); ?>
                        </button>
                    </p>
                </div>
        
    
                <div class="text-base text-black mt-3">
                
                    
                    <?php if($message): ?>
                        <div title="<?php echo e($fullTime, false); ?>">
                            <?php echo ($message == null && $attachment != null && @$attachment[2] != 'file') ? $attachment[1] : nl2br($message); ?>

                        </div>
                    <?php endif; ?>
        
                    
                    <?php if(@$attachment[2] == 'file'): ?>
                        <div class="mt-2 w-fit border border-gray-200 dark:bg-zinc-700 rounded-md py-2 px-3" dir="<?php echo e(config()->get('direction'), false); ?>">
                            <div class="flex items-center justify-end space-x-5 rtl:space-x-reverse">
        
                                
                                <span class="fiv-sqo fiv-icon-<?php echo e($attachment[3], false); ?> text-4xl"></span>
            
                                
                                <div class="flex flex-col justify-center">
            
                                    
                                    <span class="text-[13px] font-semibold text-zinc-700 dark:text-slate-200 truncate max-w-xs"><?php echo e($attachment[1], false); ?></span>
            
                                    
                                    <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs text-zinc-500 dark:text-zinc-400 mt-1">
            
                                        
                                        <span><?php echo e(format_bytes($attachment[4]), false); ?></span>
            
                                        
                                        <a href="<?php echo e(url('inbox/download', $attachment[0]), false); ?>" class="text-blue-600 hover:underline disabled:text-gray-400 disabled:cursor-not-allowed disabled:pointer-events-none disabled:no-underline"><?php echo app('translator')->get('messages.t_download'); ?></a>
            
                                    </div>
            
                                </div>
        
                            </div>
                        </div>
                    <?php endif; ?>
        
                    
                    <?php if(@$attachment[2] == 'image'): ?>
                        <div class="image-file chat-image w-60 h-48" style="background-image: url('<?php echo e(Chatify::getAttachmentUrl($attachment[0]), false); ?>')"></div>
                    <?php endif; ?>
    
                </div>
            </div>
        </div>
<?php endif; ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/Chatify/layouts/messageCard.blade.php ENDPATH**/ ?>