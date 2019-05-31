<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CastCrew extends Model
{

    public function videoCastCrews(): HasMany
    {
        return $this->hasMany(VideoCastCrew::class, 'cast_crew_id', 'id');
    }

    /**
     * Save the unique ID
     *
     * @param $value
     */
    public function setUniqueIdAttribute($value): void
    {

		$this->attributes['unique_id'] = uniqid(str_replace(' ', '-', $value), true);
	}


    /**
     * Boot function for using with User Events
     *
     * @return void
     */
    public static function boot()
    {
        //execute the parent's boot method 
        parent::boot();

        //delete your related models here, for example
        static::deleting(function($video)
        {
            if (count($video->videoCastCrews) > 0) {

                foreach($video->videoCastCrews as $value)
                {
                    $value->delete();
                }
            }
        });
    }
}
