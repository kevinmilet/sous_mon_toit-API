<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id_customer');
            $table->string('n_customer', 255);
            $table->string('firstname', 255);
            $table->string('lastname', 255);
            $table->string('gender', 1);
            $table->string('mail', 255)->nullable();
            $table->string('phone', 15);
            $table->string('password', 255)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('address', 255)->nullable();
            $table->dateTime('created_at');
            $table->dateTime('archived_at')->nullable();
            $table->dateTime('updated_at')->nullable();
            $table->tinyInteger('first_met', 1);
            $table->string('token', 255)->nullable();
            $table->tinyInteger('password_request', 1)->nullable();
            
        });

        //
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
