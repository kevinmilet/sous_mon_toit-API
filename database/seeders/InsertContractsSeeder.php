<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertContractsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contracts')->insert([
            [
                'id' => 1,
                'created_at' => '2021-07-26 16:18:00',
                'updated_at' => null,
                'deleted_at' => null,
                'folder' => '/contracts',
                'name' => 'Dombal_Michel_Bail_1234_20210726.pdf',
                'id_staff' => 3,
                'id_estate' => 1,
                'id_contract_type' => 1,
            ],
            [
                'id' => 2,
                'created_at' => '2021-07-26 16:18:00',
                'updated_at' => null,
                'deleted_at' => null,
                'folder' => '/contracts',
                'name' => 'Guilbert_Laura_Offre_1234_20210726.pdf',
                'id_staff' => 4,
                'id_estate' => 1,
                'id_contract_type' => 3,
            ],
        ]);
    }
}
