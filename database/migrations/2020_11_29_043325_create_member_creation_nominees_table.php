<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberCreationNomineesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('member_creation_nominees', function (Blueprint $table) {
            // $table->bigIncrements('id');
            // $table->string('member_id')->nullable();
            // $table->string('nominee_id')->nullable();
            // $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_creation_nominees');
    }
}
