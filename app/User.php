<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    protected $table = 'users';
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

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function favoriteAds()
    {
        // many to many relationship(param 1: related class, param 2: middle table name)
        return $this->belongsToMany(Ad::class, 'user_favorite_ads', 'user_id', 'advert_id')
            ->withTimestamps()
            ->orderBy('user_favorite_ads.created_at', 'desc');
    }
}
