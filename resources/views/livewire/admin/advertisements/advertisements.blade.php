<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_advertisements') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Header code --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_header_code')"
                        :placeholder="__('messages.t_enter_ads_header_code')"
                        model="header_code"
                        icon="xml"
                        :rows="12" />
                </div>

                {{-- Service 360 ad --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_service_360_ad')"
                        :placeholder="__('messages.t_enter_ad_code')"
                        model="ad_service_360"
                        icon="advertisements"
                        :rows="12" />
                </div>

                {{-- Service 720 ad --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_service_720_ad')"
                        :placeholder="__('messages.t_enter_ad_code')"
                        model="ad_service_720"
                        icon="advertisements"
                        :rows="12" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    