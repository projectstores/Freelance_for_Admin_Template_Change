<?php

namespace App\Http\Livewire\Admin\Settings;

use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsSecurity;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Settings\SecurityValidator;

class SecurityComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $is_social_media_accounts;
    public $debug;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('security');

        // Fill default settings
        $this->fill([
            'is_social_media_accounts' => $settings->is_social_media_accounts ? 1 : 0,
            'debug'                    => config('app.debug') ? 1 : 0
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_security_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.security')->extends('livewire.admin.layout.app')->section('content');
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
            SecurityValidator::validate($this);

            SettingsSecurity::first()->update([
                'is_social_media_accounts' => $this->is_social_media_accounts ? 1 : 0
            ]);

            // Write debug mode status
            Config::write('app.debug', $this->debug);

            // Clear cache
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
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
    
}
