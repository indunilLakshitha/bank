<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    protected $table= 'account_types';
    protected $fillable = [
        'account_type',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
