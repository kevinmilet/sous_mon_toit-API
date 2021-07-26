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
            $table->id('id_appointment_type');
            $table->string('appointment_type');
        });

        Schema::create('appointments', function (Blueprint $table) { 
            $table->id('id_appointments');
            $table->dateTime('scheduled_at');
            $table->text('notes')->nullable();
            $table->foreignId('id_estate')->constrained();
            $table->foreignId('id_staffs')->constrained();
            $table->foreignId('id_customer')->constrained();
            $table->foreignId('id_appointment_type')->constrained('appointment_types');
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
