<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFeeData extends Model
{
    protected $table = 'product_fee_data';

    protected $fillable = [
        'account_id',
        'product_data_id',
        'customer_id',
        'fee_type_id',
        'fee_details_id',
        'is_tax_applicable',
        'is_mandatory',
        'amount',
        'fee_payble_text',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
