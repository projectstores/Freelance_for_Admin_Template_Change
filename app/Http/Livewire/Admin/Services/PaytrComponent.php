<?php

namespace App\Http\Livewire\Admin\Services;

use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\PaytrSettings;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Services\PaytrValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PaytrComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $currency;
    public $exchange_rate;
    public $deposit_fee;
    public $merchant_id;
    public $merchant_key;
    public $merchant_salt;
    public $environment;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get paytr settings
        $settings = settings('paytr');

        // Fill default settings
        $this->fill([
            'is_enabled'    => $settings->is_enabled ? 1 : 0,
            'name'          => $settings->name,
            'currency'      => $settings->currency,
            'exchange_rate' => $settings->exchange_rate,
            'deposit_fee'   => $settings->deposit_fee,
            'merchant_id'   => config('paytr.merchant_id'),
            'merchant_key'  => config('paytr.merchant_key'),
            'merchant_salt' => config('paytr.merchant_salt'),
            'environment'   => config('paytr.environment')
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_paytr_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.paytr')->extends('livewire.admin.layout.app')->section('content');
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
            PaytrValidator::validate($this);

            // Get old settings
            $settings = settings('paytr');

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
            PaytrSettings::first()->update([
                'is_enabled'    => $this->is_enabled ? 1 : 0,
                'name'          => $this->name,
                'logo_id'       => $logo_id,
                'currency'      => $this->currency,
                'exchange_rate' => $this->exchange_rate,
                'deposit_fee'   => $this->deposit_fee
            ]);

            // Set keys
            Config::write('paytr.merchant_id', $this->merchant_id);
            Config::write('paytr.merchant_key', $this->merchant_key);
            Config::write('paytr.merchant_salt', $this->merchant_salt);
            Config::write('paytr.environment', $this->environment);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('paytr', true);

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
