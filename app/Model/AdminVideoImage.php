<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminVideoImage extends Model
{

    protected $fillable = ['admin_video_id','image', 'is_default', 'position'];



    public function adminVideo() {
        return $this->belongsTo('App\Model\adminVideo');
    }
}
