<?php
namespace App\Services\CarEquipment;
use App\Http\Controllers\CarOffer\CarEquipmentController;
use App\Http\Requests\CarEquipment\CreateCarEquipment;
use App\Models\CarEquipment;
use Illuminate\Support\Facades\DB;

class CarEquipmentService{


    /**
     * Store a newly created resource in storage.
     * @param array $data
     */
    public function store(array $data){
        $equipment=CarEquipment::create($data);
        $equipment->save();
    }

    /**
     * Display a listing of the resource.
     *
     * @param CarEquipment $CarEquipment
     * @throws \Exception
     */
    public function delete(CarEquipment $CarEquipment){
        if(!$CarEquipment){
            throw new \Exception('EQUIPMENT DONT EXIST');
        }
        $CarEquipment->delete();
    }


}
