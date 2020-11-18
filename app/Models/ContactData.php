<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactData extends Model
{
    protected $table= 'contact_data';
    protected $fillable = [
        'customer_id',
        'contact_type_id',
        'contact_data',
        'is_enable',
        'created_by',
        'updated_by',

    ];
}
