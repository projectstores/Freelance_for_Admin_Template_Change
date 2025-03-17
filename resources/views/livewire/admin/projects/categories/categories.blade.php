<div class="flex flex-col rounded-lg shadow bg-white overflow-hidden">
   
    {{-- Section header --}}
    <div class="py-4 px-5 lg:px-6 w-full sm:flex sm:justify-between sm:items-center">
        <div class="flex justify-center sm:justify-left">
            <h3 class="inline-flex items-center font-semibold">
                <span>@lang('messages.t_projects_categories')</span>
            </h3>
        </div>
        <div class="mt-3 sm:mt-0 text-center sm:text-right">
            <a href="{{ admin_url('projects/categories/create') }}" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="hi-solid hi-plus inline-block w-5 h-5"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                <span>@lang('messages.t_new_category')</span>
            </a>
        </div>
    </div>
    
    {{-- Section content --}}
    <div class="grow w-full">
        <div class="overflow-x-auto min-w-full bg-white">
            <table class="min-w-full text-sm align-middle whitespace-nowrap">
                
                <thead>
                    <tr>
                        <th class="px-7 py-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest ltr:text-left rtl:text-right">
                            @lang('messages.t_category_name')
                        </th>
                        <th class="px-7 py-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest ltr:text-left rtl:text-right">
                            @lang('messages.t_category_slug')
                        </th>
                        <th class="p-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest text-center">
                            @lang('messages.t_projects')
                        </th>
                        <th class="p-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest text-center">
                            @lang('messages.t_options')
                        </th>
                    </tr>
                </thead>
            
                <tbody>
                    @foreach ($categories as $c)
                        <tr wire:key="projects-categories-{{ $c->uid }}">

                            {{-- Name --}}
                            <td class="px-7 py-3 ltr:text-left rtl:text-right">
                                <span class="text-gray-500 font-semibold text-[13px]">{{ $c->name }}</span>
                            </td>

                            {{-- Slug --}}
                            <td class="px-7 py-3 ltr:text-left rtl:text-right">
                                <span class="text-gray-500 font-semibold text-[13px]">{{ $c->slug }}</span>
                            </td>

                            {{-- Projects --}}
                            <td class="p-3 text-center font-bold">
                                {{ $c->projects()->count() }}
                            </td>
                            
                            {{-- Options --}}
                            <td class="p-3 text-center">

                                <div class="space-x-4 rtl:space-x-reverse">

                                    {{-- Edit --}}
                                    <a href="{{ admin_url('projects/categories/edit/' . $c->uid) }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                    </a>
    
                                    {{-- Delete --}}
                                    <button type="button" id="modal-delete-category-button-{{ $c->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                        <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                    </button>

                                </div>

                                {{-- Modal confirmation --}}
                                <x-forms.modal id="modal-delete-category-container-{{ $c->uid }}" target="modal-delete-category-button-{{ $c->uid }}" uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

                                    {{-- Modal heading --}}
                                    <x-slot name="title">{{ __('messages.t_delete_category') }}</x-slot>

                                    {{-- Modal content --}}
                                    <x-slot name="content">

                                            {{-- Check if category has projects --}}
                                            @if ($c->projects()->count())

                                                {{-- Text --}}
                                                <div class="whitespace-normal">
                                                    @lang('messages.t_delete_project_cat_has_projects_hint')
                                                </div>
                                                
                                                {{-- Categories --}}
                                                <div>
                                                    <select wire:model.defer="alternative_category" class="bg-gray-50 border border-gray-300 text-gray-900 text-xs font-semibold rounded focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
                                                        <option selected>@lang('messages.t_choose_category')</option>
                                                        @foreach ($categories as $cat)
                                                            @if ((int)$cat->id !== (int)$c->id)
                                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>

                                            @else

                                                {{-- Confirmation message --}}
                                                <div class="whitespace-normal">
                                                    @lang('messages.t_delete_project_cat_confirm_msg')
                                                </div>

                                            @endif

                                            {{-- Delete --}}
                                            <div>
                                                <button 
                                                    wire:click="delete({{ $c->id }})"
                                                    wire:loading.class="border-gray-200 bg-gray-200 text-gray-700 cursor-not-allowed"
                                                    wire:loading.class.remove="border-red-200 bg-red-200 text-red-700 hover:text-red-700 hover:bg-red-300 hover:border-red-300 active:bg-red-200 focus:ring-red-500"
                                                    wire:loading.attr="disabled" 
                                                    type="button" 
                                                    class="w-full inline-flex text-xs justify-center items-center border font-semibold focus:outline-none px-3 py-2 leading-5 rounded border-red-200 bg-red-200 text-red-700 hover:text-red-700 hover:bg-red-300 hover:border-red-300 active:bg-red-200 focus:ring-red-500 focus:ring focus:ring-opacity-50">

                                                    {{-- Loading indicator --}}
                                                    <div wire:loading wire:target="delete({{ $c->id }})">
                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                        </svg>
                                                    </div>

                                                    {{-- Button text --}}
                                                    <div wire:loading.remove wire:target="delete({{ $c->id }})">
                                                        @lang('messages.t_delete')
                                                    </div>

                                                </button>
                                            </div>

                                    </x-slot>

                                </x-forms.modal>

                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    {{-- Pages --}}
    @if ($categories->hasPages())
        <div class="px-4 py-5 sm:px-6 flex justify-center">
            {!! $categories->links('pagination::tailwind') !!}
        </div>
    @endif

</div>