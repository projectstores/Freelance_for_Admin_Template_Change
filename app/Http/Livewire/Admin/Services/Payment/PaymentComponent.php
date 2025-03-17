<?php

namespace App\Http\Livewire\Admin\Services\Payment;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\AutomaticPaymentGateway;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class PaymentComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $status = [];

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('dashboard.t_payment_gateways'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.services.payment.payment', [
            'gateways' => $this->gateways
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get all available payment gateways
     *
     * @return object
     */
    public function getGatewaysProperty()
    {
        return AutomaticPaymentGateway::oldest('name')->with('logo')->get();
    }


    /**
     * Get updated payment gateway
     *
     * @param mixed $value
     * @param string $slug
     * @return void
     */
    public function update($slug)
    {
       try {

            // Get payment gateway
            $gateway = AutomaticPaymentGateway::where('slug', $slug)->firstOrFail();

            // Check if gateway already enabled
            if ($gateway->is_active) {
                
                // Disable it
                $gateway->is_active = false;
                $gateway->save();

            } else {

                // Enable it
                $gateway->is_active = true;
                $gateway->save();

            }

            // Clear payment gateway cached settings
            payment_gateway($slug, true);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

       } catch (\Throwable $th) {
        
            // Error
            return;

       } 
    }
    
}
