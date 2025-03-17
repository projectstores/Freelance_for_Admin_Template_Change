<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsHero;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Settings\HeroValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Schema;

class HeroComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $enable_bg_img;
    public $bg_large;
    public $tagline;
    public $bg_medium;
    public $bg_small;
    public $bg_color;
    public $bg_large_height;
    public $bg_small_height;


    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('hero');

        // Fill form
        $this->fill([
            'enable_bg_img'   => $settings->enable_bg_img ? 1 : 0,
            'bg_color'        => $settings->bg_color,
            'tagline'         => $settings->tagline,
            'bg_large_height' => $settings->bg_large_height,
            'bg_small_height' => $settings->bg_small_height
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_hero_section_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.hero')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update settings
     *
     * @return mixed
     */
    public function update()
    {
        try {
            
            // Validate form
            HeroValidator::validate($this);

            Schema::disableForeignKeyConstraints();

            // Get her section settings
            $settings = settings('hero');

            // Check if request has large background image
            if ($this->bg_large) {
                
                // Upload the image
                $bg_large_id = ImageUploader::make($this->bg_large)
                                            ->folder('site/hero')
                                            ->deleteById($settings->bg_large_id)
                                            ->handle();

            } else {

                // Use default
                $bg_large_id = $settings->bg_large_id;

            }

            // Check if request has medium background image
            if ($this->bg_medium) {
                
                // Upload the image
                $bg_medium_id = ImageUploader::make($this->bg_medium)
                                            ->folder('site/hero')
                                            ->deleteById($settings->bg_medium_id)
                                            ->handle();

            } else {

                // Use default
                $bg_medium_id = $settings->bg_medium_id;

            }

            // Check if request has small background image
            if ($this->bg_small) {
                
                // Upload the image
                $bg_small_id = ImageUploader::make($this->bg_small)
                                            ->folder('site/hero')
                                            ->deleteById($settings->bg_small_id)
                                            ->handle();

            } else {

                // Use default
                $bg_small_id = $settings->bg_small_id;

            }

            // Update settings
            SettingsHero::first()->update([
                'enable_bg_img'   => $this->enable_bg_img ? 1 : 0,
                'bg_large_id'     => $bg_large_id,
                'bg_medium_id'    => $bg_medium_id,
                'bg_small_id'     => $bg_small_id,
                'bg_color'        => $this->bg_color,
                'tagline'         => $this->tagline,
                'bg_large_height' => $this->bg_large_height,
                'bg_small_height' => $this->bg_small_height
            ]);

            // Clear cache
            settings('hero', true);

            Schema::enableForeignKeyConstraints();

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
