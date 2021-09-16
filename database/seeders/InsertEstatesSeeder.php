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
                'title' => self::$ESTATE_TITLE[rand(1, 7)],
                'reference' => "smt" . rand(1000, 9999) . $i,
                'dpe_file' => "lorem-ipsum.pdf",
                'buy_or_rent' => self::$ESTATE_BUY_OR_RENT[rand(1, 2)],
                'address' => rand(1, 199) . "  rue Danton",
                'city' => "Paris",
                'zipcode' => rand(10000, 95999),
                'estate_longitude' => "2.3422724",
                'estate_latitude' => "48.8528186",
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
                'communal_heating' => false,
                'furnished' => true,
                'private_parking' => true,
                'handicap_access' => false,
                'cellar' => false,
                'terrace' => false,
                'swimming_pool' => false,
                'fireplace' => false,
                'all_in_sewer' => true,
                'septik_tank' => false,
                'property_charge' => rand(300, 2500),
                'elevator' => ($i % 2 == 0) ? true : false,
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
