<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertAssociateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('associate')->insert([
            [
                'id_customer' => 1,
                'id_contract' => 1,
            ],
            [
                'id_customer' => 2,
                'id_contract' => 1,
            ],
        ]);
    }
}
