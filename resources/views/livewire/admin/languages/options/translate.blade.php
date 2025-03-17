<div class="w-full">

    {{-- ALERT --}}
    <div class="rounded-md bg-red-50 p-4 mb-8">
        <div class="flex">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/> </svg>
        </div>
        <div class="ltr:ml-3 rtl:mr-3">
            <h3 class="text-sm font-medium text-red-800">Very Important</h3>
            <div class="mt-2 text-sm text-red-700">
            <ul role="list" class="list-disc pl-5 space-y-1">
                <li>DO NOT translate words starting with <b class="text-black font-black">:</b> because system will change these variables. For example <b class="text-black font-black">Hello :username</b> it will be <b class="text-black font-black">Hello {{ auth('admin')->user()->username }}</b></li>
                <li>DO NOT use any characters like <b class="text-black font-black">"</b> , <b class="text-black font-black">'</b> , <b class="text-black font-black">\</b> or <b class="text-black font-black">`</b> because this may cause a fatal error on your system</li>
                <li>The translation is saved automatically, just enter the value and click out of the box.</li>
            </ul>
            </div>
        </div>
        </div>
    </div>
  

    {{-- Section title --}}
    <div class="px-4 md:px-3 py-4 md:py-5 bg-white border !border-b-0 dark:bg-gray-700 rounded-tl-lg rounded-tr-lg">
        <div class="sm:flex items-center justify-between">
            <p class="text-sm font-bold leading-wide text-gray-800">
                {{ __('messages.t_edit_translation_for_lang_name', ['lang' => $language->name]) }}
            </p>
            <div class="mt-4 sm:mt-0">   
                <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Your Email</label>
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input wire:model.lazy="q" type="search" id="search" class="block p-3 pl-10 w-full text-sm text-gray-900 bg-white rounded-md border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{ __('messages.t_search_words') }}" required>
                </div>
            </div>
        </div>
    </div>

    {{-- Section content --}}
    <div class="bg-white dark:bg-zinc-800 overflow-y-auto border !border-t-0 !border-b-0 dark:border-zinc-600">
        <table class="w-full whitespace-nowrap old-tables">
            <thead class="bg-gray-200">
                <tr tabindex="0"
                    class="focus:outline-none h-16 w-full text-sm leading-none text-gray-800 dark:text-white ">
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_language_key') }}</th>
                    <th class="font-bold text-[10px] text-slate-500 dark:text-gray-300 uppercase tracking-wider ltr:text-left ltr:pl-4 rtl:text-right rtl:pr-4">{{ __('messages.t_language_value') }}</th>
                </tr>
            </thead>
            <tbody class="w-full">

                @foreach ($translation as $key => $value)
                    <tr class="focus:outline-none h-20 text-sm leading-none text-gray-800 bg-white dark:bg-zinc-600 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b border-t border-gray-100 dark:border-zinc-700/40" wire:key="translation-{{ $key }}">

                        {{-- Key --}}
                        <td class="ltr:pl-4 rtl:pr-4">
                            <span class="text-xs font-medium text-gray-500">{{ $key }}</span>
                        </td>

                        {{-- Value --}}
                        <td class="ltr:pr-4 rtl:pl-4">
                            <textarea rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-sm border border-gray-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..." wire:model.lazy="data.{{ $key }}"></textarea>
                        </td>
                        

                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if ($translation->hasPages())
        <div class="bg-gray-100 px-4 py-5 sm:px-6 rounded-bl-lg rounded-br-lg flex justify-center border-t-0 border-r border-l border-b">
            {!! $translation->links('pagination::tailwind') !!}
        </div>
    @endif

</div>
