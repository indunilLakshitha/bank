<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FdNominee extends Model
{
    protected $fillable=[
        'fd_account_id',
        'customer_id',
        'nominee_full_name',
        'nominee_nic_number',
        'nominee_mobile_number',
        'nominee_email_address',
        'nominee_address',
        'is_enable',
        'created_by',
        'updated_by',
       ];
}
