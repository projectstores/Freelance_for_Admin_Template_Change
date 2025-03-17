<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_edit_user') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Username --}}
                <div class="col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_username')"
                        :placeholder="__('messages.t_enter_username')"
                        model="username"
                        icon="account" />
                </div>

                {{-- Email address --}}
                <div class="col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_email_address')"
                        :placeholder="__('messages.t_enter_email_address')"
                        model="email"
                        type="email"
                        icon="at" />
                </div>

                {{-- Password --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_password')"
                        :placeholder="__('messages.t_enter_password')"
                        model="password"
                        type="password"
                        icon="lock" />
                </div>

                {{-- Account type --}}
                <div class="col-span-4">
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

                {{-- Level --}}
                <div class="col-span-4">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_level')"
                            :placeholder="__('messages.t_choose_level')"
                            model="level"
                            :options="$levels"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="id"
                            text="title" />
                    </div>
                </div>

                {{-- Country --}}
                <div class="col-span-4">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_country')"
                            :placeholder="__('messages.t_choose_country')"
                            model="country"
                            :options="$countries"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="id"
                            text="name" />
                    </div>
                </div>

                {{-- Fullname --}}
                <div class="col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_fullname')"
                        :placeholder="__('messages.t_enter_fullname')"
                        model="fullname"
                        icon="badge-account-horizontal" />
                </div>

                {{-- Headline --}}
                <div class="col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_headline')"
                        :placeholder="__('messages.t_enter_your_headline')"
                        model="headline"
                        icon="text-account" />
                </div>

                {{-- Description --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_description')"
                        :placeholder="__('messages.t_enter_description')"
                        rows="6"
                        model="description"
                        icon="text" />
                </div>

                {{-- Status --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_status')"
                            :placeholder="__('messages.t_choose_status')"
                            model="status"
                            :options="[ 
                                ['text' => __('messages.t_active'), 'value' => 'active'],
                                ['text' => __('messages.t_verified'), 'value' => 'verified'],
                                ['text' => __('messages.t_banned'), 'value' => 'banned']
                            ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Avatar --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_upload_avatar')" model="avatar"  />
                    {{-- Preview image --}}
                    @if ($user->avatar)
                        <div class="mt-3">
                            <img src="{{ src( $user->avatar ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    