<div class="w-full" x-data="window.CQjwMygsGRWknEn" x-init="initialize">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-7">
            <div class="bg-white dark:bg-zinc-800 rounded-lg shadow-sm border border-gray-100 dark:border-zinc-700 px-8 py-6">

                
                <div class="mb-14">
                    <h2 class="text-[15px] tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100 mb-1"><?php echo e(__('messages.t_overview'), false); ?></h2>
                    <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_edit_gig_basic_details'), false); ?></p>
                </div>

                
                <div class="grid grid-cols-12 md:gap-x-8 gap-y-10">
            
                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_i_will'), false).'','placeholder' => ''.e(__('messages.t_do_something_im_really_good_at'), false).'','model' => 'title','svg_icon' => '<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                    </div>
                
                    
                    <div class="col-span-12 lg:col-span-6">
                        <label class="mb-3 block text-[0.8125rem] font-medium <?php echo e($errors->first('category') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-white', false); ?>"><?php echo e(__('messages.t_choose_parent_category'), false); ?></label>
                        <div class="min-w-0">
                            <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto border rounded <?php echo e($errors->first('category') ? 'border-red-500' : 'border-gray-100 dark:border-zinc-700', false); ?>">
        
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li wire:click="$set('category', <?php echo e($cat->id, false); ?>)" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-900 dark:text-gray-200 <?php echo e($category === $cat->id ? 'bg-gray-50 dark:bg-zinc-700' : '', false); ?>">
                                        <img src="<?php echo e(src($cat->icon), false); ?>" alt="<?php echo e($cat->name, false); ?>" class="h-6 w-6 flex-none rounded-full">
                                        <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium"><?php echo e($cat->name, false); ?></span>
                                        <div wire:loading.remove wire:target="$set('category', <?php echo e($cat->id, false); ?>)">
                                            <?php if($category === $cat->id): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                            <?php else: ?>

                                                
                                                <svg class="hidden ltr:block ml-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path> </svg>

                                                
                                                <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block mr-3 h-4 w-4 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                            <?php endif; ?>
                                        </div>
        
                                        
                                        <div wire:loading wire:target="$set('category', <?php echo e($cat->id, false); ?>)">
                                            <svg class="animate-spin ltr:-ml-3 rtl:-mr-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                            </ul>
                        </div>
                        
                        <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('category'), false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                
                    
                    <div class="col-span-12 lg:col-span-6">
        
                        <label class="mb-3 block text-[0.8125rem] font-medium <?php echo e($errors->first('subcategory') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-white', false); ?>"><?php echo e(__('messages.t_choose_subcategory'), false); ?></label>
                        <div class="min-w-0">
                            <ul class="max-h-52 flex-auto space-y-1 overflow-y-auto <?php echo e(count($subcategories) ? 'border rounded' : '', false); ?> <?php echo e($errors->first('subcategory') ? 'border-red-500' : 'border-gray-100 dark:border-zinc-700', false); ?>">
        
                                <?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li wire:click="$set('subcategory', <?php echo e($subcat->id, false); ?>)" class="group flex cursor-pointer items-center rounded-0 p-2 hover:bg-gray-50 dark:hover:bg-zinc-700 text-gray-900 dark:text-gray-200 <?php echo e($subcategory === $subcat->id ? 'bg-gray-50 dark:bg-zinc-700' : '', false); ?>">
                                        <img src="<?php echo e(src($subcat->icon), false); ?>" alt="<?php echo e($subcat->name, false); ?>" class="h-6 w-6 flex-none rounded-full">
                                        <span class="ltr:ml-3 rtl:mr-3 flex-auto truncate text-xs font-medium"><?php echo e($subcat->name, false); ?></span>
                                        <div wire:loading.remove wire:target="$set('subcategory', <?php echo e($subcat->id, false); ?>)">
                                            <?php if($subcategory === $subcat->id): ?>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:ml-3 rtl:mr-3 h-4 w-4 flex-none text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                            <?php endif; ?>
                                        </div>
        
                                        
                                        <div wire:loading wire:target="$set('subcategory', <?php echo e($subcat->id, false); ?>)">
                                            <svg class="animate-spin -ml-3 h-4 w-4 flex-none text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"> <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle> <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path> </svg>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
                            </ul>
                        </div>
                        
                        <?php $__errorArgs = ['subcategory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('subcategory'), false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                
                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginalc366661bc2e82de8f861465d0ec8e258 = $component; } ?>
