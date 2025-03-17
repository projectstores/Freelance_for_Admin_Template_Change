<div class="flex flex-col rounded-lg shadow bg-white overflow-hidden relative">
   
    {{-- Loading Indicator --}}
    <div wire:loading wire:loading.block>
        <div class="absolute w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50 rounded-lg">
            <div class="lds-ripple"><div></div><div></div></div>
        </div>
    </div>

    {{-- Section header --}}
    <div class="py-4 px-5 lg:px-6 w-full sm:flex sm:justify-between sm:items-center">
        <div class="flex justify-center sm:justify-left">
            <h3 class="inline-flex items-center font-semibold">
                <span>@lang('messages.t_trashed_gigs')</span>
            </h3>
        </div>
    </div>
    
    {{-- Section content --}}
    <div class="grow w-full">
        <div class="overflow-x-auto min-w-full bg-white">
            <table class="min-w-full text-sm align-middle whitespace-nowrap">
                
                <thead>
                    <tr>
                        <th class="px-7 py-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest ltr:text-left rtl:text-right">
                            @lang('messages.t_gig')
                        </th>
                        <th class="p-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest text-center">
                            @lang('messages.t_deleted_date')
                        </th>
                        <th class="p-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest text-center">
                            @lang('messages.t_options')
                        </th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($gigs as $gig)
                        <tr wire:key="trashed-gigs-{{ $gig->uid }}">

                            {{-- Gig --}}
                            <td class="px-7 py-3 ltr:text-left rtl:text-right">
                                <div class="flex items-center">
                                    <div class="w-8 h-8">
                                        <img class="w-full h-full rounded object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($gig->thumbnail) }}" alt="{{ $gig->title }}" />
                                    </div>
                                    <div class="ltr:pl-4 rtl:pr-4">
                                        <a href="{{ url('service', $gig->slug) }}" target="_blank" class="font-medium text-sm hover:text-primary-600 truncate pb-1.5 block max-w-xs">{{ $gig->title }}</a>
                                        <div class="flex items-center text-[11px] font-normal text-gray-400">
                                            <a href="{{ url('categories', $gig->category->slug) }}" class="hover:text-gray-600">{{ $gig->category->name }}</a>
                                            <i class="mdi mdi-chevron-right text-[10px] mx-2"></i>
                                            <a href="{{ url('categories/' . $gig->category->slug . '/' . $gig->subcategory->name) }}" class="hover:text-gray-600">{{ $gig->subcategory->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- Deleted date --}}
                            <td class="p-3 text-center">
                                <span class="text-gray-500 font-semibold text-[13px]">{{ format_date($gig->deleted_at) }}</span>
                            </td>

                            {{-- Options --}}
                            <td class="p-3 text-center">
                                <div class="space-x-4 rtl:space-x-reverse">
                                    
                                    {{-- Restore gig --}}
                                    <button type="button" wire:click="confirmRestore('{{ $gig->id }}')" data-tooltip-target="tooltip-action-restore-{{ $gig->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m21.706 5.292-2.999-2.999A.996.996 0 0 0 18 2H6a.996.996 0 0 0-.707.293L2.294 5.292A.994.994 0 0 0 2 6v13c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V6a.994.994 0 0 0-.294-.708zM6.414 4h11.172l1 1H5.414l1-1zM4 19V7h16l.002 12H4z"></path><path d="M7 14h3v3h4v-3h3l-5-5z"></path></svg>
                                    </button>
                                    <div id="tooltip-action-restore-{{ $gig->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ __('messages.t_restore_gig') }}
                                    </div>

                                    {{-- Permanently delete --}}
                                    <button type="button" wire:click="confirmDelete('{{ $gig->id }}')" data-tooltip-target="tooltip-action-delete-{{ $gig->id }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                    </button>
                                    <div id="tooltip-action-delete-{{ $gig->id }}" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ __('messages.t_permanently_delete') }}
                                    </div>

                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    {{-- Pages --}}
    @if ($gigs->hasPages())
        <div class="px-4 py-5 sm:px-6 flex justify-center">
            {!! $gigs->links('pagination::tailwind') !!}
        </div>
    @endif

</div>