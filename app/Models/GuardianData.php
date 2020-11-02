<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuardianData extends Model
{
    protected $fillable = [
        'customer_id',
        'is_enable',
        'created_by',
        'updated_by',
        'guardian_id',

    ];
}
