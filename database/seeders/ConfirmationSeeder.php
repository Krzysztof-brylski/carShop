<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ConfirmationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** report_confirmation **/
        DB::connection("mysql")->table("report_confirmation")->updateOrInsert([
            "id"=>1,
            "user_id"=>"63b442af0b45feb5490950a4",
            "content"=>"Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Sed gravida mi in ex pulvinar egestas.
              Morbi viverra eros non enim pellentesque commodo. ",
        ]);
        DB::connection("mysql")->table("report_confirmation")->updateOrInsert([
            "id"=>2,
            "user_id"=>"63b442af0b45feb5490950a4",
            "content"=>"Morbi viverra eros non enim pellentesque commodo.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
             Sed gravida mi in ex pulvinar egestas. ",
        ]);

        /** offer_confirmation **/

        DB::connection("mysql")->table("offer_confirmation")->updateOrInsert([
            "id"=>1,
            "offer_id"=>"63b442af0b45feb5490950cc",

        ]);
        DB::connection("mysql")->table("offer_confirmation")->updateOrInsert([
            "id"=>2,
            "offer_id"=>"63b442af0b45feb5490950cd",
        ]);

        /** extended_user_confirmation **/

        DB::connection("mysql")->table("extended_user_confirmation")->updateOrInsert([
            "id"=>1,
            "user_id"=>"63b442af0b45feb5490950a4",

        ]);
        DB::connection("mysql")->table("extended_user_confirmation")->updateOrInsert([
            "id"=>2,
            "user_id"=>"63b442af0b45feb5490950a4",
        ]);

        /** repairs_confirmation **/

        DB::connection("mysql")->table("repair_confirmation")->updateOrInsert([
            "id"=>1,
            "offer_id"=>"63b442af0b45feb5490950cc",

        ]);
        DB::connection("mysql")->table("repair_confirmation")->updateOrInsert([
            "id"=>2,
            "offer_id"=>"63b442af0b45feb5490950cd",
        ]);

    }
}
