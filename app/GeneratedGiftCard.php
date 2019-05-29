<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Model\GiftCard;

class GeneratedGiftCard extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'generated_gift_cards';

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
    protected $fillable = ['gift_card_id', 'customer_id', 'sold_by', 'UUID', 'is_paid', 'is_deleted'];

    public function giftCard()
    {
        return $this->belongsTo(GiftCard::class, 'gift_card_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(User::class);
    }
    public function soldBy()
    {
        return $this->belongsTo(User::class, 'sold_by', 'id');
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
