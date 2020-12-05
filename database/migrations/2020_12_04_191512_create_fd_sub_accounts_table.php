<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdSubAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fd_sub_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sub_account_id')->nullable();
            $table->string('deposite_type_id')->nullable();
            $table->string('fd_interest_type_id')->nullable();
            $table->string('is_enable')->default('1');
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('fd_sub_accounts');
    }
}
