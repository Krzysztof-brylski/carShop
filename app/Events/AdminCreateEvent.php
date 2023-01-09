<?php

namespace App\Events;

use App\Models\User;
use Illuminate\Queue\SerializesModels;

class AdminCreateEvent
{
    use SerializesModels;



    /**
     * The authenticated user.
     *
     * @var User
     */
    public $user;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

}
