<?php

namespace App\Http\Livewire\Main\Seller\Withdrawals;

use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\UserWithdrawalHistory;
use App\Models\UserWithdrawalSettings;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Seller\Withdrawals\MakeValidator;
use App\Notifications\Admin\PendingWithdrawal as AdminPendingWithdrawal;
use App\Notifications\User\Seller\PendingWithdrawal as SellerPendingWithdrawal;

class CreateComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $can_withdraw = true;
    public $reason;
    public $paypal_email;
    public $offline_info;
    public $amount;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get user withdrawal settings
        $user_withdrawal_settings = UserWithdrawalSettings::where('user_id', auth()->id())->whereNotNull('gateway_provider_id')->first();

        // Check if user has withdrawal email or not
        if (!$user_withdrawal_settings) {
            return redirect('seller/withdrawals/settings');
        }

        // Get withdrawal settings
        $settings                 = settings('withdrawal');

        // Get user available balance
        $available_balance        = auth()->user()->balance_available;

        // Get user pending withdrawal
        $pending                  = UserWithdrawalHistory::where('user_id', auth()->id())->where('status', 'pending')->first();

        // Check if user a pending withdrawal
        if ($pending) {
            
            // Cannot withdrawal right now
            $this->can_withdraw = false;

            // Set reason
            $this->reason       = __('messages.t_cant_withdraw_reason_pending_request');

        }

        // User does not have pending withdrawal requests, let's check his latest withdrawal
        $latest                   = UserWithdrawalHistory::where('user_id', auth()->id())->where('status', 'paid')->latest()->first();

        // Check if he has a paid withdrawal
        if ($latest) {
            
            // Get now date
            $now = now();

            // Let's check withdrawal period settings
            switch ($settings->withdrawal_period) {

                // Daily
                case 'daily':
                    
                    if ($latest->created_at->diffInHours($now) < 24) { // 24 hours = 1 day
                        // Cannot withdrawal right now
                        $this->can_withdraw = false;

                        // Set reason
                        $this->reason       = __('messages.t_cant_withdraw_reason_period_24_hours');
                    }

                    break;

                // Weekly
                case 'weekly':
                    
                    if ($latest->created_at->diffInHours($now) < 168) { // 168 hours = 7 days
                        // Cannot withdrawal right now
                        $this->can_withdraw = false;

                        // Set reason
                        $this->reason       = __('messages.t_cant_withdraw_reason_period_7_days');
                    }

                    break;

                // Monthly
                case 'monthly':
                    
                    if ($latest->created_at->diffInHours($now) < 720) { // 720 hours = 30 days
                        // Cannot withdrawal right now
                        $this->can_withdraw = false;

                        // Set reason
                        $this->reason       = __('messages.t_cant_withdraw_reason_period_monthly');
                    }

                    break;
                
                default:
                    # code...
                    break;
            }

        }

        // User does not have any withdrawal, let's check minimum withdrawal amount
        if ($settings->min_withdrawal_amount > $available_balance) {
            
            // Cannot withdrawal right now
            $this->can_withdraw = false;

            // Set reason
            $this->reason       = __('messages.t_cant_withdraw_reason_min_amount', ['amount' => money($settings->min_withdrawal_amount, settings('currency')->code, true)]);

        }

        // Check seller default payout method
        if ($user_withdrawal_settings->gateway_provider_name === 'paypal' && boolval(config('payouts.paypal.enabled'))) {
            
            // Set paypal email
            $this->paypal_email = $user_withdrawal_settings->gateway_provider_id;

        } else if ($user_withdrawal_settings->gateway_provider_name === 'offline' && boolval(config('payouts.offline.enabled'))) {
            
            // Set offline info
            $this->offline_info = $user_withdrawal_settings->gateway_provider_id;

        } else {

            // Nothing enabled
            return redirect('seller/withdrawals/settings');

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
        $title       = __('messages.t_withdrawal') . " $separator " . settings('general')->title;
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

        return view('livewire.main.seller.withdrawals.create')->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Check if we have to take a commission from this payout or not
     *
     * @return void
     */
    public function confirm()
    {
        try {

            // Validate form
            MakeValidator::validate($this);

            // Get user withdrawal settings
            $user_withdrawal_settings = UserWithdrawalSettings::where('user_id', auth()->id())->whereNotNull('gateway_provider_id')->first();

            // Check if user has withdrawal email or not
            if (!$user_withdrawal_settings) {
                return redirect('seller/withdrawals/settings');
            }

            // Get withdrawal settings
            $settings          = settings('withdrawal');

            // Get user available balance
            $available_balance = auth()->user()->balance_available;

            // Check if user has this money in his account
            if ($this->amount > $available_balance) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_withdrawal_money_not_enough'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get user pending withdrawal
            $pending           = UserWithdrawalHistory::where('user_id', auth()->id())->where('status', 'pending')->first();

            // Check if user a pending withdrawal
            if ($pending) {
                
                // Cannot withdrawal right now
                return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_pending_request'));

            }

            // User does not have pending withdrawal requests, let's check his latest withdrawal
            $latest            = UserWithdrawalHistory::where('user_id', auth()->id())->where('status', 'paid')->latest()->first();

            // Check if he has a paid withdrawal
            if ($latest) {
                
                // Get now date
                $now = now();

                // Let's check withdrawal period settings
                switch ($settings->withdrawal_period) {

                    // Daily
                    case 'daily':
                        
                        if ($latest->created_at->diffInHours($now) < 24) { // 24 hours = 1 day
                            return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_period_24_hours'));
                        }

                        break;

                    // Weekly
                    case 'weekly':
                        
                        if ($latest->created_at->diffInHours($now) < 168) { // 168 hours = 7 days
                            return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_period_7_days'));
                        }

                        break;

                    // Monthly
                    case 'monthly':
                        
                        if ($latest->created_at->diffInHours($now) < 720) { // 720 hours = 30 days
                            return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_period_monthly'));
                        }

                        break;
                    
                    default:
                        # code...
                        break;
                }

            }

            // User does not have any withdrawal, let's check minimum withdrawal amount
            if ($this->amount < $settings->min_withdrawal_amount) {

                // Minimum amount error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    "description" => __('messages.t_cant_withdraw_reason_min_amount', ['amount' => money($settings->min_withdrawal_amount, settings('currency')->code, true)]),
                    'icon'        => 'error'
                ]);
                
                // Return
                return;

            }

            // Check if commission from payouts
            if (settings('commission')->commission_from === 'withdrawals') {
                
                // Check commission type
                if (settings('commission')->commission_type === 'fixed') {
                    
                    // Set commission value
                    $commission_value = convertToNumber(settings('commission')->commission_value);

                    // To output value must be a positive number
                    if (convertToNumber($this->amount) - $commission_value <= 0) {
                        
                        // Error
                        $this->notification([
                            'title'       => __('messages.t_error'),
                            'description' => __('messages.t_toast_something_went_wrong'),
                            'icon'        => 'error'
                        ]);

                        return;

                    }

                } else {

                    // Set commission value
                    $commission_value = convertToNumber(settings('commission')->commission_value) * convertToNumber($this->amount) / 100;

                }
                
                // Show confirmation dialog
                $this->dialog()->confirm([
                    'title'          => '<h1 class="text-base font-bold tracking-wide -mt-1 mb-4">'. __('messages.t_withdraw_funds') .'</h1>',
                    'description'    => "<div class='leading-relaxed'>" . __('messages.t_pls_review_ur_withdrawal_details') . "<br></div>
                    <div class='rounded border dark:border-secondary-600 my-8'>
                    <dl class='divide-y divide-gray-200 dark:divide-gray-600'>
                        <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                            <dt class='text-sm font-medium text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right whitespace-nowrap'>". __('messages.t_requested_amount') ."</dt>
                            <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left whitespace-nowrap'>". money(convertToNumber($this->amount), settings('currency')->code, true) ."</dd>
                        </div>  
                        <div class='grid grid-cols-3 gap-4 py-3 px-4'>
                            <dt class='text-sm font-medium text-gray-500 dark:text-secondary-500 ltr:text-left rtl:text-right whitespace-nowrap'>". __('messages.t_withdrawal_fee') ."</dt>
                            <dd class='text-sm font-semibold text-red-600 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left whitespace-nowrap'>- ". money(convertToNumber($commission_value), settings('currency')->code, true) ."</dd>
                        </div>  
                        <div class='grid grid-cols-3 gap-4 py-3 px-4 bg-gray-100/60 dark:bg-secondary-700 rounded-b'>
                            <dt class='text-sm font-medium text-gray-500 dark:text-secondary-400 ltr:text-left rtl:text-right whitespace-nowrap'>". __('messages.t_u_will_get') ."</dt>
                            <dd class='text-sm font-semibold text-zinc-900 dark:text-secondary-400 col-span-2 mt-0 ltr:text-right rtl:text-left whitespace-nowrap'>". money(convertToNumber($this->amount) - convertToNumber($commission_value), settings('currency')->code, true) ."</dd>
                        </div>  
                    </dl>
                    </div>
                    ",
                    'icon'           => "cash",
                    'iconColor'      => "text-slate-500 dark:text-secondary-400 p-1",
                    'iconBackground' => "bg-slate-100 rounded-full p-3 dark:bg-secondary-700",
                    'accept'         => [
                        'label'  => __('messages.t_confirm'),
                        'method' => 'withdraw',
                        'color'  => 'secondary'
                    ],
                    'reject' => [
                        'label'  => __('messages.t_cancel')
                    ],
                ]);

            } else {

                // Error
                return;

            }

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }


    /**
     * Make a withdrawal
     *
     * @return void
     */
    public function withdraw()
    {
        try {

            // Validate form
            MakeValidator::validate($this);

            // Get user withdrawal settings
            $user_withdrawal_settings = UserWithdrawalSettings::where('user_id', auth()->id())->whereNotNull('gateway_provider_id')->first();

            // Check if user has withdrawal email or not
            if (!$user_withdrawal_settings) {
                return redirect('seller/withdrawals/settings');
            }

            // Get withdrawal settings
            $settings          = settings('withdrawal');

            // Get user available balance
            $available_balance = auth()->user()->balance_available;

            // Check if user has this money in his account
            if ($this->amount > $available_balance) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_withdrawal_money_not_enough'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get user pending withdrawal
            $pending = UserWithdrawalHistory::where('user_id', auth()->id())->where('status', 'pending')->first();

            // Check if user a pending withdrawal
            if ($pending) {
                
                // Cannot withdrawal right now
                return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_pending_request'));

            }

            // User does not have pending withdrawal requests, let's check his latest withdrawal
            $latest = UserWithdrawalHistory::where('user_id', auth()->id())->where('status', 'paid')->latest()->first();

            // Check if he has a paid withdrawal
            if ($latest) {
                
                // Get now date
                $now = now();

                // Let's check withdrawal period settings
                switch ($settings->withdrawal_period) {

                    // Daily
                    case 'daily':
                        
                        if ($latest->created_at->diffInHours($now) < 24) { // 24 hours = 1 day
                            return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_period_24_hours'));
                        }

                        break;

                    // Weekly
                    case 'weekly':
                        
                        if ($latest->created_at->diffInHours($now) < 168) { // 168 hours = 7 days
                            return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_period_7_days'));
                        }

                        break;

                    // Monthly
                    case 'monthly':
                        
                        if ($latest->created_at->diffInHours($now) < 720) { // 720 hours = 30 days
                            return redirect('seller/withdrawals')->with('message', __('messages.t_cant_withdraw_reason_period_monthly'));
                        }

                        break;
                    
                    default:
                        # code...
                        break;
                }

            }

            // User does not have any withdrawal, let's check minimum withdrawal amount
            if ($this->amount < $settings->min_withdrawal_amount) {

                // Minimum amount error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    "description" => __('messages.t_cant_withdraw_reason_min_amount', ['amount' => money($settings->min_withdrawal_amount, settings('currency')->code, true)]),
                    'icon'        => 'error'
                ]);
                
                // Return
                return;

            }

            // Check if commission on payouts enabled
            if (settings('commission')->commission_from === 'withdrawals') {
                
                // Check commission type
                if (settings('commission')->commission_type === 'fixed') {
                    
                    // Set commission value
                    $commission_value = convertToNumber(settings('commission')->commission_value);

                    // To output value must be a positive number
                    if (convertToNumber($this->amount) - $commission_value <= 0) {
                        
                        // Error
                        $this->notification([
                            'title'       => __('messages.t_error'),
                            'description' => __('messages.t_toast_something_went_wrong'),
                            'icon'        => 'error'
                        ]);

                        return;

                    }

                } else {

                    // Set commission value
                    $commission_value = convertToNumber(settings('commission')->commission_value) * convertToNumber($this->amount) / 100;

                }

            } else {

                // No commission
                $commission_value = 0;

            }

            // Save withdrawal request
            $withdrawal                        = new UserWithdrawalHistory();
            $withdrawal->uid                   = uid();
            $withdrawal->user_id               = auth()->id();
            $withdrawal->gateway_provider_id   = $user_withdrawal_settings->gateway_provider_id;
            $withdrawal->gateway_provider_name = $user_withdrawal_settings->gateway_provider_name;
            $withdrawal->amount                = convertToNumber($this->amount) - convertToNumber($commission_value);
            $withdrawal->fee                   = convertToNumber($commission_value) ? convertToNumber($commission_value) : null;
            $withdrawal->save();

            // Update user balance
            auth()->user()->update([
                'balance_withdrawn' => convertToNumber(auth()->user()->balance_withdrawn) + convertToNumber($this->amount),
                'balance_available' => convertToNumber(auth()->user()->balance_available) - convertToNumber($this->amount),
            ]);

            // Send notification to admin
            Admin::first()->notify( (new AdminPendingWithdrawal($withdrawal))->locale(config('app.locale')) );

            // Send notification to user
            auth()->user()->notify( (new SellerPendingWithdrawal($withdrawal))->locale(config('app.locale')) );
            
            // Success
            return redirect('seller/withdrawals')->with('success', __('messages.t_ur_withdrawal_request_under_review'));

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
    
}