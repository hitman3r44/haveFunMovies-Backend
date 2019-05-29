<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class GeneratePrepaidCode extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'generate_prepaid_codes';

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
    protected $fillable = ['prepaid_plan_id', 'customer_id', 'sold_by', 'UUID', 'is_paid', 'is_deleted'];

    public function prepaidCode()
    {
        return $this->belongsTo('App\Model\PrepaidCode', 'prepaid_plan_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo('App\User');
    }
    public function soldBy()
    {
        return $this->belongsTo('App\User', 'sold_by', 'id');
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
