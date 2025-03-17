<template>
    <div class="w-full" v-show="is_loaded">

        <!-- Project details -->
        <div class="w-full relative">

            <!-- Loading -->
            <template v-if="loading.skills">
                <div class="absolute w-full h-full flex items-center justify-center bg-black bg-opacity-50 z-50 rounded-md">
                    <div class="lds-ripple"><div></div><div></div></div>
                </div>
            </template>

            <!-- Form -->
            <div class="mt-4 mb-8">

                <!-- Form -->
                <div class="grid grid-cols-12 gap-y-8 gap-x-5" id="section-main-details">

                    <!-- Title -->
                    <div class="col-span-12">

                        <!-- Form container -->
                        <div class="relative rounded-md shadow-sm">

                            <!-- Input -->
                            <input type="text" v-model="v$.form.title.$model" :class="hasError('title') || v$.form.title.$errors.length ? 'focus:!ring-red-600 focus:!border-red-600 border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 border-gray-300'" class="focus:!ring-1 block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] text-sm font-medium text-zinc-800 rounded-md dark:bg-zinc-700/40 dark:border-zinc-700 dark:text-zinc-300 dark:placeholder-zinc-400" :placeholder="__('t_project_title')" maxlength="100">

                            <!-- Icon -->
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-4 rtl:pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M3 19h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path><path d="M12.5 5.5l4 4"></path><path d="M4.5 13.5l4 4"></path><path d="M21 15v4h-8l4 -4z"></path></svg>
                            </div>

                        </div>

                        <!-- Error -->
                        <template v-if="hasError('title')">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1" v-text="getError('title')"></p>
                        </template>

                        <!-- Errors -->
                        <div class="w-full block" v-for="(error, index) of v$.form.title.$errors" :key="index">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">{{ error.$message }}</p>
                        </div>

                    </div>

                    <!-- Description -->
                    <div class="col-span-12">

                        <!-- Form container -->
                        <div class="relative rounded-md shadow-sm">

                            <!-- Input -->
                            <textarea v-model="v$.form.description.$model" rows="12" :class="hasError('description') || v$.form.description.$errors.length ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300'" class="block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:pr-4 py-3.5 placeholder:font-normal placeholder:text-[13px] text-sm font-medium text-zinc-800 rounded-md resize-none scrollbar-thin scrollbar-thumb-gray-300 scrollbar-track-gray-100 dark:scrollbar-thumb-zinc-900 dark:scrollbar-track-zinc-600 dark:bg-zinc-700/40 dark:border-zinc-700 dark:text-zinc-300 dark:placeholder-zinc-400" :placeholder="__('t_project_description')"></textarea>

                            <!-- Icon -->
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-4 rtl:pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M6 15h15"></path><path d="M21 19h-15"></path><path d="M15 11h6"></path><path d="M21 7h-6"></path><path d="M9 9h1a1 1 0 1 1 -1 1v-2.5a2 2 0 0 1 2 -2"></path><path d="M3 9h1a1 1 0 1 1 -1 1v-2.5a2 2 0 0 1 2 -2"></path></svg>
                            </div>

                        </div>

                        <!-- Hint -->
                        <p class="mt-1.5 text-[13px] tracking-wide text-gray-400 font-normal ltr:pl-1 rtl:pr-1" v-text="__('t_post_project_description_hint')"></p>

                        <!-- Error -->
                        <template v-if="hasError('description')">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1" v-text="getError('description')"></p>
                        </template>

                        <!-- Errors -->
                        <div class="w-full block" v-for="(error, index) of v$.form.description.$errors" :key="index">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">{{ error.$message }}</p>
                        </div>

                    </div>

                    <!-- Category -->
                    <div class="col-span-12 select2-form-wrapper">

                        <!-- Select -->
                        <div class="w-full rounded-md shadow-sm">
                            <select v-model="form.category" id="select2-categories">
                                <templatqe v-for="(c, index) in JSON.parse(categories)" :key="`categories-${index}`">
                                    <option :value="c['id']" v-text="c['name']"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Hint -->
                        <p class="mt-1.5 text-[13px] tracking-wide text-gray-400 font-normal ltr:pl-1 rtl:pr-1" v-text="__('t_post_project_category_hint')"></p>

                        <!-- Error -->
                        <template v-if="hasError('category')">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1" v-text="getError('category')"></p>
                        </template>

                    </div>

                    <!-- Skills -->
                    <div class="col-span-12 select2-form-wrapper">

                        <!-- Select -->
                        <div class="w-full rounded-md shadow-sm">
                            <select v-model="form.skills" id="select2-skills">
                                <template v-for="(c, index) in skills" :key="`skills-${index}`">
                                    <option :value="c['id']" v-text="c['name']"></option>
                                </template>
                            </select>
                        </div>

                        <!-- Hint -->
                        <p class="mt-1.5 text-[13px] tracking-wide text-gray-400 font-normal ltr:pl-1 rtl:pr-1" v-text="__('t_post_project_skills_hint')"></p>

                        <!-- Error -->
                        <template v-if="hasError('skills')">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1" v-text="getError('skills')"></p>
                        </template>

                    </div>

                </div>

            </div>

            <!-- Badget section -->
            <div class="mt-4 mb-8">
                <div class="grid grid-cols-12 gap-y-8 gap-x-5">

                    <!-- How do you want to pay -->
                    <div class="col-span-12" id="section-budget"> 
                        <div class="relative w-full rounded-lg h-12 bg-slate-200 dark:bg-zinc-700">

                            <div class="relative w-full h-full flex items-center px-2">

                                <!-- Fixed price -->
                                <div @click="form.salary_type = 'fixed'" class="w-full h-full flex justify-center text-slate-600 dark:text-zinc-300 cursor-pointer text-[13px] font-medium tracking-wide">
                                    <button class="w-full h-full focus:outline-none" v-text="__('t_fixed_price')"></button>
                                </div>

                                <!-- Hourly price -->
                                <div @click="form.salary_type = 'hourly'" class="w-full h-full flex justify-center text-slate-600 dark:text-zinc-300 cursor-pointer text-[13px] font-medium tracking-wide">
                                    <button class="w-full h-full focus:outline-none" v-text="__('t_hourly_price')"></button>
                                </div>

                            </div>
                
                            <span :class="{ 'ltr:left-1/2 rtl:right-1/2 ltr:-ml-1 rtl:-mr-1': form.salary_type === 'hourly', 'ltr:left-1 rtl:right-1':form.salary_type === 'fixed' }"
                                v-text="form.salary_type === 'fixed' ? __('t_fixed_price') : __('t_hourly_price')"
                            class="bg-white shadow text-[13px] font-semibold flex items-center justify-center w-1/2 rounded transition-all duration-150 ease-linear absolute h-10 top-1 text-gray-600 pt-px dark:bg-zinc-900 dark:text-zinc-200"></span>

                        </div>
                    </div>

                    <!-- Min price -->
                    <div class="col-span-12 md:col-span-6">

                        <!-- Form -->
                        <div class="relative rounded-md shadow-sm flex">

                            <!-- Label -->
                            <span class="inline-flex items-center px-3 ltr:rounded-l-md rtl:rounded-r-md border ltr:border-r-0 rtl:border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm dark:bg-zinc-700 dark:border-zinc-700 dark:text-zinc-400" v-text="__('t_min')"></span>

                            <!-- Input -->
                            <input type="text" v-model="v$.form.price_min.$model" :class="hasError('price_min') || v$.form.price_min.$errors.length ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300'" class="block w-full ltr:pl-4 ltr:pr-12 rtl:pr-4 rtl:pl-12 py-3.5 placeholder:font-normal text-sm font-medium text-zinc-800 flex-1 min-w-0 rounded-none ltr:rounded-r-md rtl:rounded-l-md dark:bg-zinc-700/40 dark:border-zinc-700 dark:text-zinc-300 dark:placeholder-zinc-400" :placeholder="__('t_price_placeholder_0_00')">

                            <!-- Currency symbol -->
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm dark:text-zinc-300" v-text="currency_symbol"></span>
                            </div>

                        </div>

                        <!-- Error -->
                        <template v-if="hasError('price_min')">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1" v-text="getError('price_min')"></p>
                        </template>

                        <!-- Errors -->
                        <div class="w-full block" v-for="(error, index) of v$.form.price_min.$errors" :key="index">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">{{ error.$message }}</p>
                        </div>
                        
                    </div>

                    <!-- Max price -->
                    <div class="col-span-12 md:col-span-6">

                        <!-- Form -->
                        <div class="relative rounded-md shadow-sm flex">

                            <!-- Label -->
                            <span class="inline-flex items-center px-3 ltr:rounded-l-md rtl:rounded-r-md border ltr:border-r-0 rtl:border-l-0 border-gray-300 bg-gray-50 text-gray-500 text-sm dark:bg-zinc-700 dark:border-zinc-700 dark:text-zinc-400" v-text="__('t_max')"></span>

                            <!-- Input -->
                            <input type="text" v-model="v$.form.price_max.$model" :class="hasError('price_max') || v$.form.price_max.$errors.length ? 'focus:ring-red-600 focus:border-red-600 border-red-500' : 'focus:ring-primary-600 focus:border-primary-600 border-gray-300'" class="block w-full ltr:pl-4 ltr:pr-12 rtl:pr-4 rtl:pl-12 py-3.5 placeholder:font-normal text-sm font-medium text-zinc-800 flex-1 min-w-0 rounded-none ltr:rounded-r-md rtl:rounded-l-md dark:bg-zinc-700/40 dark:border-zinc-700 dark:text-zinc-300 dark:placeholder-zinc-400" :placeholder="__('t_price_placeholder_0_00')">

                            <!-- Currency symbol -->
                            <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm dark:text-zinc-300" v-text="currency_symbol"></span>
                            </div>

                        </div>

                        <!-- Error -->
                        <template v-if="hasError('price_max')">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1" v-text="getError('price_max')"></p>
                        </template>

                        <!-- Errors -->
                        <div class="w-full block" v-for="(error, index) of v$.form.price_max.$errors" :key="index">
                            <p class="mt-1.5 text-[13px] tracking-wide text-red-600 font-medium ltr:pl-1 rtl:pr-1">{{ error.$message }}</p>
                        </div>
                        
                    </div>

                </div>
            </div>

            <!-- Promotion section -->
            <div class="mt-20 mb-8" id="section-premium" v-if="settings.is_premium">

                <!-- Section heading -->
                <div class="w-full mb-10">
                    <h3 class="mt-2 text-base font-semibold tracking-wide text-gray-800 dark:text-white" v-text="__('t_promotion')"></h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-zinc-400" v-text="__('t_make_ur_project_premium')"></p>
                </div>

                <!-- Plans -->
                <div class="grid grid-cols-1 md:gap-x-5 gap-y-6">
                    <template v-for="(plan, index) in JSON.parse(plans)" :key="`plan-${ index }`">

                        <div :class="hasPlan(plan.id) ? 'border-primary-600 ring-1 ring-primary-600' : ''" class="mb-2 rounded-lg px-4 py-4 border shadow-sm bg-white dark:bg-zinc-800 dark:border-transparent">
                            <div class="card-body">
                                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                                    <div class="flex items-center gap-3">
                                        <div>

                                            <!-- Badge details -->
                                            <div class="flex items-center mb-3 space-x-3 rtl:space-x-reverse">

                                                <!-- Badge -->
                                                <span class="inline-flex items-center text-xs uppercase tracking-wider font-semibold px-3 py-1 rounded-full" :style="`color: ${ plan.text_color };background-color: ${ plan.bg_color }`">
                                                    <span v-text="plan.title"></span>
                                                </span>

                                                <!-- Price -->
                                                <div class="text-sm font-extrabold text-zinc-800 dark:text-white" v-text="$money(plan.price, currency)"></div>

                                                <!-- Days -->
                                                <div class="text-xs font-normal text-gray-400" v-if="plan.days" v-text="`/${ plan.days } ${ __('t_days') }`"></div>
                                            
                                            </div>
                                            
                                            <!-- Description -->
                                            <div class="text-[13px] font-normal leading-6 text-gray-500 dark:text-zinc-300 tracking-wide" v-text="plan.description"></div>

                                        </div>
                                    </div>
                                    <div class="flex">

                                        <!-- Select plan -->
                                        <button class="flex items-center border h-9 text-xs font-medium px-4 rounded-sm whitespace-nowrap" 
                                        :class="hasPlan(plan.id) ? 'bg-primary-600 text-white border-primary-600' : 'bg-white hover:bg-gray-50 text-gray-600 active:bg-gray-100 border-gray-300 dark:bg-zinc-700 dark:border-transparent dark:text-zinc-200 dark:hover:bg-zinc-600'" 
                                        v-on:click="addPlan(plan.id)">
                                            <span v-text="hasPlan(plan.id) ? __('t_selected') : __('t_select')"></span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </template>
                </div>

            </div>

            <!-- Total -->
            <div class="flex items-center space-x-3 rtl:space-x-reverse bg-gray-100 hover:bg-gray-200 hover:bg-opacity-50 p-4 rounded-xl mb-8 dark:bg-transparent dark:border dark:border-zinc-700/40" v-if="settings.is_premium">
                <div class="grow">
                    <p class="text-sm text-gray-600 dark:text-zinc-400 font-medium" v-text="__('t_total')"></p>
                </div>
                <div class="flex-none ltr:text-right rtl:text-left text-zinc-900 font-black text-base dark:text-white" v-text="$money(total, currency)"></div>
            </div>

            <!-- reCaptcha -->
            <div class="mb-8" v-if="Number(is_recaptcha)">
                <vue-recaptcha   @verify="verifyRecaptcha" :sitekey="recaptcha_site_key"></vue-recaptcha>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                <div></div>

                <!-- Update project -->
                <button
                    v-on:click="update"
                    :disabled="loading.button_update"
                    :class="loading.button_update ? 'cursor-not-allowed bg-opacity-50' : ''"
                    class="w-full bg-primary-600 enabled:hover:bg-primary-700 text-white rounded px-8 py-4">
                    <span class="flex items-center justify-center">

                        <!-- Loading icon -->
                        <template v-if="loading.button_update">
                            <svg stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" class="animate-spin ltr:mr-2 rtl:ml-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg"><path opacity="0.2" fill-rule="evenodd" clip-rule="evenodd" d="M12 19C15.866 19 19 15.866 19 12C19 8.13401 15.866 5 12 5C8.13401 5 5 8.13401 5 12C5 15.866 8.13401 19 12 19ZM12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" fill="currentColor"></path><path d="M2 12C2 6.47715 6.47715 2 12 2V5C8.13401 5 5 8.13401 5 12H2Z" fill="currentColor"></path></svg>
                        </template>

                        <!-- Text -->
                        <span class="text-sm tracking-wide font-medium" v-text="__('t_update_project')"></span>

                    </span>
                </button>

            </div>

        </div>
            
    </div>
