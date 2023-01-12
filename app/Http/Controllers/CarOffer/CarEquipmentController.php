<?php

namespace App\Http\Controllers\CarOffer;

use App\Dto\Admin\AdminPanelTableDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CarEquipment\CreateCarEquipmentRequest;
use App\Models\CarEquipment;
use App\Services\CarEquipment\CarEquipmentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarEquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     */
    public function index(){
        $result=(new AdminPanelTableDTO(  CarEquipment::paginate(9,['id','name']),
            get_class_methods(CarEquipmentService::class)))->data;
        return Response()->json($result,200);
    }
    public function delete(CarEquipment $CarEquipment){
        try{
            (new CarEquipmentService())->delete($CarEquipment);
        }catch (\Exception $exception){
            return Response()->json($exception->getMessage(),500);
        }finally{
            return Response()->json("ok",200);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateCarEquipmentRequest $request
     * @return JsonResponse
     */
    public function store(CreateCarEquipmentRequest $request){
        $data=$request->validated();
        (new CarEquipmentService())->store($data);
        return Response()->json("ok",201);
    }
}
