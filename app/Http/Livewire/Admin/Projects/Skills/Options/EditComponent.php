<?php

namespace App\Http\Livewire\Admin\Projects\Skills\Options;

use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\ProjectSkill;
use App\Models\ProjectCategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Projects\Skills\EditValidator;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $name;
    public $slug;
    public $category_id;
    public $skill;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount($id)
    {
        // Get skill
        $skill = ProjectSkill::where('uid', $id)->firstOrFail();

        // fill form
        $this->fill([
            'name'        => $skill->name,
            'slug'        => $skill->slug,
            'category_id' => $skill->category_id
        ]);

        // Set skill
        $this->skill = $skill;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_skill'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.skills.options.edit', [
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
     * Update skill
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);
            
            // Update skill
            $this->skill->name        = $this->name;
            $this->skill->slug        = Str::slug($this->slug);
            $this->skill->category_id = $this->category_id;
            $this->skill->save();

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
