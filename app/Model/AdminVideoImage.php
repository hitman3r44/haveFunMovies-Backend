<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminVideoImage extends Model
{
    public function adminVideo() {
        return $this->belongsTo('App\Model\adminVideo');
    }
}
