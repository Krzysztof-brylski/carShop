<?php
namespace App\Http\Controllers\CarOffer;

use App\Dto\CarInfo\CarModelsDTO;
use App\Dto\CarInfo\CarVersionsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarInfo\CreateCarManufacturerRequest;
use App\Http\Requests\CarInfo\CreateCarModelRequest;
use App\Http\Requests\CarInfo\CreateCarVersionRequest;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\CarVersion;
use App\Services\CarInfo\CarInfoService;
use \Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;



class CarInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(){
        $result = CarManufacturer::with(['Model','Model.Version'])->paginate(10);
        return Response()->json($result,200);
    }

    /**
     * Display list of manufacturers.
     * @return JsonResponse
     */
    public function showManufacturers(){
        $result = CarManufacturer::all(['id','name'])->toArray();
        return Response()->json($result,200);
    }

     /**
     * Display car model list fro  specified manufacturer.
     * @param CarManufacturer $CarManufacturer
     * @return JsonResponse
     */
    public function showModels(CarManufacturer $CarManufacturer){
        try{
            $result=(new CarModelsDTO($CarManufacturer->carModels))->CarModels;
        }catch (\Exception $exception){
            return Response()->json("BadRequest",400);
        }finally{
            return Response()->json($result,200);
        }

    }

    /**
     * Display car model version for specified car model
     * @param CarModel $CarModel
     * @return void
     */
    public function showVersions(CarModel $CarModel){
        try{
            $result=(new CarVersionsDTO($CarModel->carVersions))->CarVersions;
        }catch (\Exception $exception){
            return Response()->json("BadRequest",400);
        }finally{
            return Response()->json($result,200);
        }

    }
    /**
     * Store a newly created resource in storage.
     * Register new car manufacturer
     * @param CreateCarManufacturerRequest $request
     * @return JsonResponse
     */
    public function storeManufacturer(CreateCarManufacturerRequest $request){
        $data=$request->validated();
        (new CarInfoService())->storeManufacturer($data);
        return Response()->json("ok",201);
    }

    /**
     * Store a newly created resource in storage.
     * Register new car model
     * @param CreateCarModelRequest $request
     * @return JsonResponse
     */
    public function storeModel(CreateCarModelRequest $request){
        $data=$request->validated();
        (new CarInfoService())->storeModel($data);
        return Response()->json("ok",201);
    }

    /**
     * Store a newly created resource in storage.
     * Register new card model version
     * @param CreateCarVersionRequest $request
     * @return JsonResponse
     */
    public function storeVersion(CreateCarVersionRequest $request){
        $data=$request->validated();
        (new CarInfoService())->storeVersion($data);
        return Response()->json("ok",201);
    }

}
