<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cash_in_hand_ledger extends Model
{
    protected $table='cash_in_hand_ledgers';
    protected $fillable = [
        'transaction_data_id',
        'customer_id',
        'account_id',
        'transaction_type',
        'transaction_value',
        'balance_amount',
        'is_enable',
        'created_at',
        'updated_at',
        'user_id',
    ];
}
