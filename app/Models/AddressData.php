<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressData extends Model
{
    protected $table= 'address_data';
    protected $fillable = [
        'address_line_1',
        'customer_id',
        'address_line_2',
        'address_line_3',
        'address_line_4',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
