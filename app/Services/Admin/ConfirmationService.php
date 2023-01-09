<?php

namespace App\Services\Admin;

use App\Events\ConfirmationEvent;

class  ConfirmationService{

    /**
     * run model confirm function
     * @param $model
     */
    public function confirm($model){
        if($model){
           // $model->confirm();
            event( new ConfirmationEvent($model,true));
        }
    }
    /**
     * show confirmation
     * @param $model
     */
    public function show($model){

    }

    /**
     * run model reject confirmation function
     * @param $model
     */
    public function reject($model){
        if($model){
            //$model->reject();
            event( new ConfirmationEvent($model,false));
        }
    }


}
