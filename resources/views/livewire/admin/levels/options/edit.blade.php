<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_edit_level') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Title --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_title')"
                        :placeholder="__('messages.t_enter_title')"
                        model="title"
                        icon="format-title" />
                </div>

                {{-- Account type --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_account_type')"
                            :placeholder="__('messages.t_choose_account_type')"
                            model="account_type"
                            :options="[ 
                                ['text' => __('messages.t_seller'), 'value' => 'seller'],
                                ['text' => __('messages.t_buyer'), 'value' => 'buyer']
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Seller max sales --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_seller_maximum_sales')"
                        :placeholder="__('messages.t_enter_maximum_sales_for_seller')"
                        model="seller_max_sales"
                        icon="arrow-top-right" />
                </div>

                {{-- Seller min sales --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_seller_minimum_sales')"
                        :placeholder="__('messages.t_enter_minimum_sales_for_seller')"
                        model="seller_min_sales"
                        icon="arrow-bottom-right" />
                </div>

                {{-- Buyer max purchases --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_buyer_maximum_purchases')"
                        :placeholder="__('messages.t_enter_maximum_purchases_for_buyer')"
                        model="buyer_max_purchases"
                        icon="arrow-top-right" />
                </div>

                {{-- Buyer min purchases --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_buyer_minimum_purchases')"
                        :placeholder="__('messages.t_enter_minimum_purchases_for_buyer')"
                        model="buyer_min_purchases"
                        icon="arrow-bottom-right" />
                </div>

                {{-- Color --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_level_color')"
                        :placeholder="__('messages.t_enter_color_hex_color_example')"
                        model="color"
                        icon="palette" />
                </div>

            </div>
        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>