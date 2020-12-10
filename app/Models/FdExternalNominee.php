<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FdExternalNominee extends Model
{
    protected $fillable=  [
        'customer_id',
  'account_id',
  'relation_type',
  'name',
  'contact_no',
  'nic',
  'address'];
}
