<?php

namespace App\Http\Livewire\Admin\System;

use Livewire\Component;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CrontabComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $command_queue;
    public $command_schedule;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Set commands
        $this->command_queue    = "curl " . url('tasks/queue');
        $this->command_schedule = "curl " . url('tasks/schedule');
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_task_scheduling'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.system.crontab')->extends('livewire.admin.layout.app')->section('content');
    }

}
