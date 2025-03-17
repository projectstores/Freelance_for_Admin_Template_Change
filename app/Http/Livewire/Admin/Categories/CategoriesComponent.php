<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Gig;
use Livewire\Component;
use App\Models\Category;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Schema;

class CategoriesComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_categories'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.categories.categories', [
            'categories' => $this->categories
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of categories
     *
     * @return object
     */
    public function getCategoriesProperty()
    {
        return Category::orderByDesc('id')->paginate(42);
    }


    /**
     * Delete category
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // Get category
        $category = Category::where('id', $id)->firstOrFail();

        // Count gigs in this category
        $gigs     = Gig::where('category_id', $category->id)->count();

        // Check if category has any gig
        if ($gigs) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_this_category_has_some_gigs_please_edit_it'),
                'icon'        => 'error'
            ]);

            return;

        }
        
        // Disable foreign key check
        Schema::disableForeignKeyConstraints();

        // Check if category has icon
        if ($category->icon) {
            deleteModelFile($category->icon);
        }

        // Check if category has image
        if ($category->image) {
            deleteModelFile($category->image);
        }

        // Delete category
        $category->delete();
        
        // Disable foreign key check
        Schema::enableForeignKeyConstraints();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }
    
}
