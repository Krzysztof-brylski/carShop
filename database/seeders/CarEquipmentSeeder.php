<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarEquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection("mysql")->table("car_equipment")->insert([
           [ "id"=>1,
            "name"=>"klimatyzacja",
           ],
           [ "id"=>2,
                "name"=>"elektryczne szyby",
           ],
           [ "id"=>3,
                "name"=>"elektryczne fotele",
           ],
           [ "id"=>4,
                "name"=>"podgrzewane fotele",
           ],
           [ "id"=>5,
                "name"=>"ogrzewane szyby",
           ],
           [ "id"=>6,
                "name"=>"ogrzewane fotele",
           ],
           [ "id"=>7,
                "name"=>"ogrzewana kierownica",
           ],
           [ "id"=>8,
                "name"=>"radio",
           ],
           [ "id"=>9,
                "name"=>"nawigacja",
           ],
           [ "id"=>10,
                "name"=>"tempomat",
           ],
           [ "id"=>11,
                "name"=>"abs",
           ],
        ]);
    }
}
