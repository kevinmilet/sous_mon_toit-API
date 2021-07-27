<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertContractsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts_types')->insert([
            [
                'id' => 1,
                'contract_type' => 'Bail',
                'template_path' => 'templates.ext',
            ],
            [
                'id' => 2,
                'contract_type' => 'Etat des lieux',
                'template_path' => 'templates.ext',
            ],
            [
                'id' => 3,
                'contract_type' => 'Offre d\'achat',
                'template_path' => 'templates.ext',
            ],
        ]);
    }
}
