<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_home_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_home_section_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable popular services --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_popular_services')"
                        model="show_popular_services" />
                </div>
                
                {{-- Enable made with --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_made_with')"
                        model="show_made_with" />
                </div>
                
                {{-- Please wait dialog --}}
                <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading>
                    <div class="w-full h-full flex items-center justify-center">
                        <div role="status">
                            <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                            </svg>
                            <span class="text-xs font-medium tracking-wider text-white mt-4 block">{{ __('messages.t_please_wait_dots') }}</span>
                        </div>
                    </div>
                </div>
                
                {{-- Images uploader --}}
                <div class="col-span-12">
                    <span class="mb-2 text-xs font-semibold tracking-wide flex items-center text-gray-700 dark:text-gray-100">{{ __('messages.t_upload_made_with_images') }}</span>
                    <x-forms.uploader
                        model="made_with_images"
                        :label="__('messages.t_benefits_3_logo')"
                        id="uploader_images"
                        :extensions="['jpg', 'jpeg', 'png']"
                        accept="image/jpg, image/jpeg, image/png"
                        size="50"
                        max="40" />
                    
                    
                {{-- Old images --}}
                <div class="fileuploader fileuploader-theme-thumbnails mt-5">
                    <div class="fileuploader-items">
                        <ul class="!grid !grid-cols-12 sm:!gap-x-6 gap-y-6 !m-auto fileuploader-items-list">

                            @foreach ($images as $img)
                                <li
                                    wire:key="gallery-image-item-{{ $img->id }}"
                                    class="!col-span-12 sm:!col-span-6 md:!col-span-4 lg:!col-span-3 !w-full h-24 !m-auto fileuploader-item file-type-image file-ext-png file-has-popup rounded-[6px]">
                                    <div class="fileuploader-item-inner">
                                        <div class="type-holder">{{ $img->file_extension }}</div>
                                        <div class="actions-holder">
                                            <button type="button"
                                                x-on:click="confirm('{{ __('messages.t_are_u_sure_delete_this_image') }}') ? $wire.removeImage('{{ $img->id }}') : ''" 
                                                wire:loading.attr="disabled" 
                                                wire:target="removeImage('{{ $img->id }}')"
                                                class="fileuploader-action fileuploader-action-remove"
                                                title="{{ __('messages.t_delete') }}">
                                                <i class="fileuploader-icon-remove"></i>
                                            </button>
                                        </div>
                                        <div class="thumbnail-holder">
                                            <div class="fileuploader-item-image">
                                                <img class="lazy" src="{{ placeholder_img() }}" data-src="{{ src($img) }}" draggable="false">
                                            </div>
                                            <span class="fileuploader-action-popup"></span>
                                        </div>
                                        <div class="content-holder">
                                            <span>{{ human_filesize($img->file_size) }}</span>
                                        </div>
                                        <div class="progress-holder"></div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                 
                </div>
            
                
                {{-- Enable benefits --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_benefits')"
                        model="show_benefits" />
                </div>
                
                                
                {{-- Benefits 1 Logo --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_benefits_1_logo')" model="benefits_1_logo" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('home')->benefits_1_logo)
                        <div class="mt-3">
                            <img src="{{ src( settings('home')->benefits_logo_1 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Benefits 2 Logo --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_benefits_2_logo')" model="benefits_2_logo" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('home')->benefits_2_logo)
                        <div class="mt-3">
                            <img src="{{ src( settings('home')->benefits_logo_2 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Benefits 3 Logo --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_benefits_3_logo')" model="benefits_3_logo" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('home')->benefits_3_logo)
                        <div class="mt-3">
                            <img src="{{ src( settings('home')->benefits_logo_3 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Benefits 4 Logo --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_benefits_4_logo')" model="benefits_4_logo" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('home')->benefits_4_logo)
                        <div class="mt-3">
                            <img src="{{ src( settings('home')->benefits_logo_4 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                
                {{-- Enable home video --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_home_video')"
                        model="show_home_video" />
                </div>
                
                {{-- Enable gigs --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_gigs')"
                        model="show_gigs" />
                </div>
                
                {{-- Youtube video id --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_youtube_video_id')"
                        :placeholder="__('messages.t_youtube_video_id_placeholder')"
                        model="youtube_video_id"
                        icon="format-font"
                        :hint="__('messages.t_youtube_video_id_hint')" />
                </div>
                
                {{-- Enable join us banner --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_join_us_banner')"
                        model="show_join_us_banner" />
                </div>

                {{-- Join Us image --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_join_us_banner_image')" model="join_us_image_id" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('home')->join_us_image)
                        <div class="mt-3">
                            <img src="{{ src( settings('home')->join_us_image ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    