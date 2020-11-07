<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('product_type_id');
            $table->double('min_interest');
            $table->unsignedBigInteger('deposite_mode_id');
            $table->tinyInteger('is_overide_parameters')->nullable();
            $table->unsignedBigInteger('interest_type_id');
            $table->unsignedBigInteger('currency_id');
            $table->string('interest_credit_date');
            $table->string('req_authorized_level');
            $table->double('minimum_balance');
            $table->double('default_interest');
            $table->string('max_interest');

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
        Schema::dropIfExists('product_data');
    }
}
