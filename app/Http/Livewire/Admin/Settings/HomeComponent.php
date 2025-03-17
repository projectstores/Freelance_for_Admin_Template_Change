<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsHome;
use App\Models\FileManager;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Settings\HomeValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Schema;

class HomeComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $show_popular_services;
    public $show_made_with;
    public $show_join_us_banner;
    public $show_benefits;
    public $show_home_video;
    public $show_gigs;
    public $youtube_video_id;
    public $join_us_image_id;
    public $benefits_1_logo;
    public $benefits_2_logo;
    public $benefits_3_logo;
    public $benefits_4_logo;
    public $made_with_images = [];
    public $images;
    
    protected $listeners = ['imageRemoved' => 'refreshImageList'];


    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('home');
        $images = FileManager::where('file_folder', 'site/home/madewith')->get();

        // Fill form
        $this->fill([
            'show_popular_services'     => $settings->show_popular_services ? 1 : 0,
            'show_made_with'            => $settings->show_made_with ? 1 : 0,
            'show_join_us_banner'       => $settings->show_join_us_banner ? 1 : 0,
            'show_benefits'             => $settings->show_benefits ? 1 : 0,
            'show_home_video'           => $settings->show_home_video ? 1 : 0,
            'show_gigs'                 => $settings->show_gigs ? 1 : 0,
            'youtube_video_id'          => $settings->youtube_video_id,
            'images'                    => $images,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_home_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.home')->extends('livewire.admin.layout.app')->section('content');
    }
    
    public function refreshImageList()
    {
        $this->images = FileManager::where('file_folder', 'site/home/madewith')->get();
    }
    
    /**
     * Delete image from gallery
     *
     * @param integer $id
     * @return void
     */
    public function removeImage($id)
    {
        // Get image
        $image = FileManager::where('id', $id)->first();

        // Now delete image
        $image->delete();
        
        settings('home', true);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_file_has_been_successfully_deleted'),
            'icon'        => 'success'
        ]);
        
        $this->emit('imageRemoved');
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
            HomeValidator::validate($this);

            Schema::disableForeignKeyConstraints();

            // Get her section settings
            $settings = settings('home');
            
            if ($this->made_with_images) {
                
                //Clear all made with images
                //FileManager::where('file_folder', 'site/home/madewith')->delete();
                
                foreach ($this->made_with_images as $image) {
    
                    $made_with_images_id = ImageUploader::make($image)
                                                ->folder('site/home/madewith')
                                                ->handle();
                }

            } else {

                // Use default
                $made_with_images_id = $settings->made_with_images_id;

            }
            

            if ($this->join_us_image_id) {
                
                // Upload the image
                $join_us_image_id = ImageUploader::make($this->join_us_image_id)
                                            ->folder('site/home')
                                            ->deleteById($settings->join_us_image_id)
                                            ->handle();

            } else {

                // Use default
                $join_us_image_id = $settings->join_us_image_id;

            }
            
            if ($this->benefits_1_logo) {
                
                // Upload the image
                $benefits_1_logo = ImageUploader::make($this->benefits_1_logo)
                                            ->folder('site/home')
                                            ->deleteById($settings->benefits_1_logo)
                                            ->handle();

            } else {

                // Use default
                $benefits_1_logo = $settings->benefits_1_logo;

            }
            
            if ($this->benefits_2_logo) {
                
                // Upload the image
                $benefits_2_logo = ImageUploader::make($this->benefits_2_logo)
                                            ->folder('site/home')
                                            ->deleteById($settings->benefits_2_logo)
                                            ->handle();

            } else {

                // Use default
                $benefits_2_logo = $settings->benefits_2_logo;

            }
            
            if ($this->benefits_3_logo) {
                
                // Upload the image
                $benefits_3_logo = ImageUploader::make($this->benefits_3_logo)
                                            ->folder('site/home')
                                            ->deleteById($settings->benefits_3_logo)
                                            ->handle();

            } else {

                // Use default
                $benefits_3_logo = $settings->benefits_3_logo;

            }
            
            if ($this->benefits_4_logo) {
                
                // Upload the image
                $benefits_4_logo = ImageUploader::make($this->benefits_4_logo)
                                            ->folder('site/home')
                                            ->deleteById($settings->benefits_4_logo)
                                            ->handle();

            } else {

                // Use default
                $benefits_4_logo = $settings->benefits_4_logo;

            }

            // Update settings
            SettingsHome::first()->update([
                'show_popular_services'     => $this->show_popular_services ? 1 : 0,
                'show_made_with'            => $this->show_made_with ? 1 : 0,
                'show_join_us_banner'       => $this->show_join_us_banner ? 1 : 0,
                'show_benefits'             => $this->show_benefits ? 1 : 0,
                'show_home_video'           => $this->show_home_video ? 1 : 0,
                'show_gigs'                 => $this->show_gigs ? 1 : 0,
                'youtube_video_id'          => $this->youtube_video_id,
                'join_us_image_id'          => $join_us_image_id,
                'benefits_1_logo'           => $benefits_1_logo,
                'benefits_2_logo'           => $benefits_2_logo,
                'benefits_3_logo'           => $benefits_3_logo,
                'benefits_4_logo'           => $benefits_4_logo,
                'made_with_images_id'       => $made_with_images_id,
            ]);

            // Clear cache
            settings('home', true);

            Schema::enableForeignKeyConstraints();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);
            
            $this->emit('imageRemoved');

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
