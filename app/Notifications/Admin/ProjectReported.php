<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Support\HtmlString;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProjectReported extends Notification implements ShouldQueue
{
    use Queueable;

    public $project;
    public $report;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project, $report)
    {
        $this->project = $project;
        $this->report  = $report;
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
        $subject = __('messages.t_subject_admin_project_reported');

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting(new HtmlString(__('messages.t_hi_admin')))
                    ->line(new HtmlString(__('messages.t_notification_admin_reported_project')))
                    ->line($this->project->title)
                    ->action(__('messages.t_reported_projects'), admin_url('reports/projects'));
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
