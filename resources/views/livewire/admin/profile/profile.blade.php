<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_account_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_admin_account_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Username --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_username')"
                        :placeholder="__('messages.t_enter_username')"
                        model="username"
                        icon="account" />
                </div>

                {{-- Email --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_email_address')"
                        :placeholder="__('messages.t_enter_email_address')"
                        model="email"
                        type="email"
                        icon="at" />
                </div>

                {{-- Password --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_current_password')"
                        :placeholder="__('messages.t_enter_your_current_password')"
                        model="password"
                        type="password"
                        icon="lock" />
                </div>

                {{-- New password --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_new_password')"
                        :placeholder="__('messages.t_enter_new_password')"
                        model="new_password"
                        type="password"
                        icon="key" />
                </div>

                {{-- Password confirmation --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_password_confirmation')"
                        :placeholder="__('messages.t_enter_password_confirmation')"
                        model="password_confirm"
                        type="password"
                        icon="key" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    