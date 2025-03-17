<?php

namespace App\Http\Livewire\Admin\Projects\Categories\Options;

use Schema;
use Livewire\Component;
use App\Models\Language;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Models\ProjectCategory;
use App\Utils\Uploader\ImageUploader;
use App\Models\ProjectCategoryTranslation;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Projects\Categories\EditValidator;
use App\Http\Validators\Admin\Projects\Categories\TranslationValidator;

class EditComponent extends Component
{

    use SEOToolsTrait, Actions, WithFileUploads;

    public $translations = [];
    public $translation_language_code;
    public $translation_language_value;
    public $name;
    public $slug;
    public $seo_description;
    public $thumbnail;
    public $ogimage;
    public $category;

    /**
     * Initialize component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get category
        $category = ProjectCategory::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'name'            => $category->name,
            'slug'            => $category->slug,
            'seo_description' => $category->seo_description ? $category->seo_description : null
        ]);

        // Check if category has translations
        if ($category->has('translation')) {
            
            // Loop through translations
            foreach ($category->translation as $trans) {
                
                // Set data
                $data = [
                    'language_code'  => $trans->language_code,
                    'language_value' => $trans->language_value
                ];

                // Add data to translations
                array_push($this->translations, $data);

            }

            // Refresh values
            array_values($this->translations);

        }

        // Set category
        $this->category = $category;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_projects_category'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.categories.options.edit', [
            'languages' => $this->languages
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get supported languages
     *
     * @return object
     */
    public function getLanguagesProperty()
    {
        return Language::whereIsActive(true)->where('language_code', '!=', settings('general')->default_language)->orderBy('name', 'asc')->get();
    }


    /**
     * Add category in other language
     *
     * @return void
     */
    public function addTranslation()
    {
        try {

            // Validate form
            TranslationValidator::validate($this);

            // Check if already set a category in this language
            if (array_search($this->translation_language_code, array_column($this->translations, 'language_code'))) {
            
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_project_cat_trans_lang_key_exists_error'),
                    'icon'        => 'error'
                ]);

                // Reload select2
                $this->dispatchBrowserEvent('pharaonic.select2.load', [
                    'target'    => '.select2',
                    'component' => $this->id
                ]);

                return;

            }

            // Add catgeory in this language
            array_push($this->translations, [
                'language_code'  => strtolower($this->translation_language_code),
                'language_value' => $this->translation_language_value,
            ]);

            // Refresh values
            array_keys($this->translations);

            // Reset language value
            $this->reset('translation_language_value');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2',
                'component' => $this->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2',
                'component' => $this->id
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2',
                'component' => $this->id
            ]);

            throw $th;

        }
    }


    /**
     * Edit translation
     *
     * @param int $index
     * @return void
     */
    public function deleteTranslation($index)
    {
        // Check if key exists
        if (array_key_exists($index, $this->translations)) {
            
            // delete
            unset($this->translations[$index]);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } else {

            // Not found
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }

        // Reload select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2',
            'component' => $this->id
        ]);
    }


    /**
     * Update subcategory
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Disable foreign key check
            Schema::disableForeignKeyConstraints();

            // Upload thumbnail
            if ($this->thumbnail) {
                $thumbnail_id = ImageUploader::make($this->thumbnail)
                                        ->extension('jpg')
                                        ->folder('projects/categories/thumbnails')
                                        ->deleteById($this->category->thumbnail_id)
                                        ->handle();
            } else {
                $thumbnail_id = $this->category->thumbnail_id;
            }

            // Upload ogimage
            if ($this->ogimage) {
                $ogimage_id = ImageUploader::make($this->ogimage)
                                        ->extension('jpg')
                                        ->folder('projects/categories/ogimages')
                                        ->deleteById($this->category->ogimage_id)
                                        ->handle();
            } else {
                $ogimage_id = $this->category->ogimage_id;
            }

            // Update category
            $this->category->name            = $this->name;
            $this->category->slug            = strtolower($this->slug);
            $this->category->seo_description = $this->seo_description;
            $this->category->thumbnail_id    = $thumbnail_id;
            $this->category->ogimage_id      = $ogimage_id;
            $this->category->save();

            // Check if category has translations
            if (count($this->translations)) {
                
                // Delete old translations
                foreach ($this->category->translation as $trans) {
                    $trans->delete();
                }

                // Loop though translations
                foreach ($this->translations as $key => $value) {
                    if (isset($value['language_code']) && isset($value['language_value'])) {
                        
                        // Create new translation
                        $translation                       = new ProjectCategoryTranslation();
                        $translation->projects_category_id = $this->category->id;
                        $translation->language_code        = strtolower($value['language_code']);
                        $translation->language_value       = $value['language_value'];
                        $translation->save();

                    }
                }

            }

            // Enable foreign key check
            Schema::enableForeignKeyConstraints();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2',
                'component' => $this->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2',
                'component' => $this->id
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2',
                'component' => $this->id
            ]);

            throw $th;

        }
    }
    
}
