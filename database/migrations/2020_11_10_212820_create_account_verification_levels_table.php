<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountVerificationLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_verification_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('account_id')->nullable();

            $table->string('verified_level')->nullable();
            $table->string('verified_level_to_be')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('account_verification_levels');
    }
}
