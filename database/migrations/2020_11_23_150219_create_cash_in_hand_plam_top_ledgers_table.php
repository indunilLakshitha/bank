<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashInHandPlamTopLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_in_hand_plam_top_ledgers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transaction_data_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('account_id')->nullable();
            $table->string('transaction_type')->nullable();
            $table->string('transaction_value')->nullable();
            $table->string('balance_amount')->nullable();
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
        Schema::dropIfExists('cash_in_hand_plam_top_ledgers');
    }
}
