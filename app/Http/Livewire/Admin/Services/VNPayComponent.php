<?php

namespace App\Http\Livewire\Admin\Services;

use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\VNPaySettings;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Services\VNPayValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class VNPayComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $currency;
    public $exchange_rate;
    public $deposit_fee;
    public $tmn_code;
    public $hash_secret;
    public $environment;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get vnpay settings
        $settings = settings('vnpay');

        // Fill default settings
        $this->fill([
            'is_enabled'    => $settings->is_enabled ? 1 : 0,
            'name'          => $settings->name,
            'currency'      => $settings->currency,
            'exchange_rate' => $settings->exchange_rate,
            'deposit_fee'   => $settings->deposit_fee,
            'tmn_code'      => config('vnpay.tmn_code'),
            'hash_secret'   => config('vnpay.hash_secret'),
            'environment'   => config('vnpay.environment')
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_vnpay_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.vnpay', [
            'currencies' => config('money')
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            VNPayValidator::validate($this);

            // Get old settings
            $settings = settings('vnpay');

            // Check if request has a logo file
            if ($this->logo) {
                
                // Upload new logo
                $logo_id = ImageUploader::make($this->logo)
                                        ->folder('services')
                                        ->deleteById($settings->logo_id)
                                        ->handle();

            } else {

                // Use old value
                $logo_id = $settings->logo_id;

            }

            // Save settings
            VNPaySettings::first()->update([
                'is_enabled'    => $this->is_enabled ? 1 : 0,
                'name'          => $this->name,
                'logo_id'       => $logo_id,
                'currency'      => $this->currency,
                'exchange_rate' => $this->exchange_rate,
                'deposit_fee'   => $this->deposit_fee
            ]);

            // Set api url
            if ($this->environment === 'development') {
                $api_url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            } else {
                $api_url = "https://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
            }

            // Set keys
            Config::write('vnpay.tmn_code', $this->tmn_code);
            Config::write('vnpay.hash_secret', $this->hash_secret);
            Config::write('vnpay.environment', $this->environment);
            Config::write('vnpay.api_url', $api_url);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('vnpay', true);

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

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }
    
}
