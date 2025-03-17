<?php

namespace App\Notifications\User\Freelancer;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class YourGigNeedsChanges extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $gig) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        // Set subject
        $subject = __('messages.t_subject_freelancer_ur_gig_needs_changes');
        
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(__('messages.t_hello_username', ['username' => $notifiable->fullname ? $notifiable->fullname : $notifiable->username]))
                    ->line(new HtmlString(__('messages.t_notification_the_following_gig_has_been_rejected')))
                    ->line($this->gig->title)
                    ->line(new HtmlString(__('messages.t_t_notification_here_is_why')))
                    ->line(new HtmlString($this->gig->rejection_reason))
                    ->action(__('messages.t_my_gigs'), url('seller/gigs'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
