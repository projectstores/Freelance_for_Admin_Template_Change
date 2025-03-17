<?php

namespace App\Http\Livewire\Admin\Services;

use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\EpointSettings;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Services\EpointValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EpointComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $currency;
    public $exchange_rate;
    public $deposit_fee;
    public $public_key;
    public $private_key;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get epoint settings
        $settings = settings('epoint');

        // Fill default settings
        $this->fill([
            'is_enabled'    => $settings->is_enabled ? 1 : 0,
            'name'          => $settings->name,
            'currency'      => $settings->currency,
            'exchange_rate' => $settings->exchange_rate,
            'deposit_fee'   => $settings->deposit_fee,
            'public_key'    => config('epoint.public_key'),
            'private_key'   => config('epoint.private_key')
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
        $this->seo()->setTitle( setSeoTitle("Epoint Settings", true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.epoint')->extends('livewire.admin.layout.app')->section('content');
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
            EpointValidator::validate($this);

            // Get old settings
            $settings = EpointSettings::first();

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

            // Update settings
            $settings->is_enabled    = $this->is_enabled ? 1 : 0;
            $settings->name          = $this->name;
            $settings->currency      = $this->currency;
            $settings->exchange_rate = $this->exchange_rate;
            $settings->deposit_fee   = $this->deposit_fee;
            if ($logo_id) {
                $settings->logo_id   = $logo_id;
            }
            $settings->save();

            // Set keys
            Config::write('epoint.public_key', $this->public_key);
            Config::write('epoint.private_key', $this->private_key);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('epoint', true);

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
