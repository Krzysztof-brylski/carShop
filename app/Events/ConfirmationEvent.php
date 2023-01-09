<?php

namespace App\Events;



use Illuminate\Queue\SerializesModels;

class ConfirmationEvent
{
    use  SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $confirmationType;
    public $confirmation;
    public $confirmationStatus;
    public function __construct($confirmation,$confirmationStatus)
    {
        $this->confirmation=$confirmation;
        $this->confirmationType=(new \ReflectionClass($confirmation))->getShortName();
        $this->confirmationStatus=$confirmationStatus;
    }

}
