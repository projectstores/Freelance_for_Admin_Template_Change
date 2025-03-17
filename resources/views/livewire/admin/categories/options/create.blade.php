<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_category') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Category name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_category_name') }}" 
                        placeholder="{{ __('messages.t_enter_category_name') }}" 
                        model="name"
                        icon="format-title" />
                </div>

                {{-- Category slug --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        label="{{ __('messages.t_category_slug') }}" 
                        placeholder="{{ __('messages.t_enter_category_slug') }}" 
                        model="slug"
                        icon="link-variant" />
                </div>

                {{-- Category description --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        label="{{ __('messages.t_description') }}" 
                        placeholder="{{ __('messages.t_enter_description') }}" 
                        model="description"
                        icon="file-document"
                        rows="7" />
                </div>

                {{-- Category icon --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.file-input :label="__('messages.t_category_icon')" model="icon"  />
                </div>

                {{-- Category image --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.file-input :label="__('messages.t_category_image')" model="image"  />
                </div>

                {{-- Show this category in home page --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_cat_gigs_in_home_checkbox')"
                        model="is_visible" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
        </div>                    

    </div>

</div>    