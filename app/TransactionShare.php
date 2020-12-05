<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionShare extends Model
{
   protected $table='transaction_shares';
   protected $fillable=[
       'member_id',
       'transaction_type',
       'transaction_code',
       'transaction_details',
       'customer_id',
       'branch_id',
       'is_enable',
       'created_by',
       'created_at',
       'updated_by',
       'updated_at',
       'transaction_value',
       'balance_value',
    ];
}
