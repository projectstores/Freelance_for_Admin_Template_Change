<?php

namespace App\Http\Livewire\Admin\System;

use DB;
use File;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class CacheComponent extends Component
{
    use SEOToolsTrait, Actions;

    /**
     * Init component
     *
     * @return void
     */
    public function mount()
    {
    }


    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_caching'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.system.cache')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Clear cache
     *
     * @param string $action
     * @return void
     */
    public function cache($action)
    {
        if ($action === 'clear') {
            
            // Clear
            Artisan::call('cache:clear');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        }
    }

    /**
     * Views
     *
     * @param string $action
     * @return void
     */
    public function views($action)
    {
        if ($action === 'clear') {
            
            // Clear
            Artisan::call('view:clear');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } else if ($action === 'cache') {
            
            // Clear
            Artisan::call('view:cache');

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);  

        }
    }


    /**
     * Wipe sessions table
     *
     * @param string $action
     * @return void
     */
    public function sessions($action)
    {
        // Check action
        if ($action === 'clear') {
            
            try {
                
                // Clear table
                DB::table('sessions')->truncate();

                // Success
                $this->notification([
                    'title'       => __('messages.t_success'),
                    'description' => __('messages.t_toast_operation_success'),
                    'icon'        => 'success'
                ]);

            } catch (\Throwable $th) {
                
                // Error
                $this->notification([
                    'title'       => __('messages.t_error'),
                    'description' => $th->getMessage(),
                    'icon'        => 'error'
                ]);

            }

        }
    }


    /**
     * Delete logs file
     *
     * @param string $action
     * @return void
     */
    public function logs($action)
    {
        // Check action
        if ($action === 'clear') {
            
            // Get files
            $files = glob(storage_path('logs') . "/*.log");
        
            // Delete files
            foreach ($files as $file) {
                
                // Delete this file
                File::delete($file);

            }

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);
            
        }
    }

}
