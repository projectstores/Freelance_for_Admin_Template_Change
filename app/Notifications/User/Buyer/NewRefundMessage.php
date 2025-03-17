<?php

namespace App\Notifications\User\Buyer;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewRefundMessage extends Notification implements ShouldQueue
{
    use Queueable;

    public $refund;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($refund, $message)
    {
        $this->refund  = $refund;
        $this->message = $message;
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
        $subject = __('messages.t_subject_buyer_new_refund_message');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(__('messages.t_hello_username', ['username' => $notifiable->username]))
                    ->line(new HtmlString(__('messages.t_notification_u_have_new_msg_refund_from_seller')))
                    ->line(new HtmlString(nl2br($this->message->message)))
                    ->action(__('messages.t_refund_details'), url('account/refunds/details', $this->refund->uid));
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
