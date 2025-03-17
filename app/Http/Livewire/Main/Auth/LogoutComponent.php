<?php

namespace App\Http\Livewire\Main\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class LogoutComponent extends Component
{
    use SEOToolsTrait;
    
    public function mount()
    {
        Auth::logout();
 
        request()->session()->invalidate();
    
        request()->session()->regenerateToken();
    
        return redirect('/');
    }
}
