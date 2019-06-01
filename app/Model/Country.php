<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{


    public function advertisements()
    {
        return $this->belongsToMany('App\Model\Advertisement', 'advertisement_has_countries', 'country_id', 'advertisement_id');
    }
}
