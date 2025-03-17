<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_payment_gateways_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_payment_gateways_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- PayPal --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_paypal_gateway')"
                        model="is_paypal" />
                </div>

                {{-- Stripe --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_stripe_gateway')"
                        model="is_stripe" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    