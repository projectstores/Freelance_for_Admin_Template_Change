<?php

namespace App\Http\Livewire\Admin\Categories\Options;

use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Categories\CreateValidator;
use Illuminate\Support\Str;

class CreateComponent extends Component
{

    use WithFileUploads, SEOToolsTrait, Actions;

    public $name;
    public $slug;
    public $description;
    public $icon;
    public $image;
    public $is_visible;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_category'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.categories.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new category
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Upload categorory icon
            if ($this->icon) {
                $icon_id = ImageUploader::make($this->icon)->resize(100, 100)->folder('categories')->handle();
            } else {
                $icon_id = null;
            }

            // Upload category image
            if ($this->image) {
                $image_id = ImageUploader::make($this->image)->resize(800)->folder('categories')->handle();
            } else {
                $image_id = null;
            }

            // Save category
            $category              = new Category();
            $category->uid         = uid();
            $category->name        = $this->name;
            $category->slug        = Str::slug($this->slug);
            $category->description = $this->description ? $this->description : null;
            $category->icon_id     = $icon_id;
            $category->image_id    = $image_id;
            $category->is_visible  = $this->is_visible ? true : false;
            $category->save();

            // Reset form
            $this->reset();

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
