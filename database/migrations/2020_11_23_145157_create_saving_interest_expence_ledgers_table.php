<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingInterestExpenceLedgersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saving_interest_expence_ledgers', function (Blueprint $table) {
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
        Schema::dropIfExists('saving_interest_expence_ledgers');
    }
}