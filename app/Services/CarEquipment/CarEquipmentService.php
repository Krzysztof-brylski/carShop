<?php
namespace App\Services\CarEquipment;
use App\Http\Requests\CarEquipment\CreateCarEquipment;
use Illuminate\Support\Facades\DB;

class CarEquipmentService{
    const tableName="car_equipment";

    /**
     * Display a listing of the resource.
     * @return array
     */
    public function index(){
        $result = DB::table(self::tableName)->get()->first();
        return $result;
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateCarEquipment $request
     */
    public function store(CreateCarEquipment $request){
        $result= DB::table(self::tableName)->get()->first();
        DB::table(self::tableName)->update(array_merge($result,$request->equipment));
    }
}
