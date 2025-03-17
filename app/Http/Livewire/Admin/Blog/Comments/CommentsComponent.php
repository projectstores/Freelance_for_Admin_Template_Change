<?php

namespace App\Http\Livewire\Admin\Blog\Comments;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\ArticleComment;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CommentsComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_comments'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.comments.comments', [
            'comments' => $this->comments
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get latest comments
     *
     * @return object
     */
    public function getCommentsProperty()
    {
        return ArticleComment::latest()->paginate(40); 
    }


    /**
     * Delete comment
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get comment
        ArticleComment::where('id', $id)->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Approve comment
     *
     * @param integer $id
     * @return void
     */
    public function approve($id)
    {
        // Update comment
        ArticleComment::where('id', $id)->update([
            'status' => 'active'
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Hide comment
     *
     * @param integer $id
     * @return void
     */
    public function hide($id)
    {
        // Update comment
        ArticleComment::where('id', $id)->update([
            'status' => 'hidden'
        ]);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}
