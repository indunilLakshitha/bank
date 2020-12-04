<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalNomimies extends Model
{

    protected $table='external_nominies_for_member';
    protected $fillable=['member_id','relation_type','contact_no','name','nic','address','created_at','updated_at'];
}
