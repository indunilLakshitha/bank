<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionData extends Model
{
    protected $fillable=['payment_method_id',
                            'customer_id',
                            'account_id',
                            'transaction_type',
                            'transaction_detail',
                            'transaction_value',
                            'is_enable',
                            'created_by',
                            'updated_by',
                            'created_at',
                            'updated_at'
                        ];
}
