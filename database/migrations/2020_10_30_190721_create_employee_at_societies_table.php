<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAtSocietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_at_societies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('other_society_data_id');
            $table->string('society_data');
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
        Schema::dropIfExists('employee_at_societies');
    }
}
