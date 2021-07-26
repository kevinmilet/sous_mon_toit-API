<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitCustomerType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_type', function(Blueprint $table) {
            $table->primary('id_customers_types');
            $table->string('estate_type', 50);
            $table->foreign('estate_type')->references('id_estates_types')->on('estates_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
