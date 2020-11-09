<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDocument extends Model
{
    protected $table = 'product_documents';

    protected $fillable = [
        'account_id',
        'product_data_id',
        'customer_id',
        'document_id',
        'img',
        'is_enable',
        'created_by',
        'updated_by',
    ];
}
