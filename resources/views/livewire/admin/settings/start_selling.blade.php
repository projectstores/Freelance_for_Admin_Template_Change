<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_start_selling_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_start_selling_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">
            
                {{-- Banner bg --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_banner_bg')" model="banner_bg_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->banner_bg)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->banner_bg ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Banner icon --}}
                <div class="col-span-12">
                    <x-forms.file-input :label="__('messages.t_banner_icon')" model="banner_icon_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->banner_icon)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->banner_icon ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>

                <div class="col-span-12 mt-4 mb-3 border-b border-gray-300"></div>

                {{-- Enable how it works --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_how_it_works')"
                        model="show_how_it_works" />
                </div>
                
                {{-- How it works 1 Logo --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_hiw_logo_1')" model="hiw_svg_1_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->hiw_svg_1)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->hiw_svg_1 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- How it works 2 Logo --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_hiw_logo_2')" model="hiw_svg_2_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->hiw_svg_2)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->hiw_svg_2 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- How it works 3 Logo --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_hiw_logo_3')" model="hiw_svg_3_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->hiw_svg_3)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->hiw_svg_3 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                <div class="col-span-12 mt-4 mb-3 border-b border-gray-300"></div>
                
                {{-- Enable join_community --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_join_community')"
                        model="show_freelancers" />
                </div>
                
                {{-- Freelancer image 1 --}}
                <div class="col-span-3">
                    <x-forms.file-input :label="__('messages.t_freelancer_image_1')" model="freelancer_image_1_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->freelancer_image_1)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->freelancer_image_1 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Freelancer image 2 --}}
                <div class="col-span-3">
                    <x-forms.file-input :label="__('messages.t_freelancer_image_2')" model="freelancer_image_2_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->freelancer_image_2)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->freelancer_image_2 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Freelancer image 3 --}}
                <div class="col-span-3">
                    <x-forms.file-input :label="__('messages.t_freelancer_image_3')" model="freelancer_image_3_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->freelancer_image_3)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->freelancer_image_3 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Freelancer image 4 --}}
                <div class="col-span-3">
                    <x-forms.file-input :label="__('messages.t_freelancer_image_4')" model="freelancer_image_4_id" accept="image/jpg,image/jpeg,image/png,image/webp"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->freelancer_image_4)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->freelancer_image_4 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Freelancer Name 1 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_name_1')"
                        :placeholder="__('messages.t_freelancer_name_1')"
                        model="freelancer_name_1"
                        icon="format-font" />
                </div>
                
                {{-- Freelancer Name 2 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_name_2')"
                        :placeholder="__('messages.t_freelancer_name_2')"
                        model="freelancer_name_2"
                        icon="format-font" />
                </div>
                
                {{-- Freelancer Name 3 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_name_3')"
                        :placeholder="__('messages.t_freelancer_name_3')"
                        model="freelancer_name_3"
                        icon="format-font" />
                </div>
                
                {{-- Freelancer Name 4 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_name_4')"
                        :placeholder="__('messages.t_freelancer_name_4')"
                        model="freelancer_name_4"
                        icon="format-font" />
                </div>
                
                {{-- Freelancer Job 1 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_job_1')"
                        :placeholder="__('messages.t_freelancer_job_1')"
                        model="freelancer_job_1"
                        icon="format-font" />
                </div>
                
                {{-- Freelancer Job 2 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_job_2')"
                        :placeholder="__('messages.t_freelancer_job_2')"
                        model="freelancer_job_2"
                        icon="format-font" />
                </div>
                
                {{-- Freelancer Job 3 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_job_3')"
                        :placeholder="__('messages.t_freelancer_job_3')"
                        model="freelancer_job_3"
                        icon="format-font" />
                </div>
                
                {{-- Freelancer Job 4 --}}
                <div class="col-span-3">
                    <x-forms.text-input
                        :label="__('messages.t_freelancer_job_4')"
                        :placeholder="__('messages.t_freelancer_job_4')"
                        model="freelancer_job_4"
                        icon="format-font" />
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

                <div class="col-span-12 mt-4 mb-3 border-b border-gray-300"></div>
                
                {{-- Enable testimonials --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_testimonials')"
                        model="show_testimonials" />
                </div>
                
                {{-- Testimonials 1 Image --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_testimonial_image_1')" model="buyer_image_1_id" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->buyer_image_1)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->buyer_image_1 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Testimonials 2 Image --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_testimonial_image_2')" model="buyer_image_2_id" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->buyer_image_2)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->buyer_image_2 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Testimonials 3 Image --}}
                <div class="col-span-4">
                    <x-forms.file-input :label="__('messages.t_testimonial_image_3')" model="buyer_image_3_id" accept="image/jpg,image/jpeg,image/png"  />
                    {{-- Preview image --}}
                    @if (settings('start_selling')->buyer_image_3)
                        <div class="mt-3">
                            <img src="{{ src( settings('start_selling')->buyer_image_3 ) }}" class="h-32 rounded-lg intense cursor-pointer object-cover">
                        </div>
                    @endif
                </div>
                
                {{-- Testimonials Name 1 --}}
                <div class="col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_testimonial_name_1')"
                        :placeholder="__('messages.t_testimonial_name_1')"
                        model="buyer_name_1"
                        icon="format-font" />
                </div>
                
                {{-- Testimonials Name 2 --}}
                <div class="col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_testimonial_name_2')"
                        :placeholder="__('messages.t_testimonial_name_2')"
                        model="buyer_name_2"
                        icon="format-font" />
                </div>
                
                {{-- Testimonials Name 3 --}}
                <div class="col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_testimonial_name_3')"
                        :placeholder="__('messages.t_testimonial_name_3')"
                        model="buyer_name_3"
                        icon="format-font" />
                </div>
                
                {{-- Testimonials Job 1 --}}
                <div class="col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_testimonial_job_1')"
                        :placeholder="__('messages.t_testimonial_job_1')"
                        model="buyer_job_1"
                        icon="format-font" />
                </div>
                
                {{-- Testimonials Job 2 --}}
                <div class="col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_testimonial_job_2')"
                        :placeholder="__('messages.t_testimonial_job_2')"
                        model="buyer_job_2"
                        icon="format-font" />
                </div>
                
                {{-- Testimonials Job 3 --}}
                <div class="col-span-4">
                    <x-forms.text-input
                        :label="__('messages.t_testimonial_job_3')"
                        :placeholder="__('messages.t_testimonial_job_3')"
                        model="buyer_job_3"
                        icon="format-font" />
                </div>
                
                {{-- Testimonials Review 1 --}}
                <div class="col-span-4">
                    <x-forms.textarea :rows="8"
                        :label="__('messages.t_testimonial_review_1')"
                        :placeholder="__('messages.t_testimonial_review_1')"
                        model="buyer_review_1" />
                 </div>
                 
                {{-- Testimonials Review 2 --}}
                <div class="col-span-4">
                    <x-forms.textarea :rows="8"
                        :label="__('messages.t_testimonial_review_2')"
                        :placeholder="__('messages.t_testimonial_review_2')"
                        model="buyer_review_2" />
                 </div>
                
                {{-- Testimonials Review 3 --}}
                <div class="col-span-4">
                    <x-forms.textarea :rows="8"
                        :label="__('messages.t_testimonial_review_3')"
                        :placeholder="__('messages.t_testimonial_review_3')"
                        model="buyer_review_3" />
                 </div>
                 
                <div class="col-span-12 mt-4 mb-3 border-b border-gray-300"></div>
                
                {{-- Enable faq --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_show_faq')"
                        model="show_faq" />
                </div>


            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    