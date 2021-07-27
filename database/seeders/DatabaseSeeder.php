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
        $this->call(InsertEstatesTypesSeeder::class);
        $this->call(InsertCustomerSeeder::class);
        $this->call(InsertEstatesSeeder::class);
    }
}
