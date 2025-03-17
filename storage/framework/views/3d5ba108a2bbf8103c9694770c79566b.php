<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'model']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'model']); ?>
<?php foreach (array_filter((['label', 'model']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div>

    
    <label for="color-picker-component-id-<?php echo e($model, false); ?>" class="block text-sm font-medium tracking-wide <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-600 dark:text-white', false); ?>"><?php echo e(htmlspecialchars_decode($label), false); ?></label>

    
    <div class="mt-2 relative color-picker-wrapper">
        <input type="text" wire:model.defer="<?php echo e($model, false); ?>" id="color-picker-component-id-<?php echo e($model, false); ?>" class="color-picker-input disabled:cursor-not-allowed focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] dark:placeholder-zinc-300 text-sm font-medium text-zinc-800 dark:text-white rounded-md dark:bg-transparent  cursor-pointer border <?php echo e($errors->first($model) ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600', false); ?>" <?php echo e($attributes, false); ?>>
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

</div><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/components/forms/color-picker.blade.php ENDPATH**/ ?>