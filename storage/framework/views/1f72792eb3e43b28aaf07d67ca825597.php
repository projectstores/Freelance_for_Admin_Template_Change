<div class="w-full">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        
        <?php if(session()->has('success')): ?>
            <div class="col-span-12">
                <div class="rounded-md bg-green-100 dark:bg-zinc-700 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <p class="text-sm font-medium text-green-800 dark:text-zinc-400"><?php echo e(session()->get('success'), false); ?></p>
                        </div>
                    </div>
                </div>

            </div>
        <?php endif; ?>

        
        <div class="col-span-12">
            <div class="bg-white dark:bg-zinc-800 dark:border-zinc-700 rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6">
        
                
                <div class="mb-14 flex items-center justify-between">
                    <div>
                        <h2 class="text-[15px] mb-1 tracking-wider leading-6 font-semibold text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_requirements'), false); ?></h2>
                        <p class="text-[13px] text-gray-500 dark:text-gray-300"><?php echo e(__('messages.t_create_gig_requirements_subtitle'), false); ?></p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                        <button id="modal-add-service-requirement-button" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            <span class="text-[13px] font-medium text-primary-600 hover:text-primary-700"> 
                                <?php echo e(__('messages.t_add_requirement'), false); ?>

                            </span>
                        </button>
                    </div>
                </div>
        
                
                <?php if(is_array($requirements) && count($requirements) > 0): ?>
                    <div class="flow-root w-full mb-6">
                        <ul role="list">
        
                            <?php $__currentLoopData = $requirements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li wire:key="create-gig-requirement-item-<?php echo e($key, false); ?>">
                                    <div class="relative <?php echo e(!$loop->last ? 'pb-12' : '', false); ?>">
                                        <?php if(!$loop->last): ?>
                                            <span class="absolute top-4 ltr:left-6 rtl:right-6 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        <?php endif; ?>
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-12 w-12 rounded-full bg-gray-200 dark:bg-zinc-700 flex items-center justify-center ring-8 ring-white dark:ring-zinc-800">
        
                                                    <?php if($req['type'] === 'text'): ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 dark:text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                    <?php elseif($req['type'] === 'file'): ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 dark:text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                                    <?php elseif($req['type'] === 'choice'): ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800 dark:text-zinc-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/></svg>
                                                    <?php endif; ?>
        
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4 rtl:!mr-4">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-600 dark:text-zinc-100">
                                                        <?php echo e($req['question'], false); ?> 
                                                    </p>
        
                                                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
        
                                                        
                                                        <div class="mt-2 flex items-center text-xs text-gray-400 rtl:ml-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"/></svg>
                                                            <?php if($req['type'] === 'text'): ?>
                                                                <?php echo e(__('messages.t_free_text'), false); ?>

                                                            <?php elseif($req['type'] === 'file'): ?>
                                                                <?php echo e(__('messages.t_attachment'), false); ?>

                                                            <?php elseif($req['type'] === 'choice'): ?>
                                                                <?php echo e(__('messages.t_multiple_choice'), false); ?>

                                                            <?php endif; ?>
                                                        </div>
        
                                                        
                                                        <div wire:click="editRequirement(<?php echo e($key, false); ?>)" class="mt-2 flex items-center text-xs text-gray-400 cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                            <?php echo e(__('messages.t_edit'), false); ?>

                                                        </div>
        
                                                        
                                                        <div wire:click="deleteRequirement(<?php echo e($key, false); ?>)" class="mt-2 flex items-center text-xs text-red-600 cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                            <?php echo e(__('messages.t_delete'), false); ?>

                                                        </div>
        
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </ul>
                    </div>
                <?php endif; ?>
        
            </div>
        
            
            <div class="flex justify-between">
                <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'back','text' => ''.e(__('messages.t_back'), false).'','active' => 'bg-white dark:bg-zinc-800 dark:hover:bg-zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-zinc-300']); ?>
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
<?php $component->withAttributes(['action' => 'save','text' => ''.e(__('messages.t_save_and_continue'), false).'','block' => 0]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
            </div>
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
<?php $component->withAttributes(['id' => 'modal-add-service-requirement-container','target' => 'modal-add-service-requirement-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-2xl']); ?>

        
         <?php $__env->slot('title', null, []); ?> 
            <?php echo e(__('messages.t_add_question'), false); ?>

         <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                
                <div class="col-span-12">
                    <div>
                        <div class="relative">
                            <textarea 
                                placeholder="<?php echo e(__('messages.t_request_necessary_details_such_dimensions'), false); ?>" 
                                wire:model.defer="add_requirement.question" 
                                rows="6" 
                                class="resize-none focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent <?php echo e($errors->first('add_requirement.question') ? 'focus:!ring-red-600 focus:!border-red-600 border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500', false); ?>" 
                                maxlength="500">
                            </textarea>
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 <?php echo e($errors->first('add_requirement.question') ? 'text-red-400' : 'text-gray-400', false); ?>" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                    
                        
                        <?php $__errorArgs = ['add_requirement.question'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('add_requirement.question'), false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                
                <div class="col-span-12">
                    <div class="relative default-select2 <?php echo e($errors->first('add_requirement.type') ? 'select2-custom-has-error' : '', false); ?>">
                    
                        <select 
                            data-pharaonic="select2" 
                            data-component-id="<?php echo e($this->id, false); ?>" 
                            wire:model="add_requirement.type" 
                            id="select2-id-add_requirement.type" 
                            data-placeholder="<?php echo e(__('messages.t_get_it_from'), false); ?>" 
                            class="select2_requirements"
                            data-dir="<?php echo e(config()->get('direction'), false); ?>" 
                            style="display: none" 
                            onload="this.style.display = 'block'">
                            <option value=""></option>
                            <option value="text"><?php echo e(__('messages.t_free_text'), false); ?></option>
                            <option value="choice"><?php echo e(__('messages.t_multiple_choice'), false); ?></option>
                            <option value="file"><?php echo e(__('messages.t_attachment'), false); ?></option>
                        </select>
                        <?php $__errorArgs = ['add_requirement.type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('add_requirement.type'), false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                    </div>
                </div>

                
                <?php if(isset($add_requirement['type']) && $add_requirement['type'] === 'choice'): ?>
                    
                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3 = $component; } ?>
<?php $component = App\View\Components\Forms\Checkbox::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.checkbox'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Checkbox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_multiple_choices'), false).' ','model' => 'add_requirement.is_multiple']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3)): ?>
<?php $component = $__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3; ?>
<?php unset($__componentOriginal9c5d7e5b2e4b8b16cfa941b5e69189f3); ?>
<?php endif; ?>
                    </div>

                    
                    <?php $__currentLoopData = $add_requirement['options']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-span-12" wire:key="add-requirement-choice-option-id-<?php echo e($i, false); ?>">
                            <div class="flex-grow relative">
                                <input wire:model.defer="add_requirement.options.<?php echo e($i, false); ?>" class="dark:bg-transparent block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal <?php echo e($errors->first('add_requirement.options.'.$i) ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100', false); ?>" type="text" placeholder="<?php echo e(__('messages.t_add_option'), false); ?>" maxlength="100">
                                <?php if(count($add_requirement['options']) > 2): ?>
                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center cursor-pointer" wire:click="deleteOption(<?php echo e($i, false); ?>)">
                                        <span class="hover:text-red-500 <?php echo e($errors->first('add_requirement.options.'.$i) ? 'text-red-400' : 'text-gray-400', false); ?>">
                                            <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <?php $__errorArgs = ['add_requirement.options.'.$i];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('add_requirement.options.'.$i), false); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                    <div class="col-span-6">
                        <button wire:click="addOption" type="button" class="text-primary-600 hover:text-white hover:bg-primary-600 border-2 border-primary-600 focus:ring-0 focus:outline-none font-medium rounded text-xs px-5 py-2 text-center inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 ltr:-ml-1 rtl:-mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            <?php echo e(__('messages.t_add_new_option'), false); ?>

                        </button>
                    </div>

                <?php endif; ?>

            </div>
         <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('footer', null, []); ?> 
            <div class="flex justify-between w-full">

                
                <div class="flex items-center">
                    <input checked id="add-requirement-is-required-checkbox" type="checkbox" value="" class="w-5 h-5 text-primary-600 bg-transparent border-2 rounded border-gray-400 focus:outline-none focus:ring-0" wire:model.defer="add_requirement.is_required">
                    <label for="add-requirement-is-required-checkbox" class="ltr:ml-2 rtl:mr-2 text-xs font-medium text-gray-700 dark:text-zinc-100"><?php echo e(__('messages.t_required'), false); ?></label>
                </div>

                <?php if($is_edit): ?>
                    
                    <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'updateRequirement','text' => ''.e(__('messages.t_update'), false).'','block' => 0]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                <?php else: ?>
                    
                    <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'addRequirement','text' => ''.e(__('messages.t_add'), false).'','block' => 0]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
         <?php $__env->endSlot(); ?>

     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>

</div>

<?php if (! $__env->hasRenderedOnce('09fa9861-74f1-4d98-a9aa-0128a7eb4dd7')): $__env->markAsRenderedOnce('09fa9861-74f1-4d98-a9aa-0128a7eb4dd7');
$__env->startPush('styles'); ?>

    
    <link href="<?php echo e(url('node_modules/select2/dist/css/select2.min.css'), false); ?>" rel="stylesheet" />

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('43c34369-eee2-4f1f-b3a5-d7071c70a4dd')): $__env->markAsRenderedOnce('43c34369-eee2-4f1f-b3a5-d7071c70a4dd');
$__env->startPush('scripts'); ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    
    <script src="<?php echo e(url('node_modules/select2/dist/js/select2.min.js'), false); ?>"></script>

    
    <script src="<?php echo e(url('public/vendor/pharaonic/pharaonic.select2.min.js'), false); ?>"></script>

<?php $__env->stopPush(); endif; ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/gigs/options/steps/requirements.blade.php ENDPATH**/ ?>