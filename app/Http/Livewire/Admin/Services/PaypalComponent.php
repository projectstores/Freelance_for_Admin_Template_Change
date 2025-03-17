<?php

namespace App\Http\Livewire\Admin\Services;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\PayPalSettings;
use App\Utils\Uploader\ImageUploader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use App\Http\Validators\Admin\Services\PaypalValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PaypalComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $currency;
    public $exchange_rate;
    public $deposit_fee;
    public $client_id;
    public $client_secret;
    public $environment;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get paypal settings
        $settings = settings('paypal');

        // Fill default settings
        $this->fill([
            'is_enabled'    => $settings->is_enabled ? 1 : 0,
            'name'          => $settings->name,
            'currency'      => config('paypal.currency'),
            'exchange_rate' => $settings->exchange_rate,
            'deposit_fee'   => $settings->deposit_fee,
            'client_id'     => config('paypal.mode') == 'sandbox' ? config('paypal.sandbox.client_id') : config('paypal.live.client_id'),
            'client_secret' => config('paypal.mode') == 'sandbox' ? config('paypal.sandbox.client_secret') : config('paypal.live.client_secret'),
            'environment'   => config('paypal.mode')
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_paypal'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.paypal', [
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
            PaypalValidator::validate($this);

            // Get old settings
            $settings = settings('paypal');

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
            PayPalSettings::first()->update([
                'is_enabled'    => $this->is_enabled ? 1 : 0,
                'name'          => $this->name,
                'logo_id'       => $logo_id,
                'exchange_rate' => $this->exchange_rate,
                'deposit_fee'   => $this->deposit_fee
            ]);

            // Check mode
            if ($this->environment === "sandbox") {
                
                // Write sandbox config
                Config::write('paypal.mode', 'sandbox');
                Config::write('paypal.sandbox.client_id', $this->client_id);
                Config::write('paypal.sandbox.client_secret', $this->client_secret);

            } else {

                // Write live config
                Config::write('paypal.mode', 'live');
                Config::write('paypal.live.client_id', $this->client_id);
                Config::write('paypal.live.client_secret', $this->client_secret);

            }

            // Update currency
            Config::write('paypal.currency', $this->currency);

            // Clear config
            Artisan::call('config:clear');

            // Update data
            settings('paypal', true);

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
