<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalmtopPaymentLogsTable extends Migration
{
    
    public function up()
    {
        Schema::create('palmtop_payment_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('transaction_data_id');
            $table->string('transaction_type');
            $table->double('transaction_value');
            $table->double('balance_amount');
            $table->tinyInteger('is_enable')->nullable();
            $table->string('created_by');
            $table->string('updated_by')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('palmtop_payment_logs');
    }
}
