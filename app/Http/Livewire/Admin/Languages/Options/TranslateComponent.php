<?php

namespace App\Http\Livewire\Admin\Languages\Options;

use Livewire\Component;
use App\Models\Language;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class TranslateComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    public $language;
    public $data;
    public $q;

    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount($id)
    {
        // Clean query
        $this->q        = clean($this->q);
          
        // Get language
        $language       = Language::where('id', $id)->firstOrFail();

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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_translation'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.languages.options.translate', [
            'translation' => $this->translation
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get translation
     *
     * @return object
     */
    public function getTranslationProperty()
    {
        // Get translation
        $items = include lang_path($this->language->language_code . "/messages.php");

        // Check if has a query
        if ($this->q) {

            // Search in array
            $items = array_filter($items, function ($item) {
                if (stripos($item, $this->q) !== false) {
                    return true;
                }
                return false;
            });

        }

        $this->data = $items;

        $page  = $this->page;
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, 40), $items->count(), 40, $page, ['path' => admin_url('languages/translate/' . $this->language->id)]);
   
    }


    /**
     * Check when value updated
     *
     * @param string $value
     * @param string $key
     * @return void
     */
    public function updatedData($value, $key)
    {
        try {
            
            // Get language path
            $path             = lang_path($this->language->language_code . "/messages.php");

            // Set new writer
            $writer           = new \October\Rain\Config\DataWriter\Rewrite;

            // Clear value from any bad characters
            $clean            = str_replace(array('"', ';', '\\'), ' ', $value);

            $remove_new_lines = trim(preg_replace('/\s+/', ' ', str_replace("'", '’', $clean)));

            // Update data
            $writer->toFile($path, [
                $key => $remove_new_lines
            ]);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_language_value_updated_successfully'),
                'icon'        => 'success'
            ]);


        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
}
