<div class="w-full" x-data="{ new_translation: false }">
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-5">

        {{-- Create category form --}}
        <div class="bg-white shadow rounded-lg divide-y divide-gray-200 dark:divide-zinc-700 md:col-span-2 h-fit">
            <div class="py-10 px-12">
    
                {{-- Section header --}}
                <div class="mb-14">
                    <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_projects_category') }}</h2>
                </div>
                
                {{-- Section content --}}
                <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">
    
                    {{-- Name --}}
                    <div class="col-span-12">
                        <x-forms.text-input
                            :label="__('messages.t_category_name')"
                            :placeholder="__('messages.t_enter_category_name')"
                            model="name"
                            icon="format-title" />
                    </div>
    
                    {{-- slug --}}
                    <div class="col-span-12">
                        <x-forms.text-input
                            :label="__('messages.t_slug')"
                            :placeholder="__('messages.t_enter_slug')"
                            model="slug"
                            icon="link-variant" />
                    </div>
    
                    {{-- Seo description --}}
                    <div class="col-span-12">
                        <x-forms.textarea
                            :label="__('messages.t_seo_description')"
                            :placeholder="__('messages.t_enter_description_for_seo')"
                            model="seo_description"
                            :rows="4"
                            icon="google" />
                    </div>

                    {{-- Thumbnail --}}
                    <div class="col-span-12">
                        <x-forms.file-input :label="__('messages.t_thumbnail')" model="thumbnail" accept="image/jpg,image/jpeg,image/png" />
                    </div>

                    {{-- Ogimage --}}
                    <div class="col-span-12">
                        <x-forms.file-input :label="__('messages.t_social_media_ogimage')" model="ogimage" accept="image/jpg,image/jpeg,image/png" />
                    </div>

                </div>
    
            </div>
    
            {{-- Actions --}}
            <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
                <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
            </div>                    
    
        </div>

        {{-- Translation --}}
        <div class="col-span-1">

            {{-- Section heading --}}
            <h3 class="font-semibold mb-3">{{ __('messages.t_translations') }}</h3>

            {{-- List of catgeories in other languages --}}
            @if (count($translations))
                <ul class="bg-white shadow rounded-lg divide-y divide-gray-200" wire:key='sdfsdfsdf'>
                    @foreach ($translations as $key => $value)

                        {{-- Get language from database --}}
                        @php
                            if (isset($value['language_code'])) {
                                $language = \App\Models\Language::where('language_code', $value['language_code'])->first();
                            } else {
                                $language = null;
                            }
                        @endphp

                        <li class="p-4 flex justify-between items-center" wire:key="translations-{{ $key }}">
                            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                                
                                {{-- Flag --}}
                                @if ($language)
                                    <img src="{{ placeholder_img() }}" data-src="{{ url('public/img/flags/rounded/' . $language->country_code . '.svg') }}" alt="{{ $language->name }}" class="lazy inline-block w-10 h-10 rounded-full" />
                                @endif

                                <div>
                                    <p class="font-semibold text-[13px]">
                                        {{ $value['language_value'] }}
                                    </p>
                                    <p class="font-medium text-xs text-gray-500 mt-1">
                                        {{ $language ? $language->name : $value['language_code'] }}
                                    </p>
                                </div>

                            </div>
                            <div class="flex justify-end">
                                <button wire:click="deleteTranslation('{{ $key }}')" wire:loading.class="cursor-not-allowed"
                                wire:loading.attr="disabled" class="h-8 w-8 p-0 text-red-600 flex items-center justify-center">

                                    {{-- Loading --}}
                                    <div wire:loading wire:target="deleteTranslation('{{ $key }}')">
                                        <svg role="status" class="w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    {{-- Icon --}}
                                    <div wire:loading.remove wire:target="deleteTranslation('{{ $key }}')">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M5 20a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8h2V6h-4V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v2H3v2h2zM9 4h6v2H9zM8 8h9v12H7V8z"></path><path d="M9 10h2v8H9zm4 0h2v8h-2z"></path></svg>
                                    </div>

                                </button>
                            </div>
                        </li>

                    @endforeach
                </ul>
            @else 
                
                {{-- No translation created yet --}}
                <div class="w-full" x-show="!new_translation">
                    <div class="flex items-center justify-center rounded-xl bg-slate-100 border-2 border-dashed border-slate-200 text-gray-500 py-16 px-10 text-center text-xs font-semibold">
                        @lang('messages.t_projects_catgeories_no_translation_yet')
                    </div>
                </div>

            @endif

            {{-- Create new translation --}}
            <div class="w-full" wire:key="create-translation-form">

                <div 
                    x-show="new_translation"
                    x-transition:enter="transition ease duration-500 transform"
                    x-transition:enter-start="opacity-0 -translate-y-12"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition ease duration-300 transform"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 -translate-y-12"
                    class="w-full my-4 bg-white shadow rounded-lg py-7 px-6">
    
                    {{-- Language code --}}
                    <div class="w-full">
                        <div class="w-full" wire:ignore>
                            <x-forms.select2
                                :label="__('messages.t_language')"
                                :placeholder="__('messages.t_choose_language')"
                                model="translation_language_code"
                                :options="$languages"
                                :isDefer="true"
                                :isAssociative="false"
                                :componentId="$this->id"
                                value="language_code"
                                text="name" />
                        </div>
                        @error('translation_language_code')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('translation_language_code') }}</p>
                        @enderror
                    </div>
    
                    {{-- Language value --}}
                    <div class="w-full mt-6">
                        <x-forms.text-input
                            :label="__('messages.t_category_name')"
                            :placeholder="__('messages.t_enter_category_name')"
                            model="translation_language_value"
                            icon="format-title" />
                    </div>
    
                    {{-- Action buttons --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-5 gap-y-5 mt-6">
    
                        {{-- Cancel --}}
                        <div>
                            <button x-on:click="new_translation = false" class="w-full text-[13px] font-semibold flex justify-center bg-transparent hover:bg-gray-300 text-gray-800 py-4 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline cursor-pointer">
                                {{ __('messages.t_cancel') }}
                            </button>
                        </div>
    
                        {{-- Add --}}
                        <div>
                            <x-forms.button action="addTranslation" text="{{ __('messages.t_add') }}" :block="true"  />
                        </div>
    
                    </div>
    
                </div>
    
                {{-- Add new translation --}}
                <button wire:key='qsdqsdqsdqs' x-on:click="new_translation = !new_translation" type="button" class="bg-slate-200 mt-6 inline-flex justify-center items-center space-x-2 border font-semibold focus:outline-none w-full px-3 py-2 leading-5 text-xs rounded border-transparent text-gray-600 hover:text-gray-400 focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:text-gray-600">
                    <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" class="hi-solid hi-plus inline-block w-5 h-5"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                    <span>{{ __('messages.t_add_new_translation') }}</span>
                </button>

            </div>

        </div>

    </div>
</div>    