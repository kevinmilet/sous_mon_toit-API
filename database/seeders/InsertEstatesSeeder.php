<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InsertEstatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estates')->insert([
           [
               'id_estate' => 1,
               'Id_estates_types' => 1,
               'id_customer' => 1,
               'reference_estate' => "sm124578",
               'dpe_file' => "lorem-ipsum.pdf",
               'buy_or_rent' => "Achat",
               'address' => "4 rue Danton",
               'city' => "Paris",
               'zipcode' => "75006",
               'estate_longitude' => "2.3422724",
               'estate_latitude' => "48.8528186",
               'price' => "185000",
               'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris fringilla elit sed arcu pharetra ullamcorper. Ut ut ante velit. Maecenas aliquet, magna et volutpat maximus, orci risus semper ligula, et consectetur dolor sapien quis massa. Morbi porttitor vehicula nunc at consequat. Integer sed pulvinar sem. Maecenas sagittis nulla eget neque dictum tempus. Mauris hendrerit accumsan nunc, in ornare augue molestie non. In vitae dui nec enim pharetra condimentum ultrices nec nunc. Pellentesque rutrum a lacus molestie feugiat. Nulla sed aliquam metus. Sed vel augue euismod tellus euismod efficitur sit amet vel velit. Vivamus maximus arcu ut justo tempor, nec vestibulum lorem viverra. Sed malesuada tellus sit amet enim cursus hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus.",
               'disponibility' => "À l'acte",
               'year_of_construction' => \DateTime::createFromFormat('d.m.Y', 'now'),
               'living_surface' => "80",
               'carrez_law' => "70",
               'land_surface' => "30",
               'nb_rooms' => "2",
               'nb_bedrooms' => "2",
               'nb_bathrooms' => "2",
               'nb_sanitary' => "0",
               'nb_toilet' => "1",
               'nb_kitchen' => "1",
               'nb_garage' => "1",
               'nb_parking' => "0",
               'nb_balcony' => "1",
               'type_kitchen' => "Américaine",
               'heaters' => "Gaz",
               'communal_heating' => "Collectif",
               'furnished' => "Non meublé",
               'private_parking' => "Oui",
               'handicap_access' => "Non",
               'cellar' => "Non",
               'terrace' => "Non",
               'swimming_pool' => "Non",
               'fireplace' => "Non",
               'all_in_sewer' => "Oui",
               'septik_tank' => "Non",
               'property_charge' => "850",
               'attic' => "Non",
               'elevator' => "Oui",
               'created_at' => \DateTime::createFromFormat('d/m/Y', 'now'),
           ]
        ]);
    }
}
