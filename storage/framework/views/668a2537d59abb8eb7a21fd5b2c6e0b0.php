<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id', 'extensions', 'size', 'max', 'model', 'label']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id', 'extensions', 'size', 'max', 'model', 'label']); ?>
<?php foreach (array_filter((['id', 'extensions', 'size', 'max', 'model', 'label']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="window.uploader_<?php echo e($id, false); ?>" x-init="initialize" x-cloak>
    <input type="file" name="<?php echo e($id, false); ?>" id="<?php echo e($id, false); ?>" multiple>
</div>

<?php if (! $__env->hasRenderedOnce('82dc0542-df35-4ce2-ade7-8187104f07cc')): $__env->markAsRenderedOnce('82dc0542-df35-4ce2-ade7-8187104f07cc');
$__env->startPush('scripts'); ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    
    <script defer src="<?php echo e(url('public/js/plugins/uploader/js/jquery.fileuploader.min.js'), false); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('6e547064-e8e3-4138-9cdf-16e427b7d7bc')): $__env->markAsRenderedOnce('6e547064-e8e3-4138-9cdf-16e427b7d7bc');
$__env->startPush('styles'); ?>
    
    <link href="<?php echo e(url('public/js/plugins/uploader/font/font-fileuploader.css'), false); ?>" rel="stylesheet">

    
    <link href="<?php echo e(url('public/js/plugins/uploader/css/jquery.fileuploader.min.css'), false); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(url('public/js/plugins/uploader/css/jquery.fileuploader-theme-boxafter.css'), false); ?>" media="all" rel="stylesheet">
<?php $__env->stopPush(); endif; ?>

<?php $__env->startPush('scripts'); ?>

    
    <script>
        function uploader_<?php echo e($id, false); ?>() {
            return {

                files: [],

                // Initialize
                initialize() {

                    const _this = this;

                    document.addEventListener('DOMContentLoaded', () => {
                        $('#<?php echo e($id, false); ?>').fileuploader({
                            extensions : <?php echo \Illuminate\Support\Js::from($extensions)->toHtml() ?>,
                            fileMaxSize: <?php echo \Illuminate\Support\Js::from($size)->toHtml() ?>,
                            limit      : <?php echo \Illuminate\Support\Js::from($max)->toHtml() ?>,
                            changeInput: ' ',
                            theme      : 'boxafter',
                            enableApi  : true,
                            addMore    : true,
                            thumbnails : {
                                box: '<div class="fileuploader-items">' +
                                        '<ul class="fileuploader-items-list"></ul>' +
                                    '</div>' +
                                    '<div class="fileuploader-input">' +
                                        '<div class="fileuploader-input-inner">' +
                                            '<h3>${captions.feedback} ${captions.or} <a>${captions.button}</a></h3>' +
                                        '</div>' +
                                        '<button type="button" class="fileuploader-input-button">&plus;</button>' +
                                    '</div>',
                                item: '<li class="fileuploader-item">' +
                                        '<div class="columns">' +
                                            '<div class="column-thumbnail">${image}<span class="fileuploader-action-popup"></span></div>' +
                                            '<div class="column-title">' +
                                                '<div title="${name}">${name}</div>' +
                                                '<span>${size2}</span>' +
                                            '</div>' +
                                            '<div class="column-actions">' +
                                                '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                            '</div>' +
                                            '${progressBar}' +
                                        '</div>' +
                                    '</li>',
                                startImageRenderer: true,
                                canvasImage: false,
                                _selectors: {
                                    list: '.fileuploader-items-list',
                                    item: '.fileuploader-item',
                                    start: '.fileuploader-action-start',
                                    retry: '.fileuploader-action-retry',
                                    remove: '.fileuploader-action-remove'
                                },
                                onItemShow: function(item, listEl, parentEl, newInputEl, inputEl) {
                                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                        api = $.fileuploader.getInstance(inputEl.get(0));
                                    
                                    plusInput.insertAfter(item.html)[api.getOptions().limit && api.getChoosedFiles().length >= api.getOptions().limit ? 'hide' : 'show']();
                                    
                                    if(item.format == 'image') {
                                        item.html.find('.fileuploader-item-icon').hide();
                                    }
                                },
                                onItemRemove: function(html, listEl, parentEl, newInputEl, inputEl) {
                                    var plusInput = listEl.find('.fileuploader-thumbnails-input'),
                                        api = $.fileuploader.getInstance(inputEl.get(0));
                                
                                    html.children().animate({'opacity': 0}, 200, function() {
                                        html.remove();
                                        
                                        if (api.getOptions().limit && api.getChoosedFiles().length - 1 < api.getOptions().limit)
                                            plusInput.show();
                                    });
                                }
                            },
                            dragDrop   : {
                                container: '.fileuploader-thumbnails-input'
                            },
                            afterRender: function(listEl, parentEl, newInputEl, inputEl) {
                                var plusInput = parentEl.find('.fileuploader-input'),
                                    api = $.fileuploader.getInstance(inputEl.get(0));

                                plusInput.on('click', function() {
                                    api.open();
                                });
                                
                                api.getOptions().dragDrop.container = plusInput;
                            },

                            onSelect: function(item, listEl, parentEl, newInputEl, inputEl) {

                                // Get file
                                const file               = item.file;

                                // Get original file name
                                const original_file_name = file.name

                                // Get last dot in file name
                                const last_dot           = original_file_name.lastIndexOf('.');

                                // Get file extension
                                const extension          = original_file_name.slice(last_dot + 1);

                                // Get date as string
                                const date               = new Date().valueOf();

                                // Get a random number
                                const random_number      = Math.floor(Math.random() * (999 - 1 + 1) + 1);

                                // Create new file name
                                const new_file_name      = date + "_" + random_number;

                                // Change file name
                                const new_file_updated   = new File([file], new_file_name + "." + extension, {type: file.type});

                                // Upload the new file
                                window.livewire.find('<?php echo e($_instance->id, false); ?>').upload('<?php echo e($model, false); ?>', new_file_updated, (uploadedFilename) => {

                                    // Set file details
                                    const details = {
                                        local : item.name,
                                        server: uploadedFilename
                                    }

                                    // Add to files
                                    _this.files.push(details);
                                    
                                }, () => {

                                    // Get api
                                    api = $.fileuploader.getInstance(inputEl.get(0));

                                    // Remove item
                                    api.remove(item);

                                    // Error
                                    window.$wireui.notify({
                                        title      : "<?php echo e(__('messages.t_error'), false); ?>",
                                        description: "<?php echo e(__('messages.t_error_while_uploading_your_file'), false); ?>",
                                        icon       : 'error'
                                    });
                                });
                                
                            },

                            // Remove file
                            onRemove: function(item) {

                                // Get file name from server
                                const data = _this.files.find(file => file.local === item.name);

                                // Remove file
                                window.livewire.find('<?php echo e($_instance->id, false); ?>').removeUpload('<?php echo e($model, false); ?>', data.server, () => {
                                    // Success
                                    window.$wireui.notify({
                                        title      : "<?php echo e(__('messages.t_success'), false); ?>",
                                        description: "<?php echo e(__('messages.t_file_has_been_successfully_deleted'), false); ?>",
                                        icon       : 'success'
                                    });
                                });

                            },

                            captions: $.extend(true, {}, $.fn.fileuploader.languages['en'], {
                                feedback: "<?php echo e($label, false); ?>",
                                or      : "<?php echo e(__('messages.t_or'), false); ?>",
                                button  : "<?php echo e(__('messages.t_browse_files'), false); ?>",
                            }),

                        });
                    });
                }

            }
        }
        window.uploader_<?php echo e($id, false); ?> = uploader_<?php echo e($id, false); ?>();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/components/forms/attachments-form.blade.php ENDPATH**/ ?>