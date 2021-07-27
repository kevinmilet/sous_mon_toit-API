<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitAssociates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('associates', function(Blueprint $table) {

            $table->foreignId('id_customer')->constrained()->references('id')->on('customers');
            $table->foreignId('id_contract')->constrained()->references('id')->on('contracts');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('associates');
    }
}
