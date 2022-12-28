<?php
namespace App\Http\Controllers\CarOffer;

use App\Dto\CarInfo\CarModelsDTO;
use App\Dto\CarInfo\CarVersionsDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCarManufacturer;
use App\Http\Requests\CreateCarModel;
use App\Http\Requests\CreateCarVersion;
use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\CarVersion;
use App\Services\CarInfo\CarInfoService;
use Illuminate\Http\JsonResponse;



class CarInfoController extends Controller
{

    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(){
        try{
            $result=CarManufacturer::get(["name"])->toArray();
        }catch (\Exception $exception){
            return Response()->json("BadRequest",400);
        }finally{
            return Response()->json($result,200);
        }

    }

    /**
 * Display the specified resource.
 * @param CarManufacturer $CarManufacturer
 * @return JsonResponse
 */
    public function show(CarManufacturer $CarManufacturer){
        try{
            $result=(new CarModelsDTO($CarManufacturer->Model))->CarModels;
        }catch (\Exception $exception){
            return Response()->json("BadRequest",400);
        }finally{
            return Response()->json($result,200);
        }

    }

    /**
     * Display the specified resource.
     * @param CarModel $CarModel
     * @return void
     */
    public function showVersion(CarModel $CarModel){
        try{
            $result=(new CarVersionsDTO($CarModel->Version))->CarVersions;
        }catch (\Exception $exception){
            return Response()->json("BadRequest",400);
        }finally{
            return Response()->json($result,200);
        }

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
