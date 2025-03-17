<?php

namespace App\Http\Livewire\Admin\Countries\Options;

use App\Models\Country;
use Livewire\Component;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Countries\CreateValidator;

class CreateComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $name;
    public $code;
    public $is_active = 1;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_create_country'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.countries.options.create')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Create new country
     *
     * @return void
     */
    public function create()
    {
        try {

            // Validate form
            CreateValidator::validate($this);

            // Create new country
            $country            = new Country;
            $country->name      = $this->name;
            $country->code      = $this->code;
            $country->is_active = $this->is_active ? 1 : 0;
            $country->save();

            // Reset form
            $this->reset();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
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
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            throw $th;

        }
    }
    
}
