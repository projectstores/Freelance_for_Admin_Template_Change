<div class="messenger-sendCard" x-data="window.ieFgUjXUHsNGdOd" x-init="initialize">

    
    <?php if(settings('live_chat')->enable_emojis): ?>
        <div id="emojis-box-container" style="display: none"></div>
    <?php endif; ?>

    
    <form id="message-form" method="POST" action="<?php echo e(route('send.message'), false); ?>" enctype="multipart/form-data" class="items-center">

        <?php echo csrf_field(); ?>

        
        <?php if(settings('live_chat')->enable_emojis): ?>
            <div id="emojis-box-trigger">
                <svg class="emoji-box-trigger-event action-svg w-5 h-5 !text-slate-400 hover:!text-slate-600 dark:!text-slate-200 dark:hover:!text-white focus:outline-none" data-tooltip-target="chat-tooltip-btn-insert-emoji" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
            </div>
            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'chat-tooltip-btn-insert-emoji','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_insert_emoji'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
        <?php endif; ?>

        
        <?php if(settings('live_chat')->enable_attachments): ?>
            <label id="attachment-file-btn">
                <svg class="action-svg w-5 h-5 !text-slate-400 hover:!text-slate-600 dark:!text-slate-200 dark:hover:!text-white focus:outline-none" data-tooltip-target="chat-tooltip-btn-insert-file" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                <input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".<?php echo e(implode(', .',config('chatify.attachments.allowed_images')), false); ?>, .<?php echo e(implode(', .',config('chatify.attachments.allowed_files')), false); ?>" />
            </label>
            <?php if (isset($component)) { $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265 = $component; } ?>
<?php $component = App\View\Components\Forms\Tooltip::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.tooltip'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Tooltip::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => 'chat-tooltip-btn-insert-file','text' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('messages.t_attach_a_file'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265)): ?>
<?php $component = $__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265; ?>
<?php unset($__componentOriginalf78ffbe4a2783cbb9a46d3509ee95265); ?>
<?php endif; ?>
        <?php endif; ?>

        
        <div class="w-full px-3 flex items-center justify-center">
            <textarea x-model="message" id="live-chat-message-textarea" readonly='readonly' name="message" class="m-send app-scroll dark:placeholder:text-zinc-400" placeholder="<?php echo app('translator')->get('messages.t_type_ur_message_here'); ?>"></textarea>
        </div>

        
        <button disabled='disabled' class="focus:outline-none">
            <svg class="action-svg !h-6 !w-6 !text-primary-600 focus:outline-none rtl:-rotate-90 rtl:active:!-rotate-90" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path></g></svg>
        </button>

    </form>

</div>

