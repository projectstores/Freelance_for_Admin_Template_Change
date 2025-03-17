<?php

namespace App\Http\Livewire\Admin\Gigs\Options\Steps;

use App\Models\Gig;
use Livewire\Component;
use App\Models\GigUpgrade;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Admin\Gigs\Edit\PricingValidator;

class Pricing extends Component
{
    use SEOToolsTrait, Actions;
    
    public $price;
    public $delivery_time;
    public $currency_symbol;
    public $upgrades             = [];
    public $add_upgrade          = [];
    public $available_deliveries = [];

    public $gig;

    /**
     * Init component
     *
     * @param integer $id
     * @return void
     */
    public function mount(Gig $gig)
    {
        // Set gig
        $this->gig = $gig;

        // Set gig upgrades
        if ($gig->upgrades()->count()) {
            
            // Loop through upgrades
            foreach ($gig->upgrades as $upgrade) {

                // Add this upgrade to list
                array_push($this->upgrades, [
                    'title'      => $upgrade->title,
                    'price'      => $upgrade->price,
                    'extra_days' => $upgrade->extra_days,
                ]);

            }

        }

        // Fill form
        $this->fill([
            'price'         => $gig->price,
            'delivery_time' => $gig->delivery_time
        ]);

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
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_edit_pricing'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.gigs.options.steps.pricing');
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
        return redirect( config('global.dashboard_prefix') . "/gigs/edit/" . $this->gig->uid . "?step=overview" );
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

            // Delete old upgrades
            GigUpgrade::where('gig_id', $this->gig->id)->delete();

            // Create new upgrades
            foreach ($this->upgrades as $upgrade) {
                
                // Save uprade
                GigUpgrade::create([
                    'uid'        => uid(),
                    'gig_id'     => $this->gig->id,
                    'title'      => $upgrade['title'],
                    'price'      => $upgrade['price'],
                    'extra_days' => isset($upgrade['extra_days']) ? $upgrade['extra_days'] : 0,
                ]);

            }

            // Update gig
            $this->gig->price         = $this->price;
            $this->gig->delivery_time = $this->delivery_time;
            $this->gig->save();

            // Success
            return redirect( config('global.dashboard_prefix') . "/gigs/edit/" . $this->gig->uid . "?step=requirements" )->with('success', __('messages.t_pricing_section_has_been_saved'));

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
