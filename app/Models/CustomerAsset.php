<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerAsset extends Model
{
    protected $fillable = [
        'customer_id',
        'asset_description',
        'asset_qty',
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
