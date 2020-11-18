<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DownCustomerBasicData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customer_basic_data', function (Blueprint $table) {
            $table->string('non_member')->nullable();
            $table->string('member')->nullable();
            $table->string('guarantor')->nullable();
            $table->string('supplier')->nullable();
            $table->string('customer')->nullable();
            $table->string('child')->nullable();
            $table->string('introducer')->nullable();
            
        });
    }
}
