<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900"><?php echo e(__('messages.t_home_settings'), false); ?></h2>
                <p class="mt-1 text-xs text-gray-500"><?php echo e(__('messages.t_home_section_settings_subtitle'), false); ?></p>
            </div>
            
            
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_show_popular_services')),'model' => 'show_popular_services']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>
                
                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_show_made_with')),'model' => 'show_made_with']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>
                
                
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
                
                
                <div class="col-span-12">
                    <span class="mb-2 text-xs font-semibold tracking-wide flex items-center text-gray-700 dark:text-gray-100"><?php echo e(__('messages.t_upload_made_with_images'), false); ?></span>
                    <?php if (isset($component)) { $__componentOriginal2c6dea5ce283b1b175f902a223d38045 = $component; } ?>
<?php $component = App\View\Components\Forms\Uploader::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.uploader'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Uploader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['model' => 'made_with_images','label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_benefits_3_logo')),'id' => 'uploader_images','extensions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['jpg', 'jpeg', 'png']),'accept' => 'image/jpg, image/jpeg, image/png','size' => '50','max' => '40']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2c6dea5ce283b1b175f902a223d38045)): ?>
<?php $component = $__componentOriginal2c6dea5ce283b1b175f902a223d38045; ?>
<?php unset($__componentOriginal2c6dea5ce283b1b175f902a223d38045); ?>
<?php endif; ?>
                    
                    
                
                <div class="fileuploader fileuploader-theme-thumbnails mt-5">
                    <div class="fileuploader-items">
                        <ul class="!grid !grid-cols-12 sm:!gap-x-6 gap-y-6 !m-auto fileuploader-items-list">

                            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li
                                    wire:key="gallery-image-item-<?php echo e($img->id, false); ?>"
                                    class="!col-span-12 sm:!col-span-6 md:!col-span-4 lg:!col-span-3 !w-full h-24 !m-auto fileuploader-item file-type-image file-ext-png file-has-popup rounded-[6px]">
                                    <div class="fileuploader-item-inner">
                                        <div class="type-holder"><?php echo e($img->file_extension, false); ?></div>
                                        <div class="actions-holder">
                                            <button type="button"
                                                x-on:click="confirm('<?php echo e(__('messages.t_are_u_sure_delete_this_image'), false); ?>') ? $wire.removeImage('<?php echo e($img->id, false); ?>') : ''" 
                                                wire:loading.attr="disabled" 
                                                wire:target="removeImage('<?php echo e($img->id, false); ?>')"
                                                class="fileuploader-action fileuploader-action-remove"
                                                title="<?php echo e(__('messages.t_delete'), false); ?>">
                                                <i class="fileuploader-icon-remove"></i>
                                            </button>
                                        </div>
                                        <div class="thumbnail-holder">
                                            <div class="fileuploader-item-image">
                                                <img class="lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($img), false); ?>" draggable="false">
                                            </div>
                                            <span class="fileuploader-action-popup"></span>
                                        </div>
                                        <div class="content-holder">
                                            <span><?php echo e(human_filesize($img->file_size), false); ?></span>
                                        </div>
                                        <div class="progress-holder"></div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </ul>
                    </div>
                </div>

                 
                </div>
            
                
                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_show_benefits')),'model' => 'show_benefits']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>
                
                                
                
                <div class="col-span-4">
                    <?php if (isset($component)) { $__componentOriginaldbcb357f98846a33f0e25887307a1f28 = $component; } ?>
<?php $component = App\View\Components\Forms\FileInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_benefits_1_logo')),'model' => 'benefits_1_logo','accept' => 'image/jpg,image/jpeg,image/png']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcb357f98846a33f0e25887307a1f28)): ?>
<?php $component = $__componentOriginaldbcb357f98846a33f0e25887307a1f28; ?>
<?php unset($__componentOriginaldbcb357f98846a33f0e25887307a1f28); ?>
<?php endif; ?>
                    
                    <?php if(settings('home')->benefits_1_logo): ?>
                        <div class="mt-3">
                            <img src="<?php echo e(src( settings('home')->benefits_logo_1 ), false); ?>" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    <?php endif; ?>
                </div>
                
                
                <div class="col-span-4">
                    <?php if (isset($component)) { $__componentOriginaldbcb357f98846a33f0e25887307a1f28 = $component; } ?>
