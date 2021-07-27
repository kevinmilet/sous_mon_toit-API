<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitEstates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('estates', function(Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_estate_type')->references('id')->on('estates_types');
            $table->foreignId('id_estates_types')->references('id')->on('estates_types');
            $table->foreignId('id_customer')->references('id')->on('customers');
            $table->string('reference_estate', 50);
            $table->string('dpe_file', 255 )->nullable();
            $table->string('buy_or_rent', 10);
            $table->string('address', 255);
            $table->string('city', 50);
            $table->string('zipcode', 5);
            $table->decimal('estate_longitude');
            $table->decimal('estate_latitude');
            $table->decimal('price')->nullable();
            $table->longText('description')->nullable();
            $table->string('disponibility')->nullable();
            $table->dateTime('year_of_construction')->nullable();
            $table->smallInteger('living_surface')->nullable();
            $table->smallInteger('carrez_law')->nullable();
            $table->smallInteger('land_surface')->nullable();
            $table->tinyInteger('nb_rooms')->nullable();
            $table->tinyInteger('nb_bedrooms')->nullable();
            $table->tinyInteger('nb_bathrooms')->nullable();
            $table->tinyInteger('nb_sanitary')->nullable();
            $table->tinyInteger('nb_toilet')->nullable();
            $table->tinyInteger('nb_kitchen')->nullable();
            $table->tinyInteger('nb_garage')->nullable();
            $table->tinyInteger('nb_parking')->nullable();
            $table->tinyInteger('nb_balcony')->nullable();
            $table->string('type_kitchen', 255)->nullable();
            $table->string('heaters', 255)->nullable();
            $table->tinyInteger('communal_heating');
            $table->tinyInteger('furnished');
            $table->tinyInteger('private_parking');
            $table->tinyInteger('handicap_access');
            $table->tinyInteger('cellar');
            $table->tinyInteger('terrace');
            $table->tinyInteger('swimming_pool')->nullable();
            $table->tinyInteger('fireplace')->nullable();
            $table->tinyInteger('all_in_sewer');
            $table->tinyInteger('septik_tank');
            $table->decimal('property_charge')->nullable();
            $table->tinyInteger('attic');
            $table->tinyInteger('elevator');
            $table->decimal('rental_charge')->nullable();
            $table->decimal('coownership_charge')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::drop('estates');
    }
}
