<?php

namespace App\Listeners;

use App\Events\OfferPaymentStatusUpdateEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class PaymentStatusUpdateListener
{


    /**
     * Handle the event.
     *
     * @param OfferPaymentStatusUpdateEvent $event
     * @return void
     */
    public function handle(OfferPaymentStatusUpdateEvent $event)
    {
        if($event->status="success"){
           switch($event->paymentFor){
               case "offer":
                   $event->user->addStandardOfferToken();
                   break;
               case "extendedOffer":
                   $event->user->addExtendedOfferToken();
                   break;
           }
        }
    }
}
