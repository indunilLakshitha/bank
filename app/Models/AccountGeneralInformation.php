<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccountGeneralInformation extends Model
{
    protected $table = 'account_general_information';

    protected $fillable = [
        'customer_id',
        'lead_source_category_id',
        'account_description',
        'lead_source_identification',
        'account_category_id',
        'account_type_id',
        'account_number',
        'branch_code',
        'has_passbook',
        'has_internet_banking',
        'has_mobile_banking',
        'has_sms',
        'has_atm',
        'is_enable',
        'cus_sign_img',
        'created_by',
        'updated_by',
        'account_balance',
        'FATCA_clearance_received ',
        'PEP_clearance_received ',
        'sign_status',
        'customer_rating ',
        'has_account_statement ',
        'branch_id'

    ];
}
