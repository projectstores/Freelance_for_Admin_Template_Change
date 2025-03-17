<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RefundDispute extends Notification implements ShouldQueue
{
    use Queueable;

    public $refund;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($refund)
    {
        $this->refund = $refund;
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
        $subject = __('messages.t_subject_admin_refund_dispute_raised');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(new HtmlString(__('messages.t_hi_admin')))
                    ->line(new HtmlString(__('messages.t_notification_admin_refund_dispute')))
                    ->action(__('messages.t_refund_details'), admin_url('refunds/details/' . $this->refund->uid));
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
