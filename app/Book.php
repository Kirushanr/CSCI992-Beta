<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'isbn', 'courseCode', 'author', 'edition', 'advert_id'
    ];

}
