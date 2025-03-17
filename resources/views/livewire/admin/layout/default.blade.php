<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ config()->get('direction') }}">

    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Generate seo tags --}}
        {!! SEO::generate() !!}

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="{{ url('node_modules/@mdi/font/css/materialdesignicons.min.css') }}">

        {{-- Livewire styles --}}
        @livewireStyles

        {{-- Styles --}}
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/style.css') }}" rel="stylesheet">

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

        {{-- Toastr Plugin --}}
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        {{-- Custom css --}}
        @stack('styles')

    </head>

    <body class="antialiased bg-white text-gray-600 min-h-full h-full flex flex-col application application-ltr overflow-x-hidden overflow-y-hidden">

        {{-- Content --}}
        <main class="flex-grow">
            <div class="max-w-container mx-auto px-4 sm:px-6 lg:px-36 pt-16 pb-24 space-y-8 min-h-screen">
                @yield('content')
            </div>
        </main>

        {{-- Livewire scripts --}}
        @livewireScripts

        {{-- AlpineJS Core --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.min.js" defer></script>

        {{-- jQuery --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        {{-- Flowbite --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@1.5.3/dist/flowbite.js"></script>

        {{-- Toastr Plugin --}}
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        {{-- Helpers --}}
        <script src="{{ url('public/js/utils.js') }}"></script>
        <script src="{{ url('public/js/components.js') }}"></script>

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

            // Scroll up on page change
            $(document).on('click', '.page-link-scroll-to-top', function (e) {
                $("html, body").animate({ scrollTop: 0 }, "slow");
                return false;
            });

        </script>

        {{-- Custom scripts --}}
        @stack('scripts')

    </body>

</html>