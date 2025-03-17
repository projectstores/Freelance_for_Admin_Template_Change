<?php

namespace App\Http\Livewire\Main\Create\Steps;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Http\Validators\Main\Create\PricingValidator;

class Pricing extends Component
{
    use Actions;
    
    public $price;
    public $delivery_time;
    public $currency_symbol;
    public $upgrades             = [];
    public $add_upgrade          = [];
    public $available_deliveries = [];


    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Set available deliveries dates
        $this->available_deliveries = [
            ['value' => 0, 'text' => __('messages.t_none')],
            ['value' => 1, 'text' => __('messages.t_1_day')],
            ['value' => 2, 'text' => __('messages.t_2_days')],
            ['value' => 3, 'text' => __('messages.t_3_days')],
            ['value' => 4, 'text' => __('messages.t_4_days')],
            ['value' => 5, 'text' => __('messages.t_5_days')],
            ['value' => 6, 'text' => __('messages.t_6_days')],
            ['value' => 7, 'text' => __('messages.t_1_week')],
            ['value' => 14, 'text' => __('messages.t_2_weeks')],
            ['value' => 21, 'text' => __('messages.t_3_weeks')],
            ['value' => 30, 'text' => __('messages.t_1_month')]
        ];

        // Get default currency
        $currency              = settings('currency');

        // Set currency symbol
        $this->currency_symbol = isset(config('money')[$currency->code]['symbol']) ? config('money')[$currency->code]['symbol'] : $currency->code;

    }

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.create.steps.pricing');
    }


    /**
     * Init select2 on upgrades changes
     *
     * @return void
     */
    public function updatedUpgrades()
    {
        // Reload select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_pricing',
            'component' => $this->id
        ]);
    }


    /**
     * Add a service upgrade
     *
     * @return void
     */
    public function addUpgrade()
    {
        // Validate form
        try {

            // Validate form
            PricingValidator::upgrade($this);

            // Set upgrade
            $upgrade = [
                'title'      => $this->add_upgrade['title'],
                'price'      => $this->add_upgrade['price'],
                'extra_days' => isset($this->add_upgrade['extra_days']) ? $this->add_upgrade['extra_days'] : 0,
            ];

            // Add this upgrade to list
            array_push($this->upgrades, $upgrade);

            // Reset form
            $this->reset('add_upgrade');

            // Close modal
            $this->dispatchBrowserEvent('close-modal', 'modal-add-service-upgrade-container');

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

            // Scroll to see this upgrade
            $this->dispatchBrowserEvent('scrollTo', 'scroll-to-upgrade-id-' . array_key_last($this->upgrades));

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
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

            // Reload select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

            throw $th;

        }
    }


    /**
     * Remove select upgrade from list
     *
     * @param integer $key
     * @return void
     */
    public function removeUpgrade($key)
    {
        // Check if upgrade exists in list
        if (isset($this->upgrades[$key])) {
            
            // Delete upgrade from list
            unset($this->upgrades[$key]);

        }

        // Reload select2
        $this->dispatchBrowserEvent('pharaonic.select2.load', [
            'target'    => '.select2_pricing',
            'component' => $this->id
        ]);
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
            'target'    => '.select2_pricing',
            'component' => $this->id
        ]);
    }


    /**
     * Save pricing data section
     *
     * @return void
     */
    public function save()
    {
        try {

            // Validate form
            PricingValidator::all($this);

            // Set data
            $data['price']         = $this->price;
            $data['delivery_time'] = $this->delivery_time;
            $data['upgrades']      = count($this->upgrades) ? $this->upgrades : [];
            $data['component_id']  = $this->id;

            // Send this data to parent component
            $this->emit('data-saved-pricing', $data);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_data_has_been_saved'),
                'icon'        => 'success'
            ]);

            // Reload Select2
            $this->dispatchBrowserEvent('pharaonic.select2.load', [
                'target'    => '.select2_pricing',
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
                'target'    => '.select2_pricing',
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
                'target'    => '.select2_pricing',
                'component' => $this->id
            ]);

            throw $th;

        }
    }
}
