<div class="rounded-lg shadow bg-white overflow-hidden inline-grid w-full">
   
    {{-- Section header --}}
    <div class="py-4 px-5 lg:px-6 w-full sm:flex sm:justify-between sm:items-center">
        <div class="flex justify-center sm:justify-left">
            <h3 class="inline-flex items-center font-semibold">
                <span>@lang('messages.t_skills')</span>
            </h3>
        </div>
        <div class="mt-3 sm:mt-0 text-center sm:text-right">
            <a href="{{ admin_url('projects/skills/create') }}" class="inline-flex justify-center items-center space-x-2 rtl:space-x-reverse border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                <svg class="inline-block w-4 h-4 text-gray-600 -mt-px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12.414 5H21a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2zM11 12H8v2h3v3h2v-3h3v-2h-3V9h-2v3z"></path></g></svg>
                <span>@lang('messages.t_create_skills')</span>
            </a>
        </div>
    </div>
    
    {{-- Section content --}}
    <div class="grow w-full contents">
        <div class="overflow-x-auto min-w-full bg-white">
            <table class="min-w-full text-sm align-middle whitespace-nowrap">
                
                <thead>
                    <tr>
                        <th class="px-7 py-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest ltr:text-left rtl:text-right">
                            @lang('messages.t_category')
                        </th>
                        <th class="px-4 py-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest ltr:text-left rtl:text-right">
                            @lang('messages.t_skill')
                        </th>
                        <th class="p-3 text-slate-600 bg-slate-100 font-bold text-[10px] uppercase tracking-widest text-center">
                            @lang('messages.t_options')
                        </th>
                    </tr>
                </thead>
            
                <tbody class="divide-y divide-gray-100">
                    @foreach ($skills as $skill)
                        <tr class="hover:bg-gray-50" wire:key="skills-{{ $skill->uid }}">

                            {{-- Category --}}
                            <td class="px-7 py-4 ltr:text-left rtl:text-right">
                                <a href="{{ url('explore/projects', $skill->category->slug) }}" target="_blank" class="text-sm font-semibold text-zinc-700 hover:text-primary-600 tracking-wide">
                                    {{ $skill->category->name }}
                                </a>
                            </td>

                            {{-- Skill --}}
                            <td class="p-4 ltr:text-left rtl:text-right">
                                <a href="{{ url('explore/projects/' . $skill->category->slug . '/' . $skill->slug) }}" target="_blank" class="text-sm font-semibold text-zinc-700 hover:text-primary-600 tracking-wide">
                                    {{ $skill->name }}
                                </a>
                            </td>

                            {{-- Options --}}
                            <td class="p-4 text-center">
                                <div class="flex items-center justify-center space-x-4 rtl:space-x-reverse">

                                    {{-- Edit --}}
                                    <div>
                                        <a href="{{ admin_url('projects/skills/edit/' . $skill->uid) }}" data-tooltip-target="tooltip-actions-edit-{{ $skill->uid }}" id="modal-edit-bid-button-{{ $skill->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M7.243 18H3v-4.243L14.435 2.322a1 1 0 0 1 1.414 0l2.829 2.829a1 1 0 0 1 0 1.414L7.243 18zM3 20h18v2H3v-2z"></path></g></svg>
                                        </a>
                                        <x-forms.tooltip id="tooltip-actions-edit-{{ $skill->uid }}" :text="__('messages.t_edit_skill')" />
                                    </div>

                                    {{-- Delete --}}
                                    <div>
                                        <button type="button" data-tooltip-target="tooltip-actions-delete-{{ $skill->uid }}" id="modal-delete-skill-button-{{ $skill->uid }}" class="inline-flex justify-center items-center border font-semibold focus:outline-none w-8 h-8 leading-5 text-sm rounded border-gray-300 bg-white text-gray-800 shadow-sm hover:text-gray-800 hover:bg-gray-100 hover:border-gray-300 hover:shadow focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:bg-white active:border-white active:shadow-none">
                                            <svg class="w-4 h-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M17 4h5v2h-2v15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V6H2V4h5V2h10v2zM9 9v8h2V9H9zm4 0v8h2V9h-2z"></path></g></svg>
                                        </button>
                                        <x-forms.tooltip id="tooltip-actions-delete-{{ $skill->uid }}" :text="__('messages.t_delete_skill')" />
                                    </div>

                                </div>
                            </td>

                        </tr>

                        {{-- Delete modal --}}
                        <x-forms.modal id="modal-delete-skill-container-{{ $skill->uid }}" target="modal-delete-skill-button-{{ $skill->uid }}" uid="modal_delete_skill_{{ $skill->uid }}" placement="center-center" size="max-w-md">

                            {{-- Modal heading --}}
                            <x-slot name="title">{{ __('messages.t_delete_skill') }}</x-slot>

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
                                        <div>
                                            @lang('messages.t_delete_project_skill_admin_alert')
                                        </div>
                                        <div class="text-black font-bold text-sm tracking-wide mt-1">
                                            {{ $skill->name }}
                                        </div>
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
                                        wire:click="delete('{{ $skill->id }}')"
                                        wire:loading.attr="disabled"
                                        class="inline-flex justify-center items-center rounded border font-semibold focus:outline-none px-3 py-2 leading-5 text-xs tracking-wide border-transparent bg-red-500 text-white hover:bg-red-600 focus:ring focus:ring-red-500 focus:ring-opacity-25 disabled:bg-gray-200 disabled:hover:bg-gray-200 disabled:text-gray-500 disabled:cursor-not-allowed">
                                        
                                        {{-- Loading indicator --}}
                                        <div wire:loading wire:target="delete('{{ $skill->id }}')">
                                            <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                            </svg>
                                        </div>

                                        {{-- Button text --}}
                                        <div wire:loading.remove wire:target="delete('{{ $skill->id }}')">
                                            @lang('messages.t_delete_skill')
                                        </div>

                                    </button>

                                </div>
                            </x-slot>

                        </x-forms.modal>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    {{-- Pages --}}
    @if ($skills->hasPages())
        <div class="px-4 py-5 sm:px-6 flex justify-center">
            {!! $skills->links('pagination::tailwind') !!}
        </div>
    @endif

</div>