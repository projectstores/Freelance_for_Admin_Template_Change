<div class="w-full" x-data="window.snvtjOdCIkOPQJD">

    {{-- Loading --}}
    <x-forms.loading />
    
    {{-- Heading --}}
    <div class="mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    {{-- Section heading --}}
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        @lang('messages.t_projects')
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

                        {{-- Project --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_project')</th>

                        {{-- Bids --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_bids')</th>

                        {{-- Milestones --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_milestones')</th>

                        {{-- Status --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_status')</th>

                        {{-- Date --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_date')</th>
                        
                        {{-- Options --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 text-center border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md">@lang('messages.t_options')</th>
                        
                    </tr>
                </thead>
                <thead>
                    @forelse ($projects as $project)
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-dashboard-projects-{{ $project->uid }}">

                            {{-- Project --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                <div class="flex items-center space-x-3 rtl:space-x-reverse">

                                    {{-- Client --}}
                                    <a href="{{ admin_url('users/details/' . $project->client->uid) }}" class="h-10 w-10">
                                        <img class="w-full h-full rounded-md object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($project->client->avatar) }}" alt="{{ $project->client->username }}">
                                    </a>

                                    {{-- Project --}}
                                    <div>
                                        
                                        {{-- Title --}}
                                        <a href="{{ url('project/' . $project->pid . '/' . $project->slug) }}" target="_blank" class="font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-sm" title="{{ $project->title }}">
                                            {{ $project->title }}
                                        </a>

                                        {{-- Details --}}
                                        <div class="text-slate-500 text-xs whitespace-nowrap mt-2">
                                            <nav class="flex" aria-label="Breadcrumb">
                                                <ol role="list" class="flex items-center space-x-1 rtl:space-x-reverse">
                                                    
                                                    {{-- Budget --}}
                                                    <li>
                                                        <div class="flex items-center">
                                                            <span class="text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100">
                                                                <div class="flex items-center space-x-2 rtl:space-x-reverse text-gray-500 text-xs">
                                                                    <svg class="h-3.5 w-3.5 text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M22 6h-7a6 6 0 1 0 0 12h7v2a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h18a1 1 0 0 1 1 1v2zm-7 2h8v8h-8a4 4 0 1 1 0-8zm0 3v2h3v-2h-3z"></path></g></svg>
                                                                    <div>
                                                                        {{-- Min price --}}
                                                                        <span>@money($project->budget_min, settings('currency')->code, true)</span>
                                                
                                                                        {{-- Divider --}}
                                                                        <span class="text-xs text-gray-400 px-px">/</span>
                                                
                                                                        {{-- Max price --}}
                                                                        <span>@money($project->budget_max, settings('currency')->code, true)</span>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </li>
                                            
                                                    {{-- Clicks --}}
                                                    <li>
                                                        <div class="flex items-center">
                                                            <span class="flex-shrink-0 h-4 w-4 text-gray-400 ltr:ml-3 rtl:mr-3">|</span>
                                                            <span class="ltr:ml-1 rtl:mr-1 text-xs font-normal text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-100" aria-current="page">
                                                                <div class="flex items-center space-x-2 rtl:space-x-reverse text-gray-500 text-xs">
                                                                    <svg class="h-4 w-4 text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><circle cx="256" cy="256" r="64"></circle><path d="M490.84 238.6c-26.46-40.92-60.79-75.68-99.27-100.53C349 110.55 302 96 255.66 96c-42.52 0-84.33 12.15-124.27 36.11-40.73 24.43-77.63 60.12-109.68 106.07a31.92 31.92 0 00-.64 35.54c26.41 41.33 60.4 76.14 98.28 100.65C162 402 207.9 416 255.66 416c46.71 0 93.81-14.43 136.2-41.72 38.46-24.77 72.72-59.66 99.08-100.92a32.2 32.2 0 00-.1-34.76zM256 352a96 96 0 1196-96 96.11 96.11 0 01-96 96z"></path></svg>
                                                                    <div>
                                                                        {{ $project->counter_views }}
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </li>

                                                </ol>
                                            </nav>
                                        </div>

                                    </div>

                                </div>
                            </td>

                            {{-- Bids --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-900 dark:text-gray-100 text-sm font-bold">
                                    {{ $project->bids_count }}    
                                </div>
                            </td>

                            {{-- Milestones --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-900 dark:text-gray-100 text-sm font-bold">
                                    {{ $project->milestones_count }}    
                                </div>
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                @switch($project->status)

                                    {{-- Active --}}
                                    @case('active')
                                        <span class="bg-emerald-100 text-emerald-700 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_active')
                                        </span>
                                        @break

                                    {{-- Pending approval --}}
                                    @case('pending_approval')
                                        <div class="flex items-center flex-col">
                                            <div class="bg-yellow-100 text-yellow-600 px-4 leading-9 h-9 rounded-3xl font-medium text-xs flex items-center space-x-3 rtl:space-x-reverse">
                                                <span class="whitespace-nowrap">@lang('messages.t_pending_approval')</span>
                                                <div class="flex items-center space-x-1 rtl:space-x-reverse">

                                                    {{-- Approve --}}
                                                    <div>

                                                        {{-- Button --}}
                                                        <button type="button" data-tooltip-target="tooltip-actions-approve-{{ $project->uid }}" id="modal-approve-project-button-{{ $project->uid }}" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-white text-yellow-600 hover:bg-transparent hover:border-yellow-600">
                                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M10 15.172l9.192-9.193 1.415 1.414L10 18l-6.364-6.364 1.414-1.414z"></path></g></svg>
                                                        </button>

                                                        {{-- Tooltip --}}
                                                        <x-forms.tooltip id="tooltip-actions-approve-{{ $project->uid }}" :text="__('messages.t_approve')" />

                                                    </div>

                                                    {{-- Reject --}}
                                                    <div>

                                                        {{-- Button --}}
                                                        <button type="button" data-tooltip-target="tooltip-actions-reject-{{ $project->uid }}" id="modal-reject-project-button-{{ $project->uid }}" class="flex items-center justify-center h-6 w-6 rounded-full border border-transparent bg-white text-yellow-600 hover:bg-transparent hover:border-yellow-600">
                                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path></g></svg>
                                                        </button>

                                                        {{-- Tooltip --}}
                                                        <x-forms.tooltip id="tooltip-actions-reject-{{ $project->uid }}" :text="__('messages.t_reject')" />

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        @break

                                    {{-- Pending payment --}}
                                    @case('pending_payment')
                                        <span class="bg-amber-100 text-amber-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_pending_payment')
                                        </span>
                                        @break

                                    {{-- Completed --}}
                                    @case('completed')
                                        <span class="bg-green-100 text-green-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_completed')
                                        </span>
                                        @break

                                    {{-- Hidden --}}
                                    @case('hidden')
                                        <span class="bg-gray-100 text-gray-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_hidden')
                                        </span>
                                        @break

                                    {{-- Rejected --}}
                                    @case('rejected')
                                        <span class="bg-red-100 text-red-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_rejected')
                                        </span>
                                        @break

                                    {{-- Under development --}}
                                    @case('under_development')
                                        <span class="bg-blue-100 text-blue-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_under_development')
                                        </span>
                                        @break

                                    {{-- Pending final review --}}
                                    @case('pending_final_review')
                                        <span class="bg-fuchsia-100 text-fuchsia-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_pending_final_review')
                                        </span>
                                        @break

                                    {{-- Incomplete --}}
                                    @case('incomplete')
                                        <span class="bg-stone-100 text-stone-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_incomplete')
                                        </span>
                                        @break

                                    {{-- Closed --}}
                                    @case('closed')
                                        <span class="bg-rose-100 text-rose-600 px-4 inline-block leading-9 h-9 rounded-3xl font-medium text-xs whitespace-nowrap">
                                            @lang('messages.t_closed')
                                        </span>
                                        @break

                                    @default
                                        
                                @endswitch
                            </td>

                            {{-- Date --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="text-gray-600 dark:text-gray-100 text-sm font-medium whitespace-nowrap">
                                    {{ format_date($project->created_at) }}
                                </div>
                            </td>

                            {{-- Options --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md text-center">
                                <div class="flex items-center justify-center space-x-4 rtl:space-x-reverse">

                                    {{-- Milestones --}}
                                    @if ($project->milestones_count > 0)
                                        <div>
                                            <a href="{{ admin_url('projects/milestones/' . $project->uid) }}" data-tooltip-target="tooltip-actions-milestones-{{ $project->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                                <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M20.083 10.5l1.202.721a.5.5 0 0 1 0 .858L12 17.65l-9.285-5.571a.5.5 0 0 1 0-.858l1.202-.721L12 15.35l8.083-4.85zm0 4.7l1.202.721a.5.5 0 0 1 0 .858l-8.77 5.262a1 1 0 0 1-1.03 0l-8.77-5.262a.5.5 0 0 1 0-.858l1.202-.721L12 20.05l8.083-4.85zM12.514 1.309l8.771 5.262a.5.5 0 0 1 0 .858L12 13 2.715 7.429a.5.5 0 0 1 0-.858l8.77-5.262a1 1 0 0 1 1.03 0z"></path></g></svg>
                                            </a>
                                            <x-forms.tooltip id="tooltip-actions-milestones-{{ $project->uid }}" :text="__('messages.t_milestones')" />
                                        </div>
                                    @endif

                                    {{-- Delete --}}
                                    <div>
                                        <button type="button" data-tooltip-target="tooltip-actions-delete-{{ $project->uid }}" id="modal-delete-project-button-{{ $project->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M17 4h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5V2h10v2zM9 9v8h2V9H9zm4 0v8h2V9h-2z"></path></g></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-delete-{{ $project->uid }}" :text="__('messages.t_delete_project')" />
                                    </div>

                                </div>
                            </td>

                        </tr>

                        {{-- Approve modal --}}
                        <x-forms.modal id="modal-approve-project-container-{{ $project->uid }}" target="modal-approve-project-button-{{ $project->uid }}" uid="modal_approve_project_{{ $project->uid }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_approve_project') }}</x-slot>

                            {{-- Modal content --}}
                            <x-slot name="content">
                                <div class="flex text-gray-500 font-normal text-sm">@lang('messages.t_are_u_sure_approve_project_admin')</div>
                                <a href="{{ url('project/' . $project->pid . '/' . $project->slug) }}" target="_blank" class="text-zinc-700 hover:text-primary-600 font-semibold text-[13px] block">{{ $project->title }}</a>
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
                                        wire:click="approve('{{ $project->id }}')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-green-500 text-white hover:bg-green-600 focus:ring focus:ring-green-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="approve('{{ $project->id }}')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="approve('{{ $project->id }}')">
                                            @lang('messages.t_approve_project')
                                        </div>

                                    </button>

                                </div>
                            </x-slot>

                        </x-forms.modal>

                        {{-- Reject modal --}}
                        <x-forms.modal id="modal-reject-project-container-{{ $project->uid }}" target="modal-reject-project-button-{{ $project->uid }}" uid="modal_reject_project_{{ $project->uid }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_reject_project') }}</x-slot>

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
                                        wire:click="reject('{{ $project->id }}')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-red-500 text-white hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="reject('{{ $project->id }}')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="reject('{{ $project->id }}')">
                                            @lang('messages.t_reject_project')
                                        </div>

                                    </button>

                                </div>
                            </x-slot>

                        </x-forms.modal>

                        {{-- Delete modal --}}
                        <x-forms.modal id="modal-delete-project-container-{{ $project->uid }}" target="modal-delete-project-button-{{ $project->uid }}" uid="modal_delete_project_{{ $project->uid }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_delete_project') }}</x-slot>

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
                                        {!! nl2br(__('messages.t_delete_project_admin_alert')) !!}
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
                                        wire:click="delete('{{ $project->id }}')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-red-500 text-white hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="delete('{{ $project->id }}')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="delete('{{ $project->id }}')">
                                            @lang('messages.t_delete_project')
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
    @if ($projects->hasPages())
        <div class="flex justify-center pt-12">
            {!! $projects->links('pagination::tailwind') !!}
        </div>
    @endif

</div>

@push('scripts')
    <script>
        function snvtjOdCIkOPQJD() {
            return {

                // Read rejection reason
                rejection(text) {
                    window.$wireui.notify({
                        title      : "{{ __('messages.t_rejection_reason') }}",
                        description: text,
                        icon       : 'error'
                    })
                }

            }
        }
        window.snvtjOdCIkOPQJD = snvtjOdCIkOPQJD();
    </script>
@endpush