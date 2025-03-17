<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_country') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Country name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_country_name')"
                        :placeholder="__('messages.t_enter_country_name')"
                        model="name"
                        icon="flag-variant" />
                </div>

                {{-- Country code --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_country_code')"
                        :placeholder="__('messages.t_enter_country_code')"
                        model="code"
                        icon="flag" />
                </div>

                {{-- Country status --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_country_status_active')"
                        model="is_active" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
        </div>                    

    </div>

</div>    