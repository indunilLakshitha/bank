<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OtherSocietyData extends Model
{
    protected $fillable = [
        'customer_id',
        'previous_designation',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
