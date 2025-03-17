<main class="w-full">

    
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.loading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>

    
    <div class="">
        <div class="overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                
                <aside class="lg:col-span-3 pb-6 hidden lg:block" wire:ignore>
                    <?php if (isset($component)) { $__componentOriginal897c321ee9b9bb967400e80c55835c23 = $component; } ?>
<?php $component = App\View\Components\Main\Account\Sidebar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('main.account.sidebar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Main\Account\Sidebar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal897c321ee9b9bb967400e80c55835c23)): ?>
<?php $component = $__componentOriginal897c321ee9b9bb967400e80c55835c23; ?>
<?php unset($__componentOriginal897c321ee9b9bb967400e80c55835c23); ?>
<?php endif; ?>
                </aside>

                
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9 pt-10">

                    
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">
                        
                        
                        <div class="mb-14">
                            <h2 class="text-3xl capitalize leading-6 font-bold text-black dark:text-gray-100"><?php echo e(__('messages.t_browser_sessions'), false); ?></h2>
                        </div>
                        
                        
                        <div class="w-full mb-6">
                            <?php if(count($this->sessions) > 0): ?>
                                <div class="w-full space-y-5 divide-y divide-gray-200 dark:divide-zinc-700">

                                    <?php $__currentLoopData = $this->sessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex items-center justify-between <?php echo e(!$loop->first ? 'pt-5' : '', false); ?>">
                                            <div class="flex items-center">

                                                
                                                <?php if($session->agent->isDesktop()): ?>
                                                    <div class="focus:outline-none w-10 h-10 bg-blue-100 dark:bg-zinc-700 rounded flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-blue-700 dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M22 18V3H2v15H0v2h24v-2h-2zm-8 0h-4v-1h4v1zm6-3H4V5h16v10z"></path></svg>
                                                    </div>
                                                <?php else: ?>
                                                    <div class="focus:outline-none w-10 h-10 bg-red-100 dark:bg-zinc-700 rounded flex items-center justify-center">
                                                        <svg class="w-5 h-5 text-red-700 dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg"><path d="M16 64C16 28.7 44.7 0 80 0H304c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H80c-35.3 0-64-28.7-64-64V64zM224 448a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zM304 64H80V384H304V64z"></path></svg>
                                                    </div>
                                                <?php endif; ?>

                                                
                                                <div class="ltr:pl-3 rtl:pr-3">

                                                    
                                                    <p class="focus:outline-none text-sm font-medium leading-none text-gray-800 dark:text-gray-100">
                                                        <?php echo e($session->agent->platform() ? $session->agent->platform() : __('messages.t_unknown'), false); ?> - <?php echo e($session->agent->browser() ? $session->agent->browser() : __('messages.t_unknown'), false); ?>

                                                    </p>

                                                    
                                                    <p class="focus:outline-none text-[13px] leading-3 pt-3 text-gray-500 dark:text-gray-400">
                                                        <?php echo e($session->ip_address, false); ?>

                                                    </p>

                                                </div>

                                            </div>

                                            
                                            <?php if($session->is_current_device): ?>
                                                <p class="focus:outline-none text-xs font-medium leading-none text-right text-green-600 dark:text-green-400">
                                                    <?php echo app('translator')->get('messages.t_this_device'); ?>
                                                </p>
                                            <?php elseif($session->last_active): ?>
                                                <p class="focus:outline-none text-xs font-medium leading-none text-right text-zinc-600 dark:text-zinc-400">
                                                    <?php echo e(__('messages.t_last_activity'), false); ?> <?php echo e($session->last_active, false); ?>

                                                </p>
                                            <?php endif; ?>

                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="w-full mt-10">
                            <button type="button" id="modal-password-button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-5 py-2 leading-6 border-gray-300 bg-primary-700 text-white shadow-sm hover:bg-primary-600 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none text-sm dark:bg-zinc-700 dark:border-transparent dark:text-zinc-200 dark:hover:bg-zinc-600 dark:hover:text-white">
                                <?php echo app('translator')->get('messages.t_logout_other_browser_sessions'); ?>
                            </button>
                        </div>

                    </div>                 

                </div>

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
<?php $component->withAttributes(['id' => 'modal-password-container','target' => 'modal-password-button','uid' => 'modal_sessions_current_password','placement' => 'center-center','size' => 'max-w-sm']); ?>
         <?php $__env->slot('content', null, []); ?> 
            <div class="relative">
                <div class="flex flex-col items-center justify-center">

                    
                    <img src="<?php echo e(url('public/img/svg/lock.svg'), false); ?>" class="w-44 h-44 p-3 rounded-full border shadow-xs">

                    
                    <div class="w-full mt-6">
                        <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_current_password')),'model' => 'password','type' => 'password','svg_icon' => '<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C9.243 2 7 4.243 7 7v3H6a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2h-1V7c0-2.757-2.243-5-5-5zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9V7zm4 10.723V20h-2v-2.277a1.993 1.993 0 0 1 .567-3.677A2.001 2.001 0 0 1 14 16a1.99 1.99 0 0 1-1 1.723z"></path></svg>']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                    </div>

                    
                    <p class="text-base font-bold leading-none text-gray-800 dark:text-gray-100 mt-7">
                        <?php echo app('translator')->get('messages.t_current_password'); ?>
                    </p>
                    <p class="text-[13px] leading-relaxed text-center text-gray-600 dark:text-gray-300 mt-3">
                        <?php echo app('translator')->get('messages.t_to_help_make_ur_account_secure_enter_current_pass'); ?>
                    </p>

                    
                    <button wire:click="logout" class="mt-8 px-8 py-3 bg-primary-700 focus:outline-none hover:bg-opacity-80 dark:bg-primary-600 rounded">
                        <p class="text-xs font-semibold leading-3 text-gray-100">
                            <?php echo app('translator')->get('messages.t_logout_other_browser_sessions'); ?>
                        </p>
                    </button>

                </div>

                
                <div class="cursor-pointer absolute top-0 right-0 m-3 dark:text-gray-100 text-gray-600 transition duration-150 ease-in-out" x-on:click="close">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-label="Close" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z"></path> <line x1="18" y1="6" x2="6" y2="18"></line> <line x1="6" y1="6" x2="18" y2="18"></line> </svg>
                </div>

            </div>
         <?php $__env->endSlot(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732)): ?>
<?php $component = $__componentOriginal626cd0ad8c496eb8a190505b15f0d732; ?>
<?php unset($__componentOriginal626cd0ad8c496eb8a190505b15f0d732); ?>
<?php endif; ?>

</main><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/sessions/sessions.blade.php ENDPATH**/ ?>