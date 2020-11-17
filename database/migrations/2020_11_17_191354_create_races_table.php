<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('race');
            $table->string('is_enable')->default(1);
            $table->timestamps();
        });

        Schema::table('cutomer_main_types', function (Blueprint $table) {
            $table->string('non_member')->nullable();
            $table->string('member')->nullable();
            $table->string('guarantor')->nullable();
            $table->string('supplier')->nullable();
            $table->string('customer')->nullable();
            $table->string('child')->nullable();
            $table->string('introducer')->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('races');
    }
}
