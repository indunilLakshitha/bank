<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class saving_closing_fee_income extends Model
{
    protected $fillable = [
        'transaction_data_id',
        'customer_id',
        'account_id',
        'transaction_type',
        'transaction_value',
        'balance_amount',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
