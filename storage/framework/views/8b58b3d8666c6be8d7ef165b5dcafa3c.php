<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['label', 'placeholder', 'model', 'old' => null, 'target']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['label', 'placeholder', 'model', 'old' => null, 'target']); ?>
<?php foreach (array_filter((['label', 'placeholder', 'model', 'old' => null, 'target']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div class="<?php echo e($errors->first($model) ? 'ckeditor-has-error' : '', false); ?>">

    
    <label for="text-input-component-id-<?php echo e($model, false); ?>" class="block text-[0.8125rem] font-medium <?php echo e($errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-white', false); ?>"><?php echo e(htmlspecialchars_decode($label), false); ?></label>

    
    <div class="mt-2 relative" wire:ignore>
        <?php if($old): ?>
            <div id="editor-container"><?= str_replace( '&', '&amp;', $old ); ?></div>
        <?php else: ?>
            <div id="editor-container"></div>
        <?php endif; ?>
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

</div>

<?php if (! $__env->hasRenderedOnce('5dba297d-da55-4922-8b84-7163d25e5a2d')): $__env->markAsRenderedOnce('5dba297d-da55-4922-8b84-7163d25e5a2d');
$__env->startPush('styles'); ?>
    
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        [dir="rtl"] .ql-editor {
            direction: rtl;
            text-align: right;
        }
        .ql-container.ql-snow {
            min-height: 100px;
            border-top: 1px solid rgb(209 213 219) !important;
        }
        .ql-container.ql-snow .ql-editor {
            max-height: 450px;
        }
        .dark .ql-editor.ql-blank::before {
            color: rgb(223 223 223 / 60%) !important;
        }
    </style>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('e3f2bf60-d6a1-46e8-8a63-218f8dfc206d')): $__env->markAsRenderedOnce('e3f2bf60-d6a1-46e8-8a63-218f8dfc206d');
$__env->startPush('scripts'); ?>

    
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>

        // Set action button
        const target       = "<?php echo e($target, false); ?>";

        // Set toolbar options
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ 'list': 'ordered'}, { 'list': 'bullet' }],
            [{ 'indent': '-1'}, { 'indent': '+1' }],
            [{ 'direction': __var_rtl ? 'rtl' : 'ltr' }],
            [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
            [{ 'color': [] }, { 'background': [] }],
            [{ 'align': [] }],
            ['clean'],
            <?php if(auth()->guard('admin')->check()): ?>
            [ 'link', 'image', 'video', 'formula' ]
            <?php endif; ?>
        ];

        // Initialize quill.js
        var editor = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: '<?php echo str_replace("'", "’", htmlspecialchars_decode($placeholder)); ?>',
            modules: {
                toolbar: toolbarOptions
            }
        });

        // Set content as empty variable
        var content = editor.root.innerHTML;

        // Listen when text changes
        editor.on('text-change', function(delta, source) {
            content = editor.root.innerHTML;
        });

        // Get action button
        document.getElementById(target).onclick = function () { 
            window.livewire.find('<?php echo e($_instance->id, false); ?>').set('<?php echo e($model, false); ?>', content); 
        };

      </script>

<?php $__env->stopPush(); endif; ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/components/forms/ckeditor.blade.php ENDPATH**/ ?>