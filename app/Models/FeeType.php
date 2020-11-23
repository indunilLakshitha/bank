<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeeType extends Model
{
    protected $table= 'fee_types';
    protected $fillable = [
        'fee_type',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
