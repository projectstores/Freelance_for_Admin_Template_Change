<div class="w-full" x-data="window.FhAsclZJpDsCcbd">

    {{-- Loading --}}
    <x-forms.loading />
    
    {{-- Heading --}}
    <div class="mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    {{-- Section heading --}}
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        @lang('messages.t_milestone_payments')
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
            
                            {{-- Dashboard --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ admin_url('/') }}" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                        @lang('messages.t_dashboard')
                                    </a>
                                </div>
                            </li>
            
                            {{-- Projects --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('messages.t_projects')
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                {{-- Actions --}}
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">

                    {{-- View project --}}
                    <span class="block">
                        <a href="{{ url('project/' . $project->pid . '/' . $project->slug) }}" target="_blank" class="inline-flex items-center rounded-sm border border-gray-300 bg-white px-4 py-2 text-[13px] font-semibold text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-600 focus:ring-offset-2 dark:bg-zinc-800 dark:border-zinc-800 dark:text-zinc-100 dark:hover:bg-zinc-900 dark:focus:ring-offset-zinc-900 dark:focus:ring-zinc-900">
                            @lang('messages.t_view_project')
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>

    {{-- Project details --}}
    <div class="mb-6">
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-y-6 gap-x-5 h-full">

            {{-- Status --}}
            <div>
                <div class="flex flex-col h-full justify-center text-center space-y-3 bg-white dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-md">
                    <svg class="mx-auto h-6 w-6 mb-1 text-slate-500 dark:text-zinc-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="font-light text-gray-500 text-xs uppercase dark:text-zinc-300 tracking-wider whitespace-nowrap">@lang('messages.t_status')</span>
                    <div class="text-sm font-semibold tracking-wide dark:text-white text-zinc-700">
                        @switch($project->status)

                            {{-- Active --}}
                            @case('active')
                                <span class="text-emerald-600">
                                    @lang('messages.t_active')
                                </span>
                                @break

                            {{-- Completed --}}
                            @case('completed')
                                <span class="text-green-600">
                                    @lang('messages.t_completed')
                                </span>
                                @break

                            {{-- Under development --}}
                            @case('under_development')
                                <span class="text-blue-600">
                                    @lang('messages.t_under_development')
                                </span>
                                @break

                            {{-- Pending final review --}}
                            @case('pending_final_review')
                                <span class="text-amber-600">
                                    @lang('messages.t_pending_final_review')
                                </span>
                                @break

                            {{-- Incomplete --}}
                            @case('incomplete')
                                <span class="text-red-600">
                                    @lang('messages.t_incomplete')
                                </span>
                                @break

                            {{-- Closed --}}
                            @case('closed')
                                <span class="text-slate-600 dark:text-slate-200">
                                    @lang('messages.t_closed')
                                </span>
                                @break

                            @default
                                
                        @endswitch
                    </div>
                </div>
            </div>

            {{-- Delivery date --}}
            <div>
                <div class="flex flex-col h-full justify-center text-center space-y-3 bg-white dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-md">
                    <svg class="mx-auto h-6 w-6 mb-1 text-slate-500 dark:text-zinc-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    <span class="font-light text-gray-500 text-xs uppercase dark:text-zinc-300 tracking-wider whitespace-nowrap">@lang('messages.t_delivery_time')</span>
                    <span class="text-sm font-bold dark:text-white text-slate-600">
                        @if ($expected_delivery_date)
                            {{ format_date($expected_delivery_date, config('carbon-formats.F_j_Y')) }}
                        @else
                            @lang('messages.t_n_a')
                        @endif    
                    </span>
                </div>
            </div>

            {{-- Amount In progress --}}
            <div>
                <div class="flex flex-col h-full justify-center text-center space-y-3 bg-white dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-md">
                    <svg class="mx-auto h-6 w-6 mb-1 text-slate-500 dark:text-zinc-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 2a1 1 0 011 1v2.101a7.002 7.002 0 0111.601 2.566 1 1 0 11-1.885.666A5.002 5.002 0 005.999 7H9a1 1 0 010 2H4a1 1 0 01-1-1V3a1 1 0 011-1zm.008 9.057a1 1 0 011.276.61A5.002 5.002 0 0014.001 13H11a1 1 0 110-2h5a1 1 0 011 1v5a1 1 0 11-2 0v-2.101a7.002 7.002 0 01-11.601-2.566 1 1 0 01.61-1.276z" clip-rule="evenodd"></path></svg>
                    <span class="font-light text-gray-500 text-xs uppercase dark:text-zinc-300 tracking-wider whitespace-nowrap">@lang('messages.t_in_progress')</span>
                    <span class="text-sm font-bold dark:text-white text-zinc-700">@money($payments_in_progress, settings('currency')->code, true)</span>
                </div>
            </div>

            {{-- Paid amount --}}
            <div>
                <div class="flex flex-col h-full justify-center text-center space-y-3 bg-white dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-md">
                    <svg class="mx-auto h-6 w-6 mb-1 text-slate-500 dark:text-zinc-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                    <span class="font-light text-gray-500 text-xs uppercase dark:text-zinc-300 tracking-wider whitespace-nowrap">@lang('messages.t_paid_amount')</span>
                    <span class="text-sm font-bold dark:text-white text-zinc-700">@money($paid_amount, settings('currency')->code, true)</span>
                </div>
            </div>

            {{-- Project budget --}}
            <div>
                <div class="flex flex-col h-full justify-center text-center space-y-3 bg-white dark:bg-zinc-800 dark:border-transparent py-4 px-2 border rounded-md">
                    <svg class="mx-auto h-6 w-6 mb-1 text-slate-500 dark:text-zinc-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"></path></svg>
                    <span class="font-light text-gray-500 text-xs uppercase dark:text-zinc-300 tracking-wider whitespace-nowrap">@lang('messages.t_project_budget')</span>
                    <span class="text-sm font-bold dark:text-white text-zinc-700">@money($project->awarded_bid->amount, settings('currency')->code, true)</span>
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

                        {{-- Date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_date')</th>

                        {{-- Description --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_description')</th>

                        {{-- Status --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_status')</th>

                        {{-- Amount --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_amount')</th>
                        
                        {{-- Paid to freelancer --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_paid_to_freelancer')</th>

                        {{-- Options --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_options')</th>
                        
                    </tr>
                </thead>
                <thead>
                    @forelse ($project->milestones()->latest()->get() as $p)
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="freelancer-dashboard-project-milestones-{{ $p->uid }}">

                            {{-- Date --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">
                                <div class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                    {{ format_date($p->created_at) }}    
                                </div>
                            </td>

                            {{-- Description --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-48 rtl:text-right">
                                <div class="flex items-center h-full">
                                    <div class="text-gray-700 dark:text-gray-100 text-sm font-medium truncate overflow-auto w-48 flex-none">
                                        {{ $p->description }} 
                                    </div>
                                    @if (strlen($p->description) > 30)
                                        <span x-on:click="description('{{ str_replace(["'", "\n", "\r", "\r\n"], " ", $p->description) }}')" class="cursor-pointer font-medium hover:text-slate-500 text-[11px] text-slate-400 tracking-wider whitespace-nowrap mt-0.5">@lang('messages.t_read_more')</span>
                                    @endif
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                @switch($p->status)

                                    {{-- Requested --}}
                                    @case('request')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-yellow-50 text-yellow-800 dark:bg-transparent dark:text-amber-400">
                                            {{ __('messages.t_requested') }}
                                        </span>
                                        @break
                                    
                                    {{-- Paid --}}
                                    @case('paid')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-green-50 text-green-800 dark:bg-transparent dark:text-green-400">
                                            {{ __('messages.t_paid') }}
                                        </span>
                                        @break

                                    {{-- Funded --}}
                                    @case('funded')
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-sm text-xs font-medium bg-purple-50 text-purple-800 dark:bg-transparent dark:text-purple-400">
                                            {{ __('messages.t_funded') }}
                                        </span>
                                        @break

                                    @default
                                        
                                @endswitch
                            </td>

                            {{-- Amount --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                    @money(convertToNumber($p->amount), settings('currency')->code, true)
                                </div>
                            </td>

                            {{-- Paid to you --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-700 dark:text-gray-100 text-sm font-medium">
                                    @money(convertToNumber($p->amount) - convertToNumber($p->freelancer_commission), settings('currency')->code, true)
                                </div>
                            </td>

                            {{-- Options --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex items-center justify-center space-x-4 rtl:space-x-reverse">

                                    {{-- Deposit --}}
                                    @if ($p->status === 'request')
                                        <div>
                                            <button wire:click="confirmDeposit('{{ $p->uid }}')" type="button" data-tooltip-target="tooltip-actions-deposit-{{ $p->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                                <svg class="w-4.5 h-4.5" stroke="currentColor" fill="currentColor" stroke-width="0" version="1" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xmlns="http://www.w3.org/2000/svg"><path fill="#78909C" d="M40,41H8c-2.2,0-4-1.8-4-4l0-20.9c0-1.3,0.6-2.5,1.7-3.3L24,0l18.3,12.8c1.1,0.7,1.7,2,1.7,3.3V37 C44,39.2,42.2,41,40,41z"></path><rect x="14" y="1" fill="#AED581" width="20" height="31"></rect><g fill="#558B2F"><path d="M13,0v33h22V0H13z M33,31H15V2h18V31z"></path><path d="M34,3c0,1.7-0.3,3-2,3c-1.7,0-3-1.3-3-3s1.3-2,3-2C33.7,1,34,1.3,34,3z"></path><path d="M16,1c1.7,0,3,0.3,3,2s-1.3,3-3,3s-2-1.3-2-3S14.3,1,16,1z"></path><circle cx="24" cy="8" r="2"></circle><circle cx="24" cy="20" r="6"></circle></g><path fill="#CFD8DC" d="M40,41H8c-2.2,0-4-1.8-4-4l0-20l20,13l20-13v20C44,39.2,42.2,41,40,41z"></path></svg>
                                            </button>
                                            <x-forms.tooltip id="tooltip-actions-deposit-{{ $p->uid }}" :text="__('messages.t_deposit')" />
                                        </div>
                                    @endif

                                    {{-- Release --}}
                                    @if ($p->status === 'funded')
                                        <div>
                                            <button wire:click="confirmRelease('{{ $p->uid }}')" type="button" data-tooltip-target="tooltip-actions-release-{{ $p->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                                <svg class="w-4.5 h-4.5" stroke="currentColor" fill="currentColor" stroke-width="0" version="1" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xmlns="http://www.w3.org/2000/svg"><polygon fill="#E69329" points="11.7,21.6 16.8,31.5 26.3,27.6 30.7,14.9 15.9,15.7"></polygon><circle fill="#546E7A" cx="15" cy="36" r="7.8"></circle><g fill="#90A4AE"><path d="M15,27c-5,0-9,4-9,9c0,5,4,9,9,9s9-4,9-9C24,31,20,27,15,27z M15,43c-3.9,0-7-3.1-7-7c0-3.9,3.1-7,7-7 s7,3.1,7,7C22,39.9,18.9,43,15,43z"></path><rect x="14" y="33" width="2" height="8"></rect></g><g fill="#FFB74D"><path d="M12.9,36L12.9,36c1,1.9,3.2,2.7,5.1,1.7l16.5-8.5c1-0.5,1.7-1.2,2.2-1.9c1.7-3.2,5.6-10.7,8.2-17.2 l-18.2,8.7L21.9,26l-6.8,3.6C12.5,30.9,11.7,33.8,12.9,36z"></path><path d="M30.2,3L13.7,9.3c-0.7,0.2-1.5,1-2.2,1.7l-5.6,7.5c-1,1.5-1.2,3.4-0.5,5.1c0.4,1,1.7,3.4,3.1,6.1 c1.6-1.7,3.9-2.7,6.5-2.7c0.4,0,0.9,0,1.3,0.1l-2.1-4.2l4.6-4.1h8c0,0,15.5-2.2,18.2-8.7L30.2,3z"></path></g><path fill="#FFCDD2" d="M18.2,36c-1.3,0.6-2.8,0-3.3-1.3c-0.6-1.3,0-2.8,1.3-3.3C17.4,30.8,19.4,35.4,18.2,36z"></path></svg>
                                            </button>
                                            <x-forms.tooltip id="tooltip-actions-release-{{ $p->uid }}" :text="__('messages.t_release')" />
                                        </div>
                                    @endif

                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                @lang('messages.t_no_milestone_payments_created_yet')
                            </td>
                        </tr>
                    @endforelse
                </thead>
                @if ($project->milestones->count())
                    <tfoot>
                        <tr class="bg-slate-200 dark:bg-zinc-600 intro-x rounded-md h-16">
                            <th colspan="3" class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"></th>
                            <td class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-sm font-bold text-slate-600 dark:text-zinc-300">
                                @money( convertToNumber($paid_amount) + convertToNumber($payments_in_progress), settings('currency')->code, true )
                            </td>
                            <td class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-sm font-bold text-slate-600 dark:text-zinc-300">
                                @money( (convertToNumber($paid_amount) + convertToNumber($payments_in_progress)) - ((convertToNumber(settings('projects')->commission_from_freelancer) / 100) * (convertToNumber($paid_amount) + convertToNumber($payments_in_progress))), settings('currency')->code, true )
                            </td>
                            <td class="text-center py-3 px-5 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md"></td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        function FhAsclZJpDsCcbd() {
            return {

                // Read description
                description(text) {
                    window.$wireui.notify({
                        title      : "{{ __('messages.t_read_more') }}",
                        description: text,
                        icon       : 'success'
                    })
                }

            }
        }
        window.FhAsclZJpDsCcbd = FhAsclZJpDsCcbd();
    </script>
@endpush