<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SousMonToitDescribeCustomerType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('describe_customer_type', function(Blueprint $table) {
            $table->primary('id_customer');
            $table->integer('id_customers_types', 11)->unsigned();
            $table->foreign('id_customers_types')->references('id_customers_types')->on('customers_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('describe_customer_type');
    }
}
