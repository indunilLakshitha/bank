<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionSchema extends Model
{
    protected $fillable = [
        'sub_account_id',
        'minimum_balance_activate',
        'deposite_mode_id',
        'maximum_balance',
        'month_max_withdrawal_count',
        'minimum_withdrawal_amount',
        'maximum_withdrawal_limit_day',
        'is_dislpay_account_balance',
        'is_allow_fund_trasfer',
        'is_enable',
        'created_by',
        'updated_by',
        '',
        '',
    ];
}
