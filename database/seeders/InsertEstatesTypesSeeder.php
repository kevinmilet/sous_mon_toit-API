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
                'id_estate_type' => 1,
                'estate_type_name' => "Appartement",
            ]
        ]);
    }
}
