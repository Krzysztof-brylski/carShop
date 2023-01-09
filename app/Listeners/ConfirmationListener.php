<?php

namespace App\Listeners;

use App\Events\ConfirmationEvent;
use App\Notifications\ExtendedUserConfirmationNotification;
use App\Notifications\OfferConfirmationNotification;
use App\Notifications\RepairConfirmationNotification;
use App\Notifications\ReportConfirmationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ConfirmationListener
{

    /**
     * Handle the event.
     *
     * @param ConfirmationEvent $event
     * @return void
     */
    public function handle(ConfirmationEvent $event)
    {
        //dd($event->confirmation->getOffer()->getUser());
        $author=$event->confirmation->getUser();
        switch ($event->confirmationType){
            case "OfferConfirmation":
                $author->notify( new OfferConfirmationNotification($event->confirmation,$event->confirmationStatus));
                break;
            case "RepairConfirmation":
                $author->notify( new RepairConfirmationNotification($event->confirmation, $event->confirmationStatus));
                break;
            case "ReportConfirmation":
                $author->notify( new ReportConfirmationNotification($event->confirmation, $event->confirmationStatus));
                break;
            case "ExtendedUserConfirmation":
                $author->notify( new ExtendedUserConfirmationNotification($event->confirmation,$event->confirmationStatus));
                break;
        }
    }
}
