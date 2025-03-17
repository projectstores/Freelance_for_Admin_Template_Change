<?php

namespace App\Http\Livewire\Admin\Blog\Options;

use App\Models\Article;
use Livewire\Component;
use App\Models\ArticleSeo;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use App\Utils\Uploader\ImageUploader;
use App\Http\Validators\Admin\Blog\CreateValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Str;

class CreateComponent extends Component
{
    use SEOToolsTrait, WithFileUploads, Actions;

    public $title;
    public $slug;
    public $content;
    public $image;
    public $reading_time;
    public $seo_description;


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_article'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new article
     *
     * @return void
     */
    public function create()
    {
        try {
            
            // Validate form
            CreateValidator::validate($this);

            // Upload image
            $image_id              = ImageUploader::make($this->image)
                                                  ->folder('blog')
                                                  ->handle();

            // Create new article
            $article               = new Article();
            $article->uid          = uid();
            $article->title        = $this->title;
            $article->slug         = Str::slug($this->slug);
            $article->content      = $this->content;
            $article->image_id     = $image_id;
            $article->reading_time = $this->reading_time;
            $article->save();

            // Add seo
            if ($this->seo_description) {
                
                // Set seo
                $seo              = new ArticleSeo();
                $seo->article_id  = $article->id;
                $seo->title       = $this->title;
                $seo->description = $this->seo_description;
                $seo->save();

            }

            // Reset form
            $this->reset();

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
