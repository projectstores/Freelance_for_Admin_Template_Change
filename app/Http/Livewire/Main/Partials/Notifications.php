<?php

namespace App\Http\Livewire\Main\Partials;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Notification;

class Notifications extends Component
{
    use Actions;
    
    public $notifications = [];
    
    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Get notifications
        $notifications       = Notification::where('user_id', auth()->id())->where('is_seen', false)->latest()->get();

        // Set notifications
        $this->notifications = $notifications; 
    }
    

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.partials.notifications');
    }


    /**
     * Mark notification as read
     *
     * @param string $id
     * @return void
     */
    public function read($id)
    {
        // Get notification
        Notification::where('uid', $id)->where('user_id', auth()->id())->update([
            'is_seen' => true
        ]);

        // Refresh notifications
        $this->notifications = Notification::where('user_id', auth()->id())->where('is_seen', false)->latest()->get();
    }
    
}
