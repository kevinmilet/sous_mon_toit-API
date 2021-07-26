<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersSearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_search', function (Blueprint $table) {
            $table->id('id');
            $table->string('buy_or_rent');
            $table->integer('surface_min')->default(NULL);
            $table->integer('number_rooms')->default(NULL);
            $table->decimal('budget_min', $precision = 15, $scale = 2);
            $table->decimal('budget_max', $precision = 15, $scale = 2);
            $table->decimal('search_longitude', $precision = 10, $scale = 2);
            $table->decimal('search_latitude', $precision = 10, $scale = 2);
            $table->integer('search_radius');
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->default(NULL);
            $table->tinyInteger('alert');
            $table->integer('id_customer')->references('id')->on('customers');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers_search');
    }
}
