<div class="w-full" x-data="window.HtBWuUxgpMyrQEM" x-init="initialize">

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

    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Main section title --}}
        <div class="col-span-12 mb-10">
            <div class="md:flex md:items-center md:justify-between ltr:border-l-8 border-primary-600 ltr:pl-4 rtl:border-r-8 rtl:pr-4">
                <div class="flex-1 min-w-0">
                    <h2 class="text-sm font-extrabold text-gray-900 tracking-wider pb-1">{{ __('messages.t_gallery') }}</h2>
                    <p class="text-gray-500 font-medium text-xs">{{ __('messages.t_update_gig_gallery_documents_and_video') }}</p>
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

        {{-- Images --}}
        <div class="col-span-12 lg:col-span-7" wire:key="section_images">
            <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6">

                {{-- Section title --}}
                <div class="mb-14 flex justify-between items-center">
                    <div>
                        <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">
                            {{ __('messages.t_images') }}</h2>
                        <p class="text-xs text-gray-500">{{ __('messages.t_get_noticed_by_right_buyers_images') }}</p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                        <button id="modal-add-youtube-video-button" type="button"
                            class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-500 hover:text-gray-600" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="w-full mb-10">

                    {{-- Images uploader --}}
                    <div wire:ignore>
                        <x-forms.uploader model="images" id="uploader_images" :extensions="['jpg', 'jpeg', 'png']"
                            accept="image/jpg, image/jpeg, image/png" size="{{ settings('publish')->max_image_size }}"
                            max="{{ settings('publish')->max_images }}" />
                    </div>

                </div>

                {{-- Section title --}}
                <div class="mt-14 mb-6">
                    <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">
                        {{ __('messages.t_gig_gallery') }}</h2>
                    <p class="text-xs text-gray-500">{{ __('messages.t_if_u_upload_new_images_below_will_be_deleted') }}
                    </p>
                </div>

                {{-- Old images --}}
                <div class="fileuploader fileuploader-theme-thumbnails">
                    <div class="fileuploader-items">
                        <ul class="!grid !grid-cols-12 md:!gap-x-6 gap-y-6 !m-auto fileuploader-items-list">

                            @foreach ($gig->images as $img)
                                <li
                                    wire:key="gallery-image-item-{{ $img->id }}"
                                    class="!col-span-6 sm:!col-span-4 md:!col-span-3 !w-full h-24 !m-auto fileuploader-item file-type-image file-ext-png file-has-popup rounded-[6px]">
                                    <div class="fileuploader-item-inner">
                                        <div class="type-holder">{{ $img->small->file_extension }}</div>
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
                                                <img src="{{ placeholder_img() }}" data-src="{{ src($img->small) }}" class="lazy" draggable="false">
                                            </div>
                                            <span class="fileuploader-action-popup"></span>
                                        </div>
                                        <div class="content-holder">
                                            <span>{{ human_filesize($img->large->file_size) }}</span>
                                        </div>
                                        <div class="progress-holder"></div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>

                {{-- Section title --}}
                <div class="mt-14 mb-6">
                    <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">
                        {{ __('messages.t_gig_thumbnail') }}</h2>
                    <p class="text-xs text-gray-500">{{ __('messages.t_catch_buyers_eyes_with_nice_img') }}
                    </p>
                </div>

                {{-- Section content --}}
                <div class="w-full">
                    <x-forms.file-input :label="__('messages.t_upload_thumbnail')" model="thumbnail"  />
                    {{-- Preview image --}}
                    @if ($gig->thumbnail)
                        <div class="mt-3">
                            <img src="{{ src( $gig->thumbnail ) }}" class="lazy h-24 w-24 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

            </div>

            {{-- Actions --}}
            <div class="hidden justify-between items-center lg:flex">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}"
                    active="bg-white shadow-sm hover:bg-gray-300 text-gray-900" />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
            </div>

        </div>

        {{-- Documents && Video --}}
        <div class="col-span-12 lg:col-span-5">

            {{-- Documents --}}
            @if (settings('publish')->is_documents_enabled)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6 mb-6"
                    wire:key="section_documents">

                    {{-- Section title --}}
                    <div class="mb-14">
                        <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">
                            {{ __('messages.t_documents') }}</h2>
                        <p class="text-xs text-gray-500">{{ __('messages.t_show_some_of_best_work_doc_pdfs_only') }}
                        </p>
                    </div>

                    {{-- Section content --}}
                    <div class="w-full {{ $gig->documents()->count() === 0 ? '' : 'mb-10' }}">

                        {{-- Documents uploader --}}
                        <div wire:ignore>
                            <x-forms.uploader model="documents" id="uploader_documents" :extensions="['pdf']"
                                accept="application/pdf" size="{{ settings('publish')->max_document_size }}"
                                max="{{ settings('publish')->max_documents }}" />
                        </div>

                    </div>

                    {{-- Old documents --}}
                    @if ($gig->documents()->count())
                        <ul role="list" class="border border-gray-200 rounded-md divide-y divide-gray-200">
                            @foreach ($gig->documents as $doc)
                                <li class="pl-3 pr-4 py-3 flex items-center justify-between text-sm">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                            x-description="Heroicon name: solid/paper-clip"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $doc->name }}
                                        </span>
                                    </div>
                                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0">
                                        <button 
                                            x-on:click="confirm('{{ __('messages.t_are_u_sure_delete_this_file') }}') ? $wire.removeDocument('{{ $doc->id }}') : ''"
                                            wire:loading.attr="disabled"
                                            wire:target="removeDocument({{ $doc->id }})" type="button"
                                            class="font-medium text-primary-600 hover:text-primary-600">
                                            {{ __('messages.t_remove') }}
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            @endif

            {{-- Video --}}
            @if ($video_link)
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 px-8 py-6" wire:key="section_video">

                    {{-- Section title --}}
                    <div class="mb-14 flex items-center justify-between">
                        <div>
                            <h2 class="text-sm tracking-wider leading-6 font-black text-gray-900">
                                {{ __('messages.t_video') }}</h2>
                            <p class="text-xs text-gray-500">{{ __('messages.t_capture_buyer_attention_with_video') }}
                            </p>
                        </div>
                        <div class="ml-4">
                            <button wire:click="removeVideo"
                                class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 text-red-500 hover:text-red-600 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    {{-- Section content --}}
                    <div class="w-full">

                        {{-- Youtube preview --}}
                        <div class="bg-white rounded-md shadow-sm w-full h-60">
                            <div class="aspect-square rounded-md z-10 overflow-hidden w-full h-full">
                                <iframe src="https://www.youtube.com/embed/{{ youtubeId($video_link) }}"
                                    height="100%" width="100%" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>

                </div>
            @endif

        </div>

        {{-- Actions --}}
        <div class="col-span-12 block lg:hidden">
            <div class="flex justify-between">
                <x-forms.button action="back" text="{{ __('messages.t_back') }}"
                    active="bg-white shadow-sm hover:bg-gray-300 text-gray-900" />
                <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
            </div>
        </div>

    </div>

    {{-- Youtube video modal --}}
    <x-forms.modal id="modal-add-youtube-video-container" target="modal-add-youtube-video-button"
        uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

        {{-- Header --}}
        <x-slot name="title">{{ __('messages.t_add_youtube_video') }}</x-slot>

        {{-- Content --}}
        <x-slot name="content">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                {{-- Link --}}
                <div class="col-span-12">
                    <div class="relative">

                        {{-- Input --}}
                        <input type="text" placeholder="{{ __('messages.t_youtube_placeholder') }}"
                            wire:model.defer="video_link"
                            class="block w-full text-xs rounded border-2 ltr:pr-10 rtl:pl-10 py-3 ltr:pl-3 rtl:pr-3 font-normal {{ $errors->first('video_link') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600' }}">

                        {{-- Icon --}}
                        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                            <svg class="w-4 h-4 {{ $errors->first('video_link') ? 'text-red-400' : 'text-gray-400' }}" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" xmlns="http://www.w3.org/2000/svg"><path d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z"></path></svg>
                        </div>

                    </div>

                    {{-- Error --}}
                    @error('video_link')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('video_link') }}</p>
                    @enderror

                </div>

            </div>
        </x-slot>

        {{-- Footer --}}
        <x-slot name="footer">
            <x-forms.button action="addVideo" text="{{ __('messages.t_add') }}" :block="0" />
        </x-slot>

    </x-forms.modal>

</div>


@push('scripts')
    {{-- AlpineJS --}}
    <script>
        function HtBWuUxgpMyrQEM() {
            return {

                initialize() {}

            }
        }
        window.HtBWuUxgpMyrQEM = HtBWuUxgpMyrQEM();
    </script>
@endpush
