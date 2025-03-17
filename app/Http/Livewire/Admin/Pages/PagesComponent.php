<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Page;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\SettingsFooter;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PagesComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_pages'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.pages.pages', [
            'pages' => $this->pages
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of pages
     *
     * @return object
     */
    public function getPagesProperty()
    {
        return Page::orderBy('title', 'asc')->paginate(42);
    }


    /**
     * Delete page
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        
        // Get page
        $page = Page::where('id', $id)->firstOrFail();

        // Check if this is a terms or privacy page
        SettingsFooter::where('page_terms_id', $page->id)->update([
            'page_terms_id' => null
        ]);

        SettingsFooter::where('page_policy_id', $page->id)->update([
            'page_policy_id' => null
        ]);

        // Delete page
        $page->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}
