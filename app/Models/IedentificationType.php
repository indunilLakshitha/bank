<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IedentificationType extends Model
{
    protected $table= 'iedentification_types';
    protected $fillable = [
        'identification_type',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}

