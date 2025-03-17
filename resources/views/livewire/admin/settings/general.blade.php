<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_general_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_general_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Title --}}
                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_site_title')"
                        :placeholder="__('messages.t_enter_site_title')"
                        model="title"
                        icon="format-title" />
                </div>

                {{-- Title separator --}}
                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_site_title_separator')"
                        :placeholder="__('messages.t_enter_site_title_separator')"
                        model="separator"
                        icon="align-horizontal-distribute" />
                </div>

                {{-- Site subtitle --}}
                <div class="col-span-12 md:col-span-6 lg:col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_site_subtitle')"
                        :placeholder="__('messages.t_enter_site_subtitle')"
                        model="subtitle"
                        icon="alphabetical" />
                </div>

                {{-- Site Logo --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.file-input :label="__('messages.t_site_logo')" model="logo" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('general')->logo)
                        <div class="mt-3">
                            <img src="{{ src( settings('general')->logo ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Site Logo dark mode --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.file-input :label="__('messages.t_site_logo_dark_mode')" model="logo_dark" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('general')->logo_dark)
                        <div class="mt-3">
                            <img src="{{ src( settings('general')->logo_dark ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Site Favicon --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.file-input :label="__('messages.t_site_favicon')" model="favicon"  />
                    {{-- Preview image --}}
                    @if (settings('general')->favicon)
                        <div class="mt-3">
                            <img src="{{ src( settings('general')->favicon ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- top navbar announce text --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_top_navbar_announce_text')"
                        :placeholder="__('messages.t_enter_top_navbar_announce_text')"
                        model="announce_text"
                        icon="bullhorn-variant" />
                </div>

                {{-- top navbar announce link --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_top_navbar_announce_link')"
                        :placeholder="__('messages.t_enter_top_navbar_announce_link')"
                        model="announce_link"
                        icon="link-variant" />
                </div>

                {{-- Enable language switcher --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_language_switcher')"
                            :placeholder="__('messages.t_enable_language_switcher')"
                            model="is_language_switcher"
                            :options="[ ['text' => __('messages.t_enabled'), 'value' => 1], ['text' => __('messages.t_disabled'), 'value' => 0] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Default language --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_default_language')"
                            :placeholder="__('messages.t_choose_default_language')"
                            model="default_language"
                            :options="$languages"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="language_code"
                            text="name" />
                    </div>
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    