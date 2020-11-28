<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table= 'branches';
    protected $fillable = [
        'branch_name',
        'branch_code',
        'is_enable',
        'created_by',
        'updated_by',

    ];

}
