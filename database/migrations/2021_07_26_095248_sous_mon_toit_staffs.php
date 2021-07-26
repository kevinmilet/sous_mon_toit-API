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
            $table->primary('id_staffs');
            $table->string('login', 50);
            $table->string('firstname', 50);
            $table->string('lastname', 50);
            $table->dateTime('created_at');
            $table->dateTime('updated_at')->nullable()->default(null);
            $table->dateTime('archived_at')->nullable()->default(null);
            $table->string('mail', 255);
            $table->string('phone', 15);
            $table->string('password', 255)->nullable()->default(null);
            $table->string('avatar', 255)->nullable()->default(null);
            $table->boolean('alert_reader');
            $table->integer('id_function', 11)->unsigned();
            $table->foreign('id_function')->references('id_function')->on('functions');
            $table->integer('id_roles', 11)->unsigned();
            $table->foreign('id_roles')->references('id_roles')->on('roles');
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
