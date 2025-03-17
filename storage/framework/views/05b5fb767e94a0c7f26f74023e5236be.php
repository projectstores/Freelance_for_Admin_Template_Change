<div class="w-full" x-data="window.HtBWuUxgpMyrQEM" x-init="initialize">

    
    <?php if($errors->any()): ?>
        <div class="rounded-md bg-red-50 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <h3 class="text-sm font-medium text-red-800"><?php echo e(__('messages.t_toast_something_went_wrong'), false); ?></h3>
                    <div class="mt-2 text-sm text-red-700">
                    <ul role="list" class="list-disc ltr:pl-4 rtl:pr-4 space-y-1">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error, false); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    
    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading>
        <div class="w-full h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="text-xs font-medium tracking-wider text-white mt-4 block"><?php echo e(__('messages.t_please_wait_dots'), false); ?></span>
            </div>
        </div>
    </div>

    
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" wire:key="section_images">

        
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ltr:ml-4 rtl:mr-4 mt-4">
                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_images'), false); ?></h3>
                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_get_noticed_by_right_buyers_images'), false); ?></p>
                </div>
                <?php if(!$video_link): ?>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                        <button id="modal-add-youtube-video-button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                                <?php echo e(__('messages.t_add_a_video'), false); ?>

                            </span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        
        <div class="w-full mb-6 px-8 py-6">

            
            <div class="w-full mb-12" wire:ignore>
                <span class="mb-2 text-xs font-semibold tracking-wide flex items-center text-gray-700 dark:text-gray-100"><?php echo e(__('messages.t_upload_thumbnail'), false); ?></span>
                <?php if (isset($component)) { $__componentOriginal2c6dea5ce283b1b175f902a223d38045 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'thumbnail','id' => 'uploader_thumbnail','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['jpg', 'jpeg', 'png']),'accept' => 'image/jpg, image/jpeg, image/png','size' => ''.e(settings('publish')->max_image_size, false).'','max' => '1']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c6dea5ce283b1b175f902a223d38045)): ?>
<?php $component = $__componentOriginal2c6dea5ce283b1b175f902a223d38045; ?>
<?php unset($__componentOriginal2c6dea5ce283b1b175f902a223d38045); ?>
<?php endif; ?>
            </div>

            
            <div wire:ignore>
                <span class="mb-2 text-xs font-semibold tracking-wide flex items-center text-gray-700 dark:text-gray-100"><?php echo e(__('messages.t_upload_gig_images'), false); ?></span>
                <?php if (isset($component)) { $__componentOriginal2c6dea5ce283b1b175f902a223d38045 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'images','id' => 'uploader_images','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['jpg', 'jpeg', 'png']),'accept' => 'image/jpg, image/jpeg, image/png','size' => ''.e(settings('publish')->max_image_size, false).'','max' => ''.e(settings('publish')->max_images, false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c6dea5ce283b1b175f902a223d38045)): ?>
<?php $component = $__componentOriginal2c6dea5ce283b1b175f902a223d38045; ?>
<?php unset($__componentOriginal2c6dea5ce283b1b175f902a223d38045); ?>
<?php endif; ?>
            </div>

        </div>

    </div>

    
    <?php if($video_link): ?>
        <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" wire:key="section_video">

            
            <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ltr:ml-4 rtl:mr-4 mt-4">
                        <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_video'), false); ?></h3>
                        <p class="text-xs font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_capture_buyer_attention_with_video'), false); ?></p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                        <button wire:click="removeVideo" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span class="text-xs font-medium text-red-500 hover:text-red-600"> 
                                <?php echo e(__('messages.t_remove_video'), false); ?>

                            </span>
                        </button>
                    </div>
                </div>
            </div>

            
            <div class="w-full mb-6 px-8 py-6">

                
                <div class="bg-white rounded-md shadow-sm w-full h-52 md:w-[calc(25%-16px)] md:h-[173.23px]">
                    <div class="aspect-square rounded-md z-10 overflow-hidden w-full h-full">
                        <iframe src="https://www.youtube.com/embed/<?php echo e(youtubeId($video_link), false); ?>" height="100%" width="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

            </div>

        </div>
    <?php endif; ?>

    
    <?php if(settings('publish')->is_documents_enabled): ?>
        <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" wire:key="section_documents">

            
            <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ltr:ml-4 rtl:mr-4 mt-4">
                        <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_documents'), false); ?></h3>
                        <p class="text-xs font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_show_some_of_best_work_doc_pdfs_only'), false); ?></p>
                    </div>
                </div>
            </div>

            
            <div class="w-full mb-6 px-8 py-6">

                
                <div wire:ignore>
                    <?php if (isset($component)) { $__componentOriginal2c6dea5ce283b1b175f902a223d38045 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'documents','id' => 'uploader_documents','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['pdf']),'accept' => 'application/pdf','size' => ''.e(settings('publish')->max_document_size, false).'','max' => ''.e(settings('publish')->max_documents, false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c6dea5ce283b1b175f902a223d38045)): ?>
<?php $component = $__componentOriginal2c6dea5ce283b1b175f902a223d38045; ?>
<?php unset($__componentOriginal2c6dea5ce283b1b175f902a223d38045); ?>
<?php endif; ?>
                </div>

            </div>

        </div>
    <?php endif; ?>

    
    <div class="flex justify-between">
        <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'back','text' => ''.e(__('messages.t_back'), false).'','active' => 'bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'save','text' => ''.e(__('messages.t_save_and_continue'), false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
    </div>

    
    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-add-youtube-video-container','target' => 'modal-add-youtube-video-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_add_youtube_video'), false); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                
                <div class="col-span-12">
                    <div class="relative">
                
                        
                        <input type="text" placeholder="<?php echo e(__('messages.t_youtube_placeholder'), false); ?>" wire:model.defer="video_link" class="block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal <?php echo e($errors->first('video_link') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600', false); ?>">
                
                        
                        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 <?php echo e($errors->first('video_link') ? 'text-red-400' : 'text-gray-400', false); ?>" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                        </div>
                
                    </div>
                
                    
                    <?php $__errorArgs = ['video_link'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('video_link'), false); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                
                </div>

            </div>
         <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('footer', null, []); ?> 
            <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'addVideo','text' => ''.e(__('messages.t_add'), false).'','block' => 0]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>

</div>


<?php $__env->startPush('scripts'); ?>

    
    <script>
        function HtBWuUxgpMyrQEM() {
            return {

                initialize() {
                }

            }
        }
        window.HtBWuUxgpMyrQEM = HtBWuUxgpMyrQEM();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/create/steps/gallery.blade.php ENDPATH**/ ?>