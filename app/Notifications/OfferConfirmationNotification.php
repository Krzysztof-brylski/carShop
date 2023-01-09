<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OfferConfirmationNotification extends Notification
{
    use Queueable;

    public $offer;
    public $confirmed;

    /**
     * Create a new notification instance.
     *
     * @param $offer
     * @param $confirmed
     */

    public function __construct($offer, $confirmed)
    {
        $this->offer=$offer;
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
            ->line("Twoje zgłoszenie dotyczące potwierdzenia ogłoszenia zostało rozpatrzone {$status}")
            ->action('Przejdz do strony', url('/'));
    }

}
