<?php

namespace App\Http\Livewire\Admin\Services;

use App\Http\Validators\Admin\Services\NowpaymentsValidator;
use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\YoucanpaySettings;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Services\YoucanpayValidator;
use App\Models\NowpaymentsSettings;

class NowpaymentsComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $currency;
    public $crypto_currency;
    public $exchange_rate;
    public $deposit_fee;
    public $api_key;
    public $env;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get nowpayments settings
        $settings = settings('nowpayments');

        // Fill default settings
        $this->fill([
            'is_enabled'      => $settings->is_enabled ? 1 : 0,
            'name'            => $settings->name,
            'currency'        => $settings->currency,
            'crypto_currency' => $settings->crypto_currency,
            'exchange_rate'   => $settings->exchange_rate,
            'deposit_fee'     => $settings->deposit_fee,
            'api_key'         => config('nowpayments.api_key'),
            'env'             => config('nowpayments.live') ? 'production' : 'sandbox'
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
        $this->seo()->setTitle( setSeoTitle("NowPayments.io Settings", true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.nowpayments')->extends('livewire.admin.layout.app')->section('content');
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
            NowpaymentsValidator::validate($this);

            // Get old settings
            $settings = settings('nowpayments');

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
            NowpaymentsSettings::first()->update([
                'is_enabled'      => $this->is_enabled ? 1 : 0,
                'name'            => $this->name,
                'logo_id'         => $logo_id,
                'currency'        => $this->currency,
                'crypto_currency' => $this->crypto_currency,
                'exchange_rate'   => $this->exchange_rate,
                'deposit_fee'     => $this->deposit_fee
            ]);

            // Set api key
            Config::write('nowpayments.api_key', $this->api_key);

            // Set env
            if ($this->env === 'production') {
                
                // Set live settings
                Config::write('nowpayments.live', 1);
                Config::write('nowpayments.payment_url', 'https://api.nowpayments.io/v1/payment');

            } else {

                // Set sandbox settings
                Config::write('nowpayments.live', 0);
                Config::write('nowpayments.payment_url', 'https://api-sandbox.nowpayments.io/v1/payment');

            }

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('nowpayments', true);

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
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
    
}
