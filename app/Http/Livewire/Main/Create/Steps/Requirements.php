<?php

namespace App\Http\Livewire\Main\Create\Steps;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Main\Create\RequirementsValidator;

class Requirements extends Component
{
    use Actions;
    
    public $requirements    = [];
    public $add_requirement = [
        'options' => [0 => '', 1 => '']
    ];
    public $is_edit         = false;
    public $selected;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.create.steps.requirements');
    }


    /**
     * Reload Select2
     *
     * @return void
     */
    public function updatedAddRequirement()
    {
        // Reload Select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_requirements',
            'component' => $this->id
        ]);
    }


    /**
     * Add new option to list
     *
     * @return void
     */
    public function addOption()
    {
        // Set new option
        $option = [''];

        // Add new option
        array_push($this->add_requirement['options'], $option);

        // Refresh value
        array_values($this->add_requirement['options']);

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);

        // Reload Select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_requirements',
            'component' => $this->id
        ]);
    }


    /**
     * Delete selected option
     *
     * @param integer $index
     * @return void
     */
    public function deleteOption($index)
    {
        // Check if option exists
        if (isset($this->add_requirement['options'][$index])) {
            
            // Remove it
            unset($this->add_requirement['options'][$index]);

            // Refresh options
            array_values($this->add_requirement['options']);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        }

        // Reload Select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_requirements',
            'component' => $this->id
        ]);
    }

    
    /**
     * Add requirement
     *
     * @return void
     */
    public function addRequirement()
    {
        try {

            // Validate form
            RequirementsValidator::add($this);

            // Set requirement
            $requirement = [
                'question'    => $this->add_requirement['question'],
                'type'        => $this->add_requirement['type'],
                'is_required' => isset($this->add_requirement['is_required']) && $this->add_requirement['is_required'] ? true : false,
                'is_multiple' => isset($this->add_requirement['is_multiple']) && $this->add_requirement['is_multiple'] ? true : false,
                'options'     => isset($this->add_requirement['options']) ? $this->add_requirement['options'] : [],
            ];

            // Add this requirement to list
            array_push($this->requirements, $requirement);

            // Reset form
            $this->reset('add_requirement');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

            throw $th;

        }
    }


    /**
     * Delete selected requirement
     *
     * @param integer $index
     * @return void
     */
    public function deleteRequirement($index)
    {
        // Check if requirement exists
        if (isset($this->requirements[$index])) {
            
            // Delete it
            unset($this->requirements[$index]);

            // Refresh array
            array_values($this->requirements);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        }

        // Reload Select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_requirements',
            'component' => $this->id
        ]);
    }


    /**
     * Edit requirement by id
     *
     * @param integer $index
     * @return void
     */
    public function editRequirement($index)
    {
        // Check if requirement exists
        if (isset($this->requirements[$index])) {
            
            // Get requirement
            $req = $this->requirements[$index];

            // Set requirement
            $this->add_requirement['question']    = isset($req['question']) ? $req['question'] : null;
            $this->add_requirement['type']        = isset($req['type']) ? $req['type'] : null;
            $this->add_requirement['is_required'] = isset($req['is_required']) ? $req['is_required'] : null;
            $this->add_requirement['is_multiple'] = isset($req['is_multiple']) ? $req['is_multiple'] : null;
            $this->add_requirement['options']     = isset($req['options']) ? $req['options'] : [];

            // Set default action as edit
            $this->is_edit  = true;

            // Set selected requirement
            $this->selected = $index;

            // Open modal
            $this->dispatchBrowserEvent('open-modal', 'modal-add-service-requirement-container');
        }

        // Reload Select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_requirements',
            'component' => $this->id
        ]);
    }


    /**
     * Update requirement
     *
     * @return void
     */
    public function updateRequirement()
    {
        try {
                
            // Get requirement
            $requirement = $this->requirements[$this->selected];

            // Check if exists
            if (isset($requirement)) {

                // Validate form
                RequirementsValidator::add($this);
                
                // Update requirement
                $this->requirements[$this->selected]['question']    = $this->add_requirement['question'];
                $this->requirements[$this->selected]['type']        = $this->add_requirement['type'];
                $this->requirements[$this->selected]['is_required'] = isset($this->add_requirement['is_required']) ? true : false;
                $this->requirements[$this->selected]['is_multiple'] = isset($this->add_requirement['is_multiple']) ? true : false;
                $this->requirements[$this->selected]['options']     = isset($this->add_requirement['options']) ? $this->add_requirement['options'] : [];

                // Close modal
                $this->dispatchBrowserEvent('close-modal', 'modal-add-service-requirement-container');

                // Reset form
                $this->reset('add_requirement');

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_toast_operation_success'),
                    'icon'        => 'success'
                ]);

            }

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

            throw $th;

        }
    }


    /**
     * Go back to preview step
     *
     * @return void
     */
    public function back()
    {
        // Go back to preview step
        $this->emit('back');

        // Reload select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_requirements',
            'component' => $this->id
        ]);
    }


    /**
     * Save requirements data section
     *
     * @return void
     */
    public function save()
    {
        try {
            // Validate form
            RequirementsValidator::all($this);

            // Set data
            $data['requirements'] = count($this->requirements) ? $this->requirements : [];

            // Send this data to parent component
            $this->emit('data-saved-requirements', $data);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_data_has_been_saved'),
                'icon'        => 'success'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

            throw $e;

        } catch (\Throwable $th) {

            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_requirements',
                'component' => $this->id
            ]);

            throw $th;

        }
    }
    
}
