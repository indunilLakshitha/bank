<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductFeeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_fee_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('product_data_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('fee_type_id');
            $table->unsignedBigInteger('fee_details_id');

            $table->tinyInteger('is_tax_applicable')->nullable();
            $table->tinyInteger('is_mandatory')->nullable();
            $table->tinyInteger('is_enable')->nullable();
            $table->double('amount');
            $table->double('fee_payble_text');
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
        Schema::dropIfExists('product_fee_data');
    }
}
