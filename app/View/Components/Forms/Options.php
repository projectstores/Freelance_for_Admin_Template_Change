<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Options extends Component
{
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->id = uid();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.options');
    }
}
