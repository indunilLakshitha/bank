<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashierDailyTransaction extends Model
{
    protected $fillable=[
        'user_id',
'transaction_id',
'transaction_code',
'account_number',
'branch_id',
'transaction_date',
'transaction_type',
'transaction_amount',
'balance_value',
'branch_balance',
'is_enable',
    ];
}
