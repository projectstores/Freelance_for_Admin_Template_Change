<?php

namespace App\Http\Livewire\Admin\Services;

use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\FlutterwaveSettings;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Services\FlutterwaveValidator;

class FlutterwaveComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $currency;
    public $exchange_rate;
    public $deposit_fee;
    public $public_key;
    public $secret_key;
    public $encryption_key;
    public $environment;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get flutterwave settings
        $settings = settings('flutterwave');

        // Fill default settings
        $this->fill([
            'is_enabled'     => $settings->is_enabled ? 1 : 0,
            'name'           => $settings->name,
            'currency'       => $settings->currency,
            'exchange_rate'  => $settings->exchange_rate,
            'deposit_fee'    => $settings->deposit_fee,
            'public_key'     => config('flutterwave.public_key'),
            'secret_key'     => config('flutterwave.secret_key'),
            'encryption_key' => config('flutterwave.encryption_key'),
            'environment'    => config('flutterwave.environment')
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_flutterwave_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.flutterwave', [
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
            FlutterwaveValidator::validate($this);

            // Get old settings
            $settings = settings('flutterwave');

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
            FlutterwaveSettings::first()->update([
                'is_enabled'    => $this->is_enabled ? 1 : 0,
                'name'          => $this->name,
                'logo_id'       => $logo_id,
                'currency'      => $this->currency,
                'exchange_rate' => $this->exchange_rate,
                'deposit_fee'   => $this->deposit_fee
            ]);

            // Set keys
            Config::write('flutterwave.public_key', $this->public_key);
            Config::write('flutterwave.secret_key', $this->secret_key);
            Config::write('flutterwave.encryption_key', $this->encryption_key);
            Config::write('flutterwave.environment', $this->environment);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('flutterwave', true);

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
