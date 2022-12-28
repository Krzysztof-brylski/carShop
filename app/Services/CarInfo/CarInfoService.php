<?php
namespace App\Services\CarInfo;
use App\Dto\CarInfo\CarManufacturesDTO;
use App\Dto\CarInfo\CarVersionsDTO;
use App\Http\Requests\CarInfo\CreateCarInfo;
use App\Http\Requests\CarInfo\UpdateCarInfo;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\CarVersion;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CarInfoService{


    /**
     * register new car manufacturer
     * @param array $data
     * @return void
     */
    public function storeManufacturer(array $data){
        $CarManufacturer = new CarManufacturer($data);
        $CarManufacturer->save();
    }
    /**
     * register new car model
     * @param array $data
     * @return void
     */
    public function storeModel(array $data){
        $manufacturerName=$data['manufacturer'];
        $manufacturer = CarManufacturer::where("name","=",$manufacturerName)->first();
        $model=new CarModel();
        $model->name=$data['name'];
        $manufacturer->Model()->save($model);
    }

    /**
     * register new car model
     * @param array $data
     * @return void
     */
    public function storeVersion(array $data){
        $modelName=$data['model'];
        $model = CarModel::where("name","=",$modelName)->first();
        $version = new CarVersion();
        $version->name=$data['name'];
        $model->Version()->save($version);
    }



}