</template>

<script>
    import useVuelidate from '@vuelidate/core'
    import { required, maxLength, helpers } from '@vuelidate/validators';
    import { useToast } from "vue-toastification";
    import { VueRecaptcha } from 'vue-recaptcha';

    export default {

        setup () {
            const toast = useToast();
            return { v$: useVuelidate(), toast }
        },

        components: { VueRecaptcha },

        props: ['_project', 'translations', 'categories', 'currency_symbol', 'plans', '_settings', 'is_recaptcha', 'recaptcha_site_key'],

        data() {
            return {
                form: {
                    title          : null,
                    description    : null,
                    category       : null,
                    salary_type    : 'fixed',
                    price_min      : null,
                    price_max      : null,
                    skills         : [],
                    plans          : [],
                    recaptcha_token: null
                },
                total   : 0,
                currency: __var_currency_code,
                loading : {
                    skills       : false,
                    button_update: false,
                },
                skills   : [],
                errors   : [],
                is_loaded: false
            }
        },

        watch: {
            'form.plans': {
                handler(newValue, oldValue) {

                    // Set total price
                    var total   = 0;

                    // Get plans
                    const plans = JSON.parse(this.plans);

                    // Loop through selected plans
                    for (let index = 0; index < this.form.plans.length; index++) {

                        // Get plan
                        const plan = this.form.plans[index];

                        // Get plan price
                        const price = plans.find(x => x.id === plan).price;

                        // Add price
                        total = total + Number(price)

                    }
                    
                    // Set total price
                    this.total = total;

                },
                deep: true
            }
        },

        validations() {
            return {
                form: {
                    title: {
                        required : helpers.withMessage(this.__('t_validator_required') , required),
                        maxLength: helpers.withMessage(this.__('t_validator_required_title') , maxLength(100))
                    },
                    description: {
                        required : helpers.withMessage(this.__('t_validator_required') , required)
                    },
                    price_min: {
                        required : helpers.withMessage(this.__('t_validator_required') , required)
                    },
                    price_max: {
                        required : helpers.withMessage(this.__('t_validator_required') , required)
                    }
                },
            }
        },

        computed: {

            // Get settings
            settings() {
                return JSON.parse(this._settings);
            },

            // Set project
            project() {
                return JSON.parse(this._project);
            }

        },

        methods: {

            // Translation
            __(key) {

                // Decode translations
                const trans = JSON.parse(this.translations);

                // Return translation value
                return trans[key];

            },

            // Check if has error
            hasError(key) {
                if (this.errors && this.errors[key] && this.errors[key][0]) {
                    return true;
                }
                return false;
            },

            // Get error
            getError(key) {
                return this.errors[key][0];
            },

            // Check if has a plan
            hasPlan(id) {
                if (this.form.plans.includes(id)) {
                    return true;
                }
                return false;
            },  

            // Add a plan
            addPlan(id) {

                // Check if already has this plan
                if (this.hasPlan(id)) {
                    
                    // Delete this plan
                    this.deletePlan(id);

                } else {

                    // Add plan
                    this.form.plans.push(id);

                }

            },

            // Delete a plan
            deletePlan(id) {
                this.form.plans.splice(this.form.plans.indexOf(id), 1);
            }, 

            // Verify recaptcha
            verifyRecaptcha(token) {
                // Set token
                this.form.recaptcha_token =  token;
            },

            // Validate form before submitting
            async validate() {

                // Validate form
                await this.v$.$validate();

                // Check if validation failed
                if (this.v$.form.title.$errors.length || this.v$.form.description.$errors.length || !this.form.category || !this.form.skills.length) {
                    
                    // Error
                    return {
                        status : 'failed',
                        message: this.__('t_toast_something_went_wrong'),
                        id     : '#section-main-details'
                    }

                }

                // Check if validation failed
                if (this.v$.form.price_min.$errors.length || this.v$.form.price_max.$errors.length) {
                    
                    // Error
                    return {
                        status : 'failed',
                        message: this.__('t_toast_something_went_wrong'),
                        id     : '#section-budget'
                    }

                }

                // Set regex 
                const price_regex = /^([1-9][0-9]*|0)(\.[0-9]{1,2})?$/;

                // Check price format
                if (!price_regex.test(this.form.price_min) || !price_regex.test(this.form.price_max)) {
                    
                    // Error
                    return {
                        status : 'failed',
                        message: this.__('t_invalid_price_format'),
                        id     : '#section-budget'
                    }

                }

                // Check plans
                if (!this.settings.is_free && this.form.plans.length === 0) {
                    
                    // Error
                    return {
                        status : 'failed',
                        message: this.__('t_toast_select_plan_to_post_project'),
                        id     : '#section-premium'
                    }

                }

                // Min price must be less than max
                if (Number(this.form.price_min) >= Number(this.form.price_max)) {
                    
                    // Error
                    return {
                        status : 'failed',
                        message: this.__('t_max_project_price_must_be_greater'),
                        id     : '#section-budget'
                    }

                }

                // Success
                return {
                    status: 'success'
                }

            },

            // Update project
            async update() {

                var _this = this;

                // Disabel button
                _this.loading.button_update = true;

                // Validate form
                const is_valid = await _this.validate();

                // Check if validation succeeded
                if (is_valid.status === 'success') {
                    
                    // Verify reCaptcha
                    if (Number(_this.is_recaptcha) && !_this.form.recaptcha_token) {
                        
                        // Error
                        _this.toast.error(_this.__('t_recaptcha_error_message'), { timeout: 5000 });

                        // Enable button
                        _this.loading.button_update = false;

                        // Return 
                        return;

                    }

                    // Set data
                    const data = {
                        title          : _this.form.title,
                        description    : _this.form.description,
                        category       : _this.form.category,
                        skills         : _this.form.skills,
                        plans          : _this.form.plans,
                        salary_type    : _this.form.salary_type,
                        price_min      : _this.form.price_min,
                        price_max      : _this.form.price_max,
                        recaptcha_token: _this.form.recaptcha_token
                    };

                    // Send request
                    await axios.post('account/projects/edit/' + this.project.uid, data)
                                .then(function (response) {

                                    // Get response data
                                    const r      = response.data;

                                    // Reset errors
                                    _this.errors = [];

                                    // Reset form
                                    _this.reset();

                                    // Success message
                                    _this.toast.success(_this.__('t_toast_operation_success'), { timeout: 5000 });

                                    // Check if redirects to payment
                                    if (r.redirect) {
                                    
                                        // Let's go to redirect url
                                        window.location.href = r.redirect;

                                        return;

                                    }

                                    // Success creation
                                    if (Number(response.status) === 204) {
                                        
                                        // My projects
                                        window.location.href = __var_app_url + "/account/projects";

                                        return;

                                    }

                                })
                                .catch(function(error) {

                                    // Check response code
                                    if (error.response && error.response.status === 422) {
                                        
                                        // Set errors
                                        _this.errors = error.response.data.errors;

                                        // Show error
                                        _this.toast.error(_this.__('t_toast_something_went_wrong'), { timeout: 5000 });
                                        
                                    } else if (error.response && error.response.data && error.response.data.message) {
                                        
                                        // Error
                                        _this.toast.error(error.response.data.message, { timeout: 5000 });

                                    } else {

                                        // Something went wrong
                                        _this.toast.error(_this.__('t_toast_something_went_wrong'), { timeout: 5000 });

                                    }
                                    
                                })
                                .finally(() => {

                                    // Enable button
                                    _this.loading.button_update = false;

                                });

                } else if (is_valid.status === 'failed') {
                    
                    // Error
                    _this.toast.error(is_valid.message, { timeout: 5000 });

                    // Enable button
                    _this.loading.button_update = false;

                    // Scroll top
                    _this.scrollUp(is_valid.id);

                    // Return 
                    return;

                } else {

                    // Something went wrong
                    _this.toast.error(_this.__('t_toast_something_went_wrong'), { timeout: 5000 });

                    // Enable button
                    _this.loading.button_update = false;
                    
                }

            },

            // Fetch skills
            async fetchSkills(id = null) {
                
                // Set variable for this keyword
                const _this = this;

                // Start loading
                _this.loading.skills = true;

                // Set form data
                const data = {
                    category      : id ? id : _this.form.category
                };

                // Send request
                await axios.post('post/project/skills', data)
                            .then(function(response) {
                                
                                // Set skills
                                _this.skills = response.data;

                            })
                            .catch(function(error) {

                                // Check response code
                                if (error.response && error.response.status === 422) {
                                    
                                    // Set errors
                                    _this.errors = error.response.data.errors;

                                }
                                
                            })
                            .finally(() => {
                                _this.loading.skills = false;
                            });

            },

            // Scroll up
            scrollUp(id = null) {
                if (id) {
                    document.querySelector(id).scrollIntoView({ behavior: 'smooth', block: 'end'});
                } else {
                    window.scrollTo({top: 0, behavior: 'smooth'});
                }
            },

            // Initialize select2
            select2() {

                // Access
                const _this            = this;
                
                // Set empty arrays
                var skills_data        = [];
                var skills_values      = [];

                // Get preselected skills
                let preselected_skills = _this.project.skills;

                // Loop through skills
                for (let index = 0; index < _this.skills.length; index++) {

                    // Check if skill exists
                    if (_this.skills[index].id) {
                    
                        // Get skill
                        const skill_value = _this.skills[index];

                        // Push it
                        skills_data.push({
                            id  : skill_value.id,
                            text: skill_value.name
                        });

                    }
                    
                }

                // Loop through selected skills
                if (_this.project.skills) {

                    for (let j = 0; j < _this.project.skills.length; j++) {

                        // Push it
                        skills_values.push(_this.project.skills[j].skill_id);
                        
                    }

                }

                // Enable select2 for categories
                $('#select2-categories').select2({
                    minimumResultsForSearch: -1,
                    dropdownCssClass       : 'select2-form-wrapper-dropdown shadow-lg !rounded-md !border-none mt-1',
                    placeholder            : _this.__('t_choose_category'),
                    selectionCssClass      : `block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:pr-4 placeholder:font-normal placeholder:text-[13px] text-sm font-medium text-zinc-800 !rounded-md dark:!bg-zinc-700/40 dark:!border-zinc-700 ${ _this.hasError('category') ? 'focus:!ring-red-600 focus:!border-red-600 !border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 !border-gray-300' }`,
                    width                  : '100%',
                    language               : __var_app_locale,
                    dir                    : __var_rtl ? 'rtl' : 'ltr',
                    language               : {
                        noResults: function(){
                            return _this.__('t_no_results_found');
                        }
                    }
                });

                // Get skills element
                var select2_skills = $('#select2-skills');

                // Enable select2 for skills
                select2_skills.select2({
                    minimumResultsForSearch: -1,
                    dropdownCssClass       : 'select2-form-wrapper-dropdown shadow-lg !rounded-md !border-none mt-1',
                    placeholder            : _this.__('t_what_skills_are_required'),
                    selectionCssClass      : `select2-skills block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 placeholder:font-normal placeholder:text-[13px] text-sm font-medium text-zinc-800 !rounded-md dark:!bg-zinc-700/40 dark:!border-zinc-700 ${ _this.hasError('skills') ? 'focus:!ring-red-600 focus:!border-red-600 !border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 !border-gray-300' }`,
                    width                  : '100%',
                    closeOnSelect          : false,
                    multiple               : true,
                    maximumSelectionLength : _this.settings.max_skills,
                    dir                    : __var_rtl ? 'rtl' : 'ltr',
                    language               : {
                        noResults: function(){
                            return _this.__('t_no_results_found');
                        },
                        maximumSelected: function(n){
                            return _this.__('t_max_allowed_skills_reached');
                        }
                    },
                    data: skills_data,
                });

                // Update values
                select2_skills.val(skills_values);
                select2_skills.trigger("change");

                // Listen when category changes
                $('#select2-categories').on('select2:select', function (e) {
                    
                    // Set category id
                    _this.form.category = Number(e.params.data.id);
                    
                    // Fetch skills now
                    _this.fetchSkills();

                    // Clear old selection
                    $("#select2-skills").val("");
                    _this.form.skills   = [];

                    // Re-render select2
                    $('#select2-skills').select2({
                        minimumResultsForSearch: -1,
                        dropdownCssClass       : 'select2-form-wrapper-dropdown shadow-lg !rounded-md !border-none mt-1',
                        placeholder            : _this.__('t_what_skills_are_required'),
                        selectionCssClass      : `select2-skills block w-full ltr:pr-10 ltr:pl-4 rtl:pl-10 rtl:!pr-4 placeholder:font-normal placeholder:text-[13px] text-sm font-medium text-zinc-800 !rounded-md dark:!bg-zinc-700/40 dark:!border-zinc-700 ${ _this.hasError('skills') ? 'focus:!ring-red-600 focus:!border-red-600 !border-red-500' : 'focus:!ring-primary-600 focus:!border-primary-600 !border-gray-300' }`,
                        width                  : '100%',
                        closeOnSelect          : false,
                        multiple               : true,
                        maximumSelectionLength : _this.settings.max_skills,
                        dir                    : __var_rtl ? 'rtl' : 'ltr',
                        language               : {
                            noResults: function(){
                                return _this.__('t_no_results_found');
                            },
                            maximumSelected: function(n){
                                return _this.__('t_max_allowed_skills_reached');
                            }
                        }
                    });

                });

                // Listen when skills changed
                $('#select2-skills').on('change', function (e) {
                    _this.form.skills = $('#select2-skills').val();
                });
            },

            // Reset form
            reset() {
                this.form.title                 = null;
                this.v$.form.title.$model       = null;
                this.form.description           = null;
                this.v$.form.description.$model = null;
                this.form.category              = null;
                this.form.salary_type           = 'fixed';
                this.form.price_min             = null;
                this.v$.form.price_min.$model   = null;
                this.form.price_max             = null;
                this.v$.form.price_max.$model   = null;
                this.form.skills                = [];
                this.form.plans                 = [];
            }

        },

        // Mounted
        async mounted() {

            // Set selected category
            this.form.category = this.project.category_id;
            
            // Fetch skills
            await this.fetchSkills();

            // Set empty array
            const skills = [];

            // Loop through skills
            for (let index = 0; index < this.project.skills.length; index++) {

                // Get skill
                const skill = this.project.skills[index];

                // Push it
                skills.push(skill.skill_id);
                
            }

            // Fill form
            this.form.title                 = this.project.title;
            this.form.description           = this.project.description;
            this.form.salary_type           = this.project.budget_type;
            this.form.price_min             = this.project.budget_min;
            this.form.price_max             = this.project.budget_max;
            this.form.skills                = skills;

            // Init select2
            this.select2();
            
            // Show page
            this.is_loaded = true;

        }
    };
