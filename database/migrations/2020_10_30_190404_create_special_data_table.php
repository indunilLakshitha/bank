<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_data', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('customer_id');
             $table->string('special_information');
             $table->tinyInteger('is_real_member');
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
        Schema::dropIfExists('special_data');
    }
}
