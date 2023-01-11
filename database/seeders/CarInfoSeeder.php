<?php

namespace Database\Seeders;

use App\Models\CarManufacturer;
use App\Models\CarModel;
use App\Models\CarVersion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**CarInfo manufacturer  */
        CarManufacturer::firstOrcreate([
            'id'=>1,
            'name'=>'audi',
        ]);
        CarManufacturer::firstOrcreate([
                'id'=>2,
                'name'=>'volkswagen',
        ]);
        CarManufacturer::firstOrcreate([
                'id'=>3,
                'name'=>'mazda',
        ]);
        /** CarInfo model*/
        //audi
        CarModel::firstOrcreate([
            'id'=>1,
            'car_manufacturer_id'=>1,
            'name'=>'a4',
        ]);
        CarModel::firstOrcreate([
            'id'=>2,
            'car_manufacturer_id'=>1,
            'name'=>'a3',
        ]);
        //volkswagen
        CarModel::firstOrcreate([
            'id'=>3,
            'car_manufacturer_id'=>2,
            'name'=>'passat',
        ]);
        CarModel::firstOrcreate([
            'id'=>4,
            'car_manufacturer_id'=>2,
            'name'=>'golf',
        ]);
        //mazda
        CarModel::firstOrcreate([
            'id'=>5,
            'car_manufacturer_id'=>3,
            'name'=>'II',
        ]);
        CarModel::firstOrcreate([
            'id'=>6,
            'car_manufacturer_id'=>3,
            'name'=>'III',
        ]);
        /** CarInfo version */
        //audi a4
        CarVersion::firstOrcreate([
            'id'=>1,
            'car_model_id'=>1,
            'name'=>'b8',
        ]);
        CarVersion::firstOrcreate([
            'id'=>2,
            'car_model_id'=>1,
            'name'=>'b7',
        ]);
        //audi a3
        CarVersion::firstOrcreate([
            'id'=>3,
            'car_model_id'=>2,
            'name'=>'8L',
        ]);
        CarVersion::firstOrcreate([
            'id'=>4,
            'car_model_id'=>2,
            'name'=>'8P',
        ]);
        //volkswagen passat
        CarVersion::firstOrcreate([
            'id'=>5,
            'car_model_id'=>3,
            'name'=>'b5',
        ]);
        CarVersion::firstOrcreate([
            'id'=>6,
            'car_model_id'=>3,
            'name'=>'b4',
        ]);
        //volkswagen golf
        CarVersion::firstOrcreate([
            'id'=>7,
            'car_model_id'=>4,
            'name'=>'II',
        ]);
        CarVersion::firstOrcreate([
            'id'=>8,
            'car_model_id'=>4,
            'name'=>'III',
        ]);
        //mazda II
        CarVersion::firstOrcreate([
            'id'=>9,
            'car_model_id'=>5,
            'name'=>'II',
        ]);
        CarVersion::firstOrcreate([
            'id'=>10,
            'car_model_id'=>5,
            'name'=>'III',
        ]);
        //mazda III
        CarVersion::firstOrcreate([
            'id'=>11,
            'car_model_id'=>6,
            'name'=>'II',
        ]);
        CarVersion::firstOrcreate([
            'id'=>12,
            'car_model_id'=>6,
            'name'=>'III',
        ]);
    }

}
