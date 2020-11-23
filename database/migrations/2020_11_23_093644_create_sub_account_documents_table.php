<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAccountDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_account_documents', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('sub_account_id')->nullable();
            $table->string('document_code')->nullable();
            $table->string('document_name')->nullable();
            $table->tinyInteger('is_mandatory')->default(0);


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
        Schema::dropIfExists('sub_account_documents');
    }
}
