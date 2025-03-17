<div class="container" x-data="window.TJPlQeqplTFcTQC" x-init="initialize()">

    
    <div class="fixed top-10 right-10 z-[99]" wire:loading>
        <div role="status"> <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-primary-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/> <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/> </svg> <span class="sr-only">Loading...</span> </div>
    </div>

    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        
        <div class="col-span-12 lg:col-span-4">

            
            <div class="flex flex-col text-center bg-white dark:bg-zinc-800 rounded-md border border-gray-300 shadow-sm mb-6 p-8">

                
                <div class="flex-1 flex flex-col">

                    
                    <div class="relative rounded-full overflow-hidden flex-shrink-0 mx-auto" wire:ignore>
                        <img id="profile-avatar-preview" class="relative rounded-full w-28 h-28 object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src(auth()->user()->avatar), false); ?>" alt="<?php echo e(auth()->user()->username, false); ?>">
                        <label for="profile-avatar-container" class="absolute inset-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100">
                            <span><?php echo e(__('messages.t_change'), false); ?></span>
                            <input type="file" id="profile-avatar-container" wire:model="avatar" @change="avatar" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer border-gray-300 rounded-md">
                        </label>
                    </div>

                    
                    <div class="mt-4 text-gray-900 dark:text-gray-200 text-sm font-medium flex items-center justify-center">
                        <span class="text-lg font-extrabold text-black dark:text-gray-100"><?php echo e(auth()->user()->username, false); ?></span>  
                        <?php if(auth()->user()->status === 'verified'): ?>
                            <?php
                                $uuid = uid();
                            ?>
                            <img data-tooltip-target="tooltip-account-verified-<?php echo e($uuid, false); ?>" class="ltr:ml-0.5 rtl:mr-0.5 h-4 w-4 -mt-0.5" src="<?php echo e(url('public/img/auth/verified-badge.svg'), false); ?>" alt="<?php echo e(__('messages.t_account_verified'), false); ?>">
                            <div id="tooltip-account-verified-<?php echo e($uuid, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                <?php echo e(__('messages.t_account_verified'), false); ?>

                            </div>
                        <?php endif; ?>  
                    </div>

                    
                    <div class="text-base text-gray-600 dark:text-gray-300">
                        <?php echo e(auth()->user()->fullname, false); ?>

                    </div>

                    
                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                        <dd>
                            
                            <?php if(auth()->user()->isOnline() && !$availability): ?>
                                <span class="px-2 py-1 text-white text-xs font-medium bg-green-500 rounded-full"><?php echo e(__('messages.t_online'), false); ?></span>
                            <?php elseif($availability): ?>
                                <span class="px-2 py-1 text-white text-xs font-medium bg-gray-500 rounded-full"><?php echo e(__('messages.t_unavailable'), false); ?></span>
                            <?php else: ?>
                                <span class="px-2 py-1 text-white text-xs font-medium bg-red-500 rounded-full"><?php echo e(__('messages.t_unavailable'), false); ?></span>
                            <?php endif; ?>

                        </dd>
                    </dl>

                </div>

                
                <dl class="mt-1 divide-y divide-gray-50 dark:divide-zinc-600 border-t border-gray-50 dark:border-zinc-600">

                    
                    <div class="flex justify-between text-sm font-medium px-5 py-2">
                        <dt class="text-gray-400 font-normal"><?php echo e(__('messages.t_member_since'), false); ?></dt>
                        <dd class="text-black dark:text-gray-300"><?php echo e(format_date(auth()->user()->created_at, config('carbon-formats.F_j,_Y')), false); ?></dd>
                    </div>

                    
                    <div class="flex justify-between text-sm font-medium px-5 py-2">
                        <dt class="text-gray-400 font-normal"><?php echo e(__('messages.t_current_level'), false); ?></dt>
                        <dd class="text-black dark:text-gray-300"><?php echo e(auth()->user()->level?->title, false); ?></dd>
                    </div>

                    
                    <div class="flex justify-between text-sm font-medium px-5 py-2">
                        <dt class="text-gray-400 font-normal"><?php echo e(__('messages.t_country'), false); ?></dt>
                        <dd class="text-black dark:text-gray-300 flex items-center">
                            <?php if(auth()->user()->country): ?>
                                <img src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(countryFlag(auth()->user()->country?->code), false); ?>" alt="<?php echo e(auth()->user()->country?->name, false); ?>" class="lazy h-5 w-5 ltr:mr-2 rtl:ml-2">  
                                <span><?php echo e(auth()->user()->country?->name, false); ?></span> 
                            <?php else: ?>
                                <?php echo e(__('messages.t_n_a'), false); ?> 
                            <?php endif; ?>
                        </dd>
                    </div>
                    
                </dl>

            </div>

            
            <?php if(auth()->user()->account_type === 'seller'): ?>
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-lg border <?php echo e($availability ? 'border-b-0' : '', false); ?> border-gray-300 dark:border-zinc-600 p-5">

                    
                    <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 <?php echo e($availability ? 'rounded-t-md' : 'rounded-md', false); ?>">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-xl leading-6 font-bold tracking-wide text-black dark:text-gray-100"><?php echo e(__('messages.t_availability'), false); ?></h3>
                                <p class="text-sm font-normal text-gray-600 dark:text-gray-300 mt-2"><?php echo e(__('messages.t_when_unavailable_u_wont_receive_orders'), false); ?></p>
                            </div>
                            <?php if(!$availability): ?>
                                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                                    <button id="modal-set-availability-button" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                        <span class="text-sm font-medium text-primary-600 hover:text-primary-700"> 
                                            <?php echo e(__('messages.t_set_availability'), false); ?>

                                        </span>
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    
                    <?php if($availability): ?>
                        <div class="px-5 py-6">
                            <div class="rounded-lg bg-gray-50 dark:bg-zinc-700 px-6 py-8 sm:p-10 gird mb-4">
                                <div class="flex-1 mb-4">
                                    <div>
                                        <h3 class="inline-flex px-4 py-1 rounded-full text-xs font-semibold tracking-wide uppercase bg-red-100 text-red-800">
                                            <?php echo e(__('messages.t_unavailable'), false); ?>

                                        </h3>
                                    </div>
                                    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
                                        <?php echo __('messages.t_u_wont_be_able_to_receive_orders_until_date', ['date' => format_date($availability->expected_available_date, config('carbon-formats.F_j,_Y'))]); ?>

                                    </div>
                                </div>
                                <blockquote class="relative ltr:border-l-4 rtl:border-r-4 ltr:pl-4 rtl:pr-4 sm:ltr:pl-6 sm:rtl:pr-6 bg-gray-100 dark:bg-zinc-600 py-4 rounded dark:border-zinc-500">
                                    <p class="text-gray-800 text-sm dark:text-white"><em>
                                        <?php echo e($availability->message, false); ?>

                                    </p></em>
                                
                                    <footer class="mt-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                        <img class="h-5 w-5 rounded-full object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src(auth()->user()->avatar), false); ?>" alt="<?php echo e(auth()->user()->username, false); ?>">
                                        </div>
                                        <div class="ltr:ml-4 rtl:mr-4">
                                            <div class="text-xs font-semibold text-gray-800 dark:text-gray-300"><?php echo e(auth()->user()->username, false); ?></div>
                                        </div>
                                    </div>
                                    </footer>
                                </blockquote>
                            </div>

                            <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_change')),'action' => 'removeAvailability','block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>
            <?php endif; ?>

            
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-lg border border border-gray-300 dark:border-zinc-700 p-8">

                
                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-xl leading-6 font-bold tracking-wide text-black dark:text-gray-100"><?php echo e(__('messages.t_description'), false); ?></h3>
                            <p class="text-sm font-normal text-gray-600 dark:text-gray-300 mt-2"><?php echo e(__('messages.t_tell_us_more_about_ur_self'), false); ?></p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                            <button @click="isDescriptionEditing = !isDescriptionEditing" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                                    <?php echo e(__('messages.t_edit'), false); ?>

                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                
                
                    <div class="my-4">

                        
                        <div class="flex items-center justify-center cursor-pointer" @click="toggleEditingHeadline" x-show="!isHeadlineEditing" x-cloak>

                            
                            <p class="text-black font-medium text-lg dark:text-gray-300 text-base"><?php echo e(auth()->user()->headline, false); ?></p>

                            
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-[18px] w-[18px] ltr:ml-2 rtl:mr-2 text-gray-400 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>

                        </div>

                        
                        <div x-show="isHeadlineEditing" x-cloak>

                            <input type="text" wire:model.defer="headline" @keydown.enter="disableEditing" @keydown.window.escape="disableEditing" class="w-full bg-white dark:bg-zinc-800 focus:outline-none focus:shadow-outline border border-gray-200 dark:border-zinc-600 dark:text-gray-100 rounded-sm py-1 px-2 appearance-none leading-normal text-xs font-medium" x-ref="edit_headline" maxlength="100">

                            <div class="ltr:text-right rtl:text-left space-x-2 rtl:space-x-reverse flex items-center justify-end pt-1">

                                
                                <button wire:click="setHeadline" wire:loading.attr="disabled" wire:target="setHeadline" class="text-xs font-medium text-green-600 hover:text-green-800 flex items-center">

                                    
                                    <div wire:loading wire:target="setHeadline">
                                        <svg role="status" class="inline w-3 h-3 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    
                                    <div wire:loading.remove wire:target="setHeadline">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    </div>

                                    <span class="text-[10px] font-medium ltr:ml-1 rtl:mr-1"><?php echo e(__('messages.t_approve'), false); ?></span>
                                </button>

                                
                                <button @click="disableEditing" class="text-xs font-medium text-red-600 hover:text-red-800 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                                    <span class="text-[10px] font-medium ltr:ml-1 rtl:mr-1"><?php echo e(__('messages.t_cancel'), false); ?></span>
                                </button>

                            </div>

                        </div>
                        
                    </div>

                
                <div class="px-5 py-6" x-cloak>

                    
                    <div x-show="isDescriptionEditing" class="w-full">
                        <div class="mb-4">
                            <?php if (isset($component)) { $__componentOriginal2f60389a9e230471cd863683376c182f = $component; } ?>
