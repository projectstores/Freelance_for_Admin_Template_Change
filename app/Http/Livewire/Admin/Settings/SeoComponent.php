<?php

namespace App\Http\Livewire\Admin\Settings;

use App\Models\Gig;
use Livewire\Component;
use WireUi\Traits\Actions;
use Spatie\Sitemap\Sitemap;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Settings\SeoValidator;
use App\Models\Article;
use App\Models\Category;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Subcategory;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Spatie\Sitemap\SitemapGenerator;

class SeoComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $description;
    public $facebook_page_id;
    public $facebook_app_id;
    public $twitter_username;
    public $ogimage;
    public $is_sitemap;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('seo');

        // Fill default settings
        $this->fill([
            'description'      => $settings->description,
            'facebook_page_id' => $settings->facebook_page_id,
            'facebook_app_id'  => $settings->facebook_app_id,
            'twitter_username' => $settings->twitter_username,
            'is_sitemap'       => $settings->is_sitemap,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_seo_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.seo')->extends('livewire.admin.layout.app')->section('content');
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
            SeoValidator::validate($this);

            // Get seo settings
            $settings = settings('seo');

            // Upload ogimage
            if ($this->ogimage) {
                $ogimage_id = ImageUploader::make($this->ogimage)
                                        ->folder('site/ogimage')
                                        ->deleteById($settings->ogimage_id)
                                        ->handle();
            } else {
                $ogimage_id = $settings->ogimage_id;
            }

            // Update settings
            $settings->description      = $this->description;
            $settings->facebook_page_id = $this->facebook_page_id;
            $settings->facebook_app_id  = $this->facebook_app_id;
            $settings->twitter_username = $this->twitter_username;
            if ($this->ogimage) {
                $settings->ogimage_id       = $ogimage_id;
            }
            $settings->is_sitemap       = $this->is_sitemap;
            $settings->save();

            // Refresh data from cache
            settings('seo', true);

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


    /**
     * Generate sitemap
     *
     * @return void
     */
    public function generateSitemap()
    {
        try {
            
            if (settings('seo')->is_sitemap) {

                // Get gigs
                $gigs                = Gig::active()->get();
    
                // Get projects
                $projects            = Project::whereIn('status', ['active', 'completed', 'closed', 'incomplete', 'under_development'])->get();
    
                // Get gigs categories
                $gigs_categories     = Category::latest()->select('slug')->get();
    
                // Get projects categories
                $projects_categories = ProjectCategory::latest()->select('slug')->get();

                // Get blog articles
                $articles            = Article::latest()->select('slug')->get();
    
                // Create sitemap
                Sitemap::create()
                        ->add($gigs)
                        ->add($projects)
                        ->add($gigs_categories)
                        ->add($projects_categories)
                        ->add($articles)
                        ->writeToFile(base_path('sitemap.xml'));

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_toast_operation_success'),
                    'icon'        => 'success'
                ]);

            }

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }
    }
    
}
