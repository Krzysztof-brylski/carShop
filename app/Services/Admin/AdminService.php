<?php
namespace App\Services\Admin;

class AdminService{
    /**
     * run model confirm method
     * @param $model
     */
    public function Confirm($model){
        if($model){
            $model->confirm();
        }
    }

    /**
     * run model reject method
     * @param $model
     */
    public function Reject($model){
        if($model){
            $model->reject();
        }
    }
}
