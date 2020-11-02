<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialData extends Model
{
    protected $fillable = [
        'customer_id',
        'special_information',
        'is_real_member',
    ];
}
