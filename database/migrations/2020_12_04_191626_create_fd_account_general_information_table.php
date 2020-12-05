<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdAccountGeneralInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fd_account_general_information', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('sub_product_id')->nullable();
            $table->string('deposite_type_id')->nullable();
            $table->string('fd_interest_type_id')->nullable();
            $table->string('certificate_number')->nullable();
            $table->string('account_description')->nullable();
            $table->string('start_date')->nullable();
            $table->string('introducer_id')->nullable();
            $table->string('min_interest')->nullable();
            $table->string('max_interest')->nullable();
            $table->string('set_interest')->nullable();
            $table->string('deposite_period_id')->nullable();
            $table->string('close_date')->nullable();
            $table->string('deposite_amount')->nullable();
            $table->string('is_auto_renew')->nullable();
            $table->string('interest_amount')->nullable();
            $table->string('num_of_renew')->nullable();
            $table->string('saving_account_id')->nullable();
            $table->string('is_enable')->default('1');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('fd_account_general_information');
    }
}
