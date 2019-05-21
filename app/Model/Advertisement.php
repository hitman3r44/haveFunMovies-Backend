<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{

    use SoftDeletes;

    public function countries()
    {
        return $this->belongsToMany('App\Model\Country', 'advertisement_has_countries', 'advertisement_id', 'country_id');
    }


    public function movies()
    {
        return $this->belongsToMany('App\Model\AdminVideo', 'advertisement_has_movies', 'advertisement_id', 'movie_id');
    }
}
