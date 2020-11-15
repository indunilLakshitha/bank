<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerStatusDates extends Model
{
    protected $fillable = [
        'customer_id',
        'date_of_birth',
        'religion_data_id',
        'married_status_id',
        'member_date',
        'join_date',
        'expire_date',
        'exit_date',
        'death_date',
        'neglection_starting_date',
        'is_enable',
        'created_by',
        'updated_by',
        'gender_id',
    ];
}
