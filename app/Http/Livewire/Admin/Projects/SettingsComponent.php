<?php

namespace App\Http\Livewire\Admin\Projects;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ProjectSettings;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Projects\SettingsValidator;

class SettingsComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $is_enabled;
    public $auto_approve_projects;
    public $auto_approve_bids;
    public $is_free_posting;
    public $is_premium_posting;
    public $is_premium_bidding;
    public $commission_type;
    public $commission_from_freelancer;
    public $commission_from_publisher;
    public $who_can_post;
    public $max_skills;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('projects');

        // Fill default settings
        $this->fill([
            'is_enabled'                 => $settings->is_enabled ? 1 : 0,
            'auto_approve_projects'      => $settings->auto_approve_projects ? 1 : 0,
            'auto_approve_bids'          => $settings->auto_approve_bids ? 1 : 0,
            'is_free_posting'            => $settings->is_free_posting ? 1 : 0,
            'is_premium_posting'         => $settings->is_premium_posting ? 1 : 0,
            'is_premium_bidding'         => $settings->is_premium_bidding ? 1 : 0,
            'commission_type'            => $settings->commission_type,
            'commission_from_freelancer' => $settings->commission_from_freelancer,
            'commission_from_publisher'  => $settings->commission_from_publisher,
            'who_can_post'               => $settings->who_can_post,
            'max_skills'                 => $settings->max_skills
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_projects_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.projects.settings')->extends('livewire.admin.layout.app')->section('content');
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
            SettingsValidator::validate($this);
            
            // Update settings
            ProjectSettings::where('id', 1)->update([
                'is_enabled'                 => $this->is_enabled ? 1 : 0,
                'auto_approve_projects'      => $this->auto_approve_projects ? 1 : 0,
                'auto_approve_bids'          => $this->auto_approve_bids ? 1 : 0,
                'is_free_posting'            => $this->is_free_posting ? 1 : 0,
                'is_premium_posting'         => $this->is_premium_posting ? 1 : 0,
                'is_premium_bidding'         => $this->is_premium_bidding ? 1 : 0,
                'commission_type'            => $this->commission_type,
                'commission_from_freelancer' => $this->commission_from_freelancer,
                'commission_from_publisher'  => $this->commission_from_publisher,
                'who_can_post'               => $this->who_can_post,
                'max_skills'                 => $this->max_skills
            ]);

            // Refresh data from cache
            settings('projects', true);

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
