<?php

namespace App\Http\Livewire\Admin\Projects\Skills\Options;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\ProjectSkill;
use Livewire\WithFileUploads;
use App\Models\ProjectCategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Projects\Skills\CreateValidator;

class CreateComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;

    public $name;
    public $slug;
    public $category_id;


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_skills'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.skills.options.create', [
            'categories' => $this->categories
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return ProjectCategory::orderBy('name', 'asc')->with('translation')->get();
    }


    /**
     * Create new skills
     *
     * @return void
     */
    public function create()
    {
        try {
            
            // Validate form
            CreateValidator::validate($this);

            // Create new skill
            $skill              = new ProjectSkill();
            $skill->uid         = uid();
            $skill->name        = $this->name;
            $skill->slug        = Str::slug($this->slug);
            $skill->category_id = $this->category_id;
            $skill->save();

            // Reset form
            $this->reset(['name', 'slug']);

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
