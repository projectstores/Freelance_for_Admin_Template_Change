<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Language;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\SettingsGeneral;
use App\Utils\Uploader\ImageUploader;
use Illuminate\Support\Facades\Config;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Settings\GeneralValidator;

class GeneralComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $title;
    public $subtitle;
    public $separator;
    public $logo;
    public $logo_dark;
    public $favicon;
    public $announce_link;
    public $announce_text;
    public $is_language_switcher;
    public $default_language;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('general');

        // Fill default settings
        $this->fill([
            'title'                => $settings->title,
            'subtitle'             => $settings->subtitle,
            'separator'            => $settings->separator,
            'announce_link'        => $settings->header_announce_link,
            'announce_text'        => $settings->header_announce_text,
            'is_language_switcher' => $settings->is_language_switcher,
            'default_language'     => $settings->default_language
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_general_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.general', [
            'languages' => $this->languages
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get available languages
     *
     * @return object
     */
    public function getLanguagesProperty()
    {
        return Language::where('is_active', true)->orderBy('name', 'desc')->get();
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
            GeneralValidator::validate($this);

            // Get settings
            $settings = SettingsGeneral::first();

            // Check if request has logo
            if ($this->logo) {
                $logo_id = ImageUploader::make($this->logo)
                                        ->extension('png')
                                        ->folder('site/logo')
                                        ->deleteById($settings->logo_id)
                                        ->handle();
            } else {
                $logo_id = $settings->logo_id;
            }

            // Check if request has logo dark
            if ($this->logo_dark) {
                $logo_dark_id = ImageUploader::make($this->logo_dark)
                                        ->folder('site/logo')
                                        ->extension('png')
                                        ->deleteById($settings->logo_dark__id)
                                        ->handle();
            } else {
                $logo_dark_id = $settings->logo_dark_id;
            }

            // Check if request has favicon
            if ($this->favicon) {
                $favicon_id = ImageUploader::make($this->favicon)
                                        ->folder('site/favicon')
                                        ->extension('png')
                                        ->deleteById($settings->favicon_id)
                                        ->handle();
            } else {
                $favicon_id = $settings->favicon_id;
            }

            // Save settings
            $settings->title                = $this->title;
            $settings->subtitle             = $this->subtitle;
            $settings->separator            = $this->separator;
            $settings->header_announce_text = $this->announce_text ? $this->announce_text : null;
            $settings->header_announce_link = $this->announce_link ? $this->announce_link : null;
            $settings->is_language_switcher = $this->is_language_switcher;
            $settings->default_language     = $this->default_language;

            // Save logo
            if($logo_id) {
                $settings->logo_id              = $logo_id;
            }

            // Save dark logo
            if($logo_dark_id) {
                $settings->logo_dark_id              = $logo_dark_id;
            }

            // Save favicon
            if($favicon_id) {
                $settings->favicon_id              = $favicon_id;
            }

            $settings->save();

            // Set app name
            Config::write('app.name', $this->title);
            Config::write('app.url', url('/'));
            Config::write('app.locale', $this->default_language);
            Config::write('app.fallback_locale', $this->default_language);

            // Refresh data from cache
            settings('general', true);

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
