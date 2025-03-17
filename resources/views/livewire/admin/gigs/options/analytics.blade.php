<div class="w-full" x-data="window.YfixJpYNBWtHCUd">
    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

        {{-- Quick stats --}}
        <div class="col-span-12 z-[1]">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                {{-- Total sales --}}
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
                    <div class="relative block border border-gray-100 p-5 md:mt-6 bg-white rounded-lg intro-x">
                        <div class="flex flex-wrap gap-3">
                            <div class="ltr:mr-auto rtl:ml-auto">
                                <div class="text-gray-500 flex items-center leading-3 text-sm font-bold">
                                    {{ __('messages.t_total_sales') }}
                                </div>
                                <div class="text-black relative text-2xl font-black leading-5 mt-4">
                                    {{ number_format($gig->counter_sales) }}
                                </div>
                            </div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total visits --}}
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
                    <div class="relative block overflow-hidden border border-gray-100 p-5 md:mt-6 bg-white rounded-lg intro-x">
                        <div class="flex flex-wrap gap-3">
                            <div class="ltr:mr-auto rtl:ml-auto">
                                <div class="text-gray-500 flex items-center leading-3 text-sm font-bold">
                                    {{ __('messages.t_total_clicks') }}
                                </div>
                                <div class="text-black relative text-2xl font-black leading-5 mt-4">
                                    {{ number_format($gig->counter_visits) }}
                                </div>
                            </div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M6.672 1.911a1 1 0 10-1.932.518l.259.966a1 1 0 001.932-.518l-.26-.966zM2.429 4.74a1 1 0 10-.517 1.932l.966.259a1 1 0 00.517-1.932l-.966-.26zm8.814-.569a1 1 0 00-1.415-1.414l-.707.707a1 1 0 101.415 1.415l.707-.708zm-7.071 7.072l.707-.707A1 1 0 003.465 9.12l-.708.707a1 1 0 001.415 1.415zm3.2-5.171a1 1 0 00-1.3 1.3l4 10a1 1 0 001.823.075l1.38-2.759 3.018 3.02a1 1 0 001.414-1.415l-3.019-3.02 2.76-1.379a1 1 0 00-.076-1.822l-10-4z" clip-rule="evenodd"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total impressions --}}
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
                    <div class="relative block overflow-hidden border border-gray-100 p-5 md:mt-6 bg-white rounded-lg intro-x">
                        <div class="flex flex-wrap gap-3">
                            <div class="ltr:mr-auto rtl:ml-auto">
                                <div class="text-gray-500 flex items-center leading-3 text-sm font-bold">
                                    {{ __('messages.t_total_impressions') }}
                                </div>
                                <div class="text-black relative text-2xl font-black leading-5 mt-4">
                                    {{ number_format($gig->counter_impressions) }}
                                </div>
                            </div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/> <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total reviews --}}
                <div class="col-span-12 sm:col-span-6 md:col-span-6 lg:col-span-4 xl:col-span-3">
                    <div class="relative block overflow-hidden border border-gray-100 p-5 md:mt-6 bg-white rounded-lg intro-x">
                        <div class="flex flex-wrap gap-3">
                            <div class="ltr:mr-auto rtl:ml-auto">
                                <div class="text-gray-500 flex items-center leading-3 text-sm font-bold">
                                    {{ __('messages.t_total_reviews') }}
                                </div>
                                <div class="text-black relative text-2xl font-black leading-5 mt-4">
                                    {{ number_format($gig->counter_reviews) }}
                                </div>
                            </div>
                            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-gray-50 text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Left side --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-5">

            {{-- Gig preview --}}
            <div class="bg-white relative block p-8 overflow-hidden border border-gray-100 rounded-lg mb-6">
                <span
                    class="absolute inset-x-0 bottom-0 h-2  bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"
                ></span>

                <div class="justify-between sm:flex">
                    <div>
                        <a href="{{ url('service', $gig->slug) }}" target="_blank" class="text-lg font-bold text-gray-900 hover:text-purple-700">
                            {{ $gig->title }}
                        </a>
                        <p class="text-[11px] font-[400] text-gray-400 hidden lg:block">{{ url('service', $gig->slug) }}</p>
                    </div>

                    <div class="flex-shrink-0 hidden ltr:ml-3 rtl:mr-3 sm:block">
                        <img
                            class="object-cover w-16 h-16 rounded-lg shadow-sm lazy"
                            src="{{ placeholder_img() }}" data-src="{{ src($gig->thumbnail) }}"
                            alt="{{ $gig->title }}"
                        />
                    </div>
                </div>

                <div class="border-t border-gray-50 mt-2 md:mt-6"></div>

                {{-- Quick gig stats --}}
                <dl class="flex mt-2 md:mt-6">

                    {{-- Date published --}}
                    <div class="flex flex-col-reverse">
                        <dt class="text-sm font-medium text-gray-600">{{ format_date($gig->created_at, 'ago') }}</dt>
                        <dd class="text-[10px] uppercase tracking-widest text-gray-500">{{ __('messages.t_published') }}</dd>
                    </div>

                    {{-- Status --}}
                    <div class="flex flex-col-reverse ltr:ml-3 ltr:sm:ml-6 rtl:mr-3 rtl:sm:mr-6">
                        <dt class="text-sm font-medium text-gray-600">
                            @switch($gig->status)

                                {{-- Pending --}}
                                @case('pending')
                                    <span class="text-yellow-500">
                                        {{ __('messages.t_pending') }}
                                    </span>
                                    @break
                                
                                {{-- Active --}}
                                @case('active')
                                    <span class="text-green-500">
                                        {{ __('messages.t_active') }}
                                    </span>
                                    @break

                                {{-- Deleted --}}
                                @case('deleted')
                                    <span class="text-red-500">
                                        {{ __('messages.t_deleted') }}
                                    </span>
                                    @break

                                {{-- Featured --}}
                                @case('featured')
                                    <span class="text-purple-500">
                                        {{ __('messages.t_featured') }}
                                    </span>
                                    @break

                                {{-- Trending --}}
                                @case('trending')
                                    <span class="text-blue-500">
                                        {{ __('messages.t_trending') }}
                                    </span>
                                    @break

                                {{-- Boosted --}}
                                @case('boosted')
                                    <span class="text-gray-500">
                                        {{ __('messages.t_boosted') }}
                                    </span>
                                    @break

                                @default
                                    
                            @endswitch
                        </dt>
                        <dd class="text-[10px] uppercase tracking-widest text-gray-500">{{ __('messages.t_status') }}</dd>
                    </div>
                    
                </dl>

            </div>

            {{-- Devices types --}}
            <div class="w-full">
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                    {{-- Section title --}}
                    <div class="bg-slate-50 px-8 py-4 rounded-t-md">
                        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_devices') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_devices_chart_subtitle') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Section content --}}
                    <div class="px-8 py-6">
                        <div id="chart-devices"></div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Right side --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-7">

            {{-- Country map --}}
            <div class="col-span-7">
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                    {{-- Section title --}}
                    <div class="bg-slate-50 px-8 py-4 rounded-t-md">
                        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_visitors_map') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_visitors_map_subtitle') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Section content --}}
                    <div class="px-8 py-6 min-h-[500px] grid">
                        <div id="world-map-visitors" class="w-full h-full"></div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Browsers --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-7">
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="bg-slate-50 px-8 py-4 rounded-t-md">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_browsers') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_browsers_chart_subtitle') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="px-8 py-6">
                    <div id="chart-browsers"></div>
                </div>

            </div>
        </div>

        {{-- Os --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-12 lg:col-span-12 xl:col-span-5">
            <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

                {{-- Section title --}}
                <div class="bg-slate-50 px-8 py-4 rounded-t-md">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_os') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_os_chart_subtitle') }}</p>
                        </div>
                    </div>
                </div>

                {{-- Section content --}}
                <div class="px-8 py-6">
                    <div id="chart-os"></div>
                </div>

            </div>
        </div>

        {{-- Recent orders --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-4 mt-3 2xl:mt-8">

            {{-- Section title --}}
            <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200">
                <div class="bg-slate-50 px-6 py-4 rounded-md">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_recent_orders') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_recent_orders_subtitle') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- List of recent orders --}}
            @forelse ($orders as $order)
                <div class="intro-x">
                    <div class="bg-white rounded-lg px-5 py-3 mb-3 flex items-center zoom-in">
                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                            <img class="lazy"  alt="{{ $order->order->buyer->username }}" src="{{ placeholder_img() }}" data-src="{{ src($order->order->buyer->avatar) }}">
                        </div>
                        <div class="ltr:ml-4 ltr:mr-auto rtl:mr-4 rtl:ml-auto">
                            <a href="{{ url('profile', $order->order->buyer->username) }}" class="block font-medium text-[13px] pb-0.5">{{ $order->order->buyer->username }}</a>
                            <div class="text-slate-500 text-xs mt-0.5 text-[11px]">{{ format_date($order->placed_at, config('carbon-formats.F_j_Y')) }}</div>
                        </div>
                        <div class="text-green-500 text-xs font-medium">+ @money($order->profit_value, settings('currency')->code, true)</div>
                    </div>
                </div>
            @empty
                <div class="text-center text-sm font-medium text-gray-400 p-5">
                    {{ __('messages.t_no_data_to_show_now') }}
                </div>
            @endforelse

        </div>

        {{-- Top referrers --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-4 mt-3 2xl:mt-8">

            {{-- Section title --}}
            <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200">
                <div class="bg-slate-50 px-6 py-4 rounded-md">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_referrers') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_referrers_subtitle') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- List of referrers --}}
            @forelse ($referrers as $ref)

                <div class="intro-x">
                    <div class="flex space-x-3 bg-white rounded-lg px-5 py-3 mb-3 justify-between items-center zoom-in">
                        <div class="w-10 h-10 flex justify-center items-center rounded-md overflow-hidden" style="background-color: {{ fake()->hexcolor() }}">
                            <span class="text-base font-black text-white">{{ getWebsiteFirstLetter($ref->visit_from) }}</span>
                        </div>
                        <div class="flex-1 space-y-1 rtl:!mr-4">
                            <div class="flex items-center justify-between">

                                {{-- Check if our website or external website --}}
                                @if (parse_url(url('/'))['host'] == $ref->visit_from)
                                    <div class="block font-medium text-[13px] pb-0.5">{{ $ref->visit_from }}</div>
                                @else
                                    <a href="{{ url('redirect?to=' . safeEncrypt($ref->referrer)) }}" target="_blank" class="block font-medium text-[13px] pb-0.5">{{ $ref->visit_from }}</a>
                                @endif

                                <div class="text-gray-400 text-xs font-medium">{{ $ref->count }}</div>
                            </div>
                            <div class="text-slate-500 text-xs mt-0.5 text-[11px]">{{ $ref->referrer }}</div>
                        </div>
                    </div>
                </div>
                
            @empty
                <div class="text-center text-sm font-medium text-gray-400 p-5">
                    {{ __('messages.t_no_data_to_show_now') }}
                </div>
            @endforelse

        </div>

        {{-- Top visits by cities --}}
        <div class="col-span-12 sm:col-span-12 md:col-span-6 lg:col-span-6 xl:col-span-4 mt-3 2xl:mt-8">

            {{-- Section title --}}
            <div class="mb-6 bg-white shadow-sm rounded-md border border-gray-200">
                <div class="bg-slate-50 px-6 py-4 rounded-md">
                    <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                        <div class="ltr:ml-4 rtl:mr-4 mt-4">
                            <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_cities') }}</h3>
                            <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_most_visits_by_cities') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- List of cities --}}
            @forelse ($cities as $city)
                <div class="intro-x">
                    <div class="bg-white rounded-lg px-5 py-3 mb-3 flex items-center zoom-in">
                        <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden ring-gray-100 ring-1">
                            <img class="lazy" alt="{{ $city->country_name }}" src="{{ placeholder_img() }}" data-src="{{ url('public/img/flags', strtolower("$city->country_code.svg")) }}">
                        </div>
                        <div class="ltr:ml-4 ltr:mr-auto rtl:mr-4 rtl:ml-auto">
                            <div class="block font-medium text-[13px] pb-0.5">{{ $city->city }}</div>
                            <div class="text-slate-500 text-xs mt-0.5 text-[11px]">{{ $city->country_name }}</div>
                        </div>
                        <div class="text-gray-500 text-xs font-medium">{{ $city->count }}</div>
                    </div>
                </div>
            @empty
                <div class="text-center text-sm font-medium text-gray-400 p-5">
                    {{ __('messages.t_no_data_to_show_now') }}
                </div>
            @endforelse

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
        function YfixJpYNBWtHCUd() {
            return {
                // Map
                map() {
                    $(function(){

                        // Get data
                        const data   = @json($countries);

                        const visits = [];

                        data.forEach((element, index) => {

                            const el = { [element.country_code]: element.count };

                            visits.push(el)
                        });

                        let result = visits.reduce((a, c) => {
                            let [[k, v]] = Object.entries(c);
                            a[k] = v; return a;
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
                                selectedHover: {
                                }
                            },
                            series: {
                                regions: [{
                                    values: result,
                                    scale: ['#d7cbfb', '#7b3ff3'],
                                    normalizeFunction: 'polynomial'
                                }]
                            },
                            onRegionTipShow: function(e, el, code){
                                if (result[code]) {
                                    el.html(el.html()+' ({{ __("messages.t_visits") }} '+result[code]+')');
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

                    // Init Os
                    this.os();

                    // Init devices
                    this.devices();

                }
            }
        }
        window.YfixJpYNBWtHCUd = YfixJpYNBWtHCUd();
    </script>

@endpush

@push('styles')
    
    {{-- jVectorMap Plugin --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.5/jquery-jvectormap.min.css" />

@endpush