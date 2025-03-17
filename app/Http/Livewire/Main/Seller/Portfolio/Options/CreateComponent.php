<?php

namespace App\Http\Livewire\Main\Seller\Portfolio\Options;

use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Models\UserPortfolio;
use Livewire\WithFileUploads;
use App\Models\UserPortfolioGallery;
use App\Utils\Uploader\ImageUploader;
use App\Notifications\Admin\PendingPortfolio;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Seller\Portfolio\CreateValidator;

class CreateComponent extends Component
{
    use WithFileUploads, SEOToolsTrait, Actions;

    public $title;
    public $description;
    public $thumbnail;
    public $link;
    public $video;
    public $images = [];

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_create_project') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.seller.portfolio.options.create')->extends('livewire.main.seller.layout.app')->section('content');
    }


    /**
     * Create new project
     *
     * @return mixed
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Upload categorory icon
            $thumb_id               = ImageUploader::make($this->thumbnail)->resize(1000)->folder('seller/projects/thumbnails')->handle();

            // Generate project id
            $project_id             = uid();

            // Generate slug
            $slug                   = substr( Str::slug($this->title), 0, 138 ) . '-' . $project_id;

            // Save project
            $project                = new UserPortfolio();
            $project->uid           = $project_id;
            $project->user_id       = auth()->id();
            $project->title         = clean($this->title);
            $project->slug          = $slug;
            $project->description   = clean($this->description);
            $project->thumb_id      = $thumb_id;
            $project->status        = settings('publish')->auto_approve_portfolio ? 'active' : 'pending';
            $project->project_link  = $this->link ? clean($this->link) : null;
            $project->project_video = $this->video ? clean($this->video) : null;
            $project->save();

            // Upload gallery images
            foreach ($this->images as $img) {
                
                // Save image locally
                $image_id           = ImageUploader::make($img)->resize(1000)->folder('seller/projects/gallery')->handle();

                // Save image in database
                $image              = new UserPortfolioGallery();
                $image->project_id  = $project->id;
                $image->image_id    = $image_id;
                $image->save();

            }

            // Send notification to admin if project status pending
            if (!settings('publish')->auto_approve_portfolio) {
                Admin::first()->notify( (new PendingPortfolio($project))->locale(config('app.locale')) );
            }

            // Redirect to projects with success
            return redirect('seller/portfolio')->with('success', __('messages.t_ur_project_created_successfully'));

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