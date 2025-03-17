<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_security_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_security_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Allow users to share their social media accounts in their profiles --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_allow_users_share_social_account_in_profile')"
                        model="is_social_media_accounts" />
                </div>

                {{-- Application Debug Mode --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('dashboard.t_enable_app_debug_mode')"
                        model="debug" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    