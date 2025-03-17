<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsCommission;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Settings\CommissionValidator;

class CommissionComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $enable_taxes;
    public $tax_type;
    public $tax_value;
    public $commission_from;
    public $commission_type;
    public $commission_value;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('commission');

        // Fill default settings
        $this->fill([
            'enable_taxes'     => $settings->enable_taxes ? 1 : 0,
            'tax_type'         => $settings->tax_type,
            'tax_value'        => $settings->tax_value,
            'commission_from'  => $settings->commission_from,
            'commission_type'  => $settings->commission_type,
            'commission_value' => $settings->commission_value
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_commission_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.commission')->extends('livewire.admin.layout.app')->section('content');
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
            CommissionValidator::validate($this);

            // Update settings
            SettingsCommission::where('id', 1)->update([
                'enable_taxes'     => $this->enable_taxes ? 1 : 0,
                'tax_type'         => $this->tax_type,
                'tax_value'        => $this->tax_value,
                'commission_from'  => $this->commission_from,
                'commission_type'  => $this->commission_type,
                'commission_value' => $this->commission_value
            ]);

            // Refresh data from cache
            settings('commission', true);

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
