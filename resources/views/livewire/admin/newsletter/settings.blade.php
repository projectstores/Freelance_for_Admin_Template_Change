<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_newsletter_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_newsletter_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- PayPal --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_newsletter_system')"
                        model="is_enabled" />
                </div>

            </div>
            
            {{-- Image --}}
            <div class="col-span-12">
                <x-forms.file-input :label="__('messages.t_newsletter_image')" model="image_id" accept="image/jpg,image/jpeg,image/png"  />
                {{-- Preview image --}}
                <div class="mt-3">
                    <img src="{{ src ( settings('newsletter')->image ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                </div>
            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>  


    </div>

</div>    