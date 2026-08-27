<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetCode extends Notification
{
    public function __construct(public readonly string $code)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your TravelConnect security code')
            ->view('emails.password-reset-code', [
                'name' => $notifiable->name,
                'code' => $this->code,
                'expiration' => 10,
            ])
            ->text('emails.password-reset-code-text', [
                'name' => $notifiable->name,
                'code' => $this->code,
                'expiration' => 10,
            ]);
    }
}
