<?php

namespace App\Http\Livewire\Admin\Services;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsSecurity;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Artisan;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Services\RecaptchaValidator;

class RecaptchaComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $site_key;
    public $secret_key;
    public $is_enabled;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Fill default settings
        $this->fill([
            'site_key'   => config('recaptcha.site_key'),
            'secret_key' => config('recaptcha.secret_key'),
            'is_enabled' => settings('security')->is_recaptcha ? 1 : 0
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_recaptcha'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.recaptcha')->extends('livewire.admin.layout.app')->section('content');
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
            RecaptchaValidator::validate($this);

            // Update currency
            Config::write('recaptcha.site_key', $this->site_key);
            Config::write('recaptcha.secret_key', $this->secret_key);

            // Update settings
            SettingsSecurity::first()->update([
                'is_recaptcha' => $this->is_enabled ? 1 : 0
            ]);

            // Clear security settings cache
            settings('security', true);

            // Clear config
            Artisan::call('config:clear');

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
