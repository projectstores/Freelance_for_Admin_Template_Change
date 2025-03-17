<?php

namespace App\Http\Livewire\Admin\System;

use Config;
use Artisan;
use App\Models\Admin;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;
use App\Notifications\Admin\SiteIsDown;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class MaintenanceComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $status;
    public $headline;
    public $message;
    public $secret;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
        // Check maintenance mode
        $this->status = app()->isDownForMaintenance() ? 'down' : 'up';
        
        // Fill form
        $this->fill([
            'headline' => config('maintenance.headline'),
            'message'  => config('maintenance.message'),
            'secret'   => config('maintenance.secret')
        ]);
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_maintenance_mode'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.system.maintenance')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update maintenance mode
     *
     * @return void
     */
    public function update()
    {
        try {
            
            // Check status
            if ($this->status === 'up') {
                
                // Site is up
                Artisan::call('up');

                // Clear cache
                Artisan::call('config:clear');

            } else if ($this->status === 'down') {
                
                // Generate secret
                $secret = (string) Str::uuid()->toString();

                // Set maintenance mode settings
                Config::write('maintenance.headline', str_replace(["'", '"'], '', $this->headline));
                Config::write('maintenance.message', str_replace(["'", '"'], '', $this->message));
                Config::write('maintenance.secret', $secret);

                // Put site in maintnenace mode
                Artisan::call('down', ['--secret' => "$secret"]);

                // Clear config cache
                Artisan::call('config:clear');

                // Send admin a message
                Admin::first()->notify(new SiteIsDown($secret));

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_toast_operation_success'),
                    'icon'        => 'success'
                ]);

            }

        } catch (\Throwable $th) {
            throw $th;
            // Something went wrong
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }

}
