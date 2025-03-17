<div class="w-full" x-data="window.krLSMcHnnEKMpVx" x-init="initialize">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Main section title --}}
        <div class="col-span-12 mb-10">
            <div class="md:flex md:items-center md:justify-between ltr:border-l-8 border-primary-600 ltr:pl-4 rtl:border-r-8 rtl:pr-4">
                <div class="flex-1 min-w-0">
                    <h2 class="text-sm font-extrabold text-gray-900 tracking-wider pb-1">{{ __('messages.t_pricing') }}</h2>
                    <p class="text-gray-500 font-medium text-xs">{{ __('messages.t_edit_gig_price_upgrades') }}</p>
                </div>
                <div class="mt-4 flex md:mt-0 ltr:md:ml-4 rtl:md:mr-4">

                    {{-- Back to gigs --}}
                    <a href="{{ admin_url('gigs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-sm shadow-sm text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        {{ __('messages.t_back_to_gigs') }}
                    </a>

                    {{-- View gig --}}
                    <a href="{{ url('service', $gig->slug) }}" target="_blank" class="ltr:ml-3 rtl:mr-3 inline-flex items-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        {{ __('messages.t_view_gig') }}
                    </a>
                </div>
            </div>
        </div>

        {{-- Success --}}
        @if (session()->has('success'))
            <div class="col-span-12">
                <div class="rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <p class="text-sm font-medium text-green-800">{{ session()->get('success') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        @endif

        {{-- Main pricing --}}
        <div class="col-span-12 xl:col-span-7">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6">

                {{-- Section title --}}
                <div class="mb-14 flex justify-between items-center">
                    <div>
                        <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">
                            {{ __('messages.t_pricing') }}</h2>
                        <p class="text-xs text-gray-500">{{ __('messages.t_create_gig_pricing_subtitle') }}</p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                        <button wire:key="add-upgrade-btn" id="modal-add-service-upgrade-button"
                            class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 hover:text-gray-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 pb-6">

                    {{-- Service price --}}
                    <div class="col-span-6">
                        <x-forms.text-input label="{{ __('messages.t_price') }}"
                            placeholder="{{ __('messages.t_price_placeholder_0_00') }}" model="price"
                            suffix="{{ $currency_symbol }}" />
                    </div>

                    {{-- Delivery time --}}
                    <div class="col-span-6">
                        <x-forms.select2 :label="__('messages.t_delivery_time')" :placeholder="__('messages.t_choose_delivery_time')" model="delivery_time" :options="$available_deliveries"
                            :isDefer="true" :isAssociative="false" :componentId="$this->id" value="value" text="text"
                            class="select2_pricing" />
                    </div>

                </div>

            </div>

            {{-- Actions --}}
            <div class="hidden justify-between items-center lg:flex">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}"
                    active="bg-white shadow-sm hover:bg-gray-300 text-gray-900" />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
            </div>

        </div>

        {{-- List of upgrades --}}
        <div class="col-span-12 xl:col-span-5">
            @foreach ($upgrades as $key => $upgrade)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6" id="scroll-to-upgrade-id-{{ $key }}" wire:key="edit-gig-pricing-upgrade-id-{{ $key }}">

                    {{-- Upgrade title --}}
                    <div class="mb-14 flex justify-between items-center">
                        <div>
                            <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">
                                {{ __('messages.t_upgrade_number', ['number' => $key + 1]) }}    
                            </h2>
                            <p class="text-xs text-gray-500">{{ $upgrade['title'] }}</p>
                        </div>
                        <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                            <button wire:click="removeUpgrade({{ $key }})" id="modal-add-service-upgrade-button"
                                class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/> </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Upgrade form --}}
                    <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 pb-6">

                        {{-- Upgrade title --}}
                        <div class="col-span-12" wire:key="{{ uid() }}">
                            <x-forms.text-input label="{{ __('messages.t_upgrade_title') }}"
                                placeholder="{{ __('messages.t_enter_upgrade_title') }}"
                                model="upgrades.{{ $key }}.title" icon="format-title" />
                        </div>

                        {{-- Upgrade price --}}
                        <div class="col-span-6" wire:key="{{ uid() }}">
                            <x-forms.text-input label="{{ __('messages.t_price') }}"
                                placeholder="{{ __('messages.t_price_placeholder_0_00') }}"
                                model="upgrades.{{ $key }}.price" suffix="{{ $currency_symbol }}" />
                        </div>

                        {{-- Delivery time --}}
                        <div class="col-span-6" wire:key="{{ uid() }}">
                            <div
                                class="relative default-select2 {{ $errors->first('upgrades.' . $key . '.extra_days') ? 'select2-custom-has-error' : '' }}">
                                <label
                                    class="text-xs font-medium block mb-2 {{ $errors->first('upgrades.' . $key . '.extra_days') ? 'text-red-600 dark:text-red-500' : 'text-gray-700' }}">{{ __('messages.t_delivery_time') }}</label>
                                <select x-data="initSelect2DeliveryTime('select2-id-upgrades-{{ $key }}-extra_days', {{ $key }})" data-pharaonic="select2"
                                    data-component-id="{{ $this->id }}"
                                    wire:model.defer="upgrades.{{ $key }}.extra_days"
                                    id="select2-id-upgrades-{{ $key }}-extra_days"
                                    data-placeholder="{{ __('messages.t_choose_delivery_time') }}" data-search-off
                                    class="select2_pricing" x-on:change="changed">
                                    <option value=""></option>
                                    @foreach ($available_deliveries as $key => $option)
                                        <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
                                    @endforeach
                                </select>
                                @error('upgrades.' . $key . '.extra_days')
                                    <p class="mt-1 text-xs text-red-600 dark:text-red-500">
                                        {{ $errors->first('upgrades.' . $key . '.extra_days') }}</p>
                                @enderror

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        {{-- Actions --}}
        <div class="col-span-12 block lg:hidden">
            <div class="flex justify-between items-center">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}"
                    active="bg-white shadow-sm hover:bg-gray-300 text-gray-900" />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
            </div>
        </div>

        {{-- ** Modal ** --}}
        <x-forms.modal id="modal-add-service-upgrade-container" target="modal-add-service-upgrade-button"
            uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

            {{-- Header --}}
            <x-slot name="title">{{ __('messages.t_add_service_upgrade') }}</x-slot>

            {{-- Content --}}
            <x-slot name="content">
                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                    {{-- Upgrade title --}}
                    <div class="col-span-12" wire:key="{{ uid() }}">
                        <div class="flex-grow relative">
                            <span
                                class="absolute top-2/4 left-3 -translate-y-1/2 z-10 text-xs font-normal {{ $errors->first('add_upgrade.title') ? 'text-red-600' : 'text-black' }}">{{ __('messages.t_i_will') }}</span>
                            <div class="w-full inline-block relative">
                                <div class="relative">
                                    <input wire:model.defer="add_upgrade.title"
                                        class="indent-6 block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal {{ $errors->first('add_upgrade.title') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600' }}"
                                        type="text" placeholder="{{ __('messages.t_describe_ur_offering') }}">
                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                        <i
                                            class="mdi mdi-format-title {{ $errors->first('add_upgrade.title') ? 'text-red-400' : 'text-gray-400' }}"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Error --}}
                        @error('add_upgrade.title')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">
                                {{ $errors->first('add_upgrade.title') }}</p>
                        @enderror
                    </div>

                    {{-- Upgrade price --}}
                    <div class="col-span-12" wire:key="{{ uid() }}">
                        <div class="flex-grow relative">
                            <input wire:model.defer="add_upgrade.price"
                                class="block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal {{ $errors->first('add_upgrade.price') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600' }}"
                                type="text" placeholder="{{ __('messages.t_for_and_extra_price') }}">
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                <span
                                    class="{{ $errors->first('add_upgrade.price') ? 'text-red-400' : 'text-gray-400' }}">{{ $currency_symbol }}</span>
                            </div>
                        </div>
                        {{-- Error --}}
                        @error('add_upgrade.price')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">
                                {{ $errors->first('add_upgrade.price') }}</p>
                        @enderror
                    </div>

                    {{-- Upgrade extra days --}}
                    <div class="col-span-12" wire:key="{{ uid() }}">
                        <div
                            class="relative default-select2 {{ $errors->first('add_upgrade.extra_days') ? 'select2-custom-has-error' : '' }}">

                            <select data-pharaonic="select2" data-component-id="{{ $this->id }}"
                                wire:model.defer="add_upgrade.extra_days" id="select2-id-add_upgrade.extra_days"
                                data-placeholder="{{ __('messages.t_and_an_additional_days') }}" data-search-off
                                class="select2_pricing">
                                <option value=""></option>
                                @foreach ($available_deliveries as $key => $option)
                                    <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
                                @endforeach
                            </select>
                            @error('add_upgrade.extra_days')
                                <p class="mt-1 text-xs text-red-600 dark:text-red-500">
                                    {{ $errors->first('add_upgrade.extra_days') }}</p>
                            @enderror

                        </div>
                    </div>

                </div>
            </x-slot>

            {{-- Footer --}}
            <x-slot name="footer">
                <x-forms.button action="addUpgrade" text="{{ __('messages.t_add') }}" :block="0" />
            </x-slot>

        </x-forms.modal>

    </div>
</div>

@push('scripts')
    {{-- AlpineJS --}}
    <script>
        function krLSMcHnnEKMpVx() {
            return {

                initSelect2DeliveryTime(id, key) {
                    $('#' + id).select2().on('change', function() {
                        @this.set('upgrades.' + key + '.extra_days', $(this).val());
                    });
                },

                initialize() {

                }

            }
        }
        window.krLSMcHnnEKMpVx = krLSMcHnnEKMpVx();
    </script>
@endpush
