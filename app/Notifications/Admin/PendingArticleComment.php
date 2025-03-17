<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PendingArticleComment extends Notification implements ShouldQueue
{
    use Queueable;

    public $article;
    public $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($article, $comment)
    {
        $this->article = $article;
        $this->comment = $comment;
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
         $subject = __('messages.t_subject_admin_pending_article_comment');

         return (new MailMessage)
                     ->subject($subject)
                     ->greeting(new HtmlString(__('messages.t_hi_admin')))
                     ->line( new HtmlString(nl2br($this->comment->comment)) )
                     ->action(__('messages.t_comments'), admin_url('blog/comments/edit/' . $this->comment->uid));
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
