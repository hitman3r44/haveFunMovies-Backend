<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;


class PrepaidCode extends Model
{

    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'prepaid_codes';

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
    protected $fillable = ['code', 'price', 'is_used', 'is_paid'];

    
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
