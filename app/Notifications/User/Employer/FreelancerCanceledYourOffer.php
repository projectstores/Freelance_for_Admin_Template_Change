<?php

namespace App\Notifications\User\Employer;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FreelancerCanceledYourOffer extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $offer) {}

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
        $subject = __('messages.t_subject_employer_freelancer_canceled_ur_offer');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(__('messages.t_hello_username', ['username' => $notifiable->fullname ? $notifiable->fullname : $notifiable->username]))
                    ->line(new HtmlString(__('messages.t_notification_username_has_canceled_ur_offer', ['username' => $this->offer->freelancer->username])))
                    ->action(__('messages.t_submitted_offers'), url('account/offers'));
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
