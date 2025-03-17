<?php

namespace App\Http\Livewire\Main\Messages;

use App\Models\User;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class NewComponent extends Component
{
    use SEOToolsTrait;
    
    /**
     * Init component
     *
     * @param string $username
     * @return void
     */
    public function mount($username)
    {
        // Get user
        $user = User::where('username', $username)
                    ->whereIn('status', ['active', 'verified'])
                    ->where('id', '!=', auth()->id())
                    ->first();

        // Check if user exists
        if (!$user) {
            return redirect('/');
        }

        // Set redirect url
        $url = "inbox/$user->uid";

        // Redirect to conversation
        return redirect($url);

    }
    
}