<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertCustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'id' => 1,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Laura',
                'lastname' => 'Guilbert',
                'gender' => 'F',
                'mail' => 'l.guilbert@gmail.com',
                'phone' => '06.06.06.06.08',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => '1992-03-12',
                'address' => '10 rue du 8 mai 1945, 80000 Amiens',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => 2,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Viollette',
                'lastname' => 'Majory',
                'gender' => 'F',
                'mail' => 'ViolletteMajory@dayrep.com',
                'phone' => '01.45.36.90.84',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '68, rue de la Boétie 78300 POISSY',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => 3,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Alfred',
                'lastname' => 'Longpré',
                'gender' => 'H',
                'mail' => 'AlfredLongpre@teleworm.us',
                'phone' => '05.25.64.17.07',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '81, Chemin des Bateliers 81000 ALBI',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => 4,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Calandre',
                'lastname' => 'Plourde',
                'gender' => 'F',
                'mail' => 'CalandrePlourde@dayrep.com',
                'phone' => '03.42.57.46.65',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '63, Avenue Millies Lacroix 59640 DUNKERQUE',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => 5,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Gregoire',
                'lastname' => 'Dielle',
                'gender' => 'H',
                'mail' => 'DielleGregoire@dayrep.com',
                'phone' => '02.32.95.04.21',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '97, rue Victor Hugo 29900 CONCARNEAU',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],

            [
                'id' => 6,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Nicole',
                'lastname' => 'Nadeau',
                'gender' => 'F',
                'mail' => 'NicoleNadeau@teleworm.us',
                'phone' => '01.65.19.28.02',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '98, Rue Frédéric Chopin 78000 VERSAILLES',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],

            [
                'id' => 7,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Evrard',
                'lastname' => 'Foucault',
                'gender' => 'H',
                'mail' => 'EvrardFoucault@rhyta.com',
                'phone' => '04.04.14.25.59',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '5, rue des lieutemants Thomazo 83300 DRAGUIGNAN',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],

            [
                'id' => 8,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Audric',
                'lastname' => 'Berie',
                'gender' => 'H',
                'mail' => 'AudricBerie@teleworm.us',
                'phone' => '04.33.48.01.56',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '87, cours Franklin Roosevelt 13006 MARSEILLE',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],

            [
                'id' => 9,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Alice',
                'lastname' => 'Barros Costa',
                'gender' => 'F',
                'mail' => 'AliceBarrosCosta@jourrapide.com',
                'phone' => '01.69.90.34.89',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '65, rue Saint Germain 93220 GAGNY',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],

            [
                'id' => 10,
                'n_customer' => rand(1,9).substr(time(), 7, 9).rand(0,9),
                'firstname' => 'Marmaduke',
                'lastname' => 'Greenhand',
                'gender' => 'H',
                'mail' => 'MarmadukeGreenhand@rhyta.com',
                'phone' => '05.94.94.42.30',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'birthdate' => null,
                'address' => '83, place de Miremont 47300 VILLENEUVE-SUR-LOT',
                'created_at' => now(),
                'deleted_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],

        ]);




    }
}
