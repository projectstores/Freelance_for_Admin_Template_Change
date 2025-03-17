<?php

namespace App\Http\Livewire\Admin\Users\Options;

use App\Models\User;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class DetailsComponent extends Component
{
    use SEOToolsTrait;
    
    public $user;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get user
        $user       = User::where('uid', $id)->firstOrFail();

        // Set user
        $this->user = $user;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_user_details'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.users.options.details')->extends('livewire.admin.layout.app')->section('content');
    }
    
}
