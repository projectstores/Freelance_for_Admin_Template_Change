<?php

namespace App\Notifications\User\Employer;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class YourOfferNeedsChanges extends Notification implements ShouldQueue
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
        $subject = __('messages.t_subject_employer_ur_offer_needs_changes');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(__('messages.t_hello_username', ['username' => $notifiable->fullname ? $notifiable->fullname : $notifiable->username]))
                    ->line(new HtmlString(__('messages.t_notification_ur_offer_rejected_for_following_reason')))
                    ->line($this->offer->admin_rejection_reason)
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