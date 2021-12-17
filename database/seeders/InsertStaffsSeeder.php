<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertStaffsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            [
                'id' => 1,
                'login' => 'glaforet',
                'firstname' => 'Gérard',
                'lastname' => 'Laforet',
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
                'mail' => 'gerard.laforet@sousmontoit.fr',
                'phone' => '06 06 06 06 06',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'avatar' => 'persona_gerard.jpg',
                'alert_reader' => true,
                'id_function' => 1,
                'id_role' => 1,
            ],
            [
                'id' => 2,
                'login' => 'jbourgeois',
                'firstname' => 'Jeannine',
                'lastname' => 'Bourgeois',
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
                'mail' => 'jeannine.bourgeois@sousmontoit.fr',
                'phone' => '06 06 06 06 06',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'avatar' => 'persona_jeannine.jpg',
                'alert_reader' => false,
                'id_function' => 2,
                'id_role' => 2,
            ],
            [
                'id' => 3,
                'login' => 'jhernandez',
                'firstname' => 'José',
                'lastname' => 'Hernandez',
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
                'mail' => 'josé.hernandez@sousmontoit.fr',
                'phone' => '06 06 06 06 06',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'avatar' => 'persona_jose.jpg',
                'alert_reader' => true,
                'id_function' => 3,
                'id_role' => 3,
            ],
            [
                'id' => 4,
                'login' => 'ethomas',
                'firstname' => 'Emma',
                'lastname' => 'Thomas',
                'created_at' => now(),
                'updated_at' => null,
                'deleted_at' => null,
                'mail' => 'emma.thomas@sousmontoit.fr',
                'phone' => '06 06 06 06 06',
                'password' => password_hash('pouet', PASSWORD_DEFAULT),
                'avatar' => 'persona_emma.jpg',
                'alert_reader' => true,
                'id_function' => 3,
                'id_role' => 3,
            ],
        ]);
    }
}
