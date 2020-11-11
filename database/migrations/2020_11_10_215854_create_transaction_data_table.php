<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_data', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('payment_method_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('account_id');
            $table->string('transaction_type');
            $table->string('transaction_details')->nullable();

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
        Schema::dropIfExists('transaction_data');
    }
}
