<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $table= 'genders';
    protected $fillable = [
        'gender',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
