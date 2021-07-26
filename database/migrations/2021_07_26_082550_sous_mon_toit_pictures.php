<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitPictures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function(Blueprint $table) {
            $table->primary('id_picture');
            $table->string('folder', 255)->nullable()->default(null);
            $table->string('name', 255);
            $table->boolean('cover')->nullable()->default(null);
            $table->string('alt', 255)->nullable()->default(null);
            $table->integer('id_estate', 11)->unsigned();
            $table->foreign('id_estate')->references('id_estate')->on('estates');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pictures');
    }
}
