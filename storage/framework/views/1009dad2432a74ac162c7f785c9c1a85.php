<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps(['id', 'extensions', 'accept', 'size', 'max', 'model']) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps(['id', 'extensions', 'accept', 'size', 'max', 'model']); ?>
<?php foreach (array_filter((['id', 'extensions', 'accept', 'size', 'max', 'model']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<div x-data="window.uploader_<?php echo e($id, false); ?>" x-init="initialize" x-cloak>
    <input type="file" name="<?php echo e($id, false); ?>" id="<?php echo e($id, false); ?>" accept="<?php echo e($accept, false); ?>" multiple>
</div>

<?php if (! $__env->hasRenderedOnce('96e79ddd-c217-48a6-80dd-4fa3e8e59474')): $__env->markAsRenderedOnce('96e79ddd-c217-48a6-80dd-4fa3e8e59474');
$__env->startPush('scripts'); ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    
    <script defer src="<?php echo e(url('public/js/plugins/uploader/js/jquery.fileuploader.min.js'), false); ?>" type="text/javascript"></script>
<?php $__env->stopPush(); endif; ?>

<?php if (! $__env->hasRenderedOnce('f6822660-ff4d-433d-86e2-89ac4d149763')): $__env->markAsRenderedOnce('f6822660-ff4d-433d-86e2-89ac4d149763');
$__env->startPush('styles'); ?>
    
    <link href="<?php echo e(url('public/js/plugins/uploader/font/font-fileuploader.css'), false); ?>" rel="stylesheet">

    
    <link href="<?php echo e(url('public/js/plugins/uploader/css/jquery.fileuploader.min.css'), false); ?>" media="all" rel="stylesheet">
    <link href="<?php echo e(url('public/js/plugins/uploader/css/jquery.fileuploader-theme-thumbnails.css'), false); ?>" media="all" rel="stylesheet">
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
                            theme      : 'thumbnails',
                            enableApi  : true,
                            addMore    : true,
                            thumbnails : {
                                box: '<div class="fileuploader-items">' +
                                        '<ul class="fileuploader-items-list">' +
                                            '<li class="fileuploader-thumbnails-input"><div class="fileuploader-thumbnails-input-inner"><i>+</i></div></li>' +
                                        '</ul>' +
                                    '</div>',
                                item: '<li class="fileuploader-item">' +
                                        '<div class="fileuploader-item-inner">' +
                                            '<div class="type-holder">${extension}</div>' +
                                            '<div class="actions-holder">' +
                                                '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                            '</div>' +
                                            '<div class="thumbnail-holder">' +
                                                '${image}' +
                                                '<span class="fileuploader-action-popup"></span>' +
                                            '</div>' +
                                            '<div class="content-holder"><h5>${name}</h5><span>${size2}</span></div>' +
                                            '<div class="progress-holder">${progressBar}</div>' +
                                        '</div>' +
                                    '</li>',
                                item2: '<li class="fileuploader-item">' +
                                        '<div class="fileuploader-item-inner">' +
                                            '<div class="type-holder">${extension}</div>' +
                                            '<div class="actions-holder">' +
                                                '<a href="${file}" class="fileuploader-action fileuploader-action-download" title="${captions.download}" download><i class="fileuploader-icon-download"></i></a>' +
                                                '<button type="button" class="fileuploader-action fileuploader-action-remove" title="${captions.remove}"><i class="fileuploader-icon-remove"></i></button>' +
                                            '</div>' +
                                            '<div class="thumbnail-holder">' +
                                                '${image}' +
                                                '<span class="fileuploader-action-popup"></span>' +
                                            '</div>' +
                                            '<div class="content-holder"><h5 title="${name}">${name}</h5><span>${size2}</span></div>' +
                                            '<div class="progress-holder">${progressBar}</div>' +
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
                                var plusInput = listEl.find('.fileuploader-thumbnails-input'),
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

                            }

                        });
                    });
                }

            }
        }
        window.uploader_<?php echo e($id, false); ?> = uploader_<?php echo e($id, false); ?>();
    </script>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/components/forms/uploader.blade.php ENDPATH**/ ?>