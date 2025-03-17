<?php

namespace App\Http\Validators\Admin\Settings;

use Illuminate\Support\Facades\Validator;

class ChatValidator
{
    
    /**
     * Validate form
     *
     * @param object $request
     * @return void
     */
    static function validate($request)
    {
        try {

            // Set rules
            $rules    = [
                'default_provider'        => 'required|in:pusher',
                'allowed_images'          => 'required',
                'allowed_files'           => 'required',
                'max_file_size'           => 'required|integer',
                'enable_attachments'      => 'boolean',
                'enable_emojis'           => 'boolean',
                'play_notification_sound' => 'boolean',
                'pusher_key'              => 'required|max:60',
                'pusher_secret'           => 'required|max:100',
                'pusher_app_id'           => 'required|max:100',
                'pusher_cluster'          => 'required|max:20',
                'pusher_encrypted'        => 'boolean'
            ];

            // Set errors messages
            $messages = [
                'default_provider.required'       => __('messages.t_validator_required'),
                'default_provider.in'             => __('messages.t_validator_in'),
                'allowed_images.required'         => __('messages.t_validator_required'),
                'allowed_files.required'          => __('messages.t_validator_required'),
                'max_file_size.required'          => __('messages.t_validator_required'),
                'max_file_size.integer'           => __('messages.t_validator_integer'),
                'enable_attachments.boolean'      => __('messages.t_validator_boolean'),
                'enable_emojis.boolean'           => __('messages.t_validator_boolean'),
                'play_notification_sound.boolean' => __('messages.t_validator_boolean'),
                'pusher_key.required'             => __('messages.t_validator_required'),
                'pusher_key.max'                  => __('messages.t_validator_max', ['max' => 60]),
                'pusher_secret.required'          => __('messages.t_validator_required'),
                'pusher_secret.max'               => __('messages.t_validator_max', ['max' => 100]),
                'pusher_app_id.required'          => __('messages.t_validator_required'),
                'pusher_app_id.max'               => __('messages.t_validator_max', ['max' => 100]),
                'pusher_cluster.required'         => __('messages.t_validator_required'),
                'pusher_cluster.max'              => __('messages.t_validator_max', ['max' => 20]),
                'pusher_encrypted.boolean'        => __('messages.t_validator_boolean')

            ];

            // Set data to validate
            $data     = [
                'default_provider'        => $request->default_provider,
                'allowed_images'          => $request->allowed_images,
                'allowed_files'           => $request->allowed_files,
                'max_file_size'           => $request->max_file_size,
                'enable_attachments'      => $request->enable_attachments,
                'enable_emojis'           => $request->enable_emojis,
                'play_notification_sound' => $request->play_notification_sound,
                'pusher_key'              => $request->pusher_key,
                'pusher_secret'           => $request->pusher_secret,
                'pusher_app_id'           => $request->pusher_app_id,
                'pusher_cluster'          => $request->pusher_cluster,
                'pusher_encrypted'        => $request->pusher_encrypted
            ];

            // Validate data
            Validator::make($data, $rules, $messages)->validate();

            // Reset validation
            $request->resetValidation();

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
