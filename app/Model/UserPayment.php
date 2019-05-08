<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserPayment extends Model
{
    public function adminVideo() {
        return $this->belongsTo('App\Model\AdminVideo');
    }

    public function user() {
        return $this->belongsTo('App\Model\User');
    }

    public function subscription() {
    	return $this->belongsTo('App\Model\Subscription');
    }
}
