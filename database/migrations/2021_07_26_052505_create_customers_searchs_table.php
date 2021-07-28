<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersSearchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_searchs', function (Blueprint $table) {
            $table->id('id');
            $table->string('buy_or_rent');
            $table->integer('surface_min')->default(NULL)->nullable();
            $table->integer('number_rooms')->default(NULL)->nullable();
            $table->decimal('budget_min', $precision = 15, $scale = 2)->default(NULL)->nullable();
            $table->decimal('budget_max', $precision = 15, $scale = 2)->default(NULL)->nullable();
            $table->decimal('search_longitude', $precision = 10, $scale = 2)->default(NULL)->nullable();
            $table->decimal('search_latitude', $precision = 10, $scale = 2)->default(NULL)->nullable();
            $table->integer('search_radius')->default(NULL)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->default(NULL)->nullable();
            $table->boolean('alert');
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
        Schema::dropIfExists('customers_searchs');
    }
}
