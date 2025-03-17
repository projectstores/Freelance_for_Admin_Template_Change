<?php

namespace App\Http\Livewire\Admin\Services;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Models\OfflinePaymentSettings;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Services\OfflineValidator;

class OfflineComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;
    
    public $is_enabled;
    public $name;
    public $logo;
    public $exchange_rate;
    public $deposit_fee;
    public $details;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get offline payment details
        $settings = settings('offline_payment');

        // Fill default settings
        $this->fill([
            'is_enabled'    => $settings->is_enabled ? 1 : 0,
            'name'          => $settings->name,
            'exchange_rate' => $settings->exchange_rate,
            'deposit_fee'   => $settings->deposit_fee,
            'details'       => $settings->details,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_offline_payment_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.offline')->extends('livewire.admin.layout.app')->section('content');
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
            OfflineValidator::validate($this);

            // Get old settings
            $settings = settings('offline_payment');

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
            OfflinePaymentSettings::first()->update([
                'is_enabled'    => $this->is_enabled ? 1 : 0,
                'name'          => $this->name,
                'logo_id'       => $logo_id,
                'details'       => $this->details,
                'exchange_rate' => $this->exchange_rate,
                'deposit_fee'   => $this->deposit_fee
            ]);

            // Update cache
            settings('offline_payment', true);

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
