<div class="w-full px-2 md:px-0 md:max-w-3xl mx-auto" x-data="window.KgRWYPfkiUNBpnW" x-cloak>

    
    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading>
        <div class="w-full h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="text-xs font-medium tracking-wider text-white mt-4 block"><?php echo e(__('messages.t_please_wait_dots'), false); ?></span>
            </div>
        </div>
    </div>
    
    <?php if($isFinished): ?>

        
        <div class="bg-white dark:bg-zinc-800 justify-center pb-4 pt-5 px-4 rounded-md shadow-sm sm:align-middle sm:max-w-sm sm:p-6 sm:w-full mx-auto">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 dark:bg-zinc-700">
                    <svg class="h-6 w-6 text-green-600 dark:text-zinc-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/> </svg>
                </div>

                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-md leading-6 font-medium text-gray-900 dark:text-gray-200" id="modal-title"><?php echo e(__('messages.t_gig_created'), false); ?></h3>
                    <div class="mt-2">
                        <?php if($is_approved): ?>
                            <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_gig_created_subtitle'), false); ?></p>
                        <?php else: ?>
                            <p class="text-sm text-gray-500 dark:text-gray-400"><?php echo e(__('messages.t_gig_created_subtitle_pending_approval'), false); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <a href="<?php echo e($isFinished, false); ?>" class="inline-flex justify-center items-center w-full rounded uppercase tracking-widest border border-transparent shadow-sm px-4 py-3 bg-primary-600 font-medium text-white hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 text-xs">
                    <?php echo e(__('messages.t_view_gig'), false); ?>

                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                </a>
            </div>
        </div>
  
    <?php else: ?>
    
        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.create.steps', ['current' => $current_step])->html();
} elseif ($_instance->childHasBeenRendered(''.e(now(), false).'')) {
    $componentId = $_instance->getRenderedChildComponentId(''.e(now(), false).'');
    $componentTag = $_instance->getRenderedChildComponentTagName(''.e(now(), false).'');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild(''.e(now(), false).'');
} else {
    $response = \Livewire\Livewire::mount('main.create.steps', ['current' => $current_step]);
    $html = $response->html();
    $_instance->logRenderedChild(''.e(now(), false).'', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    
        
        <div x-show="'<?php echo e($current_step, false); ?>' === 'overview'">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.create.steps.overview')->html();
} elseif ($_instance->childHasBeenRendered('l1626766933-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1626766933-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1626766933-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1626766933-1');
} else {
    $response = \Livewire\Livewire::mount('main.create.steps.overview');
    $html = $response->html();
    $_instance->logRenderedChild('l1626766933-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    
        
        <div x-show="'<?php echo e($current_step, false); ?>' === 'pricing'">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.create.steps.pricing')->html();
} elseif ($_instance->childHasBeenRendered('l1626766933-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l1626766933-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1626766933-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1626766933-2');
} else {
    $response = \Livewire\Livewire::mount('main.create.steps.pricing');
    $html = $response->html();
    $_instance->logRenderedChild('l1626766933-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    
        
        <div x-show="'<?php echo e($current_step, false); ?>' === 'requirements'">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.create.steps.requirements')->html();
} elseif ($_instance->childHasBeenRendered('l1626766933-3')) {
    $componentId = $_instance->getRenderedChildComponentId('l1626766933-3');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1626766933-3');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1626766933-3');
} else {
    $response = \Livewire\Livewire::mount('main.create.steps.requirements');
    $html = $response->html();
    $_instance->logRenderedChild('l1626766933-3', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    
        
        <div x-show="'<?php echo e($current_step, false); ?>' === 'gallery'">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('main.create.steps.gallery')->html();
} elseif ($_instance->childHasBeenRendered('l1626766933-4')) {
    $componentId = $_instance->getRenderedChildComponentId('l1626766933-4');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1626766933-4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1626766933-4');
} else {
    $response = \Livewire\Livewire::mount('main.create.steps.gallery');
    $html = $response->html();
    $_instance->logRenderedChild('l1626766933-4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>

    <?php endif; ?>

</div>


<?php $__env->startPush('scripts'); ?>

    
    <script>
        function KgRWYPfkiUNBpnW() {
            return {

                current_step: "<?php echo e($current_step, false); ?>"

            }
        }
        window.KgRWYPfkiUNBpnW = KgRWYPfkiUNBpnW()
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/create/create.blade.php ENDPATH**/ ?>