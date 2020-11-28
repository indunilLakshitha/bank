<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'customer_id',
        'member_number',
        'share_amount',
        'is_enable',
        'created_by',
        '',
        '',
        '',
        '',
        '',
    ];
}
