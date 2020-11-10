<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthorizedOfficer extends Model
{
    protected $table= 'authorized_officers';
    protected $fillable = [
        'user_id',
        'authorized_level',
        'withdrawal_limit',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
