<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NomineeMember extends Model
{
    protected $table= 'nominee_members';
    protected $fillable = [
        'customer_id',
        'product_data_id',
        'account_id',
        'nominee_percentage',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
