<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Redeem extends Model
{
    public function moderator() {
    	return $this->belongsTo('App\Model\Moderator');
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
