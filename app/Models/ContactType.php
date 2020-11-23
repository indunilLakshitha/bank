<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $table= 'contact_types';
    protected $fillable = [
        'contact_type',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
