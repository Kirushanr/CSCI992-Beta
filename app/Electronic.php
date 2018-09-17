<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Electronic extends Model
{
    protected $fillable = [
        'model',
        'warranty',
        'advert_id'
    ];
}
