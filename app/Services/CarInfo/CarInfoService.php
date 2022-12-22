<?php
namespace App\Services\CarInfo;
use App\Dto\CarInfo\CreateCarInfoDTO;
use App\Dto\CarInfo\UpdateCarInfoDTO;
use App\Http\Requests\CarInfo\CreateCarInfo;
use App\Http\Requests\CarInfo\UpdateCarInfo;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CarInfoService{

    const tableName="car_manufacturer";
    /**
     * Store a newly created resource in storage.
     * @param CreateCarInfo $request
     * @return void
     */
    public function store(CreateCarInfo $request){
        $request->validated();
        $carInfo= new CreateCarInfoDTO($request);
        DB::table(self::tableName)->insert($carInfo->CarInfo);
    }

    /**
     * Update if car manufacturer is registered, but car model and type are not.
     * @param UpdateCarInfo $request
     * @param $result
     * @param $manufacturer
     */
    private function updateCarModelAndVersion(UpdateCarInfo $request,$result,$manufacturer){
        //build UpdateCarInfo DTO
        $carInfo=new UpdateCarInfoDTO($request);
        //update db with new car model and version
        DB::table(self::tableName)->where("manufacturer","=","$manufacturer")->update(
            array_merge($result,$carInfo->CarInfo)
        );
    }

    /**
     * Update if car manufacturer and model is registered, but  type is not
     * @param UpdateCarInfo $request
     * @param $result
     * @param $manufacturer
     */
    private function updateCarVersion(UpdateCarInfo $request,$result,$manufacturer){
        //update db with new car model version
        DB::table(self::tableName)->where("manufacturer","=","$manufacturer")->update(
            array_merge($result[$request->model],$request->version)
        );

    }

    /**
     * Update the specified resource in storage.
     * @param UpdateCarInfo $request
     * @param $manufacturer
     * @return void
     */
    public function update(UpdateCarInfo $request, $manufacturer){
        $request->validated();
        $result=DB::table(self::tableName)->where("manufacturer","=","$manufacturer")->get()->first();
        //if car manufacturer is registered, but car model and type are not
        if(!key_exists($request->model, $result)){
            $this->updateCarModelAndVersion($request,$result,$manufacturer);
        }
        //if car manufacturer and model is registered, but  type is not
        $this->updateCarVersion($request,$result,$manufacturer);
    }


}
