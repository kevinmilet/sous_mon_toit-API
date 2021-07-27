<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertFunctionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('functions')->insert([
            [
                'id' => 1,
                'function_name' => 'Directeur',
            ],
            [
                'id' => 2,
                'function_name' => 'Secrétaire',
            ],
            [
                'id' => 3,
                'function_name' => 'Agent',
            ],
            [
                'id' => 4,
                'function_name' => 'Stagiaire',
            ],
        ]);
    }
}
