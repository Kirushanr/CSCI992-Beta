<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kitchenware extends Model
{
    protected $fillable = [
        'model',
        'warranty',
        'advert_id'
    ];
}
