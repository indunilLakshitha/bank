<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name', 256);
            $table->string('customer_mobile', 100);
            $table->string('customer_email', 256);
            $table->string('customer_address', 512);
            $table->tinyInteger('is_enable')->default(1);//1:enable 2:disable / soft delete
            $table->tinyInteger('assign_user_id')->default(1);
            $table->tinyInteger('create_user_id')->default(1);
            $table->timestamps();
            $table->tinyInteger('update_user_id')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
