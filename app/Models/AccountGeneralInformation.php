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
        'branch_id',
        'has_passbook',
        'has_internet_banking',
        'has_mobile_banking',
        'has_sms',
        'has_atm',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
