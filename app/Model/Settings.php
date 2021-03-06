<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value'
    ];


    public static function set($key, $value)
    {
        return self::where('key', $key)->update(['value' => $value]);
    }
}
