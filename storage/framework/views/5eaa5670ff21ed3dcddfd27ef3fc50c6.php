<div class="w-full" x-data="window.xRiqSKhIlmnKtWu" x-init="initialize()" @keydown.window.escape="open = false" x-cloak>

    
    <form class="flex items-center mb-4 bg-white border-2 border-gray-300 text-gray-900 text-lg font-medium rounded-lg block w-full mb-8" action="<?php echo e(url('search'), false); ?>" accept="GET">
        
        
        <div class="relative w-full flex items-center px-3 py-1">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#bababa"><path d="M784-120 532-372q-30 24-69 38t-83 14q-109 0-184.5-75.5T120-580q0-109 75.5-184.5T380-840q109 0 184.5 75.5T640-580q0 44-14 83t-38 69l252 252-56 56ZM380-400q75 0 127.5-52.5T560-580q0-75-52.5-127.5T380-760q-75 0-127.5 52.5T200-580q0 75 52.5 127.5T380-400Z"/></svg>
        
            <input type="search" name="q" class="w-full border-none focus:outline-none focus:ring-0" placeholder="<?php echo e(__('messages.t_what_service_are_u_looking_for_today'), false); ?>" value="<?php echo e($q, false); ?>" required>
            
            <div class="flex justify-end md:hidden">
                
               
                <button type="button" class="ltr:ml-3 rtl:mr-3 ltr:sm:ml-3 rtl:sm:mr-3 text-gray-400 hover:text-gray-500" @click="open = true">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#a1a3a6"><path d="M440-120v-240h80v80h320v80H520v80h-80Zm-320-80v-80h240v80H120Zm160-160v-80H120v-80h160v-80h80v240h-80Zm160-80v-80h400v80H440Zm160-160v-240h80v80h160v80H680v80h-80Zm-480-80v-80h400v80H120Z"/></svg>
                </button>
            </div>
        </div>
    
    </form>
    
    
    
    <?php if($q != "" && $q != null): ?>
    <div class="mb-10">
        <p class="text-2xl font-bold text-black"><?php echo e(__('messages.t_search_results_for_q', ['q' => $q]), false); ?></p>
    </div>
    <?php endif; ?>
    
    
    <div x-show="open" class="fixed inset-0 flex z-40 lg:hidden" x-ref="dialog" aria-modal="true">
    
        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." class="fixed inset-0 bg-black bg-opacity-25" @click="open = false" aria-hidden="true" style="display: none;">
        </div>

    
        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="ml-auto relative max-w-xs w-full h-full bg-white dark:bg-zinc-800 shadow-xl py-4 pb-12 flex flex-col overflow-y-auto" style="display: none;">

            <div class="px-4 flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200"><?php echo e(__('messages.t_filter'), false); ?></h2>
                <button type="button" class="ltr:-mr-2 rtl:-ml-2 w-10 h-10 bg-white dark:bg-zinc-700 p-2 rounded-md flex items-center justify-center text-gray-400 dark:text-gray-300" @click="open = false">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                </button>
            </div>

            
            <div class="mt-4 border-t border-gray-200 dark:border-zinc-700">

                
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900"><?php echo e(__('messages.t_rating'), false); ?></span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-5" name="rating" value="5" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-5" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <?php for($i = 0; $i < 5; $i++): ?>
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                    </div>
                                </label>
                            </div>

                            
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-4" name="rating" value="4" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-4" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <?php for($i = 0; $i < 4; $i++): ?>
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                        <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                    </div>
                                </label>
                            </div>

                            
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-3" name="rating" value="3" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-3" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <?php for($i = 0; $i < 3; $i++): ?>
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                        <?php for($i = 0; $i < 2; $i++): ?>
                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                    </div>
                                </label>
                            </div>

                            
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-2" name="rating" value="2" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-2" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <?php for($i = 0; $i < 2; $i++): ?>
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                        <?php for($i = 0; $i < 3; $i++): ?>
                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                    </div>
                                </label>
                            </div>

                            
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-1" name="rating" value="1" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-1" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        <?php for($i = 0; $i < 1; $i++): ?>
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                        <?php for($i = 0; $i < 4; $i++): ?>
                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        <?php endfor; ?>
                                    </div>
                                </label>
                            </div>
                        
                        </div>
                    </div>
                </div>

                
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900"><?php echo e(__('messages.t_price'), false); ?></span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            <div class="rounded-md shadow-sm -space-y-px">
                                <div>
                                    <input type="integer" wire:model.defer="min_price" minlength="1" min="1" maxlength="999999999" max="999999999" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="<?php echo e(__('messages.t_min_price'), false); ?>">
                                </div>
                                <div>
                                    <input type="integer" wire:model.defer="max_price" minlength="1" min="1" maxlength="999999999" max="999999999" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="<?php echo e(__('messages.t_max_price'), false); ?>">
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

                
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900"><?php echo e(__('messages.t_delivery_time'), false); ?></span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            <?php $__currentLoopData = $delivery_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="flex items-center">
                                    <input wire:model.defer="delivery_time" id="filter-delivery-time-<?php echo e($key, false); ?>" value="<?php echo e($time['value'], false); ?>" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                    <label for="filter-delivery-time-<?php echo e($key, false); ?>" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        <?php echo e($time['text'], false); ?>

                                    </label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                        </div>
                    </div>
                </div>

                
                <div class="py-6 px-4">

                    
                    <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'filter','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_filter')),'block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>

                    
                    <?php if($rating || $delivery_time || $min_price || $max_price): ?>
                        <span wire:click="resetFilter" class="hover:underline text-xs font-medium text-gray-600 hover:text-gray-800 mt-4 text-center block cursor-pointer"><?php echo e(__('messages.t_reset_filter'), false); ?></span>
                    <?php endif; ?>
                    
                </div>

            </div>

        </div>
    
    </div>
    
    
    <main>

        
        <div class="flex justify-between items-center mb-2 bg-transparent">

            
            <div>
                <div class="hidden md:flex items-center">

                    
                    <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block ltr:text-left rtl:text-right">

                        
                        <div>
                            <button type="button" class="border border-gray-300 py-2 px-4 rounded-md group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                <?php echo e(__('messages.t_sort_by'), false); ?>

                                <svg class="flex-shrink-0 ltr:-mr-1 rtl:-ml-1 ltr:ml-1 rtl:mr-1 h-5 w-5 text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-200 dark:hover:text-gray-200" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                        </div>
        
                        
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="ltr:origin-top-left rtl:origin-top-right absolute ltr:left-0 rtl:right-0 mt-2 w-96 rounded-md shadow-sm bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50 py-3 px-5" x-ref="menu-items" x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                            <div class="py-1" role="none">
                            
                                <span class="font-bold text-xl text-gray-900 dark:text-gray-300 px-4"><?php echo e(__('messages.t_sort_by'), false); ?></span>
                                
                                <div class="pt-2 py-3 flex justify-between items-center">
                                
                                    <div>
                                        
                                        <button wire:click="$set('sort_by', 'popular')" type="button" class="<?php echo e($sort_by === 'popular' ? 'text-gray-900' : 'text-gray-500', false); ?> block px-4 py-3 text-base font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                            <?php echo e(__('messages.t_most_popular'), false); ?>

                                        </button>
        
                                        
                                        <button wire:click="$set('sort_by', 'rating')" type="button" class="<?php echo e($sort_by === 'rating' ? 'text-gray-900' : 'text-gray-500', false); ?> block px-4 py-3 text-base font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                            <?php echo e(__('messages.t_best_rating'), false); ?>

                                        </button>
        
                                        
                                        <button wire:click="$set('sort_by', 'sales')" type="button" class="<?php echo e($sort_by === 'sales' ? 'text-gray-900' : 'text-gray-500', false); ?> block px-4 py-3 text-base font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                            <?php echo e(__('messages.t_most_selling'), false); ?>

                                        </button>
                                    </div>
                                    
                                    <div>
                                        
                                        <button wire:click="$set('sort_by', 'newest')" type="button" class="<?php echo e($sort_by === 'newest' ? 'text-gray-900' : 'text-gray-500', false); ?> block px-4 py-3 text-base font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                            <?php echo e(__('messages.t_newest_first'), false); ?>

                                        </button>
        
                                        
                                        <button wire:click="$set('sort_by', 'price_low_high')" type="button" class="<?php echo e($sort_by === 'price_low_high' ? 'text-gray-900' : 'text-gray-500', false); ?> block px-4 py-3 text-base font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                            <?php echo e(__('messages.t_price_low_to_high'), false); ?>

                                        </button>
        
                                        
                                        <button wire:click="$set('sort_by', 'price_high_low')" type="button" class="<?php echo e($sort_by === 'price_high_low' ? 'text-gray-900' : 'text-gray-500', false); ?> block px-4 py-3 text-base font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                            <?php echo e(__('messages.t_price_high_to_low'), false); ?>

                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    
                    
                    <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block ltr:text-left rtl:text-right">

                        
                        <div>
                            <button type="button" class="ml-5 border border-gray-300 py-2 px-4 rounded-md group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                <?php echo e(__('messages.t_delivery_time_2'), false); ?>

                                <svg class="flex-shrink-0 ltr:-mr-1 rtl:-ml-1 ltr:ml-1 rtl:mr-1 h-5 w-5 text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-200 dark:hover:text-gray-200" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                        </div>
        
                        
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="ltr:origin-top-left rtl:origin-top-right absolute ltr:left-0 rtl:right-0 mt-2 w-96 rounded-md shadow-sm bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50 py-3 px-5" x-ref="menu-items" x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                            <div class="py-1" role="none">
                            
                                
                                <div class="py-3 px-4">
                                    
                                    <span class="font-bold text-xl text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_delivery_time'), false); ?></span>
                                    
                                    <div class="pt-2 flex justify-between items-center" x-show="open">
                                        <div class="py-4">
                                            
                                            <?php $__currentLoopData = $delivery_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key < 6): ?>
                                                    <div class="flex items-center pb-3">
                                                        <input wire:model.defer="delivery_time" id="filter-delivery-time-<?php echo e($key, false); ?>" value="<?php echo e($time['value'], false); ?>" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                                        <label for="filter-delivery-time-<?php echo e($key, false); ?>" class="ltr:ml-3 rtl:mr-3 block text-base font-medium text-gray-700 dark:text-gray-300">
                                                            <?php echo e($time['text'], false); ?>

                                                        </label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          
                                        </div>
                                        
                                        <div class="py-4">
                                            
                                            <?php $__currentLoopData = $delivery_times; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($key >= 6): ?>
                                                    <div class="flex items-center pb-3">
                                                        <input wire:model.defer="delivery_time" id="filter-delivery-time-<?php echo e($key, false); ?>" value="<?php echo e($time['value'], false); ?>" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                                        <label for="filter-delivery-time-<?php echo e($key, false); ?>" class="ltr:ml-3 rtl:mr-3 block text-base font-medium text-gray-700 dark:text-gray-300">
                                                            <?php echo e($time['text'], false); ?>

                                                        </label>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="py-6 px-4 flex justify-between items-center">
                                    
                                    
                                    <span wire:click="resetFilter" class="hover:underline text-base font-medium text-gray-400 hover:text-gray-800 cursor-pointer">
                                        <?php echo e(__('messages.t_clear'), false); ?>

                                    </span>
                                    
                                    
                                    
                                    <button wire:click="filter" wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed" wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer" wire:loading.attr="disabled" class="text-[13px] font-semibold flex justify-center bg-primary-600 hover:bg-primary-700 text-white py-2 px-8 rounded-lg tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">
                                        <div wire:loading="" wire:target="filter">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <div wire:loading.remove="" wire:target="filter">
                                            <?php echo e(__('messages.t_apply'), false); ?>

                                        </div>
                                    </button>
                                
                                </div>
                            
                            </div>
                        </div>
                    
                    </div>
                    
                    
                    <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block ltr:text-left rtl:text-right">

                        
                        <div>
                            <button type="button" class="ml-5 border border-gray-300 py-2 px-4 rounded-md group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                <?php echo e(__('messages.t_price'), false); ?>

                                <svg class="flex-shrink-0 ltr:-mr-1 rtl:-ml-1 ltr:ml-1 rtl:mr-1 h-5 w-5 text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-200 dark:hover:text-gray-200" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                        </div>
        
                        
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="ltr:origin-top-left rtl:origin-top-right absolute ltr:left-0 rtl:right-0 mt-2 w-96 rounded-md shadow-sm bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50 py-3 px-5" x-ref="menu-items" x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                            <div class="py-1" role="none">
                            
                                
                                <div class="py-3 px-4">
                                    
                                    <span class="font-bold text-xl text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_price'), false); ?></span>
                                    
                                    <div class="pt-6" x-show="open" style="display: none;">
                                        <div class="space-y-4">
            
                                            <div class="rounded-md shadow-sm -space-y-px">
                                                <div>
                                                    <input type="integer" wire:model.defer="min_price" minlength="1" min="1" maxlength="999999999" max="999999999" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="<?php echo e(__('messages.t_min_price'), false); ?>">
                                                </div>
                                                <div>
                                                    <input type="integer" wire:model.defer="max_price" minlength="1" min="1" maxlength="999999999" max="999999999" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="<?php echo e(__('messages.t_max_price'), false); ?>">
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="py-6 px-4 flex justify-between items-center">
                                    
                                    
                                    <span wire:click="resetFilter" class="hover:underline text-base font-medium text-gray-400 hover:text-gray-800 cursor-pointer">
                                        <?php echo e(__('messages.t_clear'), false); ?>

                                    </span>
                                    
                                    
                                    
                                    <button wire:click="filter" wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed" wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer" wire:loading.attr="disabled" class="text-[13px] font-semibold flex justify-center bg-primary-600 hover:bg-primary-700 text-white py-2 px-8 rounded-lg tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">
                                        <div wire:loading="" wire:target="filter">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <div wire:loading.remove="" wire:target="filter">
                                            <?php echo e(__('messages.t_apply'), false); ?>

                                        </div>
                                    </button>
                                
                                </div>
                            
                            </div>
                        </div>
                    
                    </div>
                    
                    
                    <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block ltr:text-left rtl:text-right">

                        
                        <div>
                            <button type="button" class="ml-5 border border-gray-300 py-2 px-4 rounded-md group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                <?php echo e(__('messages.t_rating'), false); ?>

                                <svg class="flex-shrink-0 ltr:-mr-1 rtl:-ml-1 ltr:ml-1 rtl:mr-1 h-5 w-5 text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-200 dark:hover:text-gray-200" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                        </div>
        
                        
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="w-96 ltr:origin-top-left rtl:origin-top-right absolute ltr:left-0 rtl:right-0 mt-2 rounded-md shadow-sm bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50 py-3 px-5" x-ref="menu-items" x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                            <div class="py-1" role="none">
                            
                                
                                <div class="py-3 px-4">
                                
                                    <span class="font-bold text-xl text-gray-900 dark:text-gray-300"><?php echo e(__('messages.t_rating'), false); ?></span>
                                
                                    <div class="pt-6 flex justify-between items-center" x-show="open">
                                        <div class="space-y-4">
            
                                            
                                            <div class="flex items-center">
                                                <input wire:model.defer="rating" id="filter-rating-5" name="rating" value="5" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                                <label for="filter-rating-5" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                                    <div class="flex items-center">
                                                        <?php for($i = 0; $i < 5; $i++): ?>
                                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                    </div>
                                                </label>
                                            </div>
            
                                            
                                            <div class="flex items-center">
                                                <input wire:model.defer="rating" id="filter-rating-4" name="rating" value="4" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                                <label for="filter-rating-4" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                                    <div class="flex items-center">
                                                        <?php for($i = 0; $i < 4; $i++): ?>
                                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                        <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                    </div>
                                                </label>
                                            </div>
            
                                            
                                            <div class="flex items-center">
                                                <input wire:model.defer="rating" id="filter-rating-3" name="rating" value="3" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                                <label for="filter-rating-3" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                                    <div class="flex items-center">
                                                        <?php for($i = 0; $i < 3; $i++): ?>
                                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                        <?php for($i = 0; $i < 2; $i++): ?>
                                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                    </div>
                                                </label>
                                            </div>
           
                                        </div>
                                        
                                        <div class="space-y-4">
            
                                            
                                            <div class="flex items-center">
                                                <input wire:model.defer="rating" id="filter-rating-2" name="rating" value="2" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                                <label for="filter-rating-2" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                                    <div class="flex items-center">
                                                        <?php for($i = 0; $i < 2; $i++): ?>
                                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                        <?php for($i = 0; $i < 3; $i++): ?>
                                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                    </div>
                                                </label>
                                            </div>
            
                                            
                                            <div class="flex items-center">
                                                <input wire:model.defer="rating" id="filter-rating-1" name="rating" value="1" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                                <label for="filter-rating-1" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                                    <div class="flex items-center">
                                                        <?php for($i = 0; $i < 1; $i++): ?>
                                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                        <?php for($i = 0; $i < 4; $i++): ?>
                                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                        <?php endfor; ?>
                                                    </div>
                                                </label>
                                            </div>
                                        
                                        </div>
                                        
                                    </div>
                                </div>
                                
                                
                                <div class="py-6 px-4 flex justify-between items-center">
                                    
                                    
                                    <span wire:click="resetFilter" class="hover:underline text-base font-medium text-gray-400 hover:text-gray-800 cursor-pointer">
                                        <?php echo e(__('messages.t_clear'), false); ?>

                                    </span>
                                    
                                    
                                    
                                    <button wire:click="filter" wire:loading.class="bg-gray-200 hover:bg-gray-300 text-gray-500 dark:bg-zinc-600 dark:text-zinc-400 cursor-not-allowed" wire:loading.class.remove="bg-primary-600 hover:bg-primary-700 text-white cursor-pointer" wire:loading.attr="disabled" class="text-[13px] font-semibold flex justify-center bg-primary-600 hover:bg-primary-700 text-white py-2 px-8 rounded-lg tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">
                                        <div wire:loading="" wire:target="filter">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                        </div>
                                        <div wire:loading.remove="" wire:target="filter">
                                            <?php echo e(__('messages.t_apply'), false); ?>

                                        </div>
                                    </button>
                                
                                </div>
                            
                            </div>
                        </div>
                    
                    </div>

                </div>
            </div>

        </div>

        
        <section aria-labelledby="products-heading" class="pt-6 pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-4 xl:grid-cols-4 gap-x-6 gap-y-10">
        
                
                <div class="lg:col-span-4 xl:col-span-4">
                    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
        
                        <?php $__empty_1 = true; $__currentLoopData = $gigs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gig): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            
                            
                            <div class="col-span-12 sm:col-span-6 md:col-span-4 lg:col-span-3 xl:col-span-3" wire:key="gigs-list-<?php echo e($gig->uid, false); ?>">
                                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered("gig-item-" . $gig->uid)) {
    $componentId = $_instance->getRenderedChildComponentId("gig-item-" . $gig->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName("gig-item-" . $gig->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild("gig-item-" . $gig->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.gig', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild("gig-item-" . $gig->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                            </div>
        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            
                            <div class="col-span-12">
                                <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                    <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                    <p class="mt-4 font-semibold text-gray-900"><?php echo e(__('messages.no_results_found'), false); ?></p>
                                    <p class="mt-2 text-gray-500"><?php echo e(__('messages.t_we_couldnt_find_anthing_search_term'), false); ?></p>
                                </div>
                            </div>
        
                        <?php endif; ?>
        
                        
                        <?php if($gigs->hasPages()): ?>
                            <div class="col-span-12">
                                <div class="flex justify-center pt-12">
                                    <?php echo $gigs->links('pagination::tailwind'); ?>

                                </div>
                            </div>
                        <?php endif; ?>
        
                    </div>
                </div>
        
            </div>
        </section>
    </main>
</div>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function xRiqSKhIlmnKtWu() {
            return {

                open: false,

                // Init component
                initialize() {
                    
                }

            }
        }
        window.xRiqSKhIlmnKtWu = xRiqSKhIlmnKtWu();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/categories/subcategory.blade.php ENDPATH**/ ?>