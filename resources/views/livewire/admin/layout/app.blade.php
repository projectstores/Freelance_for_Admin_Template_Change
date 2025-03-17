<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ config()->get('direction') }}">

    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Generate seo tags --}}
        {!! SEO::generate() !!}

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ src( settings('general')->favicon ) }}"/>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{ url('node_modules/@mdi/font/css/materialdesignicons.min.css') }}">

        {{-- Livewire styles --}}
        @livewireStyles

        {{-- Styles --}}
        <link rel="preload" href="{{ mix('css/app.css') }}" as="style">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        {{-- Custom fonts --}}
		{!! settings('appearance')->font_link !!}

        {{-- Custom css --}}
        <style>
            :root {
                --color-primary-h: {{ hex2hsl( settings('appearance')->colors['primary'] )[0] }};
                --color-primary-s: {{ hex2hsl( settings('appearance')->colors['primary'] )[1] }}%;
                --color-primary-l: {{ hex2hsl( settings('appearance')->colors['primary'] )[2] }}%;
            }
            html {
                font-family: @php echo settings('appearance')->font_family @endphp, sans-serif !important;
            }
        </style>

        {{-- JavaScript variables --}}
        <script>
            __var_app_url        = "{{ url('/') }}";
            __var_app_locale     = "{{ app()->getLocale() }}";
            __var_rtl            = @js(config()->get('direction') === 'ltr' ? false : true);
            __var_primary_color  = "{{ settings('appearance')->colors['primary'] }}";
            __var_axios_base_url = "{{ url('/') }}/";
            __var_currency_code  = "{{ settings('currency')->code }}";
        </script>

        {{-- Custom css --}}
        @stack('styles')

        {{-- Custom head code --}}
        @if (settings('appearance')->custom_code_head_admin_layout)
            {!! settings('appearance')->custom_code_head_admin_layout !!}
        @endif

    </head>

    <body class="antialiased bg-[#f8fafc] text-gray-600 min-h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-hidden scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600" x-data="window.QCwuToAKMICZSdT">

        {{-- Notification --}}
        <x-notifications position="top-center" z-index="z-[60]" />

        {{-- Dialog --}}
        <x-dialog z-index="z-50" blur="sm" />

        {{-- Notifications drawer --}}
        <div id="notifications-drawer" class="fixed top-0 right-0 z-40 h-screen px-6 py-4 overflow-y-auto transition-transform translate-x-full bg-white w-96 dark:bg-gray-800 scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600" tabindex="-1" aria-labelledby="notifications-drawer-label">
            <div class="h-screen">

                {{-- Get notifications --}}
                @php
                    $notifications = pending_admin_notifications();
                @endphp

                {{-- Head --}}
                <div class="flex items-center justify-between">
                    <p tabindex="0" class="focus:outline-none text-base font-bold leading-6 text-zinc-800">
                        @lang('messages.t_notifications')
                    </p>
                    <button role="button" aria-label="close modal" class="cursor-pointer flex focus:outline-none focus:ring-0 h-8 hover:bg-slate-100 items-center justify-center rounded-full w-8" data-drawer-hide="notifications-drawer" aria-controls="notifications-drawer">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
      
                {{-- Body --}}
                <div class="py-10 space-y-6">
                    
                    {{-- Pending users --}}
                    @if ($notifications['count_pending_users'])
                        <a href="{{ admin_url('users') }}" class="w-full p-3 bg-red-100 text-red-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-red-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_users')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-red-200 border border-red-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_users'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending deposit transactions --}}
                    @if ($notifications['count_pending_deposit_transactions'])
                        <a href="{{ admin_url('users/transactions') }}" class="w-full p-3 bg-amber-100 text-amber-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-amber-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M404 160H108c-33.1 0-60 26.9-60 60v168c0 33.1 26.9 60 60 60h296c33.1 0 60-26.9 60-60V220c0-33.1-26.9-60-60-60zM342.9 65L108 110.9c-18 4-44 22.1-44 44.1 0 0 15-19 49-19h287v-20.5c0-12.6-5-28.7-13.9-37.6-11.3-11.3-27.5-16.2-43.2-12.9z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_deposit_transactions')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-amber-200 border border-amber-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_deposit_transactions'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending gigs --}}
                    @if ($notifications['count_pending_gigs'])
                        <a href="{{ admin_url('gigs') }}" class="w-full p-3 bg-green-100 text-green-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-green-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z"></path><path fill-rule="evenodd" d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_gigs')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-green-200 border border-green-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_gigs'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending projects --}}
                    @if ($notifications['count_pending_projects'])
                        <a href="{{ admin_url('projects') }}" class="w-full p-3 bg-orange-100 text-orange-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-orange-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"></path><path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_projects')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-orange-200 border border-orange-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_projects'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending bid subscription --}}
                    @if ($notifications['count_pending_bids_subscriptions'])
                        <a href="{{ admin_url('projects/bids/subscriptions') }}" class="w-full p-3 bg-purple-100 text-purple-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-purple-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M461.8 53.6c-.4-1.7-1.6-3-3.3-3.4-54.4-13.3-180.1 34.1-248.2 102.2-13.3 13.3-24.2 26.4-33.1 39.1-21-1.9-42-.3-59.9 7.5-50.5 22.2-65.2 80.2-69.3 105.1-1 5.9 3.9 11 9.8 10.4l81.1-8.9c.1 7.8.6 14 1.1 18.3.4 4.2 2.3 8.1 5.3 11.1l31.4 31.4c3 3 6.9 4.9 11.1 5.3 4.3.5 10.5 1 18.2 1.1l-8.9 81c-.6 5.9 4.5 10.8 10.4 9.8 24.9-4 83-18.7 105.1-69.2 7.8-17.9 9.4-38.8 7.6-59.7 12.7-8.9 25.9-19.8 39.2-33.1 68.4-68 115.5-190.9 102.4-248zM298.6 213.5c-16.7-16.7-16.7-43.7 0-60.4 16.7-16.7 43.7-16.7 60.4 0 16.7 16.7 16.7 43.7 0 60.4-16.7 16.7-43.7 16.7-60.4 0z"></path><path d="M174.5 380.5c-4.2 4.2-11.7 6.6-19.8 8-18.2 3.1-34.1-12.8-31-31 1.4-8.1 3.7-15.6 7.9-19.7l.1-.1c2.3-2.3.4-6.1-2.8-5.7-9.8 1.2-19.4 5.6-26.9 13.1-18 18-19.7 84.8-19.7 84.8s66.9-1.7 84.9-19.7c7.6-7.6 11.9-17.1 13.1-26.9.3-3.2-3.6-5.1-5.8-2.8z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_bids_subscriptions')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-purple-200 border border-purple-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_bids_subscriptions'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending reported bids --}}
                    @if ($notifications['count_reported_bids'])
                        <a href="{{ admin_url('reports/bids') }}" class="w-full p-3 bg-neutral-100 text-neutral-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-neutral-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 6a3 3 0 013-3h10a1 1 0 01.8 1.6L14.25 8l2.55 3.4A1 1 0 0116 13H6a1 1 0 00-1 1v3a1 1 0 11-2 0V6z" clip-rule="evenodd"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_reported_bids')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-neutral-200 border border-neutral-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_reported_bids'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending reported bids --}}
                    @if ($notifications['count_pending_offers'])
                        <a href="{{ admin_url('offers') }}" class="w-full p-3 bg-violet-100 text-violet-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-violet-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2 3h20v4H2zm17 5H3v11a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V8h-2zm-3 6H8v-2h8v2z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_offers_pending_approval')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-violet-200 border border-violet-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_offers'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending projects subscriptions --}}
                    @if ($notifications['count_pending_projects_subscriptions'])
                        <a href="{{ admin_url('projects/subscriptions') }}" class="w-full p-3 bg-pink-100 text-pink-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-pink-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M160 894c0 17.7 14.3 32 32 32h286V550H160v344zm386 32h286c17.7 0 32-14.3 32-32V550H546v376zm334-616H732.4c13.6-21.4 21.6-46.8 21.6-74 0-76.1-61.9-138-138-138-41.4 0-78.7 18.4-104 47.4-25.3-29-62.6-47.4-104-47.4-76.1 0-138 61.9-138 138 0 27.2 7.9 52.6 21.6 74H144c-17.7 0-32 14.3-32 32v140h366V310h68v172h366V342c0-17.7-14.3-32-32-32zm-402-4h-70c-38.6 0-70-31.4-70-70s31.4-70 70-70 70 31.4 70 70v70zm138 0h-70v-70c0-38.6 31.4-70 70-70s70 31.4 70 70-31.4 70-70 70z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_projects_subscriptions')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-pink-200 border border-pink-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_projects_subscriptions'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending refunds --}}
                    @if ($notifications['count_pending_refunds'])
                        <a href="{{ admin_url('refunds') }}" class="w-full p-3 bg-sky-100 text-sky-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-sky-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12 1.5c-1.921 0-3.816.111-5.68.327-1.497.174-2.57 1.46-2.57 2.93V21.75a.75.75 0 001.029.696l3.471-1.388 3.472 1.388a.75.75 0 00.556 0l3.472-1.388 3.471 1.388a.75.75 0 001.029-.696V4.757c0-1.47-1.073-2.756-2.57-2.93A49.255 49.255 0 0012 1.5zm-.97 6.53a.75.75 0 10-1.06-1.06L7.72 9.22a.75.75 0 000 1.06l2.25 2.25a.75.75 0 101.06-1.06l-.97-.97h3.065a1.875 1.875 0 010 3.75H12a.75.75 0 000 1.5h1.125a3.375 3.375 0 100-6.75h-3.064l.97-.97z" clip-rule="evenodd"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_refunds')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-sky-200 border border-sky-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_refunds'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending reported gigs --}}
                    @if ($notifications['count_reported_gigs'])
                        <a href="{{ admin_url('reports/gigs') }}" class="w-full p-3 bg-lime-100 text-lime-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-lime-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M11.99 1.968c1.023 0 1.97 .521 2.512 1.359l.103 .172l7.1 12.25l.062 .126a3 3 0 0 1 -2.568 4.117l-.199 .008h-14l-.049 -.003l-.112 .002a3 3 0 0 1 -2.268 -1.226l-.109 -.16a3 3 0 0 1 -.32 -2.545l.072 -.194l.06 -.125l7.092 -12.233a3 3 0 0 1 2.625 -1.548zm.02 12.032l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -6a1 1 0 0 0 -.993 .883l-.007 .117v2l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-2l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_reported_gigs')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-lime-200 border border-lime-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_reported_gigs'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending reported projects --}}
                    @if ($notifications['count_reported_projects'])
                        <a href="{{ admin_url('reports/projects') }}" class="w-full p-3 bg-indigo-100 text-indigo-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-indigo-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12.414 5H21a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h7.414l2 2zM11 9v2h2V9h-2zm0 3v5h2v-5h-2z"></path></g></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_reported_projects')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-indigo-200 border border-indigo-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_reported_projects'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending reported users --}}
                    @if ($notifications['count_reported_users'])
                        <a href="{{ admin_url('reports/users') }}" class="w-full p-3 bg-yellow-100 text-yellow-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-yellow-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M14 14.252V22H4a8 8 0 0 1 10-7.748zM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6 6 2.685 6 6-2.685 6-6 6zm7 3.586l2.121-2.122 1.415 1.415L20.414 18l2.122 2.121-1.415 1.415L19 19.414l-2.121 2.122-1.415-1.415L17.586 18l-2.122-2.121 1.415-1.415L19 16.586z"></path></g></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_reported_users')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-yellow-200 border border-yellow-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_reported_users'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending support messages --}}
                    @if ($notifications['count_new_support_messages'])
                        <a href="{{ admin_url('support') }}" class="w-full p-3 bg-blue-100 text-blue-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-blue-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM14 11v2h2v-2h-2zm-6 0v2h2v-2H8z"></path></g></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_support_messages')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-blue-200 border border-blue-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_new_support_messages'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending payouts --}}
                    @if ($notifications['count_pending_payouts'])
                        <a href="{{ admin_url('withdrawals') }}" class="w-full p-3 bg-fuchsia-100 text-fuchsia-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-fuchsia-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" xmlns="http://www.w3.org/2000/svg"><path d="M608 32H32C14.33 32 0 46.33 0 64v384c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V64c0-17.67-14.33-32-32-32zM176 327.88V344c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8v-16.29c-11.29-.58-22.27-4.52-31.37-11.35-3.9-2.93-4.1-8.77-.57-12.14l11.75-11.21c2.77-2.64 6.89-2.76 10.13-.73 3.87 2.42 8.26 3.72 12.82 3.72h28.11c6.5 0 11.8-5.92 11.8-13.19 0-5.95-3.61-11.19-8.77-12.73l-45-13.5c-18.59-5.58-31.58-23.42-31.58-43.39 0-24.52 19.05-44.44 42.67-45.07V152c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16.29c11.29.58 22.27 4.51 31.37 11.35 3.9 2.93 4.1 8.77.57 12.14l-11.75 11.21c-2.77 2.64-6.89 2.76-10.13.73-3.87-2.43-8.26-3.72-12.82-3.72h-28.11c-6.5 0-11.8 5.92-11.8 13.19 0 5.95 3.61 11.19 8.77 12.73l45 13.5c18.59 5.58 31.58 23.42 31.58 43.39 0 24.53-19.05 44.44-42.67 45.07zM416 312c0 4.42-3.58 8-8 8H296c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h112c4.42 0 8 3.58 8 8v16zm160 0c0 4.42-3.58 8-8 8h-80c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h80c4.42 0 8 3.58 8 8v16zm0-96c0 4.42-3.58 8-8 8H296c-4.42 0-8-3.58-8-8v-16c0-4.42 3.58-8 8-8h272c4.42 0 8 3.58 8 8v16z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_withdrawals')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-fuchsia-200 border border-fuchsia-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_payouts'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending portfolio projects --}}
                    @if ($notifications['count_pending_portfolio_projects'])
                        <a href="{{ admin_url('portfolios') }}" class="w-full p-3 bg-zinc-100 text-zinc-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-zinc-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0H24V24H0z"></path><path d="M20 3c.552 0 1 .448 1 1v1.757l-2 2V5H5v8.1l4-4 4.328 4.329-1.327 1.327-.006 4.239 4.246.006 1.33-1.33L18.899 19H19v-2.758l2-2V20c0 .552-.448 1-1 1H4c-.552 0-1-.448-1-1V4c0-.552.448-1 1-1h16zm1.778 4.808l1.414 1.414L15.414 17l-1.416-.002.002-1.412 7.778-7.778zM15.5 7c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5S14 9.328 14 8.5 14.672 7 15.5 7z"></path></g></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_portfolios')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-zinc-200 border border-zinc-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_portfolio_projects'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending verifications --}}
                    @if ($notifications['count_pending_verifications'])
                        <a href="{{ admin_url('verifications') }}" class="w-full p-3 bg-teal-100 text-teal-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-teal-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_verifications')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-teal-200 border border-teal-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_verifications'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending checkout payments --}}
                    @if ($notifications['count_pending_checkout_payments'])
                        <a href="{{ admin_url('invoices') }}" class="w-full p-3 bg-slate-100 text-slate-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-slate-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_checkout_payments')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-slate-200 border border-slate-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_checkout_payments'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                    {{-- Pending Bids --}}
                    @if ($notifications['count_pending_bids'])
                        <a href="{{ admin_url('projects/bids') }}" class="w-full p-3 bg-rose-100 text-rose-700 rounded flex items-center hover:bg-opacity-50">
        
                            {{-- Icon --}}
                            <div class="focus:outline-none w-8 h-8 border rounded-full border-rose-200 flex items-center flex-shrink-0 justify-center">
                                <svg class="h-4 w-4" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                            </div>
        
                            {{-- Notification --}}
                            <div class="ltr:pl-3 rtl:pr-3 w-full flex items-center justify-between">
        
                                {{-- Message --}}
                                <p class="focus:outline-none text-sm leading-none">
                                    @lang('messages.t_pending_bids')
                                </p>
        
                                {{-- Total --}}
                                <p class="bg-rose-200 border border-rose-300 flex focus:outline-none font-bold h-6 items-center justify-center p-1 rounded-full text-xs w-6">
                                    {{ $notifications['count_pending_bids'] }}
                                </p>
        
                            </div>
                        </a>
                    @endif

                </div>
            </div>
            
        </div>

        {{-- Loading page --}}
        <div class="bg-[#f9f9f9] fixed h-full w-full z-[999] flex items-center justify-center" id="screen-loader">
            <div class="text-center">
                <div role="status">
                    <svg class="inline w-16 h-16 text-gray-200 animate-spin fill-gray-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>         
        </div>

        <div class="bg-[#f8fafc] dark:bg-black dark:bg-opacity-60 h-full" :class="{ 'overflow-hidden': isSideMenuOpen }">

            {{-- Header --}}
            @livewire('admin.includes.header')

            <div class="flex flex-1 h-full w-full">
                
                {{-- Sidebar --}}
                @livewire('admin.includes.sidebar')
                
                {{-- Content --}}
                <main class="h-full w-full md:ltr:ml-64 md:rtl:mr-64 mt-20">
                    <div class="container !max-w-full py-12 px-6 lg:px-20">
                        @yield('content')
                    </div>  
                </main> 

            </div> 

        </div>

        {{-- Livewire scripts --}}
        @livewireScripts

        {{-- Wire UI --}}
        <wireui:scripts />

        {{-- Core --}}
        <script defer src="{{ mix('js/app.js') }}"></script>

        {{-- jQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- Helpers --}}
        <script defer src="{{ url('public/js/utils.js?v=1.3.1') }}"></script>
        <script src="{{ url('public/js/components.js?v=1.3.1') }}"></script>

        {{-- JavaScript Codes --}}
        <script>

            // Check when page loaded
            document.addEventListener('alpine:initialized', () => {
                $('#screen-loader').addClass('hidden')
                $('body').removeClass('overflow-y-hidden')
            });


            // Refresh
            window.addEventListener('refresh',() => {
                location.reload();
            });

            // Scroll to specific div
            window.addEventListener('scrollTo', (event) => {

                // Get id to scroll
                const id = event.detail;

                // Scroll
                $('html, body').animate({
                    scrollTop: $("#" + id).offset().top
                }, 500);

            });

            // Scroll to up page
            window.addEventListener('scrollUp', () => {

                // Scroll
                $('html, body').animate({
                    scrollTop: $("body").offset().top
                }, 500);

            });
            
        </script>

        {{-- Custom scripts --}}
        @stack('scripts')

        <script>
            function QCwuToAKMICZSdT() {
                function getThemeFromLocalStorage() {
                    // if user already changed the theme, use it
                    if (window.localStorage.getItem('dark')) {
                        return JSON.parse(window.localStorage.getItem('dark'))
                    }

                    // else return their preferences
                    return (
                    !!window.matchMedia &&
                    window.matchMedia('(prefers-color-scheme: dark)').matches
                    )
                }

                function setThemeToLocalStorage(value) {
                    window.localStorage.setItem('dark', value)
                }

                return {
                    dark: getThemeFromLocalStorage(),
                    toggleTheme() {
                    this.dark = !this.dark
                    setThemeToLocalStorage(this.dark)
                    },
                    isSideMenuOpen: false,
                    toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                    },
                    closeSideMenu() {
                    this.isSideMenuOpen = false
                    },
                    isNotificationsMenuOpen: false,
                    toggleNotificationsMenu() {
                    this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen
                    },
                    closeNotificationsMenu() {
                    this.isNotificationsMenuOpen = false
                    },
                    isProfileMenuOpen: false,
                    toggleProfileMenu() {
                    this.isProfileMenuOpen = !this.isProfileMenuOpen
                    },
                    closeProfileMenu() {
                    this.isProfileMenuOpen = false
                    },
                    isPagesMenuOpen: false,
                    togglePagesMenu() {
                    this.isPagesMenuOpen = !this.isPagesMenuOpen
                    },
                    // Modal
                    isModalOpen: false,
                    trapCleanup: null,
                    openModal() {
                    this.isModalOpen = true
                    this.trapCleanup = focusTrap(document.querySelector('#modal'))
                    },
                    closeModal() {
                    this.isModalOpen = false
                    this.trapCleanup()
                    },
                }
            }
            window.QCwuToAKMICZSdT = QCwuToAKMICZSdT();
        </script>

        {{-- Show notification badge if there are notifications pending --}}
        <script>
            $(document).ready(function(){
                const total_notifications = Number({{ $notifications['total'] }});
                if (total_notifications > 0) {
                    const element = document.getElementById("admin-header-notification-badge");
                    element.classList.remove("hidden");
                }
            });
        </script>

        {{-- Custom footer code --}}
        @if (settings('appearance')->custom_code_footer_admin_layout)
            {!! settings('appearance')->custom_code_footer_admin_layout !!}
        @endif

    </body>

</html>
