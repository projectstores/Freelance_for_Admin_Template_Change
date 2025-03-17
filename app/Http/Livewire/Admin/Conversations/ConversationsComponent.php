<?php

namespace App\Http\Livewire\Admin\Conversations;

use Livewire\Component;
use App\Models\ChMessage;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class ConversationsComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_conversations'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.conversations.conversations', [
            'messages' => $this->messages
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of messages
     *
     * @return object
     */
    public function getMessagesProperty()
    {
        return ChMessage::whereHas('from')
                        ->whereHas('to')
                        ->with(['to', 'from'])
                        ->latest()
                        ->paginate(42);
    }


    /**
     * Confirm delete message
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete($id)
    {
        try {
            
            // Get message
            $message = ChMessage::where('id', $id)->firstOrFail();

            // Confirm delete
            $this->dialog()->confirm([
                'title'       => __('messages.t_confirm_delete'),
                'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_delete_this_msg') . "</div>",
                'icon'        => 'error',
                'accept'      => [
                    'label'  => __('messages.t_delete'),
                    'method' => 'delete',
                    'params' => $message->id,
                ],
                'reject' => [
                    'label'  => __('messages.t_cancel')
                ],
            ]);

        } catch (\Throwable $th) {
            
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }    
    }


    /**
     * Delete message
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get message
            $message = ChMessage::where('id', $id)->firstOrFail();

            // Check if message has attachment
            if ($message->attachment) {
                
                // Decode attachment
                $attachment   = json_decode($message->attachment);

                // Get path to this file
                $path         = config('chatify.attachments.folder') . '/' . $attachment->new_name;

                // Check if file exists
                if (Storage::disk(config('chatify.storage_disk_name'))->exists($path)) {
                    
                    // Delete
                    Storage::disk(config('chatify.storage_disk_name'))->delete($path);

                }

            }

            // Delete message
            $message->delete();

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
                'description' => __('messages.t_toast_something_went_wrong'),
                'icon'        => 'error'
            ]);

        }    
    }
    
}
