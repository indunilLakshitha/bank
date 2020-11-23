<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionSchemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_schemas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sub_account_id')->nullable();
            $table->double('minimum_balance_activate')->nullable();
            $table->string('deposite_mode_id')->default(0);
            $table->double('maximum_balance')->nullable();
            $table->double('month_max_withdrawal_count')->nullable();
            $table->double('minimum_withdrawal_amount')->nullable();
            $table->double('maximum_withdrawal_limit_day')->nullable();
            $table->tinyInteger('is_dislpay_account_balance')->default(0);
            $table->tinyInteger('is_allow_fund_trasfer')->default(0);

            $table->tinyInteger('is_enable')->default(0);
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
        Schema::dropIfExists('transaction_schemas');
    }
}
