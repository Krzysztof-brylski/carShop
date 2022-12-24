<?php
namespace App\Dto\CarInfo;
use App\Http\Requests\CarInfo;

class UpdateCarInfoDTO{

    public $CarInfo;

    /**
     * CarInfoDTO constructor.
     * @param array $data
     */
    public function __construct(array $data){
        $model=$data['model'];
        $type=$data['type'];
        $this->CarInfo=array(
            "$model"=>array(
                "type"=>"$type"
            )
        );
    }

}
