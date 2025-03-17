{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="bg-zinc-700 flex h-10 imageModal-close items-center justify-center rounded-full text-2xl text-white w-10">
        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 10.586l4.95-4.95 1.414 1.414-4.95 4.95 4.95 4.95-1.414 1.414-4.95-4.95-4.95 4.95-1.414-1.414 4.95-4.95-4.95-4.95L7.05 5.636z"></path></g></svg>
    </span>
    <img class="imageModal-content" id="imageModalBoxSrc">
</div>

{{-- ---------------------- Delete Modal ---------------------- --}}
<div class="app-modal" data-name="delete">
    <div class="app-modal-container">
        <div class="app-modal-card relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6" data-name="delete" data-modal='0'>
            <div class="">
                <div class="sm:flex sm:items-start">

                    {{-- Icon --}}
                    <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 10.5v3.75m-9.303 3.376C1.83 19.126 2.914 21 4.645 21h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 4.88c-.866-1.501-3.032-1.501-3.898 0L2.697 17.626zM12 17.25h.007v.008H12v-.008z"></path>
                            </svg>
                    </div>

                    {{-- Content --}}
                    <div class="mt-3 text-center sm:mt-0 sm:ltr:ml-4 sm:rtl:mr-4 sm:ltr:text-left sm:rtl:text-right">
                        <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">
                            @lang('messages.t_are_u_sure_u_want_to_delete_this')
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500 dark:text-gray-200">
                                @lang('messages.t_this_action_cannot_be_undone')
                            </p>
                        </div>
                    </div>

                </div>

                {{-- Footer actions --}}
                <div class="!mt-5 sm:!mt-6 sm:flex sm:flex-row-reverse app-modal-footer">

                    {{-- Delete --}}
                    <button type="button" class="delete inline-flex w-full justify-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 sm:ml-3 sm:w-auto sm:text-sm">
                        @lang('messages.t_delete')
                    </button>

                    {{-- Cancel --}}
                    <button type="button" class="cancel mt-3 inline-flex w-full justify-center rounded-md border border-gray-300 bg-white dark:bg-[#454545] dark:border-zinc-700 dark:text-zinc-300 dark:hover:bg-[#202020] px-4 py-2 text-base font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 sm:mt-0 sm:w-auto sm:text-sm">
                        @lang('messages.t_cancel')
                    </button>

                </div>

            </div>
        </div>
    </div>
</div>

{{-- ---------------------- Alert Modal ---------------------- --}}
<div class="app-modal" data-name="alert">
    <div class="app-modal-container">
        <div class="app-modal-card" data-name="alert" data-modal='0'>
            <div class="app-modal-header"></div>
            <div class="app-modal-body"></div>
            <div class="app-modal-footer">
                <a href="javascript:void(0)" class="app-btn cancel">@lang('messages.t_cancel')</a>
            </div>
        </div>
    </div>
</div>
