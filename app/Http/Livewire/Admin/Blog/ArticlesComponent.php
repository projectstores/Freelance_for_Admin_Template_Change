<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Models\Article;
use Livewire\Component;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ArticlesComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_articles'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.blog.articles', [
            'articles' => $this->articles
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get latest articles
     *
     * @return object
     */
    public function getArticlesProperty()
    {
        return Article::latest()->withCount('comments')->paginate(40); 
    }


    /**
     * Delete article
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get article
        $article = Article::where('id', $id)->firstOrFail();

        // Delete article image
        deleteModelFile($article->image);

        // Delete seo
        $article->seo()->delete();

        // Delete comments
        $article->comments()->delete();

        // Delete article
        $article->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}
