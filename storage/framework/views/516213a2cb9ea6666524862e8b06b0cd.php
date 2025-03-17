<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'placeholder', 'model', 'options', 'isDefer', 'isAssociative', 'componentId', 'value', 'text', 'selected' => null, 'class' => null, 'show_option_insead' => false]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'placeholder', 'model', 'options', 'isDefer', 'isAssociative', 'componentId', 'value', 'text', 'selected' => null, 'class' => null, 'show_option_insead' => false]); ?>
<?php foreach (array_filter((['label', 'placeholder', 'model', 'options', 'isDefer', 'isAssociative', 'componentId', 'value', 'text', 'selected' => null, 'class' => null, 'show_option_insead' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="relative default-select2 <?php echo e($errors->first($model) ? 'select2-custom-has-error' : '', false); ?>">
    <label class="text-lg font-medium block mb-1 <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-black dark:text-white', false); ?>"><?php echo e(htmlspecialchars_decode($label), false); ?></label>

    <select data-pharaonic="select2" data-component-id="<?php echo e($componentId, false); ?>" wire:model<?php echo e($isDefer ? '.defer' : '', false); ?>="<?php echo e($model, false); ?>" id="select2-id-<?php echo e($model, false); ?>" data-placeholder="<?php echo e($placeholder, false); ?>" class="<?php echo e($class ? $class : 'select2', false); ?>" <?php echo e($attributes, false); ?> data-dir="<?php echo e(config()->get('direction'), false); ?>" style="display: none;" onload="this.style.display = 'block'">
        <option value=""></option>
        <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            
            <?php if(!$isAssociative): ?>
                <option value="<?php echo e($option[$value], false); ?>" <?php echo e($selected && $selected === $option[$value] ? "selected" : "", false); ?>><?php echo e($option[$text], false); ?></option> 
            <?php elseif($show_option_insead): ?>
                <option value="<?php echo e($option, false); ?>" <?php echo e($selected && $selected === $option ? "selected" : "", false); ?>><?php echo e($option, false); ?></option>
            <?php else: ?>
                <option value="<?php echo e($key, false); ?>" <?php echo e($selected && $selected === $key ? "selected" : "", false); ?>><?php echo e($key, false); ?></option>
            <?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
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

</div>

<style>

.select2 {
    border: 2px solid #f0f0f0; /* Change the border color and width */
    border-radius: 0.5rem; /* Adjust the border radius */
    color: #000; /* Set the text color */
}

</style>

<?php if (! $__env->hasRenderedOnce('2f09eed1-e185-4092-81db-0e93c4257328')): $__env->markAsRenderedOnce('2f09eed1-e185-4092-81db-0e93c4257328');
$__env->startPush('styles'); ?>

    
    <link href="<?php echo e(url('node_modules/select2/dist/css/select2.min.css'), false); ?>" rel="stylesheet" />

<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('c1a6946a-305c-4f92-8090-dca5834c5a7e')): $__env->markAsRenderedOnce('c1a6946a-305c-4f92-8090-dca5834c5a7e');
$__env->startPush('scripts'); ?>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    
    <script src="<?php echo e(url('node_modules/select2/dist/js/select2.min.js'), false); ?>"></script>

    
    <script src="<?php echo e(url('public/vendor/pharaonic/pharaonic.select2.min.js'), false); ?>"></script>

<?php $__env->stopPush(); endif; ?><?php /**PATH C:\xampp_8.2\htdocs\Freelancer_Work\Freelancer_Work_New\resources\views/components/forms/select2.blade.php ENDPATH**/ ?>