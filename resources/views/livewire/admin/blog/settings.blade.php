<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_blog_settings') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable blog --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_blog_system')"
                        model="enable_blog" />
                </div>

                {{-- Enable comments --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_comments_in_blog_articles')"
                        model="enable_comments" />
                </div>

                {{-- Auto approve comments --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_comments_in_articles')"
                        model="auto_approve_comments" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    