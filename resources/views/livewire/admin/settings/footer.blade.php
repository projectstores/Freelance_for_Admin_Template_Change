<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_footer_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_footer_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable language switcher --}}
                <div class="col-span-12">
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

                {{-- Terms page --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_terms_page')"
                            :placeholder="__('messages.t_choose_terms_page')"
                            model="page_terms"
                            :options="$pages"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="id"
                            text="title" />
                    </div>
                </div>

                {{-- Privacy policy page --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_privacy_policy_page')"
                            :placeholder="__('messages.t_choose_privacy_policy_page')"
                            model="page_policy"
                            :options="$pages"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="id"
                            text="title" />
                    </div>
                </div>

                {{-- Footer Logo --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_footer_logo')" model="logo" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('footer')->logo)
                        <div class="mt-3">
                            <img src="{{ src( settings('footer')->logo ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Copyrights --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_copyrights')"
                        :placeholder="__('messages.t_enter_copyrights_html_supported')"
                        model="copyrights"
                        :rows="6"
                        icon="copyright" />
                </div>

                {{-- Facebook page --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_facebook_page')"
                        :placeholder="__('messages.t_enter_facebook_page_link')"
                        model="social_facebook"
                        icon="facebook" />
                </div>

                {{-- Twitter page --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_twitter_page')"
                        :placeholder="__('messages.t_enter_twitter_page_link')"
                        model="social_twitter"
                        icon="twitter" />
                </div>

                {{-- Instagram page --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_instagram_page')"
                        :placeholder="__('messages.t_enter_instagram_page_link')"
                        model="social_instagram"
                        icon="instagram" />
                </div>

                {{-- Linkedin page --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_linkedin_page')"
                        :placeholder="__('messages.t_enter_linkedin_page_link')"
                        model="social_linkedin"
                        icon="linkedin" />
                </div>

                {{-- Pinterest page --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_pinterest_page')"
                        :placeholder="__('messages.t_enter_pinterest_page_link')"
                        model="social_pinterest"
                        icon="pinterest" />
                </div>

                {{-- Youtube page --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_youtube_page')"
                        :placeholder="__('messages.t_enter_youtube_page_link')"
                        model="social_youtube"
                        icon="youtube" />
                </div>

                {{-- Github page --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_github_page')"
                        :placeholder="__('messages.t_enter_github_page_link')"
                        model="social_github"
                        icon="github" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    