<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_paytabs_payment_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_paytabs_payment_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_status')"
                            :placeholder="__('messages.t_enable_this_payment_gateway')"
                            model="is_enabled"
                            :options="[
                                ['text' => __('messages.t_enabled'), 'value' => 1],
                                ['text' => __('messages.t_disabled'), 'value' => 0],
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_payment_method_name')"
                        :placeholder="__('messages.t_enter_payment_method_name')"
                        model="name"
                        icon="form-textbox" />
                </div>

                {{-- Currency --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_default_currency')"
                            :placeholder="__('messages.t_choose_currency_code')"
                            model="currency"
                            :options="$currencies"
                            :isDefer="true"
                            :isAssociative="true"
                            :componentId="$this->id"
                            value="code"
                            text="code" />
                    </div>
                </div>

                {{-- Region --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_region')"
                            :placeholder="__('messages.t_choose_region')"
                            model="region"
                            :options="[
                                ['text' => 'ARE', 'value' => 'ARE'],
                                ['text' => 'EGY', 'value' => 'EGY'],
                                ['text' => 'SAU', 'value' => 'SAU'],
                                ['text' => 'OMN', 'value' => 'OMN'],
                                ['text' => 'JOR', 'value' => 'JOR'],
                                ['text' => 'GLOBAL', 'value' => 'GLOBAL']
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
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

                {{-- Deposit fee --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_deposit_fee')"
                        :placeholder="__('messages.t_enter_a_percentage_value')"
                        model="deposit_fee"
                        icon="percent" />
                </div>

                {{-- Logo --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_payment_gateway_logo')" model="logo" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('paytabs')->logo)
                        <div class="mt-3">
                            <img src="{{ src( settings('paytabs')->logo ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                {{-- Profile id --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_profile_id')"
                        :placeholder="__('messages.t_enter_profile_id')"
                        model="profile_id"
                        icon="key" />
                </div>

                {{-- Server key --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_server_key')"
                        :placeholder="__('messages.t_enter_server_key')"
                        model="server_key"
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