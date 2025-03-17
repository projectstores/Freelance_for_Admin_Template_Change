<div class="w-full">

    {{-- Loading --}}
    <x-forms.loading />
    
    {{-- Heading --}}
    <div class="mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    {{-- Section heading --}}
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        @lang('messages.t_bids_subscriptions')
                    </h2>
    
                    {{-- Breadcrumbs --}}
                    <div class="mt-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
                        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                            {{-- Main home --}}
                            <li>
                                <div class="flex items-center">
                                    <a href="{{ url('/') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-zinc-300 dark:hover:text-white">
                                        @lang('messages.t_home')
                                    </a>
                                </div>
                            </li>
            
                            {{-- dashboard --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ admin_url('/') }}" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                        @lang('messages.t_dashboard')
                                    </a>
                                </div>
                            </li>
            
                            {{-- Bids --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('messages.t_bids')
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                {{-- Actions --}}
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    {{-- Back to bids --}}
                    <span class="block lg:ltr:ml-3 lg:rtl:pr-3">
                        <a href="{{ admin_url('projects/bids') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600 dark:focus:ring-offset-zinc-500 whitespace-nowrap">
                            {{ __('messages.t_back_to_bids') }}
                        </a>
                    </span>

                </div>
    
            </div>
        </div>
    </div>

    {{-- Content --}}
    <div class="w-full">
        <div class="mt-8 overflow-x-auto overflow-y-hidden sm:mt-0 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-800 dark:scrollbar-track-zinc-600">
            <table class="w-full text-left border-spacing-y-[10px] border-separate -mt-2">
                <thead class="">
                    <tr class="bg-slate-200 dark:bg-zinc-600">

                        {{-- Payment id --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_payment_id')</th>

                        {{-- Payment method --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_payment_method')</th>

                        {{-- amount --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_amount')</th>

                        {{-- Status --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_status')</th>

                        {{-- Date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_date')</th>
                        
                        {{-- Options --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_options')</th>
                        
                    </tr>
                </thead>
                <thead>
                    @forelse ($subscriptions as $s)
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-dashboard-subscriptions-{{ $s->uid }}">

                            {{-- Payment id --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                @if ($s->payment_id)
                                    <span class="tracking-wider text-sm text-gray-700 truncate w-52">{{ $s->payment_id }}</span>
                                @else
                                    <span class="text-base text-gray-700">—</span>
                                @endif
                            </td>

                            {{-- Payment method --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex items-center justify-center space-x-1 rtl:space-x-reverse">
                                    @if ($s->payment_method)
                                        @if (settings($s->payment_method))
                                            @if (settings($s->payment_method)->logo)
                                                <img class="h-3" src="{{ src(settings($s->payment_method)->logo) }}" alt="{{ $s->payment_method }}">
                                            @endif
                                            <span class="font-semibold text-sm text-gray-700">{{ settings($s->payment_method)->name }}</span>
                                        @else
                                            <span class="font-semibold text-sm text-gray-700">{{ $s->payment_method }}</span>
                                        @endif
                                    @else
                                        <span class="text-base text-gray-700">—</span>
                                    @endif
                                </div>
                            </td>

                            {{-- Amount --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <span class="font-bold text-black text-sm">
                                    @money($s->amount, settings('currency')->code, true)    
                                </span>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                @if ($s->status === 'paid')
                                    <span class="bg-green-100 text-green-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        @lang('messages.t_paid')
                                    </span>
                                @elseif ($s->status === 'pending' && $s->payment_method === 'offline_payment')
                                    <div class="flex items-center flex-col">
                                        <div class="bg-yellow-100 text-yellow-600 px-4 leading-9 h-9 rounded-3xl font-medium text-xs flex items-center space-x-3 rtl:space-x-reverse">
                                            <span class="whitespace-nowrap">@lang('messages.t_pending')</span>
                                            <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                                {{-- Approve --}}
                                                <div>

                                                    {{-- Button --}}
                                                    <button type="button" data-tooltip-target="tooltip-actions-approve-{{ str_replace('-', '_', $s->uid) }}" id="modal-approve-payment-button-{{ str_replace('-', '_', $s->uid) }}" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-white text-yellow-600 hover:bg-transparent hover:border-yellow-600">
                                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path></g></svg>
                                                    </button>

                                                    {{-- Tooltip --}}
                                                    <x-forms.tooltip id="tooltip-actions-approve-{{ str_replace('-', '_', $s->uid) }}" :text="__('messages.t_approve')" />

                                                </div>

                                                {{-- Reject --}}
                                                <div>

                                                    {{-- Button --}}
                                                    <button type="button" data-tooltip-target="tooltip-actions-reject-{{ str_replace('-', '_', $s->uid) }}" id="modal-reject-payment-button-{{ str_replace('-', '_', $s->uid) }}" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-white text-yellow-600 hover:bg-transparent hover:border-yellow-600">
                                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path></g></svg>
                                                    </button>

                                                    {{-- Tooltip --}}
                                                    <x-forms.tooltip id="tooltip-actions-reject-{{ str_replace('-', '_', $s->uid) }}" :text="__('messages.t_reject')" />

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <span class="bg-red-100 text-red-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        @lang('messages.t_rejected')
                                    </span>
                                @endif
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-600 dark:text-gray-100 text-sm font-medium whitespace-nowrap">
                                    {{ format_date($s->created_at) }}
                                </div>
                            </td>

                            {{-- Options --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex items-center justify-center space-x-4 rtl:space-x-reverse">

                                    {{-- Preview bid --}}
                                    <div>
                                        <button type="button" data-tooltip-target="tooltip-actions-preview-{{ $s->bid->uid }}" id="modal-preview-bid-button-{{ $s->bid->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M1.181 12C2.121 6.88 6.608 3 12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></g></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-preview-{{ $s->bid->uid }}" :text="__('messages.t_preview_bid')" />
                                    </div>

                                    {{-- Delete --}}
                                    <div>
                                        <button type="button" data-tooltip-target="tooltip-actions-delete-{{ str_replace('-', '_', $s->uid) }}" id="modal-delete-payment-button-{{ str_replace('-', '_', $s->uid) }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M17 4h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5V2h10v2zM9 9v8h2V9H9zm4 0v8h2V9h-2z"></path></g></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-delete-{{ str_replace('-', '_', $s->uid) }}" :text="__('messages.t_delete_payment')" />
                                    </div>

                                </div>
                            </td>

                        </tr>

                        {{-- Preview modal --}}
                        <x-forms.modal id="modal-preview-bid-container-{{ $s->bid->uid }}" target="modal-preview-bid-button-{{ $s->bid->uid }}" uid="modal_preview_bid_{{ $s->bid->uid }}" placement="center-center" size="max-w-2xl">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_preview_bid') }}</x-slot>

                            {{-- Modal content --}}
                            <x-slot name="content">

                                {{-- Bid --}}
                                <div class="w-full relative">
                                    <div class="relative">
                                    
                                        {{-- Bid heading --}}
                                        <div class="mb-8">
                                    
                                            {{-- Freelancer profile --}}
                                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    
                                                {{-- Avatar --}}
                                                  <a href="{{ url('profile', $s->bid->user->username) }}" class="block">
                                                    <img class="rounded-full h-12 w-12 object-cover object-center lazy" src="{{ placeholder_img() }}" data-src="{{ src($s->bid->user->avatar) }}" alt="{{ $s->bid->user->username }}">
                                                </a>
                                    
                                                {{-- User info --}}
                                                <div class="space-y-0.5">
                                    
                                                    <div class="flex items-center">
                                    
                                                        {{-- User fullname --}}
                                                        @if ($s->bid->user->fullname)
                                                            <span class="font-medium text-zinc-900 text-sm hover:text-black ltr:pr-1 rtl:pl-1">
                                                                {{ $s->bid->user->fullname }}
                                                            </span>
                                                        @endif
                                    
                                                        {{-- Username --}}
                                                        <a href="{{ url('profile', $s->bid->user->username) }}" class="font-medium text-gray-500 text-[13px] hover:text-primary-600 focus:text-primary-600 inline-flex items-center">
                                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10c1.466 0 2.961-.371 4.442-1.104l-.885-1.793C14.353 19.698 13.156 20 12 20c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8v1c0 .692-.313 2-1.5 2-1.396 0-1.494-1.819-1.5-2V8h-2v.025A4.954 4.954 0 0 0 12 7c-2.757 0-5 2.243-5 5s2.243 5 5 5c1.45 0 2.748-.631 3.662-1.621.524.89 1.408 1.621 2.838 1.621 2.273 0 3.5-2.061 3.5-4v-1c0-5.514-4.486-10-10-10zm0 13c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3z"></path></svg>
                                                            <span>{{ $s->bid->user->username }}</span>
                                                        </a>
                                    
                                                    </div>
                                    
                                                    {{-- User details --}}
                                                    <div class="flex items-center space-x-3 rtl:space-x-reverse text-[13px]">
                                    
                                                        {{-- Country --}}
                                                        @if ($s->bid->user->country)
                                                            <p class="flex items-center space-x-1 rtl:space-x-reverse">
                                                                <img class="h-4 ltr:pr-0.5 rtl:pl-0.5 -mt-0.5 lazy" src="{{ placeholder_img() }}" data-src="{{ countryFlag($s->bid->user->country->code) }}" alt="{{ $s->bid->user->country->name }}">
                                                                <span>{{ $s->bid->user->country->name }}</span>
                                                            </p>
                                    
                                                            <div class="mx-2 my-0.5 text-gray-300">|</div>
                                                        @endif
                                    
                                                        {{-- Rating --}}
                                                        <p class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                                            <svg aria-hidden="true" class="w-4 h-4 {{ $s->bid->user->rating() == 0 ? 'text-gray-400' : 'text-amber-500' }} -mt-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                                            <span>
                                                                {{ $s->bid->user->rating() }}
                                                            </span>
                                                        </p>
                                    
                                                        {{-- Verified account --}}
                                                        @if ($s->bid->user->status === 'verified')
                                                            <div class="mx-2 my-0.5 text-gray-300">|</div>
                                                            <div class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                                                <svg class="w-4 h-4 text-blue-500 -mt-0.5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                                                <span>@lang('messages.t_verified_account')</span>
                                                            </div>
                                                        @endif
                                    
                                                    </div>
                                    
                                                </div>
                                    
                                            </div>
                                                        
                                        </div>
                                        
                                        {{-- Bid body --}}
                                        <p class="mb-2 font-light text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                            {{ $s->bid->message }}
                                        </p>
                                    
                                    </div>
                                </div>

                                {{-- Upgrades for this bid --}}
                                <div class="grid grid-cols-1 md:grid-cols-4 md:gap-x-4 gap-y-5">

                                    {{-- Awarded --}}
                                    @if ($s->bid->is_awarded)
                                        <div class="bg-green-50 rounded-lg flex flex-col items-center justify-center p-6">
                                            <svg class="h-5 mb-2 text-green-600 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M13 16.938V19h5v2H6v-2h5v-2.062A8.001 8.001 0 0 1 4 9V3h16v6a8.001 8.001 0 0 1-7 7.938zM1 5h2v4H1V5zm20 0h2v4h-2V5z"></path></g></svg>
                                            <h2 class="text-green-600 text-sm font-semibold whitespace-nowrap truncate max-w-[100px]">@lang('messages.t_awarded')</h2>
                                        </div>
                                    @endif

                                    {{-- Sponsored --}}
                                    @if ($s->bid->is_sponsored)
                                        <div class="bg-red-50 rounded-lg flex flex-col items-center justify-center p-6">
                                            <svg class="h-5 mb-2 text-red-600 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M4.873 3h14.254a1 1 0 0 1 .809.412l3.823 5.256a.5.5 0 0 1-.037.633L12.367 21.602a.5.5 0 0 1-.734 0L.278 9.302a.5.5 0 0 1-.037-.634l3.823-5.256A1 1 0 0 1 4.873 3z"></path></g></svg>
                                            <h2 class="text-red-600 text-sm font-semibold whitespace-nowrap truncate max-w-[100px]">@lang('messages.t_sponsored')</h2>
                                        </div>
                                    @endif

                                    {{-- Sealed --}}
                                    @if ($s->bid->is_sealed)
                                        <div class="bg-blue-50 rounded-lg flex flex-col items-center justify-center p-6">
                                            <svg class="h-5 mb-2 text-blue-600 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path fill-rule="nonzero" d="M22 10H12v7.382c0 1.409.632 2.734 1.705 3.618H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2H21a1 1 0 0 1 1 1v4zm-8 2h8v5.382c0 .897-.446 1.734-1.187 2.23L18 21.499l-2.813-1.885A2.685 2.685 0 0 1 14 17.383V12z"></path></g></svg>
                                            <h2 class="text-blue-600 text-sm font-semibold whitespace-nowrap truncate max-w-[100px]">@lang('messages.t_sealed')</h2>
                                        </div>
                                    @endif

                                    {{-- Highlight --}}
                                    @if ($s->bid->is_highlight)
                                        <div class="bg-amber-50 rounded-lg flex flex-col items-center justify-center p-6">
                                            <svg class="h-5 mb-2 text-amber-600 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M7.941 18c-.297-1.273-1.637-2.314-2.187-3a8 8 0 1 1 12.49.002c-.55.685-1.888 1.726-2.185 2.998H7.94zM16 20v1a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-1h8zm-3-9.995V6l-4.5 6.005H11v4l4.5-6H13z"></path></g></svg>
                                            <h2 class="text-amber-600 text-sm font-semibold whitespace-nowrap truncate max-w-[100px]">@lang('messages.t_highlighted')</h2>
                                        </div>
                                    @endif

                                </div>

                            </x-slot>

                            {{-- Footer --}}
                            <x-slot name="footer">
                                <div class="flex justify-between items-center w-full">
                                    <div></div>
                                    {{-- Cancel --}}
                                    <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        @lang('messages.t_close')
                                    </button>
                                </div>
                            </x-slot>

                        </x-forms.modal>

                        {{-- Approve modal --}}
                        <x-forms.modal id="modal-approve-payment-container-{{ str_replace('-', '_', $s->uid) }}" target="modal-approve-payment-button-{{ str_replace('-', '_', $s->uid) }}" uid="modal_approve_payment_{{ str_replace('-', '_', $s->uid) }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_approve_payment') }}</x-slot>

                            {{-- Modal content --}}
                            <x-slot name="content">
                                <div class="flex text-gray-500 font-normal text-sm">@lang('messages.t_are_u_sure_u_want_approve_payment')</div>
                            </x-slot>

                            {{-- Footer --}}
                            <x-slot name="footer">
                                <div class="flex justify-between items-center w-full">

                                    {{-- Cancel --}}
                                    <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        @lang('messages.t_cancel')
                                    </button>

                                    {{-- Accept --}}
                                    <button
                                        type="button" 
                                        wire:click="approve('{{ $s->id }}')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-green-500 text-white hover:bg-green-600 focus:ring focus:ring-green-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="approve('{{ $s->id }}')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="approve('{{ $s->id }}')">
                                            @lang('messages.t_approve_payment')
                                        </div>

                                    </button>

                                </div>
                            </x-slot>

                        </x-forms.modal>

                        {{-- Reject modal --}}
                        <x-forms.modal id="modal-reject-payment-container-{{ str_replace('-', '_', $s->uid) }}" target="modal-reject-payment-button-{{ str_replace('-', '_', $s->uid) }}" uid="modal_reject_payment_{{ str_replace('-', '_', $s->uid) }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_reject_payment') }}</x-slot>

                            {{-- Modal content --}}
                            <x-slot name="content">
                                <div class="flex text-gray-500 font-normal text-sm">@lang('messages.t_are_u_sure_u_want_reject_payment')</div>
                            </x-slot>

                            {{-- Footer --}}
                            <x-slot name="footer">
                                <div class="flex justify-between items-center w-full">

                                    {{-- Cancel --}}
                                    <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        @lang('messages.t_cancel')
                                    </button>

                                    {{-- Reject --}}
                                    <button
                                        type="button" 
                                        wire:click="reject('{{ $s->id }}')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-red-500 text-white hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="reject('{{ $s->id }}')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="reject('{{ $s->id }}')">
                                            @lang('messages.t_reject_payment')
                                        </div>

                                    </button>

                                </div>
                            </x-slot>

                        </x-forms.modal>

                        {{-- Delete modal --}}
                        <x-forms.modal id="modal-delete-payment-container-{{ str_replace('-', '_', $s->uid) }}" target="modal-delete-payment-button-{{ str_replace('-', '_', $s->uid) }}" uid="modal_delete_payment_{{ str_replace('-', '_', $s->uid) }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_delete_payment') }}</x-slot>

                            {{-- Modal content --}}
                            <x-slot name="content">
                                <div class="flex flex-col items-center">

                                    {{-- Alert icon --}}
                                    <div class="h-16 w-16 flex items-center justify-center bg-red-100 rounded-full">
                                        <svg class="w-7 h-7 text-red-400 -mt-1" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12.866 3l9.526 16.5a1 1 0 0 1-.866 1.5H2.474a1 1 0 0 1-.866-1.5L11.134 3a1 1 0 0 1 1.732 0zM11 16v2h2v-2h-2zm0-7v5h2V9h-2z"></path></g></svg>
                                    </div>
    
                                    {{-- Attention --}}
                                    <div class="mt-1.5 font-semibold text-sm text-red-500">
                                        @lang('messages.t_attention_needed')
                                    </div>

                                    {{-- Alert message --}}
                                    <div class="text-center leading-relaxed text-[13px] mt-4 text-gray-500">
                                        {!! nl2br(__('messages.t_are_u_sure_delete_payment')) !!}
                                    </div>

                                </div>
                            </x-slot>

                            {{-- Footer --}}
                            <x-slot name="footer">
                                <div class="flex justify-between items-center w-full">

                                    {{-- Cancel --}}
                                    <button x-on:click="close" type="button" class="inline-flex justify-center items-center space-x-2 rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        @lang('messages.t_cancel')
                                    </button>

                                    {{-- Delete --}}
                                    <button
                                        type="button" 
                                        wire:click="delete('{{ $s->id }}')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-red-500 text-white hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="delete('{{ $s->id }}')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="delete('{{ $s->id }}')">
                                            @lang('messages.t_delete_payment')
                                        </div>

                                    </button>

                                </div>
                            </x-slot>

                        </x-forms.modal>

                    @empty
                        <tr>
                            <td colspan="6" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                @lang('messages.t_no_results_found')
                            </td>
                        </tr>
                    @endforelse
                </thead>
            </table>
        </div>
    </div>

    {{-- Pages --}}
    @if ($subscriptions->hasPages())
        <div class="flex justify-center pt-12">
            {!! $subscriptions->links('pagination::tailwind') !!}
        </div>
    @endif

</div>