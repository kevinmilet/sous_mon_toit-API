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
                'scheduled_at' => '2022-01-17 16:30:00',
                'notes' => 'Has closed eyes but still sees you mmmmmmmmmeeeeeeeeooooooooowwwwwwww so love me! yet hit you unexpectedly.',
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'scheduled_at' => '2022-01-17 17:30:00',
                'notes' => 'Cat fur is the new black',
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'scheduled_at' => '2022-01-17 10:30:00',
                'notes' => 'Apporter plans',
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],            [
                'id' => 4,
                'scheduled_at' => '2022-01-17 11:00:00',
                'notes' => null,
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 5,
                'scheduled_at' => '2022-01-18 16:30:00',
                'notes' => null,
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 6,
                'scheduled_at' => '2022-01-18 17:30:00',
                'notes' => 'Lorem ipsum',
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 7,
                'scheduled_at' => '2022-01-18 10:30:00',
                'notes' => 'En agence',
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],            [
                'id' => 8,
                'scheduled_at' => '2022-01-18 11:00:00',
                'notes' => null,
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 9,
                'scheduled_at' => '2022-01-19 16:30:00',
                'notes' => null,
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 10,
                'scheduled_at' => '2022-01-19 17:30:00',
                'notes' => 'Cat fur is the new black',
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],
            [
                'id' => 11,
                'scheduled_at' => '2022-01-19 10:30:00',
                'notes' => 'Pas d\'électricité sur place',
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ],            [
                'id' => 12,
                'scheduled_at' => '2022-01-19 11:00:00',
                'notes' => null,
                'id_estate' => rand(1,15),
                'id_staff' => rand(1,4),
                'id_customer' => rand(1,10),
                'id_appointment_type' => rand(1,6),
                'created_at' => now(),
            ]
        ]);
    }
}
