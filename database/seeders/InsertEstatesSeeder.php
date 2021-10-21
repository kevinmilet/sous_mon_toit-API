<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertEstatesSeeder extends Seeder
{
    public static $ESTATE_TITLE = [
        1 => 'Bel appartement centre ville',
        2 => 'Une petite maison',
        3 => 'Magnifique maison de ville',
        4 => 'Appartement Haussmannien',
        5 => 'Chateau de Montmirail',
        6 => 'Belle maison en bord de mer',
        7 => 'Maison ancienne plein pied',
        8 => 'Garage centre-ville',
        9 => 'Terrain a contruire',
        10 => 'Place de parking sous-terrain',
        11 => 'Local commercial',
        12 => 'Champs de paturage',
        13 => 'Local proffessionnelle',
        14 => 'Epicerie de quartier',
        15 => 'Local de stockage',

    ];

    public static $CITY =[

        1 => 'Paris',
        2 => 'Amiens',
        3 => 'Bapaume',
        4 => 'Lille',
        5 => 'Saint-Omer',
        6 => 'Calais',
        7 => 'Le Touquet',
        8 => 'Lens',
        9 => 'Albert',
        10 => 'Salouel',
        11 => 'Amiens',
        12 => 'Amiens',
        13 => 'Lille',
        14 => 'Le Touquet',
        15 => 'Amiens',
    ];

    public static $ZIPCODE = [

        1 => 75000,
        2 => 80000,
        3 => 62450,
        4 => 59000,
        5 => 62500,
        6 => 62100,
        7 => 62520,
        8 => 62300,
        9 => 80300,
        10 => 80480,
        11 => 80000,
        12 => 80000,
        13 => 59000,
        14 => 62520,
        15 => 80000,
    ];

    public static $LONGITUDE =[

        1 => 2.3522219,
        2 => 2.295753,
        3 => 2.85111,
        4 => 3.057256,
        5 => 2.26083,
        6 => 1.858686,
        7 => 1.58528,
        8 => 2.83183,
        9 => 2.65096,
        10 => 2.30856,
        11 => 2.3522219,
        12 => 2.295753,
        13 => 3.057256,
        14 => 1.58528,
        15 => 2.295753,
    ];
    public static $LATITUDE =[

        1 => 48.856614,
        2 => 49.894067,
        3 => 50.1036,
        4 => 50.62925,
        5 => 50.7483,
        6 => 50.95129,
        7 => 50.5233,
        8 => 50.42893,
        9 => 50.00091,
        10 => 49.89239,
        11 => 49.894067,
        12 => 49.894067,
        13 => 50.62925,
        14 => 50.5233,
        15 => 49.894067,
    ];

    public static $ESTATE_BUY_OR_RENT = [
        1 => 'Achat',
        2 => 'Location'
    ];

    public static $ESTATE_KITCHEN_TYPE = [
        1 => 'Américaine',
        2 => 'Cuisine en L',
        3 => 'Cuisine en U',
        4 => 'Cuisine ouverte avec îlot central',
    ];

    public static $ESTATE_HEATERS = [
        1 => 'Gaz',
        2 => 'Electricité',
        3 => 'Chauffage au sol',
        4 => 'Fuel',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 15; ++$i) {
            $data[] = [
                'id' => $i,
                'id_estate_type' => rand(1, 7),
                'id_customer' => rand(1, 5),
                'title' => self::$ESTATE_TITLE[$i],
                'reference' => "SMT" . rand(1000, 9999) . $i,
                'dpe_file' => "lorem-ipsum.pdf",
                'buy_or_rent' => self::$ESTATE_BUY_OR_RENT[rand(1, 2)],
                'address' => rand(1, 199) . "  rue Danton",
                'city' => self::$CITY[$i],
                'zipcode' => self::$ZIPCODE[$i],
                'estate_longitude' => self::$LATITUDE[$i],
                'estate_latitude' => self::$LONGITUDE[$i],
                'price' => rand(100000, 1000000),
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fringilla elit sed arcu pharetra ullamcorper. Ut ut ante velit. Maecenas aliquet, magna et volutpat maximus, orci risus semper ligula, et consectetur dolor sapien quis massa. Morbi porttitor vehicula nunc at consequat. Integer sed pulvinar sem. Maecenas sagittis nulla eget neque dictum tempus. Mauris hendrerit accumsan nunc, in ornare augue molestie non. In vitae dui nec enim pharetra condimentum ultrices nec nunc. Pellentesque rutrum a lacus molestie feugiat. Nulla sed aliquam metus. Sed vel augue euismod tellus euismod efficitur sit amet vel velit. Vivamus maximus arcu ut justo tempor, nec vestibulum lorem viverra. Sed malesuada tellus sit amet enim cursus hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus.",
                'disponibility' => "À l'acte",
                'year_of_construction' => '2021-07-26 16:18:00',
                'living_surface' => rand(70, 600),
                'carrez_law' => rand(70, 600),
                'land_surface' => rand(70, 5600),
                'nb_rooms' => rand(1, 10),
                'nb_bedrooms' => rand(1, 10),
                'nb_bathrooms' => rand(1, 4),
                'nb_sanitary' => rand(1, 4),
                'nb_toilet' => rand(1, 3),
                'nb_kitchen' => rand(1, 3),
                'nb_garage' => rand(1, 3),
                'nb_parking' => rand(0, 1),
                'nb_balcony' => rand(0, 1),
                'type_kitchen' => self::$ESTATE_KITCHEN_TYPE[rand(1, 4)],
                'heaters' => self::$ESTATE_HEATERS[rand(1, 4)],
                'communal_heating' => rand(0, 1),
                'furnished' => rand(0, 1),
                'private_parking' => rand(0, 1),
                'handicap_access' => rand(0, 1),
                'cellar' => rand(0, 1),
                'terrace' => rand(0, 1),
                'swimming_pool' => rand(0, 1),
                'fireplace' => rand(0, 1),
                'all_in_sewer' => rand(0, 1),
                'septik_tank' => rand(0, 1),
                'property_charge' => rand(300, 2500),
                'elevator' => rand(0, 1),
                'created_at' => new \DateTime(),
                'updated_at' => null,
                'deleted_at' => null,
            ];
        }

        DB::table('estates')->insert(
            $data
        );

    }
}
