<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_category_id')->nullable();
            $table->string('account_type_id')->nullable();
            $table->string('maximum_joint_account')->nullable();
            $table->string('transfer_process_id')->nullable();
            $table->string('product_transfered_id')->nullable();
            $table->tinyInteger('is_guardian_required')->default(0);
            $table->tinyInteger('is_minor_account_allowed')->default(0);
            $table->integer('min_age')->nullable();
            $table->integer('max_age')->nullable();
            $table->integer('number_account_customer')->nullable();
            $table->tinyInteger('is_override_account_level')->default(0);
            $table->tinyInteger('has_atm')->default(0);
            $table->tinyInteger('has_sms')->default(0);
            $table->tinyInteger('has_internet_banking')->default(0);
            $table->tinyInteger('has_mobile_banking')->default(0);
            $table->tinyInteger('has_internal_transaction_sms')->default(0);
            $table->tinyInteger('has_nonresident_incorparating')->default(0);
            $table->tinyInteger('has_gift_applicable')->default(0);
            $table->tinyInteger('has_own_bank_account')->default(0);
            $table->tinyInteger('has_atm_facility')->default(0);
            $table->string('domaint_period_days')->nullable();
            $table->string('inactive_period_days')->nullable();
            $table->tinyInteger('statment_generate_frequently_id')->default(0);
            $table->tinyInteger('currency_id')->default(0);
            $table->string('account_authorized_level')->nullable();
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
        Schema::dropIfExists('sub_accounts');
    }
}
