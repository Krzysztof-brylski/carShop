<?php
namespace App\Services\CarEquipment;
use App\Http\Requests\CarEquipment\CreateCarEquipment;
use App\Models\CarEquipment;
use Illuminate\Support\Facades\DB;

class CarEquipmentService{
    const tableName="car_equipment";

    /**
     * Display a listing of the resource.
     * @return array
     */
    public function index(){
        return CarEquipment::all()->toArray();
    }

    /**
     * Store a newly created resource in storage.
     * @param array $data
     */
    public function store(array $data){
        $equipment=CarEquipment::create($data);
        $equipment->save();
    }
}
