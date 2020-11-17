<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCustomerBasicData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customer_basic_data', function (Blueprint $table) {
            $table->string('short_name')->nullable();
            $table->string('non_member')->nullable();
            $table->string('member')->nullable();
            $table->string('guarantor')->nullable();
            $table->string('supplier')->nullable();
            $table->string('customer')->nullable();
            $table->string('child')->nullable();
            $table->string('introducer')->nullable();
            $table->string('office_sub_id')->nullable();
            $table->string('address_data');
            $table->string('telephone_no_type');
            $table->string('telephone_number');
            $table->string('fax_number')->nullable();
            $table->string('email_address')->nullable();
        });
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
