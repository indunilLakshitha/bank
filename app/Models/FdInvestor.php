<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FdInvestor extends Model
{
   protected $fillable=[
    'fd_account_id',
    'customer_id',
    'investor_full_name',
    'investor_nic_number',
    'investor_mobile_number',
    'investor_email_address',
    'investor_address',
    'is_enable',
    'created_by',
    'updated_by',
   ];
}
