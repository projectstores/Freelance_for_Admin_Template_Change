<?php

namespace App\Http\Livewire\Main\Create;

use Livewire\Component;

class Steps extends Component
{

    public $current_step;


    /**
     * Initialize component
     *
     * @param string $current
     * @return void
     */
    public function mount($current)
    {
        // Check current step
        switch ($current) {
            case 'overview':
                $this->current_step = 1;
                break;
            case 'pricing':
                $this->current_step = 2;
                break;
            case 'requirements':
                $this->current_step = 3;
                break;
            case 'gallery':
                $this->current_step = 4;
                break;
            
            default:
                $this->current_step = 1;
                break;
        }
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.main.create.steps');
    }
    
}
