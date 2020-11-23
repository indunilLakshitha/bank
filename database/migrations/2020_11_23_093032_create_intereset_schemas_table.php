<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteresetSchemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intereset_schemas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sub_account_id')->nullable();
            $table->string('interest_type_id')->nullable();
            $table->string('bonus_date')->nullable();
            $table->string('interest_frequently_id')->nullable();
            $table->string('interest_credit_dated')->nullable();

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
        Schema::dropIfExists('intereset_schemas');
    }
}
