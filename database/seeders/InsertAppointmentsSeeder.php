<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertAppointmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            [
                'id' => 1,
                'scheduled_at' => '2018-01-11 10:16:32',
                'notes' => NULL,
                'id_estate' => 2,
                'id_staffs' => 3,
                'id_customer' => 1,
                'id_appointment_type' => 1,
                'created_at' => '2018-01-11 10:15:32',
            ],
            [
                'id' => 2,
                'scheduled_at' => '2018-06-11 10:16:32',
                'notes' => NULL,
                'id_estate' => 1,
                'id_staffs' => 3,
                'id_customer' => 2,
                'id_appointment_type' => 2,
                'created_at' => '2018-01-11 10:15:32',
            ],
            [
                'id' => 3,
                'scheduled_at' => '2019-08-11 11:16:32',
                'notes' => NULL,
                'id_estate' => 1,
                'id_staffs' => 3,
                'id_customer' => 4,
                'id_appointment_type' => 1,
                'created_at' => '2018-01-11 10:15:32',
            ],            [
                'id' => 4,
                'scheduled_at' => '2021-01-11 10:16:32',
                'notes' => NULL,
                'id_estate' => 3,
                'id_staffs' => 4,
                'id_customer' => 5,
                'id_appointment_type' => 12,
                'created_at' => '2018-01-11 10:15:32',
            ]
        ]);
    }
}
