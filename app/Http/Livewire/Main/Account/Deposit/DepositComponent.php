<?php
namespace App\Http\Livewire\Main\Account\Deposit;

use DateTime;
use DateTimeZone;
use Xendit\Xendit;
use Razorpay\Api\Api;
use GuzzleHttp\Client;
use Livewire\Component;
use YouCan\Pay\YouCanPay;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use GuzzleHttp\Psr7\Request;
use App\Models\DepositWebhook;
use App\Models\DepositTransaction;
use Illuminate\Support\Facades\Http;
use App\Models\OfflinePaymentGateway;
use App\Models\AutomaticPaymentGateway;
use App\Utils\Payments\Gateways\EcpayGateway;
use Paytabscom\Laravel_paytabs\Facades\paypage;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class DepositComponent extends Component
{

    use SEOToolsTrait, Actions;

    public $selected_method;
    public $amount;
    public $is_third_step          = false;
    public $fee_value              = 0;
    public $fee_text               = 0;
    public $payment_gateway_params = [];

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_deposit') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.deposit.deposit', [
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
     * Next step
     *
     * @return void
     */
    public function next()
    {
        try {
            
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
                $amount = convertToNumber($this->amount);

                // Check is amount is valid number
                if (!is_int($amount) && !is_float($amount)) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_deposit_amount_incorrect'),
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Set maximum deposit amount
                $max_deposit_amount = $this->calculateExchangeRate($selected->deposit_max_amount, $selected->exchange_rate);

                // Set minmum deposit amount
                $min_deposit_amount = $this->calculateExchangeRate($selected->deposit_min_amount, $selected->exchange_rate);
                
                // Check deposit amount (max/min)
                if ($amount < $min_deposit_amount || $amount > $max_deposit_amount) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_min_deposit_amount_is_and_max_is', [
                            'min' => money($min_deposit_amount, settings('currency')->code, true)->format(), 
                            'max' => money($max_deposit_amount, settings('currency')->code, true)->format()
                        ]),
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Calculate fee
                $fee             = $this->fee($selected);

                // Set fee
                $this->fee_value = $fee['value'];
                $this->fee_text  = $fee['text'];

                // Check if fee applicable
                if ( isset($fee['value']) && $fee['value'] > 0 ) {

                    // Show confirmation dialog
                    $this->dialog()->confirm([
                        'title'          => '<h1 class="text-base font-bold tracking-wide">'. __('messages.t_confirmation') .'</h1>',
                        'description'    => "<div class='leading-relaxed'>" . __('messages.t_confirm_deposit') . "<br></div>
                        <div class='rounded border dark:border-secondary-600 my-8'>
                        <dl class='divide-y divide-gray-200 dark:divide-gray-600'>
                            <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                                <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right'>". __('messages.t_amount') ."</dt>
                                <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($amount, settings('currency')->code, true) ."</dd>
                            </div>  
                            <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                                <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right'>". __('messages.t_fee') ."</dt>
                                <dd class='text-sm font-semibold text-red-600 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". $fee['text'] ."</dd>
                            </div>  
                            <div class='grid grid-cols-3 gap-4 py-3 px-4 bg-gray-100/60 dark:bg-secondary-700 rounded-b'>
                                <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-400 ltr:text-left rtl:text-right'>". __('messages.t_u_will_get') ."</dt>
                                <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($amount - $fee['value'], settings('currency')->code, true) ."</dd>
                            </div>  
                        </dl>
                        </div>
                        ",
                        'icon'           => "shield-check",
                        'iconColor'      => "text-slate-500 dark:text-secondary-400 p-1",
                        'iconBackground' => "bg-slate-100 rounded-full p-3 dark:bg-secondary-700",
                        'accept'         => [
                            'label'  => __('messages.t_confirm'),
                            'method' => 'confirm',
                            'color'  => 'secondary'
                        ],
                        'reject' => [
                            'label'  => __('messages.t_cancel')
                        ],
                    ]);

                } else {

                    // Show confirmation dialog
                    $this->dialog()->confirm([
                        'title'          => '<h1 class="text-base font-bold tracking-wide">'. __('messages.t_confirmation') .'</h1>',
                        'description'    => "<div class='leading-relaxed'>" . __('messages.t_confirm_deposit') . "<br></div>
                        <div class='rounded border dark:border-secondary-600 my-8'>
                        <dl class='divide-y divide-gray-200 dark:divide-gray-600'>
                            <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                                <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right'>". __('messages.t_amount') ."</dt>
                                <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($amount, settings('currency')->code, true) ."</dd>
                            </div> 
                            <div class='grid grid-cols-3 gap-4 py-3 px-4 bg-gray-100/60 dark:bg-secondary-700 rounded-b'>
                                <dt class='text-sm font-medium whitespace-nowrap text-gray-500 dark:text-secondary-400 ltr:text-left rtl:text-right'>". __('messages.t_u_will_get') ."</dt>
                                <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left'>". money($amount, settings('currency')->code, true) ."</dd>
                            </div>  
                        </dl>
                        </div>
                        ",
                        'icon'           => "shield-check",
                        'iconColor'      => "text-slate-500 dark:text-secondary-400 p-1",
                        'iconBackground' => "bg-slate-100 rounded-full p-3 dark:bg-secondary-700",
                        'accept'         => [
                            'label'  => __('messages.t_confirm'),
                            'method' => 'confirm',
                            'color'  => 'secondary'
                        ],
                        'reject' => [
                            'label'  => __('messages.t_cancel')
                        ],
                    ]);
                    
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
     * Confirm deposit
     *
     * @return mixed
     */
    public function confirm()
    {
        try {
            
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
                $amount = convertToNumber($this->amount);

                // Check is amount is valid number
                if (!is_int($amount) && !is_float($amount)) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_deposit_amount_incorrect'),
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Set maximum deposit amount
                $max_deposit_amount = $this->calculateExchangeRate($selected->deposit_max_amount, $selected->exchange_rate);

                // Set minmum deposit amount
                $min_deposit_amount = $this->calculateExchangeRate($selected->deposit_min_amount, $selected->exchange_rate);
                
                // Check deposit amount (max/min)
                if ($amount < $min_deposit_amount || $amount > $max_deposit_amount) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_min_deposit_amount_is_and_max_is', [
                            'min' => money($min_deposit_amount, settings('currency')->code, true)->format(), 
                            'max' => money($max_deposit_amount, settings('currency')->code, true)->format()
                        ]),
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Set amount
                $amount = convertToNumber(number_format($amount * $selected?->exchange_rate / settings('currency')->exchange_rate, 2, '.', ''));

                // Check selected payment gateway
                switch ($this->selected_method) {

                    // PayPal
                    case 'paypal':
                        
                        // Generate order id
                        $order_id = "DD" . uid(17);

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
                                            "description"         => __('messages.t_add_funds'),
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
                            $payment_id      = "DD" . uid(17);

                            // Send a payment request
                            $payment_request = Http::withToken($response['token'], 'Token')->post("$campay_link/api/get_payment_link/", [

                                "amount"               => intval($amount),
                                "currency"             => $selected->currency,
                                "description"          => __('messages.t_add_funds'),
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
                        $payment_id              = "DD" . uid(17);

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
                                                "return_url" => url('callback/cashfree?action=D'),
                                                "upi_intent" => false
                                            ], 
                                            "link_id"                     => $payment_id,
                                            "link_amount"                 => $amount,
                                            "link_currency"               => $selected->currency,
                                            "link_purpose"                => __('messages.t_add_funds'),
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
                        $arr2              = "DD" . uid(17);
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
                        $Details1          = __('messages.t_add_funds');
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
                        $merchantOrderId  = "DD" . uid(17);
                        $productDetails   = __('messages.t_add_funds');
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
                            'name'     => __('messages.t_add_funds'),
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
                        $ItemName          = __('messages.t_add_funds');
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
                        $transaction_id            = "DD" . uid(17);

                        // Set values
                        $values    = [
                            "public_key"           => $public_key,
                            "amount"               => $amount,
                            "currency"             => $selected->currency,
                            "language"             => "az",
                            "order_id"             => $transaction_id,
                            "description"          => __('messages.t_add_funds'),
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
                        $post_data['order_id']           = "DD" . uid(17);
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
                        $order_id = "DD" . uid(17);

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
                        $params['o']        = 77 . rand(10000000,99999999);
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
                                            "customerReference" => "DD" . uid(17),
                                            "currency"          => $selected->currency,
                                            "amount"            => $amount,
                                            "redirectUrl"       => url('callback/genie?action=D'),
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
                        $conversation_id = "DD" . uid(17);

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
                        $firstBasketItem->setName(__('messages.t_add_funds'));
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
                        $pp_billref             = "DD" . uid(17);
                        $pp_description         = __('messages.t_add_funds');
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
                        $item->title             = __('messages.t_add_funds');
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
                        $mollie_order_id = "DD" . uid(17);

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
                            "redirectUrl" => url("callback/mollie?action=D"),
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
                        $order_id = "DD" . uid(17);

                        // Set request link
                        $request_link = $selected?->settings['env'] === 'sandbox' ? $selected?->settings['sandbox_link'] : $selected?->settings['production_link'] ;
        
                        // Set request body
                        $body = [
                            "price_amount"      => $this->amount,
                            "price_currency"    => strtolower(settings('currency')->code),
                            "order_id"          => $order_id,
                            "order_description" => __('messages.t_add_funds'),
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
                                $this->webhook(['payment_id' => "DD" . $order['id'], 'payment_method' => 'paymob']);
                                            
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
                        $order_id                                          = "DD" . uid(17);
                        
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
                        $order_id = "DD" . uid(17);

                        // Send payment request
                        $payment  = paypage::sendPaymentCode('all')
                                            ->sendTransaction('Auth')
                                            ->sendCart( $order_id, $amount, __('messages.t_add_funds') )
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
                        $merchant_oid = "DD" . uid(17);

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
                        $paytr->setBasket([[ "name" => __('messages.t_add_funds'), "price" => $amount , "currency" => $currency ]]);
                        $paytr->setCurrency($currency);
                        $paytr->setSuccessUrl(url('callback/paytr/success?action=D'));
                        $paytr->setFailUrl(url('callback/paytr/failed?action=D'));
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
                        $inv_id    = "DD" . uid(17);
                        $inv_desc  = __('messages.t_add_funds');
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
                                'description'          => __('messages.t_add_funds')
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
                        $vnp_TxnRef                = "DD" . uid(17);
                        $vnp_OrderInfo             = __('messages.t_add_funds');
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
                            'external_id'          => "DD" . uid(17),
                            'amount'               => $amount,
                            'description'          => __('messages.t_add_funds'),
                            'invoice_duration'     => 86400,
                            'success_redirect_url' => url('callback/xendit/success?action=D'),
                            'failure_redirect_url' => url('callback/xendit/failed?action=D'),
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
                        $order_id    = "DD" . uid(17);

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
                            $this->amount * $selected?->exchange_rate * 100,
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

            // Set amount to deposit
            $amount                  = convertToNumber($this->amount) * $gateway?->exchange_rate / settings('currency')->exchange_rate;

            // Remove long decimal
            $amount                  = convertToNumber( number_format($amount, 2, '.', '') );

            // Calculate fee from this amount
            $fee                     = convertToNumber($this->fee($gateway)['value']);

            // Make transaction
            $deposit                 = new DepositTransaction();
            $deposit->user_id        = auth()->id();
            $deposit->transaction_id = uid();
            $deposit->payment_method = 'offline';
            $deposit->amount_total   = $this->amount;
            $deposit->amount_fee     = $fee;
            $deposit->amount_net     = convertToNumber($this->amount - $fee);
            $deposit->currency       = $gateway?->currency;
            $deposit->exchange_rate  = $gateway?->exchange_rate;
            $deposit->status         = "pending";
            $deposit->ip_address     = request()->ip();
            $deposit->save();

            // Redirecting
            return redirect('account/deposit/history')->with('success', __('messages.t_deposit_offline_pending_msg'));

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
     * Back to previews step
     *
     * @return void
     */
    public function back()
    {
        $this->is_third_step = false;
        $this->dispatchBrowserEvent('refresh');
    }

 
    /**
     * Save deposit for webhook callback
     *
     * @param array $data
     * @return void
     */
    private function webhook($data)
    {
        try {
            
            // Set user id
            $user_id                 = auth()->id();
            
            // Set amount
            $amount                  = convertToNumber($this->amount);

            // Set payment id
            $payment_id              = $data['payment_id'];

            // Set payment method 
            $payment_method          = $data['payment_method'];

            // Save
            $webhook                 = new DepositWebhook();
            $webhook->payment_id     = $payment_id;
            $webhook->payment_method = $payment_method;
            $webhook->amount         = $amount;
            $webhook->user_id        = $user_id;
            $webhook->save();

        } catch (\Throwable $th) {
            throw $th;
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

            // Return max deposit
            return convertToNumber(number_format( $exchanged_amount, 2, '.', '' ));

        } catch (\Throwable $th) {

            // Something went wrong
            return $amount;

        }
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
            $amount = convertToNumber($this->amount) * $gateway?->exchange_rate / settings('currency')->exchange_rate;

            // Remove long decimal
            $amount = convertToNumber( number_format($amount, 2, '.', '') );
            
            // Get deposit fixed fee
            if (isset($gateway->fixed_fee['deposit'])) {
                
                // Set fixed fee
                $fee_fixed = convertToNumber($gateway->fixed_fee['deposit']);

            } else {

                // No fixed fee
                $fee_fixed = 0;

            }

            // Get deposit percentage fee
            if (isset($gateway->percentage_fee['deposit'])) {
                
                // Set percentage fee
                $fee_percentage = convertToNumber($gateway->percentage_fee['deposit']);

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
                'value' => convertToNumber( number_format($fee_value, 2, '.', '') ),
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

}