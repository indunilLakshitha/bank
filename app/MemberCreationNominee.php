<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberCreationNominee extends Model
{
    protected $fillable = ['member_id', 'nominee_id'];
}
