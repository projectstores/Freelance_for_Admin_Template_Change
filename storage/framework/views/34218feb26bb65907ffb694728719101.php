<div class="w-full">

    
    <nav class="flex" aria-label="Breadcrumb">
        <ol role="list" class="flex items-center space-x-2 rtl:space-x-reverse">

            
            <li>
                <div>
                    <a href="<?php echo e(url('/'), false); ?>" class="text-gray-400 hover:text-gray-500 dark:text-zinc-300 dark:hover:text-zinc-100">
                        <svg class="h-5 w-5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M9.293 2.293a1 1 0 011.414 0l7 7A1 1 0 0117 11h-1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-3a1 1 0 00-1-1H9a1 1 0 00-1 1v3a1 1 0 01-1 1H5a1 1 0 01-1-1v-6H3a1 1 0 01-.707-1.707l7-7z" clip-rule="evenodd"/> </svg>
                        <span class="sr-only">Home</span>
                    </a>
                </div>
            </li>
      
            
            <li>
                <div class="flex items-center">
                    <svg class="h-4 w-4 flex-shrink-0 text-gray-300 reflection dark:text-zinc-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"> <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"/> </svg>
                    <a href="<?php echo e(url('explore/projects'), false); ?>" class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-zinc-300 dark:hover:text-zinc-100">
                        <?php echo app('translator')->get('messages.t_explore_projects'); ?>
                    </a>
                </div>
            </li>

            
            <li>
                <div class="flex items-center">
                    <svg class="h-4 w-4 flex-shrink-0 text-gray-300 reflection dark:text-zinc-600" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"> <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z"/> </svg>
                    <span class="ltr:ml-2 rtl:mr-2 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-zinc-300 dark:hover:text-zinc-100" aria-current="page">
                        <?php echo e(category_title('projects', $category), false); ?>

                    </span>
                </div>
            </li>

        </ol>
    </nav>

    
    <h1 class="text-zinc-600 text-4xl -tracking-wide leading-9 font-semibold pt-6 mb-3 dark:text-zinc-100">
        <?php echo e(category_title('projects', $category), false); ?>

    </h1>

    
    <p class="text-sm text-zinc-500 font-normal tracking-wide dark:text-zinc-400"><?php echo e($category->seo_description, false); ?></p>

    
    <div class="mt-4">
        <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('explore/projects/' . $category->slug . '/' . $skill->slug), false); ?>" class="bg-primary-100/50 hover:bg-primary-200 text-primary-800 text-xs font-semibold ltr:mr-2 rtl:ml-2 px-2.5 py-0.5 rounded border border-primary-400 dark:bg-transparent dark:border-zinc-600 dark:text-zinc-400 dark:hover:bg-zinc-700 dark:hover:text-zinc-100" wire:key="explore-projects-category-skill-<?php echo e($skill->uid, false); ?>">
                <?php echo e($skill->name, false); ?>

            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="w-full mt-8 lg:mt-16">

        
        <div class="grid grid-cols-1 gap-4 lg:gap-8">
            <?php $__empty_1 = true; $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.cards.project', [ 'id' => $project->uid ])->html();
} elseif ($_instance->childHasBeenRendered('project-card-id-' . $project->uid)) {
    $componentId = $_instance->getRenderedChildComponentId('project-card-id-' . $project->uid);
    $componentTag = $_instance->getRenderedChildComponentTagName('project-card-id-' . $project->uid);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('project-card-id-' . $project->uid);
} else {
    $response = \Livewire\Livewire::mount('main.cards.project', [ 'id' => $project->uid ]);
    $html = $response->html();
    $_instance->logRenderedChild('project-card-id-' . $project->uid, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                
                <div class="border-dashed border-2 border-gray-200 rounded py-16 text-center font-normal tracking-wider text-gray-300 text-base dark:border-zinc-700 dark:text-zinc-500">
                    <?php echo app('translator')->get('messages.no_results_found'); ?>
                </div>

            <?php endif; ?>
        </div>

        
        <?php if($projects->hasPages()): ?>
            <hr class="my-10">
            <div class="px-4 py-5 sm:px-6 flex justify-center">
                <?php echo $projects->links('pagination::tailwind'); ?>

            </div>
        <?php endif; ?>

    </div>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/explore/projects/category.blade.php ENDPATH**/ ?>