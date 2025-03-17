<?php

namespace App\Http\Livewire\Main\Checkout;

use DateTime;
use DateTimeZone;
use Xendit\Xendit;
use App\Models\Gig;
use App\Models\Admin;
use App\Models\Order;
use Razorpay\Api\Api;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\OrderItem;
use YouCan\Pay\YouCanPay;
use App\Models\GigUpgrade;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\OrderInvoice;
use GuzzleHttp\Psr7\Request;
use App\Models\CheckoutWebhook;
use App\Models\OrderItemUpgrade;
use Illuminate\Support\Facades\Http;
use App\Models\OfflinePaymentGateway;
use App\Models\AutomaticPaymentGateway;
use App\Utils\Payments\Gateways\EcpayGateway;
use App\Notifications\User\Seller\PendingOrder;
use Paytabscom\Laravel_paytabs\Facades\paypage;
use App\Notifications\Admin\PendingOfflinePayment;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CheckoutComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $cart;
    public $selected_method;
    public $subtotal;
    public $total;
    public $tax;
    public $is_third_step          = false;
    public $fee_value              = 0;
    public $fee_text               = 0;
    public $payment_gateway_params = [];

    protected $listeners = ['cart-updated' => 'cartUpdated'];

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // We have to validate the cart
        // How? For example if user is not logged in, he may be able to add his own gigs to cart and the login to checkout
        // So we need to remove his own gigs from cart after login
        $this->validateCart();

        // Get cart
        $cart = session('cart', []);

        // Check if cart has items
        if (is_array($cart) && count($cart)) {
            
            // Set cart
            $this->cart     = $cart;

            // Calculate subtotal cart amount
            $this->subtotal = $this->subtotal();

            // Calculate tax
            $this->tax      = $this->taxes();

            // Calculate total
            $this->total    = $this->total();

        } else {

            // Cart has no items
            return redirect('cart');

        }

    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_checkout') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.checkout.checkout', [
            'payment_methods' => $this->payment_methods
        ])->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Get enabled payment gateways
     *
     * @return object
     */
    public function getPaymentMethodsProperty()
    {
        return AutomaticPaymentGateway::where('is_active', true)
                                        ->oldest('name')
                                        ->get();
    }


    /**
     * Calculate fee
     *
     * @param object $gateway
     * @return array
     */
    private function fee($gateway)
    {
        try {
            
            // Set amount to deposit
            $amount = convertToNumber($this->subtotal) * $gateway?->exchange_rate / settings('currency')->exchange_rate;

            // Remove long decimal
            $amount = convertToNumber( number_format($amount, 2, '.', '') );

            // Get gigs checkout fixed fee
            if (isset($gateway->fixed_fee['gigs'])) {
                
                // Set fixed fee
                $fee_fixed = convertToNumber($gateway->fixed_fee['gigs']);

            } else {

                // No fixed fee
                $fee_fixed = 0;

            }

            // Get gigs checkout percentage fee
            if (isset($gateway->percentage_fee['gigs'])) {
                
                // Set percentage fee
                $fee_percentage = convertToNumber($gateway->percentage_fee['gigs']);

            } else {

                // No percentage fee
                $fee_percentage = 0;

            }

            // Calculate percentage of this amount 
            $fee_percentage_amount = $this->calculateExchangeRate( $fee_percentage * $amount / 100, $gateway->exchange_rate );

            // Calculate exchange rate of this fixed fee
            $fee_fixed_exchange    = $this->calculateExchangeRate( $fee_fixed,  $gateway->exchange_rate);

            // Set value of the fee
            $fee_value             = 0;

            // Calculate fee value and visible text
            if ($fee_fixed > 0 && $fee_percentage > 0) {
                
                // Calculate fee value
                $fee_value = convertToNumber($fee_percentage_amount) + convertToNumber($fee_fixed_exchange);

                // Set visible fee text
                $fee_txt   = $fee_percentage . "% + " . money( $fee_fixed_exchange, settings('currency')->code, true )->format();

            } else if (!$fee_fixed && $fee_percentage > 0) {
                
                // Calculate fee value
                $fee_value = convertToNumber($fee_percentage_amount);

                // Set visible fee text
                $fee_txt   = $fee_percentage . "%";

            } else if ($fee_fixed > 0 && !$fee_percentage) {

                // Calculate fee value
                $fee_value = convertToNumber($fee_fixed_exchange);

                // Set visible fee text
                $fee_txt   = money( $fee_fixed_exchange, settings('currency')->code, true )->format();
                
            } else if (!$fee_percentage && !$fee_fixed) {
                
                // Calculate fee value
                $fee_value = 0;

                // Set visible fee text
                $fee_txt   = 0;

            }

            // Return values
            return [
                'value' => $fee_value,
                'text'  => $fee_txt
            ];

        } catch (\Throwable $th) {
            
            // Something went wrong
            return [
                'value' => 0,
                'text'  => 0
            ];

        }
    }


    /**
     * Calculate exchange rate
     *
     * @param mixed $amount
     * @param mixed $exchange_rate
     * @param boolean $formatted
     * @param string $currency
     * @return mixed
     */
    private function calculateExchangeRate($amount, $exchange_rate, $formatted = false, $currency = null)
    {
        try {

            // Convert amount to number
            $amount                = convertToNumber($amount);

            // Get currency settings
            $currency_settings     = settings('currency');

            // Get default currency exchange rate
            $default_exchange_rate = convertToNumber($currency_settings->exchange_rate);

            // Get exchanged amount
            $exchanged_amount      = convertToNumber( $amount *  $default_exchange_rate / $exchange_rate );

            // Check if we have to return a formatted value
            if ($formatted) {
                
                return money( $exchanged_amount, $currency, true )->format();

            }

            // Return exchange rate
            return convertToNumber(number_format( $exchanged_amount, 2, '.', '' ));

        } catch (\Throwable $th) {

            // Something went wrong
            return $amount;

        }
    }


    /**
     * Check selected payment method
     *
     * @return void
     */
    public function updatedSelectedMethod($slug)
    {
        try {
            
            // Check if user chose to pay using his wallet
            if ($slug === 'wallet') {
                
                // No fee for wallet payment
                $this->fee_value   = 0;

                // Update total
                $this->total       = $this->total();

                // Get user available credit
                $available_balance = convertToNumber(auth()->user()->balance_available);

                // Check if user has amount in his wallet
                if ($this->total >= $available_balance) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_insufficient_funds_in_your_account'),
                        'icon'        => 'error'
                    ]);

                }

                // Return 
                return;

            }

            // Check if offline method
            if ($slug === "offline") {
                
                // Get payment gateway
                $gateway = payment_gateway($slug, false, true);

            } else {

                // Get payment gateway
                $gateway = payment_gateway($slug);

            }

            // Check if enabled
            if ($gateway?->is_active) {
                
                // Calculate fee
                $fee             = $this->fee($gateway);

                // Set fee value
                $this->fee_value = convertToNumber($fee['value']);

                // Set fee visible text
                $this->fee_text  = $fee['text'];

                // Update total
                $this->total     = $this->total();

            }

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Count total price of an item in cart
     *
     * @param string $id
     * @return integer
     */
    public function itemTotalPrice($id)
    {
        // Set empty var total price
        $total = 0;

        // Loop throug items in cart
        foreach ($this->cart as $key => $item) {
            
            // Check if item exists
            if ($item['id'] === $id) {
                
                // Get quantity
                $quantity = (int) $item['quantity'];

                // Sum upgrades total price
                if (is_array($item['upgrades']) && count($item['upgrades'])) {
                    
                    $total_upgrades_price = array_reduce($item['upgrades'], function($i, $obj)
                    {
                        // Calculate only selected upgrades
                        if ($obj['checked'] == true) {
                            return $i += $obj['price'];
                        } else {
                            return $i;
                        }

                    });

                } else {

                    // No upgrades selected
                    $total_upgrades_price = 0;

                }

                // Set new total
                $total = ($quantity * $item['gig']['price']) + ($total_upgrades_price * $quantity);

            }

        }

        // Return total price
        return $total;

    }


    /**
     * Calculate subtotal price
     *
     * @return integer
     */
    public function subtotal()
    {
        // Set subtotal empty variable
        $subtotal = 0;

        // Loop through items in cart
        foreach ($this->cart as $key => $item) {
            
            // Update subtotal price
            $subtotal += convertToNumber($this->itemTotalPrice($item['id']));

        }

        // Set subtotal amount
        $this->subtotal = $subtotal;

        // Return subtotal price
        return convertToNumber($subtotal);
    }


    /**
     * Calculate taxes
     *
     * @return integer
     */
    public function taxes()
    {
        // Get commission settings
        $settings = settings('commission');

        // Check if taxes enabled
        if ($settings->enable_taxes) {
            
            // Check if type of taxes percentage
            if ($settings->tax_type === 'percentage') {
                
                // Get tax amount
                $tax       = bcmul($this->subtotal(), $settings->tax_value) / 100;

                // Set tax
                $this->tax = convertToNumber($tax);

                // Return tax amount
                return $this->tax;

            } else {
                
                // Fixed price
                $tax       = $settings->tax_value;

                // Set tax
                $this->tax = convertToNumber($tax);

                // Return tax
                return $this->tax;

            }

        } else {

            // Taxes not enabled
            $this->tax = 0;

            return $this->tax;

        }
    }


    /**
     * Calculate total price
     *
     * @return integer
     */
    public function total()
    {
        // Set total empty variable
        $total       = convertToNumber($this->subtotal) + convertToNumber($this->tax) + convertToNumber($this->fee_value);

        // Set total amount
        $this->total = $total;

        // Return total price
        return $total;
    }


    /**
     * Calculate commission
     *
     * @param string $price
     * @return integer
     */
    public function commission($price)
    {
        // Get settings
        $settings = settings('commission');

        // Commission percentage
        if ($settings->commission_type === 'percentage') {
            
            // Calculate commission
            $commission = $settings->commission_value * $price / 100;

        } else {

            // Fixed amount
            $commission = $settings->commission_value;

        }

        // Return commission
        return $commission;
    }


    /**
     * Confirm checkout
     *
     * @return mixed
     */
    public function confirm()
    {
        try {
            
            // Check if user chose to pay using his wallet
            if ($this->selected_method === 'wallet') {

                // Get user available credit
                $available_balance = convertToNumber(auth()->user()->balance_available);

                // Check if user has amount in his wallet
                if ($this->total >= $available_balance) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_insufficient_funds_in_your_account'),
                        'icon'        => 'error'
                    ]);

                } else {

                    // Go to next step
                    return $this->wallet();

                }

                // Return 
                return;

            }

            // Check if offline method
            if ($this->selected_method === 'offline') {
                
                // Get selected payment gateway
                $selected = OfflinePaymentGateway::where('is_active', true)
                                                    ->where('slug', $this->selected_method)
                                                    ->first();

            } else {

                // Get selected payment gateway
                $selected = AutomaticPaymentGateway::where('is_active', true)
                                                    ->where('slug', $this->selected_method)
                                                    ->first();

            }

            // Check if there is a selected payment gateway
            if ($selected) {
                
                // Get amount
                $amount = convertToNumber($this->total) * $selected?->exchange_rate / settings('currency')->exchange_rate;
                $amount = number_format($amount, 2, '.', '');
                $amount = convertToNumber($amount);

                // Check selected payment gateway
                switch ($this->selected_method) {

                    // PayPal
                    case 'paypal':
                        
                        // Generate order id
                        $order_id = "GG" . uid(17);

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $order_id, 'payment_method' => 'paypal']);

                        $this->payment_gateway_params['paypal']['order_id'] = $order_id;

                        // Go to thrid step
                        $this->is_third_step = true;

                    break;

                    // Asaas
                    case 'asaas':
                        
                        // Get key
                        $key     = $selected?->settings['api_key'];
                        
                        // Set api url
                        $link    = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'];

                        // Send request
                        $request = Http::withHeaders([
                                            'access_token' => $key
                                        ])->post("$link/paymentLinks", [
                                            "name"                => auth()->user()->fullname ?? auth()->user()->username,
                                            "description"         => __('messages.t_checkout'),
                                            "endDate"             => now()->addDays(2)->format('Y-d-m'),
                                            "value"               => $amount,
                                            "billingType"         => "UNDEFINED",
                                            "chargeType"          => "DETACHED",
                                            "dueDateLimitDays"    => 10,
                                            "subscriptionCycle"   => null,
                                            "maxInstallmentCount" => 1,
                                            "notificationEnabled" => true,
                                            "callback"            => [
                                                "successUrl"   => url('callback/asaas'),
                                                "autoRedirect" => true
                                            ]
                                        ]);

                        // Get response
                        $response = $request->json();
                        
                        // Check if link generated
                        if ( is_array($response) && isset($response['url']) ) {
                            
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $response['id'], 'payment_method' => 'asaas']);

                            // Go to payment url
                            return redirect($response['url']);

                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // CampPay
                    case 'campay':
                        
                        // Get credentials
                        $campay_username = $selected?->settings['app_username'];
                        $campay_password = $selected?->settings['app_password'];
                        $campay_link     = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'];

                        // Send request
                        $request = Http::post("$campay_link/api/token/", [
                            "username" => $campay_username,
                            "password" => $campay_password
                        ]);

                        // Get response
                        $response = $request->json();

                        // Check if token set
                        if ( is_array($response) && isset($response['token']) ) {
                            
                            // Generate payment id
                            $payment_id      = "GG" . uid(17);

                            // Send a payment request
                            $payment_request = Http::withToken($response['token'], 'Token')->post("$campay_link/api/get_payment_link/", [

                                "amount"               => intval($amount),
                                "currency"             => $selected->currency,
                                "description"          => __('messages.t_checkout'),
                                "external_reference"   => $payment_id,
                                "redirect_url"         => url('callback/campay/success'),
                                "failure_redirect_url" => url('callback/campay/failed')

                            ]);

                            // Get payment response
                            $payment_response = $payment_request->json();

                            // Check if link is set
                            if ( isset($payment_response['link']) ) {
                                
                                // Save webhook details to later response
                                $this->webhook(['payment_id' => $payment_id, 'payment_method' => 'campay']);
    
                                // Go to payment url
                                return redirect($payment_response['link']);

                            } else {

                                // Something went wrong
                                $this->notification([
                                    'title'       => __('messages.t_error'),
                                    'description' => __('messages.t_toast_something_went_wrong'),
                                    'icon'        => 'error'
                                ]);

                                return;

                            }


                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // Cashfree
                    case 'cashfree':
                        
                        // Get api keys
                        $cashfree_client_id     = $selected?->settings['app_id'];
                        $cashfree_client_secret = $selected?->settings['secret_key'];
                        
                        // Set api url
                        $link                   = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'];

                        // Generate payment id
                        $payment_id              = "GG" . uid(17);

                        // Send request
                        $request = Http::withHeaders([
                                            'x-api-version'   => '2022-09-01',
                                            'x-client-id'     => $cashfree_client_id,
                                            'x-client-secret' => $cashfree_client_secret,
                                        ])->post("$link/pg/links", [

                                            "customer_details" => [
                                                "customer_phone"=> "+919090407368",
                                                "customer_email"=> auth()->user()->email,
                                                "customer_name" => auth()->user()->fullname ?? auth()->user()->username
                                            ],
                                            "link_notify" => [
                                                "send_sms"   => false,
                                                "send_email" => true
                                            ], 
                                            "link_meta" => [
                                                "notify_url" => url('callback/cashfree'),
                                                "return_url" => url('callback/cashfree?action=G'),
                                                "upi_intent" => false
                                            ], 
                                            "link_id"                     => $payment_id,
                                            "link_amount"                 => $amount,
                                            "link_currency"               => $selected->currency,
                                            "link_purpose"                => __('messages.t_checkout'),
                                            "link_partial_payments"       => false,
                                            "link_minimum_partial_amount" => 1,
                                            "link_expiry_time"            => now()->addDay(),
                                            "link_auto_reminders"         => true

                                        ]);

                        // Get response
                        $response = $request->json();

                        // Check if link generated
                        if ( is_array($response) && isset($response['link_url']) ) {
                            
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $payment_id, 'payment_method' => 'cashfree']);

                            // Go to payment url
                            return redirect($response['link_url']);

                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // cPay
                    case 'cpay':
                        
                        // Set request params
                        $globalpay         = $amount;
                        $arr2              = "GG" . uid(17);
                        $mult              = $globalpay * 100;
                        $customer_name     = auth()->user()->username;
                        $customer_lastname = auth()->user()->username;
                        $customer_email    = auth()->user()->email;
                        $customer_address  = "";
                        $customer_town     = "";
                        $customer_zip      = "";
                        $customer_tel      = "";
                        $AmountToPay       = $mult;
                        $PayToMerchant     = $selected?->settings['merchant_id'];
                        $MerchantName      = $selected?->settings['merchant_name'];
                        $AmountCurrency    = $selected->currency;
                        $Details1          = __('messages.t_checkout');
                        $Details2          = $arr2;
                        $PaymentOKURL      = url('callback/cpay/success');
                        $PaymentFailURL    = url('callback/cpay/failed');
                        $FirstName         = $customer_name;
                        $LastName          = $customer_lastname;
                        $Address           = $customer_address;
                        $City              = $customer_town;
                        $Zip               = $customer_zip;
                        $Telephone         = $customer_tel;
                        $Email             = $customer_email;
                        $OriginalAmount    = $globalpay;
                        $md5password       = $selected?->settings['password'];
                        $AmountToPay2      = sprintf("%03d", mb_strlen($AmountToPay, 'UTF-8'));
                        $PayToMerchant2    = sprintf("%03d", strlen($PayToMerchant));
                        $MerchantName2     = sprintf("%03d", strlen($MerchantName));
                        $AmountCurrency2   = sprintf("%03d", strlen($AmountCurrency));
                        $Details12         = sprintf("%03d", strlen($Details1));
                        $Details22         = sprintf("%03d", strlen($Details2));
                        $PaymentOKURL2     = sprintf("%03d", strlen($PaymentOKURL));
                        $PaymentFailURL2   = sprintf("%03d", strlen($PaymentFailURL));
                        $FirstName2        = sprintf("%03d", strlen($FirstName));
                        $LastName2         = sprintf("%03d", strlen($LastName));
                        $Address2          = sprintf("%03d", strlen($Address));
                        $City2             = sprintf("%03d", strlen($City));
                        $Zip2              = sprintf("%03d", strlen($Zip));
                        $Telephone2        = sprintf("%03d", strlen($Telephone));
                        $Email2            = sprintf("%03d", strlen($Email));
                        $OriginalAmount2   = sprintf("%03d", strlen($OriginalAmount));
                        $CheckSumHeader    = "16AmountToPay,PayToMerchant,MerchantName,AmountCurrency,Details1,Details2,PaymentOKURL,PaymentFailURL,FirstName,LastName,Address,City,Zip,Telephone,Email,OriginalAmount," . $AmountToPay2 . $PayToMerchant2 . $MerchantName2 . $AmountCurrency2 . $Details12 . $Details22 . $PaymentOKURL2 . $PaymentFailURL2 . $FirstName2 . $LastName2 . $Address2 . $City2 . $Zip2 . $Telephone2 . $Email2 . $OriginalAmount2;
                        $CheckSumHeader2   = $CheckSumHeader . $AmountToPay . $PayToMerchant . $MerchantName . $AmountCurrency . $Details1 . $Details2 . $PaymentOKURL . $PaymentFailURL . $FirstName . $LastName . $Address . $City . $Zip . $Telephone . $Email . $OriginalAmount . $md5password;
                        $CheckSum          = md5($CheckSumHeader2);

                        // Set payment gateway option
                        $this->payment_gateway_params['cpay']['AmountToPay']    = $AmountToPay;
                        $this->payment_gateway_params['cpay']['PayToMerchant']  = $PayToMerchant;
                        $this->payment_gateway_params['cpay']['MerchantName']   = $MerchantName;
                        $this->payment_gateway_params['cpay']['AmountCurrency'] = $AmountCurrency;
                        $this->payment_gateway_params['cpay']['Details1']       = $Details1;
                        $this->payment_gateway_params['cpay']['Details2']       = $Details2;
                        $this->payment_gateway_params['cpay']['PaymentOKURL']   = $PaymentOKURL;
                        $this->payment_gateway_params['cpay']['PaymentFailURL'] = $PaymentFailURL;
                        $this->payment_gateway_params['cpay']['CheckSumHeader'] = $CheckSumHeader;
                        $this->payment_gateway_params['cpay']['CheckSum']       = $CheckSum;
                        $this->payment_gateway_params['cpay']['FirstName']      = $FirstName;
                        $this->payment_gateway_params['cpay']['LastName']       = $LastName;
                        $this->payment_gateway_params['cpay']['Address']        = $Address;
                        $this->payment_gateway_params['cpay']['City']           = $City;
                        $this->payment_gateway_params['cpay']['Zip']            = $Zip;
                        $this->payment_gateway_params['cpay']['Telephone']      = $Telephone;
                        $this->payment_gateway_params['cpay']['Email']          = $Email;
                        $this->payment_gateway_params['cpay']['OriginalAmount'] = $OriginalAmount;

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $arr2, 'payment_method' => 'cpay']);

                        // Go to next step
                        $this->is_third_step                  = true;

                    break;

                    // Duitku
                    case 'duitku':
                        
                        // Set request params
                        $merchantCode     = $selected?->settings['merchant_code'];
                        $apiKey           = $selected?->settings['api_key'];
                        $paymentAmount    = $amount;
                        $paymentMethod    = 'VC';
                        $merchantOrderId  = "GG" . uid(17);
                        $productDetails   = __('messages.t_checkout');
                        $email            = auth()->user()->email;
                        $phoneNumber      = "";
                        $additionalParam  = '';
                        $merchantUserInfo = '';
                        $customerVaName   = auth()->user()->fullname ?? auth()->user()->username;
                        $callbackUrl      = url('callback/duitku');
                        $returnUrl        = url('callback/duitku');
                        $expiryPeriod     = 10;
                        $signature        = md5($merchantCode . $merchantOrderId . $paymentAmount . $apiKey);
                        $firstName        = auth()->user()->fullname ?? auth()->user()->username;
                        $lastName         = auth()->user()->fullname ?? auth()->user()->username;
                        $alamat           = "";
                        $city             = "";
                        $postalCode       = "";
                        $countryCode      = "ID";
                        $address          = array(
                            'firstName'   => $firstName,
                            'lastName'    => $lastName,
                            'address'     => $alamat,
                            'city'        => $city,
                            'postalCode'  => $postalCode,
                            'phone'       => $phoneNumber,
                            'countryCode' => $countryCode
                        );
                        $customerDetail = array(
                            'firstName'       => $firstName,
                            'lastName'        => $lastName,
                            'email'           => $email,
                            'phoneNumber'     => $phoneNumber,
                            'billingAddress'  => $address,
                            'shippingAddress' => $address
                        );
                        $item1 = array(
                            'name'     => __('messages.t_checkout'),
                            'price'    => $paymentAmount,
                            'quantity' => 1
                        );
                        $itemDetails = array( $item1 );
                        $params      = array(
                            'merchantCode'     => $merchantCode,
                            'paymentAmount'    => $paymentAmount,
                            'paymentMethod'    => $paymentMethod,
                            'merchantOrderId'  => $merchantOrderId,
                            'productDetails'   => $productDetails,
                            'additionalParam'  => $additionalParam,
                            'merchantUserInfo' => $merchantUserInfo,
                            'customerVaName'   => $customerVaName,
                            'email'            => $email,
                            'phoneNumber'      => $phoneNumber,
                            'itemDetails'      => $itemDetails,
                            'customerDetail'   => $customerDetail,
                            'callbackUrl'      => $callbackUrl,
                            'returnUrl'        => $returnUrl,
                            'signature'        => $signature,
                            'expiryPeriod'     => $expiryPeriod
                        );
                        $params_string = json_encode($params);
                        
                        // Get url
                        if ($selected?->settings['env'] === 'sandbox') {
                            $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry';
                            
                        } else {
                            $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry';
                        }

                        $ch = curl_init();

                        curl_setopt($ch, CURLOPT_URL, $url); 
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);                                                                  
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
                            'Content-Type: application/json',                                                                                
                            'Content-Length: ' . strlen($params_string))                                                                       
                        );   
                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

                        //execute post
                        $request  = curl_exec($ch);
                        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                        if($httpCode == 200) {

                            // Get results
                            $results = json_decode($request, true);

                            // Check if succeeded
                            if (isset($results['statusCode']) && $results['statusCode'] == "00") {
                                
                                // Save webhook details to later response
                                $this->webhook(['payment_id' => $merchantOrderId, 'payment_method' => 'duitku']);

                                // Redirect to payment url
                                return redirect($results['paymentUrl']);

                            } else {

                                // Error
                                $this->notification([
                                    'title'       => __('messages.t_error'),
                                    'description' => __('messages.t_toast_something_went_wrong'),
                                    'icon'        => 'error'
                                ]);

                                return;

                            }

                        } else {

                            $request = json_decode($request);

                            // Error
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => $request->Message,
                                'icon'        => 'error'
                            ]);

                        }

                    break;

                    // Ecpay
                    case 'ecpay':
                        
                        // Set params
                        $ecpay_link        = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'];
                        $hashKey           = $selected?->settings['hash_key'];
                        $hashIv            = $selected?->settings['hash_iv'];
                        $MerchantID        = $selected?->settings['merchant_id'];
                        $MerchantTradeNo   = "D" . uid(19);
                        $MerchantTradeDate = date('Y/m/d H:i:s');
                        $PaymentType       = "aio";
                        $TotalAmount       = $amount;
                        $TradeDesc         = EcpayGateway::ecpayUrlEncode('交易描述範例');
                        $ItemName          = __('messages.t_checkout');
                        $ReturnURL         = url('callback/ecpay');
                        $ChoosePayment     = "ALL";
                        $EncryptType       = 1;
                        $CheckMacValue     = EcpayGateway::generatMac([
                            "ChoosePayment"     => $ChoosePayment,
                            "EncryptType"       => $EncryptType,
                            "ItemName"          => $ItemName,
                            "MerchantID"        => $MerchantID,
                            "MerchantTradeDate" => $MerchantTradeDate,
                            "MerchantTradeNo"   => $MerchantTradeNo,
                            "PaymentType"       => $PaymentType,
                            "ReturnURL"         => $ReturnURL,
                            "TotalAmount"       => $TotalAmount,
                            "TradeDesc"         => $TradeDesc
                        ], $hashKey, $hashIv);
                        
                        // Set payment gateway option
                        $this->payment_gateway_params['ecpay']['link']              = $ecpay_link;
                        $this->payment_gateway_params['ecpay']['ChoosePayment']     = $ChoosePayment;
                        $this->payment_gateway_params['ecpay']['EncryptType']       = $EncryptType;
                        $this->payment_gateway_params['ecpay']['ItemName']          = $ItemName;
                        $this->payment_gateway_params['ecpay']['MerchantID']        = $MerchantID;
                        $this->payment_gateway_params['ecpay']['MerchantTradeDate'] = $MerchantTradeDate;
                        $this->payment_gateway_params['ecpay']['MerchantTradeNo']   = $MerchantTradeNo;
                        $this->payment_gateway_params['ecpay']['PaymentType']       = $PaymentType;
                        $this->payment_gateway_params['ecpay']['ReturnURL']         = $ReturnURL;
                        $this->payment_gateway_params['ecpay']['TotalAmount']       = $TotalAmount;
                        $this->payment_gateway_params['ecpay']['TradeDesc']         = $TradeDesc;
                        $this->payment_gateway_params['ecpay']['CheckMacValue']     = $CheckMacValue;

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $MerchantTradeNo, 'payment_method' => 'ecpay']);

                        // Go to next step
                        $this->is_third_step                  = true;


                    break;

                    // Epoint.az
                    case 'epoint':
                        
                        // Set epoint.az settings
                        $public_key                = $selected?->settings['public_key'];
                        $private_key               = $selected?->settings['private_key'];
                        $requestUrl                = "https://epoint.az/api/1/request";
                        $transaction_id            = "GG" . uid(17);

                        // Set values
                        $values    = [
                            "public_key"           => $public_key,
                            "amount"               => $amount,
                            "currency"             => $selected->currency,
                            "language"             => "az",
                            "order_id"             => $transaction_id,
                            "description"          => __('messages.t_checkout'),
                            "success_redirect_url" => url('callback/epoint/success?order_id=' . $transaction_id),
                            "error_redirect_url"   => url('callback/epoint/failed?order_id=' . $transaction_id),
                        ];

                        // Encode values
                        $data      = base64_encode(json_encode($values));

                        // Generate signature
                        $signature = base64_encode(sha1($private_key . $data . $private_key, 1));

                        // Set post fields
                        $fields    = http_build_query(array( 'data' => $data, 'signature' => $signature));

                        // Send request
                        $_ch = curl_init();
                        curl_setopt($_ch, CURLOPT_URL, $requestUrl);
                        curl_setopt($_ch, CURLOPT_POSTFIELDS, $fields);
                        curl_setopt($_ch, CURLOPT_RETURNTRANSFER, TRUE);
                        $_response = curl_exec($_ch);
                        
                        // Decode results
                        $results = json_decode($_response, true);

                        // Redirect if success
                        if (is_array($results) && isset($results['status']) && $results['status'] === 'success') {

                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $transaction_id, 'payment_method' => 'epoint']);

                            // Redirect
                            return redirect($results['redirect_url']);

                        } else {

                            // Error
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // FastPay
                    case 'fastpay':
                    
                        // Set request params
                        $post_data                       = array();
                        $post_data['merchant_mobile_no'] = $selected?->settings['merchant_mobile_no'];
                        $post_data['store_password']     = $selected?->settings['store_password'];
                        $post_data['order_id']           = "GG" . uid(17);
                        $post_data['bill_amount']        = $amount;
                        $post_data['success_url']        = url('callback/fastpay/success');
                        $post_data['fail_url']           = url('callback/fastpay/failed');
                        $post_data['cancel_url']         = url('callback/fastpay/cancel');
                        $direct_api_url                  = $selected?->settings['env'] === 'sandbox' ? "https://dev.fast-pay.cash/" : "https://secure.fast-pay.cash/";

                        $handle = curl_init();
                        curl_setopt($handle, CURLOPT_URL, $direct_api_url . "merchant/generate-payment-token" );
                        curl_setopt($handle, CURLOPT_TIMEOUT, 10);
                        curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 10);
                        curl_setopt($handle, CURLOPT_POST, 1 );
                        curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
                        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

                        $content = curl_exec($handle );

                        $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);
                        
                        if($code == 200 && !( curl_errno($handle))) {

                            curl_close( $handle);
                            $response = $content;

                        } else {

                            curl_close( $handle);
                            
                            // Error
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                        // Decode response
                        $results = json_decode( $response, true );

                        // Check if token generated
                        if ( is_array($results) && isset($results['token']) ) {
                            
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $post_data['order_id'], 'payment_method' => 'fastpay']);

                            // Go to payment url
                            return redirect($direct_api_url . "merchant/payment?token=" . $results['token']);

                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // Flutterwave
                    case 'flutterwave':
                    
                        // Generate order id
                        $order_id = "GG" . uid(17);

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $order_id, 'payment_method' => 'flutterwave']);

                        $this->payment_gateway_params['flutterwave']['order_id'] = $order_id;

                        // Go to next step
                        $this->is_third_step = true;

                    break;

                    // Freekassa
                    case 'freekassa':

                        // Set FreeKassa credentials
                        $merchant_id        = $selected?->settings['shop_id'];
                        $secret_key         = $selected?->settings['merchant_password1'];
                        $pay_url            = $selected?->settings['request_link'];

                        // Set request params
                        $params             = [];
                        $params['m']        = $merchant_id;
                        $params['oa']       = $amount;
                        $params['o']        = 88 . rand(10000000,99999999);
                        $params['i']        = 1;
                        $params['currency'] = $selected->currency;
                        $params['pay']      = 'Оплатить';
    
                        // Generate signature
                        $sign               = md5($merchant_id.':'.$params['oa'].':'.$secret_key.':'.$params['currency'].':'.$params['o']);

                        // Set signature
                        $params['s']        = $sign;
                        
                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $params['o'], 'payment_method' => 'freekassa']);

                        // Redirect to payment url
                        return redirect("$pay_url?" . http_build_query($params));

                    break;

                    // Genie business
                    case 'genie-business':
                        
                        // Get credentials 
                        $app_key      = $selected?->settings['app_key'];
                        $request_link = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'];

                        // Send request
                        $request = Http::withHeaders([
                                            'Accept'        => 'application/json',
                                            'Authorization' => $app_key,
                                            'Content-Type'  => 'application/json',
                                        ])->post("$request_link/public/v2/transactions", [
                                            "customerReference" => "GG" . uid(17),
                                            "currency"          => $selected->currency,
                                            "amount"            => $amount * 100,
                                            "redirectUrl"       => url('callback/genie?action=G'),
                                            "webhook"           => url('callback/genie')
                                        ]);

                        // Get response
                        $response = $request->json();
                        
                        // Check if link generated
                        if ( is_array($response) && isset($response['url']) ) {
                            
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $response['customerReference'], 'payment_method' => 'genie-business']);

                            // Go to payment url
                            return redirect($response['url']);

                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }
                                        
                        

                    break;

                    // Iyzico
                    case 'iyzico':
                    
                        // Get iyzico api config
                        $api_key         = $selected?->settings['api_key'];
                        $secret_key      = $selected?->settings['secret_key'];
                        $request_link    = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'];
                        $conversation_id = "GG" . uid(17);

                        // Set iyzico options
                        $options = new \Iyzipay\Options();
                        $options->setApiKey($api_key);
                        $options->setSecretKey($secret_key);
                        $options->setBaseUrl($request_link);

                        // Set request details
                        $request = new \Iyzipay\Request\CreatePayWithIyzicoInitializeRequest();
                        $request->setLocale(\Iyzipay\Model\Locale::TR);
                        $request->setConversationId($conversation_id);
                        $request->setPrice($amount);
                        $request->setPaidPrice($amount);
                        $request->setCurrency(\Iyzipay\Model\Currency::TL);
                        $request->setBasketId(Str::uuid());
                        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
                        $request->setCallbackUrl(url('callback/iyzico?conversation_id=' . $conversation_id));
                        $request->setEnabledInstallments(array(2, 3, 6, 9));

                        // Set buyer details
                        $buyer = new \Iyzipay\Model\Buyer();
                        $buyer->setId(auth()->user()->uid);
                        $buyer->setName(auth()->user()->fullname ?? auth()->user()->username);
                        $buyer->setSurname(auth()->user()->fullname ?? auth()->user()->username);
                        $buyer->setGsmNumber("+905350000000");
                        $buyer->setEmail(auth()->user()->email);
                        $buyer->setIdentityNumber("74300864791");
                        $buyer->setLastLoginDate("2015-10-05 12:43:35");
                        $buyer->setRegistrationDate("2013-04-21 15:12:09");
                        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
                        $buyer->setIp(request()->ip());
                        $buyer->setCity("Istanbul");
                        $buyer->setCountry("Turkey");
                        $buyer->setZipCode("34732");
                        $request->setBuyer($buyer);

                        // Set shipping address
                        $shippingAddress = new \Iyzipay\Model\Address();
                        $shippingAddress->setContactName(auth()->user()->fullname ?? auth()->user()->username);
                        $shippingAddress->setCity("Istanbul");
                        $shippingAddress->setCountry("Turkey");
                        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
                        $shippingAddress->setZipCode("34742");
                        $request->setShippingAddress($shippingAddress);

                        // Set billing address
                        $billingAddress = new \Iyzipay\Model\Address();
                        $billingAddress->setContactName(auth()->user()->fullname ?? auth()->user()->username);
                        $billingAddress->setCity("Istanbul");
                        $billingAddress->setCountry("Turkey");
                        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
                        $billingAddress->setZipCode("34742");
                        $request->setBillingAddress($billingAddress);

                        // Set items in basket
                        $basketItems = array();
                        $firstBasketItem = new \Iyzipay\Model\BasketItem();
                        $firstBasketItem->setId(Str::uuid());
                        $firstBasketItem->setName(__('messages.t_checkout'));
                        $firstBasketItem->setCategory1("Collectibles");
                        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
                        $firstBasketItem->setPrice($amount);
                        $basketItems[0] = $firstBasketItem;
                        $request->setBasketItems($basketItems);

                        // Send request
                        $payWithIyzicoInitialize = \Iyzipay\Model\PayWithIyzicoInitialize::create($request, $options);
                        
                        // Check if link generated
                        if ( $payWithIyzicoInitialize?->getPayWithIyzicoPageUrl() ) {
                            
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $conversation_id, 'payment_method' => 'iyzico']);

                            // Go to payment url
                            return redirect( $payWithIyzicoInitialize?->getPayWithIyzicoPageUrl() );

                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // Jazzcash
                    case 'jazzcash':
                    
                        $jazzcash_env           = $selected?->settings['env'];
                        $jazzcash_endpoint      = $jazzcash_env === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'] ;
                        $jazzcash_merchant_id   = $selected?->settings['merchant_id'];
                        $jazzcash_password      = $selected?->settings['password'];
                        $jazzcash_salt          = $selected?->settings['integerity_salt'];
                        $jazzcash_return_url    = url('callback/jazzcash');

                        // Set order details
                        $pp_amount              = $amount * 100;
                        $pp_billref             = "GG" . uid(17);
                        $pp_description         = __('messages.t_checkout');
                        $pp_language            = "EN";
                        $pp_merchant_id         = $jazzcash_merchant_id;
                        $pp_password            = $jazzcash_password;
                        $pp_return_url          = $jazzcash_return_url;
                        $pp_txn_currency        = $selected->currency;
                        $pp_txn_datetime        = date('Y') . date('m') . date('d') . date('H') . date('i') . date('s');
                        $pp_txn_expiry_datetime = date('Y') . date('m') . date('d', strtotime('tomorrow')) . date('H') . date('i') . date('s');
                        $pp_txn_ref_no          = Str::uuid()->toString();
                        $pp_txn_type            = "";
                        $pp_version             = 1.1;
                        $pp_ppmpf_1             = 1;
                        $pp_ppmpf_2             = 2;
                        $pp_ppmpf_3             = 3;
                        $pp_ppmpf_4             = 4;
                        $pp_ppmpf_5             = 5;

                        // Set hash string value
                        $jazzcash_hash_string   = '';
                        $jazzcash_hash_string  .= "$jazzcash_salt&";
                        $jazzcash_hash_string  .= "$pp_amount&";
                        $jazzcash_hash_string  .= "$pp_billref&";
                        $jazzcash_hash_string  .= "$pp_description&";
                        $jazzcash_hash_string  .= "$pp_language&";
                        $jazzcash_hash_string  .= "$pp_merchant_id&";
                        $jazzcash_hash_string  .= "$pp_password&";
                        $jazzcash_hash_string  .= "$pp_return_url&";
                        $jazzcash_hash_string  .= "$pp_txn_currency&";
                        $jazzcash_hash_string  .= "$pp_txn_datetime&";
                        $jazzcash_hash_string  .= "$pp_txn_expiry_datetime&";
                        $jazzcash_hash_string  .= "$pp_txn_ref_no&";
                        $jazzcash_hash_string  .= "$pp_version&";
                        $jazzcash_hash_string  .= "$pp_ppmpf_1&";
                        $jazzcash_hash_string  .= "$pp_ppmpf_2&";
                        $jazzcash_hash_string  .= "$pp_ppmpf_3&";
                        $jazzcash_hash_string  .= "$pp_ppmpf_4&";
                        $jazzcash_hash_string  .= "$pp_ppmpf_5";

                        // Generate hash string
                        $jazzcash_signature     = hash_hmac('sha256', $jazzcash_hash_string, $jazzcash_salt);

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $pp_billref, 'payment_method' => 'jazzcash']);

                        // Set payment gateway option
                        $this->payment_gateway_params['jazzcash']['link']                 = $jazzcash_endpoint;
                        $this->payment_gateway_params['jazzcash']['pp_Version']           = $pp_version;
                        $this->payment_gateway_params['jazzcash']['pp_TxnType']           = $pp_txn_type;
                        $this->payment_gateway_params['jazzcash']['pp_MerchantID']        = $pp_merchant_id;
                        $this->payment_gateway_params['jazzcash']['pp_Password']          = $pp_password;
                        $this->payment_gateway_params['jazzcash']['pp_ReturnURL']         = $jazzcash_return_url;
                        $this->payment_gateway_params['jazzcash']['pp_Language']          = $pp_language;
                        $this->payment_gateway_params['jazzcash']['pp_TxnRefNo']          = $pp_txn_ref_no;
                        $this->payment_gateway_params['jazzcash']['pp_Amount']            = $pp_amount;
                        $this->payment_gateway_params['jazzcash']['pp_TxnCurrency']       = $pp_txn_currency;
                        $this->payment_gateway_params['jazzcash']['pp_TxnDateTime']       = $pp_txn_datetime;
                        $this->payment_gateway_params['jazzcash']['pp_TxnExpiryDateTime'] = $pp_txn_expiry_datetime;
                        $this->payment_gateway_params['jazzcash']['pp_BillReference']     = $pp_billref;
                        $this->payment_gateway_params['jazzcash']['pp_Description']       = $pp_description;
                        $this->payment_gateway_params['jazzcash']['pp_SecureHash']        = $jazzcash_signature;
                        $this->payment_gateway_params['jazzcash']['ppmpf_1']              = $pp_ppmpf_1;
                        $this->payment_gateway_params['jazzcash']['ppmpf_2']              = $pp_ppmpf_2;
                        $this->payment_gateway_params['jazzcash']['ppmpf_3']              = $pp_ppmpf_3;
                        $this->payment_gateway_params['jazzcash']['ppmpf_4']              = $pp_ppmpf_4;
                        $this->payment_gateway_params['jazzcash']['ppmpf_5']              = $pp_ppmpf_5;

                        // Go to next step
                        $this->is_third_step = true;

                    break;

                    // Mercadopago
                    case 'mercadopago':
                    
                        // Set api secret key
                        \MercadoPago\SDK::setAccessToken( $selected?->settings['access_token'] );

                        $preference              = new \MercadoPago\Preference();
 
                        // Crear un elemento en la preferencia
                        $item                    = new \MercadoPago\Item();
                        $item->title             = __('messages.t_checkout');
                        $item->quantity          = 1;
                        $item->unit_price        = $amount;
                        $preference->items       = array($item);
                        $preference->auto_return = "approved";
                        $preference->purpose     = 'wallet_purchase';
                        $preference->back_urls = [
                            'success' => url('callback/mercadopago/success'),
                            'pending' => url('callback/mercadopago/pending'),
                            'failure' => url('callback/mercadopago/failed'),
                        ];
                        $preference->save();
                        
                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $preference->id, 'payment_method' => 'mercadopago']);

                        // Set payment gateway option
                        $this->payment_gateway_params['mercadopago']['preference_id'] = $preference->id;

                        // Go to next step
                        $this->is_third_step = true;    

                    break;

                    // Mollie
                    case 'mollie':
                    
                        // Set currency
                        $currency        = $selected->currency;

                        // Set amount
                        $amount          = number_format( $amount, 2, '.', '' );

                        // Generate mollie order id
                        $mollie_order_id = "GG" . uid(17);

                        // Set mollie client
                        $mollie          = new \Mollie\Api\MollieApiClient();

                        // Set api key
                        $mollie->setApiKey( $selected?->settings['key'] );

                        // Create a payment request
                        $payment  = $mollie->payments->create([
                            "amount" => [
                                "currency" => "$currency",
                                "value"    => "$amount"
                            ],
                            "method"      => ["applepay", "bancontact", "banktransfer", "belfius", "creditcard", "directdebit", "eps", "giftcard", "giropay", "ideal", "kbc", "mybank", "paypal", "paysafecard", "przelewy24", "sofort"],
                            "description" => $mollie_order_id,
                            "redirectUrl" => url("callback/mollie?action=G"),
                            "webhookUrl"  => url('callback/mollie')
                        ]);

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $mollie_order_id, 'payment_method' => 'mollie']);

                        // Redirect to payment link
                        return redirect($payment->getCheckoutUrl());

                    break;

                    // Nowpayment.io
                    case 'nowpayments':

                        // Set new client request
                        $client  = new Client();
                        
                        // Set headers
                        $headers = [
                            'x-api-key'    => $selected?->settings['api_key'],
                            'Content-Type' => 'application/json'
                        ];

                        // Set order id
                        $order_id = "GG" . uid(17);

                        // Set request link
                        $request_link = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'] ;
        
                        // Set request body
                        $body = [
                            "price_amount"      => $amount,
                            "price_currency"    => strtolower(settings('currency')->code),
                            "order_id"          => $order_id,
                            "order_description" => __('messages.t_checkout'),
                            // "ipn_callback_url"  => url('callback/nowpayments/ipn'),
                            "success_url"       => url('callback/nowpayments/success'),
                            "cancel_url"        => url('callback/nowpayments/cancel')
                        ];
                        
                        // Send request
                        $request = new Request('POST', $request_link . "invoice", $headers, json_encode($body));

                        // Get response
                        $res     = $client->sendAsync($request)->wait();

                        // Get resutls
                        $data    = json_decode($res->getBody(), true);

                        // Check if link generated
                        if ( is_array($data) && isset($data['invoice_url']) ) {
                            
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $data['order_id'], 'payment_method' => 'nowpayments']);

                            // Go to payment url
                            return redirect($data['invoice_url']);

                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // Paymob
                    case 'paymob':
                        
                        // Get auth token
                        $auth    = Http::acceptJson()->post('https://accept.paymob.com/api/auth/tokens', [
                                        'api_key' => $selected?->settings['api_key'],
                                    ])->json();

                        // Check if token is set
                        if (isset($auth['token'])) {
                            
                            // Create order
                            $order   = Http::acceptJson()->post('https://accept.paymob.com/api/ecommerce/orders', [
                                            'auth_token'      => $auth['token'],
                                            'delivery_needed' => false,
                                            'amount_cents'    => $amount * 100,
                                            'items'           => []
                                        ])->json();

                            // Check if order created
                            if (isset($order['id'])) {
                                
                                // Make payment
                                $payment = Http::acceptJson()->post('https://accept.paymob.com/api/acceptance/payment_keys', [
                                                'auth_token'     => $auth['token'],
                                                'amount_cents'   => $amount * 100,
                                                'expiration'     => 3600,
                                                'order_id'       => $order['id'],
                                                'billing_data'   => [
                                                    "first_name"     => auth()->user()->fullname ?? auth()->user()->username,
                                                    "last_name"      => auth()->user()->fullname ?? auth()->user()->username,
                                                    "email"          => auth()->user()->email,
                                                    "phone_number"   => "+2087513693",
                                                    "apartment"      => "NA",
                                                    "floor"          => "NA",
                                                    "street"         => "NA",
                                                    "building"       => "NA",
                                                    "shipping_method"=> "D",
                                                    "postal_code"    => "NA",
                                                    "city"           => "NA",
                                                    "country"        => "NA",
                                                    "state"          => "NA"
                                                ],
                                                'currency'       => $selected?->currency,
                                                'integration_id' => $selected?->settings['integration_id']
                                            ])->json();

                                // Save webhook details to later response
                                $this->webhook(['payment_id' => "GG" . $order['id'], 'payment_method' => 'paymob']);
                                            
                                // Set payment token
                                $this->payment_gateway_params['paymob']['token'] = $payment['token'];

                                // Go to next step
                                $this->is_third_step = true;

                            } else {

                                // Something went wrong
                                $this->notification([
                                    'title'       => __('messages.t_error'),
                                    'description' => __('messages.t_toast_something_went_wrong'),
                                    'icon'        => 'error'
                                ]);

                            }
                            
                        } else {

                            // Something went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                        }

                    break;

                    // Paymob PK
                    case 'paymob-pk':
                    
                        // Get auth token
                        $auth    = Http::acceptJson()->post('https://pakistan.paymob.com/api/auth/tokens', [
                            'api_key' => $selected?->settings['api_key'],
                        ])->json();

                        // Check if token is set
                        if (isset($auth['token'])) {
                            
                            // Create order
                            $order   = Http::acceptJson()->post('https://pakistan.paymob.com/api/ecommerce/orders', [
                                            'auth_token'      => $auth['token'],
                                            'delivery_needed' => false,
                                            'amount_cents'    => $amount * 100,
                                            'items'           => []
                                        ])->json();

                            // Check if order created
                            if (isset($order['id'])) {
                                
                                // Make payment
                                $payment = Http::acceptJson()->post('https://pakistan.paymob.com/api/acceptance/payment_keys', [
                                                'auth_token'     => $auth['token'],
                                                'amount_cents'   => $amount * 100,
                                                'expiration'     => 3600,
                                                'order_id'       => $order['id'],
                                                'billing_data'   => [
                                                    "first_name"     => auth()->user()->fullname ?? auth()->user()->username,
                                                    "last_name"      => auth()->user()->fullname ?? auth()->user()->username,
                                                    "email"          => auth()->user()->email,
                                                    "phone_number"   => "+86(8)9135210487",
                                                    "apartment"      => "NA",
                                                    "floor"          => "NA",
                                                    "street"         => "NA",
                                                    "building"       => "NA",
                                                    "shipping_method"=> "D",
                                                    "postal_code"    => "NA",
                                                    "city"           => "NA",
                                                    "country"        => "NA",
                                                    "state"          => "NA"
                                                ],
                                                'currency'       => $selected?->currency,
                                                'integration_id' => $selected?->settings['integration_id']
                                            ])->json();

                                // Save webhook details to later response
                                $this->webhook(['payment_id' => $order['id'], 'payment_method' => 'paymob-pk']);
                                            
                                // Set payment token
                                $this->payment_gateway_params['paymob-pk']['token'] = $payment['token'];

                                // Go to next step
                                $this->is_third_step = true;

                            } else {

                                // Something went wrong
                                $this->notification([
                                    'title'       => __('messages.t_error'),
                                    'description' => __('messages.t_toast_something_went_wrong'),
                                    'icon'        => 'error'
                                ]);

                            }
                            
                        } else {

                            // Something went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                        }

                    break;

                    // Paystack
                    case 'paystack':
                    
                        // Generate order id
                        $order_id                                          = "GG" . uid(17);
                        
                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $order_id, 'payment_method' => 'paystack']);

                        // Save order id
                        $this->payment_gateway_params['paystack']['order'] = $order_id;

                        // Go to next step
                        $this->is_third_step                               = true;
                        
                    break;

                    // Paytabs
                    case 'paytabs':
                        
                        // Generate order id
                        $order_id = "GG" . uid(17);

                        // Send payment request
                        $payment  = paypage::sendPaymentCode('all')
                                            ->sendTransaction('Auth')
                                            ->sendCart( $order_id, $amount, __('messages.t_checkout') )
                                            ->sendCustomerDetails(
                                                auth()->user()->fullname ?? auth()->user()->username, 
                                                auth()->user()->email, 
                                                'NA', 
                                                'NA', 
                                                'NA', 
                                                'NA', 
                                                'NA', 
                                                'NA',
                                                request()->ip()
                                            )
                                            ->sendHideShipping(true)
                                            ->sendURLs( url('callback/paytabs'), url('callback/paytabs') )
                                            ->sendLanguage('en')
                                            ->create_pay_page();

                        // Redirect
                        if ($payment) {

                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $order_id, 'payment_method' => 'paytabs']);

                            // Redirect
                            return $payment;

                        } else {

                            // Something went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;
                        }

                    break;

                    // Paytr
                    case 'paytr':
                    
                        // Generate order id
                        $merchant_oid = "GG" . uid(17);

                        // Set amount
                        $amount       = $amount;

                        // Set currency
                        $currency     = $selected?->currency === 'TRY' ? 'TL' : $selected->currency;
        
                        // Start new payment
                        $paytr        = new \App\Utils\PayTR\PayTR(); 

                        // Set payment gateway api keys
                        $paytr->setMerchantId( $selected?->settings['merchant_id'] );
                        $paytr->setMerchantKey( $selected?->settings['merchant_key'] );
                        $paytr->setMerchantSalt( $selected?->settings['merchant_salt'] );
                        $paytr->setMerchantOrderId($merchant_oid);

                        // Set order details
                        $paytr->setEmail(auth()->user()->email);
                        $paytr->setPaymentAmount($amount);
                        $paytr->setUserName(auth()->user()->username);
                        $paytr->setAddress('N/A');
                        $paytr->setPhone('5205000000');
                        $paytr->setBasket([[ "name" => __('messages.t_checkout'), "price" => $amount , "currency" => $currency ]]);
                        $paytr->setCurrency($currency);
                        $paytr->setSuccessUrl(url('callback/paytr/success?action=G'));
                        $paytr->setFailUrl(url('callback/paytr/failed?action=G'));
                        $paytr->initialize();

                        // Check if token generated
                        if ( $paytr?->token ) {
                            
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $merchant_oid, 'payment_method' => 'paytr']);

                            // Set token
                            $this->payment_gateway_params['paytr']['token'] = $paytr->token;

                            // Go to next step
                            $this->is_third_step = true;

                        } else {

                            // Somthing went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;

                        }

                    break;

                    // Razorpay
                    case 'razorpay':
                    
                        // Send a request
                        $request = new Api( $selected?->settings['key_id'], $selected?->settings['key_secret'] );

                        // Create order
                        $order   = $request->order->create([
                            'amount'   => $amount * 100,
                            'currency' => $selected->currency,
                        ]);

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $order->id, 'payment_method' => 'razorpay']);

                        // Set order id
                        $this->payment_gateway_params['razorpay']['id'] = $order->id;

                        // Go to next step
                        $this->is_third_step = true;

                    break;

                    // Robokassa
                    case 'robokassa':
  
                        // Set request params
                        $mrh_login = $selected?->settings['mrh_login'];
                        $mrh_pass1 = $selected?->settings['mrh_pass1'];
                        $inv_id    = "GG" . uid(17);
                        $inv_desc  = __('messages.t_checkout');
                        $out_summ  = $amount;

                        // build CRC value
                        $crc       = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");
        
                        // build URL
                        $url       = "https://auth.robokassa.ru/Merchant/Index.aspx?MerchantLogin=$mrh_login&" . "OutSum=$out_summ&InvId=$inv_id&Description=$inv_desc&SignatureValue=$crc";
        
                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $inv_id, 'payment_method' => 'robokassa']);

                        // Redirect to payment link
                        return redirect($url);

                    break;

                    // Stripe
                    case 'stripe':
                    
                        // Set your secret key. Remember to switch to your live secret key in production.
                        $stripe   = new \Stripe\StripeClient( $selected?->settings['secret_key'] );

                        // Create a stripe customer
                        $customer = $stripe->customers->create([
                            'name' => auth()->user()->fullname ?: auth()->user()->username,
                            'address' => [
                              'line1'       => '',
                              'postal_code' => '',
                              'city'        => '',
                              'state'       => '',
                              'country'     => '',
                            ],
                        ]);

                        // Create payment intent
                        $intent = $stripe->paymentIntents->create(
                            [
                                'customer'             => $customer->id,
                                'amount'               => $amount * 100,
                                'currency'             => $selected->currency,
                                'payment_method_types' => ['card'],
                                'description'          => __('messages.t_checkout')
                            ]
                        );

                        // Set intent
                        $this->payment_gateway_params['stripe']['client_secret'] = $intent->client_secret;

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $intent->client_secret, 'payment_method' => 'stripe']);

                        // Go to next step
                        $this->is_third_step = true;
                        
                    break;

                    // Vnpay
                    case 'vnpay':
                    
                        // Set timezone
                        $tz                        = 'Asia/Ho_Chi_Minh';
                        $timestamp                 = time();
                        $dt                        = new DateTime("now", new DateTimeZone($tz));
                        $dt->setTimestamp($timestamp);
                        $startTime                 = $dt->format('YmdHis');

                        // Set payment gateway settings
                        $vnp_TmnCode               = $selected?->settings['tmn_code'];
                        $vnp_HashSecret            = $selected?->settings['hash_secret'];
                        $vnp_Url                   = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'];
                        $vnp_Returnurl             = url('callback/vnpay');

                        // Set order details
                        $vnp_TxnRef                = "GG" . uid(17);
                        $vnp_OrderInfo             = __('messages.t_checkout');
                        $vnp_OrderType             = "other";
                        $vnp_Amount                = $amount * 100;
                        $vnp_Locale                = app()->getLocale() == 'en' ? "en" : "vn";
                        $vnp_IpAddr                = request()->ip();
                        $vnp_ExpireDate            = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

                        // Set data
                        $inputData                 = array(
                            "vnp_Version"        => "2.1.0",
                            "vnp_TmnCode"        => $vnp_TmnCode,
                            "vnp_Amount"         => $vnp_Amount,
                            "vnp_Command"        => "pay",
                            "vnp_CreateDate"     => date('YmdHis'),
                            "vnp_CurrCode"       => settings('vnpay')->currency,
                            "vnp_IpAddr"         => $vnp_IpAddr,
                            "vnp_Locale"         => $vnp_Locale,
                            "vnp_OrderInfo"      => $vnp_OrderInfo,
                            "vnp_OrderType"      => $vnp_OrderType,
                            "vnp_ReturnUrl"      => $vnp_Returnurl,
                            "vnp_TxnRef"         => $vnp_TxnRef,
                            "vnp_ExpireDate"     => $vnp_ExpireDate
                        );

                        ksort($inputData);
                        $query    = "";
                        $i        = 0;
                        $hashdata = "";

                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                            } else {
                                $hashdata .= urlencode($key) . "=" . urlencode($value);
                                $i = 1;
                            }
                            $query .= urlencode($key) . "=" . urlencode($value) . '&';
                        }

                        // Set payment url
                        $vnp_Url = $vnp_Url . "?" . $query;

                        // Generate secure hash
                        if (isset($vnp_HashSecret)) {
                            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                            $vnp_Url      .= 'vnp_SecureHash=' . $vnpSecureHash;
                        }

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $vnp_TxnRef, 'payment_method' => 'vnpay']);

                        // Go to payment url
                        return redirect($vnp_Url);
                        
                    break;

                    // Xendit
                    case 'xendit':
                    
                        // Set xendit secret key
                        Xendit::setApiKey( $selected?->settings['secret_key'] );
                
                        // Set payment parameters
                        $params = [ 
                            'external_id'          => "GG" . uid(17),
                            'amount'               => $amount,
                            'description'          => __('messages.t_checkout'),
                            'invoice_duration'     => 86400,
                            'success_redirect_url' => url('callback/xendit/success?action=G'),
                            'failure_redirect_url' => url('callback/xendit/failed?action=G'),
                            'currency'             => $selected?->currency
                        ];
                
                        // Create invoice
                        $invoice = \Xendit\Invoice::create($params);
            
                        // Check if invocie created successfully
                        if (isset($invoice['invoice_url'])) {
                            
                            // Get payment url
                            $payment_url = $invoice['invoice_url'];
        
                            // Get invoice id
                            $invoice_id  = $invoice['id'];
        
                            // Save webhook details to later response
                            $this->webhook(['payment_id' => $invoice_id, 'payment_method' => 'xendit']);
        
                            // Go to payment url
                            return redirect($payment_url);
                    
                        } else {
        
                            // Something went wrong
                            $this->notification([
                                'title'       => __('messages.t_error'),
                                'description' => __('messages.t_toast_something_went_wrong'),
                                'icon'        => 'error'
                            ]);

                            return;
        
                        }

                    break;

                    // Youcanpay
                    case 'youcanpay':
                    
                        // Get payment gateways keys
                        $public_key  = $selected?->settings['public_key'];
                        $private_key = $selected?->settings['private_key'];
                        $order_id    = "GG" . uid(17);

                        // Enable sandbox mode?
                        if (Str::of( $public_key )->startsWith('pub_sandbox')) {
                            YouCanPay::setIsSandboxMode(true);
                        }

                        // Create a YouCan Pay instance
                        $youcanpay    = YouCanPay::instance()->useKeys($private_key, $public_key);

                        // Data of the customer who wishes to make this purchase
                        $customerInfo = [
                            'name'         => auth()->user()->fullname ?? auth()->user()->username,
                            'address'      => '',
                            'zip_code'     => '',
                            'city'         => '',
                            'state'        => '',
                            'country_code' => '',
                            'phone'        => '',
                            'email'        => auth()->user()->email,
                        ];

                        // Create the order you want to be paid
                        $token        = $youcanpay->token->create(
                            $order_id,
                            $amount * $selected?->exchange_rate * 100,
                            $selected?->currency,
                            request()->ip(),
                            url('callback/youcanpay'),
                            url('callback/youcanpay'),
                            $customerInfo,
                            []
                        );

                        // Save webhook details to later response
                        $this->webhook(['payment_id' => $order_id, 'payment_method' => 'youcanpay']);

                        // Redirect to payment gateway
                        return redirect($token->getPaymentURL(app()->getLocale()));               

                    break;

                    // Offline method
                    case 'offline':
                        
                        // Go to next step
                        $this->is_third_step = true;

                    break;

                }

            } else {

                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_please_choose_a_payment_method'),
                    'icon'        => 'error'
                ]);

                return;

            }

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Handle offline payment
     *
     * @return void
     */
    public function offline()
    {
        try {

            // Get payment gateway settings
            $gateway = payment_gateway('offline', false, true);

            // Check if payment gateway enabled
            if (!$gateway?->is_active && $this->selected_method != 'offline') {
                
                // Not enabled or selected
                return;

            }

            // Get commission settings
            $commission_settings   = settings('commission');
        
            // Get user billing address
            $billing_info          = auth()->user()->billing;

            // Set unique id for this order
            $uid                   = uid();

            // Get buyer id
            $buyer_id              = auth()->id();

            // Save order
            $order                 = new Order();
            $order->uid            = $uid;
            $order->buyer_id       = $buyer_id;
            $order->total_value    = $this->total;
            $order->subtotal_value = $this->subtotal;
            $order->taxes_value    = $this->tax;
            $order->save();

            // Loop through items in cart
            foreach ($this->cart as $key => $item) {
                    
                // Get gig
                $gig = Gig::where('uid', $item['id'])->with('owner')->active()->first();

                // Check if gig exists
                if ($gig) {
                    
                    // Set quantity
                    $quantity        = isset($item['quantity']) ? convertToNumber($item['quantity']) : 1;

                    // Set gig upgrades
                    $upgrades        = isset($item['upgrades']) && is_array($item['upgrades']) && count($item['upgrades']) ? $item['upgrades'] : [];

                    // Set empty variable
                    $upgrades_amount = 0;

                    // Loop through upgrades
                    foreach ($upgrades as $index => $upgrade) {
                        
                        // Check if upgrade is selected
                        if ( isset($upgrade['checked']) && $upgrade['checked'] == 1 ) {
                            
                            $upgrades_amount += convertToNumber($upgrade['price']) * $quantity;

                        }

                    }

                    // Set item total price
                    $item_total = $upgrades_amount + ( convertToNumber($item['gig']['price']) * $quantity );

                    // Calculate commission first
                    if ($commission_settings->commission_from === 'orders') {
                        
                        // Check commission type
                        if ($commission_settings->commission_type === 'percentage') {
                            
                            // Calculate commission
                            $commission = convertToNumber($commission_settings->commission_value) * $item_total / 100;
    
                        } else {
    
                            // Fixed amount
                            $commission = convertToNumber($commission_settings->commission_value);
    
                        }

                    } else {
                        
                        // No commission
                        $commission = 0;

                    }

                    // Save order item
                    $order_item                         = new OrderItem();
                    $order_item->uid                    = uid();
                    $order_item->order_id               = $order->id;
                    $order_item->gig_id                 = $gig->id;
                    $order_item->owner_id               = $gig->user_id;
                    $order_item->quantity               = $quantity;
                    $order_item->has_upgrades           = count($upgrades) ? true : false;
                    $order_item->total_value            = $item_total;
                    $order_item->profit_value           = $item_total - $commission;
                    $order_item->commission_value       = $commission;
                    $order_item->save();

                    // Loop through upgrades again
                    foreach ($upgrades as $index => $value) {
                        
                        // Check if upgrade is selected
                        if ( isset($upgrade['checked']) && $upgrade['checked'] == 1 ) {
                        
                            // Get upgrade
                            $upgrade = GigUpgrade::where('uid', $value['id'])->where('gig_id', $gig->id)->first();
    
                            // Check if upgrade exists
                            if ($upgrade) {
                                
                                // Save item upgrade
                                $order_item_upgrade             = new OrderItemUpgrade();
                                $order_item_upgrade->item_id    = $order_item->id;
                                $order_item_upgrade->title      = $upgrade->title;
                                $order_item_upgrade->price      = $upgrade->price;
                                $order_item_upgrade->extra_days = $upgrade->extra_days;
                                $order_item_upgrade->save();
    
                            }

                        }
                        
                    }

                }

            }

            // Save invoice
            $invoice                 = new OrderInvoice();
            $invoice->order_id       = $order->id;
            $invoice->payment_method = "offline";
            $invoice->payment_id     = uid();
            $invoice->firstname      = $billing_info->firstname ?? auth()->user()->username;
            $invoice->lastname       = $billing_info->lastname ?? auth()->user()->username;
            $invoice->email          = auth()->user()->email;
            $invoice->company        = !empty($billing_info->company) ? clean($billing_info->company) : null;
            $invoice->address        = !empty($billing_info->address) ? clean($billing_info->address) : "NA";
            $invoice->status         = 'pending';
            $invoice->save();

            // If invoice not paid yet
            if ($invoice->status === 'pending') {
                    
                // Send notification to admin
                Admin::first()->notify(new PendingOfflinePayment($order, $invoice));

            }

            // Now everything succeeded
            // Let's empty the cart
            session()->forget('cart');

            return redirect('account/orders')->with('message', __('messages.t_order_placed_waiting_offline_payment'));

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Handle payment from wallet
     *
     * @return void
     */
    public function wallet()
    {
        try {

            // Get user available credit
            $available_balance = convertToNumber(auth()->user()->balance_available);

            // Check if user has amount in his wallet
            if ($this->total >= $available_balance) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_insufficient_funds_in_your_account'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get commission settings
            $commission_settings   = settings('commission');
        
            // Get user billing address
            $billing_info          = auth()->user()->billing;

            // Set unique id for this order
            $uid                   = uid();

            // Get buyer id
            $buyer_id              = auth()->id();

            // Save order
            $order                 = new Order();
            $order->uid            = $uid;
            $order->buyer_id       = $buyer_id;
            $order->total_value    = $this->total;
            $order->subtotal_value = $this->subtotal;
            $order->taxes_value    = $this->tax;
            $order->save();

            // Loop through items in cart
            foreach ($this->cart as $key => $item) {
                    
                // Get gig
                $gig = Gig::where('uid', $item['id'])->with('owner')->active()->first();

                // Check if gig exists
                if ($gig) {
                    
                    // Set quantity
                    $quantity        = isset($item['quantity']) ? convertToNumber($item['quantity']) : 1;

                    // Set gig upgrades
                    $upgrades        = isset($item['upgrades']) && is_array($item['upgrades']) && count($item['upgrades']) ? $item['upgrades'] : [];

                    // Set empty variable
                    $upgrades_amount = 0;

                    // Loop through upgrades
                    foreach ($upgrades as $index => $upgrade) {
                        
                        // Check if upgrade is selected
                        if ( isset($upgrade['checked']) && $upgrade['checked'] == 1 ) {
                            
                            $upgrades_amount += convertToNumber($upgrade['price']) * $quantity;

                        }

                    }

                    // Set item total price
                    $item_total = $upgrades_amount + ( convertToNumber($item['gig']['price']) * $quantity );

                    // Calculate commission first
                    if ($commission_settings->commission_from === 'orders') {
                        
                        // Check commission type
                        if ($commission_settings->commission_type === 'percentage') {
                            
                            // Calculate commission
                            $commission = convertToNumber($commission_settings->commission_value) * $item_total / 100;
    
                        } else {
    
                            // Fixed amount
                            $commission = convertToNumber($commission_settings->commission_value);
    
                        }

                    } else {
                        
                        // No commission
                        $commission = 0;

                    }

                    // Save order item
                    $order_item                         = new OrderItem();
                    $order_item->uid                    = uid();
                    $order_item->order_id               = $order->id;
                    $order_item->gig_id                 = $gig->id;
                    $order_item->owner_id               = $gig->user_id;
                    $order_item->quantity               = $quantity;
                    $order_item->has_upgrades           = count($upgrades) ? true : false;
                    $order_item->total_value            = $item_total;
                    $order_item->profit_value           = $item_total - $commission;
                    $order_item->commission_value       = $commission;
                    $order_item->save();

                    // Loop through upgrades again
                    foreach ($upgrades as $index => $value) {
                        
                        // Check if upgrade is selected
                        if ( isset($upgrade['checked']) && $upgrade['checked'] == 1 ) {
                        
                            // Get upgrade
                            $upgrade = GigUpgrade::where('uid', $value['id'])->where('gig_id', $gig->id)->first();
    
                            // Check if upgrade exists
                            if ($upgrade) {
                                
                                // Save item upgrade
                                $order_item_upgrade             = new OrderItemUpgrade();
                                $order_item_upgrade->item_id    = $order_item->id;
                                $order_item_upgrade->title      = $upgrade->title;
                                $order_item_upgrade->price      = $upgrade->price;
                                $order_item_upgrade->extra_days = $upgrade->extra_days;
                                $order_item_upgrade->save();
    
                            }

                        }
                        
                    }

                    // Update seller pending balance
                    $gig->owner()->update([
                        'balance_pending' => convertToNumber($gig->owner->balance_pending) + convertToNumber($order_item->profit_value)
                    ]);

                    // Increment orders in queue
                    $gig->increment('orders_in_queue');

                    // Order item placed successfully
                    // Let's notify the seller about new order
                    $gig->owner->notify( (new PendingOrder($order_item))->locale(config('app.locale')) );

                    // Check user's level
                    check_user_level($buyer_id);

                    // Send notification
                    notification([
                        'text'    => 't_u_received_new_order_seller',
                        'action'  => url('seller/orders/details', $order_item->uid),
                        'user_id' => $order_item->owner_id
                    ]);

                }

            }

            // Save invoice
            $invoice                 = new OrderInvoice();
            $invoice->order_id       = $order->id;
            $invoice->payment_method = "wallet";
            $invoice->payment_id     = uid();
            $invoice->firstname      = $billing_info->firstname ?? auth()->user()->username;
            $invoice->lastname       = $billing_info->lastname ?? auth()->user()->username;
            $invoice->email          = auth()->user()->email;
            $invoice->company        = !empty($billing_info->company) ? clean($billing_info->company) : null;
            $invoice->address        = !empty($billing_info->address) ? clean($billing_info->address) : "NA";
            $invoice->status         = 'paid';
            $invoice->save();

            // Let's take money from buyer's wallet
            auth()->user()->update([
                'balance_purchases' => convertToNumber(auth()->user()->balance_purchases) + convertToNumber($this->total),
                'balance_available' => $available_balance - $this->total
            ]);

            // Check user level
            check_user_level();

            // Now everything succeeded
            // Let's empty the cart
            session()->forget('cart');

            return redirect('account/orders')->with('message', __('messages.t_submit_ur_info_now_seller_start_order'));

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Check if cart has items
     *
     * @return void
     */
    public function cartUpdated()
    {
        // Get current cart
        $cart = session('cart', []);

        // Check if cart has items
        if (count($cart) === 0) {
            return redirect('cart');
        }
    }


    /**
     * Validate cart
     *
     * @return void
     */
    protected function validateCart()
    {
        // Get items in cart
        $items = session('cart', []);

        // Check if cart has items
        if (is_array($items) && count($items)) {
            
            // Loop through items
            foreach ($items as $key => $item) {
                
                // Get gig id
                $id      = $item['id'];

                // Get current user id
                $user_id = auth()->id();

                // Get gig
                $gig     = Gig::where('uid', $id)->active()->where('user_id', '!=', $user_id)->first();

                // Check if gig does not exists
                if (!$gig) {
                    
                    // Remove this item from cart
                    unset($items[$key]);

                }

            }

            // Refresh items
            array_values($items);

        }

        // Forget old session
        session()->forget('cart');

        // Set new cart
        session()->put('cart', $items);
    }


    /**
     * Save checkout for webhook callback
     *
     * @param array $data
     * @return void
     */
    protected function webhook($data)
    {
        try {
            
            // Set buyer id
            $buyer_id                = auth()->id();
            
            // Set cart
            $cart                    = $this->cart;

            // Set payment id
            $payment_id              = $data['payment_id'];

            // Set payment method 
            $payment_method          = $data['payment_method'];

            // Save
            $webhook                 = new CheckoutWebhook();
            $webhook->data           = ['buyer_id' => $buyer_id, 'cart' => $cart];
            $webhook->payment_id     = $payment_id;
            $webhook->payment_method = $payment_method;
            $webhook->save();

        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
