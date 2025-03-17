<?php

namespace App\Http\Livewire\Admin\Orders\Options;

use App\Models\Order;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class DetailsComponent extends Component
{
    use SEOToolsTrait;
    
    public $order;

    /**
     * Init component
     *
     * @param string $id
     * @return void
     */
    public function mount($id)
    {
        // Get order
        $order       = Order::where('uid', $id)->firstOrFail();

        // Set order
        $this->order = $order;
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_order_details'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.orders.options.details')->extends('livewire.admin.layout.app')->section('content');
    }
    
}
