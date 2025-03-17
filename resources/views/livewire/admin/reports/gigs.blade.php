<div class="w-full">

    {{-- Section title --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                {{ __('messages.t_reported_gigs') }}
            </p>
        </div>
    </div>

    {{-- Section content --}}
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0" class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_gig') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_reported_by') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_reason') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider text-center">{{ __('messages.t_options') }}</th>
                </tr>
            </thead>
            <tbody class="w-full">

                @foreach ($reports as $r)
                    <tr class="focus:outline-none text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="reports-{{ $r->id }}">

                        {{-- Gig --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="{{ url('service', $r->gig->slug) }}" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($r->gig->thumbnail) }}" alt="{{ $r->gig->title }}" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs">{{ $r->gig->title }}</p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2">@money($r->gig->price, settings('currency')->code, true)</p>
                                </div>
                            </a>
                        </td>

                        {{-- Reporter --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <a href="{{ url('profile', $r->user->username) }}" target="_blank" class="flex items-center">
                                <div class="w-8 h-8">
                                    <img class="w-full h-full rounded object-cover lazy" src="{{ placeholder_img() }}" data-src="{{ src($r->user->avatar) }}" alt="{{ $r->user->username }}" />
                                </div>
                                <div class="ltr:pl-4 rtl:pr-4">
                                    <p class="font-medium text-xs">{{ $r->user->username }}</p>
                                    <p class="text-[11px] leading-3 text-gray-600 pt-2">{{ $r->user->email }}</p>
                                </div>
                            </a>
                        </td>

                        {{-- Status --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-medium">{{ $r->reason }}</span>
                        </td>

                        {{-- Options --}}
                        <td class="text-center">
                            <div class="relative inline-block text-left">
                                <div>
                                    <button data-dropdown-toggle="table-options-dropdown-{{ $r->id }}" type="button" class="inline-flex justify-center items-center rounded-full h-8 w-8 bg-white dark:bg-zinc-700 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-0" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 dark:text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"/></svg>
                                    </button>
                                </div>
                                <div id="table-options-dropdown-{{ $r->id }}" class="hidden z-40 origin-top-right absolute right-0 mt-2 w-44 rounded-md shadow-lg bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 dark:divide-zinc-700 focus:outline-none" role="menu"  aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                                    <div class="py-1" role="none">

                                        {{-- Delete report --}}
                                        <button wire:key="option-delete-{{ $r->id }}" x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_delete_this') }}') ? $wire.delete('{{ $r->id }}') : ''" wire:loading.attr="disabled" wire:target="delete('{{ $r->id }}')" type="button" class="text-gray-800 dark:text-gray-300 dark:hover:text-gray-400 group flex items-center px-4 py-2 text-sm" role="menuitem" tabindex="-1" >

                                            {{-- Loading indicator --}}
                                            <div wire:loading wire:target="delete('{{ $r->id }}')">
                                                <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                </svg>
                                            </div>

                                            {{-- Icon --}}
                                            <div wire:loading.remove wire:target="delete('{{ $r->id }}')">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                                            </div>

                                            <span class="text-xs font-medium">{{ __('messages.t_delete_report') }}</span>

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
    @if ($reports->hasPages())
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            {!! $reports->links('pagination::tailwind') !!}
        </div>
    @endif

</div>