<?php $component = App\View\Components\Forms\FileInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_benefits_2_logo')),'model' => 'benefits_2_logo','accept' => 'image/jpg,image/jpeg,image/png']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcb357f98846a33f0e25887307a1f28)): ?>
<?php $component = $__componentOriginaldbcb357f98846a33f0e25887307a1f28; ?>
<?php unset($__componentOriginaldbcb357f98846a33f0e25887307a1f28); ?>
<?php endif; ?>
                    
                    <?php if(settings('home')->benefits_2_logo): ?>
                        <div class="mt-3">
                            <img src="<?php echo e(src( settings('home')->benefits_logo_2 ), false); ?>" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    <?php endif; ?>
                </div>
                
                
                <div class="col-span-4">
                    <?php if (isset($component)) { $__componentOriginaldbcb357f98846a33f0e25887307a1f28 = $component; } ?>
<?php $component = App\View\Components\Forms\FileInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_benefits_3_logo')),'model' => 'benefits_3_logo','accept' => 'image/jpg,image/jpeg,image/png']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcb357f98846a33f0e25887307a1f28)): ?>
<?php $component = $__componentOriginaldbcb357f98846a33f0e25887307a1f28; ?>
<?php unset($__componentOriginaldbcb357f98846a33f0e25887307a1f28); ?>
<?php endif; ?>
                    
                    <?php if(settings('home')->benefits_3_logo): ?>
                        <div class="mt-3">
                            <img src="<?php echo e(src( settings('home')->benefits_logo_3 ), false); ?>" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    <?php endif; ?>
                </div>
                
                
                <div class="col-span-4">
                    <?php if (isset($component)) { $__componentOriginaldbcb357f98846a33f0e25887307a1f28 = $component; } ?>
<?php $component = App\View\Components\Forms\FileInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_benefits_4_logo')),'model' => 'benefits_4_logo','accept' => 'image/jpg,image/jpeg,image/png']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcb357f98846a33f0e25887307a1f28)): ?>
<?php $component = $__componentOriginaldbcb357f98846a33f0e25887307a1f28; ?>
<?php unset($__componentOriginaldbcb357f98846a33f0e25887307a1f28); ?>
<?php endif; ?>
                    
                    <?php if(settings('home')->benefits_4_logo): ?>
                        <div class="mt-3">
                            <img src="<?php echo e(src( settings('home')->benefits_logo_4 ), false); ?>" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    <?php endif; ?>
                </div>

                
                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_show_home_video')),'model' => 'show_home_video']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>
                
                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_show_gigs')),'model' => 'show_gigs']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>
                
                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_youtube_video_id')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_youtube_video_id_placeholder')),'model' => 'youtube_video_id','icon' => 'format-font','hint' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_youtube_video_id_hint'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                </div>
                
                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_show_join_us_banner')),'model' => 'show_join_us_banner']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                </div>

                
                <div class="col-span-12">
                    <?php if (isset($component)) { $__componentOriginaldbcb357f98846a33f0e25887307a1f28 = $component; } ?>
<?php $component = App\View\Components\Forms\FileInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.file-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\FileInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_join_us_banner_image')),'model' => 'join_us_image_id','accept' => 'image/jpg,image/jpeg,image/png']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldbcb357f98846a33f0e25887307a1f28)): ?>
<?php $component = $__componentOriginaldbcb357f98846a33f0e25887307a1f28; ?>
<?php unset($__componentOriginaldbcb357f98846a33f0e25887307a1f28); ?>
<?php endif; ?>
                    
                    <?php if(settings('home')->join_us_image): ?>
                        <div class="mt-3">
                            <img src="<?php echo e(src( settings('home')->join_us_image ), false); ?>" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    <?php endif; ?>
                </div>

            </div>

        </div>

        
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'update','text' => ''.e(__('messages.t_update'), false).'','block' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
        </div>                    

    </div>

</div>    <?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/admin/settings/home.blade.php ENDPATH**/ ?>