<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Genre extends Model
{
    public function subcategory() {
        return $this->belongsTo('App\Model\SubCategory');
    }

    public function adminVideo()
    {
        return $this->hasMany('App\Model\AdminVideo');
    }


    /**
     * Save the unique ID 
     *
     *
     */
    public function setUniqueIdAttribute($value){

        $this->attributes['unique_id'] = uniqid(str_replace(' ', '-', $value));

    }

    public static function boot()
    {
        //execute the parent's boot method 
        parent::boot();

        static::creating(function($post)
        {
            $post->created_by = Auth::check() ? Auth::user()->id : 0;
        });

        //delete your related models here, for example
        static::deleting(function($genres)
        {

            foreach($genres->adminVideo as $video)
            {                
                $video->delete();
            } 

        });	

    }
}
