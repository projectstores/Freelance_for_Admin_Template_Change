<div class="w-full">

    
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
    
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-3">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">

                    </h2>
          
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    
					<span class="block">
                        <a href="<?php echo e(url('/'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_switch_to_buying'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">
        <div class="w-full">
            
            
            <div class="mt-4">
        
                <div class="col-span-12 h-full shadow-sm rounded-lg border border-gray-200 bg-white dark:bg-zinc-600 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
                
                    <div class="px-5 py-4 text-xl text-black font-bold border-b border-gray-200 capitalize"><?php echo app('translator')->get('messages.t_reviews'); ?></div>
                    
                    <?php if($reviews && $reviews->count()): ?>
                    
                    <table class="w-full text-left border-spacing-y-[10px] border-separate sm:mt-2">
                        <thead class="">
                            <tr class="bg-slate-200 dark:bg-zinc-600">
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_gig'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_buyer'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_rating'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_date'); ?></th>
        
                                
                                <th class="font-bold tracking-wider text-black px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300"><?php echo app('translator')->get('messages.t_options'); ?></th>
        
                            </tr>
                        </thead>
                        <thead>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-reviews-<?php echo e($review->uid, false); ?>">
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                        <div class="flex items-center space-x-3 rtl:space-x-reverse">
        
                                            
                                            <div class="h-10 w-10">
                                                <img class="w-full h-full rounded-md object-cover lazy" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($review->gig->thumbnail), false); ?>" alt="<?php echo e($review->gig->title, false); ?>">
                                            </div>
        
                                            
                                            <div>
                                                
                                                
                                                <a href="<?php echo e(url('service', $review->gig->slug), false); ?>" class="text-black font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-base" title="<?php echo e($review->gig->title, false); ?>">
                                                    <?php echo e($review->gig->title, false); ?>

                                                </a>
        
                                                
                                                <div class="text-slate-500 text-xs whitespace-nowrap mt-2">
                                                    <nav class="flex" aria-label="Breadcrumb">
                                                        <ol role="list" class="flex items-center space-x-1 rtl:space-x-reverse">
                                                            
                                                            
                                                            <li>
                                                                <div class="flex items-center">
                                                                    <a href="<?php echo e(url('categories', $review->gig->category->slug), false); ?>" target="_blank" class="text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100"><?php echo e($review->gig->category->name, false); ?></a>
                                                                </div>
                                                            </li>
                                                    
                                                            
                                                            <li>
                                                                <div class="flex items-center">
        
                                                                    
                                                                    <svg class="flex-shrink-0 h-4 w-4 text-gray-400 rtl:rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/> </svg>
        
                                                                    <a href="<?php echo e(url('categories/' . $review->gig->category->slug . '/' . $review->gig->subcategory->slug), false); ?>" target="_blank" class="ltr:ml-1 rtl:mr-1 text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100" aria-current="page"><?php echo e($review->gig->subcategory->name, false); ?></a>
        
                                                                </div>
                                                            </li>
        
                                                        </ol>
                                                    </nav>
                                                </div>
        
                                            </div>
        
                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-44 rtl:text-right">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img class="h-10 w-10 rounded-full lazy object-cover object-center" src="<?php echo e(placeholder_img(), false); ?>" data-src="<?php echo e(src($review->user->avatar), false); ?>" alt="<?php echo e($review->user->username, false); ?>">
                                            </div>
                                            <div class="ltr:ml-4 rtl:mr-4">
                                                <a href="<?php echo e(url('profile', $review->user->username), false); ?>" target="_blank" class="font-medium text-black dark:text-gray-200 pb-1 hover:text-primary-600 block text-sm whitespace-nowrap"><?php echo e($review->user->username, false); ?></a>
                                                <div class="font-normal text-gray-500 dark:text-gray-300 text-xs whitespace-nowrap">
                                                    <?php if($review->user->fullname): ?>
                                                        <?php echo e($review->user->fullname, false); ?>

                                                    <?php else: ?>
                                                        -
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div>
                                            <?php echo render_star_rating($review->rating, "1rem", "1rem", "#d0d0d0"); ?>

                                        </div>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <span class="text-[13px] font-medium text-gray-700 dark:text-gray-400 whitespace-nowrap">
                                            <?php echo e(format_date($review->created_at), false); ?>

                                        </span>
                                    </td>
        
                                    
                                    <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                        <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">
        
                                            
                                            <button wire:click="details('<?php echo e($review->uid, false); ?>')" type="button" data-tooltip-target="tooltip-actions-review-details-<?php echo e($review->uid, false); ?>" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100" wire:key="tooltip-actions-review-details-<?php echo e($review->uid, false); ?>">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h2v2H4zm0 5h2v2H4zm0 5h2v2H4zm16-8V6H8.023v2H18.8zM8 11h12v2H8zm0 5h12v2H8z"></path></svg>
                                            </button>
                                            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'tooltip-actions-review-details-'.e($review->uid, false).'','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_review_details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
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
			</div>
		</div>
	</div>


    
    <?php if($reviews->hasPages()): ?>
        <div class="flex justify-center pt-12">
            <?php echo $reviews->links('pagination::tailwind'); ?>

        </div>
    <?php endif; ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/reviews/reviews.blade.php ENDPATH**/ ?>