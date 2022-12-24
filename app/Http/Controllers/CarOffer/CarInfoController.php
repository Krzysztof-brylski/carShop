<?php
namespace App\Http\Controllers\CarOffer;

use App\Dto\CarInfo\CarModelsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarManufacturer;
use App\Http\Requests\CreateCarModel;
use App\Http\Requests\CreateCarVersion;
use App\Models\CarManufacturer;
use App\Services\CarInfo\CarInfoService;
use Illuminate\Http\JsonResponse;



class CarInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(){
        return Response()->json(CarManufacturer::get(["name"])->toArray(),200);
    }

    /**
     * Display the specified resource.
     * @param CarManufacturer $CarManufacturer
     * @return JsonResponse
     */
    public function show(CarManufacturer $CarManufacturer){
        return Response()->json((new CarModelsDTO($CarManufacturer->Model))->CarModels,200);
    }

    /**
     * Store a newly created resource in storage.
     * Register new car manufacturer
     * @param CreateCarManufacturer $request
     * @return JsonResponse
     */
    public function storeManufacturer(CreateCarManufacturer $request){
        $data=$request->validated();
        try{
            (new CarInfoService())->storeManufacturer($data);
        }catch (\Exception $exception){
            return Response()->json(['error'=>$exception->getMessage()],422);
        }finally{
            return Response()->json("ok",201);
        }
    }

    /**
     * Store a newly created resource in storage.
     * Register new car model
     * @param CreateCarModel $request
     * @return JsonResponse
     */
    public function storeModel(CreateCarModel $request){
        $data=$request->validated();
        try{
            (new CarInfoService())->storeModel($data);
        }catch (\Exception $exception){
            return Response()->json(['error'=>$exception->getMessage()],422);
        }finally{
            return Response()->json("ok",201);
        }
    }

    /**
     * Store a newly created resource in storage.
     * Register new card model version
     * @param CreateCarVersion $request
     * @return JsonResponse
     */
    public function storeVersion(CreateCarVersion $request){
        $data=$request->validated();
        try{
            (new CarInfoService())->storeVersion($data);
        }catch (\Exception $exception){
            return Response()->json(['error'=>$exception->getMessage()],422);
        }finally{
            return Response()->json("ok",201);
        }
    }
}
