<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CutomerTitle extends Model
{
    protected $table= 'cutomer_titles';
    protected $fillable = [
        'customer_title',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
