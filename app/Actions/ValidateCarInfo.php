<?php

use Illuminate\Support\Facades\Http;

class ValidateCarInfo{

    /**
     * using car-info api to do pre-verification of CarInfo added by user
     * @param $carInfo
     */
    public function validate($carInfo){
        //todo move api key to env file
        $result=Http::withHeaders(['X-Api-Key'=>"atRCPecK83QFV89KmdDMmQ==odJKRkFOCd8ErDTF"])
                    ->get("https://api.api-ninjas.com/v1/cars",array(
                        "make"=>"$carInfo->manufacturer",
                        "model"=>"$carInfo->model"
                    ))->json();
        //check if result from api is empty
        if(empty($result)){
            //todo mark carInfo as unVerified
        }
        //todo mark $carInfo as verified
    }
}
