<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsterEstatesTypesSeeder extends Seeder
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
                'id_estates_types' => 1,
                'estates_type_name' => "Appartement",
            ]
        ]);
    }
}
