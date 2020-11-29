<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashierDailyTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashier_daily_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('transaction_code')->nullable();
            $table->string('account_number')->nullable();
            $table->string('branch_id')->nullable();
            $table->string('transaction_date')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('transaction_amount')->nullable();
            $table->string('balance_value')->nullable();
            $table->string('branch_balance')->nullable();
            $table->string('is_enable')->nullable();
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
        Schema::dropIfExists('cashier_daily_transactions');
    }
}
