<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use MongoDB\BSON\ObjectId;



class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offer::firstOrCreate(array(
            '_id'=> new ObjectId("63b442af0b45feb5490950cc"),
            'status'=>'inactive',
            'type'=>'standard',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>"2000",
                "enginePower"=>"120",
                "engineType"=>"diesel",
                "transmission"=>"automatyczna",
                "productionYear"=>"2000",
                "mileage"=>"2000",
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a4",
                "version"=>"b7",
            ),
            'price'=>123123,
            'description'=>"super poteżny opis",
            'localization'=>"(19,19)",
            'images'=>['img1',"img2"],
        ));

        Offer::firstOrCreate(array(
            '_id'=> new ObjectId("63b442af0b45feb5490950cd"),
            'status'=>'inactive',
            'type'=>'standard',
            'author'=>array(
                "id"=>"63b442af0b45feb5490950a4",
                "email"=>"mike@test.pl",
                "number"=>"123123123",
            ),
            'details'=>array(
                "engineSize"=>"2001",
                "enginePower"=>"122",
                "engineType"=>"benzyna",
                "transmission"=>"manualna",
                "productionYear"=>"2001",
                "mileage"=>"2001",
            ),
            'carInfo'=>array(
                "manufacturer"=>"audi",
                "model"=>"a4",
                "version"=>"b8",
            ),
            'price'=>123123,
            'description'=>"bardziej super poteżny opis",
            'localization'=>"(19.2,19.2)",
            'images'=>['img4',"img3"],
        ));
    }
}
