<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOccupationDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupation_data', function (Blueprint $table) {
            $table->bigIncrements('id');
             $table->unsignedBigInteger('customer_id');
             $table->tinyInteger('is_employee');
             $table->string('designation');
             $table->string('address_line_1');
             $table->string('address_line_2');
             $table->string('address_line_3');
             $table->string('address_line_4');
             $table->string('epf_no');
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
        Schema::dropIfExists('occupation_data');
    }
}
