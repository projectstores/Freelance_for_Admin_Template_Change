<?php

namespace App\Http\Livewire\Admin\Languages;

use Livewire\Component;
use App\Models\Language;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class LanguagesComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_languages'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.languages.languages', [
            'languages' => $this->languages
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of languages
     *
     * @return object
     */
    public function getLanguagesProperty()
    {
        return Language::orderBy('name', 'asc')->paginate(42);
    }


    /**
     * Delete page
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get language
        $language = Language::where('id', $id)->firstOrFail();

        // Check if this language is default
        if (settings('general')->default_language == $language->language_code) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_this_language_is_default_for_ur_website'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Get language forlder
        $folder = lang_path($language->language_code);

        // Delete folder if exists
        if (File::isDirectory($folder)) {
            
            // Delete folder
            File::delete($folder);

        }

        // Delete language
        $language->delete();

        // Refresh supported langs
        supported_languages(true);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}
