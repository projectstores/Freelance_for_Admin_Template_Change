<?php

namespace App\Http\Livewire\Admin\Levels;

use App\Models\User;
use App\Models\Level;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class LevelsComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_levels'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.levels.levels', [
            'levels' => $this->levels
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of levels
     *
     * @return object
     */
    public function getLevelsProperty()
    {
        return Level::orderBy('title', 'asc')->paginate(42);
    }


    /**
     * Delete level
     *
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        // You cannot delete first and second levels
        // Because we use them as default levels
        if (in_array($id, [1, 2])) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_u_cannot_delete_1_2_levels'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Get level
        $level = Level::where('id', $id)->firstOrFail();

        // Check if there are users have this level
        $users = User::where('level_id', $level->id)->count();

        // Exist
        if ($users) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_there_are_users_have_this_level'),
                'icon'        => 'error'
            ]);

            return;

        }

        // Delete level
        $level->delete();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_level_deleted_successfully'),
            'icon'        => 'success'
        ]);
    }
    
}
