<div class="w-full grid grid-cols-12 md:gap-x-6 gap-y-6">

    {{-- Form --}}
    <div class="col-span-12 lg:col-span-8 bg-white shadow rounded-lg">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_smtp_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_smtp_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Smtp host --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_smtp_host')"
                        :placeholder="__('messages.t_enter_smtp_host')"
                        model="host"
                        icon="database" />
                </div>

                {{-- Smtp port --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_smtp_port')"
                        :placeholder="__('messages.t_enter_smtp_port')"
                        model="port"
                        icon="web" />
                </div>

                {{-- Smtp encryption --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_smtp_encryption')"
                            :placeholder="__('messages.t_choose_smtp_encryption')"
                            model="encryption"
                            :options="[ 
                                ['text' => __('messages.t_ssl'), 'value' => 'ssl'], 
                                ['text' => __('messages.t_tls'), 'value' => 'tls'] 
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Username --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_username')"
                        :placeholder="__('messages.t_enter_username')"
                        model="username"
                        icon="account" />
                </div>

                {{-- Password --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_password')"
                        :placeholder="__('messages.t_enter_password')"
                        model="password"
                        type="password"
                        icon="lock" />
                </div>

                {{-- From address --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_smtp_from_address')"
                        :placeholder="__('messages.t_enter_email_address')"
                        model="from_address"
                        type="email"
                        icon="at" />
                </div>

                {{-- From name --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_smtp_from_name')"
                        :placeholder="__('messages.t_enter_your_company_website_name')"
                        model="from_name"
                        icon="domain" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

    {{-- Send test email --}}
    <div class="col-span-12 lg:col-span-4 bg-white shadow rounded-lg h-fit">
        <div class="py-10 px-7">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_test_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_test_settings_smtp_subtitle') }}</p>
            </div>

            {{-- Email address --}}
            <div class="w-full">
                <x-forms.text-input
                    :label="__('messages.t_email_address')"
                    :placeholder="__('messages.t_enter_email_address')"
                    model="email"
                    type="email"
                    icon="at" />
            </div>

        </div>
        <div class="py-4 px-4 flex justify-end sm:px-7 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="send" text="{{ __('messages.t_send') }}" :block="true"  />
        </div> 
    </div>

</div>    