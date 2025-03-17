<div class="w-full" x-data="window.lMgwOjCpqGgzsVV" x-init="initialize">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
        
        {{-- Main section title --}}
        <div class="col-span-12 mb-10">
            <div class="md:flex md:items-center md:justify-between ltr:border-l-8 border-primary-600 ltr:pl-4 rtl:border-r-8 rtl:pr-4">
                <div class="flex-1 min-w-0">
                    <h2 class="text-sm font-extrabold text-gray-900 tracking-wider pb-1">{{ __('messages.t_requirements') }}</h2>
                    <p class="text-gray-500 font-medium text-xs">{{ __('messages.t_set_required_info_to_get_from_buyer') }}</p>
                </div>
                <div class="mt-4 flex md:mt-0 ltr:md:ml-4 rtl:md:mr-4">

                    {{-- Back to gigs --}}
                    <a href="{{ admin_url('gigs') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-sm shadow-sm text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                        {{ __('messages.t_back_to_gigs') }}
                    </a>

                    {{-- View gig --}}
                    <a href="{{ url('service', $gig->slug) }}" target="_blank" class="ltr:ml-3 rtl:mr-3 inline-flex items-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                        {{ __('messages.t_view_gig') }}
                    </a>

                </div>
            </div>
        </div>

        {{-- Success --}}
        @if (session()->has('success'))
            <div class="col-span-12">
                <div class="rounded-md bg-green-50 p-4">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ltr:ml-3 rtl:mr-3">
                            <p class="text-sm font-medium text-green-800">{{ session()->get('success') }}</p>
                        </div>
                    </div>
                </div>

            </div>
        @endif

        {{-- Form --}}
        <div class="col-span-12">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6">
        
                {{-- Section title --}}
                <div class="mb-14 flex items-center justify-between">
                    <div>
                        <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">{{ __('messages.t_requirements') }}</h2>
                        <p class="text-xs text-gray-500">{{ __('messages.t_create_gig_requirements_subtitle') }}</p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                        <button id="modal-add-service-requirement-button" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                                {{ __('messages.t_add_requirement') }}
                            </span>
                        </button>
                    </div>
                </div>
        
                {{-- List of requirements --}}
                @if (is_array($requirements) && count($requirements) > 0)
                    <div class="flow-root w-full mb-6">
                        <ul role="list">
        
                            @foreach ($requirements as $key => $req)
                                <li wire:key="create-gig-requirement-item-{{ $key }}">
                                    <div class="relative {{ !$loop->last ? 'pb-12' : '' }}">
                                        @if (!$loop->last)
                                            <span class="absolute top-4 ltr:left-6 rtl:right-6 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                        @endif
                                        <div class="relative flex space-x-3">
                                            <div>
                                                <span class="h-12 w-12 rounded-full bg-gray-200 flex items-center justify-center ring-8 ring-white">
        
                                                    @if ($req['type'] === 'text')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                                    @elseif ($req['type'] === 'file')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/></svg>
                                                    @elseif ($req['type'] === 'choice')
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h7"/></svg>
                                                    @endif
        
                                                </span>
                                            </div>
                                            <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4 rtl:!mr-4">
                                                <div>
                                                    <p class="text-sm font-medium text-gray-600">
                                                        {{ $req['question'] }} 
                                                    </p>
        
                                                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
        
                                                        {{-- Form type --}}
                                                        <div class="mt-2 flex items-center text-xs text-gray-400 rtl:ml-4">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z"/></svg>
                                                            @if ($req['type'] === 'text')
                                                                {{ __('messages.t_free_text') }}
                                                            @elseif ($req['type'] === 'file')
                                                                {{ __('messages.t_attachment') }}
                                                            @elseif ($req['type'] === 'choice')
                                                                {{ __('messages.t_multiple_choice') }}
                                                            @endif
                                                        </div>
        
                                                        {{-- Edit --}}
                                                        <div wire:click="editRequirement({{ $key }})" class="mt-2 flex items-center text-xs text-gray-400 cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/></svg>
                                                            {{ __('messages.t_edit') }}
                                                        </div>
        
                                                        {{-- Delete --}}
                                                        <div wire:click="deleteRequirement({{ $key }})" class="mt-2 flex items-center text-xs text-red-600 cursor-pointer">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                                            {{ __('messages.t_delete') }}
                                                        </div>
        
                                                    </div>
        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            
                        </ul>
                    </div>
                @endif
        
            </div>
        
            {{-- Actions --}}
            <div class="flex justify-between">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}" active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300"  />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" :block="0"  />
            </div>
        </div>

    </div>

    {{-- ** Modal ** --}}
    <x-forms.modal id="modal-add-service-requirement-container" target="modal-add-service-requirement-button" uid="modal_{{ uid() }}" placement="center-center" size="w-2/5">

        {{-- Header --}}
        <x-slot name="title">{{ __('messages.t_add_question') }}</x-slot>

        {{-- Content --}}
        <x-slot name="content">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                {{-- Question --}}
                <div class="col-span-12">
                    <div>
                        <div class="relative">
                            <textarea placeholder="{{ __('messages.t_request_necessary_details_such_dimensions') }}" wire:model.defer="add_requirement.question" rows="6" class="block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal resize-none {{ $errors->first('add_requirement.question') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600' }}" maxlength="500"></textarea>
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                <i class="mdi mdi-receipt-text-check {{ $errors->first('add_requirement.question') ? 'text-red-400' : 'text-gray-400' }}"></i>
                            </div>
                        </div>
                    
                        {{-- Error --}}
                        @error('add_requirement.question')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('add_requirement.question') }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Type --}}
                <div class="{{ isset($add_requirement['type']) && $add_requirement['type'] === 'choice' ? 'col-span-6' : 'col-span-12' }}">
                    <div class="relative default-select2 {{ $errors->first('add_requirement.type') ? 'select2-custom-has-error' : '' }}">
                    
                        <select data-pharaonic="select2" data-component-id="{{ $this->id }}" wire:model="add_requirement.type" id="select2-id-add_requirement.type" data-placeholder="{{ __('messages.t_get_it_from') }}" data-search-off class="select2_requirements">
                            <option value=""></option>
                            <option value="text">{{ __('messages.t_free_text') }}</option>
                            <option value="choice">{{ __('messages.t_multiple_choice') }}</option>
                            <option value="file">{{ __('messages.t_attachment') }}</option>
                        </select>
                        @error('add_requirement.type')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('add_requirement.type') }}</p>
                        @enderror
                    
                    </div>
                </div>

                {{-- Multiple choice --}}
                @if (isset($add_requirement['type']) && $add_requirement['type'] === 'choice')
                    
                    {{-- Multiple choices --}}
                    <div class="col-span-6">
                        <x-forms.checkbox 
                            label="{{ __('messages.t_multiple_choices') }} "
                            model="add_requirement.is_multiple"
                            :hidelabel="true" />
                    </div>

                    {{-- Loop through options --}}
                    @foreach ($add_requirement['options'] as $i => $option)
                        <div class="col-span-12" wire:key="add-requirement-choice-option-id-{{ $i }}">
                            <div class="flex-grow relative">
                                <input wire:model.defer="add_requirement.options.{{ $i }}" class="block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal {{ $errors->first('add_requirement.options.'.$i) ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600' }}" type="text" placeholder="{{ __('messages.t_add_option') }}" maxlength="100">
                                @if (count($add_requirement['options']) > 2)
                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center cursor-pointer" wire:click="deleteOption({{ $i }})">
                                        <span class="hover:text-red-500 {{ $errors->first('add_requirement.options.'.$i) ? 'text-red-400' : 'text-gray-400' }}">
                                            <i class="mdi mdi-delete"></i>    
                                        </span>
                                    </div>
                                @endif
                            </div>
                            {{-- Error --}}
                            @error('add_requirement.options.'.$i)
                                <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('add_requirement.options.'.$i) }}</p>
                            @enderror
                        </div>
                    @endforeach

                    {{-- Add option --}}
                    <div class="col-span-6">
                        <button wire:click="addOption" type="button" class="text-primary-600 hover:text-white hover:bg-primary-600 border-2 border-primary-600 focus:ring-0 focus:outline-none font-medium rounded text-xs px-5 py-2 text-center inline-flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2 ltr:-ml-1 rtl:-mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                            {{ __('messages.t_add_new_option') }}
                        </button>
                    </div>

                @endif

            </div>
        </x-slot>

        {{-- Footer --}}
        <x-slot name="footer">
            <div class="flex justify-between w-full">

                {{-- Is Required? --}}
                <div class="flex items-center">
                    <input checked id="add-requirement-is-required-checkbox" type="checkbox" value="" class="w-5 h-5 text-primary-600 bg-transparent border-2 rounded border-gray-400 focus:outline-none focus:ring-0" wire:model.defer="add_requirement.is_required">
                    <label for="add-requirement-is-required-checkbox" class="ltr:ml-2 rtl:mr-2 text-xs font-medium text-gray-700">{{ __('messages.t_required') }}</label>
                </div>

                @if ($is_edit)
                    {{-- Add --}}
                    <x-forms.button action="updateRequirement" text="{{ __('messages.t_update') }}" :block="0"  />
                @else
                    {{-- Add --}}
                    <x-forms.button action="addRequirement" text="{{ __('messages.t_add') }}" :block="0"  />
                @endif
            </div>
        </x-slot>

    </x-forms.modal>

</div>


@push('scripts')
    
    {{-- AlpineJS --}}
    <script>
        function lMgwOjCpqGgzsVV() {
            return {

                initialize() {

                }

            }
        }
        window.lMgwOjCpqGgzsVV = lMgwOjCpqGgzsVV();
    </script>

@endpush