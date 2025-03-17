<?php

namespace App\Http\Livewire\Main\Auth;

use App\Notifications\User\Everyone\Welcome;
use App\Models\EmailVerification;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class VerifyComponent extends Component
{
    use SEOToolsTrait;
    
    public $token;
    public $email;

    protected $queryString = ['token', 'email'];

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get verification
        $verification = EmailVerification::where('token', $this->token)->where('email', $this->email)->first();

        // Check if verification exists
        if (!$verification) {
            return redirect('auth/request')->with('error', __('messages.t_verification_email_not_exists'));
        }

        // Get expiry date
        $expiry_date = new Carbon($verification->expires_at);

        // Check if verification expired
        if ($expiry_date->isPast()) {
            
            return redirect('auth/request')->with('error', __('messages.t_verification_email_link_expired'));

        }

        // Verification is correct, activate account
        $user                    = User::where('email', $verification->email)->firstOrFail();

        // Update user status
        $user->status            = 'active';
        $user->email_verified_at = now();
        $user->save();

        // Delete verification
        $verification->delete();

        // Send welcome to user
        $user->notify( (new Welcome)->locale(config('app.locale')) );

        // Go to login
        return redirect('auth/login')->with('success', __('messages.t_ur_account_has_been_successfully_verified_email'));
    }
}
