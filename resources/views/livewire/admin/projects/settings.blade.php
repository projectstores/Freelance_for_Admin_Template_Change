<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_projects_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_projects_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable projects section --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_projects_section')"
                        model="is_enabled" />
                </div>

                {{-- Auto approve projects --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_projects')"
                        model="auto_approve_projects" />
                </div>

                {{-- Auto approve bids --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_bids')"
                        model="auto_approve_bids" />
                </div>

                {{-- Enable free posting --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_free_posting')"
                        model="is_free_posting" />
                </div>

                {{-- Enable premium posting --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_premium_posting')"
                        model="is_premium_posting" />
                </div>

                {{-- Enable promoting bids --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_promoting_bids')"
                        model="is_premium_bidding" />
                </div>

                {{-- Who can post --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_who_can_post_projects')"
                            :placeholder="__('messages.t_choose_who_can_post_new_projects')"
                            model="who_can_post"
                            :options="[ ['text' => __('messages.t_seller'), 'value' => 'seller'], ['text' => __('messages.t_buyer'), 'value' => 'buyer'], ['text' => __('messages.t_both'), 'value' => 'both'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Commission type --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_commission_type')"
                            :placeholder="__('messages.t_choose_commission_type')"
                            model="commission_type"
                            :options="[ ['text' => __('messages.t_percentage_amount'), 'value' => 'percentage'], ['text' => __('messages.t_fixed_amount'), 'value' => 'fixed'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Commission from publisher --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_commission_from_publisher')"
                        :placeholder="__('messages.t_enter_commission_value')"
                        model="commission_from_publisher"
                        icon="school" />
                </div>

                {{-- Commission from freelancer --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_commission_from_freelancer')"
                        :placeholder="__('messages.t_enter_commission_value')"
                        model="commission_from_freelancer"
                        icon="account" />
                </div>

                {{-- Max skills --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('dashboard.t_max_skills')"
                        :placeholder="__('dashboard.t_enter_max_skills')"
                        model="max_skills"
                        svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2.5 18.5C2.5 20.43 4.07 22 6 22s3.5-1.57 3.5-3.5c0-1.58-1.06-2.903-2.5-3.337v-3.488c.244.273.509.527.813.744 1.18.844 2.617 1.098 3.918 1.098.966 0 1.853-.14 2.506-.281a3.5 3.5 0 0 0 3.264 2.265c1.93 0 3.5-1.57 3.5-3.5s-1.57-3.5-3.5-3.5a3.5 3.5 0 0 0-3.404 2.718c-1.297.321-3.664.616-5.119-.426-.666-.477-1.09-1.239-1.306-2.236C8.755 7.96 9.5 6.821 9.5 5.5 9.5 3.57 7.93 2 6 2S2.5 3.57 2.5 5.5c0 1.58 1.06 2.903 2.5 3.337v6.326c-1.44.434-2.5 1.757-2.5 3.337zm15-8c.827 0 1.5.673 1.5 1.5s-.673 1.5-1.5 1.5S16 12.827 16 12s.673-1.5 1.5-1.5zm-10 8c0 .827-.673 1.5-1.5 1.5s-1.5-.673-1.5-1.5S5.173 17 6 17s1.5.673 1.5 1.5zm-3-13C4.5 4.673 5.173 4 6 4s1.5.673 1.5 1.5S6.827 7 6 7s-1.5-.673-1.5-1.5z"></path></svg>' />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    