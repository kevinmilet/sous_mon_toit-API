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
            $table->foreignId('id_customer')->references('id')->on('customers');
            $table->string('title', 50);
            $table->string('reference', 50);
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
            $table->boolean('communal_heating')->default(0);
            $table->boolean('furnished')->default(0);
            $table->boolean('private_parking')->default(0);
            $table->boolean('handicap_access')->default(0);
            $table->boolean('cellar')->default(0);
            $table->boolean('terrace')->default(0);
            $table->boolean('swimming_pool')->default(0);
            $table->boolean('fireplace')->default(0);
            $table->boolean('all_in_sewer')->default(0);
            $table->boolean('septik_tank')->default(0);
            $table->decimal('property_charge')->nullable();
            $table->boolean('attic')->default(0);
            $table->boolean('elevator')->default(0);
            $table->decimal('rental_charge')->nullable();
            $table->decimal('coownership_charge')->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable();
            $table->dateTime('deleted_at')->nullable();


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
