<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PendingGig extends Notification implements ShouldQueue
{
    use Queueable;

    public $gig;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($gig)
    {
        $this->gig = $gig;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Set subject
        $subject = __('messages.t_subject_admin_pending_gig');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(new HtmlString(__('messages.t_hi_admin')))
                    ->line(new HtmlString(__('messages.t_notification_admin_pending_gig')))
                    ->action(__('messages.t_pending_gigs'), admin_url('gigs'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
