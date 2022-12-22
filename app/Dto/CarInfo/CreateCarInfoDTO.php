<?php
namespace App\Dto\CarInfo;
use App\Http\Requests\CarInfo\CreateCarInfo;
class CreateCarInfoDTO{

    public $CarInfo;

    /**
     * CarInfoDTO constructor.
     * @param CreateCarInfo $request
     */
    public function __construct(CreateCarInfo $request){
        $this->CarInfo=array(
            "manufacturer"=>"$request->manufacturer",
            "$request->model"=>array(
                "type"=>"$request->type"
            )
        );
    }


}
