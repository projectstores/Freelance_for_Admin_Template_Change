<div class="w-full">

    
    <?php if (isset($component)) { $__componentOriginal71c6471fa76ce19017edc287b6f4508c = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.forms.loading','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.loading'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal71c6471fa76ce19017edc287b6f4508c)): ?>
<?php $component = $__componentOriginal71c6471fa76ce19017edc287b6f4508c; ?>
<?php unset($__componentOriginal71c6471fa76ce19017edc287b6f4508c); ?>
<?php endif; ?>
    
    
    <div class="max-w-4xl mx-auto mb-10 border-b border-gray-200 pb-4">
        <div class="mx-auto max-w-7xl">
            <div class="lg:flex lg:items-center lg:justify-between">
    
                <div class="min-w-0 flex-1">
    
                    
                    <h2 class="text-lg font-bold leading-7 text-zinc-700 dark:text-gray-50 sm:truncate sm:text-xl sm:tracking-tight">
                        <h2 class="mt-4 text-2xl font-bold text-black dark:text-gray-100"><?php echo e(__('messages.t_add_funds'), false); ?></h2>
                    </h2>
                    
                </div>
    
                
                <div class="mt-5 flex lg:mt-0 lg:ltr::ml-4 lg:rtl:mr-4">
        
                    
					<span class="block">
                        <a href="<?php echo e(url('account/deposit/history'), false); ?>" class="inline-flex items-center bg-primary-600 px-4 py-2 text-[13px] font-semibold text-white shadow-sm hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-zinc-800 dark:focus:ring-zinc-800 whitespace-nowrap">
                            <?php echo app('translator')->get('messages.t_transactions_history'); ?>
                        </a>
                    </span>
        
                </div>
    
            </div>
        </div>
    </div>


    
    <div class="grid grid-cols-1 lg:grid-cols-2 max-w-4xl mx-auto lg:divide-x lg:divide-gray-200 lg:dark:divide-zinc-700 rtl:divide-x-reverse space-y-10 lg:space-y-0" x-data="{ selected_method: '' }">

        
        <fieldset class="lg:ltr:pr-10 lg:rtl:pl-10">

            
            <div class="flex items-center lg:justify-center rtl:space-x-reverse space-x-2 mb-10">
                <svg class="text-primary-600 h-6 w-6 -mt-px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M216,48V208a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V48a8,8,0,0,1,8-8H208A8,8,0,0,1,216,48Z" opacity="0.2"></path><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,176H48V48H208V208ZM140,80v96a8,8,0,0,1-16,0V95l-11.56,7.71a8,8,0,1,1-8.88-13.32l24-16A8,8,0,0,1,140,80Z"></path></svg>
                <span class="text-base font-bold text-black tracking-wide dark:text-zinc-300">
                    <?php echo app('translator')->get('messages.t_choose_ur_prefered_payment_method'); ?>
                </span>
            </div>

            
            <legend class="sr-only"> <?php echo app('translator')->get('messages.t_select_payment_method'); ?> </legend>
            <div class="relative -space-y-px rounded-md bg-white border border-gray-200 divide-y divide-gray-100 shadow-sm dark:bg-zinc-800 dark:border-zinc-700 dark:divide-zinc-700 mb-4">

                <?php $__currentLoopData = $payment_methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <label wire:key="payment-method-<?php echo e($p->uid, false); ?>" class="<?php echo e($loop->first ? 'rounded-tl-md rounded-tr-md' : '', false); ?> <?php echo e($loop->last ? 'rounded-bl-md rounded-br-md' : '', false); ?> relative p-4 flex flex-col cursor-pointer md:ltr:pl-4 md:rtl:pr-4 md:ltr:pr-6 md:rtl:pl-6 md:grid md:grid-cols-2 focus:outline-none" :class="selected_method == '<?php echo e($p->slug, false); ?>' ? 'bg-primary-50 border-primary-200 z-10 dark:bg-zinc-700 dark:border-zinc-700' : 'border-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-600'">

                        
                        <span class="flex items-center text-sm">
                            <input type="radio" x-model="selected_method" wire:model.defer="selected_method" name="selected_method" value="<?php echo e($p->slug, false); ?>" class="h-5 w-5 text-primary-600 border-gray-300 focus:ring-0 focus:outline-none focus:ring-transparent focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-700" />
                            <span class="ltr:ml-3 rtl:mr-3 font-medium whitespace-nowrap text-base" :class="selected_method == '<?php echo e($p->slug, false); ?>' ? 'text-primary-600 dark:text-white' : 'text-black dark:text-zinc-200'">
                                <?php echo e($p->name, false); ?>

                            </span>
                        </span>
                        
                        
                        <?php if($p->logo): ?>
                            <span class="flex items-center">
                                <img class="w-auto h-6 ltr:ml-auto rtl:mr-auto rounded" src="<?php echo e(src($p->logo), false); ?>" alt="<?php echo e($p->name, false); ?>">
                            </span>
                        <?php endif; ?>

                        
                    </label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              
            </div>

            
            <?php
                $offline_method = payment_gateway('offline', false, true);
            ?>
            <?php if($offline_method?->is_active): ?>
                <div class="relative -space-y-px rounded-md bg-white border border-gray-200 divide-y divide-gray-100 shadow-sm dark:bg-zinc-800 dark:border-zinc-700 dark:divide-zinc-700">
                        <label wire:key="payment-method-offline" class="rounded-md relative p-4 flex flex-col cursor-pointer md:ltr:pl-4 md:rtl:pr-4 md:ltr:pr-6 md:rtl:pl-6 md:grid md:grid-cols-2 focus:outline-none" :class="selected_method == 'offline' ? 'bg-primary-50 border-primary-200 z-10 dark:bg-zinc-700 dark:border-zinc-700' : 'border-gray-200 hover:bg-gray-50 dark:hover:bg-zinc-600'">

                            
                            <span class="flex items-center text-sm">
                                <input type="radio" x-model="selected_method" wire:model.defer="selected_method" name="selected_method" value="offline" class="h-5 w-5 text-primary-600 border-gray-300 focus:ring-0 focus:outline-none focus:ring-transparent focus:ring-offset-0 dark:bg-zinc-700 dark:border-zinc-700" />
                                <span class="ltr:ml-3 rtl:mr-3 font-medium whitespace-nowrap text-base" :class="selected_method == 'offline' ? 'text-primary-600 dark:text-white' : 'text-black dark:text-zinc-200'">
                                    <?php echo e($offline_method->name, false); ?>

                                </span>
                            </span>
                            
                            
                            <?php if($offline_method->logo): ?>
                                <span class="flex items-center">
                                    <img class="w-auto h-6 ltr:ml-auto rtl:mr-auto rounded" src="<?php echo e(src($offline_method->logo), false); ?>" alt="<?php echo e($offline_method->name, false); ?>">
                                </span>
                            <?php endif; ?>

                            
                        </label>              
                </div>
            <?php endif; ?>

        </fieldset>

        
        <?php if(!$is_third_step): ?>
            <div class="lg:ltr:pl-10 lg:rtl:pr-10">

                
                <div class="flex items-center lg:justify-center rtl:space-x-reverse space-x-2 mb-10">
                    <svg class="text-primary-600 h-6 w-6 -mt-px" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M216,48V208a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V48a8,8,0,0,1,8-8H208A8,8,0,0,1,216,48Z" opacity="0.2"></path><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,176H48V48H208V208Zm-48-32a8,8,0,0,1-8,8H104a8,8,0,0,1-6.4-12.8l43.17-57.56a16,16,0,1,0-27.86-15,8,8,0,0,1-15.09-5.34,32.43,32.43,0,0,1,4.62-8.59,32,32,0,1,1,51.11,38.52L120,168h32A8,8,0,0,1,160,176Z"></path></svg>
                    <span class="text-base font-bold text-black tracking-wide dark:text-zinc-300">
                        <?php echo app('translator')->get('messages.t_enter_amount_u_like_to_deposit'); ?>
                    </span>
                </div>

                
                <div class="w-full mb-6">
                    <div class="relative w-full">
                        <input wire:model.defer="amount" type="text" id="deposit-amount-input" class="border-2 border-gray-200 text-black text-base rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 px-4 py-2 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0.00" required>
                        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-4 rtl:pl-4 font-light text-[15px] tracking-widest dark:text-gray-300 text-gray-400">
                            <?php if(isset( config('money.' . settings('currency')->code)['symbol'] )): ?>
                                <?php echo e(config('money.' . settings('currency')->code)['symbol'], false); ?>

                            <?php else: ?>
                                <?php echo e(settings('currency')->code, false); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                
                <?php if (isset($component)) { $__componentOriginal039608dc70b2e4c26356f5d84408f584 = $component; } ?>
<?php $component = App\View\Components\Forms\Button::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('forms.button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Forms\Button::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['action' => 'next','text' => ''.e(__('messages.t_next'), false).'','block' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal039608dc70b2e4c26356f5d84408f584)): ?>
<?php $component = $__componentOriginal039608dc70b2e4c26356f5d84408f584; ?>
<?php unset($__componentOriginal039608dc70b2e4c26356f5d84408f584); ?>
<?php endif; ?>

                
                <div class="flex items-center justify-center space-x-2 rtl:space-x-reverse mt-3">
                    <svg class="text-gray-400 w-4 h-4 -mt-px dark:text-zinc-400" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M208,88H48a8,8,0,0,0-8,8V208a8,8,0,0,0,8,8H208a8,8,0,0,0,8-8V96A8,8,0,0,0,208,88Zm-80,72a20,20,0,1,1,20-20A20,20,0,0,1,128,160Z" opacity="0.2"></path><path d="M208,80H176V56a48,48,0,0,0-96,0V80H48A16,16,0,0,0,32,96V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V96A16,16,0,0,0,208,80ZM96,56a32,32,0,0,1,64,0V80H96ZM208,208H48V96H208V208Zm-80-96a28,28,0,0,0-8,54.83V184a8,8,0,0,0,16,0V166.83A28,28,0,0,0,128,112Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,128,152Z"></path></svg>
                    <span class="text-gray-400 dark:text-zinc-300 font-light text-sm"><?php echo app('translator')->get('messages.t_ur_transaction_is_secure'); ?></span>
                </div>

            </div>
        <?php endif; ?>

        
        <?php if($is_third_step): ?>
            <div class="lg:ltr:pl-10 lg:rtl:pr-10">

                
                <div class="flex items-center lg:justify-center rtl:space-x-reverse space-x-2 mb-10">
                    <svg class="text-primary-600 h-6 w-6 -mt-px dark:text-gray-200" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" xmlns="http://www.w3.org/2000/svg"><path d="M216,48V208a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V48a8,8,0,0,1,8-8H208A8,8,0,0,1,216,48Z" opacity="0.2"></path><path d="M208,32H48A16,16,0,0,0,32,48V208a16,16,0,0,0,16,16H208a16,16,0,0,0,16-16V48A16,16,0,0,0,208,32Zm0,176H48V48H208V208Zm-48-60a36,36,0,0,1-61.71,25.19A8,8,0,1,1,109.71,162,20,20,0,1,0,124,128a8,8,0,0,1-6.55-12.59L136.63,88H104a8,8,0,0,1,0-16h48a8,8,0,0,1,6.55,12.59l-21,30A36.07,36.07,0,0,1,160,148Z"></path></svg>
                    <span class="text-base font-bold text-black tracking-wide dark:text-zinc-300">
                        <?php echo app('translator')->get('messages.t_confirm_payment'); ?>
                    </span>
                </div>

                
                <section class="bg-slate-100 p-8 rounded-lg dark:bg-zinc-800 mb-10">

                    <h2 class="font-bold text-black text-sm dark:text-white flex items-center justify-between mb-10">
                        <span class="text-lg"><?php echo app('translator')->get('messages.t_order_summary'); ?></span>
                        <div wire:click="back" class="cursor-pointer font-normal text-slate-500 text-sm hover:text-slate-700">
                            <span class="text-primary-600"><?php echo app('translator')->get('messages.t_go_back'); ?></span>
                        </div>
                    </h2>
          
                    <dl class="mt-6 space-y-2">

                        
                        <?php

                            // Get payment gateway details
                            if ($selected_method === "offline") {
                                $payment_gateway  = payment_gateway($selected_method, false, true);
                            } else {
                                $payment_gateway = payment_gateway($selected_method);
                            }
                            
                            // Get currency
                            $payment_currency = !empty($payment_gateway->currency) ? $payment_gateway->currency : null;

                        ?>

                        
                        <div class="flex items-center justify-between">
                            <dt class="text-base font-medium text-black dark:text-zinc-400"><?php echo app('translator')->get('messages.t_amount'); ?></dt>
                            <dd class="text-base font-medium text-black dark:text-zinc-200">
                                <?php echo money($amount, settings('currency')->code, true); ?>
                            </dd>
                        </div>

                        
                        <?php if( $payment_currency && is_array( config('money.' . $payment_currency) ) && !empty( $payment_gateway->exchange_rate ) && $payment_gateway->exchange_rate != settings('currency')->exchange_rate ): ?>
                            <div class="flex items-center justify-between pt-2">
                                <dt class="text-base text-black dark:text-zinc-400"><?php echo app('translator')->get('messages.t_exchange_rate'); ?></dt>
                                <dd class="dark:text-zinc-200 font-light text-base text-gray-500">
                                    <?php echo money($amount * $payment_gateway->exchange_rate / settings('currency')->exchange_rate, $payment_currency, true); ?>
                                </dd>
                            </div>
                        <?php endif; ?>

                        
                        <?php if($fee_value > 0): ?>
                            <div class="flex items-center justify-between pt-2">
                                <dt class="flex text-base text-black dark:text-zinc-400">
                                    <span><?php echo app('translator')->get('messages.t_fee'); ?></span>
                                </dt>
                                <dd class="text-base font-medium text-red-500">
                                    <?php echo e($fee_text, false); ?>

                                </dd>
                            </div>
                        <?php endif; ?>

                        
                        <div class="flex items-center justify-between pt-2">
                            <dt class="text-base text-black font-medium black dark:text-zinc-300">
                                <?php echo app('translator')->get('messages.t_u_will_get'); ?>
                            </dt>
                            <dd class="text-base font-medium text-black dark:text-zinc-200">
                                <?php echo money($amount - $fee_value, settings('currency')->code, true); ?>
                            </dd>
                        </div>

                    </dl>
                    
                </section>

                
                <?php if($selected_method === 'paypal' && isset($payment_gateway_params['paypal'])): ?>
                    <div class="w-full">
                
                        
                        <div id="paypal-button-container" wire:ignore></div>
                        
                        <script>
                            // Render the PayPal button into #paypal-button-container
                            paypal.Buttons({

                                // Set up the transaction
                                createOrder: function(data, actions) {
                                    return actions.order.create({
                                        purchase_units: [{
                                            invoice_id: "<?php echo e($payment_gateway_params['paypal']['order_id'], false); ?>",
                                            amount    : {
                                                value: "<?php echo e(convertToNumber( number_format( $amount * payment_gateway('paypal')?->exchange_rate / settings('currency')->exchange_rate, 2, '.', '' ) ), false); ?>"
                                            }
                                        }]
                                    });
                                },

                                // Finalize the transaction
                                onApprove: function(data, actions) {
                                    
                                    // Redirecting
                                    location.href = "<?php echo e(url('callback/paypal?order='), false); ?>" + data.orderID;

                                }

                                }).render('#paypal-button-container');
                        </script>

                    </div> 
                <?php endif; ?>

                
                <?php if($selected_method === 'cpay' && isset($payment_gateway_params['cpay'])): ?>
                    <div class="w-full">
                        <form method="post" action="https://www.cpay.com.mk/client/Page/default.aspx?xml_id=/mk-MK/.loginToPay/.simple/">

                            <input id="AmountToPay" name="AmountToPay" value="<?php echo e($payment_gateway_params['cpay']['AmountToPay'], false); ?>" type="hidden" />
                            <input id="PayToMerchant" name="PayToMerchant" value="<?php echo e($payment_gateway_params['cpay']['PayToMerchant'], false); ?>" type="hidden" />
                            <input id="MerchantName" name="MerchantName" value="<?php echo e($payment_gateway_params['cpay']['MerchantName'], false); ?>" type="hidden" />
                            <input id="AmountCurrency" name="AmountCurrency" value="<?php echo e($payment_gateway_params['cpay']['AmountCurrency'], false); ?>" type="hidden" />
                            <input id="Details1" name="Details1" value="<?php echo e($payment_gateway_params['cpay']['Details1'], false); ?>" type="hidden" />
                            <input id="Details2" name="Details2" value="<?php echo e($payment_gateway_params['cpay']['Details2'], false); ?>" type="hidden" />
                            <input id="PaymentOKURL" name="PaymentOKURL" value="<?php echo e($payment_gateway_params['cpay']['PaymentOKURL'], false); ?>" type="hidden" />
                            <input id="PaymentFailURL" name="PaymentFailURL" value="<?php echo e($payment_gateway_params['cpay']['PaymentFailURL'], false); ?>" type="hidden" />
                            <input id="CheckSumHeader" name="CheckSumHeader" value="<?php echo e($payment_gateway_params['cpay']['CheckSumHeader'], false); ?>" type="hidden" />
                            <input id="CheckSum" name="CheckSum" value="<?php echo e($payment_gateway_params['cpay']['CheckSum'], false); ?>" type="hidden" />
                            <input id="FirstName" name="FirstName" value="<?php echo e($payment_gateway_params['cpay']['FirstName'], false); ?>" type="hidden" />
                            <input id="LastName" name="LastName" value="<?php echo e($payment_gateway_params['cpay']['LastName'], false); ?>" type="hidden" />
                            <input id="Address" name="Address" value="<?php echo e($payment_gateway_params['cpay']['Address'], false); ?>" type="hidden" />
                            <input id="City" name="City" value="<?php echo e($payment_gateway_params['cpay']['City'], false); ?>" type="hidden" />
                            <input id="Zip" name="Zip" value="<?php echo e($payment_gateway_params['cpay']['Zip'], false); ?>" type="hidden" />
                            <input id="Telephone" name="Telephone" value="<?php echo e($payment_gateway_params['cpay']['Telephone'], false); ?>" type="hidden" />
                            <input id="Email" name="Email" value="<?php echo e($payment_gateway_params['cpay']['Email'], false); ?>" type="hidden" />
                            <input id="OriginalAmount" name="OriginalAmount" value="<?php echo e($payment_gateway_params['cpay']['OriginalAmount'], false); ?>" type="hidden" />

                            <button type="submit" class="bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full">
                                <?php echo app('translator')->get('messages.t_continue'); ?>
                            </button>

                        </form>
                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'ecpay' && isset($payment_gateway_params['ecpay'])): ?>
                    <div class="w-full">
                        <form method="post" action="<?php echo e($payment_gateway_params['ecpay']['link'], false); ?>">

                            <?php $__currentLoopData = $payment_gateway_params['ecpay']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input id="<?php echo e($key, false); ?>" name="<?php echo e($key, false); ?>" value="<?php echo e($value, false); ?>" type="hidden" />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <button type="submit" class="bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full">
                                <?php echo app('translator')->get('messages.t_continue'); ?>
                            </button>

                        </form>
                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'flutterwave' && isset($payment_gateway_params['flutterwave'])): ?>
                    <div class="w-full">

                        
                        <script>
                            window.makeFlutterwavePayment = function() {
                                FlutterwaveCheckout({
                                    public_key     : "<?php echo e(payment_gateway('flutterwave')?->settings['public_key'], false); ?>",
                                    tx_ref         : "<?php echo e($payment_gateway_params['flutterwave']['order_id'], false); ?>",
                                    amount         : Number("<?php echo e(convertToNumber( number_format( $amount * payment_gateway('flutterwave')?->exchange_rate / settings('currency')->exchange_rate, 2, '.', '' ) ), false); ?>"),
                                    currency       : "<?php echo e(payment_gateway('flutterwave')?->currency, false); ?>",
                                    payment_options: "card, banktransfer, ussd, account, mpesa, mobilemoneyghana, mobilemoneyfranco, mobilemoneyuganda, mobilemoneyrwanda, mobilemoneyzambia, barter, nqr, credit",
                                    redirect_url   : "<?php echo e(url('callback/flutterwave'), false); ?>",
                                    customer       : {
                                        email       : "<?php echo e(auth()->user()->email, false); ?>",
                                        name        : "<?php echo e(auth()->user()->fullname ?? auth()->user()->username, false); ?>",
                                    },
                                    customizations: {
                                        title      : "<?php echo e(__('messages.t_add_funds'), false); ?>",
                                        logo       : "<?php echo e(src(auth()->user()->avatar), false); ?>",
                                    },
                                });
                            }
                        </script>

                        
                        <button @click="window.makeFlutterwavePayment" type="button" id="flutterwave-payment-button" class="bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full">
                            <?php echo app('translator')->get('messages.t_continue'); ?>
                        </button>

                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'jazzcash' && isset($payment_gateway_params['jazzcash'])): ?>
                    <div class="w-full">
                        <form method="post" action="<?php echo e($payment_gateway_params['jazzcash']['link'], false); ?>">

                            <?php $__currentLoopData = $payment_gateway_params['jazzcash']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <input id="<?php echo e($key, false); ?>" name="<?php echo e($key, false); ?>" value="<?php echo e($value, false); ?>" type="hidden" />
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <button type="submit" class="bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full">
                                <?php echo app('translator')->get('messages.t_continue'); ?>
                            </button>

                        </form>
                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'mercadopago' && isset($payment_gateway_params['mercadopago'])): ?>
                    <div class="w-full">

                        
                        <div class="w-full relative">

                            
                            <div class="bg-gray-50 dark:bg-zinc-700 absolute w-full p-6 rounded-xl flex items-center justify-center" id="mercadopago-waiting">
                                <div role="status">
                                    <svg aria-hidden="true" class="mb-1 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-primary-600 mx-auto" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="text-xs font-bold tracking-widest text-gray-500 dark:text-gray-200"><?php echo e(__('messages.t_please_wait_dots'), false); ?></span>
                                </div>
                            </div>

                            
                            <div id="walletBrick_container"></div>

                        </div>

                        
                        <script>
                            const bricksBuilder     = mercadopago.bricks();
                            const renderWalletBrick = async (bricksBuilder) => {
                                const settings = {
                                    initialization: {
                                        preferenceId: "<?php echo e($payment_gateway_params['mercadopago']['preference_id'], false); ?>",
                                    },
                                    callbacks: {
                                        onReady: () => {
                                            $('#mercadopago-waiting').hide();
                                        },
                                        onSubmit: () => {
                                            //
                                        },
                                        onError: (error) => {
                                            console.log(error);
                                        },
                                    },
                                };
                                window.walletBrickController = await bricksBuilder.create(
                                    'wallet',
                                    'walletBrick_container',
                                    settings
                                );
                            };
                            renderWalletBrick(bricksBuilder);
                        </script>

                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'paymob' && isset($payment_gateway_params['paymob'])): ?>
                    <div class="w-full">
                        <iframe src="https://accept.paymobsolutions.com/api/acceptance/iframes/<?php echo e(payment_gateway('paymob')?->settings['iframe_id'], false); ?>?payment_token=<?php echo e($payment_gateway_params['paymob']['token'], false); ?>" width="100%" height="500px"></iframe>
                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'paymob-pk' && isset($payment_gateway_params['paymob-pk'])): ?>
                    <div class="w-full">
                        <iframe src="https://pakistan.paymob.com/api/acceptance/iframes/<?php echo e(payment_gateway('paymob')?->settings['iframe_id'], false); ?>?payment_token=<?php echo e($payment_gateway_params['paymob']['token'], false); ?>" width="100%" height="500px"></iframe>
                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'paystack' && isset($payment_gateway_params['paystack'])): ?>
                    <div class="w-full">

                        
                        <script>
                            window.makePaystackPayment = function(){
                                let handler = PaystackPop.setup({
                                    key     : "<?php echo e(payment_gateway('paystack')?->settings['public_key'], false); ?>",
                                    email   : '<?php echo e(auth()->user()->email, false); ?>',
                                    amount  : Number("<?php echo e(convertToNumber( number_format( $amount * payment_gateway('paystack')?->exchange_rate / settings('currency')->exchange_rate, 2, '.', '' ) ), false); ?>") * 100,
                                    currency: "<?php echo e(payment_gateway('paystack')?->currency, false); ?>",
                                    ref     : "<?php echo e($payment_gateway_params['paystack']['order'], false); ?>",
                                    channels: ['card', 'bank', 'ussd', 'qr', 'mobile_money', 'bank_transfer'],
                                    onClose : function(){},
                                    callback: function(response){
                                        location.href = response.redirecturl;
                                    }
                                });
                                handler.openIframe();
                            }
                        </script>

                        
                        <button @click="window.makePaystackPayment" type="button" id="paystack-payment-button" class="bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full">
                            <?php echo app('translator')->get('messages.t_continue'); ?>
                        </button>

                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'paytr' && isset($payment_gateway_params['paytr'])): ?>
                    <div class="w-full">
                        <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo e($payment_gateway_params['paytr']['token'], false); ?>" id="paytriframe" frameborder="0" scrolling="yes" style="width: 100%;" height="600px"></iframe>
                        <script>iFrameResize({},'#paytriframe');</script>
                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'razorpay' && isset($payment_gateway_params['razorpay'])): ?>
                    <div class="w-full">
                        <script>
                            window.makeRazorpayPayment = function() {

                                // Set options
                                var options = {
                                    "key"        : "<?php echo e(payment_gateway('razorpay')?->settings['key_id'], false); ?>",
                                    "amount"     : "<?php echo e(convertToNumber( number_format( $amount * payment_gateway('razorpay')?->exchange_rate / settings('currency')->exchange_rate, 2, '.', '' ) ) * 100, false); ?>",
                                    "currency"   : "<?php echo e(payment_gateway('razorpay')?->currency, false); ?>",
                                    "order_id"   : "<?php echo e($payment_gateway_params['razorpay']['id'], false); ?>",
                                    "name"       : "<?php echo e(auth()->user()->fullname ?? auth()->user()->username, false); ?>",
                                    "description": "<?php echo e(__('messages.t_add_funds'), false); ?>",
                                    "image"      : "<?php echo e(src(auth()->user()->avatar), false); ?>",
                                    "handler"    : function (response){

                                        // Set main domain link
                                        const app_link = "<?php echo e(url('callback/razorpay?action=D'), false); ?>";

                                        // Redirect
                                        location.href = app_link + "&payment_id=" + response.razorpay_payment_id + "&order_id=" + response.razorpay_order_id + "&signature=" + response.razorpay_signature;

                                    },
                                };

                                // Start payment
                                var rzp1 = new Razorpay(options);

                                // On Failed
                                rzp1.on('payment.failed', function (response){
                                    alert(response.error.description);
                                });

                                // Open modal
                                rzp1.open();

                            }
                        </script>

                        
                        <button @click="window.makeRazorpayPayment" type="button" id="razorpay-payment-button" class="bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full">
                            <?php echo app('translator')->get('messages.t_continue'); ?>
                        </button>
                        
                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'stripe' && isset($payment_gateway_params['stripe'])): ?>
                    <div class="w-full">

                        
                        <form id="stripe-payment-form" wire:ignore>

                            
                            <div id="stripe-payment-element"></div>

                            
                            <div id="address-element"></div>

                            
                            <button id="stripe-payment-button" type="submit" class="mt-8 bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full  disabled:bg-gray-200 dark:disabled:bg-zinc-700 disabled:text-gray-600 dark:disabled:text-zinc-500 disabled:cursor-not-allowed disabled:hover:bg-gray-200 dark:disabled:hover:bg-zinc-700">
                                <?php echo app('translator')->get('messages.t_continue'); ?>
                            </button>
                            
                        </form>

                        
                        <script>

                            // Stripe public key
                            const stripe = Stripe("<?php echo e(payment_gateway('stripe')?->settings['public_key'], false); ?>");

                            // Payment options
                            const options = {
                                clientSecret: "<?php echo e($payment_gateway_params['stripe']['client_secret'], false); ?>",
                                appearance  : {
                                    theme    : 'stripe',
                                    variables: {
                                        colorPrimaryText: '#fff',
                                        colorBackground : "<?php echo e(current_theme() === 'enabled' ? '#333' : '#ffffff', false); ?>",
                                        colorText       : '#30313d',
                                        colorDanger     : '#df1b41',
                                        spacingUnit     : '6px',
                                        borderRadius    : '3px'
                                    }
                                },
                            };

                            const elements = stripe.elements(options);

                            // Create and mount the Payment Element
                            const paymentElement = elements.create('payment');
                            paymentElement.mount('#stripe-payment-element');
                            const addressElement = elements.create('address', { mode: 'shipping' });
                            addressElement.mount('#address-element');

                            const form = document.getElementById('stripe-payment-form');

                            form.addEventListener('submit', async (event) => {
                                event.preventDefault();
                                document.getElementById("stripe-payment-button").disabled = true;
                                await stripe.confirmPayment({
                                    elements,
                                    confirmParams: {
                                        return_url: "<?php echo e(url('callback/stripe?action=D'), false); ?>",
                                    },
                                }).then((response) => {

                                    // Check if error
                                    if (response.error) {
                                        window.$wireui.notify({
                                            title      : "<?php echo e(__('messages.t_error'), false); ?>",
                                            description: response.error.message,
                                            icon       : 'error'
                                        });
                                    }

                                    document.getElementById("stripe-payment-button").disabled = false;

                                }).catch((error) => {
                                    window.$wireui.notify({
                                        title      : "<?php echo e(__('messages.t_error'), false); ?>",
                                        description: error.message,
                                        icon       : 'error'
                                    });

                                    document.getElementById("stripe-payment-button").disabled = false;
                                });
                            });
                        </script>

                    </div>
                <?php endif; ?>

                
                <?php if($selected_method === 'offline' && $offline_method?->is_active): ?>
                    <div class="w-full">

                        
                        <div class="w-full mb-8 text-sm text-gray-500 tracking-wide font-normal">
                            <?php echo $offline_method?->details; ?>

                        </div>

                        
                        <button wire:click="offline" type="button" class="bg-primary-50 border-primary-200 focus:outline-none focus:ring focus:ring-opacity-50 focus:ring-primary-500 font-semibold hover:bg-primary-100/50 inline-flex items-center justify-center leading-5 px-3 py-3.5 rounded text-primary-800 text-sm w-full">
                            <?php echo app('translator')->get('messages.t_i_sent_the_money'); ?>
                        </button>

                    </div>
                <?php endif; ?>

            </div>
        <?php endif; ?>

    </div>
    
