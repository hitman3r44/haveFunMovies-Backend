<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class EmailTemplate extends Model
{



    public static function boot()
    {
        //execute the parent's boot method
        parent::boot();

        static::creating(function ($post) {
            $post->created_by = Auth::check() ? Auth::user()->id : 0;
        });

    }
}
