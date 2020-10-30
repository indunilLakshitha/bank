<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerBasicDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_basic_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_status_id');
            $table->unsignedBigInteger('customer_title_id');
            $table->string('name_in_use');
            $table->string('full_name');
            $table->string('surname');
            $table->unsignedBigInteger('main_type_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('account_category_id');
            $table->unsignedBigInteger('small_group_id');
            $table->unsignedBigInteger('sub_account_office_id');
            $table->unsignedBigInteger('identification_type_id');
            $table->string('identification_number');
            $table->tinyInteger('is_enable');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('customer_basic_data');
    }
}
