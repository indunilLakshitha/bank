<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteresetTypeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intereset_type_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('interest_schema_id')->nullable();
            $table->double('from_value')->nullable();
            $table->double('to_value')->nullable();
            $table->string('type_id')->nullable();

            $table->tinyInteger('is_enable')->default(0);
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
        Schema::dropIfExists('intereset_type_data');
    }
}
