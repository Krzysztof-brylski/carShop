<?php
namespace App\Dto\CarInfo;
use App\Http\Requests\CarInfo;
use Illuminate\Database\Eloquent\Collection;

class CarVersionsDTO{

    public $CarVersions=array();

    /**
     * CarInfoDTO constructor.
     * @param Collection $data
     */
    public function __construct(Collection $data){
        foreach($data->toArray() as $element){
            array_push($this->CarVersions,array(
                "model_id"=>$element['car_model_id'],
                "name"=>$element["name"]
            ));
        }
    }

}
