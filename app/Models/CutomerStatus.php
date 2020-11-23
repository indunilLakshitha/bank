<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutomerStatus extends Model
{

    protected $table= 'cutomer_statuses';
    protected $fillable = [
        'customer_status',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
