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
                'name' => 'a4619d90-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'a4619d90-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],[
                'id' => 3,
                'folder' => '/pictures/',
                'name' => 'b172aa06-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'b172aa06-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],[
                'id' => 4,
                'folder' => '/pictures/',
                'name' => 'ba8a3a14-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'ba8a3a14-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],[
                'id' => 5,
                'folder' => '/pictures/',
                'name' => 'c1ff0bc6-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'c1ff0bc6-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 1,
            ],
            [
                'id' => 6,
                'folder' => '/pictures/',
                'name' => 'caa61f3a-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => true,
                'alt' => 'caa61f3a-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 2,
            ],
            [
                'id' => 7,
                'folder' => '/pictures/',
                'name' => 'd2688ffa-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'd2688ffa-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 2,
            ],[
                'id' => 8,
                'folder' => '/pictures/',
                'name' => 'dccd82b6-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'dccd82b6-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 2,
            ],[
                'id' => 9,
                'folder' => '/pictures/',
                'name' => 'e310caca-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'e310caca-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 2,
            ],[
                'id' => 10,
                'folder' => '/pictures/',
                'name' => 'e959c17a-f03e-11eb-9a03-0242ac130003.jpg',
                'cover' => false,
                'alt' => 'e959c17a-f03e-11eb-9a03-0242ac130003.jpg',
                'id_estate' => 2,
            ],
        ]);
    }
}
