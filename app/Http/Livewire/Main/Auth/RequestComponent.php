<?php

namespace App\Http\Livewire\Main\Auth;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\EmailVerification;
use App\Notifications\User\Everyone\VerifyEmail;
use App\Http\Validators\Main\Auth\RequestValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class RequestComponent extends Component
{
    use SEOToolsTrait, Actions;
    
    public $email;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // SEO
        $separator   = settings('general')->separator;
        $title       = __('messages.t_request_verification_link') . " $separator " . settings('general')->title;
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

        return view('livewire.main.auth.request')->extends('livewire.main.layout.app')->section('content');
    }


    /**
     * Request new verification link
     *
     * @return void
     */
    public function request()
    {
        try {
            
            // Validate request
            RequestValidator::validate($this);

            // Check if there is a user with this email
            $user = User::where('email', $this->email)->where('status', 'pending')->first();

            // If user not found show success even there is an error :)
            if (!$user) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_a_new_verification_link_has_been_sent_to_ur_email'),
                    'icon'        => 'success'
                ]);
    
                // Return
                return;

            }

            // Delete all old verification for that email
            EmailVerification::where('email', $this->email)->delete();

            // Get authentication settings
            $settings                 = settings('auth');

            // generate new token
            $token                    = uid(64);

            // Set expires at date
            $expires_at               = now()->addMinutes($settings->verification_expiry_period);

            // Set verification
            $verification             = new EmailVerification();
            $verification->email      = $this->email;
            $verification->token      = $token;
            $verification->expires_at = $expires_at;
            $verification->save();

            // Send email
            $user->notify( (new VerifyEmail($verification))->locale(config('app.locale')) );

            // Reset email
            $this->reset('email');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_a_new_verification_link_has_been_sent_to_ur_email'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
