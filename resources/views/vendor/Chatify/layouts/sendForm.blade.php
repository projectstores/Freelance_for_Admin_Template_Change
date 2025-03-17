<div class="messenger-sendCard" x-data="window.ieFgUjXUHsNGdOd" x-init="initialize">

    {{-- Emojis box --}}
    @if (settings('live_chat')->enable_emojis)
        <div id="emojis-box-container" style="display: none"></div>
    @endif

    {{-- Send message form --}}
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data" class="items-center">

        @csrf

        {{-- Emoji container --}}
        @if (settings('live_chat')->enable_emojis)
            <div id="emojis-box-trigger">
                <svg class="emoji-box-trigger-event action-svg w-5 h-5 !text-slate-400 hover:!text-slate-600 dark:!text-slate-200 dark:hover:!text-white focus:outline-none" data-tooltip-target="chat-tooltip-btn-insert-emoji" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
            </div>
            <x-forms.tooltip id="chat-tooltip-btn-insert-emoji" :text="__('messages.t_insert_emoji')" />
        @endif

        {{-- Attach a file --}}
        @if (settings('live_chat')->enable_attachments)
            <label id="attachment-file-btn">
                <svg class="action-svg w-5 h-5 !text-slate-400 hover:!text-slate-600 dark:!text-slate-200 dark:hover:!text-white focus:outline-none" data-tooltip-target="chat-tooltip-btn-insert-file" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                <input disabled='disabled' type="file" class="upload-attachment" name="file" accept=".{{implode(', .',config('chatify.attachments.allowed_images'))}}, .{{implode(', .',config('chatify.attachments.allowed_files'))}}" />
            </label>
            <x-forms.tooltip id="chat-tooltip-btn-insert-file" :text="__('messages.t_attach_a_file')" />
        @endif

        {{-- Message content --}}
        <div class="w-full px-3 flex items-center justify-center">
            <textarea x-model="message" id="live-chat-message-textarea" readonly='readonly' name="message" class="m-send app-scroll dark:placeholder:text-zinc-400" placeholder="@lang('messages.t_type_ur_message_here')"></textarea>
        </div>

        {{-- Send --}}
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
            @if (settings('live_chat')->enable_emojis)
            emojis() {
                
                // Access this
                const _this           = this;

                // Get emoji box container
                const emoji_container = $("#emojis-box-container");

                // Set options
                const options = { 
                    set            : 'twitter',
                    theme          : "{{ current_theme() }}",
                    dynamicWidth   : true,
                    previewPosition: 'none',
                    i18n           : {
                        "rtl"                : {{ config()->get('direction') === 'rtl' ? 1 : 0 }},
                        "search"             : "{{ __('messages.t_search') }}",
                        "search_no_results_1": "{{ __('messages.t_oops') }}",
                        "search_no_results_2": "{{ __('messages.t_no_results_found') }}",
                        "pick"               : "{{ __('messages.t_pick_an_emoji') }}",
                        "add_custom"         : "Add custom emoji",
                        "categories"         : {
                            "activity": "{{ __('messages.t_emojis_activity') }}",
                            "custom"  : "{{ __('messages.t_emojis_custom') }}",
                            "flags"   : "{{ __('messages.t_emojis_flags') }}",
                            "foods"   : "{{ __('messages.t_emojis_food_drink') }}",
                            "frequent": "{{ __('messages.t_emojis_recently_used') }}",
                            "nature"  : "{{ __('messages.t_emojis_animals_nature') }}",
                            "objects" : "{{ __('messages.t_emojis_objects') }}",
                            "people"  : "{{ __('messages.t_emojis_smileys') }}",
                            "places"  : "{{ __('messages.t_emojis_travel') }}",
                            "search"  : "{{ __('messages.t_search_results') }}",
                            "symbols" : "{{ __('messages.t_emojis_symbols') }}"
                        },
                        "skins": {
                            "choose": "{{ __('messages.t_choose_default_skin_tone') }}",
                            "1"     : "{{ __('messages.t_skin_default') }}",
                            "2"     : "{{ __('messages.t_skin_light') }}",
                            "3"     : "{{ __('messages.t_skin_medium_light') }}",
                            "4"     : "{{ __('messages.t_skin_medium') }}",
                            "5"     : "{{ __('messages.t_skin_medium_dark') }}",
                            "6"     : "{{ __('messages.t_skin_dark') }}"
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
            @endif

            // Initialize
            initialize() {

                @if (settings('live_chat')->enable_emojis)

                // Initialize emojis
                this.emojis();

                // Listen to open/close emoji box
                document.getElementById('emojis-box-trigger').addEventListener('click', function() { 
                    $('#emojis-box-container').toggleClass('hidden');
                }, false);

                @endif

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
</script>