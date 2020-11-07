<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJoinaccountMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joinaccount_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('join_account_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('ownership_percentage');

            $table->tinyInteger('is_main_holder')->nullable();
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
        Schema::dropIfExists('joinaccount_members');
    }
}
