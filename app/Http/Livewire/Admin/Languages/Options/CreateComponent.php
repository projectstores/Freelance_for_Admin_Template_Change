<?php

namespace App\Http\Livewire\Admin\Languages\Options;

use Livewire\Component;
use App\Models\Language;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\File;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Languages\CreateValidator;

class CreateComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $language_code;
    public $country_code;
    public $name;
    public $is_active = true;
    public $force_rtl = false;
    public $frontend_timing_locale;
    public $backend_timing_locale;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_language'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.languages.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new language
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Check if directory exists
            if (!File::exists(lang_path(strtolower($this->language_code)))) {
               
                // Create new folder
                File::makeDirectory(lang_path(strtolower($this->language_code)));
    
                // Copy translation file to new folder
                File::copy(lang_path('en/messages.php'), lang_path(strtolower($this->language_code) . "/messages.php"));

            }

            // Create new language
            $language                         = new Language();
            $language->language_code          = strtolower($this->language_code);
            $language->country_code           = strtolower($this->country_code);
            $language->name                   = $this->name;
            $language->is_active              = $this->is_active ? 1 : 0;
            $language->force_rtl              = $this->force_rtl ? 1 : 0;
            $language->frontend_timing_locale = $this->frontend_timing_locale;
            $language->backend_timing_locale  = $this->backend_timing_locale;
            $language->save();

            // Reset form
            $this->reset();

            // Refresh supported langs
            supported_languages(true);

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
