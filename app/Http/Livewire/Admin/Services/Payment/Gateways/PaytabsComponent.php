<?php

namespace App\Http\Livewire\Admin\Services\Payment\Gateways;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Models\AutomaticPaymentGateway;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Services\Payment\UpdateValidator;
use Config;

class PaytabsComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;

    public $name;
    public $slug;
    public $currency;
    public $country;
    public $exchange_rate;
    public $deposit_min_amount;
    public $deposit_max_amount;
    public $is_active;
    public $logo;

    // Fee settings
    public $deposit_fee_percentage;
    public $deposit_fee_fixed;
    public $gigs_checkout_fee_percentage;
    public $gigs_checkout_fee_fixed;
    public $projects_checkout_fee_percentage;
    public $projects_checkout_fee_fixed;
    public $bids_checkout_fee_percentage;
    public $bids_checkout_fee_fixed;

    // Payment gateway settings
    public $profile_id;
    public $server_key;
    public $region;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        
        // Get slug
        $payment_slug = request()->segment(count(request()->segments()));

        // Get settings
        $settings     = payment_gateway($payment_slug);

        // Check if has settings
        if ($settings && $settings->percentage_fee && $settings->settings && $settings->fixed_fee) {
            
            // Get percentage fee
            $fee_percentage = $settings->percentage_fee;

            // Get fixed fee
            $fee_fixed      = $settings->fixed_fee;

            // Get api settings
            $api_settings   = $settings->settings;

            // Fill form
            $this->fill([
                'name'                             => $settings?->name,
                'slug'                             => $settings?->slug,
                'country'                          => $settings?->country,
                'exchange_rate'                    => $settings?->exchange_rate,
                'deposit_min_amount'               => $settings?->deposit_min_amount,
                'deposit_max_amount'               => $settings?->deposit_max_amount,
                'deposit_fee_percentage'           => isset($fee_percentage['deposit']) ? $fee_percentage['deposit'] : null,
                'deposit_fee_fixed'                => isset($fee_fixed['deposit']) ? $fee_fixed['deposit'] : null,
                'gigs_checkout_fee_percentage'     => isset($fee_percentage['gigs']) ? $fee_percentage['gigs'] : null,
                'gigs_checkout_fee_fixed'          => isset($fee_fixed['gigs']) ? $fee_fixed['gigs'] : null,
                'projects_checkout_fee_percentage' => isset($fee_percentage['projects']) ? $fee_percentage['projects'] : null,
                'projects_checkout_fee_fixed'      => isset($fee_fixed['projects']) ? $fee_fixed['projects'] : null,
                'bids_checkout_fee_percentage'     => isset($fee_percentage['bids']) ? $fee_percentage['bids'] : null,
                'bids_checkout_fee_fixed'          => isset($fee_fixed['bids']) ? $fee_fixed['bids'] : null,
                'is_active'                        => $settings?->is_active ? 1 : 0,

            ]);

            // Fill api settings
            $this->fill([
                'profile_id'    => config('paytabs.profile_id'),
                'server_key'    => config('paytabs.server_key'),
                'region'        => config('paytabs.region'),
                'currency'      => config('paytabs.currency')
            ]);

        } else {

            // Not configured yet
            return redirect(admin_url('services/payment'));

        }


    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle($this->name, true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.payment.gateways.' . $this->slug, [
            'currencies' => config('money')
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update payment gateway
     *
     * @return mixed
     */
    public function update() 
    {
        try {
            
            // Validate form
            UpdateValidator::validate($this);

            // Get old settings
            $settings = payment_gateway($this->slug);

            // Check if a new logo exists in the request
            if ($this->logo) {
                
                // Upload new logo
                $logo_id = ImageUploader::make($this->logo)
                                        ->folder('services')
                                        ->deleteById($settings->logo_id)
                                        ->handle();

            } else {

                // Use old logo
                $logo_id = $settings->logo_id;

            }

            // Set fixed fee
            $fee_fixed      = [
                'deposit'  => $this->deposit_fee_fixed,
                'gigs'     => $this->gigs_checkout_fee_fixed,
                'projects' => $this->projects_checkout_fee_fixed,
                'bids'     => $this->bids_checkout_fee_fixed
            ];

            // Set percentage fee
            $fee_percentage = [
                'deposit'  => $this->deposit_fee_percentage,
                'gigs'     => $this->gigs_checkout_fee_percentage,
                'projects' => $this->projects_checkout_fee_percentage,
                'bids'     => $this->bids_checkout_fee_percentage
            ];

            // Set api settings
            $api_settings   = [
                'profile_id' => $this->profile_id,
                'server_key' => $this->server_key,
                'region'     => $this->region
            ];

            // Update payment gateway
            AutomaticPaymentGateway::where('slug', $this->slug)->update([
                'name'               => $this->name,
                'logo_id'            => $logo_id,
                'exchange_rate'      => $this->exchange_rate,
                'fixed_fee'          => $fee_fixed,
                'percentage_fee'     => $fee_percentage,
                'deposit_min_amount' => $this->deposit_min_amount,
                'deposit_max_amount' => $this->deposit_max_amount,
                'settings'           => $api_settings,
                'is_active'          => $this->is_active ? 1 : 0
            ]);

            // Set keys
            Config::write('paytabs.profile_id', $this->profile_id);
            Config::write('paytabs.server_key', $this->server_key);
            Config::write('paytabs.currency', $this->currency);
            Config::write('paytabs.region', $this->region);

            // Update cache
            payment_gateway($this->slug, true);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

        } catch (\Throwable $th) {
            
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
    
}
