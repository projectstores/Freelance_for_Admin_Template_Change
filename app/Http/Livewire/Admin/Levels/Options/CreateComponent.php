<?php

namespace App\Http\Livewire\Admin\Levels\Options;

use App\Models\Level;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Levels\CreateValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CreateComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $title;
    public $account_type;
    public $seller_max_sales;
    public $seller_min_sales;
    public $buyer_max_purchases;
    public $buyer_min_purchases;
    public $color;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_level'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.levels.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new user
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Check seller sales
            if ($this->account_type === 'seller') {
                
                // Check if min and max sales set
                if (!$this->seller_min_sales || !$this->seller_max_sales) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => "Please set minimum and maximum sales",
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Check if min sales larger than max
                if ($this->seller_min_sales >= $this->seller_max_sales) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => "Maximum sales must be larger than minimum sales.",
                        'icon'        => 'error'
                    ]);

                    return;

                }

            }

            // Check buyer sales
            if ($this->account_type === 'buyer') {
                
                // Check if min and max sales set
                if (!$this->buyer_min_purchases || !$this->buyer_max_purchases) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => "Please set minimum and maximum purchases",
                        'icon'        => 'error'
                    ]);

                    return;

                }

                // Check if min sales larger than max
                if ($this->buyer_min_purchases >= $this->buyer_max_purchases) {
                    
                    // Error
                    $this->notification([
                        'title'       => __('messages.t_error'),
                        'description' => "Maximum purchases must be larger than minimum purchases.",
                        'icon'        => 'error'
                    ]);

                    return;

                }

            }

            // Create new level
            $level                      = new Level;
            $level->uid                 = uid();
            $level->title               = $this->title;
            $level->account_type        = $this->account_type;
            $level->seller_sales_min    = $this->account_type === 'seller' ? $this->seller_min_sales : 0;
            $level->seller_sales_max    = $this->account_type === 'seller' ? $this->seller_max_sales : 0;
            $level->buyer_purchases_min = $this->account_type === 'buyer' ? $this->buyer_min_purchases : 0;
            $level->buyer_purchases_max = $this->account_type === 'buyer' ? $this->buyer_max_purchases : 0;
            $level->level_color         = $this->color;
            $level->save();

            // Reset form
            $this->reset();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_level_created_successfully'),
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
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }
    
}
