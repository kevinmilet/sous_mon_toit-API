<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertDescribesCustomersTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('describes_customers_types')->insert([
            [
                'id_customer'=> 3,
                'id_customer_type'=>'2',
            ],
            [
                'id_customer'=> 4,
                'id_customer_type'=>'3',
            ],
            ]);
    }
}