<?php $component = App\View\Components\Forms\Ckeditor::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.ckeditor'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Ckeditor::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_description')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_briefly_describe_ur_gig')),'model' => 'description','old' => ''.str_replace(['&amp;nbsp;', '&nbsp;'], ' ', $gig->description).'','target' => 'edit-gig-action-btn']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc366661bc2e82de8f861465d0ec8e258)): ?>
<?php $component = $__componentOriginalc366661bc2e82de8f861465d0ec8e258; ?>
<?php unset($__componentOriginalc366661bc2e82de8f861465d0ec8e258); ?>
<?php endif; ?>
                    </div>
        
                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginalf6e846e68c722397e62677478fe9e7a5 = $component; } ?>
<?php $component = App\View\Components\Forms\TagsInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tags-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TagsInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_search_tags')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_press_enter_to_add_tags')),'model' => 'tags','tags' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tags)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf6e846e68c722397e62677478fe9e7a5)): ?>
<?php $component = $__componentOriginalf6e846e68c722397e62677478fe9e7a5; ?>
<?php unset($__componentOriginalf6e846e68c722397e62677478fe9e7a5); ?>
<?php endif; ?>
                    </div>
                
                </div>

            </div>
            
            
            <div class="hidden justify-between items-center mt-8 lg:flex">
                <div></div>
                <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'save','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_save_and_continue')),'block' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'id' => 'edit-gig-action-btn']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
            </div>
        </div>

        
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-5">

            
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6 dark:bg-zinc-800 dark:border-zinc-700">

                
                <div class="mb-14">
                    <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_seo'), false); ?></h2>
                    <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_search_engine_gig_preview'), false); ?></p>
                </div>

                
                <div class="grid sm:grid-cols-1 gap-4">

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_seo_title'), false).'','placeholder' => ''.e(__('messages.t_enter_seo_title'), false).'','model' => 'seo_title','icon' => 'google','x-model' => 'seo.title','maxlength' => '100']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_seo_description'), false).'','placeholder' => ''.e(__('messages.t_enter_seo_description'), false).'','model' => 'seo_description','icon' => 'folder-text','rows' => '6','x-model' => 'seo.description','maxlength' => '150']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                    </div>

                    
                    <div class="col-span-12 mt-5 overflow-hidden">
                        <template x-if="seo.title && seo.description">
                            <div class="relative max-w-full">
                                <span class="text-xs font-normal truncate block text-green-700" x-text="seoUrlPreview"></span>
                                <h2 class="text-sm text-primary-600 font-medium truncate block break-all" x-text="seo.title"></h2>
                                <div class="text-xs text-gray-600 font-normal pt-1 break-all">
                                    <span class="text-gray-400" x-text="today"></span> — <span x-text="seo.description"></span>
                                </div>
                                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                                    <div class="mt-2 flex items-center text-sm text-gray-500">

                                        
                                        <div class="flex items-center flex-shrink-0">
                                            <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                            <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                            <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                            <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                            <svg class="text-amber-400 h-4 w-4 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                        </div>

                                        <div class="text-xs font-normal text-gray-400 ml-2">
                                            4.8 <span class="px-1">•</span> 702 <?php echo e(strtolower(__('messages.t_reviews')), false); ?> <span class="px-1">•</span> $5.00
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    
                </div>

            </div>

            
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6 dark:bg-zinc-800 dark:border-zinc-700">

                
                <div class="mb-14 flex justify-between items-center">
                    <div>
                        <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_faq'), false); ?></h2>
                        <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_create_gig_faq_subtitle'), false); ?></p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                        <button id="modal-add-service-faq-button" type="button" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        </button>
                    </div>
                </div>

                
                <?php if(count($faqs)): ?>
                    <div class="grid grid-cols-12 md:gap-x-8">
                        <div class="col-span-12">
                            <div class="space-y-4">
                                
                                
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <details class="px-6 py-4 rounded-lg bg-gray-50 dark:bg-zinc-700 group relative" wire:key="faq-list-id-<?php echo e($key, false); ?>">
                                        <summary class="flex items-center justify-between cursor-pointer focus:outline-none">
        
                                            
                                            <h5 class="text-sm font-medium text-gray-900 dark:text-gray-200 focus:outline-none flex items-center">
                                                <?php echo e($faq['question'], false); ?>

                                                <button wire:click="removeFaq(<?php echo e($key, false); ?>)" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                                    <span class="text-xs font-medium text-red-500 hover:text-red-600"> 
                                                        <?php echo e(__('messages.t_remove'), false); ?>

                                                    </span>
                                                </button>
                                            </h5>
                                    
                                            <span class="relative flex-shrink-0 ml-1.5 w-5 h-5">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-100 group-open:opacity-0 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
                                    
                                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute inset-0 w-5 h-5 opacity-0 group-open:opacity-100 dark:text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" > <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/> </svg>
                                            </span>
                                        </summary>
                                    
                                        <p class="mt-4 leading-relaxed text-gray-700 dark:text-gray-100 text-xs">
                                            <?php echo e($faq['answer'], false); ?>

                                        </p>
                                    </details>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

            </div>

        </div>

        
        <div class="col-span-12 block lg:hidden mt-4">
            <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'save','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_save_and_continue')),'block' => true,'id' => 'edit-gig-action-btn']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
        </div>

    </div>
    
    
    <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-add-service-faq-container','target' => 'modal-add-service-faq-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_add_faq'), false); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                
                <div class="col-span-12">
                    <div class="mt-2.5 relative">
                        <input type="text" placeholder="<?php echo e(__('messages.t_faq_question_example'), false); ?>" wire:model.defer="question" class="dark:bg-transparent block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal <?php echo e($errors->first('question') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100', false); ?>" maxlength="100">
                        
                        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 <?php echo e($errors->first('question') ? 'text-red-400' : 'text-gray-400', false); ?>" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                        </div>
                    </div>
                
                    
                    <?php $__errorArgs = ['question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('question'), false); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="col-span-12">
                    <div>
                        <div class="relative">
                            <textarea placeholder="<?php echo e(__('messages.t_faq_answer_example'), false); ?>" wire:model.defer="answer" rows="8" class="dark:bg-transparent block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal resize-none <?php echo e($errors->first('answer') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100', false); ?>" maxlength="300"></textarea>
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 <?php echo e($errors->first('answer') ? 'text-red-400' : 'text-gray-400', false); ?>" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    
                        
                        <?php $__errorArgs = ['answer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('answer'), false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
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
<?php $component->withAttributes(['action' => 'addFaq','text' => ''.e(__('messages.t_add'), false).'']); ?>
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

    
    <script src="https://cdn.jsdelivr.net/npm/slugify@1.6.5/slugify.min.js"></script>
    
    
    <script>
        function CQjwMygsGRWknEn() {
            return {
                seo: {
                    title      : "<?php echo e($seo_title, false); ?>",
                    description: "<?php echo e($seo_description, false); ?>"
                },

                // Initialize
                initialize() {

                },

                // Get seo today date
                today() {
                    const date     = new Date();
                    const strArray = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    const d        = date.getDate();
                    const m        = strArray[date.getMonth()];
                    const y        = date.getFullYear();
                    return '' + m + ' ' + (d <= 9 ? '0' + d : d) + ', ' + y;
                },

                // Set seo url preview
                seoUrlPreview() {
                    if (this.seo.title) {
                        return "<?php echo e(url('service'), false); ?>/" + slugify(this.seo.title) 
                    }
                }
            }
        }
        window.CQjwMygsGRWknEn = CQjwMygsGRWknEn();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/gigs/options/steps/overview.blade.php ENDPATH**/ ?>