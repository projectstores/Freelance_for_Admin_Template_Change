<?php

namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsStartSelling;
use App\Models\FileManager;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Settings\StartSellingValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Schema;

class StartSellingComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $show_how_it_works;
    public $show_freelancers;
    public $show_testimonials;
    public $show_faq;

    public $banner_bg_id;
    public $banner_icon_id;
    
    public $hiw_svg_1_id;
    public $hiw_svg_2_id;
    public $hiw_svg_3_id;
    
    public $freelancer_image_1_id;
    public $freelancer_image_2_id;
    public $freelancer_image_3_id;
    public $freelancer_image_4_id;
    
    public $freelancer_name_1;	
    public $freelancer_name_2;	
    public $freelancer_name_3;	
    public $freelancer_name_4;	
    
    public $freelancer_job_1;	
    public $freelancer_job_2;	
    public $freelancer_job_3;	
    public $freelancer_job_4;
    
    public $buyer_image_1_id;
    public $buyer_image_2_id;
    public $buyer_image_3_id;
    
    public $buyer_name_1;	
    public $buyer_name_2;	
    public $buyer_name_3;	
    
    public $buyer_job_1;	
    public $buyer_job_2;	
    public $buyer_job_3;	
    
    public $buyer_review_1;
    public $buyer_review_2;
    public $buyer_review_3;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('start_selling');
        $images = FileManager::where('file_folder', 'site/startselling')->get();

        // Fill form
        $this->fill([
            'show_how_it_works'     => $settings->show_how_it_works ? 1 : 0,
            'show_freelancers'      => $settings->show_freelancers ? 1 : 0,
            'show_testimonials'     => $settings->show_testimonials ? 1 : 0,
            'show_faq'              => $settings->show_faq ? 1 : 0,
            
            'freelancer_name_1'          => $settings->freelancer_name_1,
            'freelancer_name_2'          => $settings->freelancer_name_2,
            'freelancer_name_3'          => $settings->freelancer_name_3,
            'freelancer_name_4'          => $settings->freelancer_name_4,
            
            'freelancer_job_1'          => $settings->freelancer_job_1,
            'freelancer_job_2'          => $settings->freelancer_job_2,
            'freelancer_job_3'          => $settings->freelancer_job_3,
            'freelancer_job_4'          => $settings->freelancer_job_4,
            
            'buyer_name_1'          => $settings->buyer_name_1,
            'buyer_name_2'          => $settings->buyer_name_2,
            'buyer_name_3'          => $settings->buyer_name_3,
            
            'buyer_job_1'          => $settings->buyer_job_1,
            'buyer_job_2'          => $settings->buyer_job_2,
            'buyer_job_3'          => $settings->buyer_job_3,
            
            'buyer_review_1'          => $settings->buyer_review_1,
            'buyer_review_2'          => $settings->buyer_review_2,
            'buyer_review_3'          => $settings->buyer_review_3,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_start_selling_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.start_selling')->extends('livewire.admin.layout.app')->section('content');
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
            StartSellingValidator::validate($this);

            Schema::disableForeignKeyConstraints();

            // Get her section settings
            $settings = settings('start_selling');
            
            if ($this->banner_bg_id)
            {
                $banner_bg_id = ImageUploader::make($this->banner_bg_id)->folder('site/startselling')->handle();
            }
            else
            {
                $banner_bg_id = $settings->banner_bg_id;
            }
            
            if ($this->banner_icon_id)
            {
                $banner_icon_id = ImageUploader::make($this->banner_icon_id)->folder('site/startselling')->handle();
            }
            else
            {
                $banner_icon_id = $settings->banner_icon_id;
            }
            
            if ($this->hiw_svg_1_id)
            {
                $hiw_svg_1_id = ImageUploader::make($this->hiw_svg_1_id)->folder('site/startselling')->handle();
            }
            else
            {
                $hiw_svg_1_id = $settings->hiw_svg_1_id;
            }
            
            if ($this->hiw_svg_2_id)
            {
                $hiw_svg_2_id = ImageUploader::make($this->hiw_svg_2_id)->folder('site/startselling')->handle();
            }
            else
            {
                $hiw_svg_2_id = $settings->hiw_svg_2_id;
            }
            
            if ($this->hiw_svg_3_id)
            {
                $hiw_svg_3_id = ImageUploader::make($this->hiw_svg_3_id)->folder('site/startselling')->handle();
            }
            else
            {
                $hiw_svg_3_id = $settings->hiw_svg_3_id;
            }
            
            if ($this->freelancer_image_1_id)
            {
                $freelancer_image_1_id = ImageUploader::make($this->freelancer_image_1_id)->folder('site/startselling')->handle();
            }
            else
            {
                $freelancer_image_1_id = $settings->freelancer_image_1_id;
            }
            
            if ($this->freelancer_image_2_id)
            {
                $freelancer_image_2_id = ImageUploader::make($this->freelancer_image_2_id)->folder('site/startselling')->handle();
            }
            else
            {
                $freelancer_image_2_id = $settings->freelancer_image_2_id;
            }

            if ($this->freelancer_image_3_id)
            {
                $freelancer_image_3_id = ImageUploader::make($this->freelancer_image_3_id)->folder('site/startselling')->handle();
            }
            else
            {
                $freelancer_image_3_id = $settings->freelancer_image_3_id;
            }
            
            if ($this->freelancer_image_4_id)
            {
                $freelancer_image_4_id = ImageUploader::make($this->freelancer_image_4_id)->folder('site/startselling')->handle();
            }
            else
            {
                $freelancer_image_4_id = $settings->freelancer_image_4_id;
            }
            
            if ($this->buyer_image_1_id)
            {
                $buyer_image_1_id = ImageUploader::make($this->buyer_image_1_id)->folder('site/startselling')->handle();
            }
            else
            {
                $buyer_image_1_id = $settings->buyer_image_1_id;
            }
            
            if ($this->buyer_image_2_id)
            {
                $buyer_image_2_id = ImageUploader::make($this->buyer_image_2_id)->folder('site/startselling')->handle();
            }
            else
            {
                $buyer_image_2_id = $settings->buyer_image_2_id;
            }
            
            if ($this->buyer_image_3_id)
            {
                $buyer_image_3_id = ImageUploader::make($this->buyer_image_3_id)->folder('site/startselling')->handle();
            }
            else
            {
                $buyer_image_3_id = $settings->buyer_image_3_id;
            }

            // Update settings
            SettingsStartSelling::first()->update([
                        'show_how_it_works'     => $this->show_how_it_works ? 1 : 0,
                        'show_freelancers'     => $this->show_freelancers ? 1 : 0,
                        'show_testimonials'     => $this->show_testimonials ? 1 : 0,
                        'show_faq'     => $this->show_faq ? 1 : 0,
                        'banner_bg_id' => $banner_bg_id,
                        'banner_icon_id' => $banner_icon_id,
                        'hiw_svg_1_id' => $hiw_svg_1_id,
                        'hiw_svg_2_id' => $hiw_svg_2_id,
                        'hiw_svg_3_id' => $hiw_svg_3_id,
                        'freelancer_image_1_id' => $freelancer_image_1_id,
                        'freelancer_image_2_id' => $freelancer_image_2_id,
                        'freelancer_image_3_id' => $freelancer_image_3_id,
                        'freelancer_image_4_id' => $freelancer_image_4_id,
                        'freelancer_name_1' => $this->freelancer_name_1,	
                        'freelancer_name_2' => $this->freelancer_name_2,	
                        'freelancer_name_3' => $this->freelancer_name_3,	
                        'freelancer_name_4' => $this->freelancer_name_4,	
                        'freelancer_job_1' => $this->freelancer_job_1,	
                        'freelancer_job_2' => $this->freelancer_job_2,	
                        'freelancer_job_3' => $this->freelancer_job_3,	
                        'freelancer_job_4' => $this->freelancer_job_4,	
                        'buyer_image_1_id' => $buyer_image_1_id,
                        'buyer_image_2_id' => $buyer_image_2_id,
                        'buyer_image_3_id' => $buyer_image_3_id,
                        'buyer_name_1' => $this->buyer_name_1,	
                        'buyer_name_2' => $this->buyer_name_2,	
                        'buyer_name_3' => $this->buyer_name_3,	
                        'buyer_job_1' => $this->buyer_job_1,	
                        'buyer_job_2' => $this->buyer_job_2,	
                        'buyer_job_3' => $this->buyer_job_3,	
                        'buyer_review_1' => $this->buyer_review_1,	
                        'buyer_review_2' => $this->buyer_review_2,	
                        'buyer_review_3' => $this->buyer_review_3,	
            ]);
            


            // Clear cache
            settings('start_selling', true);

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
