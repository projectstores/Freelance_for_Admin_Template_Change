<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_recaptcha') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_update_recaptcha_settings') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable reCaptcha --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_recaptcha')"
                        model="is_enabled" />
                </div>

                {{-- site key --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_site_key')"
                        :placeholder="__('messages.t_enter_site_key')"
                        model="site_key"
                        icon="key-variant" />
                </div>

                {{-- Site secret --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_secret_key')"
                        :placeholder="__('messages.t_enter_secret_key')"
                        model="secret_key"
                        icon="lock" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    