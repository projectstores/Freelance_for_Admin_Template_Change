<div class="w-full" x-data="window.IZxARBtwskgWEwM">

    {{-- Loading --}}
    <x-forms.loading />
    
    {{-- Heading --}}
    <div class="mb-16">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    {{-- Section heading --}}
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        @lang('messages.t_reported_projects')
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

                        {{-- Project --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_project')</th>

                        {{-- User --}}
                        <th class="font-bold tracking-wider text-gray-600 px-5 py-4.5 border-b-0 whitespace-nowrap text-xs uppercase dark:text-zinc-300 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md rtl:text-right">@lang('messages.t_user')</th>

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
                        <tr class="intro-x shadow-sm bg-white dark:bg-zinc-800 rounded-md h-16" wire:key="admin-dashboard-reported-projects-{{ $r->uid }}">

                            {{-- Project --}}
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-52 rtl:text-right">
                                <div class="flex items-center space-x-3 rtl:space-x-reverse">

                                    {{-- Client --}}
                                    <a href="{{ admin_url('users/details/' . $r->project->client->uid) }}" class="h-10 w-10">
                                        <img class="w-full h-full rounded-md object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($r->project->client->avatar) }}" alt="{{ $r->project->client->username }}">
                                    </a>

                                    {{-- Project --}}
                                    <div>
                                        
                                        {{-- Title --}}
                                        <a href="{{ url('project/' . $r->project->pid . '/' . $r->project->slug) }}" target="_blank" class="font-medium whitespace-nowrap truncate block max-w-[240px] hover:text-primary-600 dark:text-white text-sm" title="{{ $r->project->title }}">
                                            {{ $r->project->title }}
                                        </a>

                                        {{-- Project's status --}}
                                        <div class="text-slate-500 text-xs whitespace-nowrap">
                                            @switch($r->project->status)

                                                {{-- Active --}}
                                                @case('active')
                                                    <span class="bg-emerald-100 text-emerald-700 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_active')
                                                    </span>
                                                    @break

                                                {{-- Pending payment --}}
                                                @case('pending_payment')
                                                    <span class="bg-amber-100 text-amber-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_pending_payment')
                                                    </span>
                                                    @break

                                                {{-- Completed --}}
                                                @case('completed')
                                                    <span class="bg-green-100 text-green-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_completed')
                                                    </span>
                                                    @break

                                                {{-- Hidden --}}
                                                @case('hidden')
                                                    <span class="bg-gray-100 text-gray-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_hidden')
                                                    </span>
                                                    @break

                                                {{-- Rejected --}}
                                                @case('rejected')
                                                    <span class="bg-red-100 text-red-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_rejected')
                                                    </span>
                                                    @break

                                                {{-- Under development --}}
                                                @case('under_development')
                                                    <span class="bg-blue-100 text-blue-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_under_development')
                                                    </span>
                                                    @break

                                                {{-- Pending final review --}}
                                                @case('pending_final_review')
                                                    <span class="bg-fuchsia-100 text-fuchsia-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_pending_final_review')
                                                    </span>
                                                    @break

                                                {{-- Incomplete --}}
                                                @case('incomplete')
                                                    <span class="bg-stone-100 text-stone-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_incomplete')
                                                    </span>
                                                    @break

                                                {{-- Closed --}}
                                                @case('closed')
                                                    <span class="bg-rose-100 text-rose-600 py-1 px-2 rounded-sm inline-block  font-medium text-xs whitespace-nowrap">
                                                        @lang('messages.t_closed')
                                                    </span>
                                                    @break

                                                @default
                                                    
                                            @endswitch
                                        </div>

                                    </div>

                                </div>
                            </td>

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
                            <td class="px-5 py-3 first:ltr:rounded-l-md last:ltr:rounded-r-md first:rtl:rounded-r-md last:rtl:rounded-l-md w-44">
                                <div class="whitespace-nowrap text-sm font-medium text-zinc-700 truncate w-44 block">
                                    @lang('messages.t_report_project_' . $r->reason)
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

@push('scripts')
    <script>
        function IZxARBtwskgWEwM() {
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
        window.IZxARBtwskgWEwM = IZxARBtwskgWEwM();
    </script>
@endpush