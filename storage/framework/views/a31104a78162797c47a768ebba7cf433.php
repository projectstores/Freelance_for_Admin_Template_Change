<div class="w-full">
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-5">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-2xl font-bold leading-7 text-black dark:text-gray-50 sm:truncate sm:tracking-tight">
                        <?php echo app('translator')->get('messages.my_portfolio'); ?>
                    </h2>

                    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    
    				<span class="block">
                        <a href="<?php echo e(url('/'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_switch_to_buying'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">

        
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">

            
            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                        
                <div class="relative flex flex-col break-words rounded-xl shadow-sm" wire:key="freelancer-portfolio-<?php echo e($project->uid, false); ?>">

                    
                    <img class="h-72 w-full rounded-lg object-cover object-center" src="<?php echo e(src($project->thumbnail), false); ?>" alt="<?php echo e($project->title, false); ?>">

                    
                    <div class="absolute inset-0 flex h-full w-full flex-col justify-end">
                        <div class="space-y-1.5 rounded-lg bg-gradient-to-t from-[#00000091] via-[#000000cc] to-transparent px-4 pb-3 pt-12">

                            
                            <div class="line-clamp-2">
                                <a href="<?php echo e(url('profile/' . $project->user->username . '/portfolio/' . $project->slug), false); ?>" target="_blank" class="text-base font-medium text-white">
                                    <?php echo e($project->title, false); ?>

                                </a>
                            </div>

                            
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-xs text-slate-200">

                                    
                                    <?php if($project->status === 'pending'): ?>
                                        <span class="inline-flex items-center rounded-full text-xs font-medium text-amber-300">
                                            <?php echo e(__('messages.t_pending'), false); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex items-center rounded-full text-xs font-medium text-green-400">
                                            <?php echo e(__('messages.t_active'), false); ?>

                                        </span>
                                    <?php endif; ?>

                                    
                                    <div class="mx-3 my-0.5 w-px self-stretch bg-white/20"></div>
                                        <p class="shrink-0 text-xs font-normal tracking-wide">
                                            <?php echo e(format_date($project->created_at), false); ?>

                                        </p>
                                    </div>

                                
                                <div class="ltr:-mr-1.5 rtl:-ml-1.5 flex space-x-2 rtl:space-x-reverse">

                                    
                                    <a href="<?php echo e(url('seller/portfolio/edit', $project->uid), false); ?>" class="h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 flex items-center justify-center">
                                        <svg class="w-4 h-4 text-slate-100" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                    </a>

                                    
                                    <button 
                                        x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_u_want_to_delete_project'), false); ?>') ? $wire.delete('<?php echo e($project->uid, false); ?>') : ''" 
                                        wire:loading.attr="disabled" 
                                        wire:target="delete('<?php echo e($project->uid, false); ?>')"
                                        type="button" 
                                        class="h-7 w-7 rounded-full p-0 hover:bg-slate-300/20 flex items-center justify-center disabled:cursor-not-allowed disabled:bg-slate-400">

                                        
                                        <div wire:loading wire:target="delete('<?php echo e($project->uid, false); ?>')">
                                            <svg role="status" class="w-4 h-4 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        
                                        <div wire:loading.remove wire:target="delete('<?php echo e($project->uid, false); ?>')">
                                            <svg class="w-4 h-4 text-slate-100" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                        </div>

                                    </button>
                                    
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            
            <a href="<?php echo e(url('seller/portfolio/create'), false); ?>" class="h-72 rounded-xl border-dashed border-2 border-slate-200 bg-opacity-20 bg-slate-100 hover:bg-opacity-100 dark:border-zinc-600 dark:bg-zinc-800 dark:hover:bg-zinc-700 flex items-center justify-center flex-col">
                <svg class="h-14 w-14 text-slate-300 dark:text-zinc-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 3.75a.75.75 0 01.75.75v6.75h6.75a.75.75 0 010 1.5h-6.75v6.75a.75.75 0 01-1.5 0v-6.75H4.5a.75.75 0 010-1.5h6.75V4.5a.75.75 0 01.75-.75z" clip-rule="evenodd"></path></svg>
            </a>

        </div>

        
        <?php if($projects->hasPages()): ?>
            <div class="flex justify-center pt-12">
                <?php echo $projects->links('pagination::tailwind'); ?>

            </div>
        <?php endif; ?>

    </div>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/portfolio/portfolio.blade.php ENDPATH**/ ?>