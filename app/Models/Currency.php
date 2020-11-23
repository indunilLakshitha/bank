<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table= 'currencies';
    protected $fillable = [
        'currency_name',
        'currency_code',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
