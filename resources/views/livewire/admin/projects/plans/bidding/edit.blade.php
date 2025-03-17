<div class="w-full bg-white shadow rounded-lg">
    <div class="divide-y divide-gray-200">

        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_' . $plan->plan_type) }}</h2>
                <p class="mt-1 text-[13px] text-gray-500">{{ __('messages.t_bidding_plan_' . $plan->plan_type . '_subtitle') }}</p>
                <p class="mt-1 text-xs text-amber-600 font-medium flex items-center space-x-2 rtl:space-x-reverse">
                    <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                    <span>
                        You can edit title and description of this plan from <a href="{{ admin_url('languages') }}" class="font-bold hover:underline">Languages</a> section.
                    </span>
                </p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Badge text color --}}
                <div class="col-span-12 md:col-span-6" wire:ignore>
                    <label for="badge_text_color" class="block text-sm font-medium text-gray-700">
                        {{ __('messages.t_badge_text_color') }}
                    </label>
                    <div class="mt-1 color-picker-wrapper">
                        <input id="badge_text_color" wire:model.defer="badge_text_color" type="text" class="py-3 px-4 block w-full shadow-sm border-gray-300 rounded-md color-picker-input cursor-pointer">
                    </div>
                </div>

                {{-- Badge background color --}}
                <div class="col-span-12 md:col-span-6" wire:ignore>
                    <label for="badge_bg_color" class="block text-sm font-medium text-gray-700">
                        {{ __('messages.t_badge_bg_color') }}
                    </label>
                    <div class="mt-1 color-picker-wrapper">
                        <input id="badge_bg_color" wire:model.defer="badge_bg_color" type="text" class="py-3 px-4 block w-full shadow-sm border-gray-300 rounded-md color-picker-input cursor-pointer">
                    </div>
                </div>

                {{-- Price --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_plan_price')"
                        :placeholder="__('messages.t_enter_plan_price')"
                        model="price"
                        icon="cash" />
                </div>

                {{-- Enable this plan --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_this_plan')"
                        model="is_active" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>
</div>    

@push('scripts')

    {{-- Color Picker --}}
    <script src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>
    <script>
        document.querySelectorAll('.color-picker-input').forEach(input => {
            Coloris({
                el   : '#' + input.id,
                theme: 'large'
            });
        });
    </script>

@endpush

@push('styles')
    
    {{-- Color picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.css"/>

@endpush