<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserRating extends Model
{
    public function adminVideo() {
        return $this->belongsTo('App\Model\AdminVideo');
    }
}
