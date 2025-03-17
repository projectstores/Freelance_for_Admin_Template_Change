<div class="w-full">

    {{-- Loading --}}
    <x-forms.loading />
    
    {{-- Heading --}}
    <div class="mb-16 bg-white rounded-lg shadow-sm px-10 py-6 border border-gray-200">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    {{-- Section heading --}}
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        <span>{{ $name }}</span>
                    </h2>
    
                    {{-- Breadcrumbs --}}
                    <div class="mt-3 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6 rtl:space-x-reverse">
                        <ol class="inline-flex items-center mb-3 space-x-1 md:space-x-3 md:rtl:space-x-reverse sm:mb-0">

                            {{-- Main home --}}
                            <li>
                                <div class="flex items-center">
                                    <a href="{{ url('/') }}" class="text-sm font-medium text-gray-700 hover:text-primary-600 dark:text-zinc-300 dark:hover:text-white">
                                        @lang('messages.t_home')
                                    </a>
                                </div>
                            </li>
            
                            {{-- dashboard --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <a href="{{ admin_url('/') }}" class="ltr:ml-1 rtl:mr-1 text-sm font-medium text-gray-700 hover:text-primary-600 md:ltr:ml-2 md:rtl:mr-2 dark:text-zinc-300 dark:hover:text-white">
                                        @lang('messages.t_dashboard')
                                    </a>
                                </div>
                            </li>
            
                            {{-- Payment gateways --}}
                            <li aria-current="page">
                                <div class="flex items-center">
                                    <svg aria-hidden="true" class="w-4 h-4 text-gray-400 rtl:rotate-180" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                    <span class="mx-1 text-sm font-medium text-gray-400 md:mx-2 dark:text-zinc-400">
                                        @lang('dashboard.t_payment_gateways')
                                    </span>
                                </div>
                            </li>
            
                        </ol>
                    </div>
                    
                </div>
    
                {{-- Actions --}}
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    {{-- Go back --}}
                    <span class="">
                        <a href="{{ admin_url('services/payment') }}" class="relative inline-flex items-center px-7 py-2.5 border border-gray-300 dark:border-zinc-600 dark:hover:bg-zinc-700 dark:text-gray-200 bg-white dark:bg-zinc-800 text-[13px] font-medium text-gray-700 hover:shadow-none focus:z-10 focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600 shadow-sm rounded-md">
                            @lang('messages.t_go_back')
                        </a>
                    </span>

                </div>
    
            </div>
        </div>
    </div>

    {{-- Body --}}
    <div class="w-full bg-white rounded-lg shadow-sm px-10 py-12 border border-gray-200">
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

            {{-- Name --}}
            <div class="col-span-12">
                <x-forms.text-input
                    :label="__('messages.t_name')"
                    :placeholder="__('messages.t_enter_payment_method_name')"
                    model="name"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M221.66,90.34,192,120,136,64l29.66-29.66a8,8,0,0,1,11.31,0L221.66,79A8,8,0,0,1,221.66,90.34Z" opacity="0.2"></path><path d="M227.32,73.37,182.63,28.69a16,16,0,0,0-22.63,0L36.69,152A15.86,15.86,0,0,0,32,163.31V208a16,16,0,0,0,16,16H92.69A15.86,15.86,0,0,0,104,219.31l83.67-83.66,3.48,13.9-36.8,36.79a8,8,0,0,0,11.31,11.32l40-40a8,8,0,0,0,2.11-7.6l-6.9-27.61L227.32,96A16,16,0,0,0,227.32,73.37ZM48,208V179.31L76.69,208Zm48-3.31L51.31,160,136,75.31,180.69,120Zm96-96L147.32,64l24-24L216,84.69Z"></path></svg>' />
            </div>

            {{-- Status --}}
            <div class="col-span-12">
                <div class="w-full" wire:ignore>
                    <x-forms.select2
                        :label="__('messages.t_status')"
                        :placeholder="__('messages.t_enable_this_payment_gateway')"
                        model="is_active"
                        :options="[
                            ['text' => __('messages.t_enabled'), 'value' => 1],
                            ['text' => __('messages.t_disabled'), 'value' => 0],
                        ]"
                        :isDefer="true"
                        :isAssociative="false"
                        :componentId="$this->id"
                        value="value"
                        text="text" />
                </div>
            </div>

            {{-- Logo --}}
            <div class="col-span-12">
                <x-forms.file-input :label="__('messages.t_payment_gateway_logo')" model="logo" accept="image/jpg,image/jpeg,image/png"  />
                {{-- Preview image --}}
                @if (payment_gateway($slug)?->logo)
                    <div class="mt-3">
                        <img src="{{ src( payment_gateway($slug)?->logo ) }}" class="h-32 rounded-lg intense cursor-pointer object-contain">
                    </div>
                @endif
            </div>

            {{-- Exchange rate --}}
            <div class="col-span-12">
                <x-forms.text-input
                    :label="__('messages.t_exchange_rate')"
                    :placeholder="__('messages.t_enter_exchange_rate_to_usd')"
                    model="exchange_rate"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M192,168a40,40,0,0,1-40,40H128V128h24A40,40,0,0,1,192,168ZM112,48a40,40,0,0,0,0,80h16V48Z" opacity="0.2"></path><path d="M152,120H136V56h8a32,32,0,0,1,32,32,8,8,0,0,0,16,0,48.05,48.05,0,0,0-48-48h-8V24a8,8,0,0,0-16,0V40h-8a48,48,0,0,0,0,96h8v64H104a32,32,0,0,1-32-32,8,8,0,0,0-16,0,48.05,48.05,0,0,0,48,48h16v16a8,8,0,0,0,16,0V216h16a48,48,0,0,0,0-96Zm-40,0a32,32,0,0,1,0-64h8v64Zm40,80H136V136h16a32,32,0,0,1,0,64Z"></path></svg>' />
            </div>

            {{-- Default currency --}}
            <div class="col-span-12">
                <div class="w-full" wire:ignore>
                    <x-forms.select2
                        :label="__('messages.t_default_currency')"
                        :placeholder="__('messages.t_choose_currency_code')"
                        model="currency"
                        :options="$currencies"
                        :isDefer="true"
                        :isAssociative="true"
                        :componentId="$this->id"
                        value="code"
                        text="code" />
                </div>
            </div>

            {{-- Deposit min amount --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    :label="__('dashboard.t_deposit_min_amount')"
                    placeholder="0.00"
                    model="deposit_min_amount"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M200,112l-72,72L56,112Z" opacity="0.2"></path><path d="M122.34,189.66a8,8,0,0,0,11.32,0l72-72A8,8,0,0,0,200,104H136V32a8,8,0,0,0-16,0v72H56a8,8,0,0,0-5.66,13.66ZM180.69,120,128,172.69,75.31,120ZM224,216a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,216Z"></path></svg>' />
            </div>

            {{-- Deposit max amount --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    :label="__('dashboard.t_deposit_max_amount')"
                    placeholder="0.00"
                    model="deposit_max_amount"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M200,144H56l72-72Z" opacity="0.2"></path><path d="M133.66,66.34a8,8,0,0,0-11.32,0l-72,72A8,8,0,0,0,56,152h64v72a8,8,0,0,0,16,0V152h64a8,8,0,0,0,5.66-13.66ZM75.31,136,128,83.31,180.69,136ZM224,40a8,8,0,0,1-8,8H40a8,8,0,0,1,0-16H216A8,8,0,0,1,224,40Z"></path></svg>' />
            </div>

            {{-- Divider --}}
            <div class="col-span-12">
                <div class="-mx-10 my-10 flex items-center gap-4 before:h-px before:flex-1 before:bg-gray-100 text-sm text-gray-500 font-semibold before:content-[''] after:h-px after:flex-1 after:bg-gray-100 after:content-['']">
                    Fee settings
                </div>
            </div>

            {{-- Deposit fee (percentage) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Deposit fee (percentage)"
                    placeholder="0.00"
                    model="deposit_fee_percentage"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M95.8,56.2a28,28,0,1,1-39.6,0A28,28,0,0,1,95.8,56.2Zm104,104a28,28,0,1,0,0,39.6A28,28,0,0,0,199.8,160.2Z" opacity="0.2"></path><path d="M205.66,61.64l-144,144a8,8,0,0,1-11.32-11.32l144-144a8,8,0,0,1,11.32,11.31ZM50.54,101.44a36,36,0,0,1,50.92-50.91h0a36,36,0,0,1-50.92,50.91ZM56,76A20,20,0,1,0,90.14,61.84h0A20,20,0,0,0,56,76ZM216,180a36,36,0,1,1-10.54-25.46h0A35.76,35.76,0,0,1,216,180Zm-16,0a20,20,0,1,0-5.86,14.14A19.87,19.87,0,0,0,200,180Z"></path></svg>' />
            </div>

            {{-- Deposit fee (fixed) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Deposit fee (fixed)"
                    placeholder="0.00"
                    model="deposit_fee_fixed"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M160,128a32,32,0,1,1-32-32A32,32,0,0,1,160,128Zm40-64a48.85,48.85,0,0,0,40,40V64Zm0,128h40V152A48.85,48.85,0,0,0,200,192ZM16,152v40H56A48.85,48.85,0,0,0,16,152Zm0-48A48.85,48.85,0,0,0,56,64H16Z" opacity="0.2"></path><path d="M128,88a40,40,0,1,0,40,40A40,40,0,0,0,128,88Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,152ZM240,56H16a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H240a8,8,0,0,0,8-8V64A8,8,0,0,0,240,56ZM24,72H45.37A40.81,40.81,0,0,1,24,93.37Zm0,112V162.63A40.81,40.81,0,0,1,45.37,184Zm208,0H210.63A40.81,40.81,0,0,1,232,162.63Zm0-38.35A56.78,56.78,0,0,0,193.65,184H62.35A56.78,56.78,0,0,0,24,145.65v-35.3A56.78,56.78,0,0,0,62.35,72h131.3A56.78,56.78,0,0,0,232,110.35Zm0-52.28A40.81,40.81,0,0,1,210.63,72H232Z"></path></svg>' />
            </div>

            {{-- Gigs checkout fee (percentage) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Gigs checkout fee (percentage)"
                    placeholder="0.00"
                    model="gigs_checkout_fee_percentage"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M95.8,56.2a28,28,0,1,1-39.6,0A28,28,0,0,1,95.8,56.2Zm104,104a28,28,0,1,0,0,39.6A28,28,0,0,0,199.8,160.2Z" opacity="0.2"></path><path d="M205.66,61.64l-144,144a8,8,0,0,1-11.32-11.32l144-144a8,8,0,0,1,11.32,11.31ZM50.54,101.44a36,36,0,0,1,50.92-50.91h0a36,36,0,0,1-50.92,50.91ZM56,76A20,20,0,1,0,90.14,61.84h0A20,20,0,0,0,56,76ZM216,180a36,36,0,1,1-10.54-25.46h0A35.76,35.76,0,0,1,216,180Zm-16,0a20,20,0,1,0-5.86,14.14A19.87,19.87,0,0,0,200,180Z"></path></svg>' />
            </div>

            {{-- Gigs checkout fee (fixed) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Gigs checkout fee (fixed)"
                    placeholder="0.00"
                    model="gigs_checkout_fee_fixed"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M160,128a32,32,0,1,1-32-32A32,32,0,0,1,160,128Zm40-64a48.85,48.85,0,0,0,40,40V64Zm0,128h40V152A48.85,48.85,0,0,0,200,192ZM16,152v40H56A48.85,48.85,0,0,0,16,152Zm0-48A48.85,48.85,0,0,0,56,64H16Z" opacity="0.2"></path><path d="M128,88a40,40,0,1,0,40,40A40,40,0,0,0,128,88Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,152ZM240,56H16a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H240a8,8,0,0,0,8-8V64A8,8,0,0,0,240,56ZM24,72H45.37A40.81,40.81,0,0,1,24,93.37Zm0,112V162.63A40.81,40.81,0,0,1,45.37,184Zm208,0H210.63A40.81,40.81,0,0,1,232,162.63Zm0-38.35A56.78,56.78,0,0,0,193.65,184H62.35A56.78,56.78,0,0,0,24,145.65v-35.3A56.78,56.78,0,0,0,62.35,72h131.3A56.78,56.78,0,0,0,232,110.35Zm0-52.28A40.81,40.81,0,0,1,210.63,72H232Z"></path></svg>' />
            </div>

            {{-- Projects checkout fee (percentage) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Projects checkout fee (percentage)"
                    placeholder="0.00"
                    model="projects_checkout_fee_percentage"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M95.8,56.2a28,28,0,1,1-39.6,0A28,28,0,0,1,95.8,56.2Zm104,104a28,28,0,1,0,0,39.6A28,28,0,0,0,199.8,160.2Z" opacity="0.2"></path><path d="M205.66,61.64l-144,144a8,8,0,0,1-11.32-11.32l144-144a8,8,0,0,1,11.32,11.31ZM50.54,101.44a36,36,0,0,1,50.92-50.91h0a36,36,0,0,1-50.92,50.91ZM56,76A20,20,0,1,0,90.14,61.84h0A20,20,0,0,0,56,76ZM216,180a36,36,0,1,1-10.54-25.46h0A35.76,35.76,0,0,1,216,180Zm-16,0a20,20,0,1,0-5.86,14.14A19.87,19.87,0,0,0,200,180Z"></path></svg>' />
            </div>

            {{-- Projects checkout fee (fixed) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Projects checkout fee (fixed)"
                    placeholder="0.00"
                    model="projects_checkout_fee_fixed"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M160,128a32,32,0,1,1-32-32A32,32,0,0,1,160,128Zm40-64a48.85,48.85,0,0,0,40,40V64Zm0,128h40V152A48.85,48.85,0,0,0,200,192ZM16,152v40H56A48.85,48.85,0,0,0,16,152Zm0-48A48.85,48.85,0,0,0,56,64H16Z" opacity="0.2"></path><path d="M128,88a40,40,0,1,0,40,40A40,40,0,0,0,128,88Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,152ZM240,56H16a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H240a8,8,0,0,0,8-8V64A8,8,0,0,0,240,56ZM24,72H45.37A40.81,40.81,0,0,1,24,93.37Zm0,112V162.63A40.81,40.81,0,0,1,45.37,184Zm208,0H210.63A40.81,40.81,0,0,1,232,162.63Zm0-38.35A56.78,56.78,0,0,0,193.65,184H62.35A56.78,56.78,0,0,0,24,145.65v-35.3A56.78,56.78,0,0,0,62.35,72h131.3A56.78,56.78,0,0,0,232,110.35Zm0-52.28A40.81,40.81,0,0,1,210.63,72H232Z"></path></svg>' />
            </div>

            {{-- Bids checkout fee (percentage) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Bids checkout fee (percentage)"
                    placeholder="0.00"
                    model="bids_checkout_fee_percentage"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M95.8,56.2a28,28,0,1,1-39.6,0A28,28,0,0,1,95.8,56.2Zm104,104a28,28,0,1,0,0,39.6A28,28,0,0,0,199.8,160.2Z" opacity="0.2"></path><path d="M205.66,61.64l-144,144a8,8,0,0,1-11.32-11.32l144-144a8,8,0,0,1,11.32,11.31ZM50.54,101.44a36,36,0,0,1,50.92-50.91h0a36,36,0,0,1-50.92,50.91ZM56,76A20,20,0,1,0,90.14,61.84h0A20,20,0,0,0,56,76ZM216,180a36,36,0,1,1-10.54-25.46h0A35.76,35.76,0,0,1,216,180Zm-16,0a20,20,0,1,0-5.86,14.14A19.87,19.87,0,0,0,200,180Z"></path></svg>' />
            </div>

            {{-- Bids checkout fee (fixed) --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input
                    label="Bids checkout fee (fixed)"
                    placeholder="0.00"
                    model="bids_checkout_fee_fixed"
                    svg_icon='<svg class="w-5 h-5 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M160,128a32,32,0,1,1-32-32A32,32,0,0,1,160,128Zm40-64a48.85,48.85,0,0,0,40,40V64Zm0,128h40V152A48.85,48.85,0,0,0,200,192ZM16,152v40H56A48.85,48.85,0,0,0,16,152Zm0-48A48.85,48.85,0,0,0,56,64H16Z" opacity="0.2"></path><path d="M128,88a40,40,0,1,0,40,40A40,40,0,0,0,128,88Zm0,64a24,24,0,1,1,24-24A24,24,0,0,1,128,152ZM240,56H16a8,8,0,0,0-8,8V192a8,8,0,0,0,8,8H240a8,8,0,0,0,8-8V64A8,8,0,0,0,240,56ZM24,72H45.37A40.81,40.81,0,0,1,24,93.37Zm0,112V162.63A40.81,40.81,0,0,1,45.37,184Zm208,0H210.63A40.81,40.81,0,0,1,232,162.63Zm0-38.35A56.78,56.78,0,0,0,193.65,184H62.35A56.78,56.78,0,0,0,24,145.65v-35.3A56.78,56.78,0,0,0,62.35,72h131.3A56.78,56.78,0,0,0,232,110.35Zm0-52.28A40.81,40.81,0,0,1,210.63,72H232Z"></path></svg>' />
            </div>

            {{-- Divider --}}
            <div class="col-span-12">
                <div class="-mx-10 my-10 flex items-center gap-4 before:h-px before:flex-1 before:bg-gray-100 text-sm text-gray-500 font-semibold before:content-[''] after:h-px after:flex-1 after:bg-gray-100 after:content-['']">
                    API settings
                </div>
            </div>

            {{-- Merchant id --}}
            <div class="col-span-12">
                <x-forms.text-input
                    label="Merchant id"
                    placeholder="Enter your merchant id"
                    model="merchant_id" />
            </div>

            {{-- Merchant key --}}
            <div class="col-span-12">
                <x-forms.text-input
                    label="Merchant key"
                    placeholder="Enter your merchant key"
                    model="merchant_key" />
            </div>

            {{-- Merchant salt --}}
            <div class="col-span-12">
                <x-forms.text-input
                    label="Merchant salt"
                    placeholder="Enter your merchant salt"
                    model="merchant_salt" />
            </div>

            {{-- Environment --}}
            <div class="col-span-12">
                <div class="w-full" wire:ignore>
                    <x-forms.select2
                        :label="__('messages.t_environment')"
                        :placeholder="__('messages.t_choose_environment')"
                        model="env"
                        :options="[
                            ['text' => 'Sandbox', 'value' => 'sandbox'],
                            ['text' => 'Production', 'value' => 'production'],
                        ]"
                        :isDefer="true"
                        :isAssociative="false"
                        :componentId="$this->id"
                        value="value"
                        text="text" />
                </div>
            </div>

            {{-- Submit button --}}
            <div class="col-span-12 mt-10 -mb-6">
                <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="true"  />
            </div>

        </div>
    </div>

</div>