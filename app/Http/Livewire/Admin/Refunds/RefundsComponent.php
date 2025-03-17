<?php

namespace App\Http\Livewire\Admin\Refunds;

use App\Models\Refund;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RefundsComponent extends Component
{
    use WithPagination, SEOToolsTrait;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_refunds'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.refunds.refunds', [
            'refunds' => $this->refunds
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of refunds
     *
     * @return object
     */
    public function getRefundsProperty()
    {
        return Refund::latest()->paginate(42);
    }
    
}
