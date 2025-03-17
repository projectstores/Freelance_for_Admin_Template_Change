<?php

namespace App\Http\Livewire\Main\Account\Settings;

use App\Models\User;
use App\Models\Country;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Hash;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Account\Settings\EditValidator;

class SettingsComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $username;
    public $email;
    public $fullname;
    public $country;
    public $city;
    public $timezone;
    public $password;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get user
        $user = auth()->user();

        // Fill form
        $this->fill([
            'username' => $user->username,
            'email'    => $user->email,
            'fullname' => $user->fullname,
            'country'  => $user->country_id,
            'city'     => $user->city,
            'timezone' => $user->timezone
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_account_settings') . " $separator " . settings('general')->title;
        $description = settings('seo')->description;
        $ogimage     = src( settings('seo')->ogimage );

        $this->seo()->setTitle( $title );
        $this->seo()->setDescription( $description );
        $this->seo()->setCanonical( url()->current() );
        $this->seo()->opengraph()->setTitle( $title );
        $this->seo()->opengraph()->setDescription( $description );
        $this->seo()->opengraph()->setUrl( url()->current() );
        $this->seo()->opengraph()->setType('website');
        $this->seo()->opengraph()->addImage( $ogimage );
        $this->seo()->twitter()->setImage( $ogimage );
        $this->seo()->twitter()->setUrl( url()->current() );
        $this->seo()->twitter()->setSite( "@" . settings('seo')->twitter_username );
        $this->seo()->twitter()->addValue('card', 'summary_large_image');
        $this->seo()->metatags()->addMeta('fb:page_id', settings('seo')->facebook_page_id, 'property');
        $this->seo()->metatags()->addMeta('fb:app_id', settings('seo')->facebook_app_id, 'property');
        $this->seo()->metatags()->addMeta('robots', 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1', 'name');
        $this->seo()->jsonLd()->setTitle( $title );
        $this->seo()->jsonLd()->setDescription( $description );
        $this->seo()->jsonLd()->setUrl( url()->current() );
        $this->seo()->jsonLd()->setType('WebSite');

        return view('livewire.main.account.settings.settings', [
            'countries' => $this->countries
        ])->extends('livewire.main.layout.app2')->section('content');
    }


    /**
     * Get list of countries
     *
     * @return object
     */
    public function getCountriesProperty()
    {
        return Country::where('is_active', true)->orderBy('name', 'asc')->get();
    }


    /**
     * Update user account settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            EditValidator::validate($this);

            // Set current user
            $user = auth()->user();

            // Validate current password
            if ( $user->password && !Hash::check($this->password, $user->password)) {
                
                // Password does not match
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_ur_current_pass_does_not_match'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Get available timezone
            $timezones = config('timezones');

            // Check if timezone exists
            if (array_search($this->timezone, array_column($timezones, 'tzCode')) === FALSE) {
                
                // Selected timezone not found
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_selected_timezone_does_not_exist'),
                    'icon'        => 'error'
                ]);

                return;                

            }

            // Update user data
            User::where('id', auth()->id())->update([
                'username'   => clean($this->username),
                'email'      => clean($this->email),
                'fullname'   => $this->fullname ? clean($this->fullname) : null,
                'country_id' => $this->country ? $this->country : null,
                'city'       => $this->city ? clean($this->city) : null,
                'timezone'   => $this->timezone
            ]);

            // Refresh user
            $user->refresh();

            // Reset password input
            $this->reset('password');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_ur_account_settings_updated'),
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

        }
    }
    
}