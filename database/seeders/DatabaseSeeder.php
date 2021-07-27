<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(InsertFunctionsSeeder::class);
        $this->call(InsertRolesSeeder::class);
        $this->call(InsertStaffsSeeder::class);
        $this->call(InsertCustomersSeeder::class);
        $this->call(InsertCustomersSearchsSeeder::class);
        $this->call(InsertEstatesTypesSeeder::class);
        $this->call(InsertEstatesSeeder::class);
        $this->call(InsertAppointmentsTypesSeeder::class);
        $this->call(InsertAppointmentsSeeder::class);
        $this->call(InsertContractsTypesSeeder::class);
        $this->call(InsertContractsSeeder::class);
        $this->call(InsertPicturesSeeder::class);
        $this->call(InsertAssociatesSeeder::class);
        $this->call(InsertCustomersTypesSeeder::class);
        $this->call(InsertDescribesCustomersTypesSeeder::class);


    }
}
