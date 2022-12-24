<?php
namespace App\Dto\CarInfo;
use Illuminate\Database\Eloquent\Collection;

class CarModelsDTO{

    public $CarModels=array();

    /**
     * CarInfoDTO constructor.
     * @param Collection $data
     */
    public function __construct(Collection $data){
        foreach($data->toArray() as $element){
            array_push($this->CarModels,array(
                "manufacturer_id"=>$element['car_manufacturer_id'],
                "name"=>$element["name"]
            ));
        }
    }

}