<script>
    function ieFgUjXUHsNGdOd() {
        return {

            message     : null,

            // Initialize emojis box
            <?php if(settings('live_chat')->enable_emojis): ?>
            emojis() {
                
                // Access this
                const _this           = this;

                // Get emoji box container
                const emoji_container = $("#emojis-box-container");

                // Set options
                const options = { 
                    set            : 'twitter',
                    theme          : "<?php echo e(current_theme(), false); ?>",
                    dynamicWidth   : true,
                    previewPosition: 'none',
                    i18n           : {
                        "rtl"                : <?php echo e(config()->get('direction') === 'rtl' ? 1 : 0, false); ?>,
                        "search"             : "<?php echo e(__('messages.t_search'), false); ?>",
                        "search_no_results_1": "<?php echo e(__('messages.t_oops'), false); ?>",
                        "search_no_results_2": "<?php echo e(__('messages.t_no_results_found'), false); ?>",
                        "pick"               : "<?php echo e(__('messages.t_pick_an_emoji'), false); ?>",
                        "add_custom"         : "Add custom emoji",
                        "categories"         : {
                            "activity": "<?php echo e(__('messages.t_emojis_activity'), false); ?>",
                            "custom"  : "<?php echo e(__('messages.t_emojis_custom'), false); ?>",
                            "flags"   : "<?php echo e(__('messages.t_emojis_flags'), false); ?>",
                            "foods"   : "<?php echo e(__('messages.t_emojis_food_drink'), false); ?>",
                            "frequent": "<?php echo e(__('messages.t_emojis_recently_used'), false); ?>",
                            "nature"  : "<?php echo e(__('messages.t_emojis_animals_nature'), false); ?>",
                            "objects" : "<?php echo e(__('messages.t_emojis_objects'), false); ?>",
                            "people"  : "<?php echo e(__('messages.t_emojis_smileys'), false); ?>",
                            "places"  : "<?php echo e(__('messages.t_emojis_travel'), false); ?>",
                            "search"  : "<?php echo e(__('messages.t_search_results'), false); ?>",
                            "symbols" : "<?php echo e(__('messages.t_emojis_symbols'), false); ?>"
                        },
                        "skins": {
                            "choose": "<?php echo e(__('messages.t_choose_default_skin_tone'), false); ?>",
                            "1"     : "<?php echo e(__('messages.t_skin_default'), false); ?>",
                            "2"     : "<?php echo e(__('messages.t_skin_light'), false); ?>",
                            "3"     : "<?php echo e(__('messages.t_skin_medium_light'), false); ?>",
                            "4"     : "<?php echo e(__('messages.t_skin_medium'), false); ?>",
                            "5"     : "<?php echo e(__('messages.t_skin_medium_dark'), false); ?>",
                            "6"     : "<?php echo e(__('messages.t_skin_dark'), false); ?>"
                        }
                    },
                    exceptEmojis: [
                        'relaxed',
                        'smiling_face_with_tear',
                        'face_with_open_eyes_and_hand_over_mouth',
                        'face_with_peeking_eye',
                        'saluting_face',
                        'dotted_line_face',
                        'face_in_clouds',
                        'face_exhaling',
                        'face_with_spiral_eyes',
                        'disguised_face',
                        'face_with_diagonal_mouth',
                        'face_holding_back_tears',
                        'rightwards_hand',
                        'leftwards_hand',
                        'palm_down_hand',
                        'palm_up_hand',
                        'pinched_fingers',
                        'hand_with_index_finger_and_thumb_crossed',
                        'index_pointing_at_the_viewer',
                        'heart_hands',
                        'anatomical_heart',
                        'lungs',
                        'biting_lip',
                        'man_with_beard',
                        'woman_with_beard',
                        'red_haired_person',
                        'curly_haired_person',
                        'white_haired_person',
                        'bald_person',
                        'health_worker',
                        'student',
                        'teacher',
                        'judge',
                        'farmer',
                        'cook',
                        'mechanic',
                        'factory_worker',
                        'office_worker',
                        'scientist',
                        'technologist',
                        'singer',
                        'artist',
                        'pilot',
                        'astronaut',
                        'firefighter',
                        'ninja',
                        'person_with_crown',
                        'man_in_tuxedo',
                        'woman_in_tuxedo',
                        'man_with_veil',
                        'woman_with_veil',
                        'pregnant_man',
                        'pregnant_person',
                        'woman_feeding_baby',
                        'man_feeding_baby',
                        'person_feeding_baby',
                        'mx_claus',
                        'troll',
                        'person_with_probing_cane',
                        'person_in_motorized_wheelchair',
                        'person_in_manual_wheelchair',
                        'people_hugging',
                        'heart_on_fire',
                        'mending_heart',
                        'black_cat',
                        'bison',
                        'mammoth',
                        'beaver',
                        'polar_bear',
                        'dodo',
                        'feather',
                        'seal',
                        'coral',
                        'beetle',
                        'cockroach',
                        'fly',
                        'worm',
                        'lotus',
                        'potted_plant',
                        'empty_nest',
                        'nest_with_eggs',
                        'blueberries',
                        'olive',
                        'bell_pepper',
                        'beans',
                        'flatbread',
                        'tamale',
                        'fondue',
                        'teapot',
                        'pouring_liquid',
                        'bubble_tea',
                        'jar',
                        'magic_wand',
                        'hamsa',
                        'pinata',
                        'mirror_ball',
                        'nesting_dolls',
                        'sewing_needle',
                        'knot',
                        'rock',
                        'wood',
                        'hut',
                        'playground_slide',
                        'pickup_truck',
                        'roller_skate',
                        'wheel',
                        'ring_buoy',
                        'thong_sandal',
                        'military_helmet',
                        'accordion',
                        'long_drum',
                        'low_battery',
                        'coin',
                        'boomerang',
                        'carpentry_saw',
                        'screwdriver',
                        'hook',
                        'ladder',
                        'crutch',
                        'x-ray',
                        'elevator',
                        'mirror',
                        'window',
                        'plunger',
                        'mouse_trap',
                        'bucket',
                        'bubbles',
                        'toothbrush',
                        'headstone',
                        'placard',
                        'identification_card',
                        'heavy_equals_sign',
                        'transgender_flag'
                    ],
                    onClickOutside(e) {

                        // Get target
                        const target = e.target || e.srcElement;

                        // Check if clicked on emoji button
                        if (target.classList.contains('emoji-box-trigger-event')) {

                            // Toggle hidden class
                            emoji_container.toggle();
                            
                        } else {

                            // Hide the box
                            emoji_container.hide();

                        }
                        
                    },
                    onEmojiSelect(selection) {
                        
                        // Insert the emoji
                        _this.message = _this.message + " " + selection.native;

                        // Now focus on the textarea
                        document.getElementById('live-chat-message-textarea').focus();

                    }
                };

                // Set new picker
                const picker = new EmojiMart.Picker(options);

                // Insert html code
                document.getElementById('emojis-box-container').appendChild(picker)

            },
            <?php endif; ?>

            // Initialize
            initialize() {

                <?php if(settings('live_chat')->enable_emojis): ?>

                // Initialize emojis
                this.emojis();

                // Listen to open/close emoji box
                document.getElementById('emojis-box-trigger').addEventListener('click', function() { 
                    $('#emojis-box-container').toggleClass('hidden');
                }, false);

                <?php endif; ?>

                // Disable Enter button in message box
                $("#live-chat-message-textarea").keydown(function(e){
                    if (e.keyCode == 13 && !e.shiftKey) {
                        e.preventDefault();
                        return false;
                    }
                });

            }

        }
    }
    window.ieFgUjXUHsNGdOd = ieFgUjXUHsNGdOd();
</script><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/vendor/Chatify/layouts/sendForm.blade.php ENDPATH**/ ?>