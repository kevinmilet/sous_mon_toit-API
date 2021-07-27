<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertCustomersTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers_types')->insert([
            [
                'id'=> 1,
                'customer_type'=>'Vendeur',

            ],
            [
                'id'=> 2,
                'customer_type'=>'Bailleur',

            ],
            [
                'id'=> 3,
                'customer_type'=>'Locataire',

            ],
            [
                'id'=> 4,
                'customer_type'=>'Acquéreur',

            ],
        ]);
    }
}
