<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cash_in_hand_plam_top_ledger extends Model
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