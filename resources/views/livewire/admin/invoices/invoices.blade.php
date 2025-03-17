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
                        @lang('messages.t_invoices')
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
            
                            {{-- Invoices --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('messages.t_invoices')
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

                        {{-- Buyer --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_buyer')</th>

                        {{-- Payment method --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_payment_method')</th>

                        {{-- Amount --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_amount')</th>

                        {{-- Date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_date')</th>

                        {{-- Status --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_status')</th>
                        
                        {{-- Options --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_options')</th>
                        
                    </tr>
                </thead>
                <thead>
                    @forelse ($invoices as $i)

                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-invoices-{{ $i->uid }}">

                            {{-- Buyer --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-64 rtl:text-right">
                                <div class="flex items-center space-x-3 rtl:space-x-reverse w-64">

                                    {{-- Avatar --}}
                                    <a href="{{ url('profile', $i->order->buyer->username) }}" target="_blank" class="h-10 w-10 flex-shrink-0">
                                        <img class="w-full h-full rounded-md object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($i->order->buyer->avatar) }}" alt="{{ $i->order->buyer->username }}">
                                    </a>

                                    {{-- Details --}}
                                    <div>
                                        
                                        {{-- Name --}}
                                        <div class="font-medium whitespace-nowrap truncate block hover:text-primary-600 dark:text-white text-sm max-w-[240px]">
                                            {{ $i->order->buyer->fullname ?? $i->order->buyer->username }}
                                        </div>

                                        {{-- Email --}}
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-2 max-w-[240px] truncate block">
                                            {{ $i->order->buyer->email }}
                                        </div>

                                    </div>

                                </div>
                            </td>

                            {{-- Payment method --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">
                                <div class="flex flex-col">

                                    {{-- Name --}}
                                    <div class="font-normal whitespace-nowrap truncate block dark:text-zinc-200 text-[13px] text-gray-600">
                                                    
                                        {{-- Check payment gateway --}}
                                        @if ($i->payment_method === "offline")
                            
                                            {{-- Check if offline payment has a name --}}
                                            @if ( !empty(payment_gateway($i->payment_method, false, true)->name) )
                                                
                                                {{-- Offline method --}}
                                                {{ payment_gateway($i->payment_method, false, true)?->name }}
    
                                            @else
    
                                                {{-- Not available --}}
                                                -
    
                                            @endif
    
                                        @elseif ( !empty(payment_gateway($i->payment_method)->name) )
    
                                            {{-- Method name --}}
                                            {{ payment_gateway($i->payment_method)?->name }}
    
                                        @elseif ($i->payment_method === "wallet")

                                            @lang('messages.t_wallet')

                                        @else
    
                                            -
    
                                        @endif
    
                                    </div>

                                    {{-- Transaction id --}}
                                    <span class="text-xs tracking-wide text-gray-400 mt-1">{{ $i->payment_id }}</span>

                                </div>
                            </td>

                            {{-- Amount --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <span class="text-sm font-bold text-zinc-900 tracking-wide">@money($i->order->total_value, settings('currency')->code, true)</span>
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-500 dark:text-gray-100 text-[13px] font-normal whitespace-nowrap">
                                    {{ format_date($i->created_at) }}
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                @switch($i->status)

                                    {{-- Paid --}}
                                    @case('paid')
                                        <span class="bg-emerald-100 text-emerald-700 px-4 py-2 inline-block rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_paid')
                                        </span>
                                    @break

                                    {{-- Pending --}}
                                    @case('pending')
                                        <span class="bg-amber-100 text-amber-700 px-4 py-2 inline-block rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_pending')
                                        </span>
                                    @break
                                        
                                @endswitch
                            </td>

                            {{-- Options --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse">

                                    {{-- Order details --}}
                                    <div>
                                        <a href="{{ admin_url('orders/details/' . $i->order->uid) }}" data-tooltip-target="tooltip-actions-details-{{ $i->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"/> <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"/> <path d="M9 12h6"/> <path d="M9 16h6"/></svg>
                                        </a>
                                        <x-forms.tooltip id="tooltip-actions-details-{{ $i->id }}" :text="__('messages.t_order_details')" />
                                    </div>

                                    {{-- Check if payment pending --}}
                                    @if ($i->status === 'pending' && $i->payment_method === "offline")
                                        <div>
                                            <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_received_invocie_payment') }}') ? $wire.paid('{{ $i->id }}') : ''" wire:loading.attr="disabled" wire:target="paid('{{ $i->id }}')" type="button" data-tooltip-target="tooltip-actions-received-{{ $i->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"/> <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12"/> <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4"/></svg>
                                            </button>
                                            <x-forms.tooltip id="tooltip-actions-received-{{ $i->id }}" :text="__('messages.t_payment_received')" />
                                        </div>
                                    @endif

                                </div>
                            </td>

                        </tr>

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
    @if ($invoices->hasPages())
        <div class="flex justify-center pt-12">
            {!! $invoices->links('pagination::tailwind') !!}
        </div>
    @endif

</div>