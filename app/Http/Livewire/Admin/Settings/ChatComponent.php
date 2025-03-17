<?php

namespace App\Http\Livewire\Admin\Settings;

use Config;
use Artisan;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\SettingsLiveChat;
use App\Http\Validators\Admin\Settings\ChatValidator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ChatComponent extends Component
{
    use SEOToolsTrait, Actions;

    public $default_provider;
    public $allowed_images;
    public $allowed_files;
    public $max_file_size;
    public $enable_attachments;
    public $enable_emojis;
    public $play_notification_sound;
    public $pusher_key;
    public $pusher_secret;
    public $pusher_app_id;
    public $pusher_cluster;
    public $pusher_encrypted;

    /**
     * Initialize component
     *
     * @return void
     */
    public function mount()
    {
        // Get settings
        $settings = settings('live_chat');

        // Fill default settings
        $this->fill([
            'default_provider'        => 'pusher',
            'allowed_images'          => $settings->allowed_images,
            'allowed_files'           => $settings->allowed_files,
            'max_file_size'           => $settings->max_file_size,
            'enable_attachments'      => $settings->enable_attachments ? 1 : 0,
            'enable_emojis'           => $settings->enable_emojis ? 1 : 0,
            'play_notification_sound' => $settings->play_notification_sound ? 1 : 0,
            'pusher_key'              => config('chatify.pusher.key'),
            'pusher_secret'           => config('chatify.pusher.secret'),
            'pusher_app_id'           => config('chatify.pusher.app_id'),
            'pusher_cluster'          => config('chatify.pusher.options.cluster'),
            'pusher_encrypted'        => config('chatify.pusher.options.encrypted') ? 1 : 0,
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
        $this->seo()->setTitle( setSeoTitle(__('messages.t_live_chat_settings'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.settings.chat')->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Update settings
     *
     * @return void
     */
    public function update()
    {
        try {

            // Validate form
            ChatValidator::validate($this);

            // Update settings
            SettingsLiveChat::first()->update([
                'default_provider'        => $this->default_provider,
                'allowed_images'          => str_replace(' ', '', $this->allowed_images),
                'allowed_files'           => str_replace(' ', '', $this->allowed_files),
                'max_file_size'           => $this->max_file_size,
                'enable_attachments'      => $this->enable_attachments ? 1 : 0,
                'enable_emojis'           => $this->enable_emojis ? 1 : 0,
                'play_notification_sound' => $this->play_notification_sound ? 1 : 0,
            ]);
            
            // Write pusher settings
            Config::write('chatify.pusher.key', $this->pusher_key);
            Config::write('chatify.pusher.secret', $this->pusher_secret);
            Config::write('chatify.pusher.app_id', $this->pusher_app_id);
            Config::write('chatify.pusher.options.cluster', $this->pusher_cluster);
            Config::write('chatify.pusher.options.encrypted', $this->pusher_encrypted ? 1 : 0);

            // Clear config cache
            Artisan::call('config:clear');

            // Update cache
            settings('live_chat', true);

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            // Validation error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_form_validation_error'),
                'icon'        => 'error'
            ]);

            throw $e;

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
