<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;


class CreditMoney extends Model
{

    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'credit_moneys';

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
    protected $fillable = ['retailer_id', 'amount', 'given_by', 'created_by'];

    public function retailer()
    {
        return $this->belongsTo('App\User');
    }
    public function givenBy()
    {
        return $this->belongsTo('App\User');
    }


    public static function boot() {
        parent::boot();
        // Before update
        static::creating(function($post)
        {   // auth::check for seeding. cause while seeding there is no auth
            $post->created_by = Auth::check() ?  Auth::user()->id : 1;
            $post->updated_by = Auth::check() ?  Auth::user()->id : 1;
        });

        static::updating(function($post)
        {
            $post->updated_by = Auth::check() ?  Auth::user()->id : 1;
        });
    }

}