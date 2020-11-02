<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OccupationData extends Model
{
    protected $fillable = [
        'customer_id',
        'is_employee',
        'designation',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'address_line_4',
        'epf_no',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
