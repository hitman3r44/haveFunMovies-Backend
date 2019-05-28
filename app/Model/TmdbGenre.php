<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TmdbGenre extends Model
{
    public function adminVideo()
    {
        return $this->hasMany(AdminVideo::class);
    }

    public static function boot() {
        parent::boot();
        // Before update
        static::creating(function($post)
        {   // auth::check for seeding. cause while seeding there is no auth
            $post->created_by = Auth::check() ?  Auth::user()->id : 1;
            $post->updated_by = Auth::check() ?  Auth::user()->id : 1;
        });

        static::updating(function($post)
        {
            $post->updated_by = Auth::check() ?  Auth::user()->id : 1;
        });
    }
}
