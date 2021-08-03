<?php

namespace App\Notifications;

use App\Models\LegalCase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JudicialOfficerAssignmentNotification extends Notification
{
    use Queueable;

    protected LegalCase $legalCase;

    public function __construct(LegalCase $legalCase)
    {
        $this->legalCase = $legalCase;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Legal Case Assignment')
            ->line('You have been assigned a new legal case titled: "' . $this->legalCase->title . '" for prosecution.')
            ->action('Open Case', url('/legal-cases/' . $this->legalCase->id))
            ->line('Thank you!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
