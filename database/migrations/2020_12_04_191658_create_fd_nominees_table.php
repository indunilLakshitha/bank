<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFdNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fd_nominees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fd_account_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('nominee_full_name')->nullable();
            $table->string('nominee_nic_number')->nullable();
            $table->string('nominee_mobile_number')->nullable();
            $table->string('nominee_email_address')->nullable();
            $table->string('nominee_address')->nullable();
            $table->string('is_enable')->default('1');
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
        Schema::dropIfExists('fd_nominees');
    }
}
