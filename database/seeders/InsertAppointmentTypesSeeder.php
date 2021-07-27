<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InsertAppointmentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointment_types')->insert([
            [
                'id_appointment_type' => 1,
                'appointment_type' => 'visite'
            ],
            [
                'id_appointment_type' => 2,
                'appointment_type' => 'vente'
            ],
            [
                'id_appointment_type' => 3,
                'appointment_type' => 'rendez-vous notaire'
            ],
            [
                'id_appointment_type' => 4,
                'appointment_type' => 'vente'
            ]
        ]);
    }
}
