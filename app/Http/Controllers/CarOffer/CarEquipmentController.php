<?php

namespace App\Http\Controllers\CarOffer;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarEquipment\CreateCarEquipment;
use App\Services\CarEquipment\CarEquipmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param CarEquipmentService $carEquipmentService
     * @return JsonResponse
     */
    public function index(){
        try{
            $result=(new CarEquipmentService())->index();
        }catch(\Exception $exception){
            return Response()->json(["error"=>$exception->getMessage()],422);
        }finally{
            return Response()->json($result,200);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateCarEquipment $request
     * @return JsonResponse
     */
    public function store(CreateCarEquipment $request){
        $data=$request->validated();
        Try{
            (new CarEquipmentService())->store($data);
        }catch(\Exception $exception){
            return Response()->json(["error"=>$exception->getMessage()],422);
        }finally{
            return Response()->json("ok",201);
        }
    }
}