<?php $component = App\View\Components\Forms\Textarea::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Textarea::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_description')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_pls_tell_us_about_ur_hobbies_etc')),'model' => 'description','icon' => 'clipboard-text-outline']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
                        </div>
                        <div class="flex items-center justify-end">
                            <div></div>
                            <div class="flex items-center">
                                <span @click="isDescriptionEditing = false" class="ltr:mr-4 rtl:ml-4 font-medium text-sm text-gray-500 hover:text-gray-600 cursor-pointer"><?php echo e(__('messages.t_cancel'), false); ?></span>
                                <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'updateDescription','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_update')),'block' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>

                    
                    <div class="italic text-sm font-medium text-gray-600" x-show="!isDescriptionEditing">
                        <?php echo e($description, false); ?>

                    </div>

                </div>

            </div>

            
            <?php if(settings('security')->is_social_media_accounts): ?>
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-lg border border border-gray-300 dark:border-zinc-700 p-8">

                    
                    <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                        <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-xl leading-6 font-bold tracking-wide text-black dark:text-gray-100"><?php echo e(__('messages.t_linked_accounts'), false); ?></h3>
                                <p class="text-sm font-normal text-gray-600 dark:text-gray-300 mt-2"><?php echo e(__('messages.t_connect_ur_social_media_accounts'), false); ?></p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="grid grid-cols-12 gap-4 py-6">

                        
                        <div class="col-span-12 px-5">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_facebook')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_facebook_profile')),'model' => 'facebook_profile','icon' => 'link-variant']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 px-5">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_twitter')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_twitter_profile')),'model' => 'twitter_profile','icon' => 'link-variant']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 px-5">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_dribbble')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_dribbble_profile')),'model' => 'dribbble_profile','icon' => 'link-variant']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 px-5">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_stackoverflow')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_stackoverflow_profile')),'model' => 'stackoverflow_profile','icon' => 'link-variant']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 px-5">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_github')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_github_profile')),'model' => 'github_profile','icon' => 'link-variant']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 px-5">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_youtube')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_youtube_profile')),'model' => 'youtube_profile','icon' => 'link-variant']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 px-5">
                            <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_vimeo')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_enter_vimeo_profile')),'model' => 'vimeo_profile','icon' => 'link-variant']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>
                        </div>

                        
                        <div class="col-span-12 px-5 mt-5">
                            <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'updateSocial','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_update')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                        </div>

                    </div>

                </div>
            <?php endif; ?>

            
            <div class="mb-6 bg-white dark:bg-zinc-800 rounded-lg border border border-gray-300 dark:border-zinc-700 p-8">

                
                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-xl leading-6 font-bold tracking-wide text-black dark:text-gray-100"><?php echo e(__('messages.t_skills'), false); ?></h3>
                            <p class="text-sm font-normal text-gray-600 dark:text-gray-300 mt-2"><?php echo e(__('messages.t_let_ur_buyers_know_ur_skills'), false); ?></p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                            <button @click="isAddSkill = !isAddSkill" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-200 rtl:mr-2 ltr:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                
                <div class="py-6" x-cloak>

                      
                    <div class="px-5" x-show="isAddSkill">

                        
                        <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_add_skill')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_eg_voice_talent')),'model' => 'add_skill.name','icon' => 'bookmark-multiple']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0241d3f51813223308810020791c4a83)): ?>
