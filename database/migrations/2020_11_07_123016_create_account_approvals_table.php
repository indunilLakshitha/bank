<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('approval_level');
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('product_data_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('authorized_officer_id');
            $table->string('approval_comment');

            $table->tinyInteger('is_approve')->nullable();
            $table->tinyInteger('is_enable')->nullable();
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
        Schema::dropIfExists('account_approvals');
    }
}
