<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class saving_deposit_base_ledger extends Model
{
    protected $table ='saving_deposite_base_ledgers';

    protected $fillable = [
        'transaction_data_id',
        'customer_id',
        'account_id',
        'transaction_type',
        'transaction_value',
        'balance_amount',
        'is_enable',
        'branch_balance',
        'user_id',
        'transaction_date',

    ];
}
