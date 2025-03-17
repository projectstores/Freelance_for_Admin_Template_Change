<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_currency_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_currency_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_currency_name')"
                        :placeholder="__('messages.t_enter_currency_name')"
                        model="name"
                        icon="format-title" />
                </div>

                {{-- Code --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_currency_code')"
                            :placeholder="__('messages.t_choose_currency_code')"
                            model="code"
                            :options="$currencies"
                            :isDefer="true"
                            :isAssociative="true"
                            :componentId="$this->id"
                            value="code"
                            text="code" />
                    </div>
                </div>

                {{-- Exchange rate --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_exchange_rate')"
                        :placeholder="__('messages.t_enter_exchange_rate_to_usd')"
                        model="exchange_rate"
                        icon="currency-usd" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    