<?php $component = $__componentOriginal0241d3f51813223308810020791c4a83; ?>
<?php unset($__componentOriginal0241d3f51813223308810020791c4a83); ?>
<?php endif; ?>

                        
                        <div class="mt-6">
                            <label class="text-sm font-medium text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_experience'), false); ?></label>
                            <fieldset class="mt-4">
                                <div class="space-y-4">
                                
                                    
                                    <div class="flex items-center">
                                        <input id="skill-experience-beginner" wire:model.defer="add_skill.experience" value="beginner" name="skill_experience" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="skill-experience-beginner" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            <?php echo e(__('messages.t_beginner'), false); ?>

                                        </label>
                                    </div>

                                    
                                    <div class="flex items-center">
                                        <input id="skill-experience-intermediate" wire:model.defer="add_skill.experience" value="intermediate" name="skill_experience" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="skill-experience-intermediate" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            <?php echo e(__('messages.t_intermediate'), false); ?>

                                        </label>
                                    </div>

                                    
                                    <div class="flex items-center">
                                        <input id="skill-experience-expert" wire:model.defer="add_skill.experience" value="pro" name="skill_experience" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="skill-experience-expert" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                            <?php echo e(__('messages.t_expert'), false); ?>

                                        </label>
                                    </div>
                                
                                </div>
                            </fieldset>
                        </div>

                        
                        <div class="mt-6">
                            <?php if(isset($add_skill['id'])): ?>
                                <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'updateSkill','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_update_skill')),'block' => true]); ?>
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
<?php $component->withAttributes(['action' => 'addSkill','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_add_skill')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div>

                    
                    <?php if(count($skills)): ?>
                        <div class="px-5" x-show="!isAddSkill" wire:key="list-of-skills">
                            <ul role="list" class="border border-gray-200 dark:border-zinc-600 rounded-md divide-y divide-gray-200 dark:divide-zinc-600">
                                <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="ltr:pl-3 rtl:pr-3 ltr:pr-4 rtl:pl-4 py-3 flex items-center justify-between text-sm" wire:key="skill-id-<?php echo e($skill->id, false); ?>">

                                        
                                        <div class="w-0 flex-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v1H8a3 3 0 00-3 3v1.5a1.5 1.5 0 01-3 0V6z" clip-rule="evenodd"/> <path d="M6 12a2 2 0 012-2h8a2 2 0 012 2v2a2 2 0 01-2 2H2h2a2 2 0 002-2v-2z"/></svg>
                                            <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate font-medium text-xs dark:text-gray-200">
                                                <?php echo e($skill->name, false); ?>

                                            </span>
                                        </div>

                                        
                                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 flex items-center justify-center">

                                            
                                            <button wire:click="deleteSkill(<?php echo e($skill->id, false); ?>)" wire:loading.attr="disabled" wire:target="deleteSkill(<?php echo e($skill->id, false); ?>)" data-tooltip-target="skill-tooltip-delete-<?php echo e($skill->id, false); ?>" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                
                                                <div wire:loading wire:target="deleteSkill(<?php echo e($skill->id, false); ?>)">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="deleteSkill(<?php echo e($skill->id, false); ?>)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                                </div>

                                            </button>
                                            <div id="skill-tooltip-delete-<?php echo e($skill->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_delete_skill'), false); ?>

                                            </div>

                                            
                                            <button wire:click="editSkill(<?php echo e($skill->id, false); ?>)" wire:loading.attr="disabled" wire:target="editSkill(<?php echo e($skill->id, false); ?>)" data-tooltip-target="skill-tooltip-edit-<?php echo e($skill->id, false); ?>" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                
                                                <div wire:loading wire:target="editSkill(<?php echo e($skill->id, false); ?>)">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="editSkill(<?php echo e($skill->id, false); ?>)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                                </div>

                                            </button>
                                            <div id="skill-tooltip-edit-<?php echo e($skill->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_edit_skill'), false); ?>

                                            </div>

                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(count($skills) === 0): ?>
                        <div wire:key="no-skills-yet" x-show="!isAddSkill" class="text-center text-xs font-medium text-gray-400"><?php echo e(__('messages.t_u_dont_have_any_skills'), false); ?></div>
                    <?php endif; ?>

                </div>

            </div>

            
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-lg border border border-gray-300 dark:border-zinc-700 p-8">

                
                <div class="bg-gray-50 dark:bg-zinc-700 px-5 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-xl leading-6 font-bold tracking-wide text-black dark:text-gray-100"><?php echo e(__('messages.t_languages'), false); ?></h3>
                            <p class="text-sm font-normal text-gray-600 dark:text-gray-300 mt-2"><?php echo e(__('messages.t_add_languages_u_speak'), false); ?></p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                            <button @click="isAddLanguage = !isAddLanguage" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 dark:text-gray-300 hover:text-gray-600 dark:hover:text-gray-200 rtl:mr-2 ltr:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                
                <div class="py-6" x-cloak>

                      
                    <div class="px-5" x-show="isAddLanguage">

                        
                        <div class="relative default-select2 <?php echo e($errors->first('add_language.name') ? 'select2-custom-has-error' : '', false); ?>">
                            <label class="text-xs font-medium block mb-2 <?php echo e($errors->first('add_language.name') ? 'text-red-600 dark:text-red-500' : 'text-gray-700', false); ?>"><?php echo e(__('messages.t_language'), false); ?></label>
                        
                            <select data-pharaonic="select2" data-component-id="<?php echo e($this->id, false); ?>" wire:model.defer="add_language.name" id="select2-id-add_language.name" data-placeholder="<?php echo e(__('messages.t_choose_language'), false); ?>" class="select2" data-dir="<?php echo e(config()->get('direction'), false); ?>" wire:ignore>
                                <option value=""></option>
                                <?php $__currentLoopData = config('languages'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $code => $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($name, false); ?>"><?php echo e($name, false); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['add_language.name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first('add_language.name'), false); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        
                        </div>

                        
                        <div class="mt-6">
                            <fieldset class="mt-4">
                                <div class="space-y-4">
                                
                                    
                                    <div class="flex items-center">
                                        <input id="languages-level-basic" wire:model.defer="add_language.level" value="basic" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-basic" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            <?php echo e(__('messages.t_basic'), false); ?>

                                        </label>
                                    </div>
                                    
                                    
                                    <div class="flex items-center">
                                        <input id="languages-level-conversational" wire:model.defer="add_language.level" value="conversational" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-conversational" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            <?php echo e(__('messages.t_conversational'), false); ?>

                                        </label>
                                    </div>

                                    
                                    <div class="flex items-center">
                                        <input id="languages-level-fluent" wire:model.defer="add_language.level" value="fluent" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-fluent" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            <?php echo e(__('messages.t_fluent'), false); ?>

                                        </label>
                                    </div>

                                    
                                    <div class="flex items-center">
                                        <input id="languages-level-native" wire:model.defer="add_language.level" value="native" name="languages_level" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 dark:border-zinc-600 dark:bg-transparent">
                                        <label for="languages-level-native" class="ltr:ml-3 rtl:mr-3 block text-xs font-medium text-gray-700 dark:text-gray-400">
                                            <?php echo e(__('messages.t_native'), false); ?>

                                        </label>
                                    </div>
                                
                                </div>
                            </fieldset>
                        </div>

                        
                        <div class="mt-6">
                            <?php if(isset($add_language['id'])): ?>
                                <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'updateLanguage','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_update_language')),'block' => true]); ?>
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
<?php $component->withAttributes(['action' => 'addLanguage','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_add_language')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>
                            <?php endif; ?>
                        </div>

                    </div>

                    
                    <?php if(count($languages)): ?>
                        <div class="px-5" x-show="!isAddLanguage" wire:key="list-of-languages">
                            <ul role="list" class="border border-gray-200 dark:border-zinc-600 rounded-md divide-y divide-gray-200 dark:divide-zinc-600">
                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="ltr:pl-3 rtl:pr-3 ltr:pr-4 rtl:pl-4 py-3 flex items-center justify-between text-sm" wire:key="language-id-<?php echo e($language->id, false); ?>">

                                        
                                        <div class="w-0 flex-1 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 h-5 w-5 text-gray-400 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M7 2a1 1 0 011 1v1h3a1 1 0 110 2H9.578a18.87 18.87 0 01-1.724 4.78c.29.354.596.696.914 1.026a1 1 0 11-1.44 1.389c-.188-.196-.373-.396-.554-.6a19.098 19.098 0 01-3.107 3.567 1 1 0 01-1.334-1.49 17.087 17.087 0 003.13-3.733 18.992 18.992 0 01-1.487-2.494 1 1 0 111.79-.89c.234.47.489.928.764 1.372.417-.934.752-1.913.997-2.927H3a1 1 0 110-2h3V3a1 1 0 011-1zm6 6a1 1 0 01.894.553l2.991 5.982a.869.869 0 01.02.037l.99 1.98a1 1 0 11-1.79.895L15.383 16h-4.764l-.724 1.447a1 1 0 11-1.788-.894l.99-1.98.019-.038 2.99-5.982A1 1 0 0113 8zm-1.382 6h2.764L13 11.236 11.618 14z" clip-rule="evenodd"/></svg>
                                            <span class="ltr:ml-2 rtl:mr-2 flex-1 w-0 truncate font-medium text-xs dark:text-gray-100">
                                                <?php echo e($language->name, false); ?> ⚊ <span class="font-normal text-gray-400 dark:text-gray-300"><?php echo e(__('messages.t_' . $language->level), false); ?></span>
                                            </span>
                                        </div>

                                        
                                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 flex items-center justify-center">

                                            
                                            <button wire:click="deleteLanguage(<?php echo e($language->id, false); ?>)" wire:loading.attr="disabled" wire:target="deleteLanguage(<?php echo e($language->id, false); ?>)" data-tooltip-target="language-tooltip-delete-<?php echo e($language->id, false); ?>" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                
                                                <div wire:loading wire:target="deleteLanguage(<?php echo e($language->id, false); ?>)">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="deleteLanguage(<?php echo e($language->id, false); ?>)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                                </div>

                                            </button>
                                            <div id="language-tooltip-delete-<?php echo e($language->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_delete_language'), false); ?>

                                            </div>

                                            
                                            <button wire:click="editLanguage(<?php echo e($language->id, false); ?>)" wire:loading.attr="disabled" wire:target="editLanguage(<?php echo e($language->id, false); ?>)" data-tooltip-target="language-tooltip-edit-<?php echo e($language->id, false); ?>" type="button" class="font-medium text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2">

                                                
                                                <div wire:loading wire:target="editLanguage(<?php echo e($language->id, false); ?>)">
                                                    <svg role="status" class="inline w-4 h-4 text-primary-600 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                    </svg>
                                                </div>

                                                
                                                <div wire:loading.remove wire:target="editLanguage(<?php echo e($language->id, false); ?>)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"> <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/></svg>
                                                </div>

                                            </button>
                                            <div id="language-tooltip-edit-<?php echo e($language->id, false); ?>" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                <?php echo e(__('messages.t_edit_language'), false); ?>

                                            </div>

                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    
                    <?php if(count($languages) === 0): ?>
                        <div wire:key="no-languages-yet" x-show="!isAddLanguage" class="text-center text-xs font-medium text-gray-400"><?php echo e(__('messages.t_u_dont_have_any_languages'), false); ?></div>
                    <?php endif; ?>

                </div>

            </div>

        </div>

        
        <div class="col-span-12 lg:col-span-8">

            
            <div class="dark:border-zinc-600 mb-6">
                <div class="py-14 px-6 text-center text-sm sm:px-14">
                    <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="228.54186" height="190" viewBox="0 0 685.62558 570" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M710.66548,631H301.142V165H710.66548Z" transform="translate(-257.18721 -165)" fill="#fff"/>
                    <path d="M710.66548,631H301.142V165H710.66548ZM307.142,625.43451H704.66548v-454.869H307.142Z" transform="translate(-257.18721 -165)" fill="#e6e6e6"/>
                    <rect x="44.64526" width="409" height="59.61236" fill="#0abb25"/><circle cx="103.28426" cy="113.18049" r="34.82182" fill="#e6e6e6"/><rect x="166.10008" y="88.60038" width="119.28106" height="10.24171" fill="#e6e6e6"/>
                    <rect x="166.10008" y="113.18049" width="262.87059" height="10.24171" fill="#e6e6e6"/><rect x="166.10008" y="137.7606" width="262.87059" height="10.24171" fill="#e6e6e6"/><circle cx="103.28426" cy="398.20952" r="34.82182" fill="#e6e6e6"/><rect x="166.10008" y="373.62944" width="119.28106" height="10.24171" fill="#e6e6e6"/>
                    <rect x="166.10008" y="398.20952" width="262.87059" height="10.24171" fill="#e6e6e6"/><rect x="166.10008" y="422.78963" width="262.87059" height="10.24171" fill="#e6e6e6"/><rect x="57.19657" y="15.2316" width="51.89134" height="7.51059" fill="#fff"/><rect x="57.19657" y="28.20444" width="51.89134" height="7.51059" fill="#fff"/><rect x="57.19657" y="41.17728" width="51.89134" height="7.51059" fill="#fff"/>
                    <path d="M754.62032,486.95794H257.18721V354.43206H754.62032Z" transform="translate(-257.18721 -165)" fill="#fff"/><path d="M754.62032,486.95794H257.18721V354.43206H754.62032Zm-491.43311-6H748.62032V360.43206H263.18721Z" transform="translate(-257.18721 -165)" fill="#ccc"/><circle cx="61.72897" cy="255.50361" r="34.42732" fill="#0abb25"/><rect x="133.95883" y="226.47667" width="142.43459" height="10.12568" fill="#3f3d56"/><rect x="133.95883" y="250.77831" width="313.8961" height="10.12568" fill="#3f3d56"/><rect x="133.95883" y="275.07994" width="313.8961" height="10.12568" fill="#3f3d56"/><path d="M834.19714,521.8914a8.976,8.976,0,0,1,1.34976-.41861l15.18817-39.46156-6.44468-7.999,10.80073-11.304c3.11978,4.59224,18.55636,14.26767,13.85881,21.16666l-23.572,41.93506a8.95935,8.95935,0,0,1-5.39334,12.9961C829.46251,541.96047,823.95856,525.77043,834.19714,521.8914Z" transform="translate(-257.18721 -165)" fill="#a0616a"/><path d="M848.57053,481.84191c-2.72426.78553-13.01455-15.21486-14.734-16.60666a10.65568,10.65568,0,0,1,14.60206-15.52258l15.827,11.07831a3.86054,3.86054,0,0,1,.58648,5.78008C862.95943,467.85809,851.26067,482.82418,848.57053,481.84191Z" transform="translate(-257.18721 -165)" fill="#0abb25"/><polygon points="596.767 556.889 584.507 556.888 582.675 509.6 596.769 509.601 596.767 556.889" fill="#a0616a"/>
                    <path d="M857.08077,733.77261,817.55,733.77114c-.37031-20.92381,26.37055-15.21934,39.53149-15.88525Z" transform="translate(-257.18721 -165)" fill="#2f2e41"/><polygon points="636.696 552.853 624.518 554.265 613.274 507.965 631.248 505.88 636.696 552.853" fill="#a0616a"/><path d="M898.35922,729.29725l-39.26746,4.555c-2.77965-20.74152,24.44061-18.15752,37.43705-20.33588Z" transform="translate(-257.18721 -165)" fill="#2f2e41"/><path d="M856.14766,710.6626H835.989v-75.98l-11.77124-63.42871-16.10425-56.35743,37.77832-18.37841,7.20337,11.31933c1.11426,1.01563,19.16382,17.71729,21.11084,34.2666,1.98437,16.86817-17.18384,161.95606-18.001,168.124Z" transform="translate(-257.18721 -165)" fill="#2f2e41"/><path d="M809.47945,526.70068l-6.22364-27.2788c-1.45947-1.40381-15.273-15.56348.01709-33.65918l8.05664-21.00586,23.60328-7.31153,9.22876,7.14453a28.66462,28.66462,0,0,1,11.07006,24.565l-2.52026,38.59375Z" transform="translate(-257.18721 -165)" fill="#2f2e41"/><path d="M829.68885,392.19791c24.32308,13.84081,4.355,50.35976-20.42146,37.35567C784.94508,415.71323,804.91312,379.19428,829.68885,392.19791Z" transform="translate(-257.18721 -165)" fill="#a0616a"/><path d="M762.77878,441.40417a9.7527,9.7527,0,0,1,.11176,1.53186L800.941,468.7067l10.05155-4.85908,9.3159,14.2111c-5.62813,2.17541-19.66262,16.143-25.81342,9.47538l-38.61054-35.25448a9.73752,9.73752,0,0,1-12.43526-8.90154C742.69324,431.46322,761.186,429.61152,762.77878,441.40417Z" transform="translate(-257.18721 -165)" fill="#a0616a"/><path d="M801.65178,466.45657c-.16272-3.07721,19.30462-10.043,21.20042-11.52177a11.5812,11.5812,0,0,1,12.84891,19.27169L820.08546,488.243a4.19586,4.19586,0,0,1-6.2637-.79842C812.92385,485.12472,799.95121,469.06356,801.65178,466.45657Z" transform="translate(-257.18721 -165)" fill="#0abb25"/><path d="M872.28389,695.59912l-25.01562-62.66357,16.666-23.95752,36.63623,84.46728Z" transform="translate(-257.18721 -165)" fill="#2f2e41"/><path d="M941.81279,735h-165a1,1,0,0,1,0-2h165a1,1,0,0,1,0,2Z" transform="translate(-257.18721 -165)" fill="#ccc"/><path d="M894.91158,410.38074c-8.12549,1.49878-16.62745-.97943-23.59034-5.42816-6.9624-4.44873-12.55713-10.73749-17.52148-17.34235-2.79492-3.718-5.49756-7.64-9.30176-10.316s-9.06738-3.86279-13.13135-1.60016c-3.58252,1.99469-5.16162,7.23047-3.05908,10.50763-5.644-1.41455-11.62939-.989-17.33349.21765-5.49512,1.16254-11.07862,3.1687-14.88184,7.30219-3.80273,4.13354-5.24121,10.84979-2.02783,15.4563L798.83247,410c8.70557-1.9856,12.728-1.10388,21.43311.8819-.29443-1.53974,2.12305-2.35913,3.3457-1.37787s.78272,2.933,1.57227,4.28717c3.36377,5.76843,3.36816,12.84674,1.64892,18.2088,8.625-3.58179,14.94629-13.2785,16.71289-22.44891a20.94649,20.94649,0,0,0-.92578-12.00177,17.04174,17.04174,0,0,0-2.88769-4.59058,22.84721,22.84721,0,0,1,8.73584,4.838c4.44092,3.86255,7.65185,8.90448,11.20215,13.59857,3.55029,4.69416,7.69482,9.24262,13.14941,11.45313,8.36426,3.3894,18.29834.4248,25.16455-5.43195,5.35791-4.57007,9.145-10.628,12.16113-17.04284A23.34707,23.34707,0,0,1,894.91158,410.38074Z" transform="translate(-257.18721 -165)" fill="#2f2e41"/><path d="M910.145,400.3736a18.42549,18.42549,0,0,0,2.38428-5.47632C911.7856,396.73492,910.9941,398.56763,910.145,400.3736Z" transform="translate(-257.18721 -165)" fill="#2f2e41"/></svg>
                    <p class="mt-4 font-bold text-black text-2xl dark:text-gray-300"><?php echo e(__('messages.t_update_profile'), false); ?></p>
                    <p class="mt-2 text-base text-gray-600 max-w-md mx-auto"><?php echo e(__('messages.t_these_info_will_appear_on_ur_public_profile'), false); ?></p>
                </div>
            </div>

            
            <div class="flex items-center justify-center">
                <span class="relative z-0 inline-flex shadow-sm rounded-md">

                    
                    <a href="<?php echo e(url('account/settings'), false); ?>" class="relative inline-flex items-center px-4 py-1 ltr:rounded-l-md rtl:rounded-r-md bg-primary-700 dark:bg-zinc-800 text-sm font-medium text-white hover:bg-primary-500 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                        <svg class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 w-5 h-5 text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5.122 21c.378.378.88.586 1.414.586S7.572 21.378 7.95 21l4.336-4.336a7.495 7.495 0 0 0 2.217.333 7.446 7.446 0 0 0 5.302-2.195 7.484 7.484 0 0 0 1.632-8.158l-.57-1.388-4.244 4.243-2.121-2.122 4.243-4.243-1.389-.571A7.478 7.478 0 0 0 14.499 2c-2.003 0-3.886.78-5.301 2.196a7.479 7.479 0 0 0-1.862 7.518L3 16.05a2.001 2.001 0 0 0 0 2.828L5.122 21zm4.548-8.791-.254-.616a5.486 5.486 0 0 1 1.196-5.983 5.46 5.46 0 0 1 4.413-1.585l-3.353 3.353 4.949 4.95 3.355-3.355a5.49 5.49 0 0 1-1.587 4.416c-1.55 1.55-3.964 2.027-5.984 1.196l-.615-.255-5.254 5.256h.001l-.001 1v-1l-2.122-2.122 5.256-5.255z"></path></svg>
                        <span class="text-white"><?php echo e(__('messages.t_account_settings'), false); ?></span>
                    </a>

                    
                    <a href="<?php echo e(url('account/password'), false); ?>" class="ltr:-ml-px rtl:-mr-px relative inline-flex items-center px-4 py-1 bg-primary-700 border-white dark:border-zinc-600 border-l text-sm font-medium text-white hover:bg-primary-500 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                        <svg class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 w-5 h-5 text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C9.243 2 7 4.243 7 7v3H6c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2v-8c0-1.103-.897-2-2-2h-1V7c0-2.757-2.243-5-5-5zm6 10 .002 8H6v-8h12zm-9-2V7c0-1.654 1.346-3 3-3s3 1.346 3 3v3H9z"></path></svg>
                        <?php echo e(__('messages.t_change_password'), false); ?>

                    </a>

                    
                    <?php if(auth()->user()->status !== 'verified'): ?>
                        <a href="<?php echo e(url('account/verification'), false); ?>" class="ltr:-ml-px rtl:-mr-px relative inline-flex items-center px-4 py-1 border-l border-white dark:border-zinc-600 bg-primary-700 text-sm font-medium text-white hover:bg-primary-500 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                            <svg class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 w-5 h-5 text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21.438 5.089a1.002 1.002 0 0 0-.959.015c-.684.389-1.355.577-2.053.577-2.035 0-3.952-1.629-5.722-3.39-.375-.373-1.063-.373-1.438 0C9.592 3.959 7.598 5.663 5.51 5.663c-.69 0-1.351-.184-2.018-.561-.298-.166-.658-.171-.96-.012s-.501.461-.528.801c-.011.129-.944 12.872 9.683 16.041a.99.99 0 0 0 .286.042H12c.097 0 .192-.014.285-.041 10.657-3.17 9.695-15.916 9.684-16.044a1 1 0 0 0-.531-.8zm-9.452 14.842c-6.979-2.255-7.934-9.412-8.014-12.477.505.14 1.019.209 1.537.209 2.492 0 4.65-1.567 6.476-3.283 1.893 1.788 3.983 3.301 6.442 3.301.53 0 1.057-.074 1.575-.22-.074 3.065-1.021 10.217-8.016 12.47z"></path></svg>
                            <?php echo e(__('messages.t_get_verified'), false); ?>

                        </a>
                    <?php endif; ?>

                    
                    <a href="<?php echo e(url('profile', auth()->user()->username), false); ?>" class="ltr:-ml-px rtl:-mr-px relative ltr:rounded-r-md rtl:rounded-l-md inline-flex items-center px-4 py-1 border-l border-white dark:border-zinc-600 bg-primary-700 text-sm font-medium text-white hover:bg-primary-500 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600">
                        <svg class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 w-5 h-5 text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2a5 5 0 1 0 5 5 5 5 0 0 0-5-5zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3zm9 11v-1a7 7 0 0 0-7-7h-4a7 7 0 0 0-7 7v1h2v-1a5 5 0 0 1 5-5h4a5 5 0 0 1 5 5v1z"></path></svg>
                        <?php echo e(__('messages.t_view_profile'), false); ?>

                    </a>
                </span>
            </div>

        </div>

    </div>

    
    <?php if(auth()->user()->account_type === 'seller' && !$availability): ?>
        <?php if (isset($component)) { $__componentOriginal626cd0ad8c496eb8a190505b15f0d732 = $component; } ?>
<?php $component = App\View\Components\Forms\Modal::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.modal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Modal::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'modal-set-availability-container','target' => 'modal-set-availability-button','uid' => 'modal_'.e(uid(), false).'','placement' => 'center-center','size' => 'max-w-md']); ?>

            
             <?php $__env->slot('title', null, []); ?> <?php echo e(__('messages.t_change_availability'), false); ?> <?php $__env->endSlot(); ?>

            
             <?php $__env->slot('content', null, []); ?> 
                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                    
                    <div class="col-span-12">
                        <?php if (isset($component)) { $__componentOriginal0241d3f51813223308810020791c4a83 = $component; } ?>
