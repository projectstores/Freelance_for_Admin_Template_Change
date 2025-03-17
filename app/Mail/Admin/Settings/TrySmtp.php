<?php

namespace App\Mail\Admin\Settings;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TrySmtp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Set subject
        $subject = "[" . config('app.name') . "] Smtp configuration testing";

        return $this->markdown('mail.admin.settings.smtp')->subject($subject);
    }
}
