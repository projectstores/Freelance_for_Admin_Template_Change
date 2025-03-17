<div class="w-full" x-data>
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
        
        {{-- Reason // Refund details --}}
        <div class="col-span-12 lg:col-span-6">

            {{-- Reason --}}
            <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pb-4 ltr:text-left rtl:text-right overflow-hidden shadow transform transition-all sm:align-middle sm:p-6 mb-8 w-full">
                <div>
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                    </div>
                    <div class="mt-3 sm:mt-5">
                        <h3 class="text-lg text-center leading-6 font-medium text-gray-900" id="modal-title">
                            {{ __('messages.t_refund_reason') }}
                        </h3>
                        <div class="text-center my-4">
                            @switch($refund->status)

                                {{-- Pending --}}
                                @case('pending')
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                        {{ __('messages.t_pending') }}
                                    </span>
                                    @break

                                {{-- Closed --}}
                                @case('closed')
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-gray-500 bg-gray-50">
                                        {{ __('messages.t_closed') }}
                                    </span>
                                    @break

                                {{-- Rejected by seller --}}
                                @case('rejected_by_seller')
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                        {{ __('messages.t_declined_by_seller') }}
                                    </span>
                                    @break

                                {{-- Rejected by admin --}}
                                @case('rejected_by_admin')
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-red-500 bg-red-50">
                                        {{ __('messages.t_declined_by_admin', ['app_name' => config('app.name')]) }}
                                    </span>
                                    @break

                                {{-- Approved by seller --}}
                                @case('accepted_by_seller')
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                        {{ __('messages.t_approved_by_seller') }}
                                    </span>
                                    @break

                                {{-- Approved by admin --}}
                                @case('accepted_by_admin')
                                    <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                        {{ __('messages.t_approved_by_admin', ['app_name' => config('app.name')]) }}
                                    </span>
                                    @break
                                    
                            @endswitch
                        </div>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{ $refund->reason }}
                            </p>
                        </div>
                    </div>
                </div>

                @if ($refund->status === 'rejected_by_seller' && $refund->request_admin_intervention)
                    <div class="mt-5 sm:mt-6 sm:grid sm:grid-cols-2 sm:gap-3 sm:grid-flow-row-dense">

                        {{-- Give refund --}}
                        <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_approve_this_refund') }}') ? $wire.accept : ''" wire:loading.attr="disabled" wire:target="accept" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-primary-600 text-base font-medium text-white hover:bg-primary-700 focus:outline-none sm:col-start-2 sm:text-sm">
                            
                            {{-- Loading indicator --}}
                            <div wire:loading wire:target="accept">
                                <svg role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                </svg>
                            </div>

                            {{-- Button text --}}
                            <div wire:loading.remove wire:target="accept">
                                {{ __('messages.t_give_refund') }}
                            </div>

                        </button>

                        {{-- Decline refund --}}
                        <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_decline_this_refund') }}') ? $wire.decline : ''" wire:loading.attr="disabled" wire:target="decline" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:col-start-1 sm:text-sm">
                        
                            {{-- Loading indicator --}}
                            <div wire:loading wire:target="decline">
                                <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                </svg>
                            </div>

                            {{-- Button text --}}
                            <div wire:loading.remove wire:target="decline">
                                {{ __('messages.t_decline_refund') }}
                            </div>

                        </button>

                    </div>
                @endif
            </div>

            {{-- Refund details --}}
            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-base leading-6 font-medium text-gray-900">
                        {{ __('messages.t_item_details') }}
                    </h3>
                </div>
                <div class="border-t border-gray-200">
                    <dl>

                        {{-- gig --}}
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-[13px] font-medium text-gray-500">
                                {{ __('messages.t_item_gig') }}
                            </dt>
                            <dd class="mt-1 text-[13px] font-medium text-primary-700 hover:text-primary-600 sm:mt-0 sm:col-span-2">
                                <a href="{{ url('service', $refund->item->gig->slug) }}" target="_blank">{{ $refund->item->gig->title }}</a>
                            </dd>
                        </div>

                        {{-- Amount --}}
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-[13px] font-medium text-gray-500">
                                {{ __('messages.t_amount') }}
                            </dt>
                            <dd class="mt-1 text-[13px]  font-extrabold text-gray-900 sm:mt-0 sm:col-span-2">
                                @money($refund->item->total_value, settings('currency')->code, true)
                            </dd>
                        </div>

                        {{-- Buyer --}}
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-[13px] font-medium text-gray-500">
                                {{ __('messages.t_buyer') }}
                            </dt>
                            <dd class="mt-1 text-[13px] font-medium text-primary-700 hover:text-primary-600 sm:mt-0 sm:col-span-2">
                                <a href="{{ admin_url('users/details/' . $refund->buyer->uid) }}" target="_blank">{{ $refund->buyer->username }}</a>
                            </dd>
                        </div>

                        {{-- Item status --}}
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-[13px] font-medium text-gray-500">
                                {{ __('messages.t_item_status') }}
                            </dt>
                            <dd class="mt-1 text-[13px] font-medium sm:mt-0 sm:col-span-2">
                                @if ($refund->item->refund && $refund->item->refund->status === 'pending')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        {{ __('messages.t_dispute_opened') }}
                                    </span>
                                @else
                                    @switch($refund->item->status)

                                        {{-- Pending --}}
                                        @case('pending')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                {{ __('messages.t_pending') }}
                                            </span>
                                            @break
                                        
                                        {{-- Delivered --}}
                                        @case('delivered')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                {{ __('messages.t_delivered') }}
                                            </span>
                                            @break

                                        {{-- Refunded --}}
                                        @case('refunded')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                {{ __('messages.t_refunded') }}
                                            </span>
                                            @break

                                        {{-- Proceeded --}}
                                        @case('proceeded')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ __('messages.t_in_the_process') }}
                                            </span>
                                            @break

                                        {{-- Canceled --}}
                                        @case('canceled')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                                {{ __('messages.t_canceled') }}
                                            </span>
                                            @break

                                        @default
                                            
                                    @endswitch
                                @endif
                            </dd>
                        </div>
                        
                    </dl>
                </div>
            </div>

        </div>

        {{-- Conversation --}}
        <div class="col-span-12 lg:col-span-6">
            <div class="bg-white shadow-sm rounded-md overflow-hidden border border-gray-100">
                <div class="divide-y divide-gray-200">
                    <div class="px-4 py-5 sm:px-6">
                        <h2 class="text-base leading-6 font-medium text-gray-900">{{ __('messages.t_conversation') }}</h2>
                    </div>
                    <div class="px-4 py-6 sm:px-6">
                        <ul role="list" class="space-y-8">
                        
                            @forelse ($messages as $msg)
                                <li>
                                    <div class="relative {{ !$loop->last ? 'pb-8' : '' }}">
                                        @if (!$loop->last)
                                            <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200"></span>
                                        @endif
                                        <div class="relative flex items-start space-x-3 rtl:space-x-reverse">

                                            <div class="relative">
                                                <img class="h-10 w-10 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ $msg->author_type === 'buyer' ? src($msg->buyer->avatar) : src($msg->seller->avatar) }}" alt="{{ $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username }}">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                                <div>
                                                    <div class="text-sm">
                                                        <a href="{{ url('profile', $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username) }}"
                                                            target="_blank" class="font-medium text-gray-900 hover:text-primary-600">{{ $msg->author_type === 'buyer' ? $msg->buyer->username : $msg->seller->username }}</a>
                                                    </div>
                                                    <p class="mt-0.5 text-xs text-gray-500">
                                                        {{ format_date($msg->created_at, 'ago') }}
                                                    </p>
                                                </div>
                                                <div class="mt-2 text-sm text-gray-700">
                                                    <p>
                                                        {{ $msg->message }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <span class="text-center text-gray-400 block py-12 font-extrabold text-xs tracking-wider">{{ __('messages.t_no_messages_in_this_refund_conversation') }}</span>
                            @endforelse
                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
