<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $table = 'adverts';


    /**
     * Get the user who posted the advert
     *
     * **/
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
