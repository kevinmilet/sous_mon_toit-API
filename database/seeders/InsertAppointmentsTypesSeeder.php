<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class InsertAppointmentsTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments_types')->insert([
            [
                'id' => 1,
                'appointment_type' => 'Visite'
            ],
            [
                'id' => 2,
                'appointment_type' => 'Vente'
            ],
            [
                'id' => 3,
                'appointment_type' => 'Rendez-vous notaire'
            ],
            [
                'id' => 4,
                'appointment_type' => 'Première visite'
            ]
        ]);
    }
}
