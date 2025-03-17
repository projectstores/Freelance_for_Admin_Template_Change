<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProfileReported extends Notification implements ShouldQueue
{
    use Queueable;

    public $profile;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($profile)
    {
        $this->profile = $profile;
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
        $subject = __('messages.t_subject_admin_profile_reported');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(new HtmlString(__('messages.t_hi_admin')))
                    ->line(new HtmlString(__('messages.t_notification_admin_reported_profile')))
                    ->action(__('messages.t_reported_users'), admin_url('reports/users'));
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
