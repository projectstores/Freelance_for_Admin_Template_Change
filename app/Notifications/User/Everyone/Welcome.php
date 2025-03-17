<?php

namespace App\Notifications\User\Everyone;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Welcome extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $subject = __('messages.t_welcome_to_app_name', ['name' => config('app.name')]);

        return (new MailMessage)
                    ->subject( $subject )
                    ->greeting(new HtmlString(__('messages.t_welcome_to_the_future_of_work')))
                    ->line(new HtmlString(__('messages.t_notification_user_everyone_welcome_1')))
                    ->action(__('messages.t_start_exploring'), url('/'))
                    ->line(new HtmlString(__('messages.t_notification_user_everyone_welcome_2')));
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
