<div class="w-full bg-white shadow rounded-lg" x-data="window.fweXqTeRXrFVxql">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_maintenance_mode') }}</h2>
                <p class="mt-1 text-xs text-gray-500">You can put your website under maintenance mode and update it in background.</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Status --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_status')"
                            :placeholder="__('messages.t_status')"
                            model="status"
                            :options="[ ['text' => 'Application under maintenance', 'value' => 'down'], ['text' => 'Application live', 'value' => 'up'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Headline --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_headline')"
                        :placeholder="__('messages.t_enter_your_headline')"
                        model="headline" />
                </div>

                {{-- Message --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_message')"
                        :placeholder="__('messages.t_enter_your_message')"
                        model="message"
                        :rows="6" />
                </div>

                {{-- Secret key --}}
                @if ($status === 'down')
                    <div class="col-span-12">
                        <x-forms.text-input disabled
                            :label="__('messages.t_secret_key')"
                            :placeholder="__('messages.t_enter_secret_key')"
                            model="secret"
                            hint="Access this secret key like this: {{ url($secret) }} and you will be able to browse the application normally as if it was not in maintenance mode." />
                    </div>
                @endif

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>