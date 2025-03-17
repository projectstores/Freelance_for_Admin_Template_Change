<?php

namespace App\Http\Livewire\Admin\Gigs\Options;

use App\Models\Gig;
use App\Models\GigVisit;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class AnalyticsComponent extends Component
{
    use SEOToolsTrait;
    
    public $gig;
    public $browsers;
    public $os;
    public $devices;
    public $countries;
    public $orders;
    public $referrers;
    public $cities;

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

        // Get top browsers
        $browsers  = GigVisit::where('gig_id', $gig->id)
                            ->whereNotNull('browser_name')
                            ->select('browser_name',DB::raw('COUNT(browser_name) as count'))
                            ->groupBy('browser_name')
                            ->orderBy('count', 'desc')
                            ->get();

        // Set browsers
        $this->browsers = $browsers;

        // Get top os
        $os  = GigVisit::where('gig_id', $gig->id)
                            ->whereNotNull('os_name')
                            ->select('os_name',DB::raw('COUNT(os_name) as count'))
                            ->groupBy('os_name')
                            ->orderBy('count', 'desc')
                            ->get();

        // Set os
        $this->os = $os;

        // Get top devices
        $devices  = GigVisit::where('gig_id', $gig->id)
                            ->whereNotNull('device_type')
                            ->select('device_type',DB::raw('COUNT(device_type) as count'))
                            ->groupBy('device_type')
                            ->orderBy('count', 'desc')
                            ->get();

        // Set devices
        $this->devices = $devices;

        // Get visits by countries
        $countries  = GigVisit::where('gig_id', $gig->id)
                            ->whereNotNull('country_code')
                            ->select('country_code',DB::raw('COUNT(country_code) as count'))
                            ->groupBy('country_code')
                            ->orderBy('count', 'desc')
                            ->get();

        // Set countries
        $this->countries = $countries;

        // Get recent orders for this gig
        $orders = OrderItem::where('gig_id', $gig->id)->latest()->take(10)->get();

        // Set orders
        $this->orders = $orders;

        // Get top referrers
        $referrers = GigVisit::where('gig_id', $gig->id)
                            ->whereNotNull('visit_from')
                            ->select('visit_from')
                            ->selectRaw('count(visit_from) as count, referrer')
                            ->groupBy('visit_from')
                            ->orderBy('count', 'DESC')
                            ->take(10)
                            ->get();

        // Set referrers
        $this->referrers = $referrers;

        // Get top cities
        $cities = GigVisit::where('gig_id', $gig->id)
                            ->whereNotNull('city')
                            ->select('city')
                            ->selectRaw('count(city) as count, country_code, country_name')
                            ->groupBy('city')
                            ->orderBy('count', 'DESC')
                            ->take(10)
                            ->get();
        // Set cities
        $this->cities = $cities;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_gig_analytics'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.gigs.options.analytics')->extends('livewire.admin.layout.app')->section('content');
    }
    
}
