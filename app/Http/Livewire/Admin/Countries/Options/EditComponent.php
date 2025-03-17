<?php

namespace App\Http\Livewire\Admin\Countries\Options;

use App\Models\Country;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Admin\Countries\EditValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class EditComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $name;
    public $code;
    public $is_active = 1;
    public $country;

    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount($id)
    {
        // Get country
        $country = Country::where('id', $id)->firstOrFail();

        // Fill form
        $this->fill([
            'name'      => $country->name,
            'code'      => $country->code,
            'is_active' => $country->is_active ? 1 : 0
        ]);

        // Set country
        $this->country = $country;
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_country'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.countries.options.edit')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update country
     *
     * @return void
     */
    public function update()
    {
        try {

            // Get country
            $country = Country::where('id', $this->country->id)->firstOrFail();

            // Validate form
            EditValidator::validate($this);

            // Update
            $country->name      = $this->name;
            $country->code      = $this->code;
            $country->is_active = $this->is_active ? 1 : 0;
            $country->save();

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
