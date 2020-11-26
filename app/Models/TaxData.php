<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxData extends Model
{
    protected $table = 'tax_data';

    protected $fillable = [
        'sub_account_id',
        'is_debit_appliable',
        'debit_tax_rate',
        'is_wht_deduction',
        'is_enable',
        'created_by',
        'updated_by',
        '',
        '',
        '',
        '',
        '',
    ];
}
