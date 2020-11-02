<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Dfdfdf extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('other_society_data', function (Blueprint $table) {
            $table->text('other_memberships')->nullable();
            $table->string('current_designation')->nullable();
        });

        Schema::table('guardian_data', function (Blueprint $table) {
            $table->string('guardian_id')->nullable();
        });

        Schema::table('beneficiary_data', function (Blueprint $table) {
            $table->string('beneficiary_id')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
