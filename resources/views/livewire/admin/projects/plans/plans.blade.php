<div class="w-full">

    {{-- Loading --}}
    <x-forms.loading />

    {{-- Alert --}}
    @if ($alert)
        <div class="rounded-md bg-white shadow-sm border p-4 mb-16">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-zinc-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path> </svg>
                </div>
                <div class="ltr:ml-3 rtl:mr-3">
                    <h3 class="text-sm font-medium text-zinc-500">Attention needed</h3>
                    <div class="mt-2 text-sm text-slate-500">
                        <p class="leading-relaxed">
                            If you are planning to use this feature, an extended license is required, please consider upgrading your current license if you are using a Regular one. We've made a big discount for a very limited time on extended license.<br>
                            If you need a payment gateway to receive payments from employer or freelancer, all you have to do is contacting me.
                        </p>
                    </div>
                    <div class="mt-6">
                        <div class="-mx-2 -my-1.5 flex">

                            {{-- Upgrade license --}}
                            <a href="https://help.market.envato.com/hc/en-us/articles/115005593503-If-I-choose-the-wrong-license-or-need-to-upgrade-my-license-how-easy-is-it-to-change-to-the-correct-license-" target="_blank" class="px-2 py-1.5 text-sm font-medium text-slate-800 focus:outline-none focus:ring-0 flex items-center space-x-1 rtl:space-x-reverse group">
                                <svg class="w-4.5 h-4.5 opacity-60 group-hover:opacity-100" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 20 20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 8a6 6 0 01-7.743 5.743L10 14l-1 1-1 1H6v2H2v-4l4.257-4.257A6 6 0 1118 8zm-6-4a1 1 0 100 2 2 2 0 012 2 1 1 0 102 0 4 4 0 00-4-4z" clip-rule="evenodd"></path></svg>
                                <span>Upgrade license</span>
                            </a>

                            {{-- Contact author --}}
                            <a href="{{ url('https://wa.me/'. config('global.whatsapp') .'/?text=Hello') }}" target="_blank" class="px-2 py-1.5 text-sm font-medium text-slate-800 focus:outline-none focus:ring-0 flex items-center space-x-1 rtl:space-x-reverse group">
                                <svg class="w-4.5 h-4.5 opacity-60 group-hover:opacity-100" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M2 8.994A5.99 5.99 0 0 1 8 3h8c3.313 0 6 2.695 6 5.994V21H8c-3.313 0-6-2.695-6-5.994V8.994zM14 11v2h2v-2h-2zm-6 0v2h2v-2H8z"></path></g></svg>
                                <span>Contact author</span>
                            </a>

                            {{-- Don't show this message again --}}
                            <button wire:click="hideAlert" type="button" class="px-2 py-1.5 text-sm font-medium text-slate-800 focus:outline-none focus:ring-0 flex items-center space-x-1 rtl:space-x-reverse group">
                                <svg class="w-4.5 h-4.5 opacity-60 group-hover:opacity-100" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48zm86.63 272L320 342.63l-64-64-64 64L169.37 320l64-64-64-64L192 169.37l64 64 64-64L342.63 192l-64 64z"></path></svg>
                                <span>Don't show this message again</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Section title --}}
    <div>
        <h3 class="text-lg font-bold text-gray-900">
            {{ __('messages.t_plans_for_promoting_projects') }}
        </h3>
        <p class="mt-1 text-sm font-normal text-gray-500">
            {{ __('messages.t_projects_subscription_plans_subtitle') }}
        </p>
    </div>

    <div class="mt-4 space-y-4 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4 mb-16">

        {{-- List of plans --}}
        @foreach ($plans as $s)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm" wire:key="projects-plans-{{ $s->id }}">
                <div class="p-6">

                    {{-- Badge --}}
                    <h3 class="inline-flex px-4 py-2 rounded-full text-xs font-semibold tracking-wide uppercase" style="color: {{ $s->badge_text_color }};background-color: {{ $s->badge_bg_color }};">
                        {{ $s->title }}
                    </h3>

                    {{-- Description --}}
                    <p class="mt-4 text-sm text-gray-500 h-24 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600">
                        {{ $s->description }}
                    </p>

                    {{-- Price --}}
                    <p class="mt-8">
                        <span class="text-3xl font-extrabold text-gray-900 ">
                            {{ _price($s->price) }}
                        </span>
                        @if ($s->days)
                            <span class="text-xs font-medium text-gray-500 lowercase">/ {{ $s->days }} {{ __('messages.t_days') }}</span>
                        @endif
                    </p>

                    {{-- Actions --}}
                    <div class="border-t border-gray-100 flex divide-x divide-gray-100 -mx-6 mt-6 -mb-6">

                        {{-- Activate --}}
                        @if (!$s->is_active)
                            <div class="w-0 flex-1 flex">
                                <button 
                                    wire:click="activate('{{ $s->id }}')"
                                    wire:loading.class="cursor-not-allowed "
                                    wire:loading.attr="disabled"
                                    class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                    
                                    {{-- Loading --}}
                                    <div wire:loading wire:target="activate('{{ $s->id }}')">
                                        <svg role="status" class="w-5 h-5 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div> 

                                    {{-- Icon --}}
                                    <div wire:loading.remove wire:target="activate('{{ $s->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>

                                    <span class="ltr:ml-3 rtl:mr-3">{{ __('messages.t_enable') }}</span>
                                </button>
                            </div>
                        @endif

                        {{-- Disable --}}
                        @if ($s->is_active)
                            <div class="w-0 flex-1 flex">
                                <button 
                                    wire:click="disable('{{ $s->id }}')"
                                    wire:loading.class="cursor-not-allowed "
                                    wire:loading.attr="disabled"
                                    class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                    
                                    {{-- Loading --}}
                                    <div wire:loading wire:target="disable('{{ $s->id }}')">
                                        <svg role="status" class="w-5 h-5 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div> 

                                    {{-- Icon --}}
                                    <div wire:loading.remove wire:target="disable('{{ $s->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>

                                    <span class="ltr:ml-3 rtl:mr-3">{{ __('messages.t_disable') }}</span>
                                </button>
                            </div>
                        @endif

                        {{-- Edit --}}
                        <div class="ltr:-ml-px rtl:-mr-px w-0 flex-1 flex">
                            <a href="{{ admin_url('projects/plans/edit/' . $s->id) }}" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                <span class="ltr:ml-3 rtl:mr-3">{{ __('messages.t_edit') }}</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
        
    </div>

    {{-- Section title --}}
    <div>
        <h3 class="text-lg font-bold text-gray-900">
            {{ __('messages.t_plans_for_promoting_bids') }}
        </h3>
        <p class="mt-1 text-sm font-normal text-gray-500">
            {{ __('messages.t_plans_for_promoting_bids_subtitle') }}
        </p>
    </div>

    {{-- List of plans --}}
    <ul role="list" class="space-y-4 mt-4">

        @foreach ($bidding_plans as $plan)
            <li>
                <div class="block bg-white shadow rounded-md">
                    <div class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">

                            {{-- Badge --}}
                            <h3 class="inline-flex px-4 py-2 rounded-sm text-xs font-semibold tracking-wide uppercase" style="color: {{ $plan->badge_text_color }};background-color: {{ $plan->badge_bg_color }};">
                                {{ __('messages.t_' . $plan->plan_type) }}
                            </h3>

                            {{-- Price --}}
                            <div class="flex-shrink-0 flex font-semibold text-base text-black">
                                @money($plan->price, settings('currency')->code, true)
                            </div>
                                
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="text-sm text-gray-500">

                                {{-- Plan description --}}
                                <div class="py-3">
                                    {{ __('messages.t_bidding_plan_' . $plan->plan_type . '_subtitle') }}
                                </div>

                                {{-- Plan footer --}}
                                <div class="mt-2 flex flex-col text-gray-500 xl:flex-row">
                                    <div class="flex items-start">

                                        {{-- Edit --}}
                                        <dt class="mt-0.5">
                                            <a class="flex items-center space-x-2 rtl:space-x-reverse group" href="{{ admin_url('projects/plans/bidding/edit/' . $plan->uid) }}">
                                                <svg class="w-5 h-5 text-gray-500 group-hover:text-primary-600" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z"></path></svg>
                                                <span class="font-medium hover:text-primary-600">{{ __('messages.t_edit') }}</span>
                                            </a>
                                        </dt>

                                    </div>

                                    <div class="mt-2 flex items-start space-x-3 xl:mt-0 xl:ml-3.5 xl:border-l xl:border-gray-400 xl:border-opacity-50 xl:pl-3.5">

                                        {{-- Status --}}
                                        <dt class="mt-0.5 flex items-center space-x-2 rtl:space-x-reverse">
                                            @if ($plan->is_active)
                                                <span class="flex w-3 h-3 bg-green-400 rounded-full"></span>
                                                <span class="text-[13px] font-medium text-green-600">@lang('messages.t_active')</span>  
                                            @else
                                                <span class="flex w-3 h-3 bg-red-500 rounded-full"></span>
                                                <span class="text-[13px] font-medium text-red-600">@lang('messages.t_disabled')</span>  
                                            @endif

                                        </dt>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
        
    </ul>

</div>