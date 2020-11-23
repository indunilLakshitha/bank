<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainType extends Model
{
    protected $table = 'main_types';

    protected $fillable = [
        'main_type',
        'main_type_code',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
