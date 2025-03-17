<div class="w-full" x-data="window.snvtjOdCIkOPQJD">

    
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
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">

                    
                    <span class="block">
                        <a href="<?php echo e(url('explore/projects'), false); ?>" target="_blank" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_explore_projects'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    
    <?php if(session()->has('success')): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-4">
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

    
    <?php if(session()->has('error')): ?>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
            <div class="rounded-md bg-red-100 p-4 mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/> </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <div class="text-sm text-red-700">
                            <p><?php echo e(session()->get('error'), false); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="w-full">
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_submitted_proposals'); ?></div>
                    
                    <?php if($bids && $bids->count()): ?>
                    
                    <table class="w-full px-10 text-left border-spacing-y-[10px] border-separate sm:mt-2">
						<thead class="">
							<tr class="bg-gray-100 dark:bg-zinc-600">

                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_project'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_amount'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_days'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_status'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_date'); ?></th>
                                
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_options'); ?></th>
							</tr>
						</thead>
						<thead>
						    
						    <?php $__currentLoopData = $bids; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bid): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-submitted-bids-<?php echo e($bid->uid, false); ?>">
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                    <div class="flex items-center">
                                        <a href="<?php echo e(url('project/' . $bid->project->pid . '/' . $bid->project->slug), false); ?>" target="_blank" class="font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-sm" title="<?php echo e($bid->project->title, false); ?>">
                                            <?php echo e($bid->project->title, false); ?>

                                        </a>
                                    </div>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <div class="text-gray-900 dark:text-gray-100 text-sm font-bold">
                                        <?php echo money(convertToNumber($bid->amount), settings('currency')->code, true); ?>
                                    </div>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <div class="text-gray-500 dark:text-gray-100 text-sm font-normal whitespace-nowrap">
                                        <?php echo e($bid->days, false); ?>

                                    </div>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
    
                                    
                                    <?php if($bid->is_awarded): ?>
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-50 text-green-800 dark:bg-transparent dark:text-green-400">
                                            <?php echo e(__('messages.t_awarded'), false); ?>

                                        </span>
                                    <?php else: ?>
                                        <?php switch($bid->status):
    
                                            
                                            case ('pending_approval'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-yellow-50 text-yellow-800 dark:bg-transparent dark:text-amber-400">
                                                    <?php echo e(__('messages.t_pending_approval'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            
                                            <?php case ('rejected'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-red-50 text-red-800 dark:bg-transparent dark:text-red-400">
                                                    <?php echo e(__('messages.t_requires_changes'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            
                                            <?php case ('pending_payment'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-purple-50 text-purple-800 dark:bg-transparent dark:text-purple-400">
                                                    <?php echo e(__('messages.t_pending_payment'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            
                                            <?php case ('active'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-blue-50 text-blue-800 dark:bg-transparent dark:text-blue-400">
                                                    <?php echo e(__('messages.t_active'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            
                                            <?php case ('hidden'): ?>
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-gray-50 text-gray-800 dark:bg-transparent dark:text-gray-300">
                                                    <?php echo e(__('messages.t_hidden'), false); ?>

                                                </span>
                                                <?php break; ?>
    
                                            <?php default: ?>
                                                
                                        <?php endswitch; ?>
                                    <?php endif; ?>
    
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <div class="text-gray-500 dark:text-gray-100 text-sm font-normal whitespace-nowrap">
                                        <?php echo e(format_date($bid->created_at), false); ?>

                                    </div>
                                </td>
    
                                
                                <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                    <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
    
                                        
                                        <?php if($bid->status === 'rejected' && $bid->admin_rejection_reason): ?>
                                            <button x-on:click="rejection('<?php echo e(str_replace(["'", "\n", "\r", "\r\n"], " ", $bid->admin_rejection_reason), false); ?>')" type="button" data-tooltip-target="tooltip-actions-rejection-reason-<?php echo e($bid->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M9.707 13.707 12 11.414l2.293 2.293 1.414-1.414L13.414 10l2.293-2.293-1.414-1.414L12 8.586 9.707 6.293 8.293 7.707 10.586 10l-2.293 2.293z"></path><path d="M20 2H4c-1.103 0-2 .897-2 2v18l5.333-4H20c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2zm0 14H6.667L4 18V4h16v12z"></path></svg>
                                            </button>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-rejection-reason-'.e($bid->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_rejection_reason'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                        
                                        <?php if(!$bid->is_awarded && $bid->project->status === 'active' && !$bid->project->awarded_bid_id): ?>
                                            <a href="<?php echo e(url('seller/projects/bids/edit', $bid->uid), false); ?>" data-tooltip-target="tooltip-actions-edit-<?php echo e($bid->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                                
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-edit-'.e($bid->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_edit'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
                                            
                                        
                                        <?php if($bid->status === 'pending_payment' && $bid->checkout): ?>
                                            <a href="<?php echo e(url('seller/projects/bids/checkout', $bid->checkout->uid), false); ?>" data-tooltip-target="tooltip-actions-checkout-<?php echo e($bid->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M21 9h-1.42l-3.712-6.496-1.736.992L17.277 9H6.723l3.146-5.504-1.737-.992L4.42 9H3a1.001 1.001 0 0 0-.965 1.263l2.799 10.264A2.005 2.005 0 0 0 6.764 22h10.473c.898 0 1.692-.605 1.93-1.475l2.799-10.263A.998.998 0 0 0 21 9zm-3.764 11v1-1H6.764L4.31 11h15.38l-2.454 9z"></path><path d="M9 13h2v5H9zm4 0h2v5h-2z"></path></svg>
                                            </a>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-checkout-'.e($bid->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_checkout'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                        
                                        <?php if(!$bid->is_awarded): ?>
                                            <button wire:click="confirmDelete('<?php echo e($bid->uid, false); ?>')" type="button" data-tooltip-target="tooltip-actions-delete-<?php echo e($bid->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                            </button>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-delete-'.e($bid->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_delete'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
                                        <?php endif; ?>
    
                                    </div>
                                </td>
    
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</thead>
					</table>
					<?php else: ?>
					    <div class="flex flex-col col-span-2 sm:flex-row justify-center px-5 py-5 mt-5 mb-4 text-gray-400 text-sm"><?php echo app('translator')->get('messages.no_results_found'); ?></div>
					<?php endif; ?>
                    
                <div>
            </div>
        </div>


    
    <?php if($bids->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $bids->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        function snvtjOdCIkOPQJD() {
            return {

                // Read rejection reason
                rejection(text) {
                    window.$wireui.notify({
                        title      : "<?php echo e(__('messages.t_rejection_reason'), false); ?>",
                        description: text,
                        icon       : 'error'
                    })
                }

            }
        }
        window.snvtjOdCIkOPQJD = snvtjOdCIkOPQJD();
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/projects/bids/bids.blade.php ENDPATH**/ ?>