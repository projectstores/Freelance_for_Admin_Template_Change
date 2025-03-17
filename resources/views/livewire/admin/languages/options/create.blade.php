<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_language') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- language name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_language_name')"
                        :placeholder="__('messages.t_enter_language_name')"
                        model="name"
                        icon="format-title" />
                </div>

                {{-- Language code --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_language_code')"
                        :placeholder="__('messages.t_enter_language_code')"
                        model="language_code"
                        icon="flag-triangle" />
                </div>

                {{-- Country code --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_country_code')"
                        :placeholder="__('messages.t_enter_country_code')"
                        model="country_code"
                        icon="flag-variant" />
                </div>

                {{-- Language status --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_this_language')"
                        model="is_active" />
                </div>

                {{-- Language direction --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_force_rtl_for_this_language')"
                        model="force_rtl" />
                </div>

                {{-- Backend timing locale --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_backend_time_locale')"
                            :placeholder="__('messages.t_choose_default_locale')"
                            model="backend_timing_locale"
                            :options="config('carbon-locales')"
                            :isDefer="true"
                            :isAssociative="true"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                    <div class="text-xs mt-1 text-gray-400 leading-relaxed">Choose default locale to format dates and time in backend (PHP). For example:<br> <b>English</b> (en_US) 13 hours ago <br> <b>French</b> (fr_FR) il y a 13 heures</div>
                </div>

                {{-- Frontend timing locale --}}
                <div class="col-span-12 md:col-span-6">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_frontend_time_locale')"
                            :placeholder="__('messages.t_choose_default_locale')"
                            model="frontend_timing_locale"
                            :options='["en","af","ar-dz","ar-kw","ar-ly","ar-ma","ar-sa","ar-tn","ar","az","be","bg","bm","bn-bd","bn","bo","br","bs","ca","cs","cv","cy","da","de-at","de-ch","de","dv","el","en-au","en-ca","en-gb","en-ie","en-il","en-in","en-nz","en-sg","eo","es-do","es-mx","es-us","es","et","eu","fa","fi","fil","fo","fr-ca","fr-ch","fr","fy","ga","gd","gl","gom-deva","gom-latn","gu","he","hi","hr","hu","hy-am","id","is","it-ch","it","ja","jv","ka","kk","km","kn","ko","ku","ky","lb","lo","lt","lv","me","mi","mk","ml","mn","mr","ms-my","ms","mt","my","nb","ne","nl-be","nl","nn","oc-lnc","pa-in","pl","pt-br","pt","ro","ru","sd","se","si","sk","sl","sq","sr-cyrl","sr","ss","sv","sw","ta","te","tet","tg","th","tk","tl-ph","tlh","tr","tzl","tzm-latn","tzm","ug-cn","uk","ur","uz-latn","uz","vi","x-pseudo","yo","zh-cn","zh-hk","zh-mo","zh-tw"]'
                            :isDefer="true"
                            :isAssociative="true"
                            :componentId="$this->id"
                            :show_option_insead="true"
                            value="value"
                            text="text" />
                    </div>
                    <div class="text-xs mt-1 text-gray-400 leading-relaxed">Choose default locale to format dates and time in frontend (Javascript). For example:<br> <b>English</b> (en) 13 hours ago <br> <b>French</b> (fr) il y a 13 heures</div>
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
        </div>                    

    </div>

</div>    