</script>

<style>
    .application .select2-form-wrapper .select2-container .select2-selection {
        height: 50px;
    }
    .application .select2-form-wrapper .select2-container--default .select2-selection .select2-selection__rendered {
        padding: 0;
        display: flex;
        align-items: center;
        height: 100%;
    }
    .application .select2-form-wrapper .select2-container--default .select2-selection .select2-selection__placeholder {
        font-weight: 400;
        font-size: 13px;
        margin-top: 2px;
    }
    .application .select2-form-wrapper .select2-container--default .select2-selection .select2-selection__arrow {
        height: 100%;
        top: -1px;
        right: 10px;
    }
    .application .select2-form-wrapper-dropdown .select2-results__option {
        font-size: 13px;
        padding: 12px 18px;
        font-weight: 500;
        color: #535353;
    }
    .application .select2-form-wrapper-dropdown .select2-results__option:first-child {
        border-top-right-radius: 0.375rem;
        border-top-left-radius: 0.375rem;
    }
    .application .select2-form-wrapper-dropdown .select2-results__option:last-child {
        border-bottom-right-radius: 0.375rem;
        border-bottom-left-radius: 0.375rem;
    }
    .application .select2-form-wrapper-dropdown .select2-results__option--highlighted.select2-results__option--selectable {
        color: #fff;
        background-color: var(--color-primary)
    }
    .application .select2-form-wrapper .select2-container .select2-search--inline .select2-search__field {
        height: 38px;
        margin-top: 0;
        margin-left: 0;
        line-height: 30px;
        font-family: inherit;
    }
    .application .select2-form-wrapper .select2-container .select2-search--inline .select2-search__field::placeholder {
        font-weight: 400;
        font-size: 13px;
        color: #999;
    }
    .application .select2-selection__rendered .select2-selection__choice {
        color: #626262;
        background-color: #ededed;
        border: unset;
        font-size: 11px;
        font-weight: 600;
        height: 28px;
        line-height: 29px;
        margin-top: 0;
        letter-spacing: .5px;
    }
    .dark .application .select2-selection__rendered .select2-selection__choice {
        color: #cfcfcf;
        background-color: #3b3b3b;
    }
    .application .select2-selection__rendered .select2-selection__choice:first-child {
        margin-left: 0;
    }
    .application .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        background-color: rgb(0 0 0 / 2%);
        border-right: 1px solid #e2e2e2;
        font-size: 14px;
        padding: 0 5px;
    }
    .dark .application .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        background-color: rgb(35 35 35 / 39%);
        border-right: 1px solid #454444;
    }
    .dark .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover, .dark .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:focus {
        color: #fff;
    }
    .application .select2-container--default .select2-selection--multiple {
        padding-bottom: 0;
    }
    .lds-ripple {
        display: inline-block;
        position: relative;
        width: 80px;
        height: 80px;
    }
    .lds-ripple div {
        position: absolute;
        border: 4px solid #fff;
        opacity: 1;
        border-radius: 50%;
        animation: lds-ripple 1s cubic-bezier(0, 0.2, 0.8, 1) infinite;
    }
    .lds-ripple div:nth-child(2) {
        animation-delay: -0.5s;
    }
    @keyframes lds-ripple {
        0% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 0;
        }
        4.9% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 0;
        }
        5% {
            top: 36px;
            left: 36px;
            width: 0;
            height: 0;
            opacity: 1;
        }
        100% {
            top: 0px;
            left: 0px;
            width: 72px;
            height: 72px;
            opacity: 0;
        }
    }
    [dir="rtl"] .application .select2-form-wrapper .select2-container--default .select2-selection .select2-selection__arrow {
        left: 10px;
        right: auto;
    }
    .application .select2-form-wrapper .select2-skills {
        height: auto !important;
        min-height: 50px !important;
    }
    .application .select2-form-wrapper .select2-skills .select2-selection__rendered {
        display: block !important;
        padding-top: 10px !important;
    }
    [dir="rtl"] .application .select2-selection__rendered .select2-selection__choice {
        margin-left:  auto;
        margin-right: 5px;
    }
    [dir="rtl"] .application .select2-selection__rendered .select2-selection__choice:first-child {
        margin-left:  auto;
        margin-right: 0;
    }
    [dir="rtl"] .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__remove {
        border-left: 1px solid #e2e2e2 !important;
    }
    [dir="rtl"] .select2-container--default[dir="rtl"] .select2-selection--multiple .select2-selection__choice__display {
        padding-left: 5px;
        padding-right: 10px;
    }
    .dark .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #d4d4d8;
    }
    .dark .application .select2-form-wrapper-dropdown .select2-results__option {
        color: #ffffff;
    }
</style>