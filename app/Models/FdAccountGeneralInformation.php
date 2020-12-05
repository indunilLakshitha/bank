<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FdAccountGeneralInformation extends Model
{
   protected $fillable=[
       'account_id',
'customer_id',
'branch_id',
'sub_product_id',
'deposite_type_id',
'fd_interest_type_id',
'certificate_number',
'account_description',
'start_date',
'introducer_id',
'min_interest',
'max_interest',
'set_interest',
'deposite_period_id',
'close_date',
'deposite_amount',
'is_auto_renew',
'interest_amount',
'num_of_renew',
'saving_account_id',
'is_enable',
'created_by',
'updated_by',
   ];
}
