<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ExtendedUserConfirmationNotification extends Notification
{
    use Queueable;

    public $user;
    public $confirmed;

    /**
     * Create a new notification instance.
     *
     * @param $user
     * @param $confirmed
     */

    public function __construct($user, $confirmed)
    {
        $this->user=$user;
        $this->confirmed=$confirmed;
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
        $greeting="Huraa!";
        $status="Pozytywnie";
        if(!$this->confirmed){
            $greeting="Niestety ;/";
            $status="Negatywnie";
        }
        return (new MailMessage)
                    ->greeting($greeting)
                    ->line("Twoje dotyczące rozszerzonego zgłoszenie zostało rozpatrzone {$status}")
                    ->action('Przejdz do strony', url('/'));
    }


}
