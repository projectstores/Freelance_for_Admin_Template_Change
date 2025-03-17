<?php

namespace App\Http\Livewire\Main\Account\Password;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Facades\Hash;
use App\Notifications\User\Everyone\PasswordChanged;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Http\Validators\Main\Account\Password\EditValidator;

class PasswordComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $current_password;
    public $new_password;
    public $new_password_confirmation;


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_update_password') . " $separator " . settings('general')->title;
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

        return view('livewire.main.account.password.password')->extends('livewire.main.layout.app2')->section('content');
    }


    /**
     * Update user account password
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
            if (!Hash::check($this->current_password, $user->password)) {
                
                // Password does not match
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => __('messages.t_ur_current_pass_does_not_match'),
                    'icon'        => 'error'
                ]);

                return;

            }

            // Update user data
            User::where('id', auth()->id())->update([
                'password'    => Hash::make($this->new_password)
            ]);

            // Password changed
            $user->notify( (new PasswordChanged)->locale(config('app.locale')) );

            // Reset password input
            $this->reset();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_ur_account_password_updated'),
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
