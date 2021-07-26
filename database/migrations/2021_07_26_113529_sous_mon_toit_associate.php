<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitAssociate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associate', function(Blueprint $table) {
            $table->primary('id_customer');
            $table->integer('id_contract', 11)->unsigned();
            $table->foreign('id_contract')->references('id_contract')->on('contract');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('associate');
    }
}
