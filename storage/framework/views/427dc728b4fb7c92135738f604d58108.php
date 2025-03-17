<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'model', 'hidelabel' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'model', 'hidelabel' => false]); ?>
<?php foreach (array_filter((['label', 'model', 'hidelabel' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<label for="checkbox-input-component-id-<?php echo e($model, false); ?>" class="block text-base font-medium tracking-wide mb-2 <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-black dark:text-white', false); ?>"><?php echo e(htmlspecialchars_decode($label), false); ?></label>

<div class="disabled:cursor-not-allowed focus:!ring-1 border w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent relative flex items-center <?php echo e($errors->first($model) ? 'focus:!ring-red-600 focus:!border-red-600 border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 border-gray-300 dark:border-zinc-500', false); ?>">
    
    <div class="flex items-center h-5">
        <input id="checkbox-input-component-id-<?php echo e($model, false); ?>" type="checkbox" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300 rounded" wire:model.defer="<?php echo e($model, false); ?>">
    </div>

    
    <div class="ltr:ml-3 rtl:mr-3 text-xs">
        <label for="checkbox-input-component-id-<?php echo e($model, false); ?>" class="font-medium text-sm cursor-pointer truncate overflow-hidden <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-zinc-800 dark:text-white', false); ?>"><?php echo e(htmlspecialchars_decode($label), false); ?></label>
    </div>

    
    <?php $__errorArgs = [$model];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <p class="mt-1 text-xs text-red-600 dark:text-red-500"><?php echo e($errors->first($model), false); ?></p>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/components/forms/checkbox.blade.php ENDPATH**/ ?>