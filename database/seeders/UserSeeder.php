<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use MongoDB\BSON\ObjectId;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection("mongodb")->table("users")->updateOrInsert([
            '_id'=> new ObjectId("63b442af0b45feb5490950a4"),
            'name'=>'mike',
            'email'=>'mike@test.pl',
            'password'=>Hash::make('password'),
            'accountType'=>'standard',
            'accountRole'=>'standard'
        ]);

        DB::connection("mongodb")->table("users")->updateOrInsert([
            'name'=>'bob',
            'email'=>'bob@test.pl',
            'password'=>Hash::make('password'),
            'accountType'=>'extended',
            'accountRole'=>'standard'
        ]);
        DB::connection("mongodb")->table("users")->updateOrInsert([
            'name'=>'jerry',
            'email'=>'jerry@test.eu',
            'password'=>Hash::make('password'),
            'accountType'=>'baned',
            'accountRole'=>'standard'
        ]);

        DB::connection("mongodb")->table("users")->updateOrInsert([
            'name'=>'test',
            'email'=>'test@test2.eu',
            'password'=>Hash::make('testtest'),
            'accountType'=>'standard',
            'accountRole'=>'admin'
        ]);
    }
}
