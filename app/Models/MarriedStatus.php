<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarriedStatus extends Model
{
    protected $table = 'married_statuses';

    protected $fillable = [
        'married_status',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
