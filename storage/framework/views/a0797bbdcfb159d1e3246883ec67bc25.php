<div class="w-full">

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12 mb-10">
        <nav class="justify-between px-4 py-3 text-gray-700 border border-gray-100 rounded-lg shadow-sm sm:flex sm:px-5 bg-white dark:bg-zinc-800 dark:border-zinc-700 dark:shadow-none" aria-label="Breadcrumb">

            
            <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                
                <li>
                    <div class="flex items-center">
                        <a href="<?php echo e(url('/'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_home'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="<?php echo e(url('seller/home'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_my_dashboard'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="<?php echo e(url('seller/gigs'), false); ?>" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                            <?php echo app('translator')->get('messages.t_my_gigs'); ?>
                        </a>
                    </div>
                </li>

                
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                            <?php echo app('translator')->get('messages.t_edit_gig'); ?>
                        </span>
                    </div>
                </li>

            </ol>

            
            <div class="flex items-center">

                
                <span class="block ltr:mr-3 rtl:ml-4">
                    <a href="<?php echo e(url('seller/gigs'), false); ?>" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-700/40 rounded shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-700/40 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600 dark:focus:ring-offset-zinc-700/40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 dark:text-zinc-200 ltr:mr-2 rtl:ml-2 rtl:rotate-180" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>

                        <?php echo e(__('messages.t_back_to_gigs'), false); ?>

                    </a>
                </span>

                
                <span class="block ltr:mr-3 rtl:ml-4">
                    <a href="<?php echo e(url('service', $gig->slug), false); ?>" target="_blank" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                        <svg class="h-4 w-4 text-gray-50 ltr:mr-2 rtl:ml-2 rtl:rotate-180" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m13 3 3.293 3.293-7 7 1.414 1.414 7-7L21 11V3z"></path><path d="M19 19H5V5h7l-2-2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2v-5l-2-2v7z"></path></svg>

                        <?php echo e(__('messages.t_view_gig'), false); ?>

                    </a>
                </span>
                
            </div>

        </nav>
    </div>

    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-12">

        
        <?php if($step === 'overview'): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.seller.gigs.options.steps.overview', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l4769402-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4769402-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4769402-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4769402-0');
} else {
    $response = \Livewire\Livewire::mount('main.seller.gigs.options.steps.overview', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l4769402-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php endif; ?>

        
        <?php if($step === 'pricing'): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.seller.gigs.options.steps.pricing', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l4769402-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l4769402-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4769402-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4769402-1');
} else {
    $response = \Livewire\Livewire::mount('main.seller.gigs.options.steps.pricing', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l4769402-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php endif; ?>

        
        <?php if($step === 'requirements'): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.seller.gigs.options.steps.requirements', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l4769402-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l4769402-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4769402-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4769402-2');
} else {
    $response = \Livewire\Livewire::mount('main.seller.gigs.options.steps.requirements', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l4769402-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php endif; ?>

        
        <?php if($step === 'gallery'): ?>
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.seller.gigs.options.steps.gallery', ['gig' => $gig])->html();
} elseif ($_instance->childHasBeenRendered('l4769402-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l4769402-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4769402-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4769402-3');
} else {
    $response = \Livewire\Livewire::mount('main.seller.gigs.options.steps.gallery', ['gig' => $gig]);
    $html = $response->html();
    $_instance->logRenderedChild('l4769402-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        <?php endif; ?>

    </div>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/seller/gigs/options/edit.blade.php ENDPATH**/ ?>