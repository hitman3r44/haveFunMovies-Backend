<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class RedeemRequest extends Model
{
    public function moderator() {
    	return $this->hasOne('App\Moderator', 'id', 'moderator_id');
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
