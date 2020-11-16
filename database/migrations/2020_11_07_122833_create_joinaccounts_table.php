<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinaccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('join_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_data_id');
            $table->unsignedBigInteger('account_id');
            $table->string('holders_count');
            $table->string('withdrawal_limit_holder');
            $table->string('minimum_auth_count');
            $table->string('oh_identification_number');
            $table->tinyInteger('oh_identification_type_id');
            $table->string('oh_name');

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
        Schema::dropIfExists('join_accounts');
    }
}
