<?php

namespace App\Services\Admin;

class  ConfirmationService{

    /**
     * run model confirm function
     * @param $model
     */
    public function confirm($model){
        if($model){
            $model->confirm();
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
            $model->reject();
        }
    }


}
