<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OfferPaymentStatusUpdateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $status;
    public $user;
    public $paymentFor;
    /**
     * Create a new event instance.
     *
     * @param $status
     * @param User $user
     */
    public function __construct($status,$paymentFor ,User $user)
    {
        $this->user=$user;
        $this->status=$status;
        $this->paymentFor=$paymentFor;
    }

}
