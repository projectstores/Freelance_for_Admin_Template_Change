<?php

namespace App\Http\Livewire\Admin\Subcategories\Options;

use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use App\Models\Subcategory;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Subcategories\EditValidator;
use Illuminate\Support\Str;

class EditComponent extends Component
{

    use WithFileUploads, SEOToolsTrait, Actions;

    public $name;
    public $slug;
    public $description;
    public $icon;
    public $image;
    public $parent_id;
    public $subcategory;

    /**
     * Initialize component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get subcategory
        $subcategory = Subcategory::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'name'        => $subcategory->name,
            'slug'        => $subcategory->slug,
            'description' => $subcategory->description,
            'parent_id'   => $subcategory->parent_id,
        ]);

        // Set subcategory
        $this->subcategory = $subcategory;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_subcategory'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.subcategories.options.edit', [
            'categories' => $this->categories
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get all parent categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::orderBy('name')->get();
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

            // Upload categorory icon
            if ($this->icon) {
                $icon_id = ImageUploader::make($this->icon)
                                        ->deleteById($this->subcategory->icon_id)
                                        ->resize(100, 100)
                                        ->folder('subcategories')
                                        ->handle();
            } else {
                $icon_id = $this->subcategory->icon_id;
            }

            // Upload subcategory image
            if ($this->image) {
                $image_id = ImageUploader::make($this->image)
                                        ->deleteById($this->subcategory->image_id)
                                        ->resize(800)
                                        ->folder('subcategories')
                                        ->handle();
            } else {
                $image_id = $this->subcategory->image_id;
            }

            // Update subcategory
            $this->subcategory->name        = $this->name;
            $this->subcategory->slug        = Str::slug($this->slug);
            $this->subcategory->description = $this->description ? $this->description : null;
            $this->subcategory->icon_id     = $icon_id;
            $this->subcategory->image_id    = $image_id;
            $this->subcategory->parent_id   = $this->parent_id;
            $this->subcategory->save();

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
