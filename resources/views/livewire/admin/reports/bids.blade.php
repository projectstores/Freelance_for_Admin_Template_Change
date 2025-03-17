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
                        @lang('messages.t_reported_bids')
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
            
                            {{-- Reports --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('messages.t_reports')
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                {{-- Actions --}}
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
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

                        {{-- User --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_freelancer')</th>

                        {{-- Reason --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_reason')</th>

                        {{-- Status --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_status')</th>

                        {{-- Date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_date')</th>
                        
                        {{-- Options --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_options')</th>
                        
                    </tr>
                </thead>
                <thead>
                    @forelse ($reports as $r)
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-dashboard-reported-bids-{{ $r->uid }}">

                            {{-- User --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-48">
                                <a href="{{ url('profile', $r->user->username) }}" target="_blank" class="flex items-center">
                                    <div class="w-10 h-10">
                                        <img class="w-full h-full rounded object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($r->user->avatar) }}" alt="{{ $r->user->username }}" />
                                    </div>
                                    <div class="ltr:pl-3 rtl:pr-3">
                                        <p class="font-medium text-sm flex items-center">
                                            <span class="text-zinc-600 hover:text-primary-600">{{ $r->user->username }}</span>
                                            @if ($r->user->status === 'verified')
                                                <img data-tooltip-target="tooltip-account-verified-{{ $r->user->id }}" class="ltr:ml-0.5 rtl:mr-0.5 h-3.5 w-3.5 -mt-0.5" src="{{ url('public/img/auth/verified-badge.svg') }}" alt="{{ __('messages.t_account_verified') }}">
                                                <div id="tooltip-account-verified-{{ $r->user->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    {{ __('messages.t_account_verified') }}
                                                </div>
                                            @endif
                                        </p>
                                        <p class="text-xs leading-3 text-gray-600 pt-3">{{ $r->user->email }}</p>
                                    </div>
                                </a>
                            </td>

                            {{-- Reason --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52">
                                <div class="whitespace-nowrap text-sm font-medium text-zinc-700 truncate w-52 block">
                                    @lang('messages.t_report_bid_' . $r->reason)
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                @if ($r->is_seen)
                                    <span class="bg-zinc-100 text-zinc-700 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        @lang('messages.t_seen')
                                    </span>
                                @else
                                    <span class="bg-blue-100 text-blue-700 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                        @lang('messages.t_new')
                                    </span>
                                @endif
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-600 dark:text-gray-100 text-sm font-medium whitespace-nowrap">
                                    {{ format_date($r->created_at) }}
                                </div>
                            </td>

                            {{-- Options --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex items-center justify-center space-x-4 rtl:space-x-reverse">

                                    {{-- Preview --}}
                                    <div>
                                        <button type="button" data-tooltip-target="tooltip-actions-preview-{{ $r->uid }}" id="modal-preview-bid-button-{{ $r->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M14 20v2H2v-2h12zM14.586.686l7.778 7.778L20.95 9.88l-1.06-.354L17.413 12l5.657 5.657-1.414 1.414L16 13.414l-2.404 2.404.283 1.132-1.415 1.414-7.778-7.778 1.415-1.414 1.13.282 6.294-6.293-.353-1.06L14.586.686z"></path></g></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-preview-{{ $r->uid }}" :text="__('messages.t_preview_bid')" />
                                    </div>

                                    {{-- Details --}}
                                    <div>
                                        <button wire:click="details('{{ $r->id }}')" type="button" data-tooltip-target="tooltip-actions-details-{{ $r->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"></path></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-details-{{ $r->uid }}" :text="__('messages.t_details')" />
                                    </div>

                                    {{-- Mark as seen --}}
                                    @if (!$r->is_seen)
                                        <div>
                                            <button wire:click="mark('{{ $r->id }}')" type="button" data-tooltip-target="tooltip-actions-mark-{{ $r->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M1.181 12C2.121 6.88 6.608 3 12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"></path></g></svg>
                                            </button>
                                            <x-forms.tooltip id="tooltip-actions-mark-{{ $r->uid }}" :text="__('messages.t_mark_as_read')" />
                                        </div>
                                    @endif

                                </div>
                            </td>

                        </tr>

                        {{-- Preview Modal --}}
                        <x-forms.modal id="modal-preview-bid-container-{{ $r->uid }}" target="modal-preview-bid-button-{{ $r->uid }}" uid="modal_preview_bid_{{ $r->uid }}" placement="center-center" size="max-w-2xl">

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
                                                  <a href="{{ url('profile', $r->bid->user->username) }}" class="block">
                                                    <img class="rounded-full h-12 w-12 object-cover object-center lazy" src="{{ placeholder_img() }}" data-src="{{ src($r->bid->user->avatar) }}" alt="{{ $r->bid->user->username }}">
                                                </a>
                                    
                                                {{-- User info --}}
                                                <div class="space-y-0.5">
                                    
                                                    <div class="flex items-center">
                                    
                                                        {{-- User fullname --}}
                                                        @if ($r->bid->user->fullname)
                                                            <span class="font-medium text-zinc-900 text-sm hover:text-black ltr:pr-1 rtl:pl-1">
                                                                {{ $r->bid->user->fullname }}
                                                            </span>
                                                        @endif
                                    
                                                        {{-- Username --}}
                                                        <a href="{{ url('profile', $r->bid->user->username) }}" class="font-medium text-gray-500 text-[13px] hover:text-primary-600 focus:text-primary-600 inline-flex items-center">
                                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10c1.466 0 2.961-.371 4.442-1.104l-.885-1.793C14.353 19.698 13.156 20 12 20c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8v1c0 .692-.313 2-1.5 2-1.396 0-1.494-1.819-1.5-2V8h-2v.025A4.954 4.954 0 0 0 12 7c-2.757 0-5 2.243-5 5s2.243 5 5 5c1.45 0 2.748-.631 3.662-1.621.524.89 1.408 1.621 2.838 1.621 2.273 0 3.5-2.061 3.5-4v-1c0-5.514-4.486-10-10-10zm0 13c-1.654 0-3-1.346-3-3s1.346-3 3-3 3 1.346 3 3-1.346 3-3 3z"></path></svg>
                                                            <span>{{ $r->bid->user->username }}</span>
                                                        </a>
                                    
                                                    </div>
                                    
                                                    {{-- User details --}}
                                                    <div class="flex items-center space-x-3 rtl:space-x-reverse text-[13px]">
                                    
                                                        {{-- Country --}}
                                                        @if ($r->bid->user->country)
                                                            <p class="flex items-center space-x-1 rtl:space-x-reverse">
                                                                <img class="h-4 ltr:pr-0.5 rtl:pl-0.5 -mt-0.5 lazy" src="{{ placeholder_img() }}" data-src="{{ countryFlag($r->bid->user->country->code) }}" alt="{{ $r->bid->user->country->name }}">
                                                                <span>{{ $r->bid->user->country->name }}</span>
                                                            </p>
                                    
                                                            <div class="mx-2 my-0.5 text-gray-300">|</div>
                                                        @endif
                                    
                                                        {{-- Rating --}}
                                                        <p class="flex shrink-0 items-center space-x-1 rtl:space-x-reverse">
                                                            <svg aria-hidden="true" class="w-4 h-4 {{ $r->bid->user->rating() == 0 ? 'text-gray-400' : 'text-amber-500' }} -mt-0.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                                            <span>
                                                                {{ $r->bid->user->rating() }}
                                                            </span>
                                                        </p>
                                    
                                                        {{-- Verified account --}}
                                                        @if ($r->bid->user->status === 'verified')
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
                                            {!! nl2br($r->bid->message) !!}
                                        </p>
                                    
                                    </div>
                                </div>

                                {{-- Upgrades for this bid --}}
                                <div class="grid grid-cols-1 md:grid-cols-4 md:gap-x-4 gap-y-5">

                                    {{-- Awarded --}}
                                    @if ($r->bid->is_awarded)
                                        <div class="bg-green-50 rounded-lg flex flex-col items-center justify-center p-6">
                                            <svg class="h-5 mb-2 text-green-600 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M13 16.938V19h5v2H6v-2h5v-2.062A8.001 8.001 0 0 1 4 9V3h16v6a8.001 8.001 0 0 1-7 7.938zM1 5h2v4H1V5zm20 0h2v4h-2V5z"></path></g></svg>
                                            <h2 class="text-green-600 text-sm font-semibold whitespace-nowrap truncate max-w-[100px]">@lang('messages.t_awarded')</h2>
                                        </div>
                                    @endif

                                    {{-- Sponsored --}}
                                    @if ($r->bid->is_sponsored)
                                        <div class="bg-red-50 rounded-lg flex flex-col items-center justify-center p-6">
                                            <svg class="h-5 mb-2 text-red-600 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M4.873 3h14.254a1 1 0 0 1 .809.412l3.823 5.256a.5.5 0 0 1-.037.633L12.367 21.602a.5.5 0 0 1-.734 0L.278 9.302a.5.5 0 0 1-.037-.634l3.823-5.256A1 1 0 0 1 4.873 3z"></path></g></svg>
                                            <h2 class="text-red-600 text-sm font-semibold whitespace-nowrap truncate max-w-[100px]">@lang('messages.t_sponsored')</h2>
                                        </div>
                                    @endif

                                    {{-- Sealed --}}
                                    @if ($r->bid->is_sealed)
                                        <div class="bg-blue-50 rounded-lg flex flex-col items-center justify-center p-6">
                                            <svg class="h-5 mb-2 text-blue-600 w-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path fill-rule="nonzero" d="M22 10H12v7.382c0 1.409.632 2.734 1.705 3.618H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2H21a1 1 0 0 1 1 1v4zm-8 2h8v5.382c0 .897-.446 1.734-1.187 2.23L18 21.499l-2.813-1.885A2.685 2.685 0 0 1 14 17.383V12z"></path></g></svg>
                                            <h2 class="text-blue-600 text-sm font-semibold whitespace-nowrap truncate max-w-[100px]">@lang('messages.t_sealed')</h2>
                                        </div>
                                    @endif

                                    {{-- Highlight --}}
                                    @if ($r->bid->is_highlight)
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
    @if ($reports->hasPages())
        <div class="flex justify-center pt-12">
            {!! $reports->links('pagination::tailwind') !!}
        </div>
    @endif

</div>