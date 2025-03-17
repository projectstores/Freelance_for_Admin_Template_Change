<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_media_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_media_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Required files max size --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_required_files_max_size')"
                        :placeholder="__('messages.t_enter_required_files_max_size')"
                        model="requirements_file_max_size"
                        icon="database" />
                </div>

                {{-- Required files allowed extensions --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_required_files_allowed_exts')"
                        :placeholder="__('messages.t_enter_required_files_allowed_exts')"
                        model="requirements_file_allowed_extensions"
                        icon="nas" />
                </div>

                {{-- Delivered work max size --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_delivered_work_max_size')"
                        :placeholder="__('messages.t_enter_delivered_work_max_size')"
                        model="delivered_work_max_size"
                        icon="sd" />
                </div>

                {{-- Portfolio max images --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_portfolio_max_images')"
                        :placeholder="__('messages.t_enter_max_img_for_portfolios')"
                        model="portfolio_max_images"
                        icon="image" />
                </div>

                {{-- Portfolio max images --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_portfolio_image_max_size')"
                        :placeholder="__('messages.t_enter_portfolio_max_size_mb')"
                        model="portfolio_max_size"
                        icon="server" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    