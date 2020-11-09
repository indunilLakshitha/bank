<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JoinaccountMember extends Model
{
    protected $table= 'joinaccount_members';
    protected $fillable = [
        'join_account_id',
        'customer_id',
        'ownership_percentage',
        'is_main_holder',
        'other_holder_sign_img',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
