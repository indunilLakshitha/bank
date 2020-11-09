<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Joinaccount extends Model
{
    protected $table= 'join_accounts';
    protected $fillable = [
        'customer_id',
        'product_data_id',
        'account_id',
        'holders_count',
        'withdrawal_limit_holder',
        'minimum_auth_count',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
