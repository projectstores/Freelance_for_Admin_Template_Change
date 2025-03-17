<?php

namespace App\Http\Livewire\Admin\Gigs\Options;

use App\Models\Gig;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait;
    
    public $gig;
    public $step;

    protected $queryString = ['step'];

    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount($id)
    {
        // Get gig
        $gig       = Gig::where('uid', $id)->firstOrFail();

        // Set gig
        $this->gig = $gig;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.admin.gigs.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }
    
}
