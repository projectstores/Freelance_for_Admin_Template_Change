<div class="w-full bg-white shadow rounded-lg">
    <div class="divide-y divide-gray-200">

        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_edit_project_plan') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_edit_project_plan_subtitle') }}</p>
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

                {{-- Plan title --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_plan_title')"
                        :placeholder="__('messages.t_enter_plan_title')"
                        model="title"
                        icon="format-title" />
                </div>

                {{-- Plan description --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_plan_description')"
                        :placeholder="__('messages.t_enter_plan_description')"
                        model="description"
                        icon="text"
                        :rows="8" />
                </div>

                {{-- Price --}}
                <div @class(['col-span-12', 'md:col-span-6' => $plan->type !== 'alert'])>
                    <x-forms.text-input
                        :label="__('messages.t_plan_price')"
                        :placeholder="__('messages.t_enter_plan_price')"
                        model="price"
                        icon="cash" />
                </div>

                {{-- Days --}}
                @if ($plan->type !== 'alert')
                    <div class="col-span-12 md:col-span-6">
                        <x-forms.text-input
                            :label="__('messages.t_plan_days')"
                            :placeholder="__('messages.t_enter_plan_days')"
                            model="days"
                            icon="calendar" />
                    </div>
                @endif

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