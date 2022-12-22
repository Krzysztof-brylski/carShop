<?php
namespace App\Dto\CarInfo;
use App\Http\Requests\CarInfo\UpdateCarInfo;

class UpdateCarInfoDTO{

    public $CarInfo;

    /**
     * CarInfoDTO constructor.
     * @param UpdateCarInfo $request
     */
    public function __construct(UpdateCarInfo $request){
        $this->CarInfo=array(
            "$request->model"=>array(
                "type"=>"$request->type"
            )
        );
    }


}
