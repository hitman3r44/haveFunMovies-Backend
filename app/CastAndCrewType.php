<?php

namespace App;

use App\Model\CastCrew;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CastAndCrewType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'cast_and_crew_types';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title'];

    public function castAndCrews()
    {
        return $this->hasMany(CastCrew::class, 'cast_and_crew_type_id', 'id');
    }


    public static function boot() {
        parent::boot();
        // Before update
        static::creating(function($post)
        {
            $post->created_by = Auth::check() ? Auth::user()->id : 1;
            $post->updated_by = Auth::check() ? Auth::user()->id : 1;
        });

        static::updating(function($post)
        {
            $post->updated_by = Auth::check() ? Auth::user()->id : 1;
        });
    }
}
