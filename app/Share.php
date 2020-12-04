<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $table = 'transaction_shares';

    protected $fillable = [
        'member_id',
        'transaction_type',
        'transaction_code',
        'transaction_details',
        'account_id',
        'customer_id',
        'branch_id',
        'is_enable',
        'balance_value',
        'created_by',
        'updated_by',
        'transaction_value'
    ];
}
