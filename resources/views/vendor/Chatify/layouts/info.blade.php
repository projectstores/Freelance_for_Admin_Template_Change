<div>

    {{-- Avatar --}}
    <div class="avatar w-16 h-16 chatify-d-flex mx-auto mb-3"></div>
    
    {{-- Fullname --}}
    <span class="text-center flex items-center justify-center text-base font-extrabold tracking-wide text-zinc-800 dark:text-white mb-1" style="display: none" id="selected-contact-fullname"></span>
    
    {{-- Username --}}
    <div class="text-sm font-medium text-zinc-600 dark:text-gray-100 flex items-center justify-center !mt-0">
        <span id="selected-contact-username"></span>
        <div id="selected-contact-verification" style="display: none">
            <img data-tooltip-target="tooltip-account-verified" class="ltr:ml-0.5 rtl:mr-0.5 h-4.5 w-4.5 -mt-0.5" src="{{ url('public/img/auth/verified-badge.svg') }}" alt="{{ __('messages.t_account_verified') }}">
            <div id="tooltip-account-verified" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                {{ __('messages.t_account_verified') }}
            </div>
        </div>
    </div>
    
</div>

{{-- Action buttons --}}
<div class="messenger-infoView-btns flex items-center justify-center space-x-3 rtl:space-x-reverse">

    {{-- View profile --}}
    <a href="" id="selected-contact-view-profile-link" class="inline-flex w-full justify-center items-center px-4 py-2 border border-gray-300 dark:border-zinc-700 shadow-sm dark:shadow-none text-xs font-medium rounded-md text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">
        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-gray-400 dark:text-zinc-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        <span class="whitespace-nowrap font-semibold">@lang('messages.t_view_profile')</span>
    </a>

    {{-- Delete conversation --}}
    <button type="button" class="delete-conversation inline-flex w-full justify-center items-center px-4 py-2 border border-transparent text-xs font-medium rounded-md text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
        <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-5 w-5 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path></svg>
            <span class="whitespace-nowrap font-semibold">@lang('messages.t_delete_conversation')</span>
        </div>        
    </button>
    
</div>

{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title">@lang('messages.t_shared_photos')</p>
    <div class="shared-photos-list grid grid-cols-4 md:gap-x-3 gap-y-4"></div>
</div>
