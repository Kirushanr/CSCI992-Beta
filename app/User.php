<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cmgmyr\Messenger\Traits\Messagable;
use App\Traits\Rateable;

class User extends Authenticatable
{
    use Notifiable;
    use Messagable;
    use Rateable;


    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';

    
    public function isAdmin()    {        
    return $this->type === self::ADMIN_TYPE;    
    }



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the adverts posted by the user
     */
    public function adverts()
    {
        return $this->hasMany('App\Advert');
    }

    public function wishlist()
    {
        return $this->belongsToMany('App\Advert','wish_list','user_id', 'advert_id');
    }


}
