<?php

namespace App\Notifications\User\Everyone;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class DepositRejected extends Notification implements ShouldQueue
{
    use Queueable;

    public $reason;
    public $transaction;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($transaction, $reason)
    {
        $this->reason      = $reason;
        $this->transaction = $transaction;
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
        $subject = __('messages.t_subject_everyone_recent_deposit_rejected');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(__('messages.t_hello_username', ['username' => $notifiable->username]))
                    ->line(new HtmlString(__('messages.t_deposit_of_this_amount')))
                    ->line(new HtmlString(money($this->transaction->amount_total, $this->transaction->currency, true)))
                    ->line(new HtmlString(__('messages.t_has_been_rejected_for_this_reason')))
                    ->line(new HtmlString($this->reason))
                    ->action(__('messages.t_deposit_history'), url('account/deposit/history'));
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
