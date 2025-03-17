<?php

namespace App\Http\Livewire\Admin\Pages\Options;

use App\Models\Page;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Pages\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Str;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $title;
    public $slug;
    public $content;
    public $is_link = false;
    public $link;
    public $column;
    public $page;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get page
        $page = Page::where('uid', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'title'   => $page->title,
            'slug'    => $page->slug,
            'content' => $page->content,
            'is_link' => $page->is_link ? 1 : 0,
            'link'    => $page->link,
            'column'  => $page->column,
        ]);

        // Set page
        $this->page = $page;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_page'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.pages.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update page
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Get page
            $page = Page::where('id', $this->page->id)->firstOrFail();

            // Update page
            $page->title   = $this->title;
            $page->slug    = Str::slug($this->slug);
            $page->content = $this->content ? $this->content : null;
            $page->is_link = $this->is_link ? 1 : 0;
            $page->link    = $this->is_link ? $this->link : null;
            $page->column  = $this->column;
            $page->save();

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
