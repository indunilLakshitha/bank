<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubAccount extends Model
{
 protected $fillable=   [
     'account_category_id',
'account_type_id',
'maximum_joint_account',
'transfer_process_id',
'product_transfered_id',
'is_guardian_required',
'is_minor_account_allowed',
'min_age',
'max_age',
'number_account_customer',
'is_override_account_level',
'has_atm',
'has_sms',
'has_internet_banking',
'has_mobile_banking',
'has_internal_transaction_sms',
'has_nonresident_incorparating',
'has_gift_applicable',
'has_own_bank_account',
'has_atm_facility',
'domaint_period_days',
'inactive_period_days',
'statment_generate_frequently_id',
'currency_id',
'account_authorized_level',
'is_enable',
'created_by',
'updated_by',
'created_at',
'updated_at',

];
}
