<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'role' => 'superadmin',
            ],
            [
                'id' => 2,
                'role' => 'admin',
            ],
            [
                'id' => 3,
                'role' => 'agent',
            ],
        ]);
    }
}