</div>

<?php $__env->startPush('styles'); ?>

    
    <?php if( payment_gateway('paypal')?->is_active ): ?>
        <script src="https://www.paypal.com/sdk/js?client-id=<?php echo e(payment_gateway('paypal')?->settings['client_id'], false); ?>&currency=<?php echo e(payment_gateway('paypal')?->currency, false); ?>"></script>
    <?php endif; ?>

    
    <?php if(payment_gateway('mercadopago')?->is_active): ?>
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            var mercadopago = new MercadoPago("<?php echo e(payment_gateway('mercadopago')?->settings['public_key'], false); ?>");
        </script>
    <?php endif; ?>

    
    <?php if(payment_gateway('flutterwave')?->is_active): ?>
        <script src="https://checkout.flutterwave.com/v3.js"></script>
    <?php endif; ?>

    
    <?php if(payment_gateway('razorpay')?->is_active): ?>
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <?php endif; ?>

    
    <?php if(payment_gateway('stripe')?->is_active): ?>
        <script src="https://js.stripe.com/v3/"></script>
    <?php endif; ?>

    
    <?php if(payment_gateway('paystack')?->is_active): ?>
        <script src="https://js.paystack.co/v1/inline.js"></script> 
    <?php endif; ?>

<?php $__env->stopPush(); ?><?php /**PATH /home1/onesend1/public_html/new-freelance.turboconnect.top/resources/views/livewire/main/account/deposit/deposit.blade.php ENDPATH**/ ?>