<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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


    public static function boot()
    {
        //execute the parent's boot method
        parent::boot();

        static::creating(function ($post) {
            $post->created_by = Auth::check() ? Auth::user()->id : 1;
        });

    }


}
