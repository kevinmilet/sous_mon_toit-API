<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function(Blueprint $table) {
            $table->id('id');
            $table->string('login', 50);
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable()->default(NULL);
            $table->dateTime('deleted_at')->nullable()->default(NULL);
            $table->string('mail', 255);
            $table->string('phone', 15);
            $table->string('password', 255)->nullable()->default(NULL);
            $table->string('avatar', 255)->nullable()->default(NULL);
            $table->boolean('alert_reader');
            $table->foreignId('id_function')->constrained()->references('id')->on('functions');
            $table->foreignId('id_role')->constrained()->references('id')->on('roles');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staffs');
    }
}
