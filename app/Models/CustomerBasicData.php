<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CustomerBasicData extends Model
{

    // public function insert(Request $request){

    //     return $request;
    // }
    protected $fillable = [
        'customer_id',
        'customer_status_id',
        'customer_title_id',
        'name_in_use',
        'full_name',
        'surname',
        'main_type_id',
        'branch_id',
        'account_category_id',
        'small_group_id',
        'sub_account_office_id',
        'identification_type_id',
        'identification_number',
        'is_enable',
        'created_by',
        'updated_by',
        'sign_img'

    ];
}
