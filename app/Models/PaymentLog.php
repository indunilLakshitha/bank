<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
   protected $fillable=[
    'customer_id',
     'account_id',
      'transaction_data_id',
       'transaction_type',
        'transaction_value',
         'balance_amount',
         'is_enable',
         'created_by',
         'updated_by',
         'created_at',
         'updated_at'

   ];
}
