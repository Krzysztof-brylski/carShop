<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MysqlDbSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarEquipmentSeeder::class,
            ConfirmationSeeder::class,
            CarInfoSeeder::class,
        ]);
    }
}
