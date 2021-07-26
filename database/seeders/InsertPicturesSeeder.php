<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertPicturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->insert([
            [
                'id' => 1,
                'folder' => '/pictures/',
                'name' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'cover' => true,
                'alt' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],
            [
                'id' => 2,
                'folder' => '/pictures/',
                'name' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],[
                'id' => 3,
                'folder' => '/pictures/',
                'name' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],[
                'id' => 4,
                'folder' => '/pictures/',
                'name' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],[
                'id' => 5,
                'folder' => '/pictures/',
                'name' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'fc26eb10-ee19-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],
        ]);
    }
}
