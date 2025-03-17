<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class QuantityInput extends Component
{
    public $uid;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->uid = uid();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.quantity-input');
    }
}
