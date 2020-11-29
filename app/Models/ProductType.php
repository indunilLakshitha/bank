<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
  protected $table = 'product_types';

    protected $fillable = [
        'product_type',
        'req_authorized_level',
        'max_interest',
        'default_interest',
        'minimum_balance',
        'is_beneficiearies_required',
        'is_nominies_required',
        'is_guardianes_required',
        'is_documents_required',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
