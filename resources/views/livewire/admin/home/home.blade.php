<div class="w-full" x-data="window.yUOVkgHfZIoHQDO">

    {{-- Basic stats --}}
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 mb-12">

        {{-- Net income --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_net_income') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        @money($net_income, settings('currency')->code, true)
                    </p>
                </div>
            </div>
        </div>

        {{-- Income from taxes --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_taxes') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        @money($income_from_taxes, settings('currency')->code, true)
                    </p>
                </div>
            </div>
        </div>

        {{-- Income from commission --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_commission') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        @money($income_from_commission, settings('currency')->code, true)
                    </p>
                </div>
            </div>
        </div>

        {{-- Withdrawn money --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_withdrawn_money') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        @money($withdrawn_money, settings('currency')->code, true)
                    </p>
                </div>
            </div>
        </div>

        {{-- Total sales --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_total_sales') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        {{ number_format($total_sales) }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Total gigs --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_total_gigs') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        {{ number_format($total_gigs) }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Total users --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_total_users') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        {{ number_format($total_users) }}
                    </p>
                </div>
            </div>
        </div>

        {{-- Total messages --}}
        <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="shadow-sm rounded-lg p-4 bg-white border border-gray-200 flex flex-col justify-between h-full">
                <div class="flex flex-col items-center">
                    <span class="rounded-full h-16 w-16 flex-none flex items-center justify-center relative border border-zinc-300 bg-zinc-100">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-6 h-6 text-zinc-500"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <div class="mt-2">
                        <div class="block font-semibold mb-0.5 text-sm text-zinc-600 tracking-wide">
                            {{ __('messages.t_total_messages') }}
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-start">
                    <p
                        class="dark:text-gray-100 font-semibold mt-2 text-2xl text-black text-center tracking-wider">
                        {{ number_format($total_messages) }}
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- Advanced stats --}}
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 mb-8">

        {{-- Map --}}
        <div class="col-span-12">
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-gray-200 dark:border-zinc-700">
    
                {{-- Section title --}}
                <div class="border-b px-8 py-4 rounded-t-md">
                    <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="font-semibold mb-1 text-black text-sm">
                                {{ __('messages.t_visitors_map') }}</h3>
                            <p class="text-sm font-normal text-gray-400">
                                {{ __('messages.t_latest_visits_to_ur_website') }}</p>
                        </div>
                    </div>
                </div>
    
                {{-- Section content --}}
                <div class="px-8 py-6 min-h-[500px] grid">
                    <div id="world-map-visitors" class="w-full h-full"></div>
                </div>
    
            </div>
        </div>

        {{-- Latest users --}}
        <div class="col-span-12">
            <div class="w-full">

                {{-- Section title --}}
                <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200">
                    <div class="border-b px-2 py-4 rounded-md">
                        <div class="-ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowra">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="font-semibold mb-1 text-black text-sm">{{ __('messages.t_latest_users') }}</h3>
                                <p class="text-sm font-normal text-gray-400">{{ __('messages.t_latest_10_users') }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- List of recent users --}}
                @forelse ($latest_users as $user)
                    <div class="intro-x">
                        <div class="bg-white shadow-sm rounded-lg px-5 py-3 mb-3 flex items-center zoom-in">
                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                <img alt="{{ $user->username }}" src="{{ placeholder_img() }}" data-src="{{ src($user->avatar) }}" class="lazy">
                            </div>
                            <div class="ltr:ml-4 ltr:mr-auto rtl:mr-4 rtl:ml-auto">
                                <a href="{{ url('profile', $user->username) }}" target="_blank" class="block font-medium text-[13px] pb-0.5">{{ $user->username }}</a>
                                <div class="text-slate-500 text-xs mt-0.5 text-[11px]">{{ format_date($user->created_at, config('carbon-formats.F_j,_Y_h_:_i_A')) }}</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center text-sm font-medium text-gray-400 p-5">
                        {{ __('messages.t_no_data_to_show_now') }}
                    </div>
                @endforelse

            </div>
        </div>

        {{-- Operating Systems --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-6">
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="border-b px-8 py-4 rounded-t-md">
                    <div class="-ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowra">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="font-semibold mb-1 text-black text-sm">{{ __('messages.t_os') }}</h3>
                            <p class="text-sm font-normal text-gray-400">{{ __('messages.t_os_chart_subtitle') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="px-8 py-6">
                    <div id="chart-os"></div>
                </div>

            </div>
        </div>

        {{-- Devices --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-6">
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="border-b px-8 py-4 rounded-t-md">
                    <div class="-ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowra">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="font-semibold mb-1 text-black text-sm">{{ __('messages.t_devices') }}</h3>
                            <p class="text-sm font-normal text-gray-400">{{ __('messages.t_devices_chart_subtitle') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="px-8 py-6">
                    <div id="chart-devices"></div>
                </div>

            </div>
        </div>

        {{-- Browsers --}}
        <div class="col-span-12">
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="border-b px-8 py-4 rounded-t-md">
                    <div class="-ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowra">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="font-semibold mb-1 text-black text-sm">{{ __('messages.t_browsers') }}</h3>
                            <p class="text-sm font-normal text-gray-400">{{ __('messages.t_browsers_chart_subtitle') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="px-8 py-6">
                    <div id="chart-browsers"></div>
                </div>

            </div>
        </div>

    </div>

</div>

@push('scripts')
    {{-- jVectorMap Plugin --}}
    <script defer src="{{ url('public/js/plugins/jvectormap/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script defer src="{{ url('public/js/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>

    {{-- ApexCharts Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    {{-- AlpineJs --}}
    <script>
        function yUOVkgHfZIoHQDO() {
            return {

                // Map
                map() {
                    $(function() {

                        // Get data
                        const data = @json($visits_by_countries);

                        const visits = [];

                        data.forEach((element, index) => {

                            const el = {
                                [element.country_code]: element.count
                            };

                            visits.push(el)
                        });

                        let result = visits.reduce((a, c) => {
                            let [
                                [k, v]
                            ] = Object.entries(c);
                            a[k] = v;
                            return a;
                        }, {});

                        $('#world-map-visitors').vectorMap({
                            map: 'world_mill',
                            backgroundColor: 'transparent',
                            regionStyle: {
                                initial: {
                                    fill: '#9d9d9d',
                                    "fill-opacity": 1,
                                    stroke: 'none',
                                    "stroke-width": 0,
                                    "stroke-opacity": 1
                                },
                                hover: {
                                    "fill-opacity": 0.8,
                                    cursor: 'pointer'
                                },
                                selected: {
                                    fill: '#9d9d9d'
                                },
                                selectedHover: {}
                            },
                            series: {
                                regions: [{
                                    values: result,
                                    scale: ['#d7cbfb', '#7b3ff3'],
                                    normalizeFunction: 'polynomial'
                                }]
                            },
                            onRegionTipShow: function(e, el, code) {
                                if (result[code]) {
                                    el.html(el.html() + ' ({{ __('messages.t_visits') }} ' + result[
                                        code] + ')');
                                }
                            }
                        });

                    });
                },

                // Browsers
                browsers() {

                    // Set data
                    const data       = @json($browsers);
                    const series     = [];
                    const categories = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(Number(element.count))
                        categories.push(element.browser_name)
                    });

                    // Set chart options
                    var options = {
                        series: [{ data: series }],
                        chart: {
                            height: 350,
                            type  : 'bar',
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '45%',
                                distributed: true,
                            }
                        },
                        dataLabels: { enabled: false },
                        legend: { show: false },
                        xaxis: {
                            categories: categories,
                            labels: {
                                style: {
                                    fontSize: '12px'
                                }
                            }
                        },
                        grid: {
                            show: false,
                        },
                        tooltip: {
                            custom: function({series, seriesIndex, dataPointIndex, w}) {
                                return '<div class="bg-black px-4 py-2 opacity-50 text-white border-0 text-xs font-medium"> {{ __("messages.t_visits") }} ' + series[seriesIndex][dataPointIndex] + '</div>'
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-browsers"), options);
                    chart.render();

                },

                // Os
                os() {

                    // Set data
                    const data   = @json($os);
                    const series = [];
                    const labels = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(Number(element.count))
                        labels.push(element.os_name)
                    });

                    // Set chart options
                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            width: 380,
                            type  : 'pie',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                width: 200
                                },
                                legend: {
                                position: 'bottom'
                                }
                            }
                        }],
                        grid: {
                            show: false,
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-os"), options);
                    chart.render();

                },

                // Devices
                devices() {

                    // Set data
                    const data   = @json($devices);
                    const series = [];
                    const labels = [];

                    // Loop through data
                    data.forEach(element => {
                        series.push(Number(element.count))
                        labels.push(element.device_type)
                    });

                    // Set chart options
                    var options = {
                        series: series,
                        labels: labels,
                        chart: {
                            width: 380,
                            type  : 'pie',
                        },
                        responsive: [{
                            breakpoint: 480,
                            options: {
                                chart: {
                                width: 200
                                },
                                legend: {
                                position: 'bottom'
                                }
                            }
                        }],
                        grid: {
                            show: false,
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#chart-devices"), options);
                    chart.render();

                },

                // Init
                init() {

                    // Init map
                    this.map();

                    // Init browsers
                    this.browsers();

                    // Init os
                    this.os();

                    // Init devices
                    this.devices();

                }

            }
        }
        window.yUOVkgHfZIoHQDO = yUOVkgHfZIoHQDO();
    </script>
@endpush

@push('styles')
    {{-- jVectorMap Plugin --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css" />
@endpush
