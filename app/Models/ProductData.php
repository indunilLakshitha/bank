<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductData extends Model
{
    protected $table = 'product_data';

    protected $fillable = [
        'account_id',
        'product_type_id',
        'min_interest',
        'deposite_mode_id',
        'is_overide_parameters',
        'interest_type_id',
        'currency_id',
        'interest_credit_date',
        'req_authorized_level',
        'minimum_balance',
        'default_interest',
        'max_interest',
        'interest_rate',
        'account_level',
        'interest_credit_date',
        'initial_deposit_allow',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
