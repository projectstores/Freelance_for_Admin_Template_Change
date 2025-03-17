<div class="w-full" x-data="window.qJEjXlEwngQOsVK">

    {{-- Loading --}}
    <x-forms.loading />
    
    {{-- Heading --}}
    <div class="mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    {{-- Section heading --}}
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        @lang('messages.t_conversations')
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
            
                            {{-- Messages --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('messages.t_messages')
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                {{-- Actions --}}
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    {{-- Settings --}}
                    <span class="">
                        <a href="{{ admin_url('settings/chat') }}" class="relative inline-flex items-center px-4 py-3 border border-gray-300 dark:border-zinc-600 dark:hover:bg-zinc-700 dark:text-gray-200 bg-white dark:bg-zinc-800 text-[13px] font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600 shadow-sm rounded">
                            @lang('messages.t_settings')
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

                        {{-- From --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_from')</th>

                        {{-- To --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_to')</th>

                        {{-- Status --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_status')</th>

                        {{-- Date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_date')</th>
                        
                        {{-- Options --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_options')</th>
                        
                    </tr>
                </thead>
                <thead>
                    @forelse ($messages as $msg)
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-dashboard-messages-{{ $msg->id }}">

                            {{-- From --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-96 rtl:text-right">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <img class="w-10 h-10 rounded-md object-contain lazy flex-shrink-0 bg-slate-100" src="{{ placeholder_img() }}" data-src="{{ src($msg->from->avatar) }}" alt="{{ $msg->from->username }}">
                                    <div class="space-y-1 font-medium dark:text-white">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                            {{-- Username / Fullname --}}
                                            <a href="{{ url('profile', $msg->from->username) }}" target="_blank" class="font-bold whitespace-nowrap truncate block max-w-[240px] hover:text-zinc-900 dark:text-white text-sm text-zinc-700" title="{{ $msg->from->username }}">
                                                {{ $msg->from->fullname ? $msg->from->fullname : $msg->from->username }}
                                            </a>

                                        </div>
                                        <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs font-normal text-gray-400 dark:text-zinc-300">
                
                                            {{-- Details --}}
                                            <a href="{{ admin_url('users/details/' . $msg->from->uid) }}" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                @lang('messages.t_user_details')   
                                            </a>
                        
                                            {{-- Divider --}}
                                            <div class="mx-2 my-0.5 text-gray-200 dark:text-zinc-600">|</div>

                                            {{-- View profile --}}
                                            <a href="{{ url('profile', $msg->from->username) }}" target="_blank" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                @lang('messages.t_view_profile')    
                                            </a>
                        
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- To --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-96 rtl:text-right">
                                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                    <img class="w-10 h-10 rounded-md object-contain lazy flex-shrink-0 bg-slate-100" src="{{ placeholder_img() }}" data-src="{{ src($msg->to->avatar) }}" alt="{{ $msg->to->username }}">
                                    <div class="space-y-1 font-medium dark:text-white">
                                        <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                            {{-- Username / Fullname --}}
                                            <a href="{{ url('profile', $msg->to->username) }}" target="_blank" class="font-bold whitespace-nowrap truncate block max-w-[240px] hover:text-zinc-900 dark:text-white text-sm text-zinc-700" title="{{ $msg->to->username }}">
                                                {{ $msg->to->fullname ? $msg->to->fullname : $msg->to->username }}
                                            </a>

                                        </div>
                                        <div class="flex items-center space-x-3 rtl:space-x-reverse text-xs font-normal text-gray-400 dark:text-zinc-300">
                
                                            {{-- Details --}}
                                            <a href="{{ admin_url('users/details/' . $msg->to->uid) }}" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                @lang('messages.t_user_details')   
                                            </a>
                        
                                            {{-- Divider --}}
                                            <div class="mx-2 my-0.5 text-gray-200 dark:text-zinc-600">|</div>

                                            {{-- View profile --}}
                                            <a href="{{ url('profile', $msg->to->username) }}" target="_blank" class="dark:text-zinc-300 whitespace-nowrap hover:text-gray-600 hover:underline">
                                                @lang('messages.t_view_profile')    
                                            </a>
                        
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                @if ($msg->seen)
                                    <svg class="mx-auto h-6 w-6 text-blue-500" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg>
                                @else
                                    <svg class="mx-auto h-6 w-6 text-slate-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m2.394 13.742 4.743 3.62 7.616-8.704-1.506-1.316-6.384 7.296-3.257-2.486zm19.359-5.084-1.506-1.316-6.369 7.279-.753-.602-1.25 1.562 2.247 1.798z"></path></svg>
                                @endif
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-600 dark:text-gray-100 text-sm font-medium whitespace-nowrap">
                                    {{ format_date($msg->created_at) }}
                                </div>
                            </td>

                            {{-- Options --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex justify-center items-center space-x-2 rtl:space-x-reverse">

                                    {{-- View message --}}
                                    <div>
                                        <button type="button" id="modal-view-button-{{ $msg->id }}" data-tooltip-target="tooltip-actions-view-{{ $msg->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-view-{{ $msg->id }}" :text="__('messages.t_view')" />
                                    </div>

                                    {{-- Delete message --}}
                                    <div>
                                        <button type="button" wire:click="confirmDelete('{{ $msg->id }}')" data-tooltip-target="tooltip-actions-delete-{{ $msg->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-red-600 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none dark:bg-zinc-700 dark:border-zinc-700 dark:hover:bg-zinc-900 dark:hover:border-zinc-900 dark:text-zinc-400 dark:hover:text-zinc-100">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="none" stroke-width="1" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-delete-{{ $msg->id }}" :text="__('messages.t_delete')" />
                                    </div>
                                        
                                </div>
                            </td>

                        </tr>

                        {{-- View message --}}
                        <x-forms.modal id="modal-view-container-{{ $msg->id }}" target="modal-view-button-{{ $msg->id }}" uid="modal_msg_details_{{ uid() }}" placement="center-center" size="max-w-xl">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_read_message') }}</x-slot>

                            {{-- Modal content --}}
                            <x-slot name="content">
                                <div class="w-full divide-y divide-gray-300 space-y-8">
                                    
                                    {{-- Message --}}
                                    @if ($msg->body)
                                        <div class="w-full">
                                            <span class="mb-2 block text-sm font-bold tracking-wide text-zinc-700">@lang('messages.t_message')</span>
                                            <div class="text-gray-400 text-sm leading-relaxed dark:text-zinc-300">
                                                {{ $msg->body }}
                                            </div>
                                        </div>
                                    @endif
    
                                    {{-- Attachment --}}
                                    @if ($msg->attachment)
                                        <div class="w-full pb-4">
                                                
                                            {{-- Label --}}
                                            <span class="{{ $msg->body ? 'mt-8' : '' }} mb-2 block text-sm font-bold tracking-wide text-zinc-700">@lang('messages.t_attachment')</span>
    
                                            {{-- File --}}
                                            @php
                                                $attachment = json_decode($msg->attachment)
                                            @endphp
                                            <div class="mt-6 flex">

                                                {{-- File extension preview --}}
                                                <div class="w-10 flex flex-col items-center">
                                                    <div class="fiv-sqo fiv-icon-{{ $attachment->extension }} text-4xl"></div>
                                                </div>

                                                {{-- File details --}}
                                                <div class="ltr:pl-3 rtl:pr-3">

                                                    {{-- File name --}}
                                                    <p class="focus:outline-none text-sm font-semibold leading-normal text-gray-800 pb-1 -mt-1 dark:text-zinc-200">
                                                        {{ $attachment->old_name }}
                                                    </p>

                                                    {{-- Date / Download --}}
                                                    <div class="focus:outline-none text-xs leading-3 text-gray-500 pt-1 space-x-2 rtl:space-x-reverse dark:text-zinc-400">
                                                        
                                                        {{-- Download --}}
                                                        <a href="{{ url('inbox/download', $attachment->new_name) }}" class="text-primary-600 hover:underline">@lang('messages.t_download')</a>

                                                        {{-- Divider --}}
                                                        <span class="text-gray-300 dark:text-zinc-600" aria-hidden="true">|</span>

                                                        {{-- Size --}}
                                                        <span>{{ human_filesize($attachment->size) }}</span>

                                                    </div>
                                                </div>

                                            </div>
    
                                        </div>
                                    @endif

                                </div>
                            </x-slot>

                        </x-forms.modal>

                    @empty
                        <tr>
                            <td colspan="5" class="py-4.5 font-light text-sm text-gray-400 dark:text-zinc-200 text-center tracking-wide shadow-sm bg-white dark:bg-zinc-800 rounded-md">
                                @lang('messages.t_no_results_found')
                            </td>
                        </tr>
                    @endforelse
                </thead>
            </table>
        </div>
    </div>

    {{-- Pages --}}
    @if ($messages->hasPages())
        <div class="flex justify-center pt-12">
            {!! $messages->links('pagination::tailwind') !!}
        </div>
    @endif

</div>

@push('styles')
    <link rel="stylesheet" href="{{ url('public/js/plugins/file-icon-vectors/file-icon-vectors.min.css') }}" />
@endpush