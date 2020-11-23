<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sub_account_id')->nullable();
            $table->string('fee_description_id')->nullable();
            $table->string('fee_code')->nullable();
            $table->string('fee_category_id')->nullable();
            $table->string('fee_type_id')->nullable();
            $table->string('calculation_basic_id')->nullable();
            $table->string('minimum_amount')->nullable();
            $table->string('maximum_amount')->nullable();
            $table->string('fee_amount')->nullable();
            $table->string('fee_rate')->nullable();
            $table->string('trigerring_point_id')->nullable();
            $table->tinyInteger('is_mandatory')->default(0);
            $table->tinyInteger('is_tax_appliable')->default(0);
            $table->string('tax_type_id')->nullable();
            $table->double('tax_value')->nullable();

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
        Schema::dropIfExists('fee_data');
    }
}
