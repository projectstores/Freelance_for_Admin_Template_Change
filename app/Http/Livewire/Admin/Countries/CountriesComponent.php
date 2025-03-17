<?php

namespace App\Http\Livewire\Admin\Countries;

use App\Models\Country;
use Livewire\WithPagination;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CountriesComponent extends Component
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_countries'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.countries.countries', [
            'countries' => $this->countries
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of countries
     *
     * @return object
     */
    public function getCountriesProperty()
    {
        return Country::orderBy('name', 'asc')->paginate(42);
    }
    
}
