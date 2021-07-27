<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertCustomerSeeder extends Seeder
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
                'id' => '1',
                'n_customer' => '000001',
                'firstname' => 'Laura',
                'lastname' => 'Guilbert',
                'gender' => 'H',
                'mail' => 'l.guilbert@gmail.com',
                'phone' => '06.06.06.06.08',
                'password' => null,
                'birthdate' => '1992-03-12',
                'address' => '10 rue du 8 mai 1945, 80000 Amiens',
                'created_at' => '2021-07-26',
                'archived_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => '2',
                'n_customer' => '000002',
                'firstname' => 'Michel',
                'lastname' => 'Dombal',
                'gender' => 'H',
                'mail' => 'pass@gmail.com',
                'phone' => '06.06.06.06.10',
                'password' => null,
                'birthdate' => null,
                'address' => '10 rue du soleil 80000 Covidland',
                'created_at' => '2021-07-26',
                'archived_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => '3',
                'n_customer' => '000003',
                'firstname' => 'John',
                'lastname' => 'Snow',
                'gender' => 'H',
                'mail' => 'johnsnow@gmail.com',
                'phone' => '06.06.06.06.06',
                'password' => null,
                'birthdate' => null,
                'address' => '10 rue du marcheur blanc, 80000 Winterfell',
                'created_at' => '2021-07-26',
                'archived_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => '4',
                'n_customer' => '000004',
                'firstname' => 'Jeanne',
                'lastname' => 'Aliz',
                'gender' => 'F',
                'mail' => 'j.aliz@gmail.com',
                'phone' => '06.06.06.06.07',
                'password' => null,
                'birthdate' => null,
                'address' => '10 rue du 8 mai, 80000 Amiens',
                'created_at' => '2021-07-26',
                'archived_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
            [
                'id' => '5',
                'n_customer' => '000003',
                'firstname' => 'Jean',
                'lastname' => 'Neymarducovid',
                'gender' => 'H',
                'mail' => 'pass@gmail.com',
                'phone' => '06.06.06.06.08',
                'password' => null,
                'birthdate' => null,
                'address' => '10 rue du pass sanitaire, 80000 Covidland',
                'created_at' => '2021-07-26',
                'archived_at' => null,
                'updated_at' => null,
                'first_met' => '0',
                'token' => null,
                'password_request' => null,
            ],
        

        ]);
      
          

    
    }
}
