<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertCustomersSearchsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers_searchs')->insert([
            [
                'id' => 1,
                'buy_or_rent' => 'Achat',
                'surface_min' => '100',
                'number_rooms' => '5',
                'budget_min' => '100000',
                'budget_max' => '150000',
                'search_longitude' => '2.3',
                'search_latitude'=> '49.9',
                'search_radius' => '20',
                'created_at' => '2021-07-26 10:00:00',
                'updated_at' => null,
                'alert' => true,
                'id_customer' => 1,
            ],
            [
                'id' => 2,
                'buy_or_rent' => 'Location',
                'surface_min' => '70',
                'number_rooms' => '3',
                'budget_min' => '500',
                'budget_max' => '800',
                'search_longitude' => '2.3',
                'search_latitude'=> '49.9',
                'search_radius' => '20',
                'created_at' => '2021-07-26 10:00:00',
                'updated_at' => null,
                'alert' => true,
                'id_customer' => 2,
            ],
        ]);
    }
}
