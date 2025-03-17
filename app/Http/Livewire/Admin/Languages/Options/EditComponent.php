<?php

namespace App\Http\Livewire\Admin\Languages\Options;

use Livewire\Component;
use App\Models\Language;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Languages\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $country_code;
    public $name;
    public $is_active;
    public $force_rtl;
    public $language;
    public $frontend_timing_locale;
    public $backend_timing_locale;

    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount($id)
    {
        // Get language
        $language = Language::where('id', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'country_code'           => $language->country_code,
            'name'                   => $language->name,
            'is_active'              => $language->is_active ? 1 : 0,
            'force_rtl'              => $language->force_rtl ? 1 : 0,
            'frontend_timing_locale' => $language->frontend_timing_locale,
            'backend_timing_locale'  => $language->backend_timing_locale,
        ]);

        // Set language
        $this->language = $language;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_language'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.languages.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update language
     *
     * @return void
     */
    public function update()
    {
        try {

            // Get language
            $language = Language::where('id', $this->language->id)->firstOrFail();

            // Validate form
            EditValidator::validate($this);

            // Update
            $language->name                   = $this->name;
            $language->country_code           = $this->country_code;
            $language->is_active              = $this->is_active ? 1 : 0;
            $language->force_rtl              = $this->force_rtl ? 1 : 0;
            $language->frontend_timing_locale = $this->frontend_timing_locale;
            $language->backend_timing_locale  = $this->backend_timing_locale;
            $language->save();

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
