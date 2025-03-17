<?php

namespace App\Http\Livewire\Admin\Blog\Comments\Options;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ArticleComment;
use App\Http\Validators\Admin\Blog\CommentValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $comment_content;
    public $comment;


    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get comment
        $comment = ArticleComment::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'comment_content' => $comment->comment
        ]);

        // Set comment
        $this->comment = $comment;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_comment'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.comments.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update comment
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            CommentValidator::validate($this);

            // Update comment
            $this->comment->comment = $this->comment_content;
            $this->comment->save();

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
