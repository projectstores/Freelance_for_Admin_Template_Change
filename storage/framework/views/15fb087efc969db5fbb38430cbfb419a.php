<div class="w-full" x-data="window.krLSMcHnnEKMpVx" x-init="initialize" id="component-create-gig-pricing">

    
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

        
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ltr:ml-4 rtl:mr-4 mt-4">
                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200"><?php echo e(__('messages.t_pricing'), false); ?></h3>
                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_create_gig_pricing_subtitle'), false); ?></p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <button wire:key="add-upgrade-btn" id="modal-add-service-upgrade-button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                            <?php echo e(__('messages.t_add_service_upgrade'), false); ?>

                        </span>
                    </button>
                </div>
            </div>
        </div>

        
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">

            
            <div class="col-span-12 md:col-span-6">
                <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_price'), false).'','placeholder' => ''.e(__('messages.t_price_placeholder_0_00'), false).'','model' => 'price','suffix' => ''.e($currency_symbol, false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
            </div>

            
            <div class="col-span-12 md:col-span-6">
                <?php if (isset($component)) { $__componentOriginalbb1af718931bc8631c45d20c54e9e755 = $component; } ?>
<?php $component = App\View\Components\Forms\Select2::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.select2'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Select2::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_delivery_time')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_choose_delivery_time')),'model' => 'delivery_time','options' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($available_deliveries),'isDefer' => true,'isAssociative' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'componentId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($this->id),'value' => 'value','text' => 'text','class' => 'select2_pricing']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbb1af718931bc8631c45d20c54e9e755)): ?>
<?php $component = $__componentOriginalbb1af718931bc8631c45d20c54e9e755; ?>
<?php unset($__componentOriginalbb1af718931bc8631c45d20c54e9e755); ?>
<?php endif; ?>
            </div>

        </div>

    </div>

    
    <?php $__currentLoopData = $upgrades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $upgrade): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" id="scroll-to-upgrade-id-<?php echo e($key, false); ?>" wire:key="create-gig-pricing-upgrade-id-<?php echo e($key, false); ?>">

            
            <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ltr:ml-4 rtl:mr-4 mt-4">
                        <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-900 dark:text-gray-100"><?php echo e(__('messages.t_upgrade_number', ['number' => $key+1]), false); ?></h3>
                        <p class="text-xs font-normal text-gray-400 dark:text-gray-300"><?php echo e($upgrade['title'], false); ?></p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                        <button wire:click="removeUpgrade(<?php echo e($key, false); ?>)" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span class="text-xs font-medium text-red-500 hover:text-red-600"> 
                                <?php echo e(__('messages.t_remove_upgrade'), false); ?>

                            </span>
                        </button>
                    </div>
                </div>
            </div>

            
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">

                
                <div class="col-span-12" wire:key="<?php echo e(uid(), false); ?>">
                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_upgrade_title'), false).'','placeholder' => ''.e(__('messages.t_enter_upgrade_title'), false).'','model' => 'upgrades.'.e($key, false).'.title','icon' => 'format-title']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                </div>
        
                
                <div class="col-span-12 md:col-span-6" wire:key="<?php echo e(uid(), false); ?>">
                    <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => ''.e(__('messages.t_price'), false).'','placeholder' => ''.e(__('messages.t_price_placeholder_0_00'), false).'','model' => 'upgrades.'.e($key, false).'.price','suffix' => ''.e($currency_symbol, false).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                </div>

                
                <div class="col-span-12 md:col-span-6" wire:key="<?php echo e(uid(), false); ?>">
                    <div class="relative default-select2 <?php echo e($errors->first('upgrades.' . $key . '.extra_days') ? 'select2-custom-has-error' : '', false); ?>">
                        <label class="text-xs font-semibold block mb-2 <?php echo e($errors->first('upgrades.' . $key . '.extra_days') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-100', false); ?>"><?php echo e(__('messages.t_delivery_time'), false); ?></label>
                        <select x-data="initSelect2DeliveryTime('select2-id-upgrades-<?php echo e($key, false); ?>-extra_days', <?php echo e($key, false); ?>)" data-pharaonic="select2" data-component-id="<?php echo e($this->id, false); ?>" wire:model.defer="upgrades.<?php echo e($key, false); ?>.extra_days" id="select2-id-upgrades-<?php echo e($key, false); ?>-extra_days" data-dir="<?php echo e(config()->get('direction'), false); ?>" data-placeholder="<?php echo e(__('messages.t_choose_delivery_time'), false); ?>" data-search-off class="select2_pricing" x-on:change="changed">
                            <option value=""></option>
                            <?php $__currentLoopData = $available_deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($option['value'], false); ?>"><?php echo e($option['text'], false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['upgrades.' . $key . '.extra_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('upgrades.' . $key . '.extra_days'), false); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    
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
<?php $component->withAttributes(['id' => 'modal-add-service-upgrade-container','target' => 'modal-add-service-upgrade-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

        
         <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_add_service_upgrade'), false); ?> <?php $__env->endSlot(); ?>

        
         <?php $__env->slot('content', null, []); ?> 
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                
                <div class="col-span-12" wire:key="<?php echo e(uid(), false); ?>">
                    <div class="flex-grow relative">
                        <span class="absolute top-2/4 left-3 -translate-y-1/2 z-10 text-xs font-normal <?php echo e($errors->first('add_upgrade.title') ? 'text-red-600' : 'text-black dark:text-gray-100', false); ?>"><?php echo e(__('messages.t_i_will'), false); ?></span>
                        <div class="w-full inline-block relative">
                            <div class="relative">
                                <input wire:model.defer="add_upgrade.title" class="indent-7 dark:bg-transparent block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal <?php echo e($errors->first('add_upgrade.title') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100', false); ?>" type="text" placeholder="<?php echo e(__('messages.t_describe_ur_offering'), false); ?>">
                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 <?php echo e($errors->first('add_upgrade.title') ? 'text-red-400' : 'text-gray-400', false); ?>" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php $__errorArgs = ['add_upgrade.title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('add_upgrade.title'), false); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="col-span-12" wire:key="<?php echo e(uid(), false); ?>">
                    <div class="flex-grow relative">
                        <input wire:model.defer="add_upgrade.price" class="dark:bg-transparent block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal <?php echo e($errors->first('add_upgrade.price') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100', false); ?>" type="text" placeholder="<?php echo e(__('messages.t_for_and_extra_price'), false); ?>">
                        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                            <span class="<?php echo e($errors->first('add_upgrade.price') ? 'text-red-400' : 'text-gray-400', false); ?>"><?php echo e($currency_symbol, false); ?></span>
                        </div>
                    </div>
                    
                    <?php $__errorArgs = ['add_upgrade.price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('add_upgrade.price'), false); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div class="col-span-12" wire:key="<?php echo e(uid(), false); ?>">
                    <div class="relative default-select2 <?php echo e($errors->first('add_upgrade.extra_days') ? 'select2-custom-has-error' : '', false); ?>">
                    
                        <select data-pharaonic="select2" data-component-id="<?php echo e($this->id, false); ?>" wire:model.defer="add_upgrade.extra_days" id="select2-id-add_upgrade.extra_days" data-placeholder="<?php echo e(__('messages.t_and_an_additional_days'), false); ?>" data-search-off class="select2_pricing" data-dir="<?php echo e(config()->get('direction'), false); ?>">
                            <option value=""></option>
                            <?php $__currentLoopData = $available_deliveries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($option['value'], false); ?>"><?php echo e($option['text'], false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['add_upgrade.extra_days'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('add_upgrade.extra_days'), false); ?></p>
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
<?php $component->withAttributes(['action' => 'addUpgrade','text' => ''.e(__('messages.t_add'), false).'','block' => 0]); ?>
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
        function krLSMcHnnEKMpVx() {
            return {

                initSelect2DeliveryTime(id, key) {
                    $('#' + id).select2().on('change', function(){
                        window.livewire.find('<?php echo e($_instance->id, false); ?>').set('upgrades.' + key + '.extra_days', $(this).val());
                    });
                },

                initialize() {

                }

            }
        }
        window.krLSMcHnnEKMpVx = krLSMcHnnEKMpVx();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/create/steps/pricing.blade.php ENDPATH**/ ?>