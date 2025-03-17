
<?php if($get == 'saved'): ?>
    <table class="messenger-list-item !border-b-gray-100 dark:!border-zinc-700" data-contact="<?php echo e(strtolower(auth()->user()->uid), false); ?>" data-contact-id="<?php echo e(auth()->id(), false); ?>">
        <tr data-action="0">
            
            <td>
            <div class="rounded-full flex flex-col items-center justify-center bg-primary-700 text-center p-2">
                <svg class="w-8 h-8 text-white" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M9 4h6a2 2 0 0 1 2 2v14l-5 -3l-5 3v-14a2 2 0 0 1 2 -2"></path></svg>
            </div>
            </td>
            
            <td>
                <p data-id="<?php echo e(auth()->id(), false); ?>" data-type="user" class="!text-2xl !font-bold text-slate-700 rtl:flex rtl:justify-between">
                    <?php echo app('translator')->get('messages.t_saved_messages'); ?> 
                    <span class="!text-xs font-normal !text-slate-400"><?php echo app('translator')->get('messages.t_you'); ?></span>
                </p>
                <span class="!text-xs !text-slate-400 dark:!text-slate-300"><?php echo app('translator')->get('messages.t_save_messages_secretly'); ?></span>
            </td>
        </tr>
    </table>
<?php endif; ?>


<?php if($get == 'users'): ?>
    <table class="messenger-list-item hover:bg-[#e9eef5] dark:hover:bg-[#323232]" data-contact="<?php echo e(strtolower($user->uid), false); ?>" data-contact-id="<?php echo e($user->id, false); ?>">
        <tr data-action="0">

            
            <td style="position: relative">
                <?php if(true): ?>
                    <span class="activeStatus"></span>
                <?php endif; ?>
                <div class="w-12 h-12 rounded-full flex flex-col items-center justify-center border border-gray-300 text-center" style="background-image: url('<?php echo e(src($user->avatar), false); ?>');background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>
            </td>

            
            <td>
                <p data-id="<?php echo e($user->id, false); ?>" data-type="user" class="!text-2xl font-bold text-black rtl:flex rtl:justify-between"">

                    
                    <?php echo e(strlen($user->username) > 15 ? trim(substr($user->username,0,15)).'...' : $user->username, false); ?>


                    
                    <span class="!text-xs font-normal !text-slate-400 contact-item-time" data-time="<?php echo e($lastMessage->created_at, false); ?>"><?php echo e(format_date($lastMessage->created_at), false); ?></span>
                
                </p>

                <span class="!text-xs !text-slate-400 flex items-center justify-between h-5">

                    

                    <div class="rtl:flex" dir="<?php echo e(config()->get('direction'), false); ?>">
                        
                        <?php echo $lastMessage->from_id == Auth::user()->id
                            ? '<span class="lastMessageIndicator !text-xs !font-medium ltr:pr-1 rtl:pl-1">' . __("messages.t_you") . '</span>'
                            : ''; ?>

                        
                        <?php if($lastMessage->attachment == null): ?>
                            <?php echo strlen($lastMessage->body) > 30
                                ? trim(substr($lastMessage->body, 0, 30)).'..'
                                : $lastMessage->body; ?>

                        <?php else: ?>
    
                            <?php
                                $msg_attach = json_decode($lastMessage->attachment);
                            ?>
    
                            
                            <?php if(in_array($msg_attach->extension, config('chatify.attachments.allowed_images'))): ?>
                                <div class="flex items-center space-x-1 rtl:space-x-reverse ltr:ml-1.5 rtl:mr-1.5">
                                    <svg class="h-4 w-4 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path></svg>
                                    <div><?php echo app('translator')->get('messages.t_image'); ?></div>
                                </div>
                            <?php else: ?>
                                <div class="flex items-center space-x-1 rtl:space-x-reverse ltr:ml-1.5 rtl:mr-1.5">
                                    <svg class="h-4 w-4 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"></path></svg>
                                    <div><?php echo app('translator')->get('messages.t_attachment'); ?></div>
                                </div>
                            <?php endif; ?>
                            
                        <?php endif; ?>
                    </div>

                    
                    <?php echo $unseenCounter > 0 ? "<b class='new-messages-counter'>".$unseenCounter."</b>" : ''; ?>


                </span>

            </td>

        </tr>
    </table>
<?php endif; ?>


<?php if($get == 'search_item'): ?>
    <table class="messenger-list-item" data-contact="<?php echo e(strtolower($user->uid), false); ?>" data-contact-id="<?php echo e($user->id, false); ?>">
        <tr data-action="0">

            
            <td class="relative">
                <div class="avatar av-m" style="background-image: url('<?php echo e(src($user->avatar), false); ?>');">
                </div>
            </td>

            
            <td>
                <p data-id="<?php echo e($user->id, false); ?>" data-type="user">
                <?php echo e(strlen($user->username) > 15 ? trim(substr($user->username,0,15)).'..' : $user->username, false); ?>

            </td>

        </tr>
    </table>
<?php endif; ?>


<?php if($get == 'sharedPhoto'): ?>
    <div class="shared-photo chat-image" style="background-image: url('<?php echo e($image, false); ?>')"></div>
<?php endif; ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/Chatify/layouts/listItem.blade.php ENDPATH**/ ?>