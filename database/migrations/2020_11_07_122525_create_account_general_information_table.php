<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountGeneralInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_general_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('lead_source_category_id');
            $table->string('account_description');
            $table->string('lead_source_identification');
            $table->unsignedBigInteger('account_category_id');
            $table->unsignedBigInteger('account_type_id');
            $table->string('account_number');
            $table->unsignedBigInteger('branch_id');
            $table->tinyInteger('has_passbook');
            $table->tinyInteger('has_internet_banking');
            $table->tinyInteger('has_mobile_banking');
            $table->tinyInteger('has_internet_banking');
            $table->tinyInteger('has_sms');
            $table->tinyInteger('has_atm');
            
            $table->tinyInteger('is_enable')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_general_information');
    }
}
