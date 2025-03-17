<div class="w-full">
    <div class="max-w-3xl mx-auto grid grid-cols-1 md:gap-x-6 gap-y-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="space-y-6 lg:col-start-1 lg:col-span-2">
            <section aria-labelledby="applicant-information-title">
                <div class="bg-white shadow sm:rounded-lg">

                    {{-- Section details --}}
                    <div class="px-4 py-5 sm:px-6">
                        <h2 class="text-sm leading-6 font-bold tracking-wide text-gray-900">
                            {{ __('messages.t_user_details') }}
                        </h2>
                        <p class="mt-1 max-w-2xl text-xs text-gray-500">
                            {{ __('messages.t_more_details_about_this_user') }}
                        </p>
                    </div>

                    {{-- Details --}}
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">

                            {{-- Username --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_username') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    {{ $user->username }}
                                </dd>
                            </div>

                            {{-- Email Address --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_email_address') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    {{ $user->email }}
                                </dd>
                            </div>

                            {{-- Email verified at --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_email_verified_at') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->email_verified_at)
                                        {{ format_date($user->email_verified_at, 'ago') }}
                                    @else
                                        -
                                    @endif
                                </dd>
                            </div>

                            {{-- Account type --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_account_type') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->account_type === 'seller')
                                        {{ __('messages.t_seller') }}
                                    @else
                                        {{ __('messages.t_buyer') }}
                                    @endif
                                </dd>
                            </div>

                            {{-- Level --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_level') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->level)
                                        {{ $user->level->title }}
                                    @else
                                        -
                                    @endif
                                </dd>
                            </div>

                            {{-- Registeration method --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_registeration_method') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->provider_id && $user->provider_name)
                                        @switch($user->provider_name)
                                            @case('facebook')
                                                {{ __('messages.t_facebook') }}
                                            @break

                                            @case('twitter')
                                                {{ __('messages.t_twitter') }}
                                            @break

                                            @case('google')
                                                {{ __('messages.t_google') }}
                                            @break

                                            @case('github')
                                                {{ __('messages.t_github') }}
                                            @break

                                            @case('linkedin')
                                                {{ __('messages.t_linkedin') }}
                                            @break

                                            @default
                                        @endswitch
                                    @else
                                        {{ __('messages.t_email_address') }}
                                    @endif
                                </dd>
                            </div>

                            {{-- Country --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_country') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->country)
                                        <div class="flex items-center">
                                            <img src="{{ placeholder_img() }}" data-src="{{ url('public/img/flags/' . strtolower($user->country->code) . '.svg') }}"
                                                alt="{{ $user->country->name }}" class="lazy h-3 ltr:mr-2 rtl:ml-2">
                                            <span>{{ $user->country->name }}</span>
                                        </div>
                                    @else
                                        -
                                    @endif
                                </dd>
                            </div>

                            {{-- Fullname --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_fullname') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->fullname)
                                        {{ $user->fullname }}
                                    @else
                                        -
                                    @endif
                                </dd>
                            </div>

                            {{-- Headline --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_headline') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->headline)
                                        {{ $user->headline }}
                                    @else
                                        -
                                    @endif
                                </dd>
                            </div>

                            {{-- Registeration date --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_registeration_date') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    {{ format_date($user->created_at, 'ago') }}
                                </dd>
                            </div>

                            {{-- Balance net --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_net_balance') }}
                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    @money($user->balance_net, settings('currency')->code, true)
                                </dd>
                            </div>

                            {{-- Balance net --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_withdrawn_money') }}
                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    @money($user->balance_withdrawn, settings('currency')->code, true)
                                </dd>
                            </div>

                            {{-- Used for purchases --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_used_for_purchases') }}
                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    @money($user->balance_purchases, settings('currency')->code, true)
                                </dd>
                            </div>

                            {{-- Pending clearance --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_pending_clearance') }}
                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    @money($user->balance_pending, settings('currency')->code, true)
                                </dd>
                            </div>

                            {{-- Available balance --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_available_balance') }}
                                </dt>
                                <dd class="mt-1 text-xs font-black text-gray-900 ">
                                    @money($user->balance_available, settings('currency')->code, true)
                                </dd>
                            </div>

                            {{-- Last activity --}}
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_last_activity') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->last_activity)
                                        {{ format_date($user->last_activity, 'ago') }}
                                    @else
                                        -
                                    @endif
                                </dd>
                            </div>

                            {{-- Description --}}
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-bold text-gray-400">
                                    {{ __('messages.t_description') }}
                                </dt>
                                <dd class="mt-1 text-[13px] font-medium text-gray-900">
                                    @if ($user->description)
                                        {{ $user->description }}
                                    @endif
                                </dd>
                            </div>

                        </dl>
                    </div>
                    <div>
                        <a href="{{ url('profile', $user->username) }}" target="_blank"
                            class="block bg-gray-50 text-sm font-bold text-gray-400 text-center px-4 py-4 hover:text-gray-700 sm:rounded-b-lg">{{ __('messages.t_view_profile') }}</a>
                    </div>
                </div>
            </section>
        </div>

        {{-- User card --}}
        <section class="lg:col-start-3 lg:col-span-1">
            <div class="flex flex-col text-center bg-white rounded-lg shadow divide-y divide-gray-200">
                <div class="flex-1 flex flex-col p-8">
                    <img class="w-32 h-32 flex-shrink-0 mx-auto rounded-full object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($user->avatar) }}" alt="{{ $user->username }}">
                    <h3 class="mt-6 text-gray-900 text-sm font-medium">{{ $user->username }}</h3>
                    <dl class="mt-1 flex-grow flex flex-col justify-between">
                        <dd class="mt-3">
                            @if ($user->isOnline())
                                <span class="px-2 py-1 text-green-800 text-xs font-medium bg-green-100 rounded-full">{{ __('messages.t_online') }}</span>
                            @else
                                <span class="px-2 py-1 text-red-800 text-xs font-medium bg-red-100 rounded-full">{{ __('messages.t_offline') }}</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </section>
    </div>
</div>