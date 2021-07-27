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
        Schema::create('customers_types', function(Blueprint $table) {

            $table->id('id');
            $table->string('customer_type', 50);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< HEAD:database/migrations/2021_07_26_120006_sous_mon_toit_customer_type.php
        Schema::dropIfExists('customers_types');
=======
        Schema::dropIfExists('customer_types');
>>>>>>> dev:database/migrations/2021_07_26_095521_sous_mon_toit.php
    }
}
