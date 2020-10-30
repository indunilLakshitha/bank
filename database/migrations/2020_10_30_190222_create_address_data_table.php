<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_data', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('customer_id');
             $table->unsignedBigInteger('contact_type_id');
             $table->string('address_line_1');
             $table->string('address_line_2');
             $table->string('address_line_3');
             $table->string('address_line_4');
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
        Schema::dropIfExists('address_data');
    }
}
