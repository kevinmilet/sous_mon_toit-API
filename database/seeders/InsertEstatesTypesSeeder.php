<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertEstatesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estates_types')->insert([
            [
                'id' => 1,
                'estate_type_name' => "Appartement",
            ],
            [
                'id' => 2,
                'estate_type_name' => "Maison",
            ],
            [
                'id' => 3,
                'estate_type_name' => "Garage",
            ],
            [
                'id' => 4,
                'estate_type_name' => "Parking",
            ],
            [
                'id' => 5,
                'estate_type_name' => "Terrain",
            ],
            [
                'id' => 6,
                'estate_type_name' => "Commerce",
            ],
            [
                'id' => 7,
                'estate_type_name' => "Autre",
            ],
        ]);
    }
}
