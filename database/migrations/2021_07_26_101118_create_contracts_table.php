<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('contracts_type', function(Blueprint $table) {
            $table->id('id');
            $table->string('contract_type');
            $table->string('template_path');
        });
        
        Schema::create('contracts', function (Blueprint $table) {
            $table->id('id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->dateTime('archived_at');
            $table->string('folder');
            $table->string('name');
            $table->foreignId('id_staffs')->references('id')->on('staffs');;
            $table->foreignId('id_estate')->references('id')->on('estates');;
            $table->foreignId('contract_type_id')->references('id')->on('contract_type');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contracts');
        Schema::dropIfExists('contracts_type');

    }
}
