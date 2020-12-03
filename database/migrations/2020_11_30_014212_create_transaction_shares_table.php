<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('transaction_shares', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('member_id')->nullable();
        //     $table->string('customer_id')->nullable();
        //     $table->string('account_id')->nullable();
        //     $table->string('branch_id')->nullable();
        //     $table->string('transaction_type')->nullable();
        //     $table->string('transaction_code')->nullable();
        //     $table->string('transaction_details')->nullable();
        //     $table->string('transaction_value')->nullable();
        //     $table->string('balance_amount')->nullable();
        //     $table->string('is_enable')->defualt(1);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_shares');
    }
}
