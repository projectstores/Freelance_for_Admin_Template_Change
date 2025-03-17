<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_publish_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_publish_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Auto approve gigs --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_gigs')"
                        model="auto_approve_gigs" />
                </div>

                {{-- Auto approve portfolio --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_user_portfolio')"
                        model="auto_approve_portfolio" />
                </div>

                {{-- Enable gig video --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_videos_for_gigs')"
                        model="is_video_enabled" />
                </div>

                {{-- Enable documents --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_allow_documents_in_gigs')"
                        model="is_documents_enabled" />
                </div>

                {{-- Max tags per gig --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_max_tags')"
                        :placeholder="__('messages.t_enter_max_tags')"
                        model="max_tags"
                        icon="tag" />
                </div>

                {{-- Max docs --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_documents')"
                        :placeholder="__('messages.t_enter_max_docs_allowed')"
                        model="max_documents"
                        icon="file-pdf-box" />
                </div>

                {{-- MAx doc size --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_document_size')"
                        :placeholder="__('messages.t_enter_max_size_per_document_mb')"
                        model="max_document_size"
                        icon="sd" />
                </div>

                {{-- max gig images --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_images_per_gig')"
                        :placeholder="__('messages.t_enter_max_images_per_gig')"
                        model="max_images"
                        icon="image" />
                </div>

                {{-- max size per image --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_size_per_image')"
                        :placeholder="__('messages.t_enter_max_size_per_image')"
                        model="max_image_size"
                        icon="database" />
                </div>

                {{-- Divider --}}
                <div class="col-span-12">
                    <div class="my-8 h-0.5 border-t-0 bg-neutral-100 opacity-100 dark:opacity-50"></div>
                </div>

                {{-- Enable custom offers --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('dashboard.t_enable_custom_offers')"
                        model="enable_custom_offers" />
                </div>

                {{-- Custom offers require admin approval --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('dashboard.t_custom_offers_require_admin_approval')"
                        model="custom_offers_require_approval" />
                </div>

                {{-- Commission type --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('dashboard.t_commission_from_custom_offers_type')"
                            :placeholder="__('dashboard.t_commission_from_custom_offers_type')"
                            model="custom_offers_commission_type"
                            :options="[ ['text' => __('messages.t_fixed_amount'), 'value' => 'fixed'], ['text' => __('messages.t_percentage_amount'), 'value' => 'percentage'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Commission value from freelancer --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input 
                        :label="__('dashboard.t_commission_value_from_freelancer')"
                        :placeholder="__('dashboard.t_enter_commission_value')"
                        model="custom_offers_commission_value_freelancer"
                        svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd"></path></svg>' />
                </div>

                {{-- Commission value from buyer --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input 
                        :label="__('dashboard.t_commission_value_from_buyer')"
                        :placeholder="__('dashboard.t_enter_commission_value')"
                        model="custom_offers_commission_value_buyer"
                        svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 2a2 2 0 00-2 2v14l3.5-2 3.5 2 3.5-2 3.5 2V4a2 2 0 00-2-2H5zm2.5 3a1.5 1.5 0 100 3 1.5 1.5 0 000-3zm6.207.293a1 1 0 00-1.414 0l-6 6a1 1 0 101.414 1.414l6-6a1 1 0 000-1.414zM12.5 10a1.5 1.5 0 100 3 1.5 1.5 0 000-3z" clip-rule="evenodd"></path></svg>' />
                </div>

                {{-- Custom offer expiry time --}}
                <div class="col-span-12">
                    <x-forms.text-input 
                        :label="__('dashboard.t_custom_offers_expiration_time_days')"
                        :placeholder="__('dashboard.t_enter_days_number')"
                        model="custom_offers_expiry_days"
                        svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M712 304c0 4.4-3.6 8-8 8h-56c-4.4 0-8-3.6-8-8v-48H384v48c0 4.4-3.6 8-8 8h-56c-4.4 0-8-3.6-8-8v-48H184v136h656V256H712v48z"></path><path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zm0-448H184V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136z"></path></svg>' />
                </div>

                {{-- Enable attachements --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('dashboard.t_custom_offers_enable_attachments')"
                        model="custom_offer_enable_attachments" />
                </div>

                {{-- Max size --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input 
                        :label="__('dashboard.t_max_size_mb')"
                        :placeholder="__('dashboard.t_custom_offers_attachment_max_size')"
                        model="custom_offer_attachment_max_size"
                        svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>' />
                </div>

                {{-- Max files --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input 
                        :label="__('dashboard.t_max_files')"
                        :placeholder="__('dashboard.t_enter_number_of_max_files_allowed')"
                        model="custom_offer_attachment_max_files"
                        svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M22 7.999a1 1 0 0 0-.516-.874l-9.022-5a1.003 1.003 0 0 0-.968 0l-8.978 4.96a1 1 0 0 0-.003 1.748l9.022 5.04a.995.995 0 0 0 .973.001l8.978-5A1 1 0 0 0 22 7.999zm-9.977 3.855L5.06 7.965l6.917-3.822 6.964 3.859-6.918 3.852z"></path><path d="M20.515 11.126 12 15.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"></path><path d="M20.515 15.126 12 19.856l-8.515-4.73-.971 1.748 9 5a1 1 0 0 0 .971 0l9-5-.97-1.748z"></path></svg>' />
                </div>

                {{-- Max files --}}
                <div class="col-span-12">
                    <x-forms.textarea :rows="8"
                        :label="__('dashboard.t_allowed_extensions')"
                        :placeholder="__('dashboard.t_separate_each_ext_with_comma')"
                        model="custom_offer_attachments_allowed_extensions"
                        svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path fill="none" d="M0 0h24v24H0z"></path><path d="M20.5 11H19V7c0-1.1-.9-2-2-2h-4V3.5a2.5 2.5 0 00-5 0V5H4c-1.1 0-1.99.9-1.99 2v3.8H3.5c1.49 0 2.7 1.21 2.7 2.7s-1.21 2.7-2.7 2.7H2V20c0 1.1.9 2 2 2h3.8v-1.5c0-1.49 1.21-2.7 2.7-2.7 1.49 0 2.7 1.21 2.7 2.7V22H17c1.1 0 2-.9 2-2v-4h1.5a2.5 2.5 0 000-5z"></path></svg>' />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    