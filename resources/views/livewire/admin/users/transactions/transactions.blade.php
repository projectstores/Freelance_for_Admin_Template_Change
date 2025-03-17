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
                        @lang('messages.t_deposit_history')
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
            
                            {{-- Transactions --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('messages.t_transactions')
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
            <table class="{{ $transactions->count() ? 'w-0 block' : 'w-full' }} text-left border-spacing-y-[10px] border-separate -mt-2">
                <thead class="">
                    <tr class="bg-slate-200 dark:bg-zinc-600">

                        {{-- User --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_user')</th>

                        {{-- Payment method --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_payment_method')</th>

                        {{-- Amount --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_amount')</th>

                        {{-- Fee --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_fee')</th>

                        {{-- Total --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_total')</th>

                        {{-- Date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_date')</th>

                        {{-- Status --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_status')</th>
                        
                        {{-- Options --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_options')</th>
                        
                    </tr>
                </thead>
                <thead>
                    @forelse ($transactions as $t)
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-user-transactions-{{ $t->uid }}">

                            {{-- User --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-44 rtl:text-right">
                                <div class="flex items-center space-x-3 rtl:space-x-reverse w-44">

                                    {{-- Avatar --}}
                                    <a href="{{ url('profile', $t->user->username) }}" target="_blank" class="h-10 w-10 flex-shrink-0">
                                        <img class="w-full h-full rounded-md object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($t->user->avatar) }}" alt="{{ $t->user->username }}">
                                    </a>

                                    {{-- Details --}}
                                    <div>
                                        
                                        {{-- Name --}}
                                        <div class="font-medium whitespace-nowrap truncate block hover:text-primary-600 dark:text-white text-sm">
                                            {{ $t->user->fullname ?? $t->user->username }}
                                        </div>

                                        {{-- Email --}}
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-2">
                                            {{ $t->user->email }}
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
                                        @if ($t->payment_method === "offline")
                            
                                            {{-- Check if offline payment has a name --}}
                                            @if ( !empty(payment_gateway($t->payment_method, false, true)->name) )
                                                
                                                {{-- Offline method --}}
                                                {{ payment_gateway($t->payment_method, false, true)?->name }}
    
                                            @else
    
                                                {{-- Not available --}}
                                                -
    
                                            @endif
    
                                        @elseif ( !empty(payment_gateway($t->payment_method)->name) )
    
                                            {{-- Method name --}}
                                            {{ payment_gateway($t->payment_method)?->name }}
    
                                        @else
    
                                            -
    
                                        @endif
    
                                    </div>

                                    {{-- Transaction id --}}
                                    <span class="text-xs tracking-wide text-gray-400 mt-1">{{ $t->transaction_id }}</span>

                                </div>
                            </td>

                            {{-- Amount --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <span class="text-sm font-bold text-zinc-900 tracking-wide">@money($t->amount_net, settings('currency')->code, true)</span>
                            </td>

                            {{-- Fee --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <span class="text-sm font-bold text-zinc-900 tracking-wide">@money($t->amount_fee, settings('currency')->code, true)</span>
                            </td>

                            {{-- Total --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <span class="text-sm font-bold text-zinc-900 tracking-wide">@money($t->amount_total, settings('currency')->code, true)</span>
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-500 dark:text-gray-100 text-[13px] font-normal whitespace-nowrap">
                                    {{ format_date($t->created_at) }}
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                @switch($t->status)

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

                                    {{-- Rejected --}}
                                    @case('rejected')
                                        <span class="bg-red-100 text-red-600 px-4 py-2 inline-block rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_rejected')
                                        </span>
                                    @break
                                        
                                @endswitch
                            </td>

                            {{-- Options --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">

                                {{-- Check if payment pending --}}
                                @if ($t->status === 'pending' && $t->payment_method === "offline")
                                    <div class="flex items-center justify-center space-x-3 rtl:space-x-reverse">

                                        {{-- Approve --}}
                                        <div>
                                            <button type="button" wire:click="approve('{{ $t->id }}')" data-tooltip-target="tooltip-actions-approve-{{ $t->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m10 15.586-3.293-3.293-1.414 1.414L10 18.414l9.707-9.707-1.414-1.414z"></path></svg>
                                            </button>
                                            <x-forms.tooltip id="tooltip-actions-approve-{{ $t->id }}" :text="__('messages.t_approve_payment')" />
                                        </div>
    
                                        {{-- Reject --}}
                                        <div>
                                            <button type="button" id="modal-reject-payment-button-{{ $t->id }}" data-tooltip-target="tooltip-actions-reject-{{ $t->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m16.192 6.344-4.243 4.242-4.242-4.242-1.414 1.414L10.535 12l-4.242 4.242 1.414 1.414 4.242-4.242 4.243 4.242 1.414-1.414L13.364 12l4.242-4.242z"></path></svg>
                                            </button>
                                            <x-forms.tooltip id="tooltip-actions-reject-{{ $t->id }}" :text="__('messages.t_reject_payment')" />
                                        </div>

                                    </div>
                                @endif

                            </td>

                        </tr>

                        {{-- Reject reason --}}
                        <x-forms.modal id="modal-reject-payment-container-{{ $t->id }}" target="modal-reject-payment-button-{{ $t->id }}" uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_rejection_reason') }}</x-slot>

                            {{-- Modal content --}}
                            <x-slot name="content">

                                    {{-- Rejection reason --}}
                                    <div class="w-fill mb-6">
                                        {{-- Form control --}}
                                        <div class="relative w-full shadow-sm">
                        
                                            {{-- Input --}}
                                            <textarea wire:model.defer="rejection_reason" id="bid-report-description-input" class="{{ $errors->first('rejection_reason') ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300' }} border text-gray-900 text-sm rounded-lg font-medium block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 placeholder:font-normal" rows="8" placeholder="{{ __('messages.t_enter_rejection_reason') }}"></textarea>
                        
                                            {{-- Icon --}}
                                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300 uppercase">
                                                <svg class="w-5 h-5 text-gray-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 2H8C4.691 2 2 4.691 2 8v13a1 1 0 0 0 1 1h13c3.309 0 6-2.691 6-6V8c0-3.309-2.691-6-6-6zm4 14c0 2.206-1.794 4-4 4H4V8c0-2.206 1.794-4 4-4h8c2.206 0 4 1.794 4 4v8z"></path><path d="M11 6h2v8h-2zm0 10h2v2h-2z"></path></svg>
                                            </div>
                        
                                        </div>
                        
                                        {{-- Error --}}
                                        @error('rejection_reason')
                                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">
                                                {{ $errors->first('rejection_reason') }}
                                            </p>
                                        @enderror
                                    </div>

                                    {{-- Reject --}}
                                    <div>
                                        <button 
                                            wire:click="reject({{ $t->id }})"
                                            wire:loading.class="border-gray-200 bg-gray-200 text-gray-700 cursor-not-allowed"
                                            wire:loading.class.remove="border-red-200 bg-red-200 text-red-700 hover:text-red-700 hover:bg-red-300 hover:border-red-300 active:bg-red-200 focus:ring-red-500"
                                            wire:loading.attr="disabled" 
                                            type="button" 
                                            class="w-full inline-flex text-xs justify-center items-center border font-semibold focus:outline-none px-3 py-2 leading-5 rounded border-red-200 bg-red-200 text-red-700 hover:text-red-700 hover:bg-red-300 hover:border-red-300 active:bg-red-200 focus:ring-red-500 focus:ring focus:ring-opacity-50">

                                            {{-- Loading indicator --}}
                                            <div wire:loading wire:target="reject({{ $t->id }})">
                                                <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                </svg>
                                            </div>

                                            {{-- Button text --}}
                                            <div wire:loading.remove wire:target="reject({{ $t->id }})">
                                                @lang('messages.t_reject_payment')
                                            </div>

                                        </button>
                                    </div>

                            </x-slot>

                        </x-forms.modal>

                    @empty
                        <tr>
                            <td colspan="9" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                @lang('messages.t_no_results_found')
                            </td>
                        </tr>
                    @endforelse
                </thead>
            </table>
        </div>
    </div>

    {{-- Pages --}}
    @if ($transactions->hasPages())
        <div class="flex justify-center pt-12">
            {!! $transactions->links('pagination::tailwind') !!}
        </div>
    @endif

</div>