<?php

namespace App\Http\Livewire\Admin\Projects\Categories;

use App\Models\Project;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ProjectSkill;
use App\Models\ProjectCategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CategoriesComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $alternative_category;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_projects_categories'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.categories.categories', [
            'categories' => $this->categories
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get projects categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return ProjectCategory::latest()->paginate(40);
    }
    

    /**
     * Delete category
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get category
            $category = ProjectCategory::where('id', $id)->firstOrFail();

            // Check if this category has projects
            if ($category->projects()->count()) {
                
                // Check if an alternative category selected
                if (!$this->alternative_category) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_pls_select_altr_project_category'),
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Check if this category exists
                if (!ProjectCategory::where('id', $this->alternative_category)->where('id', '!=', $category->id)->first()) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => __('messages.t_selected_altern_project_cat_not_found'),
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Move projects 
                Project::where('category_id', $category->id)->update([
                    'category_id' => $this->alternative_category
                ]);

                // Update skills
                ProjectSkill::where('category_id', $id)->update([
                    'category_id' => $this->alternative_category
                ]);

            }

            // Delete translations
            if ($category->translation()->count()) {
                foreach ($category->translation as $trans) {
                    $trans->delete();
                }
            }

            // Now delete this category
            $category->delete();

            // Reset alternative category
            $this->reset('alternative_category');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-delete-category-container');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

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