<div class="w-full" x-data="window.fPXrWRfAGOuzate" x-init="initialize">
    
    
    <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
        <div class="flex items-center space-x-5 rtl:space-x-reverse">
            <div class="flex-shrink-0">
                <div class="relative">
                    <img class="h-16 w-16 rounded-full object-cover" src="<?php echo e(src($project->thumbnail), false); ?>" alt="<?php echo e($project->title, false); ?>">
                    <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900 dark:text-white"><?php echo e($project->title, false); ?></h1>
            </div>
        </div>
        <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3 rtl:space-x-reverse lg:rtl:!-ml-[5px]">

            
            <?php if($project->project_video): ?>
                <a href="<?php echo e($project->project_video, false); ?>" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-zinc-700 shadow-sm text-xs font-medium rounded-sm text-gray-700 dark:text-zinc-400 bg-white dark:bg-zinc-700 dark:hover:bg-zinc-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-600">
                    <?php echo e(__('messages.t_watch_video'), false); ?>

                </a>
            <?php endif; ?>

            
            <?php if($project->project_link): ?>
                <a href="<?php echo e(url('redirect?to='. safeEncrypt($project->project_link)), false); ?>" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-xs font-medium rounded-sm shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-600">
                    <?php echo e(__('messages.t_live_preview'), false); ?>

                </a>
            <?php endif; ?>

        </div>
    </div>

    <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="space-y-6 lg:col-start-1 lg:col-span-2">
            
            
            <section aria-labelledby="applicant-information-title">
                <div class="bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">

                        
                        <div class="mb-8 mt-8" wire:ignore>
                            <div class="project_images_slider md:h-[460px] rounded-lg">
                                <?php $__currentLoopData = $project->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="w-full">
                                        <img src="<?php echo e(src($image->image), false); ?>" class="block md:h-[460px] rounded-lg m-auto" alt="<?php echo e($project->title, false); ?>">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        
                        <div class="text-lg max-w-prose mx-auto">
                            <h1>
                                <span class="block text-base text-center text-primary-600 font-black uppercase tracking-widest"><?php echo e(__('messages.t_description'), false); ?></span>
                            </h1>
                            <p class="mt-8 text-xl text-gray-500 leading-8">
                                <?php echo nl2br($project->description); ?>

                            </p>
                        </div>

                        
                        <span class="text-center font-medium text-gray-800 text-sm mb-4 mt-24 flex items-center justify-center"><?php echo e(__('messages.t_share_this_project'), false); ?></span>
                        <div class="flex items-center justify-center pb-6">

                            
                            <a href="https://www.facebook.com/sharer.php?t=<?php echo e($project->title, false); ?>&u=<?php echo e(url('projects', $project->slug), false); ?>" target="_blank" data-tooltip-target="project-share-facebook" class="text-white bg-[#4267B2] hover:bg-[#4267B2]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-facebook text-xl"></i>
                            </a>
                            <div id="project-share-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                <?php echo e(__('messages.t_share_on_facebook'), false); ?>

                            </div>

                            
                            <a href="https://twitter.com/intent/tweet?text=<?php echo e($project->title, false); ?>&url=<?php echo e(url('projects', $project->slug), false); ?>" target="_blank" data-tooltip-target="project-share-twitter" class="text-white bg-[#00acee] hover:bg-[#00acee]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-twitter text-xl"></i>
                            </a>
                            <div id="project-share-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                <?php echo e(__('messages.t_share_on_twitter'), false); ?>

                            </div>

                            
                            <a href="https://www.linkedin.com/shareArticle?title=<?php echo e($project->title, false); ?>&url=<?php echo e(url('projects', $project->slug), false); ?>" target="_blank" data-tooltip-target="project-share-linkedin" class="text-white bg-[#0072b1] hover:bg-[#0072b1]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-linkedin text-xl"></i>
                            </a>
                            <div id="project-share-linkedin" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                <?php echo e(__('messages.t_share_on_linkedin'), false); ?>

                            </div>

                            
                            <a href="https://snapchat.com/scan?attachmentUrl=<?php echo e(url('projects', $project->slug), false); ?>" target="_blank" data-tooltip-target="project-share-snapchat" class="text-gray-700 bg-[#FFFC00] hover:bg-[#FFFC00]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-snapchat text-xl"></i>
                            </a>
                            <div id="project-share-snapchat" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                <?php echo e(__('messages.t_share_on_snapchat'), false); ?>

                            </div>

                            
                            <a href="https://www.pinterest.com/pin/create/button/?description=<?php echo e($project->title, false); ?>&media=&url=<?php echo e(url('projects', $project->slug), false); ?>" target="_blank" data-tooltip-target="project-share-pinterest" class="text-white bg-[#E60023] hover:bg-[#E60023]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-pinterest text-xl"></i>
                            </a>
                            <div id="project-share-pinterest" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                <?php echo e(__('messages.t_share_on_pinterest'), false); ?>

                            </div>

                            
                            <a href="https://web.whatsapp.com/send?text=<?php echo e(url('projects', $project->slug), false); ?>" target="_blank" data-tooltip-target="project-share-whatsapp" class="text-white bg-[#25D366] hover:bg-[#25D366]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-whatsapp text-xl"></i>
                            </a>
                            <div id="project-share-whatsapp" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                <?php echo e(__('messages.t_share_on_whatsapp'), false); ?>

                            </div>

                        </div>

                    </div>
                </div>
            </section>

        </div>

        
        <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
            <div class="bg-white dark:bg-zinc-800 px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <div class="md:flex">
                    <div class="w-full p-2 py-10">
                    
                        <div class="flex justify-center">
                            <div class="relative">
                
                                
                                <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($project->user->avatar), false); ?>" alt="<?php echo e($project->user->username, false); ?>" class="lazy rounded-full w-20 h-20 object-cover">

                                
                                <?php if($project->user->isOnline() && !$project->user->availability): ?>
                                    
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-400 rounded-full"></span>
                                <?php elseif($project->user->availability): ?>
                                    
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-gray-600 rounded-full"></span>
                                <?php else: ?>
                                    
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-red-600 rounded-full"></span>
                                <?php endif; ?>
                        
                            </div>
                        </div>
            
                        <div class="flex flex-col text-center mt-3 mb-4">
                            <span class="text-md font-extrabold text-gray-800 dark:text-zinc-200 flex items-center justify-center">
                                <?php echo e($project->user->username, false); ?>

                                <?php if($project->user->status === 'verified'): ?>
                                    <img data-tooltip-target="tooltip-account-verified-<?php echo e($project->id, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                                    <div id="tooltip-account-verified-<?php echo e($project->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        <?php echo e(__('messages.t_account_verified'), false); ?>

                                    </div>
                                <?php endif; ?>
                            </span>
                            <span class="text-sm text-gray-400"><?php echo e($project->user->headline, false); ?></span>
                        </div>
            
                        <p class="px-16 text-center text-sm text-gray-500 italic">
                            <?php echo e($project->user->description, false); ?>

                        </p>

                        
                        <div class="px-14 mt-8">

                            
                            <a href="<?php echo e(url('messages/new', $project->user->username), false); ?>" class="flex items-center justify-center h-12 bg-primary-600 w-full text-white text-sm font-medium rounded hover:shadow hover:bg-primary-700 <?php echo e(auth()->check() && auth()->id() !== $project->user->id ? '' : '', false); ?>"><?php echo e(__('messages.t_contact_me'), false); ?></a>
                            
                        </div>
                        
                    </div>
                
                </div>
            </div>
        </section>

    </div>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <script defer type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        window.addEventListener('DOMContentLoaded', (event) => {
            $('.project_images_slider').slick({
                autoplay: true,
                dots    : false,
                arrows  : false
            });
        });
    </script>
    
    
    <script>
        function fPXrWRfAGOuzate() {
            return {

                // Init
                initialize() {
                    
                }

            }
        }
        window.fPXrWRfAGOuzate = fPXrWRfAGOuzate();
    </script>

<?php $__env->stopPush(); ?>

<?php $__env->startPush('styles'); ?>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@v5/font/simple-icons.min.css" type="text/css">

    
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/profile/project.blade.php ENDPATH**/ ?>