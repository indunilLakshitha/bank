<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesCash extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cash_in_hand_ledgers', function (Blueprint $table) {
$table->double('branch_balance')->nullable();
$table->string('user_id')->nullable();
        });
        Schema::table('saving_deposite_base_ledgers', function (Blueprint $table) {
$table->double('branch_balance')->nullable();
$table->string('user_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