<?php $component = App\View\Components\Forms\TextInput::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.text-input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\TextInput::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_when_do_u_expect_tobe_ready_for_new_work')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_mm_dd_yyyy_example', ['example' => now()->addDay()->format('m/d/Y')])),'model' => 'availability_date','icon' => 'calendar']); ?>
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
<?php $component->withAttributes(['label' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_add_a_message')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_buyers_will_see_ur_message_when_visiting_ur_gigs')),'model' => 'availability_message','icon' => 'message-reply-text']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f60389a9e230471cd863683376c182f)): ?>
<?php $component = $__componentOriginal2f60389a9e230471cd863683376c182f; ?>
<?php unset($__componentOriginal2f60389a9e230471cd863683376c182f); ?>
<?php endif; ?>
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
<?php $component->withAttributes(['action' => 'setAvailability','text' => ''.e(__('messages.t_set_availability'), false).'','block' => 0]); ?>
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
    <?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function TJPlQeqplTFcTQC() {
            return {

                isHeadlineEditing   : false,
                isAddSkill          : false,
                isAddLanguage       : false,
                isDescriptionEditing: false,

                // Edit headline
                toggleEditingHeadline() {
                    this.isHeadlineEditing = !this.isHeadlineEditing;

                    if (this.isHeadlineEditing) {
                        this.$nextTick(() => {
                            this.$refs.edit_headline.focus();
                        });
                    }
                },
                
                // Disable headline editing
                disableEditing() {
                    this.isHeadlineEditing = false;
                },

                // Avatar changed
                avatar(event) {
                    var output    = document.getElementById('profile-avatar-preview');
                    output.src    = URL.createObjectURL(event.target.files[0]);
                    output.onload = function() {
                        URL.revokeObjectURL(output.src) // free memory
                    }
                },

                // Init
                initialize() {

                    // Headline updated
                    window.addEventListener('profile-headline-updated',() => {
                        this.disableEditing();
                    });

                    // Edit skill form
                    window.addEventListener('open-skills-edit-form',() => {
                        this.isAddSkill = true;
                    });

                    // Close edit skill form
                    window.addEventListener('close-edit-skill-form',() => {
                        this.isAddSkill = false;
                    });

                    // Edit language form
                    window.addEventListener('open-languages-edit-form',() => {
                        this.isAddLanguage = true;
                    });

                    // Close edit language form
                    window.addEventListener('close-edit-language-form',() => {
                        this.isAddLanguage = false;
                    });

                    // Close description edit form
                    window.addEventListener('close-description-edit-form',() => {
                        this.isDescriptionEditing = false;
                    });

                }

            }
        }
        window.TJPlQeqplTFcTQC = TJPlQeqplTFcTQC();
    </script>

<?php $__env->stopPush(); ?>

<?php if (! $__env->hasRenderedOnce('bda3ad84-ccdc-481e-a89a-ef2e9dd18810')): $__env->markAsRenderedOnce('bda3ad84-ccdc-481e-a89a-ef2e9dd18810');
$__env->startPush('styles'); ?>

    
    <link href="<?php echo e(url('node_modules/select2/dist/css/select2.min.css'), false); ?>" rel="stylesheet" />

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('d7a9a5b6-6056-44de-b9a0-39c3c0e8c67d')): $__env->markAsRenderedOnce('d7a9a5b6-6056-44de-b9a0-39c3c0e8c67d');
$__env->startPush('scripts'); ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    
    <script src="<?php echo e(url('node_modules/select2/dist/js/select2.min.js'), false); ?>"></script>

    
    <script src="<?php echo e(url('public/vendor/pharaonic/pharaonic.select2.min.js'), false); ?>"></script>

<?php $__env->stopPush(); endif; ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/profile/profile.blade.php ENDPATH**/ ?>