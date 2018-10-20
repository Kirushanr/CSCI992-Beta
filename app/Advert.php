<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $table = 'adverts';

    /**
     * /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     *
     */
    protected $guarded = ['user_id'];

    /**
     * Get the user who posted the advert
     *
     * **/
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userfavorites()
    {
        return $this->belongsToMany('App\User','wish_list','user_id', 'advert_id');
    }

    public function reportedAdverts()
    {
        return $this->belongsToMany('App\User','reports','user_id', 'advert_id');
    }
}
