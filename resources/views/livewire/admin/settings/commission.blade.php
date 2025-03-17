<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_commission_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_commission_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable taxes --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_taxes')"
                        model="enable_taxes" />
                </div>

                {{-- taxes type --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_tax_type')"
                            :placeholder="__('messages.t_choose_tax_type')"
                            model="tax_type"
                            :options="[ ['text' => __('messages.t_fixed_amount'), 'value' => 'fixed'], ['text' => __('messages.t_percentage_amount'), 'value' => 'percentage'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Tax value --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_tax_value')"
                        :placeholder="__('messages.t_enter_tax_value')"
                        model="tax_value"
                        icon="ticket-percent" />
                </div>

                {{-- Commission --}}
                <div class="col-span-12 lg:col-span-4">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_commission')"
                            :placeholder="__('messages.t_take_commission_from')"
                            model="commission_from"
                            :options="[ ['text' => __('messages.t_orders'), 'value' => 'orders'], ['text' => __('messages.t_withdrawal'), 'value' => 'withdrawals'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Commission type --}}
                <div class="col-span-12 lg:col-span-4">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_commission_type')"
                            :placeholder="__('messages.t_choose_commission_type')"
                            model="commission_type"
                            :options="[ ['text' => __('messages.t_fixed_amount'), 'value' => 'fixed'], ['text' => __('messages.t_percentage_amount'), 'value' => 'percentage'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Commission value --}}
                <div class="col-span-12 lg:col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_commission_value')"
                        :placeholder="__('messages.t_enter_commission_value')"
                        model="commission_value"
                        icon="cash-fast" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    