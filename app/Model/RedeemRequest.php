<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RedeemRequest extends Model
{
    public function moderator() {
    	return $this->hasOne('App\Moderator', 'id', 'moderator_id');
    }
}
