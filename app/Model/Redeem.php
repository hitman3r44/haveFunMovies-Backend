<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{
    public function moderator() {
    	return $this->belongsTo('App\Model\Moderator');
    }
}
