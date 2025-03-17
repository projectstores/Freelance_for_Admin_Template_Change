<?php

namespace App\Mail\Admin\Support;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Reply extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $msg;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($msg, $message)
    {
        $this->msg     = $msg;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Set subject
        $subject = __('messages.t_re_subject', ['subject' => $this->message->subject]);

        return $this->markdown('mail.admin.support.reply')->subject($subject);
    }
}
