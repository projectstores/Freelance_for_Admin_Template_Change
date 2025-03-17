<?php

namespace App\Http\Livewire\Admin\Projects\Skills;

use App\Models\Project;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ProjectSkill;
use App\Models\ProjectCategory;
use App\Models\ProjectRequiredSkill;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SkillsComponent extends Component
{
    use SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_skills'), true) );
        $this->seo()->setDescription( settings('seo')->description );
        
        return view('livewire.admin.projects.skills.skills', [
            'skills' => $this->skills
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get projects skills
     *
     * @return object
     */
    public function getSkillsProperty()
    {
        return ProjectSkill::with('category')->latest('id')->paginate(40);
    }
    

    /**
     * Delete skill
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get skill
            $skill = ProjectSkill::where('id', $id)->firstOrFail();

            // Delete this skill from required skills in projects
            ProjectRequiredSkill::where('skill_id', $skill->id)->delete();

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-delete-skill-container-' . $skill->uid);

            // Delete this skill
            $skill->delete();

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