<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerStatusDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_status_dates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->string('date_of_birth');
            $table->unsignedBigInteger('religion_data_id');
            $table->unsignedBigInteger('married_status_id');
            $table->string('member_date');
            $table->string('join_date');
            $table->string('expire_date');
            $table->string('exit_date');
            $table->string('death_date');
            $table->string('neglection_starting_date');
            $table->tinyInteger('is_enable');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::dropIfExists('customer_status_dates');
    }
}
