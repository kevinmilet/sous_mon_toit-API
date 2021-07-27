<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_types', function (Blueprint $table) {
            $table->id('id');
            $table->string('appointment_type');
        });

        Schema::create('appointments', function (Blueprint $table) { 
            $table->id('id');
            $table->dateTime('scheduled_at');
            $table->text('notes')->nullable();
<<<<<<< HEAD
            $table->foreignId('id_estate')->constrained()->references('id')->on('estates');;
            $table->foreignId('id_staffs')->constrained()->references('id')->on('staffs');;
            $table->foreignId('id_customer')->constrained()->references('id')->on('customers');;
            $table->foreignId('id_appointment_type')->constrained('appointment_types')->references('id')->on('appointment_types');;
=======
            $table->foreignId('id_estate')->constrained()->references('id')->on('estates');
            $table->foreignId('id_staffs')->constrained()->references('id')->on('staffs');
            $table->foreignId('id_customer')->constrained()->references('id')->on('customers');
            $table->foreignId('id_appointment_type')->constrained('appointment_types')->references('id')->on('appointment_types');
>>>>>>> origin/stephane
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
        Schema::dropIfExists('appointment_types');
    }
}
