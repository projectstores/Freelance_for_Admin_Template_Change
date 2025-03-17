<div class="w-full bg-white shadow rounded-lg">

    {{-- Loading --}}
    <x-forms.loading />

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_seo_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_seo_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Description --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_description')"
                        :placeholder="__('messages.t_enter_description')"
                        model="description"
                        rows="8"
                        icon="google" />
                </div>

                {{-- Facebook app id --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_facebook_app_id')"
                        :placeholder="__('messages.t_enter_facebook_app_id')"
                        model="facebook_app_id"
                        icon="facebook" />
                </div>

                {{-- Facebook page id --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_facebook_page_id')"
                        :placeholder="__('messages.t_enter_facebook_page_id')"
                        model="facebook_page_id"
                        icon="facebook" />
                </div>

                {{-- Twitter username --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_twitter_username')"
                        :placeholder="__('messages.t_enter_twitter_username')"
                        model="twitter_username"
                        icon="twitter" />
                </div>

                {{-- Ogimage --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_social_media_ogimage')" model="ogimage"  />
                    {{-- Preview image --}}
                    @if (settings('seo')->ogimage)
                        <div class="mt-3">
                            <img src="{{ src( settings('seo')->ogimage ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Enable sitemap --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_sitemap')"
                        model="is_sitemap" />
                    
                    <div class="flex items-center space-x-4 rtl:space-x-reverse text-xs mt-2">
                        {{-- Generate sitemap --}}
                        @if (settings('seo')->is_sitemap)
                            <button wire:click="generateSitemap" type="button" class="text-gray-400 hover:text-black hover:underline">Generate sitemap</button>    
                        @endif
    
                        {{-- Sitemap link --}}
                        @if (\File::exists(base_path('sitemap.xml')))
                            <a href="{{ url('sitemap.xml') }}" target="_blank" class="text-gray-400 hover:text-black hover:underline">View sitemap</a>
                        @endif
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