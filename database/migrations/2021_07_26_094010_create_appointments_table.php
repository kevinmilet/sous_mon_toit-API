<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments_types', function (Blueprint $table) {
            $table->id('id');
            $table->string('appointment_type');
        });

        Schema::create('appointments', function (Blueprint $table) { 
            $table->id('id');
            $table->dateTime('scheduled_at');
            $table->dateTime('created_at');
            $table->text('notes')->nullable();
            $table->foreignId('id_estate')->constrained()->references('id')->on('estates');
            $table->foreignId('id_staff')->constrained()->references('id')->on('staffs');
            $table->foreignId('id_customer')->constrained()->references('id')->on('customers');
            $table->foreignId('id_appointment_type')->constrained('appointments_types')->references('id')->on('appointments_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
        Schema::dropIfExists('appointments_types');
    }
}
