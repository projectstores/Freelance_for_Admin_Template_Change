<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_article') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Article title --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_title')"
                        :placeholder="__('messages.t_enter_title')"
                        model="title"
                        icon="format-title" />
                </div>

                {{-- Article slug --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_slug')"
                        :placeholder="__('messages.t_enter_slug')"
                        model="slug"
                        icon="link-variant" />
                </div>

                {{-- Content --}}
                <div class="col-span-12">
                    <x-forms.ckeditor 
                        :label="__('messages.t_content')"
                        :placeholder="__('messages.t_enter_article_content')"
                        model="content"
                        target="create-blog-article-btn" />
                </div>

                {{-- Seo description --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_seo_description')"
                        :placeholder="__('messages.t_enter_description_for_seo')"
                        model="seo_description"
                        icon="google" />
                </div>

                {{-- Image --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_article_image')" model="image" accept="image/jpg,image/jpeg,image/png"  />
                </div>

                {{-- Reading time --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_reading_time')"
                        :placeholder="__('messages.t_enter_reading_time_in_minutes')"
                        model="reading_time"
                        icon="clock" />
                </div>
                
            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false" id="create-blog-article-btn"  />
        </div>                    

    </div>

</div>    