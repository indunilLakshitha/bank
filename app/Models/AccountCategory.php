<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountCategory extends Model
{
    protected $table= 'account_categories';
    protected $fillable = [
        'account_category',
        'account_category_code',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
