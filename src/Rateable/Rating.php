<?php namespace muyaedward\Rateable;

use Config;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public $fillable = ['rating', 'order_id', 'comments', 'recommend'];

    /**
     * @return mixed
     */
    public function rateable()
    {
        return $this->morphTo();
    }

    /**
     * Rating belongs to a user.
     *
     * @return User
     */
    public function user()
    {
        $userClassName = Config::get('auth.model');
        if (is_null($userClassName)) {
            $userClassName = Config::get('auth.providers.users.model');
        }

        return $this->belongsTo($userClassName);
    }
}
