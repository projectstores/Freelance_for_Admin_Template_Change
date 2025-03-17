<div class="w-full" x-data="window.qMCrFTGlghBsWaU" x-init="initialize">

    {{-- Section title --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                {{ __('messages.t_messages') }}
            </p>
        </div>
    </div>

    {{-- Section content --}}
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">
                        {{ __('messages.t_name') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">
                        {{ __('messages.t_email_address') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">
                        {{ __('messages.t_subject') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        {{ __('messages.t_status') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">
                        {{ __('messages.t_options') }}</th>
                </tr>
            </thead>
            <tbody class="w-full">

                @foreach ($messages as $msg)
                    <tr class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white hover:bg-gray-100 border-b border-t border-gray-100"
                        wire:key="messages-{{ $msg->id }}">

                        {{-- Name --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-medium">{{ $msg->name }}</span>
                        </td>

                        {{-- Email --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-medium">{{ $msg->email }}</span>
                        </td>

                        {{-- Subject --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-medium">{{ $msg->subject }}</span>
                        </td>

                        {{-- Status --}}
                        <td class="text-center">

                            @if (!$msg->is_seen && !$msg->is_replied)
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-blue-500 bg-blue-50">
                                    {{ __('messages.t_new') }}
                                </span>
                            @elseif ($msg->is_seen && !$msg->is_replied)
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-amber-500 bg-amber-50">
                                    {{ __('messages.t_seen') }}
                                </span>
                            @else
                                <span class="px-4 py-1 text-xs rounded-2xl font-semibold text-green-500 bg-green-50">
                                    {{ __('messages.t_replied') }}
                                </span>
                            @endif

                        </td>

                        {{-- Options --}}
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button data-dropdown-toggle="table-options-dropdown-{{ $msg->id }}"
                                        type="button"
                                        class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white hover:bg-gray-50 focus:outline-none focus:ring-0"
                                        id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </div>
                                <div id="table-options-dropdown-{{ $msg->id }}"
                                    class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="menu-button"
                                    tabindex="-1">
                                    <div class="py-1" role="none">

                                        {{-- Read --}}
                                        <button wire:click="read('{{ $msg->id }}')" wire:loading.attr="disabled"
                                            wire:target="read('{{ $msg->id }}')" type="button"
                                            class="text-gray-800 group flex items-center px-4 py-2 text-sm"
                                            role="menuitem" tabindex="-1" id="read-message-btn">

                                            {{-- Loading indicator --}}
                                            <div wire:loading wire:target="read('{{ $msg->id }}')">
                                                <svg role="status"
                                                    class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin"
                                                    viewBox="0 0 100 101" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                        fill="#E5E7EB" />
                                                    <path
                                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>

                                            {{-- Icon --}}
                                            <div wire:loading.remove wire:target="read('{{ $msg->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd"
                                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <span
                                                class="text-xs font-medium">{{ __('messages.t_read_message') }}</span>

                                        </button>

                                        {{-- Reply --}}
                                        <button x-on:click="setMessageToReply('{{ $msg->id }}')" type="button" class="text-gray-800 dark:text-gray-300 dark:hover:text-gray-400 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="reply-message-btn-{{ $msg->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span
                                                class="text-xs font-medium">{{ __('messages.t_reply_message') }}</span>
                                        </button>

                                        {{-- Ip lookup --}}
                                        <a href="https://ip-api.com/#{{ $msg->ip_address }}" target="_blank"
                                            class="text-gray-800 group flex items-center px-4 py-2 text-sm"
                                            role="menuitem" tabindex="-1">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="text-xs font-medium">{{ __('messages.t_ip_lookup') }}</span>
                                        </a>

                                        {{-- Delete --}}
                                        <button
                                            x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_delete_this') }}') ? $wire.delete('{{ $msg->id }}') : ''"
                                            wire:loading.attr="disabled" wire:target="delete('{{ $msg->id }}')"
                                            type="button"
                                            class="text-gray-800 group flex items-center px-4 py-2 text-sm"
                                            role="menuitem" tabindex="-1" >

                                            {{-- Loading indicator --}}
                                            <div wire:loading wire:target="delete('{{ $msg->id }}')">
                                                <svg role="status"
                                                    class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin"
                                                    viewBox="0 0 100 101" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                                        fill="#E5E7EB" />
                                                    <path
                                                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </div>

                                            {{-- Icon --}}
                                            <div wire:loading.remove wire:target="delete('{{ $msg->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </div>

                                            <span
                                                class="text-xs font-medium">{{ __('messages.t_delete_message') }}</span>

                                        </button>

                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if ($messages->hasPages())
        <div
            class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            {!! $messages->links('pagination::tailwind') !!}
        </div>
    @endif

    {{-- Read message modal --}}
    <x-forms.modal id="read-message" target="read-message-btn" uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

        {{-- Header --}}
        <x-slot name="title">{{ __('messages.t_read_message') }}</x-slot>

        {{-- Content --}}
        <x-slot name="content">
            <div x-html="message"></div>
        </x-slot>

    </x-forms.modal>
    
    @foreach ($messages as $msg)

        {{-- Reply message modal --}}
        <x-forms.modal id="reply-message-{{ $msg->id }}" target="reply-message-btn-{{ $msg->id }}" uid="modal_{{ uid() }}" placement="center-center" size="max-w-xl">

            {{-- Header --}}
            <x-slot name="title">{{ __('messages.t_reply_message') }}</x-slot>

            {{-- Content --}}
            <x-slot name="content">
                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                    {{-- Message --}}
                    <div class="col-span-12">
                        <x-forms.textarea
                            :label="__('messages.t_reply')"
                            :placeholder="__('messages.t_enter_ur_reply_here')"
                            model="message"
                            :rows="16"
                            icon="message-text-fast" />
                    </div>

                </div>
            </x-slot>

            {{-- Footer --}}
            <x-slot name="footer">
                <button x-on:click="sendReply" type="button" class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 rounded-md text-xs px-5 py-2.5 mb-2 focus:outline-none font-bold" wire:loading.attr="disabled" wire:target="reply">
                    {{ __('messages.t_send_reply') }}
                </button>

            </x-slot>

        </x-forms.modal>

    @endforeach

</div>

@push('scripts')
    <script>
        function qMCrFTGlghBsWaU() {
            return {

                message: null,
                id     : null,
                loading: false,

                initialize() {

                    // Read message
                    window.addEventListener('support-messages-read-response', (event) => {

                        this.message = event.detail;

                    });

                },

                setMessageToReply(id) {
                    this.id = id;
                },

                sendReply() {
                    if (!this.id) {
                        return;
                    }
                    @this.reply(this.id);
                }

            }
        }
        window.qMCrFTGlghBsWaU = qMCrFTGlghBsWaU();
    </script>
@endpush
