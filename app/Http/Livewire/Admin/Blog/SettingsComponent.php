<?php

namespace App\Http\Livewire\Admin\Blog;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\BlogSettings;
use App\Http\Validators\Admin\Blog\SettingsValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class SettingsComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $enable_blog;
    public $enable_comments;
    public $auto_approve_comments;


    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get blog settings
        $settings = settings('blog');

        // Fill form
        $this->fill([
            'enable_blog'           => $settings->enable_blog ? 1 : 0,
            'enable_comments'       => $settings->enable_comments ? 1 : 0,
            'auto_approve_comments' => $settings->auto_approve_comments ? 1 : 0,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_blog_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.settings')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update blog settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            SettingsValidator::validate($this);

            // Update blog settings
            BlogSettings::first()->update([
                'enable_blog'           => $this->enable_blog ? 1 : 0,
                'enable_comments'       => $this->enable_comments ? 1 : 0,
                'auto_approve_comments' => $this->auto_approve_comments ? 1 : 0
            ]);
            
            // Refresh cache
            settings('blog', true);

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
