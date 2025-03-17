<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_hero_section_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_hero_section_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable background image --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_hero_section_background_img')"
                        model="enable_bg_img" />
                </div>
                
                {{-- Hero section tagline --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_hero_tagline')"
                        :placeholder="__('messages.t_enter_hero_tagline')"
                        model="tagline"
                        icon="format-title" />
                </div>

                {{-- Large screen background image --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_large_screen_background_img')" model="bg_large" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('hero')->background_large)
                        <div class="mt-3">
                            <img src="{{ src( settings('hero')->background_large ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Medium screen background image --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_medium_screen_background_img')" model="bg_medium" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('hero')->background_medium)
                        <div class="mt-3">
                            <img src="{{ src( settings('hero')->background_medium ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Small screen background image --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_small_screen_background_img')" model="bg_small" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('hero')->background_small)
                        <div class="mt-3">
                            <img src="{{ src( settings('hero')->background_small ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Hero section default background color --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_hero_section_default_bg_color')"
                        :placeholder="__('messages.t_enter_color_hex_color_example')"
                        model="bg_color"
                        icon="format-title" />
                </div>

                {{-- Hero section large screen height --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_large_screen_height')"
                        :placeholder="__('messages.t_enter_value_in_pixel')"
                        model="bg_large_height"
                        icon="align-horizontal-distribute" />
                </div>

                {{-- Hero section small screen height --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_small_screen_height')"
                        :placeholder="__('messages.t_enter_value_in_pixel')"
                        model="bg_small_height"
                        icon="align-horizontal-distribute" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    