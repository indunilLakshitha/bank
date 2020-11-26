<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeData extends Model
{
    protected $table = 'fee_data';

    protected $fillable  = [
        'sub_account_id',
        'fee_description_id',
        'fee_code',
        'fee_category_id',
        'fee_type_id',
        'calculation_basic_id',
        'minimum_amount',
        'maximum_amount',
        'fee_amount',
        'fee_rate',
        'trigerring_point_id',
        'is_mandatory',
        'is_tax_appliable',
        'tax_type_id',
        'tax_value',
        'is_enable',
        'created_by',
        'updated_by',
        '',
        '',
        '',
    ];
}
