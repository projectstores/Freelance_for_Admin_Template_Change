<?php

namespace App\Http\Livewire\Admin\Services;

use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\PaymobSettings;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Services\PaymobValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PaymobComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $currency;
    public $exchange_rate;
    public $deposit_fee;
    public $api_key;       
    public $hmac_hash;     
    public $merchant_id;   
    public $iframe_id;     
    public $integration_id;
    public $environment;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get paymob settings
        $settings = settings('paymob');

        // Fill default settings
        $this->fill([
            'is_enabled'     => $settings->is_enabled ? 1 : 0,
            'name'           => $settings->name,
            'currency'       => $settings->currency,
            'exchange_rate'  => $settings->exchange_rate,
            'deposit_fee'    => $settings->deposit_fee,
            'api_key'        => config('paymob.api_key'),
            'hmac_hash'      => config('paymob.hmac_hash'),
            'iframe_id'      => config('paymob.iframe_id'),
            'merchant_id'    => config('paymob.merchant_id'),
            'integration_id' => config('paymob.integration_id'),
            'environment'    => config('paymob.environment'),
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_paymob_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.paymob', [
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
            PaymobValidator::validate($this);

            // Get old settings
            $settings = settings('paymob');

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
            PaymobSettings::first()->update([
                'is_enabled'    => $this->is_enabled ? 1 : 0,
                'name'          => $this->name,
                'logo_id'       => $logo_id,
                'currency'      => $this->currency,
                'exchange_rate' => $this->exchange_rate,
                'deposit_fee'   => $this->deposit_fee
            ]);

            // Set keys
            Config::write('paymob.api_key', $this->api_key);
            Config::write('paymob.hmac_hash', $this->hmac_hash);
            Config::write('paymob.merchant_id', $this->merchant_id);
            Config::write('paymob.iframe_id', $this->iframe_id);
            Config::write('paymob.integration_id', $this->integration_id);
            Config::write('paymob.environment', $this->environment);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('paymob', true);

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
