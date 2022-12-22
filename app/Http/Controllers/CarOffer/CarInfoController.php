<?php
namespace App\Http\Controllers\CarOffer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarInfo\CreateCarInfo;
use App\Http\Requests\CarInfo\UpdateCarInfo;
use App\Services\CarInfo\CarInfoService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;


class CarInfoController extends Controller
{
    const tableName="car_manufacturer";
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(){
        Try{
            $result = DB::table(self::tableName)->get(["manufacturer"]);
        }catch(\Exception $exception){
            return Response()->json(["error"=>$exception->getMessage()],422);
        }finally{
            return Response()->json($result,200);
        }

    }

    /**
     * Display the specified resource.
     * @param $manufacturer
     * @return JsonResponse
     */
    public function show($manufacturer){
        try{
            $result = DB::table(self::tableName)->where("manufacturer","=",$manufacturer)->get()->first();
        }catch(\Exception $exception){
            return Response()->json(["error"=>$exception->getMessage()],422);
        }finally{
            return Response()->json($result,200);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param CreateCarInfo $request
     * @param CarInfoService $carInfoService
     * @return void
     */
    public function store(CreateCarInfo $request, CarInfoService $carInfoService){
        try{
            $carInfoService->store($request);
        }catch (\Exception $exception){
            return Response()->json(['error'=>$exception->getMessage()],422);
        }
        return Response()->json("ok",201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCarInfo $request
     * @param CarInfoService $carInfoService
     * @param $manufacturer
     * @return void
     */
    public function update(UpdateCarInfo $request,CarInfoService $carInfoService ,$manufacturer)
    {

        try{
            $carInfoService->update($request, $manufacturer);
        }catch (\Exception $exception){
            return Response()->json(['error'=>$exception->getMessage()],422);
        }
        return Response()->json("ok",201);

    }
}
