<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainType extends Model
{
    protected $table = 'cutomer_main_types';

    protected $fillable = [
        'customer_id',
        'non_member',
        'member',
        'guarantor',
        'supplier',
        'customer',
        'child',
        'introducer',
       
    ];
}
